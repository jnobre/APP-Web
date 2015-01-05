<?php
    session_start();
   include('../mysql.php');
   include('../login_status.php');
    //Funcao que verifica se todas as restricoes foram verificadas retorna 1 se todos os requisitos foram verificados e caso contrário retorna 0.
    function verificapassword()
    {
        if(($_POST['nova_password']) && ($_POST['conf_password']))
        {
            
            if($_POST['nova_password']==$_POST['conf_password'])
            {
                return 1;
            }
            else
            {
                echo("Erro: Passwords nao coincidem");
            }
            
        }
        return 0;   
    }
    
   
    //Retorna dados do utilizador
    function getdata()
    {   
        echo("ENTRA1");

       /* if ($stmt = $mysqli->prepare("SELECT username, email FROM UTILIZADORES"))
        { 
            echo("ENTRA");
		  $stmt->bind_param('s', $_GET['hash']);
          $stmt->execute(); // Execute the prepared query.
		  $stmt->store_result();
		  $stmt->bind_result($username, $email); // get variables from result.
		  $stmt->fetch();
        }*/
        
        
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
              <li><a href="#contact">Inserir</a></li>
              <li class="dropdown active">
                
                <a href="#" style="color: #FFFFFF" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li class="active"><a href="profile.php">Minha Conta</a></li>
                  <li ><a href="registar.php">Criar User</a></li>
                  <li><a href="listarusers.php">Gerir Users Existentes</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li> <a href="upload_ficheiro.php">Upload Ficheiro</a> </li>
                  <li class="divider"></li>
                 <li class="nav-header">Tarifário</li>
                  <li ><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
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
                    echo("Bem Vindo <a href='profile.php'>" . $_SESSION['nome'] ."</a>");
                    echo ("<a href='../logout.php'>  [Logout]</a>")
                    ?></font></ul></li></div> 
                </div><!--/.nav-collapse -->
          </div>
      </div>
    </div>

  <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <!--<div class="hero-unit">
        <h1> FAQ? </h1>
        <p>Pergunta 1? <br>     Resposta 1<br> Pergunta 2? <br> Resposta 2<br> Pergunta 3?<br> Resposta 3<br> 
        Pergunta 4?<br> Resposta 4<br> 
        Pergunta 5?<br> Resposta 5<br>
        Pergunta 6?<br> Resposta 6<br>
        </p>
      <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>-->
      <h3 align="center">Perfil</h3>
      <hr>
      <!-- Example row of columns -->
          <div class="container marketing">  

    	

			<fieldset align="center" >

				<table width='0%' height='0%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF" >
            <?php 
                if(verificapassword()!=1)
                {
                     
                    //getdata();
                    if ($stmt = $mysqli->prepare("SELECT iduser,username,password,email,conf,hash FROM UTILIZADORES WHERE hash= ? LIMIT 1")) { 
                          $stmt->bind_param('s', $_GET['hash']); 
                          $stmt->execute(); 
            			  $stmt->store_result();
            			  $stmt->bind_result($iduser, $user, $pass, $email, $conf, $hash); 
            			  $stmt->fetch();
                        }
                      //  echo "id == " . $iduser;
                        
                    ?>
                     <form method="post" action="editarperfil.php?hash=<?php echo($_GET['hash']) ?>" name="Enviar">
					<tr>

						<td><label>Utilizador:</label></td>

					</tr>

					

					<tr>
            
          <td><input readonly type="text" name="utilizador" placeholder="<?php echo $user ?>" ></input></td>

					</tr>

						

					<tr>

						<td><br><label>Email: </label> </td>

					</tr>

						<tr>

							<td><input readonly type="text" name="email" size="5" placeholder="<?php echo $email ?>" </input></td>

							

						</tr>
                
					

					<tr>

						<td><br><label>Password:</label> </td>

					</tr>

					

					<tr>
						<td><input  readonly type="password" name="password" size="5" placeholder="****************"></input></td>
					</tr>
                    
                    
                        <tr>

						<td><br><label>Nova Password:</label> </td>

					</tr>

					

					<tr>
						<td><input type="password" name="nova_password" size="5" ></input></td>
					</tr>
                        <tr>

						<td><br><label>Confirmar Password:</label> </td>

					</tr>

					

					<tr>
						<td><input  type="password" name="conf_password" size="5" ></input></td>
					</tr>
					
                    <tr>
                        <td><button type="submit" class="btn btn-primary btn-medium">Enviar</button></td>
                    </tr>
                    </form>
                    <?php
                }
                else
                {
                    //Todos os requisitos para mudar a password foram verificados logo muda password
                    if ($stmt = $mysqli->prepare("SELECT iduser,username,password,email,conf,hash FROM UTILIZADORES WHERE hash= ? LIMIT 1")) { 
                          $stmt->bind_param('s', $_GET['hash']); 
                          $stmt->execute(); 
                		  $stmt->store_result();
            			  $stmt->bind_result($iduser, $user, $pass, $email, $conf, $hash); 
            			  $stmt->fetch();
                        }
                    $pass_encry = md5($_POST['nova_password'].$email);
                    if($update_stmt = $mysqli->prepare("UPDATE UTILIZADORES SET password= ? WHERE hash= ? ")) 
                    {
                           $update_stmt->bind_param('ss',$pass_encry,$_GET['hash']); 
        				   // Execute the prepared query.
    					   $update_stmt->execute();
                           $update_stmt->close();
                    }
                    echo("A su password foi mudada com sucesso. Redirecionando em 5 segundos");
                    echo ('<meta HTTP-EQUIV="REFRESH" content="5; url=listarusers.php">');
                }
                ?>
                
				</table>

    </fieldset>
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
 <?php
    }
?>
</html>