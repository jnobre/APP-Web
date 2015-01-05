<?php
    session_start();
    include('../mysql.php');
    include('../mysqlconnect.php');
    include('../login_status.php');


    function get_gas()
    { 
        // Buscar lista de utilizadaores
        $sql="SELECT DISTINCT NOME FROM GAS";
        $result=mysql_query($sql) or die(mysql_error());
        return $result;
    }
    
    function getnome_tarifas()
    { 
        // Buscar lista de utilizadaores
        $sql="SELECT DISTINCT NOME_TARIFARIO FROM EMPRESAS_DISTRIBUIDORAS";
        $result=mysql_query($sql) or die(mysql_error());   
    
        return $result;
    }
    
    function getid_tarifario()
    { 
        // Buscar lista de utilizadaores
        $sql="SELECT DISTINCT ESTRUTURA_TARIFARIO FROM EMPRESAS_DISTRIBUIDORAS";
        $result=mysql_query($sql) or die(mysql_error());   
    
        return $result;
    }
    
    function getempresa_tarifario()
    { 
        // Buscar lista de utilizadaores
        $sql="SELECT DISTINCT NOME_EMPRESA FROM EMPRESAS_DISTRIBUIDORAS";
        $result=mysql_query($sql) or die(mysql_error());
   
    
        return $result;
    }

   if(isset($_GET['ET']))
   {
      $ET = ($_GET['ET'] === '' ? null : $_GET['ET']);
   }
   else
    $ET =  null;

   if(isset($_GET['nome']))
   {
      $nome =($_GET['nome'] === '' ? null : base64_decode($_GET['nome']));
   }
   else
    $nome = null;
    

   if(isset($_GET['nom_emp']))
   {
      $nome_emp =($_GET['nom_emp'] === '' ? null : base64_decode($_GET['nom_emp']));
   }
   else
    $nome_emp = null;

   if(isset($_GET['nome_plano']))
   {
      $nome_plan =($_GET['nome_plano'] === '' ? null : base64_decode($_GET['nome_plano']));
   }
   else
    $nome_plan = null;

 // echo ("Parametros ET == ".$ET." Nome == ".$nome." Nome empresa == ".$nome_emp." Nome do plano == ".$nome_plan."<br>");
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
    <script language="JavaScript" type="text/javascript" src="../assets/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script src="../jquery.min.js"></script>
    <script type="text/javascript">
    
    var conta = 2;
    $(document).ready(function()
    {        
        // Quando seleciona outro plano de gas
        $("#select_nome_tarifario").on('change', function() {
            // Recuperar nome tarifario selecionado 
            var selecionado = $("#select_nome_tarifario option:selected").val(); 
            // Mensagem de carregando 
            $("#select_id_tarifario").val("Carregando..."); 
            if(selecionado != 'outra')
            {
                 // Faz requisição ajax e envia o nome do selcionado via método POST 
                  $.post("../ajax/busca_criar_tarifario.php", {nome_tarifario_gas: selecionado}, function(resposta) { 
                      console.log("Resposta == "+resposta);
                      // Limpa a mensagem de carregamento 
                      $("#select_id_tarifario").empty(); 
                      // Coloca as input de id tarifario na DIV 
                      $("#select_id_tarifario").val(resposta); 
                  }); 
            }
            else
            {
              $("#select_id_tarifario").val(""); 
            }
        }); 
          
    });

    function is_float (mixed_var) {
        alert(mixed_var);
        return +mixed_var === mixed_var && (!isFinite(mixed_var) || !!(mixed_var % 1));
    }
    
    
    function valida_dados(form)
    {
        if ((form.nome_plano.value=="") && (form.select_nome_plano.value=="outra")) {
           alert("O Nome do plano não está preenchido!");
           form.nome_plano.focus();
           return false;
        }
        
        if ((form.nome_tarifario.value=="") && (form.select_nome_tarifario.value=="outra")) {
           alert("O Nome do Tarifário não está preenchido!");
           form.nome_tarifario.focus();
           return false;
        }
        
        if ((form.id_tarifario.value == "") && (form.select_id_tarifario.value == "")) {
           alert("ID Tarifario não está preenchido!");
           form.id_tarifario.focus();
           return false;
        }
        
        if ((form.empresa_distribuidora.value=="") && (form.select_empresa_distribuidora.value=="outra")) {
           alert("Empresa Distribuidora não está preenchido!");
           form.empresa_distribuidora.focus();
           return false;
        }

        if  (form.data_vigor.value=="") {
           alert("Data do Gás não está preenchido!");
           form.data_vigor.focus();
           return false;
        }
        
           
        return true;
    }
    
    function removeLinha(id){
               var teste = document.getElementById(id);
               teste.parentNode.parentNode.removeChild(teste.parentNode);
    }

    function novaLinha(){
    
                conta++;

                if(conta == 3)
                {
                    //escalao 3
                    var escalao_inicio = 501;
                    var escalao_fim = 1000;
                }
                else if(conta == 4)
                {
                    //escalao 4
                    var escalao_inicio = 1001;
                    var escalao_fim = 10000;
                }
                
                var parte1="<tr  class='hero-unit'><td WIDTH='200' HEIGHT='30'  align='center'>"+escalao_inicio+" - "+escalao_fim+"</td>";
                var parte2="<td WIDTH='200' HEIGHT='30'   align='center'><input  id='ttf_"+conta+"' class='span3' type='text' placeholder='TTF Esc "+conta+"' name='ttf_"+conta+"'></td>";
                var parte3="<td WIDTH='200' HEIGHT='30'  align='center'><input  id='energia_"+conta+"' class='span3' type='text' placeholder='Energia Esc "+conta+"' name='energia_"+conta+"'></td></tr>";
                var parte4="<tr class='hero-unit'><td id='coluna_escalao_"+conta+"' colspan='3' align='right'><form><input type='button'  class=' btn-primary btn-mini btn-danger' value='+' onClick='javascript:novaLinha()'></input></form></td></tr>";
    
                var aux = conta-1;
                removeLinha("coluna_escalao_" + aux);
                var partetotal=parte1+parte2+parte3;
                
                //document.getElementById("table_escalao").innerHTML += parte1 + parte2 + parte3;
                $("#table_escalao").last().append(partetotal);
                /*document.getElementById("table_escalao").append(parte2);
                document.getElementById("table_escalao").append(parte3);*/
                if(conta<4)
                {
                    $("#table_escalao").last().append(parte4);
                }
        }
        
         totals =0;
        function adiciona(){
        totals++
            tbl = document.getElementById("tabela")
     
            var novaLinha = tbl.insertRow(-1);
            var novaCelula;
     
            if(totals%2==0) cl = "#F5E9EC";
            else cl = "#FBF6F7";
     
            novaCelula = novaLinha.insertCell(0);
     
            novaCelula.style.backgroundColor = cl
     
            novaCelula.innerHTML = "<input type='checkbox' name='chkt' />";
     
            novaCelula = novaLinha.insertCell(1);
            novaCelula.align = "left";
            novaCelula.style.backgroundColor = cl;
            novaCelula.innerHTML = "&nbsp; Linha"+totals+"";
     
            novaCelula = novaLinha.insertCell(2);
            novaCelula.align = "left";
            novaCelula.style.backgroundColor = cl;
            novaCelula.innerHTML = "&nbsp;ops3";
     
            novaCelula = novaLinha.insertCell(3);
            novaCelula.align = "left";
            novaCelula.style.backgroundColor =cl;
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
              <li><a href="../pesquisar.php">Pesquisar</a></li>
              <li class="dropdown active">
              <?php 
                if(login_status()==1)
                {
                    ?>
                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li><a href="profile.php">Minha Conta</a></li>
                  <li><a href="registar.php">Criar User</a></li>
                  <li><a href="listarusers.php">Gerir Users Existentes </a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li class="active"><a href="criaroferta.php">Criar Oferta</a></li>
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
                }?>
                
            </ul>
            <?php
                if(login_status()==1)
                {
                    ?>
                    <div class="navbar-form pull-right"> 
                    <ul class="nav">
                    <li style="line-height:15px"> <br><font color="white"> <?php
                    echo("Bem Vindo <a href=profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");
                    echo ("  <a href='../logout.php'>[Logout]</a>")
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
   // echo "Entra aqui nom plano == ".$_POST['nome_plano']." nome tarifario == ".$_POST['nome_tarifario']." id tarifario == ".$_POST['id_tarifario']." empresa dist == ".$_POST['empresa_distribuidora']."<br>";

    if(($_POST['nome_plano'] || ($_POST['select_nome_plano']!='outra')) && ($_POST['nome_tarifario'] || ($_POST['select_nome_tarifario']!='outra')) && ($_POST['id_tarifario'] || ($_POST['select_id_tarifario'])) && ($_POST['empresa_distribuidora'] || ($_POST['select_empresa_distribuidora']!='outra')) && ($_POST['data_vigor']))
    {

            $correct=0;  
            $contador=2;
            $escalao_arry=array();
            $data_vigor = $_POST['data_vigor'];
            
            if($_POST['observacao'])
            {
                $observacao = $_POST['observacao'];
            }
            else
                $observacao = null;
            
            if(!empty($_POST['nome_plano']))
            {
                 $nome_plano=$_POST['nome_plano']; 
            }
            else if($_POST['select_nome_plano'] != 'outra')
            {
                 $nome_plano=$_POST['select_nome_plano'];
            }
            
            if(!empty($_POST['nome_tarifario']))
            {
                 $nome_tarifario=$_POST['nome_tarifario']; 
            }
            else if($_POST['select_nome_tarifario'] != 'outra')
            {
                 $nome_tarifario=$_POST['select_nome_tarifario'];
            }
            
            if(!empty($_POST['nome_tarifario']))
            {
                 $nome_tarifario=$_POST['nome_tarifario']; 
            }
            else if($_POST['select_nome_tarifario'] != 'outra')
            {
                 $nome_tarifario=$_POST['select_nome_tarifario'];
            }
            
            if(!empty($_POST['id_tarifario']))
            {
                $id_tarifario=$_POST['id_tarifario'];  
            }
            else if($_POST['select_id_tarifario'] != 'outra')
            {
                $id_tarifario=$_POST['select_id_tarifario'];
            }
           
            if(!empty($_POST['empresa_distribuidora']))
            {
                $empresa_distribuidora=$_POST['empresa_distribuidora'];  
            }
            else if($_POST['select_empresa_distribuidora'] != 'outra')
            {
                $empresa_distribuidora=$_POST['select_empresa_distribuidora'];
            }
            
            if(isset($_POST['tipo_desconto_ttf']))
            {
              if($_POST['tipo_desconto_ttf'] != '%' && $_POST['tipo_desconto_ttf'] != '€')
                $tipo_desconto_ttf = '%';
              else
                $tipo_desconto_ttf = $_POST['tipo_desconto_ttf']; 
            }
            else
             $tipo_desconto_ttf = $_POST['tipo_desconto_ttf']; 

           if(isset($_POST['tipo_desconto_edpC']))
           {
              if($_POST['tipo_desconto_edpC'] != '%' && $_POST['tipo_desconto_edpC'] != '€')
                $tipo_desconto_edpC = '%';
              else
                $tipo_desconto_edpC = $_POST['tipo_desconto_edpC']; 
           }
           else
             $tipo_desconto_edpC = $_POST['tipo_desconto_edpC']; 

            $contador = 0;
            if(($_POST['ttf_edpC_1']!=0 && $_POST['energia_edpC_1']!=0))
            { 
              $escalao_arry[$contador]['ttf_tvcf']=$_POST['ttf_tvcf_1'];
              $escalao_arry[$contador]['energia_tvcf']=$_POST['energia_tvcf_1'];
              $escalao_arry[$contador]['desconto_ttf']=($_POST['desconto_ttf_1'] == 0 ? null : $_POST['desconto_ttf_1'] . $tipo_desconto_ttf);
              $escalao_arry[$contador]['desconto_energia']=($_POST['desconto_energia_1']  == 0 ? null : $_POST['desconto_energia_1'] . $tipo_desconto_edpC);
              $escalao_arry[$contador]['ttf_edpC']=$_POST['ttf_edpC_1'];
              $escalao_arry[$contador]['energia_edpC']=$_POST['energia_edpC_1'];
              $contador++;
            }
            
            if(($_POST['ttf_edpC_2']!=0 && $_POST['energia_edpC_2']!=0))
            {   
              $escalao_arry[$contador]['ttf_tvcf']=$_POST['ttf_tvcf_2'];
              $escalao_arry[$contador]['energia_tvcf']=$_POST['energia_tvcf_2'];
              $escalao_arry[$contador]['desconto_ttf']=($_POST['desconto_ttf_2'] == 0 ? null : $_POST['desconto_ttf_2'] . $tipo_desconto_ttf);
              $escalao_arry[$contador]['desconto_energia']=($_POST['desconto_energia_2']  == 0 ? null : $_POST['desconto_energia_2'] . $tipo_desconto_edpC);
              $escalao_arry[$contador]['ttf_edpC']=$_POST['ttf_edpC_2'];
              $escalao_arry[$contador]['energia_edpC']=$_POST['energia_edpC_2'];
              $contador++;
            }
        
            if(($_POST['ttf_edpC_3']!=0 && $_POST['energia_edpC_3']!=0))
            { 
                $escalao_arry[$contador]['ttf_tvcf']=$_POST['ttf_tvcf_3'];
                $escalao_arry[$contador]['energia_tvcf']=$_POST['energia_tvcf_3'];
                $escalao_arry[$contador]['desconto_ttf']=($_POST['desconto_ttf_3'] == 0 ? null : $_POST['desconto_ttf_3'] . $tipo_desconto_ttf);
                $escalao_arry[$contador]['desconto_energia']=($_POST['desconto_energia_3']  == 0 ? null : $_POST['desconto_energia_3'] . $tipo_desconto_edpC);
                $escalao_arry[$contador]['ttf_edpC']=$_POST['ttf_edpC_3'];
                $escalao_arry[$contador]['energia_edpC']=$_POST['energia_edpC_3'];  
                $contador++;             
            }
            
            if(($_POST['ttf_edpC_4']!=0 && $_POST['energia_edpC_4']!=0))
            { 
                $escalao_arry[$contador]['ttf_tvcf']=$_POST['ttf_tvcf_4'];
                $escalao_arry[$contador]['energia_tvcf']=$_POST['energia_tvcf_4'];

                $escalao_arry[$contador]['desconto_ttf']=($_POST['desconto_ttf_4'] == 0 ? null : $_POST['desconto_ttf_4'] . $tipo_desconto_ttf);
                $escalao_arry[$contador]['desconto_energia']=($_POST['desconto_energia_4']  == 0 ? null : $_POST['desconto_energia_4'] . $tipo_desconto_edpC);
                $escalao_arry[$contador]['ttf_edpC']=$_POST['ttf_edpC_4'];
                $escalao_arry[$contador]['energia_edpC']=$_POST['energia_edpC_4']; 
                $contador++;
            }
            
          //  echo "Desconto 1 == ".$escalao_arry[0]['desconto_ttf']." / 2 == ".$escalao_arry[0]['desconto_energia']." <br>";
             /*echo"Nome Plano == ".$nome_plano."<br>";
            echo"Nome Tarifario == ".$nome_tarifario."<br>";
            echo"ID Tarifario == ".$id_tarifario."<br>";
            echo"Empresa Distribuidora == ".$empresa_distribuidora."<br>";*/
     
           $flag_gas = 0;    
           if ($stmt = $mysqli->prepare("SELECT * FROM EMPRESAS_DISTRIBUIDORAS WHERE NOME_TARIFARIO = ? AND ESTRUTURA_TARIFARIO = ? AND DATA= ?")) 
           {                
                $stmt->bind_param('sss', $nome_tarifario,$id_tarifario,$data_vigor); 
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->fetch();
              // echo("Plano == ".$nome_plano." Data == ".$data_vigor." Numero de linhas == ".$stmt->num_rows."<br>");
          
                  if($stmt->num_rows == 0)
                  {
                        $stmt->close();         
                        if($insert_stmt = $mysqli->prepare("INSERT INTO GAS (ID,NOME,DATA,OBS) VALUES (NULL,?,'0000-00-00',NULL)")) 
                        {                       
                            $insert_stmt->bind_param('s',$nome_plano);
                            $ok=$insert_stmt->execute();
                            $id_gas=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                $flag_gas = -1;
                                //echo "Insucesso GAS == ".$mysqli->error."!!!<br>"; 
                            }
                            else
                                $flag_gas = 1;
                            $insert_stmt->close(); 
                               
                        }
                        else
                            $flag_gas = -1; 
          
                        $flag_empresas = 0;
                        if($insert_stmt = $mysqli->prepare("INSERT INTO EMPRESAS_DISTRIBUIDORAS (NOME_TARIFARIO,GAS_IDGAS,NOME_EMPRESA,ESTRUTURA_TARIFARIO,DATA,OBS) VALUES (?,?,?,?,?,?)"))
                        {                                
                            $insert_stmt->bind_param('sdssss',$nome_tarifario,$id_gas,$empresa_distribuidora,$id_tarifario,$data_vigor,$observacao);
                            $ok=$insert_stmt->execute();
                            $id_empresa=$mysqli->insert_id;
                            if(!$ok)
                            {  
                               // echo "Insucesso EMPRESAS_DISTRIBUIDORAS == ".$mysqli->error."!!!<br>"; 
                                $flag_empresas = -1;
                            }
                            else
                                $flag_empresas = 1;
                            $insert_stmt->close();
                        }
                        else
                            $flag_empresas = -1;
          
                        $escalao_inicio = 0;
                        $escalao_fim = 220;
                        $ttf_tvcf =  $escalao_arry[0]['ttf_tvcf'];
                        $energia_tvcf = $escalao_arry[0]['energia_tvcf'];
                        $desconto_ttf = $escalao_arry[0]['desconto_ttf'];
                        $desconto_energia = $escalao_arry[0]['desconto_energia'];
                        $ttf_edpC = $escalao_arry[0]['ttf_edpC'];
                        $energia_edpC = $escalao_arry[0]['energia_edpC'];


                       /* echo "ID gas == ".$id_gas." Empresa distribuidora == ".$empresa_distribuidora."<br>";
                        echo "Escalao inicio == " . $escalao_inicio . "<br>";
                        echo "ttf_tvcf == " . $ttf_tvcf ."<br>";
                        echo "energia_tvcf == ". $energia_tvcf . "<br>";
                        echo "desconto == ". $desconto ."<br>";
                        echo "ttf_edpC == ".$ttf_edpC ."<br>";
                        echo "energia_edpC == ".$energia_edpC."<br>";
                        echo "<br>";*/

                        $flag_escalao = 0;
                        
                          if($insert_stmt = $mysqli->prepare("INSERT INTO ESCALAO (IDESCALAO,EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS,EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA,ESCALAO_INICIO,ESCALAO_FIM,TERMO_TARIFARIO_FIXO_TVCF,ENERGIA_TVCF,DESCONTO_TTF,DESCONTO_ENERGIA,TERMO_TARIFARIO_FIXO_edpC,ENERGIA_edpC) VALUES (NULL,?,?,?,?,?,?,?,?,?,?)"))
                          {
                               $insert_stmt->bind_param('dsddddssdd',$id_gas,$empresa_distribuidora,$escalao_inicio,$escalao_fim,$ttf_tvcf,$energia_tvcf,$desconto_ttf,$desconto_energia,$ttf_edpC,$energia_edpC);
                               for($row=0 ; $row < count($escalao_arry) ; $row++)
                               {                             
                                  if($row==0)
                                  {
                                      $escalao_inicio=0;
                                      $escalao_fim=220;
                                  }
                                  else if($row==1)
                                  {
                                      $escalao_inicio=221;
                                      $escalao_fim=500;
                                  }
                                  else if($row==2)
                                  {
                                      $escalao_inicio=501;
                                      $escalao_fim=1000;
                                  }
                                  else if($row==3)
                                  {
                                      $escalao_inicio=1001;
                                      $escalao_fim=10000;
                                  }

                                  echo "Linha == ".$row."<br>";
                                  
                                  $ttf_tvcf = $escalao_arry[$row]['ttf_tvcf'];
                                  $energia_tvcf = $escalao_arry[$row]['energia_tvcf'];
                                  $desconto_ttf = $escalao_arry[$row]['desconto_ttf'];
                                  $desconto_energia = $escalao_arry[$row]['desconto_energia'];
                                  $ttf_edpC = $escalao_arry[$row]['ttf_edpC'];
                                  $energia_edpC = $escalao_arry[$row]['energia_edpC'];
                                  if($escalao_arry[$row]['energia_edpC']!= null)
                                     $ok=$insert_stmt->execute();
                                  $id_escalao=$mysqli->insert_id;
                                  if(!$ok)
                                    echo "<div align='center'><h4>Inserc&ccedil;&atilde;o Escalão [".$escalao_inicio."-".$escalao_fim."] [<font color='red'>FALHOU</font>]</h4></div>";
                                      
                              
                              }
                              $insert_stmt->close(); 
          
                         }
                     
                        if($flag_gas == -1)
                        {
                          echo "<div align='center'><h4>Inserc&ccedil;&atilde;o GÁS[<font color='red'>FALHOU</font>]</h4></div>";
                        }
                        else
                          echo "<div align='center'><h4>Inserc&ccedil;&atilde;o GÁS [<font color='#4CC417'>OK</font>]</h4></div>";
                            
                        if($flag_empresas == -1)
                        {
                          echo "<div align='center'><h4>Inserc&ccedil;&atilde;o EMPRESAS DISTRIBUIDORA [<font color='red'>FALHOU</font>]</h4></div>";
                        }
                        else
                          echo "<div align='center'><h4>Inserc&ccedil;&atilde;o EMPRESAS DISTRIBUIDORA [<font color='#4CC417'>OK</font>]</h4></div>";

                }
                else
                {
                     echo "<div align='center'><h4> Tarif&aacute;rio de G&Aacute;S j&aacute; existe![<font color='red'>FALHOU</font>]</h4></div>";
                }
                echo "<div align='center'><h4>Rederecionando...</h4></div>";
                ?>            
                    <meta HTTP-EQUIV="REFRESH" content="3; url=criartarifario_gas.php">
                <?php

           }

    }
    else
    {
    ?>
    
    <form method="post" action="criartarifario_gas.php" onsubmit="return valida_dados(this);" name="criartarifario_gas"> 
    <!---------------------- TABELA PRINCIPAL ---------------------->
    <fieldset align="center" >
    <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF" >
    <tr>
            <td colspan = "2">
                    <label>
                        <h3>Adicionar Tarif&aacute;rio de G&aacute;s:</h3>
                    </label>
                </td>            
    </tr> 
         
     <tr>
            <td colspan="2">
              <fieldset align="center" >
               <!-- <p align="center" ><h4>4.1 Electricidade:</h4></p> -->
        <table  id="table_tarifa_simples" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
           <tr class="hero-unit">
              <td WIDTH="200" HEIGHT="30" colspan="2"  align="left">
                    <label>
                      <h4> 1. Tarif&aacute;rio:</h4>
                    </label>
                </td>     
          </tr>
                <tr  class="hero-unit">
                <td   width="20%" align="center">
                        <label> 
                          Nome Plano:<font color="red">*</font>
                </label>
                    </td> 
                    <td align="left"> 
                        <select id="select_nome_plano" name="select_nome_plano" class="span2">
                        <?php
                                echo("<option value='outra' selected>Outra</option>");  
                                if($nome_plan == Null)
                                {                  
                                  $result=get_gas();
                                  $rows=mysql_num_rows($result);
                                  while($row = mysql_fetch_array($result))
                                  {                
                                      echo("<option value='".$row['NOME']."' >".$row['NOME']."</option>");  
                                  }
                                }
                            ?>
                        </select>
                  <?php
                    if($nome_plan == NULL)
                    {
                  ?>
                  <input  id="nome_plano" class="span3" type="text" placeholder="Nome Plano" name="nome_plano">          
                  <?php
                    }
                    else
                    {
                  ?>  
                    <input  id="nome_plano" value="<?php echo($nome_plan); ?>" readonly  class="span3" type="text" placeholder="Nome Plano" name="nome_plano">
                    <?php } ?>
                  </td>
          </tr>
          <tr  class="hero-unit">
              <td   width="20%" align="center">
                        <label> 
                          Nome Tarif&aacute;rio:<font color="red">*</font>
                </label>
                    </td> 
                    <td align="left">
                  <select id="select_nome_tarifario" name="select_nome_tarifario" class="span2">
                              <?php
                               echo ("<option value='outra' selected>Outra</option>");
                              if($nome == NULL)
                              {
                                $result=getnome_tarifas();
                                $rows=mysql_num_rows($result);
                                while($row = mysql_fetch_array($result))
                                {
                                    $nome_tarifario = $row['NOME_TARIFARIO'];                     
                                    echo("<option value='".$nome_tarifario."' >".$row['NOME_TARIFARIO']."</option>");  
                                }
                              }
                            ?>
                        </select>
                        <?php 
                        if($nome == NULL)
                        {
                          ?>
                          <input  id="nome_tarifario" class="span3" type="text" placeholder="Nome Tarif&aacute;rio" name="nome_tarifario">         
                          <?php }else{ ?>
                          <input  id="nome_tarifario"  readonly class="span3" value= "<?php echo($nome); ?>" type="text" placeholder="Nome Tarif&aacute;rio" name="nome_tarifario">         
                          <?php } ?>

                    </td>
          </tr>
          <tr  class="hero-unit">
                  <td   width="20%" align="center">
                        <label> 
                          ID Tarif&aacute;rio:<font color="red">*</font>
                </label>
                    </td> 
                    <td align="left">
                        <!--<select id="select_id_tarifario" name="select_id_tarifario" class="span2">
                            <<option value="outra" selected>Outra</option>
                            <?php

                              /*  $result=getid_tarifario();
                                $rows=mysql_num_rows($result);
                                while($row = mysql_fetch_array($result))
                                {                 
                                    echo("<option value='".$row['ESTRUTURA_TARIFARIO']."' >".$row['ESTRUTURA_TARIFARIO']."</option>");  
                                }*/

                            ?>
                        </select>-->
                  <?php 
                    if($ET == NULL)
                    {
                  ?>
                        <input id="select_id_tarifario" type="text" name="select_id_tarifario" class="span2" disabled>
                        <input  id="id_tarifario" class="span3" type="text" placeholder="ID Tarif&aacute;rio" name="id_tarifario">         
                  <?php }else{ ?>
                        <input id="select_id_tarifario" disabled type="text" name="select_id_tarifario" class="span2" disabled>
                        <input  readonly id="id_tarifario"  value="<?php echo($ET); ?>" class="span3" type="text"  name="id_tarifario">         
                  <?php } ?>
                    </td> 
          </tr>
          <tr  class="hero-unit">
            <td   width="20%" align="center">
                 <label> 
                     Empresa Distribuidora:<font color="red">*</font>
                </label>
              </td> 
              <td align="left">
                        <select id="select_empresa_distribuidora" name="select_empresa_distribuidora" class="span2">
                          <?php
                                echo("<option value='outra'selected>Outra</option>");
                                if($nome_emp == Null)
                                {
                                  $result=getempresa_tarifario();
                                  $rows=mysql_num_rows($result);
                                  while($row = mysql_fetch_array($result))
                                  {                 
                                      echo("<option value='".$row['NOME_EMPRESA']."'>".$row['NOME_EMPRESA']."</option>");  
                                  }
                                }
                            ?>
                        </select>
                  <?php
                    if($nome_emp == Null)
                    { ?>
                        <input  id="empresa_distribuidora" class="span3" type="text" placeholder="Empresa Distribuidora" name="empresa_distribuidora">         
                    <?php }else{ ?>
                    <input  id="empresa_distribuidora" readonly value="<?php echo($nome_emp); ?>" class="span3" type="text" placeholder="Empresa Distribuidora" name="empresa_distribuidora">         
                    <?php } ?>
                    </td>         
          </tr>
                <tr class="hero-unit">
                    <td   width="20%" align="center">
                        <label>    
                            Data (entra em vigor):<font color="red">*</font>
                        </label>
                    </td> 
                    <td align="left">
                        <input  id="data_vigor" class="span2" type="date" name="data_vigor">  

                    </td> 
                  </tr>
                  <tr class="hero-unit">
                      <td align = "left" colspan="2">
                          <h5>&nbsp; &nbsp; <font color="red">*</font> Campo de Preenchimento Obrigat&oacute;rio  </h5>
                      </td>
                  </tr>
                </tr>
             </table>
            </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <br><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                    <fieldset align="center">
                        <table  id="table_escalao" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr class="hero-unit">
                                <td align="left" colspan="7">
                                    <label>
                                       <h4>2. Escal&otilde;es:</h4>
                                    </label>
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td rowspan="2" align="center">
                                   <label>N&uacute;mero de Escal&atilde;o</label>
                                </td> 
                                <td  colspan="3" align="center">
                                    <label>Termo Tarif&aacute;rio Fixo (€/dia)</label> 
                                </td>
                                <td  colspan="3" align="center">
                                   <label>Energia (€/kWh)</label>
                                </td>
                               
                          </tr>
                          <tr class="hero-unit">
                               <td >
                                  <label>TVCF</label>
                               </td>
                               <td>
                                  <input  id="tipo_desconto_ttf" class="span1" type="text" placeholder="% ou €" name="tipo_desconto_ttf">
                                <td >
                                   <label>edpC<font color="red">*</font></label>
                                </td>
                                 <td >
                                  <label>TVCF</label>
                               </td>
                               <td>
                                  <input  id="tipo_desconto_edpC" class="span1" type="text" placeholder="% ou €" name="tipo_desconto_edpC">
                                <td >
                                   <label>edpC<font color="red">*</font></label>
                                </td>
                          </tr>
                          <tr class="hero-unit">
                                <td  align="center">
                                    0 - 220                
                                </td> 
                                <td  align="center">
                                    <input  id="ttf_tvcf_1" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_tvcf_1">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_ttf_1" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_ttf_1">
                                </td>
                                <td  align="center">
                                    <input  id="ttf_edpC_1" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_edpC_1">
                                </td>
                                <td align="center">
                                    <input  id="energia_tvcf_1" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_tvcf_1">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_energia_1" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_energia_1">
                                </td>
                                <td  align="center">
                                    <input  id="energia_edpC_1" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_edpC_1">
                                </td>
                          </tr>
                          <tr class="hero-unit">
                              <td align="center">
                                   221 - 500
                                </td> 
                                <td  align="center">
                                    <input  id="ttf_tvcf_2" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_tvcf_2">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_ttf_2" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_ttf_2">
                                </td>
                                <td  align="center">
                                    <input  id="ttf_edpC_2" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_edpC_2">
                                </td>
                                <td  align="center">
                                    <input  id="energia_tvcf_2" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_tvcf_2">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_energia_2" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_energia_2">
                                </td>
                                
                                <td  align="center">
                                    <input  id="energia_edpC_2" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_edpC_2">
                                </td>
                          </tr>
                          <tr class="hero-unit">
                                <td  align="center">
                                   501 - 1000
                                </td> 
                                <td align="center">
                                    <input  id="ttf_tvcf_3" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_tvcf_3">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_ttf_3" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_ttf_3">
                                </td>
                                <td  align="center">
                                    <input  id="ttf_edpC_3" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_edpC_3">
                                </td>
                                <td  align="center">
                                    <input  id="energia_tvcf_3" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_tvcf_3">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_energia_3" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_energia_3">
                                </td>
                                <td  align="center">
                                    <input  id="energia_edpC_3" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_edpC_3">
                                </td>
                          </tr>
                          <tr class="hero-unit">
                                <td align="center">
                                   1001 - 10000
                                </td> 
                                <td  align="center">
                                    <input  id="ttf_tvcf_4" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_tvcf_4">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_ttf_4" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_ttf_4">
                                </td>
                                <td  align="center">
                                    <input  id="ttf_edpC_4" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="ttf_edpC_4">
                                </td>
                                <td  align="center">
                                    <input  id="energia_tvcf_4" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_tvcf_4">
                                </td>
                                <td  align="center">
                                    <input  id="desconto_energia_4" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" max="100" step="0.1" name="desconto_energia_4">
                                </td>
                                <td  align="center">
                                    <input  id="energia_edpC_4" class="span23" pattern="{^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$}" type="number" min="0" step="0.0001" name="energia_edpC_4">
                                </td>
                          </tr>
                        </table>
                    <fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <br><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                 <fieldset align="center">
                        <table  id="table_escalao" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr class="hero-unit">
                                <td align="left">
                                    <label>
                                       <h4>3. Observa&ccedil;&atilde;o:</h4>
                                    </label>
                                </td>
                            </tr>
                            <tr class="hero-unit">
                              <td align="center">
                                    <label>
                                      <textarea rows="4" cols="50" class="span6" id="observacao" name="observacao"></textarea>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    <fieldset>
            </td>        
        </tr>

    </table>
    </fieldset>

    <br>
   
    <br><br>
        <p align="center"><button id="select" type="submit" class="btn btn-primary btn-large btn-danger" >Inserir</button></p>
    </form>
    <br><br><br>
    <?php
    }
    ?>
    <hr>

    <footer>
        <p><strong>&copy; EDP Soluções Comerciais</strong> <img class="pull-right" src="../assets/img/logo.gif"></p>
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