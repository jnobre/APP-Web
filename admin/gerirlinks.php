<?php
    session_start();
    include('../mysqlconnect.php');
    include('../login_status.php');
    function getlinks()
    { // Buscar lista de utilizadores
        $sql="SELECT * FROM link";
      $result=mysql_query($sql) or die(mysql_error());
      
        return $result;
    }

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
              <li class="dropdown active">
                <a href="#" style="color: #FFFFFF" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li ><a href="profile.php">Minha Conta</a></li>
                  <li ><a href="registar.php">Criar User</a></li>
                  <li ><a href="#">Gerir Users Existentes</a></li>
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
                  <li class="active"><a href="gerirlinks.php">Gerir Links Rápidos</a></li>
                </ul>
              </li>
            </ul> 
                    <div class="navbar-form pull-right"> 
                    <ul class="nav">
                    <li style="line-height:15px"> <br><font color="white"> <?php
                    echo("Bem Vindo " . $_SESSION['nome'] );
                    echo("<a href='../logout.php'>  [Logout]</a>")
                    ?></font></ul></li></div> 
                </div><!--/.nav-collapse -->
          </div>
      </div>
    </div>


  <div class="container">

      <h3 align="center">Gerir Links:</h3>
      <hr>
      <!-- Example row of columns -->
          <div class="container marketing">  
          <?php
              $result=getlinks();
            ?>
  <fieldset align="center">
  <BR>
  <a href="criarlink.php">[Criar Link]</a>
  <table id="newspaper-a" align="center" summary="Lista de Links">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome Link</th>
          <th scope="col">Editar</th>
          <th scope="col">Apagar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        $rows=mysql_num_rows($result);
      
        while($row = mysql_fetch_array($result))
        {   
            $linkeditar="editarlink.php?ID=" . $row['ID'] ;
    
            $et=$row['ID_TARIFARIO'];
            echo ("<td>" . $i . "</td>");
            echo ("<td>" . $row['NOME'] . "</td>");
            echo ("<td align = center><a href=" . $linkeditar . ">[Editar]</a></td>");
            echo ("<td align = center>" . "<a id='apagar' href='#' onclick='conf_apagar(".$row['ID'].");'>[Apagar]</a>" ."</td>");
            echo ("</tr>");
            $i++;
        }
        ?>
    </tbody>
</table>
<hr>
<br>
 

    </fieldset>
    <hr>
  
      <?php
        include('../cabecalho.php');
        ?>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
    <script type="text/javascript" charset="utf-8">
     function conf_apagar(idlink)
        {
              var r=confirm("De certeza que deseja apagar o link?");
              if (r==true)
              {
                  window.location = 'apagarlink.php?ID=' + idlink;
              }
           
     
        }
        </script>
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
 <?php
    }
?>
</html>-