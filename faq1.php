<?php
    session_start();
    include('mysql.php');
    include('mysqlconnect.php');
    include('login_status.php');
    
    $control=0;
    function verificaerro()
    {        
     if($_GET['loginerror']==1)
     {  
         echo("<script>errorbox()</script>");
     }
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
    
    <script src="jquery.min.js"></script>
    <script>
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
                  <li> <a href="admin/upload_ficheiro.php">Upload Ficheiro</a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                  <li><a href="admin/gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="admin/gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
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

    <div class="container">
      <br><br><br>
      <!-- Example row of columns -->
    	<div id="p1">

    		<a name="1"></a>
    		<h4 align="center">1. Como posso efetuar uma pesquisa?</h4><br>
    			
    		
    		<div style="padding-left:5em;padding-right:5em;">
    		<h5> Existem <b> dois </b> tipos de pesquisa:</h5>
    		   <li><h5> Pesquisa Rápida </h5></li><br>
    		   <img src="faq/p1.1.jpg">
    		   <h5> A pesquisa rápida como o nome indica , serve para pesquisas rápidas , basta inserir na caixa de texto um valor e irá ser procurado em todos os atributos algo que tenha o nome inserido</h5>
    		   <h5>Exemplo:</h5>
    		   <img src="faq/p1.2.jpg">
    		   <h5><font color="green">Vantagens:</font>Rápido e simples</h5>
    		   <h5><font color="blue">Informação:</font>Não é possivel especificar a que campo queremos aplicar o filtro, ou seja,todas as ofertas que tiverem a palavra Beiragás irão ser mostradas</h5>
    		   
     		  <li><h5> Pesquisa Avançada</h5></li><br>
     		  <h5> A pesquisa avançada é acessível através do seguinte menu:</h5><br>
     		  <img src="faq/p1.3.jpg">
     		  <br><br><br>
     		  <h5> A pesquisa avançada tem a seguinte estrutura </h5><br>
     		  <img src="faq/p1.4.jpg">
     		  <br><br><br>
     		  <h5> Neste modo de pesquisa , pode aplicar vários filtros á sua pesquisa , por exemplo: quero ver todas as ofertas contratáveis e com componente básica Eletricidade + Gás</h5>
     		 	<br>
     		  <img src="faq/p1.5.jpg">

     		  <h5> Depois de introduzir os critérios desejados clique em procurar , neste exemplo iremos pesquisar por todas as ofertas contratáveis com componente básica E+G</h5>
     		  <br>
    		  <img src="faq/p1.6.jpg">
    		  <br>
    		  <h5> Após clicar em procurar irá aparecer no ecrã todas as ofertas encontradas com os critérios definidos </h5>

    		  <h5><font color="green">Vantagens:</font> Possibilidade de aplicar vários filtros de pesquisa. Pesquisa rigorosa </h5>
    		  <h5><font color="blue">Informação:</font>Se desejar detalhar uma oferta , clique no nome da oferta desejada ou no ID Oferta </h5>
				</div>
			
				<hr>

				
    	
        <br><br><br>
        <br>
      <br>

      <div> <p><font color="red"> *Nota:</font> Aplicação web optimizada para o browser Google Chrome.</p> </div>
               
      <hr>

      <?php


        include('cabecalho.php'); 
        ?>
        
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
        <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>
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
    <?php
    verificaerro();
    ?>
  </body>
</html>
