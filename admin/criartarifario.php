
<?php

    session_start();
    include('../mysql.php');
    include('../mysqlconnect.php');
    include('../login_status.php');
        
    function getpotencia($indice)
    {
        if($indice==1)
            return 1.15;
        else if($indice==2)
            return 2.3; 
        else if($indice==3)
            return 3.45;
        else if($indice==4)
            return 4.6;
        else if($indice==5)
            return 5.75;
        else if($indice==6)
            return 6.9;
        else if($indice==7)
            return 10.35;
        else if($indice==8)
            return 13.8;
        else if($indice==9)
            return 17.25;
        else if($indice==10)
            return 20.7;
        else if($indice==11)
            return 27.6;
        else if($indice==12)
            return 34.5;
        else if($indice==13)
            return 41.4;
    
    }

   if(isset($_GET['ET']))
   {
      $ET = ($_GET['ET'] === '' ? null : $_GET['ET']);
   }
   else
    $ET =  null;

   if(isset($_GET['hash']))
   {
      $nome =($_GET['hash'] === '' ? null : base64_decode($_GET['hash']));
   }
   else
    $nome = null;


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>EDP Fatura&ccedil;&atilde;o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
            
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/img/EDP_logo.jpg">
    <script type="text/javascript" src="../assets/js/jquery.mim.js"></script>
    <script type="text/javascript">
    
        var conta = 1;
        var conta_bi = 1;
        var conta_tri = 1;
        var i=0;

        function valida_dados(form)
        {
            if (form.nome_tarifario.value=="") {
                alert("O Nome não está preenchido!");
               form.nome_tarifario.focus();
               return false;
            }
        
            if (form.id_tarifario.value=="") {
                alert("ID Tarifario não está preenchido!");
               form.id_tarifario.focus();
               return false;
            }
            
            if (form.data_vigor.value=="") {
                alert("Data não está preenchido!");
               form.data_vigor.focus();
               return false;
            }
            
            return true;
        }
        
      
    </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="../index.php">Inicio</a></li>
              <li><a href="../listar.php">Listar</a></li>
              <li><a href="./pesquisar.php">Pesquisar</a></li>
              <li class="dropdown active">
              <?php 
                if(login_status()==1)
                {
                    ?>
                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li><a href="profile.php">Minha Conta</a></li>
                  <li class="active"><a href="registar.php">Criar User</a></li>
                  <li><a href="listarusers.php">Gerir Users Existentes </a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li><a href="upload_ficheiro.php">Upload Ficheiro</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                  <li><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Servidor</li>
                  <li><a href="log_operacao.php">Ver Log de Operações</a></li>
                  <li><a href="gerirlinks.php">Gerir Links Rápidos</a></li>
                </ul>
              </li>
              <?php
                }
                ?>
                
            </ul>
            <?php
                if(login_status()==1)
                {
                    ?>
                    <div class="navbar-form pull-right"> 
                    <ul class="nav">
                    <li style="line-height:15px"> <br><font color="white"> <?php
                    echo("Bem Vindo <a href=profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");
                    echo("  <a href='../logout.php'>[Logout]</a>")
                    ?></font></ul></li></div><?php
                }
                else
                {
                     ?>
                        <meta HTTP-EQUIV="REFRESH" content="0; url=../erro_interno.php">
                    <?php
                }
            ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <!----------------------------------BODY------------------------------------>
    <div class="container">
      <br>
      
    <?php
        
    if(isset($_POST['nome_tarifario']) && isset($_POST['id_tarifario']) && isset($_POST['data_vigor']))
    {  
        
        $tarifas_simples=array();
        $tarifas_bi=array();
        $tarifas_tri=array();
        $contador=0;
        $ultimo_id_simples=0;
        $ultimo_id_bi=0;
        $ultimo_id_tri=0;
        $nome_electricidade=$_POST['nome_tarifario'];
        $id_tarifario=$_POST['id_tarifario'];
        $data_vigor=$_POST['data_vigor'];
       
        
        if($stmt = $mysqli->prepare("SELECT * FROM ELECTRICIDADE WHERE NOME = ? AND ID_TARIFARIO = ? AND DATA = ? LIMIT 1")) 
        {
            
            $stmt->bind_param('sss', $nome_electricidade,$id_tarifario,$data_vigor); 
            $stmt->execute(); 
            $stmt->store_result();
            $stmt->fetch();
           // echo "NUmero de linhas == ".$stmt->num_rows."<br>";
            if($stmt->num_rows == 0)
            {            
                $stmt->close();    
                /*<--------------Descobrir ultimo id inserido SIMPLES------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_SIMPLES FROM TARIFA_SIMPLES ORDER BY IDTARIFA_SIMPLES DESC LIMIT 1 ")){
                    $stmt->execute(); 
                    $stmt->store_result();
                    $stmt->bind_result($ultimo_id_simples); 
                    $stmt->fetch();
                }
                $ultimo_id_simples++;
                
                /*<--------------Descobrir ultimo id inserido BI------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_BI FROM TARIFA_BI ORDER BY IDTARIFA_BI DESC LIMIT 1 ")){
                    $stmt->execute(); 
                    $stmt->store_result();
                    $stmt->bind_result($ultimo_id_bi); 
                    $stmt->fetch();
                }
                $ultimo_id_bi++;
                
                /*<--------------Descobrir ultimo id inserido TRI------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_TRI FROM TARIFA_TRI ORDER BY IDTARIFA_TRI DESC LIMIT 1 ")){
                    $stmt->execute(); 
                    $stmt->store_result();
                    $stmt->bind_result($ultimo_id_tri); 
                    $stmt->fetch();
                }
                $ultimo_id_tri++;
                
                $observacao_simples = null;
                $observacao_bi = null;
                $observacao_tri = null;
              
               /**Tipo de descontos**/
               if(isset($_POST['tipo_desconto_simples']))
               {
                  if($_POST['tipo_desconto_simples'] != '%' && $_POST['tipo_desconto_simples'] != '€')
                    $tipo_desconto_simples = '%';
                  else
                    $tipo_desconto_simples = $_POST['tipo_desconto_simples']; 
               }
               else
                 $tipo_desconto_simples = $_POST['tipo_desconto_simples']; 

               if(isset($_POST['tipo_desconto_bi']))
               {
                  if($_POST['tipo_desconto_bi'] != '%' && $_POST['tipo_desconto_bi'] != '€')
                    $tipo_desconto_bi = '%';
                  else
                    $tipo_desconto_bi = $_POST['tipo_desconto_bi']; 
               }
               else
                 $tipo_desconto_bi = $_POST['tipo_desconto_bi']; 

               if(isset($_POST['tipo_desconto_tri']))
               {
                  if($_POST['tipo_desconto_tri'] != '%' && $_POST['tipo_desconto_tri'] != '€')
                    $tipo_desconto_tri = '%';
                  else
                    $tipo_desconto_tri = $_POST['tipo_desconto_tri']; 
               }
               else
                 $tipo_desconto_tri = $_POST['tipo_desconto_tri']; 
                /**<----------------------------->**/

                /*<------------Preencher dados do post---------->*/
                foreach($_POST as $param_name => $param_val)
                {
                    if($param_name!='nome_tarifario' && $param_name!='id_tarifario' && $param_name!='data_vigor') 
                    {
                        if(!empty($param_val))
                        {                   
                            //echo("param_name == ".$param_name."<br>");
                            $partes=explode("_",$param_name);
                            $contador= $partes[count($partes)-1];
                            //echo("partes == ".$contador."<br>");
                           /* if(stripos($param_name,'select_tarifa_simples') !== false)
                                $tarifas_simples[$contador-1]['potencia_contratada']=$param_val;*/
                           
                            if(stripos($param_name,'preco_potencia_simples_tvcf_') !== false)
                                $tarifas_simples[$contador]['preco_potencia_simples_tvcf']=$param_val;
                                    
                            if(stripos($param_name,'preco_energia_simples_tvcf_') !== false)
                                $tarifas_simples[$contador]['preco_energia_simples_tvcf']=$param_val;

                            if(stripos($param_name,'desconto_valor_') !== false)
                                $tarifas_simples[$contador]['desconto_valor']=$param_val . $tipo_desconto_simples;

                            if(stripos($param_name,'preco_potencia_simples_edpC_') !== false)
                                $tarifas_simples[$contador]['preco_potencia_simples_edpC']=$param_val;

                            if(stripos($param_name,'preco_energia_simples_edpC_') !== false)
                                $tarifas_simples[$contador]['preco_energia_simples_edpC']=$param_val;
                                            
                            if(stripos($param_name,'observacao_simples') !== false)
                                $observacao_simples=$param_val; 
                                            
                          /*  if(stripos($param_name,'select_tarifa_bi') !== false)
                                $tarifas_bi[$contador-1]['potencia_contratada']=$param_val;*/
                                            
                            if(stripos($param_name,'preco_potencia_bi_tvcf_') !== false)
                                $tarifas_bi[$contador]['preco_potencia_bi_tvcf']=$param_val;
                                            
                            if(stripos($param_name,'energia_normal_bi_tvcf_') !== false)
                                $tarifas_bi[$contador]['energia_normal_bi_tvcf']=$param_val; 
                                            
                            if(stripos($param_name,'energia_economico_bi_tvcf_') !== false)
                                $tarifas_bi[$contador]['energia_economico_bi_tvcf']=$param_val; 

                            if(stripos($param_name,'desconto_bi_') !== false)
                                $tarifas_bi[$contador]['desconto_bi']=$param_val . $tipo_desconto_bi; 

                            if(stripos($param_name,'preco_potencia_bi_edpC_') !== false)
                                $tarifas_bi[$contador]['preco_potencia_bi_edpC']=$param_val;
                                            
                            if(stripos($param_name,'energia_normal_bi_edpC_') !== false)
                                $tarifas_bi[$contador]['energia_normal_bi_edpC']=$param_val; 
                                            
                            if(stripos($param_name,'energia_economico_bi_edpC_') !== false)
                                $tarifas_bi[$contador]['energia_economico_bi_edpC']=$param_val; 
                                            
                            if(stripos($param_name,'observacao_bi') !== false)
                                $observacao_bi=$param_val; 
                            
                           /* if(stripos($param_name,'select_tarifa_tri') !== false)
                                $tarifas_tri[$contador-1]['potencia_contratada']=$param_val;*/
                                        
                            if(stripos($param_name,'preco_potencia_tri_tvcf_') !== false)
                                $tarifas_tri[$contador]['preco_potencia_tri_tvcf']=$param_val;
                                                
                            if(stripos($param_name,'energia_normal_tri_tvcf_') !== false)
                                $tarifas_tri[$contador]['energia_normal_tri_tvcf']=$param_val; 
                                            
                            if(stripos($param_name,'energia_economico_tri_tvcf_') !== false)
                                $tarifas_tri[$contador]['energia_economico_tri_tvcf']=$param_val;
                                                
                            if(stripos($param_name,'energia_economico_super_tri_tvcf_') !== false)
                                $tarifas_tri[$contador]['energia_economico_super_tri_tvcf']=$param_val;

                            if(stripos($param_name,'desconto_tri_') !== false)
                                $tarifas_tri[$contador]['desconto_tri']=$param_val . $tipo_desconto_tri;

                            if(stripos($param_name,'preco_potencia_tri_edpC_') !== false)
                                $tarifas_tri[$contador]['preco_potencia_tri_edpC']=$param_val;
                                                
                            if(stripos($param_name,'energia_normal_tri_edpC_') !== false)
                                $tarifas_tri[$contador]['energia_normal_tri_edpC']=$param_val; 
                                            
                            if(stripos($param_name,'energia_economico_tri_edpC_') !== false)
                                $tarifas_tri[$contador]['energia_economico_tri_edpC']=$param_val;
                                                
                            if(stripos($param_name,'energia_economico_super_tri_edpC_') !== false)
                                $tarifas_tri[$contador]['energia_economico_super_tri_edpC']=$param_val;
                                         
                            if(stripos($param_name,'observacao_tri') !== false)
                                $observacao_tri=$param_val; 
                                   
                        }
                    }
                }
                /*<-------------------------------------->*/
                
                
                $flag_1=null;
                $contador_simples = 0;
                $contador_bi = 0;
                $contador_tri = 0;
                
                foreach($tarifas_simples as $k => $v) {
                   
                   /* if(!empty($v))
                    {
                        
                        echo($i." Campo == ".$k."<br>"); 
                        echo($i." Campo == ".$v['preco_potencia_simples_tvcf']."<br>"); 
                        echo($i." Campo == ".$v['preco_energia_simples_tvcf']."<br>");
                        echo($i." Campo == ".$v['desconto_valor']."<br>"); 
                        echo($i." Campo == ".$v['preco_potencia_simples_edpC']."<br>"); 
                        echo($i." Campo == ".$v['preco_energia_simples_edpC']."<br>");
                        echo($i." Campo == ".$observacao_simples."<br>");
                        echo($i." data == ".$data_vigor."<br>"); 
                    }*/
                    
                    $potencia=getpotencia($k);

                    $flag_1=1;
                    if(($v['preco_potencia_simples_edpC'] != null) && ($v['preco_energia_simples_edpC'] != null))
                    {
                      if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_SIMPLES (IDTARIFA_SIMPLES,POTENCIA,PRECO_POTENCIA_TVCF,PRECO_ENERGIA_TVCF,PRECO_POTENCIA_edpC,PRECO_ENERGIA_edpC,DESCONTO,TIPO_DESCONTO,FORMATO_DESCONTO,DATA,OBS) VALUES (?,?,?,?,?,?,?,NULL,NULL,'0000-00-00',NULL)")) 
                      {                         
                          $insert_stmt->bind_param('dddddds',$ultimo_id_simples,$potencia,$v['preco_potencia_simples_tvcf'],$v['preco_energia_simples_tvcf'],$v['preco_potencia_simples_edpC'],$v['preco_energia_simples_edpC'],$v['desconto_valor']);
                          $ok=$insert_stmt->execute();
                          
                          $id_tarifa_simples=$mysqli->insert_id;
                          if(!$ok)
                          { 
                              $flag_1=-1;
                              //echo "Insucesso TARIFA SIMPLES == ".$mysqli->error."!!!<br>"; 
                          }
                          else
                          { 
                              $flag_1=1;
                              //echo "<p align='center'>Sucesso a inserir tarifa Simples.</p>";
                              $contador_simples++;
                          }
                          $insert_stmt->close();                  
                      }
                      else
                      {
                          $flag_1=-1;
                      }
                    }
                    else
                    {
                        echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Potência  Tarifa Simples [".$potencia."] Preço edpC é de preenchimento Obrigatório [<font color='red'>FALHOU</font>]</h4></div>";
                    }

                    if($flag_1==-1)
                    {
                        echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Tarifa Simples [<font color='red'>FALHOU</font>]</h4></div>";
                        
                    }
                
                }
                
                if($observacao_bi)
                {
                       if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_SIMPLES (IDTARIFA_SIMPLES,POTENCIA,PRECO_POTENCIA_TVCF,PRECO_ENERGIA_TVCF,PRECO_POTENCIA_edpC,PRECO_ENERGIA_edpC,DESCONTO,TIPO_DESCONTO,FORMATO_DESCONTO,DATA,OBS) VALUES (?,99,-1,-1,-1,-1,-1,-1,-1,?,?)")) 
                       {
                             $insert_stmt->bind_param('dss',$ultimo_id_simples,$data_vigor,$observacao_simples);
                            $ok=$insert_stmt->execute();
                            $insert_stmt->close();      
                            $id_tarifa_bi=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                //$flag_2 = -1;
                                echo "Insucesso SIMPLES OBSERVACAO!!!<br>"; 
                            }
                                                      
                        }
                }
                
                $flag_2=null;
                foreach($tarifas_bi as $k => $v) 
                {                  
                   /* echo($i." Campo bi == ".$k."<br>");
                    
                    echo($i." 1 Campo bi == ".$v['preco_potencia_bi_tvcf']."<br>"); 
                    echo($i." 2 Campo bi == ".$v['energia_normal_bi_tvcf']."<br>"); 
                    echo($i." 3 Campo bi == ".$v['energia_economico_bi_tvcf']."<br>"); 
                    echo($i." 4 Campo bi == ".$v['desconto_bi']."<br>"); 
                    echo($i." 5 Campo bi == ".$v['preco_potencia_bi_edpC']."<br>"); 
                    echo($i." 6 Campo bi == ".$v['energia_normal_bi_edpC']."<br>"); 
                    echo($i." 7 Campo bi == ".$v['energia_economico_bi_edpC']."<br>"); 
                    echo($i." 8 Campo bi == ".$observacao_bi."<br>"); */
                    
                    $potencia=getpotencia($k);
                    $flag_2=1;
                    if(($v['energia_normal_bi_edpC'] != null) && ($v['energia_economico_bi_edpC'] != null) && ($v['preco_potencia_bi_edpC'] != null))
                    {
                      if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_BI (IDTARIFA_BI,POTENCIA,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,PRECO_POTENCIA_TVCF,DESCONTO,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,PRECO_POTENCIA_edpC,DATA,OBS) VALUES (?,?,?,?,?,?,?,?,?,NULL,NULL)")) 
                      {  
                          $insert_stmt->bind_param('dddddsddd',$ultimo_id_bi,$potencia,$v['energia_normal_bi_tvcf'],$v['energia_economico_bi_tvcf'],$v['preco_potencia_bi_tvcf'],$v['desconto_bi'],$v['energia_normal_bi_edpC'],$v['energia_economico_bi_edpC'],$v['preco_potencia_bi_edpC']);
                          $ok=$insert_stmt->execute();
                          $insert_stmt->close();      
                          $id_tarifa_bi=$mysqli->insert_id;
                          if(!$ok)
                          { 
                              $flag_2 = -1;
                              //echo "Insucesso TARIFA BI!!!"; 
                          }
                          else
                          { 
                              $flag_2 = 1;
                              $contador_bi++;
                              //echo "<p align='center'>Sucesso a inserir tarifa BI.</p>";
                          }
                                      
                      }
                      else
                      {
                          $flag_2=-1;
                      }
                    }
                    else
                    {
                        echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Tarifa BI Potência [".$potencia."] Preço edpC é de preenchimento Obrigatório [<font color='red'>FALHOU</font>]</h4></div>";
                    }

                    if($flag_2==-1)
                    {
                        echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Tarifa BI [<font color='red'>FALHOU</font>]</h4></div>";
                    }    
                    
                }
                
                if($observacao_bi)
                {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_BI (IDTARIFA_BI,POTENCIA,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,PRECO_POTENCIA_TVCF,DESCONTO,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,PRECO_POTENCIA_edpC,DATA,OBS) VALUES (?,99,-1,-1,-1,-1,-1,-1,-1,?,?)")) 
                        {
                             $insert_stmt->bind_param('dss',$ultimo_id_bi,$data_vigor,$observacao_bi);
                            $ok=$insert_stmt->execute();
                            $insert_stmt->close();      
                            $id_tarifa_bi=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                //$flag_2 = -1;
                                echo "Insucesso BI OBSERVACAO!!!<br>"; 
                            }
                                                      
                        }
                }
                
                $flag_3=null;
                foreach($tarifas_tri as $k => $v) 
                {
                    /*
                    echo($i." 1 Campo tri == ".$k."<br>");
                    echo($i." 2 Campo tri == ".$v['preco_potencia_tri_tvcf']."<br>"); 
                    echo($i." 3 Campo tri == ".$v['energia_normal_tri_tvcf']."<br>"); 
                    echo($i." 4 Campo tri == ".$v['energia_economico_tri_tvcf']."<br>");     
                    echo($i." 5 Campo tri == ".$v['energia_economico_super_tri_tvcf']."<br>"); 
                    echo($i." 6 Campo tri == ".$v['desconto_tri']."<br>"); 
                    echo($i." 7 Campo tri == ".$v['preco_potencia_tri_edpC']."<br>"); 
                    echo($i." 8 Campo tri == ".$v['energia_normal_tri_edpC']."<br>"); 
                    echo($i." 9 Campo tri == ".$v['energia_economico_tri_edpC']."<br>");     
                    echo($i." 10 Campo tri == ".$v['energia_economico_super_tri_edpC']."<br>");  
                    echo($i." 11 Campo tri == ".$observacao_tri."<br>"); */
                    
                    $potencia=getpotencia($k);
                    $flag_3=1;
                    if(($v['preco_potencia_tri_edpC'] != null) && ($v['energia_normal_tri_edpC'] != null) && ($v['energia_economico_tri_edpC'] != null) && ($v['energia_economico_super_tri_edpC'] != null))
                    {
                      if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_TRI(IDTARIFA_TRI,POTENCIA,PRECO_POTENCIA_TVCF,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,ENERGIA_SUPER_ECONOMICO_TVCF,DESCONTO,PRECO_POTENCIA_edpC,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,ENERGIA_SUPER_ECONOMICO_edpC,DATA,OBS) VALUES (?,?,?,?,?,?,?,?,?,?,?,NULL,NULL)")) 
                      {  
                          $insert_stmt->bind_param('ddddddsdddd',$ultimo_id_tri,$potencia,$v['preco_potencia_tri_tvcf'],$v['energia_normal_tri_tvcf'],$v['energia_economico_tri_tvcf'],$v['energia_economico_super_tri_tvcf'],$v['desconto_tri'],$v['preco_potencia_tri_edpC'],$v['energia_normal_tri_edpC'],$v['energia_economico_tri_edpC'],$v['energia_economico_super_tri_edpC']);
                          $ok=$insert_stmt->execute();
                          $id_tarifa_simples=$mysqli->insert_id;
                          if(!$ok)
                          {
                              $flag_3 = -1;
                              echo "Insucesso TARIFA TRI == ".$mysqli->error."!!!<br>"; 
                          }
                          else
                          { 
                              $flag_3 = 1;
                              $contador_tri++;
                              //echo "<p align='center'>Sucesso a inserir tarifa TRI.</p>";
                          }        
                          $insert_stmt->close(); 
                      }
                      else
                      {
                          $flag_3 = -1;

                      }

                    }
                    else
                    {
                        echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Tarifa TRI [".$potencia."] Preço edpC é de preenchimento Obrigatório [<font color='red'>FALHOU</font>]</h4></div>";
                    }

                    if($flag_3==-1)
                    {
                        echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Tarifa TRI [<font color='red'>FALHOU</font>]</h4></div>";
                    }    
                 
                }
                
                if($observacao_tri)
                {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_TRI(IDTARIFA_TRI,POTENCIA,PRECO_POTENCIA_TVCF,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,ENERGIA_SUPER_ECONOMICO_TVCF,DESCONTO,PRECO_POTENCIA_edpC,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,ENERGIA_SUPER_ECONOMICO_edpC,DATA,OBS) VALUES (?,99,-1,-1,-1,-1,-1,-1,-1,-1,-1,?,?)")) 
                        {
                            $insert_stmt->bind_param('dss',$ultimo_id_tri,$data_vigor,$observacao_tri);
                            $ok=$insert_stmt->execute();
                            $insert_stmt->close();      
                            $id_tarifa_bi=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                //$flag_2 = -1;
                                echo "Insucesso TRI OBSERVACAO!!!<br>"; 
                            }
                                                      
                        }
                }
                
                if(!$flag_1 && $contador_simples > 0)
                {
                   $ultimo_id_simples=null;
                }
                if(!$flag_2 && $contador_bi > 0)
                {
                   $ultimo_id_bi=null;
                }
                if(!$flag_3 && $contador_tri > 0)
                {
                   $ultimo_id_tri=null;
                }   
                
                if($insert_stmt = $mysqli->prepare("INSERT INTO ELECTRICIDADE(NOME,ID_TARIFARIO,ID_TARIFA_SIMPLES,ID_TARIFA_BI,ID_TARIFA_TRI,DATA) VALUES (?,?,?,?,?,?)")) 
                {   
                    $insert_stmt->bind_param('ssddds',$nome_electricidade,$id_tarifario,$ultimo_id_simples,$ultimo_id_bi,$ultimo_id_tri,$data_vigor);
                    $ok=$insert_stmt->execute();
                          
                    $id_tarifa_simples=$mysqli->insert_id;
                    if(!$ok)
                    { 
                          echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Plano de ELECTRICIDADE [<font color='red'>FALHOU</font>]</h4></div>";
                          //echo "Insucesso TARIFA TRI == ".$mysqli->error."!!!<br>"; 
                    }
                    else
                    { 
                       echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Plano de ELECTRICIDADE [<font color='#4CC417'>OK</font>]</h4></div>";
                    }  
                    $insert_stmt->close();
                }
                else
                {
                    echo("<p align=center><img  width = 100 heigth = 100  src=../assets/img/EDP_logo.jpg></p>");
                    echo("<div align='center'><h4> Erro na Inserc&ccedil;&atilde;o ELECTRICIDADE. Redirecionando...</h4></div>");
                    $mysqli->close();
                    
                }
                    
                    echo("<div align='center'><h4>Rederecionando....</h4></div>");
                    ?>
                        <meta HTTP-EQUIV="REFRESH" content="5; url=criartarifario.php">
                    <?php
                
        }
        else
        {
                echo("<div align='center'><img align=center width = 100 heigth = 100  src=../assets/img/EDP_logo.jpg></div><br>");
                echo("<div align='center'><h4>  J&aacute; existe o Tarif&aacute;rio [".$nome_electricidade."] com ID tarif&aacute;rio [".$id_tarifario."].<br> Redirecionando...</h4></div>");
                $mysqli->close();
                ?>
                   <meta HTTP-EQUIV="REFRESH" content="3; url=criartarifario.php">
                <?php
        }
    }

    }else{
    
    ?>
    
    <form method="post" action="criartarifario.php" onsubmit="return valida_dados(this);" name="criaroferta"> 
    <!---------------------- TABELA PRINCIPAL ---------------------->
    <fieldset align="center" >
    <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF" >
        <tr>
                <td colspan = "2">
                    <label>
                        <h3>Adicionar Novo Tarif&aacute;rio de Electricidade</h3>
                    </label>
                </td>            
        </tr> 
        <tr>
                <td colspan = "2">
                    <fieldset align="center" >
                         <table  id="table_tarifa_electricidade" width='93%' height='50%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td WIDTH="200" HEIGHT="30" colspan="2"  align="left">
                                    <label>
                                        <h4> 1.Tarif&aacute;rio:</h4>
                                    </label>
                                </td>     
                             </tr>
                            <tr class="hero-unit">
                                <td   width="20%" align="center">
                                    <label>    
                                      Nome Tarif&aacute;rio:<font color="red">*</font>
                                    </label>
                                </td> 
                                <td align="left">
                                  <?php 
                                  if($nome==NULL)
                                  {
                                  ?>
                                    <input  id="nome_tarifario" class="span5"  type="text" placeholder="Nome Tarif&aacute;rio" name="nome_tarifario">               
                                  <?php
                                  }else
                                  {
                                    ?>
                                    <input  id="nome_tarifario" class="span5" value="<?php echo($nome);?>"  readonly type="text" placeholder="Nome Tarif&aacute;rio" name="nome_tarifario">               
                                  
                                  <?php
                                }
                                ?>
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td width="20%" align="center">
                                    <label>    
                                      ID Tarif&aacute;rio:<font color="red">*</font>
                                    </label>
                                </td> 
                                <td align="left">
                                  <?php
                                  if($ET==NULL)
                                    {
                                      ?>
                                    <input  id="id_tarifario" class="span5" type="text" placeholder="ID Tarif&aacute;rio" name="id_tarifario">             
                                  <?php
                                }
                                else
                                {

                                  ?>
                              <input  id="id_tarifario" value="<?php echo($ET);?>" readonly class="span5" type="text" placeholder="ID Tarif&aacute;rio" name="id_tarifario">             
                                <?php
                                }?>
                                                                
                                </td> 
                            </tr>
                            <tr class="hero-unit">
                                <td   width="20%" align="center">
                                    <label>    
                                      Data (entra em vigor):<font color="red">*</font>
                                    </label>
                                </td> 
                                <td align="left">
                                    <input  id="data_vigor" class="span3" type="date" name="data_vigor">               
                                </td> 
                            </tr>
                         </table>
                    </fieldset>    
                </td>            
        </tr> 
         <tr>
            <td colspan="2">
             <br>
             <!---------------------- TABELA TARIFA SIMPLES---------------------->
              <fieldset align="center" >
                <table id="table_tarifa_simples" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                <tr  class="hero-unit">
                    <td WIDTH="200" HEIGHT="30" colspan="6"  align="left">
                      <label>
                        <h4> 1.2 Tarifa Simples: </h4>
                      </label>
                    </td>     
                </tr>
                <tr class="hero-unit">
                    <td rowspan="2">
                        <label> 
                          Pot&ecirc;ncia Contratada (kVA)
                        </label>
                    </td>
                    <td>
                        <label>
                          Pre&ccedil;o da Pot&ecirc;ncia (€/dia)
                        </label>
                    </td>
                    <td>
                        <label>
                             Pre&ccedil;o da Energia (€/kWh)
                        </label>
                    </td>
                    <td >
                        <label>
                             Desconto
                        </label>
                    </td>
                    <td>
                        <label>
                          Pre&ccedil;o da Pot&ecirc;ncia (€/dia)
                        </label>
                    </td>
                    <td>
                        <label>
                             Pre&ccedil;o da Energia (€/kWh)
                        </label>
                    </td>
                </tr>
                <tr class="hero-unit">
                    <td colspan="2">
                        <label>
                          TVCF
                        </label>
                    </td>
                    <td>
                        <input  id="tipo_desconto_simples" class="span1" type="text" placeholder="% ou €" name="tipo_desconto_simples">
                    </td>
                    <td colspan="2">
                        <label>
                         edpC
                        </label>
                    </td>
                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>1,15 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_1">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_1">  <br> 
                    </td>
                    <td>  
                        <input  id="desconto_valor_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" placeholder="Desconto" name="desconto_valor_1">   

                    </td>
                    <td>
                        <input  id="preco_potencia_simples_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_1">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_1">  <br> 
                    </td>
                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>2,3 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_2,3" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_2">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_2,3" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_2">  <br> 
        
                    </td>
                    <td>
                        <input  id="desconto_valor_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" placeholder="Desconto" name="desconto_valor_2">    
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_2,3" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_2">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_2,3" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_2">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>3,45 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_3,45" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_3">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_3,45" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_3">  <br> 
        
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_3,45" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_3">   
                     
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_3,45" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_3">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_3,45" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_3">  <br> 
                    </td>
                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>4,6 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_4,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_4">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_4,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_4">  <br> 
        
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_4,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_4">   
                       
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_4,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_4">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_4,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_4">  <br> 
                    </td>
                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>5,75 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_5,75" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_5">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_5,75" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_5">  <br> 
        
                    </td>
                    <td> 
                        <input  id="desconto_valor_5,75" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" placeholder="Desconto" name="desconto_valor_5">   

                    </td>
                     <td>
                        <input  id="preco_potencia_simples_5,75" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_5">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_5,75" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_5">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>6,9 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_6,9" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_6">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_6,9" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_6">  <br> 
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_6,9" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_6">   
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_6,9" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_6">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_6,9" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_6">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>10,35 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_10,35" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_7">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_10,35" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_7">  <br> 
        
                    </td>
                    <td>
                        <input  id="desconto_valor_10,35" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_7">   
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_10,35" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_7">  <br> 
                    </td>
                    <td>
                        <input  id="preco_energia_simples_10,35" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_7">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>13,8 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_13,8" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_8">  <br> 
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_13,8" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_8">  <br> 
    
                    </td>
                    <td>
                        <input  id="desconto_valor_13,8" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_8">   
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_13,8" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_8">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_13,8" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_8">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>17,25 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_17,25" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_9">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_17,25" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_9">  <br> 
        
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_17,25" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" placeholder="Desconto" name="desconto_valor_9">   
                        
                  
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_17,25" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_9">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_17,25" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_9">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>20,7 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_20,7" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_10">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_20,7" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_10">  <br> 
        
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_20,7" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_10">   

                  
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_edpC_20,7" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_10">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_edpC_20,7" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_10">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>27,6 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_27,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_11">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_27,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_11">  <br> 
        
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_11" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_11">   
                  
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_edpC_27,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_11">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_edpC_27,6" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_11">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>34,5 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_34,5" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_12">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_34,5" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_12">  <br> 
        
                    </td>
                    <td>
                          
                        <input  id="desconto_valor_12" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_12">   
                                         
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_edpC_34,5" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_12">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_edpC_34,5" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_12">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>41,4 kVA</label>
                    </td>
                    <td>
                        <input  id="preco_potencia_simples_tvcf_41,4" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_tvcf_13">  <br> 
            
                    </td>
                    <td>
                        <input  id="preco_energia_simples_tvcf_41,4" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_tvcf_13">  <br> 
                    </td>
                    <td>      
                        <input  id="desconto_valor_13" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  placeholder="Desconto" name="desconto_valor_13">    
                    </td>
                     <td>
                        <input  id="preco_potencia_simples_edpC_41,4" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Pot&ecirc;ncia (€/dia)" name="preco_potencia_simples_edpC_13">  <br> 
                    
                    </td>
                    <td>
                        <input  id="preco_energia_simples_edpC_1,15" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" placeholder="Pre&ccedil;o da Energia (€/kWh)" name="preco_energia_simples_edpC_13">  <br> 
                    </td>

                </tr>
                <tr class="hero-unit">
                    <td>
                        <label>
                            Observa&ccedil;&otilde;es
                        </label>
                    </td>
                    <td colspan="5">
                        
                        <textarea rows="4" cols="50" class="span6" id="observacao_simples" name="observacao_simples_1"></textarea>
                       
                    </td>

                </tr>
                </table>
             </fieldset>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
             <!---------------------- TARIFA BI-HORARIA ---------------------->
             <br>
              <fieldset align="center" >
                <table  id="table_tarifa_bi" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr class="hero-unit">
                                <td WIDTH="200" HEIGHT="30"   align="left" colspan="8">
                                    <label>
                                        <h4> 1.3. Tarifa BI-H&oacute;raria:  </h4>
                                    </label>
                                </td> 
                            </tr>
                            <tr class="hero-unit"> 
                                <td rowspan="2">
                                    <label>
                                        Pot&ecirc;ncia Contratada 
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Pre&ccedil;o da Pot&ecirc;ncia (l/dia)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Normal (€/kWh)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Econ&oacute;mico (€/kWh)
                                    </label> 
                                </td>
                                <td>
                                    <label>
                                       Desconto
                                    </label> 
                                </td>
                                 <td>
                                    <label>
                                        Pre&ccedil;o da Pot&ecirc;ncia (l/dia)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Normal (€/kWh)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Econ&oacute;mico (€/kWh)
                                    </label> 
                                </td>
                               
                            </tr> 
                            <tr class="hero-unit">
                                <td colspan="3">
                                    <label>
                                        TVCF
                                    </label> 
                                </td>
                                <td >
                                    <input  id="tipo_desconto_bi" class="span1" type="text" placeholder="% ou €" name="tipo_desconto_bi">
                                </td>
                                <td colspan="3">
                                    <label>
                                        edpC
                                    </label> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        1,15 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_tvcf_1" name="preco_potencia_bi_tvcf_1">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_1" name="energia_normal_bi_tvcf_1">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_1" name="energia_economico_bi_tvcf_1">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_1" name="desconto_bi_tvcf_1">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_1" name="preco_potencia_bi_edpC_1">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_1" name="energia_normal_bi_edpC_1">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_1" name="energia_economico_bi_edpC_1">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        2,3 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_2" name="preco_potencia_bi_tvcf_2">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_2" name="energia_normal_bi_tvcf_2">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_2" name="energia_economico_bi_tvcf_2">  <br> 
                                </td>
                                <td>
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_2" name="desconto_bi_tvcf_2"> <br>

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_2" name="preco_potencia_bi_edpC_2">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_2" name="energia_normal_bi_edpC_2">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_2" name="energia_economico_bi_edpC_2">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        3,45 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_3" name="preco_potencia_bi_tvcf_3">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_3" name="energia_normal_bi_tvcf_3">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_3" name="energia_economico_bi_tvcf_3">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_3" name="desconto_bi_tvcf_3">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_3" name="preco_potencia_bi_edpC_3">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_3" name="energia_normal_bi_edpC_3">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_3" name="energia_economico_bi_edpC_3">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        4,6 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_4" name="preco_potencia_bi_tvcf_4">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_4" name="energia_normal_bi_tvcf_4">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_4" name="energia_economico_bi_tvcf_4">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_4" name="desconto_bi_tvcf_4">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_4" name="preco_potencia_bi_edpC_4">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_4" name="energia_normal_bi_edpC_4">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_4" name="energia_economico_bi_edpC_4">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        5,75 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_5" name="preco_potencia_bi_tvcf_5">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_5" name="energia_normal_bi_tvcf_5">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_5" name="energia_economico_bi_tvcf_5">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_5" name="desconto_bi_tvcf_5">  <br> 

                                </td>

                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_5" name="preco_potencia_bi_edpC_5">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_5" name="energia_normal_bi_edpC_5">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_5" name="energia_economico_bi_edpC_5">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        6,9 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_6" name="preco_potencia_bi_tvcf_6">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_6" name="energia_normal_bi_tvcf_6">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_6" name="energia_economico_bi_tvcf_6">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_6" name="desconto_bi_tvcf_6">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_6" name="preco_potencia_bi_edpC_6">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_6" name="energia_normal_bi_edpC_6">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_6" name="energia_economico_bi_edpC_6">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        10,35 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_7" name="preco_potencia_bi_tvcf_7">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_7" name="energia_normal_bi_tvcf_7">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_7" name="energia_economico_bi_tvcf_7">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_7" name="desconto_bi_tvcf_7">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_7" name="preco_potencia_bi_edpC_7">  <br> 
                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_7" name="energia_normal_bi_edpC_7">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_7" name="energia_economico_bi_edpC_7">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        13,8 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_8" name="preco_potencia_bi_tvcf_8">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_8" name="energia_normal_bi_tvcf_8">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_8" name="energia_economico_bi_tvcf_8">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_8" name="desconto_bi_tvcf_8">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_8" name="preco_potencia_bi_edpC_8">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_8" name="energia_normal_bi_edpC_8">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_8" name="energia_economico_bi_edpC_8">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        17,25 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_9" name="preco_potencia_bi_tvcf_9">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_9" name="energia_normal_bi_tvcf_9">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_9" name="energia_economico_bi_tvcf_9">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_9" name="desconto_bi_tvcf_9">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_9" name="preco_potencia_bi_edpC_9">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_9" name="energia_normal_bi_edpC_9">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_9" name="energia_economico_bi_edpC_9">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        20,7 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_10" name="preco_potencia_bi_tvcf_10">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_10" name="energia_normal_bi_tvcf_10">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_10" name="energia_economico_bi_tvcf_10">  <br> 
                                </td>
                                
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_10" name="desconto_bi_tvcf_10">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_10" name="preco_potencia_bi_edpC_10">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_10" name="energia_normal_bi_edpC_10">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_10" name="energia_economico_bi_edpC_10">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        27,6 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_11" name="preco_potencia_bi_tvcf_11">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_11" name="energia_normal_bi_tvcf_11">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_11" name="energia_economico_bi_tvcf_11">  <br> 
                                </td>
                        
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_11" name="desconto_bi_tvcf_11">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_11" name="preco_potencia_bi_edpC_11">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_11" name="energia_normal_bi_edpC_11">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_11" name="energia_economico_bi_edpC_11">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        34,5 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_12" name="preco_potencia_bi_tvcf_12">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_normal_bi_tvcf_12" name="energia_normal_bi_tvcf_12">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_12" name="energia_economico_bi_tvcf_12">  <br> 
                                </td>
                                
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_12" name="desconto_bi_tvcf_12">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_12" name="preco_potencia_bi_edpC_12">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_12" name="energia_normal_bi_edpC_12">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_12" name="energia_economico_bi_edpC_12">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        41,4 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="preco_potencia_bi_tvcf_13" name="preco_potencia_bi_tvcf_13">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_tvcf_13" name="energia_normal_bi_tvcf_13">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_bi_tvcf_13" name="energia_economico_bi_tvcf_13">  <br> 
                                </td>
                              
                                <td>
                                   <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"   id="desconto_bi_tvcf_13" name="desconto_bi_tvcf_13">  <br> 

                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_bi_edpC_13" name="preco_potencia_bi_edpC_13">  <br> 

                                </td>
                                <td>
                                    <input class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_bi_edpC_13" name="energia_normal_bi_edpC_13">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_bi_edpC_13" name="energia_economico_bi_edpC_13">  <br> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        Observa&ccedil;&otilde;es
                                    </label>
                                </td>
                                <td colspan="7">
                                    
                                    <textarea rows="4" cols="50" class="span6" id="observacao_bi" name="observacao_bi"></textarea>
                                   
                                </td>
                            </tr>
                </table>
             </fieldset>
            </td>
        </tr>
    
        <tr>
            <td valign="top" >
              <!---------------------- TABELA TRI-HORARIA ---------------------->
              <br>
              <fieldset align="center" >
                <table  id="table_tarifa_tri" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td WIDTH="200" HEIGHT="30"   align="left" colspan="10">
                                    <label>
                                        <h4> 1.3. Tarifa TRI-H&oacute;raria:  </h4>
                                    </label>
                                </td> 
                            </tr>
                            <tr class="hero-unit"> 
                                <td rowspan="2"> 
                                    <label>
                                        Pot&ecirc;ncia Contratada
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Pre&ccedil;o da Pot&ecirc;ncia (l/dia)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Normal (€/kWh)
                                    </label>
                                </td>
                                <td> 
                                    <label>
                                        Energia Econ&oacute;mico (€/kWh)
                                    </label> 
                                </td>
                                <td>
                                    <label>
                                        Energia Super Econ&oacute;mico (€/kWh)
                                    </label> 
                                </td>
                                <td>
                                    <label>
                                        Desconto
                                    </label> 
                                </td>
                                <td>
                                    <label>
                                        Pre&ccedil;o da Pot&ecirc;ncia (l/dia)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Normal (€/kWh)
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        Energia Econ&oacute;mico (€/kWh)
                                    </label> 
                                </td>
                                <td>
                                    <label>
                                        Energia Super Econ&oacute;mico (€/kWh)
                                    </label> 
                                </td>
                            </tr> 
                            <tr class="hero-unit">
                                <td colspan="4">
                                    <label>
                                        TVCF
                                    </label> 
                                </td>
                                <td>
                                    <input  id="tipo_desconto_tri" class="span1" type="text" placeholder="% ou €" name="tipo_desconto_tri">
                                </td>
                                <td colspan="4">
                                    <label>
                                        edpC
                                    </label> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td>
                                    <label>
                                        1,15 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_1" name="preco_potencia_tri_tvcf_1">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_1" name="energia_normal_tri_tvcf_1">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_1" name="energia_economico_tri_tvcf_1">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_1" name="energia_economico_super_tri_tvcf_1">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_1" name="desconto_tri_1">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_1" name="preco_potencia_tri_edpC_1">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_1" name="energia_normal_tri_edpC_1">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_1" name="energia_economico_tri_edpC_1">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_1" name="energia_economico_super_tri_edpC_1">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        2,3 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_2" name="preco_potencia_tri_tvcf_2">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_2" name="energia_normal_tri_tvcf_2">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_2" name="energia_economico_tri_tvcf_2">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_2" name="energia_economico_super_tri_tvcf_2">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_2" name="desconto_tri_2">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_2" name="preco_potencia_tri_edpC_2">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_2" name="energia_normal_tri_edpC_2">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_2" name="energia_economico_tri_edpC_2">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_2" name="energia_economico_super_tri_edpC_2">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        3,45 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_3" name="preco_potencia_tri_tvcf_3">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_3" name="energia_normal_tri_tvcf_3">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_3" name="energia_economico_tri_tvcf_3">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_3" name="energia_economico_super_tri_tvcf_3">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_3" name="desconto_tri_3">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_3" name="preco_potencia_tri_edpC_3">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_3" name="energia_normal_tri_edpC_3">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_3" name="energia_economico_tri_edpC_3">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_3" name="energia_economico_super_tri_edpC_3">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        4,6 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_4" name="preco_potencia_tri_tvcf_4">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_4" name="energia_normal_tri_tvcf_4">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_4" name="energia_economico_tri_tvcf_4">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_4" name="energia_economico_super_tri_tvcf_4">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_4" name="desconto_tri_4">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_4" name="preco_potencia_tri_edpC_4">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_4" name="energia_normal_tri_edpC_4">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_4" name="energia_economico_tri_edpC_4">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_4" name="energia_economico_super_tri_edpC_4">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        5,75 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_5" name="preco_potencia_tri_tvcf_5">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_5" name="energia_normal_tri_tvcf_5">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_5" name="energia_economico_tri_tvcf_5">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_5" name="energia_economico_super_tri_tvcf_5">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_5" name="desconto_tri_5">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_5" name="preco_potencia_tri_edpC_5">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_5" name="energia_normal_tri_edpC_5">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_5" name="energia_economico_tri_edpC_5">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_5" name="energia_economico_super_tri_edpC_5">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        6,9 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_6" name="preco_potencia_tri_tvcf_6">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_6" name="energia_normal_tri_tvcf_6">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_6" name="energia_economico_tri_tvcf_6">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_6" name="energia_economico_super_tri_tvcf_6">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_6" name="desconto_tri_6">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_6" name="preco_potencia_tri_edpC_6">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_6" name="energia_normal_tri_edpC_6">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_6" name="energia_economico_tri_edpC_6">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_6" name="energia_economico_super_tri_edpC_6">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        10,35 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_7" name="preco_potencia_tri_tvcf_7">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_7" name="energia_normal_tri_tvcf_7">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_7" name="energia_economico_tri_tvcf_7">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_7" name="energia_economico_super_tri_tvcf_7">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_7" name="desconto_tri_7">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_7" name="preco_potencia_tri_edpC_7">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_7" name="energia_normal_tri_edpC_7">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_7" name="energia_economico_tri_edpC_7">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_7" name="energia_economico_super_tri_edpC_7">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        13,8 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_8" name="preco_potencia_tri_tvcf_8">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_8" name="energia_normal_tri_tvcf_8">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_8" name="energia_economico_tri_tvcf_8">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_8" name="energia_economico_super_tri_tvcf_8">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_8" name="desconto_tri_8">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_8" name="preco_potencia_tri_edpC_8">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_8" name="energia_normal_tri_edpC_8">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_8" name="energia_economico_tri_edpC_8">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_8" name="energia_economico_super_tri_edpC_8">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        17,25 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_9" name="preco_potencia_tri_tvcf_9">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_9" name="energia_normal_tri_tvcf_9">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_9" name="energia_economico_tri_tvcf_9">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_9" name="energia_economico_super_tri_tvcf_9">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_9" name="desconto_tri_9">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_9" name="preco_potencia_tri_edpC_9">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_9" name="energia_normal_tri_edpC_9">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_9" name="energia_economico_tri_edpC_9">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_9" name="energia_economico_super_tri_edpC_9">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        20,7 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_10" name="preco_potencia_tri_tvcf_10">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_10" name="energia_normal_tri_tvcf_10">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_10" name="energia_economico_tri_tvcf_10">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_10" name="energia_economico_super_tri_tvcf_10">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_10" name="desconto_tri_10">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_10" name="preco_potencia_tri_edpC_10">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_10" name="energia_normal_tri_edpC_10">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_10" name="energia_economico_tri_edpC_10">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_10" name="energia_economico_super_tri_edpC_10">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        27,6 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_11" name="preco_potencia_tri_tvcf_11">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_11" name="energia_normal_tri_tvcf_11">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_11" name="energia_economico_tri_tvcf_11">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001"  id="energia_economico_tri_tvcf_11" name="energia_economico_super_tri_tvcf_11">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_11" name="desconto_tri_11">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_11" name="preco_potencia_tri_edpC_11">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_11" name="energia_normal_tri_edpC_11">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_11" name="energia_economico_tri_edpC_11">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_11" name="energia_economico_super_tri_edpC_11">  <br> 
                                </td>
                            
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        34,5 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_12" name="preco_potencia_tri_tvcf_12">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_12" name="energia_normal_tri_tvcf_12">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_12" name="energia_economico_tri_tvcf_12">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_12" name="energia_economico_super_tri_tvcf_12">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_12" name="desconto_tri_12">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_12" name="preco_potencia_tri_edpC_12">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_12" name="energia_normal_tri_edpC_12">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_12" name="energia_economico_tri_edpC_12">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_12" name="energia_economico_super_tri_edpC_12">  <br> 
                                </td>
                            
                             </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        41,4 kVA
                                    </label>
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_tvcf_13" name="preco_potencia_tri_tvcf_13">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_tvcf_13" name="energia_normal_tri_tvcf_13">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_13" name="energia_economico_tri_tvcf_13">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_tvcf_13" name="energia_economico_super_tri_tvcf_13">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" class="span2" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1"  id="desconto_tri_13" name="desconto_tri_13">  <br> 
                                </td>
                                <td>
                                   <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="preco_potencia_tri_edpC_13" name="preco_potencia_tri_edpC_13">  <br> 

                                </td>
                                <td>
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_normal_tri_edpC_13" name="energia_normal_tri_edpC_13">  <br> 

                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_13" name="energia_economico_tri_edpC_13">  <br> 
                                </td>
                                <td>                             
                                    <input  class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" id="energia_economico_tri_edpC_13" name="energia_economico_super_tri_edpC_13">  <br> 
                                </td>
                            </tr>
                             <tr class="hero-unit">
                                <td>
                                    <label>
                                        Observa&ccedil;&otilde;es
                                    </label>
                                </td>
                                <td colspan="9">
                                    <textarea rows="4" cols="50" class="span6" id="observacao_tri" name="observacao_tri_1"></textarea>
                                </td>
                            </tr>
                </table>
             </fieldset>
            </td> 
    </tr>
 
    </table>
    </fieldset>

    <br> <font color="red">*</font> Campo de Preenchimento Obrigat&oacute;rio  <br><br>
        <p align="center"><button id="select" type="submit" class="btn btn-primary btn-large btn-danger" onclick="valida_dados()">Inserir</button></p>
    
    </form>
    
    <?php 
       } //fecha IF do post 
    ?>
    <br><br><br>
      
    <hr>

    <footer>
        <p><strong>&copy; EDP Soluções Comerciais, S.A.</strong> <img class="pull-right" src="../assets/img/logo.gif"></p>
    </footer>
   
    </div> <!-- /container -->
        
    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>