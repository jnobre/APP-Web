<?php
    session_start();
    include('../mysql.php');
    include('../mysqlconnect.php');
    include('../login_status.php');
    $id=$_GET['ID'];

    function apagarlink($id)
    {
      $sql="DELETE FROM LINK WHERE ID=" . $id;
      $result=mysql_query($sql) or die(mysql_error());
      return $result;

    }

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
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
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
      apagarlink($_GET['ID']);
       echo("<div align='center'><img align=center width = 100 height = 100  src=../assets/img/EDP_logo.jpg></div><br>");
           echo("<div align='center'><h4> Link Apagado.<br> Redirecionando...</h4></div>");
                ?>
                   <meta HTTP-EQUIV="REFRESH" content="3; url=gerirlinks.php">
                <?php
    

    ?>
    <br><br><br>
      
    <hr>

    <footer>
        <p><strong>&copy; EDP Soluções Comerciais, S.A.</strong> <img class="pull-right" src="../assets/img/logo.gif"></p>
    </footer>
   
    </div> <!-- /container -->
         <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="../chilistats/stats.php"><img src="../chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="../chilistats/stats.php"><img src="../chilistats/counter.php" /></a></noscript>
    </div>
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
   