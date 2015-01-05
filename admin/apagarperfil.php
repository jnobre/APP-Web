<?php
    session_start();
    include('../mysql.php');
    include('../login_status.php');

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
                  <li> <a href="registar.php">Criar User</a> </li>
                  <li> <a href="listarusers.php">Gerir Utilizadores Existentes</a> </li>
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

    <?php
    $afetados = 0;
    if($_GET['hash'])
    {
      include '../mysql.php';
      $hash = $_GET['hash'];
      $iduser = -1;
      if ($stmt = $mysqli->prepare("SELECT iduser, username FROM UTILIZADORES WHERE hash= ? LIMIT 1")) { 
              
            $stmt->bind_param('s', $hash); 
        		$stmt->execute(); 
    			  $stmt->store_result();
    			  $stmt->bind_result($iduser, $user); 
    			  $stmt->fetch();
      }        
    ?>
    
      <h3 align="center">Apagar Administradores:</h3>
      <hr>
  
      <!-- Example row of columns -->
  <div class="container marketing">  
    <fieldset align="center" >
        <table width='0%' height='0%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF" >
    <?php
      if($iduser >= 0) {
          
             if($_GET['resp'] == 1)
             {
                      
                if ($stmt = $mysqli->prepare("DELETE FROM UTILIZADORES WHERE  iduser = ? ")) {  
                    $stmt->bind_param('d', $iduser); 
                	  $stmt->execute();
                    $afetados = $stmt->affected_rows;
        			      $stmt->close();
                }
                            
                if($afetados > 0)
                {
                   ?> <tr>
        				<td><label>
                            <p align = center><img width = 100 heigth = 100 src=../assets/img/EDP_logo.jpg></p>
                            <h3> Administrador [<?php echo $user ?>] apagado com sucesso!</h3>
                        </label></td>            
                    </tr> <?php
                }
                else
                {
                    ?> <tr>
            			<td><label>
                            <p align = center><img width = 100 heigth = 100 src=../assets/img/EDP_logo.jpg></p>
                            <h3> ERRO a apagar o Administrador [<?php echo $user ?>] </h3>
                        </label></td>            
                    </tr> <?php
                }
            }
            else if($_GET['resp'] == 2)
            {
                 echo("<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=listarusers.php'>"); 
            }
            else 
            { ?>
    			<tr>
					<td colspan = "2"><label>
                        <h4>Pretende apagar o Administrador [<?php echo $user ?>] ?</h4>
                    </label></td>            
                </tr> 
                 <tr>
                    <!--<form method="post" action="apagarperfil.php?hash= &resp=1" name="Enviar">-->
                        <td align = "center"><button type="submit" onclick="confirmarpassword()" class="btn btn-primary btn-medium">Sim</button></td>
                    </form>
                    <form method="post" action="apagarperfil.php?hash=<?php echo($hash) ?>&resp=2" name="Enviar">
                        <td align = "center"><button type="submit" class="btn btn-primary btn-medium">N&atilde;o</button></td>
                  <!--  </form> -->
                </tr>
       <?php
            }
        }else{
                
       ?>
                <tr>
					<td><label>
                        <h3>Administrador n&atilde;o existe!</h3>
                    </label></td>            
                </tr> 
       
       
       
       <?php } ?>
         </table>
         </fieldset> 
         <br><br>
	      <div name="confirmeapagar" id="confirmeapagar" class="container marketing">  
        <div>
     <?php
                } // caso nao tenha hash direcionar para erro interno
                else
                {
                    echo("<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../erro_interno.php'>");  
                }
        ?>
		<hr>
	
      <?php
        include('../cabecalho.php');
        ?>


    </div> <!-- /container -->
  
    <?php
    }
    ?>
    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
   <div style="visibility:hidden" >
    <script type="text/javascript">
      function confirmarpassword(){
        var idoferta="<?php echo($user);?>";
         document.getElementById('confirmeapagar').innerHTML = '<div  align="center"><h4 align="center"> Introduza a sua Password: </h4><form method="post" action="apagarperfil2.php?hash=<?php echo($hash);?>&resp=1" name="registo"><br><br> Password: <input class="span2" type="password" placeholder="Password" name="pw"><br><br><button type="submit" class="btn btn-primary btn-medium">Confirmar</button></form></div>';
       }

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



