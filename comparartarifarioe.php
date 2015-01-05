<?php
    //error_reporting(E_ERROR);
     session_start();
    include('mysql.php');
    include('mysqlconnect.php');
    include('login_status.php');
    $et1=$_GET['ET1'];
    $et2=$_GET['ET2'];
    if($et1==NULL || $et2==NULL)
    {
    	exit("Estrutura Tarifária Inválida<br><a href=javascript:history.go(-1)>[VOLTAR]</a>");
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
    <!-- E1 SQL e E2 SELECT ALL DATA -->
    <?php
          //Operação : Buscar Tárifario mais recente da Oferta nº1
            $sqldata="SELECT DISTINCT DATA FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et1 . "' ORDER BY DATA DESC";
            $resultdata = mysqli_query($mysqli,$sqldata);
            $row = mysqli_fetch_array($resultdata);
            $datas[0]=$row['DATA']; 
            $result = mysqli_query($mysqli,"SELECT *  FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et1 . "' AND DATA='" . $datas[0] . "'"); 
            $row1 = mysqli_fetch_array($result);       

            $nomeet1= $row1['NOME'];
            $idtarifasimples1=$row1['ID_TARIFA_SIMPLES'];

            if($idtarifasimples1!=NULL)
         	  {
              $resultsimples1=mysqli_query($mysqli,"SELECT * FROM TARIFA_SIMPLES WHERE IDTARIFA_SIMPLES=" . $idtarifasimples1 . " AND POTENCIA!=99 ORDER BY POTENCIA ASC");
            }


             //Operação : Buscar Tárifario mais recente da Oferta nº2
             $sqldata1="SELECT DISTINCT DATA FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et2 . "' ORDER BY DATA DESC";
             $resultdata1 = mysqli_query($mysqli,$sqldata1);
             $row1 = mysqli_fetch_array($resultdata1);
             $datas[1]=$row1['DATA']; 
             $result2 = mysqli_query($mysqli,"SELECT *  FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et2 . "' AND DATA='" . $datas[1] . "'"); 
             $row2 = mysqli_fetch_array($result2) ; 
             $nomeet2= $row2['NOME']; 
             $idtarifasimples2=$row2['ID_TARIFA_SIMPLES'];
             if($idtarifasimples2!=NULL)
             {
             	 $sqlteste="SELECT * FROM TARIFA_SIMPLES WHERE IDTARIFA_SIMPLES=" . $idtarifasimples2 . " AND POTENCIA!=99 ORDER BY POTENCIA ASC";
           		 //echo($sqlteste);
            	 $resultsimples2=mysqli_query($mysqli,$sqlteste);
            	 //echo("TESTE" . $resultsimples1->num_rows . "TESTE" . $resultsimples2->num_rows);
          	 }
         	
            $idtarifabi1=$row1['ID_TARIFA_BI'];
            $idtarifabi2=$row2['ID_TARIFA_BI'];

            //if(($idtarifabi1!=NULL || $idtarifabi2!=NULL) && ($resultdata2->num_rows!=0 && $resultdata1->num_rows!=0))
            if($idtarifabi1!=NULL || $idtarifabi2!=NULL)
            {
              //TARIFA BI OFR1
                if($idtarifabi1!=NULL)
                {
  
                  $resultbi1=mysqli_query($mysqli,"SELECT * FROM TARIFA_BI WHERE IDTARIFA_BI=" . $idtarifabi1 . " AND POTENCIA!=99 ORDER BY POTENCIA ASC");
               }
              //TARIFA BI OFR2
              if($idtarifabi2!=NULL)
              {
  
                $resultbi2=mysqli_query($mysqli,"SELECT * FROM TARIFA_BI WHERE IDTARIFA_BI=" . $idtarifabi2 . " AND POTENCIA!=99 ORDER BY POTENCIA ASC");
              }

           }
            
            $idtarifatri1=$row1['ID_TARIFA_TRI'];
            $idtarifatri2=$row2['ID_TARIFA_TRI'];

            // TARIFA TRI 
            //if(($idtarifatri1!=NULL || $idtarifatri2!=NULL) && ($resultdata2->num_rows!=0 && $resultdata1->num_rows!=0))
            if($idtarifatri1!=NULL || $idtarifatri2!=NULL)
            {
             // echo("ENTRA TRI");
                  //TARIFA TRI OFR1
                if($idtarifatri1!=NULL)
                {
                  $resulttri1=mysqli_query($mysqli,"SELECT * FROM TARIFA_TRI WHERE IDTARIFA_TRI=" . $idtarifatri1 . " AND POTENCIA!=99 ORDER BY POTENCIA ASC");
                }
              //TARIFA TRI OFR2
                if($idtarifatri2!=NULL)
                {
                  $resulttri2=mysqli_query($mysqli,"SELECT * FROM TARIFA_TRI WHERE IDTARIFA_TRI=" . $idtarifatri2 . " AND POTENCIA!=99 ORDER BY POTENCIA ASC");
                }
            }

    ?> 

    <div class="container">
    <br>
    <?php 

    	if($result->num_rows==0 || $result2->num_rows==0)
    	{
    		echo("<div align='center'>");
    		//Ver qual result é invalido e mostrar mensagem de erro detalhada
    		if($result->num_rows==0 && $result2->num_rows==0)
    		{
    			
    				echo("A Estrutura Tarifária [" . $et1 . "] e a Estrutura Tarifária [" . $et2 ."] são inválidas. Impossível executar operação.<a href=javascript:history.go(-1)>[VOLTAR]</a>");

    		}
    		else if($result->num_rows==0)
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
   
    <fieldset align="center">

    <h4 align="center"> 1. Tarifa Simples </h4>
     <p align="center"><u>OFR1:</u> <?php echo($nomeet1);?> <u>OFR2:</u><?php echo($nomeet2);?></p>
    <hr style="border-color:#f00; background-color: #f00;">
            <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
            
    <thead>
        <tr style="text-align:center">
            <th scope="col">Potência Contratada</th>
            <th scope="col">Preço da Potência OFR1 </th>
            <th scope="col">Preço da Potência OFR2</th>
            <th scope="col">Diferença </th>
            <th scope="col">Preço da Energia OFR1</th>
            <th scope="col">Preço da Energia OFR2 </th>
            <th scope="col">Diferença </th>
        </tr>
    </thead>
        
    
    <tbody align="center">
 <?php


      $pass1=1;
      $pass2=1;
      $contador_oferta1=0;
      $contador_oferta2=0;    
      $debug=0;

      if($resultsimples1->num_rows!=0 or $resultsimples2->num_rows!=0)
      {      
         if($debug)
         {
             echo("<br><br><br>Numero de linhas 1 : " . $resultsimples1->num_rows . "<br>");
             echo("Numero de linhas 2 : " . $resultsimples2->num_rows . "<br>");           
         }

         $tamanho_oferta1 = $resultsimples1->num_rows;
         $tamanho_oferta2 = $resultsimples2->num_rows;
         while(($contador_oferta1<$tamanho_oferta1) || ($contador_oferta2<$tamanho_oferta2))
         {
         // echo("Iterecao<br>");
          //echo("Contador oferta1 == ".$contador_oferta1." Contador oferta2 == ".$contador_oferta2."<br>");
          if($pass1==1)
          {
            $rowsimples1=mysqli_fetch_array($resultsimples1);
            $pass1=0;
            $contador_oferta1++;
          }   
          
          if($pass2==1)
          {
            $rowsimples2=mysqli_fetch_array($resultsimples2);
            $pass2=0;
            $contador_oferta2++;
          }
            //echo ("<br>".$contador_oferta1." <= ".$tamanho_oferta1." && ".$contador_oferta2." <= ".$tamanho_oferta2." <br>");
            // Ainda existem dados nas 2 ofertas para comparar
            if(($contador_oferta1<=$tamanho_oferta1) && ($contador_oferta2<=$tamanho_oferta2))
            {
              //MOMENT OF TRUTH
              if($rowsimples1['POTENCIA']==$rowsimples2['POTENCIA'])
              {
                  //echo "<br>". $rowsimples1['POTENCIA']. " == " . $rowsimples2['POTENCIA']."<br>";
                  // echo "Faz print do contador 1 == " . $contador_oferta1 . "  e contador 2 == ". $contador_oferta2 ."<br>";
                  //Escreve duas ofertas
                   echo("<tr>");
                   echo("<td ><u>" .  $rowsimples1['POTENCIA'] . " kVa </u></td> ");
                   echo("<td >" . $rowsimples1['PRECO_POTENCIA_edpC'] . "</td><td> ".$rowsimples2['PRECO_POTENCIA_edpC']." </td>");
                   if(($rowsimples2['PRECO_POTENCIA_edpC'] - $rowsimples1['PRECO_POTENCIA_edpC'])!=0)
                      echo("<td style='background-color:#fce8e8;'>" . ($rowsimples2['PRECO_POTENCIA_edpC'] - $rowsimples1['PRECO_POTENCIA_edpC']) . "</td>");
                   else
                      echo("<td>=</td>");


                   if(($rowsimples2['PRECO_ENERGIA_edpC'] - $rowsimples1['PRECO_ENERGIA_edpC'])!=0)
                      echo("<td >" . $rowsimples1['PRECO_ENERGIA_edpC'] . "</td><td> ". $rowsimples2['PRECO_ENERGIA_edpC'] ." </td><td style='background-color:#fce8e8;'>" . round(($rowsimples2['PRECO_ENERGIA_edpC'] - $rowsimples1['PRECO_ENERGIA_edpC']),4). "</td>" );                
                   else
                      echo("<td >" . $rowsimples1['PRECO_ENERGIA_edpC'] . "</td><td> ". $rowsimples2['PRECO_ENERGIA_edpC'] ." </td><td>=</td>" );                
                   echo("</tr>");
              
                   $pass1=1;
                   $pass2=1;
              }
              else if($rowsimples1['POTENCIA']<$rowsimples2['POTENCIA'])
              {
             //   echo "<br>".$rowsimples1['POTENCIA']. " < " . $rowsimples2['POTENCIA']."<br>";
                // echo "Faz print do contador 1 == " . $contador_oferta1 . "<br>";
                  //Escreve POTENCIA 1
                   echo("<tr>");
                   echo("<td><u>" .  $rowsimples1['POTENCIA'] . " kVa</u></td> ");
                   echo("<td  >" . $rowsimples1['PRECO_POTENCIA_edpC'] . "</td><td> - </td>");
                   echo("<td style='background-color:#fce8e8;' >" . $rowsimples1['PRECO_POTENCIA_edpC'] . "</td>"); 
                   echo("<td >" . $rowsimples1['PRECO_ENERGIA_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowsimples1['PRECO_ENERGIA_edpC'] . "</td>" );                
                   echo("</tr>");
                
                   $pass1=1;
                   $pass2=0;
              }
              else if($rowsimples1['POTENCIA']>$rowsimples2['POTENCIA'])
              {
               //   echo "<br>".$rowsimples1['POTENCIA']. " > " . $rowsimples2['POTENCIA'] . "<br>";
              //    echo "Faz print do contador 2 == " . $contador_oferta2 . "<br>";
                  //Escreve Potencia 2
                   echo("<tr>");
                   echo("<td><u>" .  $rowsimples2['POTENCIA'] . " kVa</u></td> ");
                   echo("<td> - </td><td>" . $rowsimples2['PRECO_POTENCIA_edpC'] . "</td>");
                   echo("<td style='background-color:#fce8e8;'>" . $rowsimples2['PRECO_POTENCIA_edpC'] . "</td>"); 
                   echo("<td> - </td><td> " . $rowsimples2['PRECO_ENERGIA_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowsimples2['PRECO_ENERGIA_edpC'] . "</td>" );                
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
                     echo("<td><u>" .  $rowsimples2['POTENCIA'] . " kVa</u></td> ");
                     echo("<td> - </td><td>" . $rowsimples2['PRECO_POTENCIA_edpC'] . "</td>");
                     echo("<td style='background-color:#fce8e8;'>" . $rowsimples2['PRECO_POTENCIA_edpC'] . "</td>"); 
                     echo("<td> - </td><td> " . $rowsimples2['PRECO_ENERGIA_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowsimples2['PRECO_ENERGIA_edpC'] . "</td>" );                
                     echo("</tr>");
                     $contador_oferta2++;

                    }while($rowsimples2=mysqli_fetch_array($resultsimples2));
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
                       echo("<td><u>" .  $rowsimples1['POTENCIA'] . " kVa</u></td> ");
                       echo("<td>" . $rowsimples1['PRECO_POTENCIA_edpC'] . "</td><td> - </td>");
                       echo("<td style='background-color:#fce8e8;'>" . $rowsimples1['PRECO_POTENCIA_edpC'] . "</td>"); 
                       echo("<td>" . $rowsimples1['PRECO_ENERGIA_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowsimples1['PRECO_ENERGIA_edpC'] . "</td>" );                
                       echo("</tr>");
                       $contador_oferta1++;
                    }while($rowsimples1=mysqli_fetch_array($resultsimples1));
                    break;

                }

           }

         }

      }

?>
     

    </tbody>
</table>
  <hr>

  <br>
  <h4 align="center"> 2. Tarifa Bi Horária </h4>
     <p align="center"><u>OFR1:</u> <?php echo($nomeet1);?> <u>OFR2:</u><?php echo($nomeet2);?></p>
    <hr style="border-color:#f00; background-color: #f00;">
            <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
            
    <thead>
        <tr style="text-align:center">
            <th scope="col">Potência Contratada</th>
            <th scope="col">Potência OFR1 </th>
            <th scope="col">Potência OFR2</th>
            <th scope="col">Diferença </th>
            <th scope="col">Energia Normal OFR1</th>
            <th scope="col">Energia Normal OFR2 </th>
            <th scope="col">Diferença </th>
            <th scope="col">Energia Económico OFR1 </th>
            <th scope="col">Energia Económico OFR2</th>
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

      if($resultbi1->num_rows!=0 or $resultbi2->num_rows!=0)
      {      
         if($debug)
         {
             echo("<br><br><br>Numero de linhas 1 : " . $resultbi1->num_rows . "<br>");
             echo("Numero de linhas 2 : " . $resultbi2->num_rows . "<br>");           
         }

         $tamanho_oferta1 = $resultbi1->num_rows;
         $tamanho_oferta2 = $resultbi2->num_rows;
         while(($contador_oferta1<$tamanho_oferta1) || ($contador_oferta2<$tamanho_oferta2))
         {
         // echo("Iterecao<br>");
          //echo("Contador oferta1 == ".$contador_oferta1." Contador oferta2 == ".$contador_oferta2."<br>");
          if($pass1==1)
          {
            if($idtarifabi1!=NULL)
              $rowbi1=mysqli_fetch_array($resultbi1);
            $pass1=0;
            $contador_oferta1++;
          }   
          
          if(($pass2==1))
          {
            if($idtarifabi2!=NULL)
            $rowbi2=mysqli_fetch_array($resultbi2);
            $pass2=0;
            $contador_oferta2++;
          }
            //echo ("<br>".$contador_oferta1." <= ".$tamanho_oferta1." && ".$contador_oferta2." <= ".$tamanho_oferta2." <br>");
            // Ainda existem dados nas 2 ofertas para comparar
            if(($contador_oferta1<=$tamanho_oferta1) && ($contador_oferta2<=$tamanho_oferta2))
            {
              //MOMENT OF TRUTH
              if($rowbi1['POTENCIA']==$rowbi2['POTENCIA'])
              {
                  //echo "<br>". $rowbi1['POTENCIA']. " == " . $rowsimples2['POTENCIA']."<br>";
                  // echo "Faz print do contador 1 == " . $contador_oferta1 . "  e contador 2 == ". $contador_oferta2 ."<br>";
                  //Escreve duas ofertas
                   echo("<tr>");
                   echo("<td ><u>" .  $rowbi1['POTENCIA'] . " kVa </u></td> ");
                   echo("<td >" . $rowbi1['PRECO_POTENCIA_edpC'] . "</td><td> ".$rowbi2['PRECO_POTENCIA_edpC']." </td>");
                   if(($rowbi2['PRECO_POTENCIA_edpC'] - $rowbi1['PRECO_POTENCIA_edpC'])!=0)
                   echo("<td style='background-color:#fce8e8;'>" . ($rowbi2['PRECO_POTENCIA_edpC'] - $rowbi1['PRECO_POTENCIA_edpC']) . "</td>");
                   else
                   echo("<td>=</td>");
                   if(($rowbi2['ENERGIA_NORMAL_edpC'] - $rowbi1['ENERGIA_NORMAL_edpC'])!=0)
                   echo("<td >" . $rowbi1['ENERGIA_NORMAL_edpC'] . "</td><td> ". $rowbi2['ENERGIA_NORMAL_edpC'] ." </td><td style='background-color:#fce8e8;'>" . round(($rowbi2['ENERGIA_NORNAL'] - $rowbi1['ENERGIA_NORMAL_edpC']),4). "</td>" );                
                   else
                    echo("<td >" . $rowbi1['ENERGIA_NORMAL_edpC'] . "</td><td> ". $rowbi2['ENERGIA_NORMAL_edpC'] ." </td><td>=</td>" );                

                  if(($rowbi2['ENERGIA_ECONOMICO_edpC'] - $rowbi1['ENERGIA_ECONOMICO_edpC'])!=0)
                   echo("<td >" . $rowbi1['ENERGIA_ECONOMICO_edpC'] . "</td><td> ". $rowbi2['ENERGIA_ECONOMICO_edpC'] ." </td><td style='background-color:#fce8e8;'>" . round(($rowbi2['ENERGIA_ECONOMICO_edpC'] - $rowbi1['ENERGIA_ECONOMICO_edpC']),4). "</td>" );                
                   else
                    echo("<td >" . $rowbi1['ENERGIA_ECONOMICO_edpC'] . "</td><td> ". $rowbi2['ENERGIA_ECONOMICO_edpC'] ." </td><td>=</td>" );                
                   echo("</tr>");
                   $pass1=1;
                   $pass2=1;
              }
              else if($rowbi1['POTENCIA']<$rowbi2['POTENCIA'])
              {
             //   echo "<br>".$rowbi1['POTENCIA']. " < " . $rowsimples2['POTENCIA']."<br>";
                // echo "Faz print do contador 1 == " . $contador_oferta1 . "<br>";
                  //Escreve POTENCIA 1
                 echo("<tr>");
                   echo("<td><u>" .  $rowbi1['POTENCIA'] . " kVa</u></td> ");
                   echo("<td  >" . $rowbi1['PRECO_POTENCIA_edpC'] . "</td><td> - </td>");
                   echo("<td style='background-color:#fce8e8;' >" . $rowbi1['PRECO_POTENCIA_edpC'] . "</td>"); 
                   echo("<td >" . $rowbi1['ENERGIA_NORMAL_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowbi1['ENERGIA_NORMAL_edpC'] . "</td>" );                
                   echo("<td>" . $rowbi1['ENERGIA_ECONOMICO_edpC'] . "</td><td>-</td><td style='background-color:#fce8e8;'>" . $rowbi1['ENERGIA_ECONOMICO_edpC'] . "</td>");
                   echo("</tr>");
                
                   $pass1=1;
                   $pass2=0;
              }
              else if($rowbi1['POTENCIA']>$rowbi2['POTENCIA'])
              {
               //   echo "<br>".$rowbi1['POTENCIA']. " > " . $rowsimples2['POTENCIA'] . "<br>";
              //    echo "Faz print do contador 2 == " . $contador_oferta2 . "<br>";
                  //Escreve Potencia 2
                   echo("<tr>");
                   echo("<td><u>" .  $rowbi2['POTENCIA'] . " kVa</u></td> ");
                   echo("<td> - </td><td>" . $rowbi2['PRECO_POTENCIA_edpC'] . "</td>");
                   echo("<td style='background-color:#fce8e8;'>" . $rowbi2['PRECO_POTENCIA_edpC'] . "</td>"); 
                   echo("<td> - </td><td> " . $rowbis2['ENERGIA_NORMAL_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowbi2['ENERGIA_NORMAL_edpC'] . "</td>" );                
                   echo("<td> - </td><td> " . $rowbis2['ENERGIA_ECONOMICO_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowbi2['ENERGIA_ECONOMICO_edpC'] . "</td>" );                

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
                     echo("<td><u>" .  $rowbi2['POTENCIA'] . " kVa</u></td> ");
                     echo("<td> - </td><td>" . $rowbi2['PRECO_POTENCIA_edpC'] . "</td>");
                     echo("<td style='background-color:#fce8e8;'>" . $rowbi2['PRECO_POTENCIA_edpC'] . "</td>"); 
                     echo("<td> - </td><td> " . $rowbi2['ENERGIA_NORMAL_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowbi2['ENERGIA_NORMAL_edpC'] . "</td>" );                
                     echo("<td> - </td><td> " . $rowbi2['ENERGIA_ECONOMICO_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowbi2['ENERGIA_ECONOMICO_edpC'] . "</td>" );                
                     echo("</tr>");
                     $contador_oferta2++;

                    }while($rowbi2=mysqli_fetch_array($resultbi2));
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
                       echo("<td><u>" .  $rowbi1['POTENCIA'] . " kVa</u></td> ");
                       echo("<td>" . $rowbi1['PRECO_POTENCIA_edpC'] . "</td><td> - </td>");
                       echo("<td style='background-color:#fce8e8;'>" . $rowbi1['PRECO_POTENCIA_edpC'] . "</td>"); 
                       echo("<td>" . $rowbi1['ENERGIA_NORMAL_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowbi1['ENERGIA_NORMAL_edpC'] . "</td>" );                
                       echo("<td>" . $rowbi1['ENERGIA_ECONOMICO_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowbi1['ENERGIA_ECONOMICO_edpC'] . "</td>" );                
                       echo("</tr>");
                       $contador_oferta1++;
                    }while($rowbi1=mysqli_fetch_array($resultbi1));
                    break;

                }

           }

         }

      }

?>

    </tbody>
</table>
      

 <hr>

  <br>
  <h4 align="center"> 3. Tarifa Tri Horária </h4>
     <p align="center"><u>OFR1:</u> <?php echo($nomeet1);?> <u>OFR2:</u><?php echo($nomeet2);?></p>
    <hr style="border-color:#f00; background-color: #f00;">
            <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
            
    <thead>
        <tr style="text-align:center">
            <th scope="col">Potência Contratada</th>
            <th scope="col">Potência OFR1 </th>
            <th scope="col">Potência OFR2</th>
            <th scope="col">Diferença </th>
            <th scope="col">Energia Normal OFR1</th>
            <th scope="col">Energia Normal OFR2 </th>
            <th scope="col">Diferença </th>
            <th scope="col">Energia Económico OFR1 </th>
            <th scope="col">Energia Económico OFR2</th>
            <th scope="col">Diferença </th>
            <th scope="col">Energia SuperEconómico OFR1 </th>
            <th scope="col">Energia SuperEconómico OFR2</th>
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

      if($resulttri1->num_rows!=0 or $resulttri2->num_rows!=0)
      {      
         if($debug)
         {
             echo("<br><br><br>Numero de linhas 1 : " . $resulttri1->num_rows . "<br>");
             echo("Numero de linhas 2 : " . $resulttri2->num_rows . "<br>");           
         }

         $tamanho_oferta1 = $resulttri1->num_rows;
         $tamanho_oferta2 = $resulttri2->num_rows;
         while(($contador_oferta1<$tamanho_oferta1) || ($contador_oferta2<$tamanho_oferta2))
         {
         // echo("Iterecao<br>");
          //echo("Contador oferta1 == ".$contador_oferta1." Contador oferta2 == ".$contador_oferta2."<br>");
          if($pass1==1)
          {
            if($idtarifatri1!=NULL)
              $rowtri1=mysqli_fetch_array($resulttri1);
            $pass1=0;
            $contador_oferta1++;
          }   
          
          if($pass2==1)
          {
            if($idtarifatri2!=NULL)
              $rowtri2=mysqli_fetch_array($resulttri2);
            $pass2=0;
            $contador_oferta2++;
          }
            //echo ("<br>".$contador_oferta1." <= ".$tamanho_oferta1." && ".$contador_oferta2." <= ".$tamanho_oferta2." <br>");
            // Ainda existem dados nas 2 ofertas para comparar
            if(($contador_oferta1<=$tamanho_oferta1) && ($contador_oferta2<=$tamanho_oferta2))
            {
              //MOMENT OF TRUTH
              if($rowtri1['POTENCIA']==$rowtri2['POTENCIA'])
              {
                  //echo "<br>". $rowtri1['POTENCIA']. " == " . $rowsimples2['POTENCIA']."<br>";
                  // echo "Faz print do contador 1 == " . $contador_oferta1 . "  e contador 2 == ". $contador_oferta2 ."<br>";
                  //Escreve duas ofertas
                   echo("<tr>");
                   echo("<td ><u>" .  $rowtri1['POTENCIA'] . " kVa </u></td> ");
                   echo("<td >" . $rowtri1['PRECO_POTENCIA_edpC'] . "</td><td> ".$rowtri2['PRECO_POTENCIA_edpC']." </td>");
                   if(($rowtri2['PRECO_POTENCIA_edpC'] - $rowtri1['PRECO_POTENCIA_edpC'])!=0)
                   echo("<td style='background-color:#fce8e8;'>" . ($rowtri2['PRECO_POTENCIA_edpC'] - $rowtri1['PRECO_POTENCIA_edpC']) . "</td>");
                   else
                   echo("<td>=</td>");
                   if(($rowtri2['ENERGIA_NORMAL_edpC'] - $rowtri1['ENERGIA_NORMAL_edpC'])!=0)
                   echo("<td >" . $rowtri1['ENERGIA_NORMAL_edpC'] . "</td><td> ". $rowtri2['ENERGIA_NORMAL_edpC'] ." </td><td style='background-color:#fce8e8;'>" . round(($rowtri2['ENERGIA_NORNAL'] - $rowtri1['ENERGIA_NORMAL_edpC']),4). "</td>" );                
                   else
                    echo("<td >" . $rowtri1['ENERGIA_NORMAL_edpC'] . "</td><td> ". $rowtri2['ENERGIA_NORMAL_edpC'] ." </td><td>=</td>" );                

                  if(($rowtri2['ENERGIA_ECONOMICO_edpC'] - $rowtri1['ENERGIA_ECONOMICO_edpC'])!=0)
                   echo("<td >" . $rowtri1['ENERGIA_ECONOMICO_edpC'] . "</td><td> ". $rowtri2['ENERGIA_ECONOMICO_edpC'] ." </td><td style='background-color:#fce8e8;'>" . round(($rowtri2['ENERGIA_ECONOMICO_edpC'] - $rowtri1['ENERGIA_ECONOMICO_edpC']),4). "</td>" );                
                   else
                    echo("<td >" . $rowtri1['ENERGIA_ECONOMICO_edpC'] . "</td><td> ". $rowtri2['ENERGIA_ECONOMICO_edpC'] ." </td><td>=</td>" );                

                    if(($rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] - $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'])!=0)
                   echo("<td >" . $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td><td> ". $rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] ." </td><td style='background-color:#fce8e8;'>" . round(($rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] - $rowtri1['ENERGIA_ECONOMICO_edpC']),4). "</td>" );                
                   else
                    echo("<td >" . $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td><td> ". $rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] ." </td><td>=</td>" );                

                  






                   echo("</tr>");
              
                   $pass1=1;
                   $pass2=1;
              }
              else if($rowtri1['POTENCIA']<$rowtri2['POTENCIA'])
              {
             //   echo "<br>".$rowtri1['POTENCIA']. " < " . $rowsimples2['POTENCIA']."<br>";
                // echo "Faz print do contador 1 == " . $contador_oferta1 . "<br>";
                  //Escreve POTENCIA 1
                 echo("<tr>");
                   echo("<td><u>" .  $rowtri1['POTENCIA'] . " kVa</u></td> ");
                   echo("<td  >" . $rowtri1['PRECO_POTENCIA_edpC'] . "</td><td> - </td>");
                   echo("<td style='background-color:#fce8e8;' >" . $rowtri1['PRECO_POTENCIA_edpC'] . "</td>"); 
                   echo("<td >" . $rowtri1['ENERGIA_NORMAL_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowtri1['ENERGIA_NORMAL_edpC'] . "</td>" );                
                   echo("<td>" . $rowtri1['ENERGIA_ECONOMICO_edpC'] . "</td><td>-</td><td style='background-color:#fce8e8;'>" . $rowtri1['ENERGIA_ECONOMICO_edpC'] . "</td>");
                     echo("<td>" . $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td><td>-</td><td style='background-color:#fce8e8;'>" . $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td>");
                   echo("</tr>");
                
                   $pass1=1;
                   $pass2=0;
              }
              else if($rowtri1['POTENCIA']>$rowtri2['POTENCIA'])
              {
               //   echo "<br>".$rowtri1['POTENCIA']. " > " . $rowsimples2['POTENCIA'] . "<br>";
              //    echo "Faz print do contador 2 == " . $contador_oferta2 . "<br>";
                  //Escreve Potencia 2
                   echo("<tr>");
                   echo("<td><u>" .  $rowtri2['POTENCIA'] . " kVa</u></td> ");
                   echo("<td> - </td><td>" . $rowtri2['PRECO_POTENCIA_edpC'] . "</td>");
                   echo("<td style='background-color:#fce8e8;'>" . $rowtri2['PRECO_POTENCIA_edpC'] . "</td>"); 
                   echo("<td> - </td><td> " . $rowtris2['ENERGIA_NORMAL_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowtri2['ENERGIA_NORMAL_edpC'] . "</td>" );                
                   echo("<td> - </td><td> " . $rowtris2['ENERGIA_ECONOMICO_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowtri2['ENERGIA_ECONOMICO_edpC'] . "</td>" );                
                    echo("<td> - </td><td> " . $rowtris2['ENERGIA_SUPER_ECONOMICO_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td>" );                

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
                     echo("<td><u>" .  $rowtri2['POTENCIA'] . " kVa</u></td> ");
                     echo("<td> - </td><td>" . $rowtri2['PRECO_POTENCIA_edpC'] . "</td>");
                     echo("<td style='background-color:#fce8e8;'>" . $rowtri2['PRECO_POTENCIA_edpC'] . "</td>"); 
                     echo("<td> - </td><td> " . $rowtri2['ENERGIA_NORMAL_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowtri2['ENERGIA_NORMAL_edpC'] . "</td>" );                
                     echo("<td> - </td><td> " . $rowtri2['ENERGIA_ECONOMICO_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowtri2['ENERGIA_ECONOMICO_edpC'] . "</td>" );                
                      echo("<td> - </td><td> " . $rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] . " </td><td style='background-color:#fce8e8;'>" . $rowtri2['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td>" );                
                     echo("</tr>");
                     $contador_oferta2++;

                    }while($rowtri2=mysqli_fetch_array($resulttri2));
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
                       echo("<td><u>" .  $rowtri1['POTENCIA'] . " kVa</u></td> ");
                       echo("<td>" . $rowtri1['PRECO_POTENCIA_edpC'] . "</td><td> - </td>");
                       echo("<td style='background-color:#fce8e8;'>" . $rowtri1['PRECO_POTENCIA_edpC'] . "</td>"); 
                       echo("<td>" . $rowtri1['ENERGIA_NORMAL_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowtri1['ENERGIA_NORMAL_edpC'] . "</td>" );                
                       echo("<td>" . $rowtri1['ENERGIA_ECONOMICO_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowtri1['ENERGIA_ECONOMICO_edpC'] . "</td>" );                
                        echo("<td>" . $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td><td> - </td><td style='background-color:#fce8e8;'>" . $rowtri1['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td>" );                
                       echo("</tr>");
                       $contador_oferta1++;
                    }while($rowtri1=mysqli_fetch_array($resulttri1));
                    break;

                }

           }

         }

      }

?>

    </tbody>
</table>


<?php
}
?>


    
    </fieldset>
    
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