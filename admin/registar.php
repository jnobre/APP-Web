-<?php
session_start();
include ('../gerar_alea.php');
include('../mysql.php');
include('../login_status.php');
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
                  <li ><a href="profile.php">Minha Conta</a></li>
                  <li class="active"><a href="registar.php">Criar User</a></li>
                  <li><a href="listarusers.php">Gerir Users Existentes </a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li> <a href="upload_ficheiro.php">Upload Ficheiro</a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                  <li><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Servidor</li>
                  <li><a href="log_operacao.php">Ver Log de Operações</a></li>
                  
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
                    echo ("<a href='../logout.php'>  [Logout]</a>")
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
    
    <div class="container">

      <br><br><br>
      <?php
      if(($_POST['user']) && ($_POST['email']))
      {           
            $usern = $_POST['user'];  
            $email = $_POST['email'];
            
            if ($stmt = $mysqli->prepare("SELECT username,email,admin,conf FROM UTILIZADORES WHERE username = ? OR  email = ? LIMIT 1")) { 
              
            $stmt->bind_param('ss', $usern,$email); 
            $stmt->execute(); 
            $stmt->store_result();
            $stmt->bind_result($username, $email, $admin, $conf); 
            $stmt->fetch();

          if($stmt->num_rows == 0)
          {
            $stmt->close();
            $hash=md5(date("d/m/Y H:i:s").$_POST['user']);
            $usern=$_POST['user'];
            $pass = geraSenha(8, true, true, true);
            $pass_encry = md5($pass.$_POST['email']);
            $email=$_POST['email'];
            $admin=0;
            $conf=0;
                    
            if($insert_stmt = $mysqli->prepare("INSERT INTO UTILIZADORES (username,password,email,admin,conf,hash) VALUES (?, ?, ?, ?, ?, ?)")) 
            {                       
                 $insert_stmt->bind_param('sssdds', $usern, $pass_encry, $email, $admin, $conf, $hash); 
                 $insert_stmt->execute();
                 $insert_stmt->close();
                 echo("<p align = center><img width = 100 heigth = 100 src=../assets/img/EDP_logo.jpg></p>");
                 echo("<p align = center>Administrador Registado com sucesso . <br> Detalhes de Login:</p>");
                 echo("<p align = center>Username : " . $usern  ."<br> Password:" . $pass);
                 date_default_timezone_set ("Europe/Lisbon");
                 $data=date('Y/m/d H:i:s', time());
                 $query="INSERT INTO log (descricao,user,data,admin) VALUES('Foi criado um administrador com o nome [" . $usern . "]','". $_SESSION['nome'] ."','". $data ."',1)";
                 mysqli_query($mysqli,$query);  
                    /*                                         
                            $destinatario = $_POST['email'];
                            $assunto = "Confirmacao de registo do Administrador ";
                            $assunto .="[" .$_POST['user']. "]";
                            $corpo = "<html>
                            <head>
                        <title>Confirmação</title>
                        </head>
                        <body>
                        <p align=center>O registo submetido necessita confirma&ccedil;&atilde;o, para tal basta visitar o seguinte endere&ccedil;o:<br /> 
                           <br><a href='http://edp.mrkillua.c9.io/UP/EDP/registo_aceite.php?hash=$hash' target=_blank>[Confimar Registo]</a> <br />
                                               <br>Sua password ser&aacute;: $pass
                        </p><br />
                        Obrigado<br /><br />pela EDP <br /><br /><br /><br /><br /><br />------------------------------------------------<br />
            Caso esta registo n&atilde;o tenha sido requisitada por si, por favor ignore a mesma, caso necess&aacute;rio suporte o nosso servi&ccedil;o pode ser contactado no email ?????.
                        </body>
                        </html>";


                  $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html;
                charset=iso-8859-1\r\n";
                  
                //endereço do remitente
                $headers .= "From: no-reponse@edp.pt\r\n";
                            
                            if(@mail($destinatario, $assunto, $corpo, $headers)){
                                echo('<p align = center> Mail enviado com sucesso!</p>');
                            } else {
                                echo('<p align = center> Mail n&atilde;o enviado com sucesso!</p>');
                            }             */ 
            }
          }
          else
          {                   
            echo("<div align='center'>");
            echo("<h4>Administrador j&aacute; existe! Redirecionando...</h4></div>");
            $mysqli->close();

            ?>
            <meta HTTP-EQUIV="REFRESH" content="3; url=registar.php">
            <?php
          }
        }
        $mysqli->close();
      }
        else
        {
        ?>
     
      <!-- Example row of columns -->
      <div class="hero-unit">
          <h3> Registar Novo Administrador </h3>
          <div class="row">
                <div class="span4">
                <p align = center>
                    <form method="post" action="registar.php" name="registo" class="navbar-form pull-right">   <br> 
                      <input class="span2" type="text" placeholder="Utilizador" name="user">   <br> 
                <br>  <input class="span2" type="text" placeholder="Email" name="email">   <br> 
                <br>  <button type="submit" class="btn btn-primary btn-large">Registar</button>
                    </form>
                </p>
                </div>
           </div>
      </div>
      
    <?php } // fecha else ?>
      <hr>

      <?php
        include('../cabecalho.php');
        ?>


    </div> <!-- /container -->
    
    
    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
             <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="../chilistats/stats.php"><img src="../chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="../chilistats/stats.php"><img src="../chilistats/counter.php" /></a></noscript>
    </div>
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