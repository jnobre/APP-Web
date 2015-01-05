<?php
    session_start();
    include('../mysql.php');
    include('../login_status.php');
    include('../mysqlconnect.php');

?>


<!DOCTYPE html>
<html lang="en">
<?php
    if($_SESSION['logado']!=1)
    {        
        include('../notfound.php');
    }
    else
    {
?>    
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
    <link href="../assets/css/tabela.css" rel="stylesheet">

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
              <li ><a href="../index.php">Inicio</a></li>
              <li><a href="../listar.php">Listar</a></li>
              <li><a href="../pesquisar.php">Pesquisar</a></li>
              
              <li class="dropdown">
                
                <a href="#" style="color: #FFFFFF" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                         
                  <li class="nav-header">Users</li>
                  <li ><a href="profile.php">Minha Conta</a></li>
                  <li> <a href="registar.php">Criar User</a> </li>
                  <li> <a href="listarusers.php">Gerir Utilizadores Existentes</a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
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
                
            </ul>    
                    <div class="navbar-form pull-right"> 
                    <ul class="nav">
                    <li style="line-height:15px"> <br><font color="white"> <?php
                    echo("Bem Vindo " . $_SESSION['nome'] );
                    echo ("<a href='../logout.php'>  [Logout]</a>")
                    ?></font></ul></li></div> 
                </div><!--/.nav-collapse -->
          </div>
      </div>
    </div>

  <div class="container">

    <?php
    if($_GET['idoferta'])
    {
      $idoferta = $_GET['idoferta']; 
      $pass=$_POST['pw']; 
    ?>
    
      <h3 align="center">Apagar Oferta:</h3>
      <hr>
  
      <!-- Example row of columns -->
      <div align='center' name="confirmepass" id="confirmepass" class="container marketing">
     
      </div>
  <div name="confirmeapagar" id="confirmeapagar" class="container marketing">  
    <fieldset align="center" >
        <?php

            if ($stmt = $mysqli->prepare("SELECT password,email,conf FROM UTILIZADORES WHERE username= ?  LIMIT 1")) 
            { 

              $stmt->bind_param('s', $_SESSION['nome']); // Bind user and pass to query to parameter.
              $stmt->execute(); // Execute the prepared query.
              $stmt->store_result();
              $stmt->bind_result($password,$email,$conf); // get variables from result.
              $stmt->fetch();    
              $pass_ency =md5($pass.$email);
                if(($stmt->num_rows == 1) && ($conf != 0) && ($pass_ency == $password)) //Significa que encontrou o username dado e password dado , logo o login encontra-se correcto 
               {
                  ?>
                &nbsp;
                <?php
                    
                    echo("<img src='../icones/ok.jpg'> <h4>Oferta Apagada</h4>");
                    $query="INSERT INTO log (descricao,user,data,admin) VALUES('A oferta[" . $idoferta . "], foi apagada.','". $_SESSION['nome'] ."'," . date("y/m/d") . ",1)";
                    mysqli_query($mysqli,$query);  
   
                    ?>
                    <meta HTTP-EQUIV="REFRESH" content="2; url=gerirofertas.php">




              
            

              </div>
              <?php
                }
                else
                {
                ?>
                            <h5> Password Errada! </h5>
                    <meta HTTP-EQUIV="REFRESH" content="2; url=gerirofertas.php">

                            
                            <?php 
                           
                            
                          ?>
                 

                  </div>
                <?php
                }
                    
            $stmt->close();
                }
          }

          $mysqli->close();
          ?>

         </fieldset> 
	








     
            
		<hr>
      <?php
    }
        include('../cabecalho.php');
        ?>


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



