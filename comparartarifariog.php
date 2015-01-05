<?php 
     session_start();
     //error_reporting(E_ERROR);
    include('mysql.php');
    include('login_status.php');
    $et1=$_GET['ET1'];
    $et2=$_GET['ET2'];
    
    if($et1==NULL || $et2==NULL)
    {
      exit("ET INVALIDO<br><a href=javascript:history.go(-1)>[VOLTAR]</a>");
      ?>

      <?php
    }
   // echo("ET1=" . $et1);
  //  echo("ET2=" . $et2);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <title>EDP Fatura&ccedil;&atilde;o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/tabela.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }

    </style>
    
         <style type="text/css" title="currentStyle">
            @import "assets/table/media/css/mystyle.css";
           
        
        </style>
    
    <script type="text/javascript" language="javascript" src="assets/table/media/js/jquery.js"></script>  
    <script src="jquery.min.js"></script>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
     <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
         var controlo=1;
      function errorbox(){
         window.alert("Erro no Login!");
          return true;
      }
      
      function esconder(){
           //alert("Esconder");
          //echo "Controlo == ".$control;
          if(controlo == 0)
          {   
              $("#login").hide("slow");
              controlo=1;
              //$("#login_li").hide("slow");
          } else {
             $("#login").show(1000);
             // $("#login_li").show(1000);
             controlo=0;
          }
          
      }
          
      window.onload = function(){
           $("#login").hide();
       }
    </script>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/img/EDP_logo.jpg">
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
              <li ><a href="index.php">Inicio</a></li>
              <li class="active"><a href="listar.php">Listar</a></li>
              <li><a href="pesquisar.php">Pesquisar</a></li>
            <?php if(login_status()!=1)
            {?>
              <li id="login_li"><a href="#" onclick="esconder()">Login</a></li> <?php } ?>
              <li class="dropdown">
              
              <?php 
                if(login_status()==1)
                {
                    ?>

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li ><a href="admin/profile.php">Minha Conta</a></li>
                  <li> <a href="admin/registar.php">Criar User</a> </li>
                  <li> <a href="admin/listarusers.php">Gerir Utilizadores Existentes</a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="admin/criaroferta.php">Criar Oferta</a></li>
                  <li><a href="admin/gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                  <li><a href="admin/gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="admin/gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Servidor</li>
                  <li><a href="admin/log_operacao.php">Ver Log de Operações</a></li>
                  
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
                    echo("Bem Vindo <a href=admin/profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");
                    echo ("  <a href='logout.php'>[Logout]</a>");
                    ?></font></ul></li></div><?php
                }
                else
                {
            ?>  
                
                <form id="login" method="post" action="login.php?lastpage=index.php" name="login" class="navbar-form pull-right">
                  <input class="span2" type="text" placeholder="Utilizador" name="user">
                  <input class="span2" type="password" placeholder="Password" name="pass">
                  <button type="submit" class="btn">Login</button>
                </form>
            <?php
                }
            ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- GN1 SQL e GN2 SELECT ALL DATA -->
    <?php
          //Operação : Buscar Tarifário GN 1
            $sql1="SELECT *  FROM EMPRESAS_DISTRIBUIDORAS WHERE ESTRUTURA_TARIFARIO='" . $et1 . "' LIMIT 1";
            //echo("SQL1:" . $sql1);
            $resultempresa1 = mysqli_query($mysqli,$sql1); 

            $rowempresa1 = mysqli_fetch_array($resultempresa1);       
            $nomeet1= $rowempresa1['NOME_TARIFARIO'];
            $idgas1=$rowempresa1['GAS_IDGAS'];
            $nomeempresa1=$rowempresa1['NOME_EMPRESA'];
            $sql="SELECT ESCALAO_INICIO,ESCALAO_FIM, TERMO_TARIFARIO_FIXO_edpC,ENERGIA_edpC FROM ESCALAO WHERE EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS=" . $idgas1 . " AND replace(EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA,' ','')=replace('" . $nomeempresa1 . "',' ','') ORDER BY ESCALAO_INICIO ASC";
            //echo ($sql);
            $result1= mysqli_query($mysqli,$sql);
                              
          // Operação : Buscar Tarifário GN 2

            $resultempresa2 = mysqli_query($mysqli,"SELECT *  FROM EMPRESAS_DISTRIBUIDORAS WHERE ESTRUTURA_TARIFARIO='" . $et2 . "' LIMIT 1"); 
            $data2 = mysqli_fetch_array($resultempresa2);       
            $nomeet2= $data2['NOME_TARIFARIO'];
            $idgas2=$data2['GAS_IDGAS'];
            $nomeempresa2=$data2['NOME_EMPRESA'];
            $sql2="SELECT ESCALAO_INICIO,ESCALAO_FIM, TERMO_TARIFARIO_FIXO_edpC,ENERGIA_edpC FROM ESCALAO WHERE EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS=" . $idgas2 . " AND replace(EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA,' ','')=replace('" . $nomeempresa2 . "',' ','') ORDER BY ESCALAO_INICIO ASC";
            //echo ("<br>" . $sql2);
            $result2= mysqli_query($mysqli,$sql2);

    ?> 

    <div class="container">
    <br>
     <?php 

      if($result1->num_rows==0 || $result2->num_rows==0)
      {
        echo("<div align='center'>");
        //Ver qual result é invalido e mostrar mensagem de erro detalhada
        if($result1->num_rows==0 && $result2->num_rows==0)
        {
          
            echo("A Estrutura Tarifária [" . $et1 . "] e a Estrutura Tarifária [" . $et2 ."] são inválidas. Impossível executar operação.<a href=javascript:history.go(-1)>[VOLTAR]</a>");

        }
        else if($result1->num_rows==0)
        {


          echo("A Estrutura Tarifária [" . $et1 . "] é inválida. Impossível executar operação.<a href=javascript:history.go(-1)>[VOLTAR]</a>");
        }
        else if($result2->num_rows==0)
        {

          echo("A Estrutura Tarifária [" . $et2 . "] é inválida. Impossível executar operação.<a href=javascript:history.go(-1)>[VOLTAR]</a>");

        }

        echo("</div><br><br><br><br><br><br><br><br>");

      }

    else
    {


      ?>
    <h4 align="center"> <?php echo $nomeet1 ?> VS <?php echo $nomeet2 ?> </h4>
  
    <br>
      <hr style="border-color:#f00; background-color: #f00;"> 
    <h5 align="center"> Notas:</h5>
    <h6> 1.Em baixo segue-se uma tabela que irá mostrar uma comparação de preços entre as duas ofertas selecionadas.</h6>
    <h6> 2.O 'template' da tabela é o seguinte:Escalão Termo Tarifário Fixo da Oferta 1 , Termo Tarifário Fixo da Oferta 2 , Cálculo da diferença entre os preços , Preço da Energia da Oferta 1 , Preço da Energia Oferta 2 e por fim o cálculo da diferença do preço da Energia ; </h6>
      <hr style="border-color:#f00; background-color: #f00;"> 
    <fieldset align="center">

    <h4 align="center"> 1. Tarifário de Gás  </h4>
     <p align="center"><u>OFR1:</u> <?php echo(" ".$nomeet1);?> <u>OFR2:</u><?php echo(" ".$nomeet2);?></p>
    <hr style="border-color:#f00; background-color: #f00;">
            <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
            
    <thead>
        <tr style="text-align:center">
            <th scope="col">Escalão</th>
            <th scope="col">Termo Tarifário Fixo OFR1(€/dia) </th>
            <th scope="col">Termo Tarifário Fixo OFR2(€/dia)</th>
            <th scope="col">Diferença </th>
            <th scope="col">Energia OFR1</th>
            <th scope="col">Energia OFR2</th>
            <th scope="col">Diferença </th>
        </tr>
    </thead>

    <tbody align="center">
 <?php


      $pass1=1;
      $pass2=1;
      $contador_oferta1=0;
      $contador_oferta2=0;    
      //Enquanto n mandar terminar faz...
      $debug=0;

      if($result1->num_rows!=0 or $result2->num_rows!=0)
      {      
         if($debug)
         {
             echo("<br><br><br>Numero de linhas 1 : " . $result1->num_rows . "<br>");
             echo("Numero de linhas 2 : " . $result2->num_rows . "<br>");           
         }

         $tamanho_oferta1 = $result1->num_rows;
         $tamanho_oferta2 = $result2->num_rows;
         while(($contador_oferta1<$tamanho_oferta1) || ($contador_oferta2<$tamanho_oferta2))
         {
         // echo("Iterecao<br>");
          //echo("Contador oferta1 == ".$contador_oferta1." Contador oferta2 == ".$contador_oferta2."<br>");
          if($pass1==1)
          {
            $row1=mysqli_fetch_array($result1);
            $pass1=0;
            $contador_oferta1++;
          }   
          
          if($pass2==1)
          {
            $row2=mysqli_fetch_array($result2);
            $pass2=0;
            $contador_oferta2++;
          }
            //echo ("<br>".$contador_oferta1." <= ".$tamanho_oferta1." && ".$contador_oferta2." <= ".$tamanho_oferta2." <br>");
            // Ainda existem dados nas 2 ofertas para comparar
            if(($contador_oferta1<=$tamanho_oferta1) && ($contador_oferta2<=$tamanho_oferta2))
            {
              //MOMENT OF TRUTH
              if($row1['ESCALAO_INICIO']==$row2['ESCALAO_INICIO'])
              {
                  //echo "<br>". $row1['POTENCIA']. " == " . $row2['POTENCIA']."<br>";
                  // echo "Faz print do contador 1 == " . $contador_oferta1 . "  e contador 2 == ". $contador_oferta2 ."<br>";
                  //Escreve duas ofertas
                   echo("<tr>");
                   echo("<td width=100px><u>" .  $row1['ESCALAO_INICIO'] . "-" . $row1['ESCALAO_FIM'] . "</u></td> ");
                   echo("<td >" . $row1['TERMO_TARIFARIO_FIXO_edpC'] . "€</td><td> ".$row2['TERMO_TARIFARIO_FIXO_edpC']."€</td>");
                   if(($row2['TERMO_TARIFARIO_FIXO_edpC'] - $row1['TERMO_TARIFARIO_FIXO_edpC'])!=0)
                      echo("<td style='background-color:#fce8e8;'>" . round(($row2['TERMO_TARIFARIO_FIXO_edpC'] - $row1['TERMO_TARIFARIO_FIXO_edpC']),4) . "€</td>");
                   else
                      echo("<td>= </td>");


                   if(($row2['ENERGIA_edpC'] - $row1['ENERGIA_edpC'])!=0)
                      echo("<td >" . $row1['ENERGIA_edpC'] . "€</td><td> ". $row2['ENERGIA_edpC'] ."€</td><td style='background-color:#fce8e8;'>" . round(($row2['ENERGIA_edpC'] - $row1['ENERGIA_edpC']),4). "€</td>" );                
                   else
                      echo("<td >" . $row1['ENERGIA_edpC'] . "€</td><td> ". $row2['ENERGIA_edpC'] ."€</td><td>=</td>" );                
                   echo("</tr>");
              
                   $pass1=1;
                   $pass2=1;
              }
              else if($row1['ESCALAO_INICIO']<$row2['ESCALAO_INICIO'])
              {
             //   echo "<br>".$row1['POTENCIA']. " < " . $row2['POTENCIA']."<br>";
                // echo "Faz print do contador 1 == " . $contador_oferta1 . "<br>";
                  //Escreve POTENCIA 1
                 echo("<tr>");
                   echo("<td ><u>" .  $row1['ESCALAO_INICIO'] . "-" . $row1['ESCALAO_FIM'] . "</u></td> ");
                   echo("<td  >" . $row1['TERMO_TARIFARIO_FIXO_edpC'] . "€</td><td> - </td>");
                   echo("<td style='background-color:#fce8e8;' >" . $row1['TERMO_TARIFARIO_FIXO_edpC'] . "€</td>"); 
                   echo("<td >" . $row1['ENERGIA_edpC'] . "€</td><td> - </td><td style='background-color:#fce8e8;'>" . $row1['ENERGIA_edpC'] . "€</td>" );                
                   echo("</tr>");
                
                   $pass1=1;
                   $pass2=0;
              }
              else if($row1['ESCALAO_INICIO']>$row2['ESCALAO_INICIO'])
              {
               //   echo "<br>".$row1['POTENCIA']. " > " . $row2['POTENCIA'] . "<br>";
              //    echo "Faz print do contador 2 == " . $contador_oferta2 . "<br>";
                  //Escreve Potencia 2
                   echo("<tr>");
                   echo("<td ><u>" .  $row1['ESCALAO_INICIO'] . "-" . $row1['ESCALAO_FIM'] . "</u></td> ");
                   echo("<td> - </td><td>" . $row2['TERMO_TARIFARIO_FIXO_edpC'] . "€</td>");
                   echo("<td style='background-color:#fce8e8;'>" . $row2['TERMO_TARIFARIO_FIXO_edpC'] . "€</td>"); 
                   echo("<td> - </td><td> " . $row2['ENERGIA_edpC'] . "€</td><td style='background-color:#fce8e8;'>" . $row2['ENERGIA_edpC'] . "€</td>" );                
                   echo("</tr>");
                   $pass1=0;
                   $pass2=1;

              }

            }
            else
            {
                //echo ("<br>".$contador_oferta1." <= ".$tamanho_oferta1." && ".$contador_oferta2." <= ".$tamanho_oferta2." <br>");
                if($contador_oferta1>$tamanho_oferta1)
                {
                    //echo "contador_oferta1 >= tamanho_oferta1 <br>";
                    //Listar o restante da oferta 2 
                    do
                    {
               //      echo "Faz print do contador 2 == " . $contador_oferta2 . "<br>";
                     echo("<tr>");
                      echo("<td ><u>" .  $row1['ESCALAO_INICIO'] . "-" . $row1['ESCALAO_FIM'] . "</u></td> ");
                     echo("<td> - </td><td>" . $row2['TERMO_TARIFARIO_FIXO_edpC'] . "€</td>");
                     echo("<td style='background-color:#fce8e8;'>" . $row2['TERMO_TARIFARIO_FIXO_edpC'] . "€</td>"); 
                     echo("<td> - </td><td> " . $row2['ENERGIA_edpC'] . "€</td><td style='background-color:#fce8e8;'>" . $row2['ENERGIA_edpC'] . "€</td>" );                
                     echo("</tr>");
                     $contador_oferta2++;

                    }while($row2=mysqli_fetch_array($result2));
                    break;

                }
                
                if($contador_oferta2>$tamanho_oferta2)
                {
                    //echo "contador_oferta2 >= tamanho_oferta2 <br>";
                  // LIstar o restante da oferta 1
                  do
                    {
                 //      echo "Faz print do contador 1 == " . $contador_oferta1 . "<br>";    
                       echo("<tr>");
                       echo("<td ><u>" .  $row1['ESCALAO_INICIO'] . "-" . $row1['ESCALAO_FIM'] . "</u></td> ");
                       echo("<td>" . $row1['TERMO_TARIFARIO_FIXO_edpC'] . "€</td><td> - </td>");
                       echo("<td style='background-color:#fce8e8;'>" . $row1['TERMO_TARIFARIO_FIXO_edpC'] . "€</td>"); 
                       echo("<td>" . $row1['ENERGIA_edpC'] . "€</td><td> - </td><td style='background-color:#fce8e8;'>" . $row1['ENERGIA_edpC'] . "€</td>" );                
                       echo("</tr>");
                       $contador_oferta1++;

                    }while($row1=mysqli_fetch_array($result1));

                    break;

                }

           }

         }

      }

?>
     

    </tbody>
</table>





    
    </fieldset>
<?php
}
?>    
 <hr style="border-color:#f00; background-color: #f00;">
      <?php
        include('cabecalho.php');
    ?>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
       <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>
        
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>