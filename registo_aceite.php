<?php
session_start();
include('mysql.php');
include('login_status.php');
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
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/img/EDP_logo.jpg">
    <script>                             
         function errorbox(){
            window.alert("Password e Confirma&ccedil;&atilde;o de Password n&atilde;o coincidem!<br> Est&aactue; a ser redecionado...");
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
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="listar.php">Listar</a></li>
              <li><a href="pesquisar.php">Pesquisar</a></li>
              
              
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>



      <br><br><br>
      <?php
   
        if ($_GET['hash'])
        {
                include 'mysql.php';
                $temp = 0;
            	$hash=$_GET['hash']; 
                if ($stmt = $mysqli->prepare("SELECT iduser,username,password,email,conf,hash FROM UTILIZADORES WHERE hash= ? LIMIT 1")) { 
                  $stmt->bind_param('s', $hash); 
        		  $stmt->execute(); 
    			  $stmt->store_result();
    			  $stmt->bind_result($iduser, $user, $pass, $email, $conf, $hash); 
    			  $stmt->fetch();
                }
            			
                if($stmt->num_rows > 0)
    			{
                    if($conf == 0)
                      if ($stmt_update = $mysqli->prepare("UPDATE UTILIZADORES SET conf=1 WHERE iduser= ?")) { 
            			    $stmt_update->bind_param('s', $iduser); 
                            $stmt_update->execute();
                            $stmt_update->close();
                        }
            
                }else{
            	    echo("<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=erro_interno.php'>");                    
                }
                
        if($_POST['password'] && $_POST['password_conf'])
        {             
                //Mudar a password
                    if($_POST['password'] == $_POST['password_conf'])
                    {
                        $password = md5($_POST['password'].$email);
                        $temp = 2;
                        if($stmt_update1 = $mysqli->prepare("UPDATE UTILIZADORES SET password='$password' WHERE iduser= ?")){ 
                                $stmt_update1->bind_param('s', $iduser); 
                                $stmt_update1->execute();
                                $afetados =  $stmt_update1->affected_rows;
                                $stmt_update1->close(); 
                        }
                        
                        
                        if($afetados > 0)
                        {
                            $conf=2;
                            ?><div align="center">
                                <br><label>Password Modificada com sucesso! Redirecionando...</label> 
                              </div>
                                <meta HTTP-EQUIV='Refresh' CONTENT='3;URL=index.php'>
                            <?php
                        }
                        else
                        {
                            echo ("<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=erro_interno.php'>");
                        }           
    
                    }
                    else
                         $temp=1;
                    

        }
        if($temp==1 || $temp==0)
        {   
        ?>
                   
        <div class="container marketing">         
	       <fieldset align="center" >
             <table width='0%' height='0%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF">
				<tr>
					<td><label>
                        <h3>Gestão de Conta: [<?php echo $user?>] </h3>
                        <p>Bem Vindo <?php echo $user ?> , antes de continuar por favor actualize a sua password.</p>
                    </label></td>            
                </tr> 
        
       <?
         
       
                ?>
                <?php if($temp == 1){   ?>
                <tr>
                
                <td><br><label><font color="red">Password e Confirma&ccedil;&atilde;o n&atilde;o coincidem!</font></label></td>

            	</tr>
                <?php  }  ?>
                <tr>
                
                <td><br><label>Pode modificar a Password:</label> </td>

        		</tr>
                
                <tr>
                
                <td><br><label>Password:</label> </td>

    			</tr>					
            
				<tr>
					<td><input  readonly type="password" name="Zip" size="5" placeholder="****************"></input></td>
				</tr>
                    
                <form method="post" action="registo_aceite.php?hash=<?php echo $hash ?>" name="registo" class="navbar-form pull-right">     
                <tr>

				<td><br><label>Nova Password:</label> </td>

				</tr>
				

				<tr>
					<td><input type="password" name="password" size="5" ></input></td>
				</tr>
                
                <tr>
					<td><br><label>Confirmar Password:</label> </td>

				</tr>					

				<tr>
					<td><input  type="password" name="password_conf" size="5" ></input></td>
				</tr>
                
                <tr>
        			<td><button type="submit" class="btn">Confirmar</button></input></td>
				</tr>
                    
                </form>
                
    <?php
            }      
        
    ?>
            </table>
         </fieldset>    
      <hr>
     <?php
        include('cabecalho.php');
        ?>

    </div> <!-- /container -->
    
    <?php } else {
               echo ("<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=erro_interno.php'>");
            }// fecha else ?>
    
    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
    <script src="assets/js/jquery.js"></script>
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