<?php
    session_start();
    include('mysql.php');
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
    
    	h3 {
    		margin: 0px;
    		padding: 0px;	
    	}
    
    	.suggestionsBox {
    		position: relative;
    		left: 0px;
    		margin: 0px 0px 0px 0px;
    		width: 200px;
    		background-color: #212427;
    		-moz-border-radius: 7px;
    		-webkit-border-radius: 7px;
    		border: 2px solid #000;	
    		color: #fff;
    	}
    	
    	.suggestionList {
    		margin: 0px;
    		padding: 0px;
    	}
    	
    	.suggestionList li {
    		font-family: Helvetica;
    	    font-size: 11px;
    		margin: 0px 0px 3px 0px;
    		padding: 3px;
    		cursor: pointer;
    	}
    	
    	.suggestionList li:hover {
    		background-color: #659CD8;
    	}
        
    </style>
    
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/tabela.css" rel="stylesheet">
    
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
   
    <link rel="stylesheet" href="ajax/jquery-ui.css" />
    <script src="ajax/jquery-1.9.1.js"></script>
    <script src="ajax/jquery-ui.js"></script>
    <script type="text/javascript" src="ajax/jquery.form.js"></script> 
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
       
    <!--<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>-->
    <!--<script type="text/javascript" src="jquery.autocomplete.js"></script>-->
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
   
       
    <!--<script type="text/javascript" src="ajax/jquery.form.js"></script> 
    <script type="text/javascript" src="ajax/funcoes.js"></script> -->
           
    <!--<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>-->
   <!-- <script type="text/javascript" src="jquery-1.2.1.pack.js"></script>-->
    <script>

    
    // Quando carregado a página 
    $(function($) {   
        // Quando enviado o formulário 
        $('#pesquisar_form').submit(function() {   
            // Limpando mensagem de erro 
             $("#resposta").html("<img src='ajax/image-load.gif' alt='Load' height='100' width='100'><br><h4>Carregando...</h4>");    
            
             // Enviando informações do formulário via AJAX 
             $(this).ajaxSubmit(function(resposta) {   
             // Se não retornado nenhum erro 
                 $("#resposta").empty();
                 $("#resposta").append(resposta);
                 $('html, body').animate({scrollTop: $("#resposta").offset().top}, 2000);
                 /*if (!resposta) 
                     // Redirecionando para o painel
                     window.location.href = 'painel.php'; 
                 else { // Escondendo loader 
                     $('div.loader').hide();   
                     // Exibimos a mensagem de erro 
                     $('div.mensagem-erro').html(resposta); 
                 } */  
                 
             });
            
            // Retornando false para que o formulário não envie as informações da forma convencional return false;  
            return false;
            
        });
            
             $("#nome").autocomplete({
                source:'ajax/pesquisar_autov2.php',
                minLength:1
               
            });
            
             $("#id").autocomplete({
                source:'ajax/pesquisar_autoid.php',
                minLength:1
               
            });

    }); 
    
    /*function lookup(inputString) {
 
        console.log(inputString);
    	if(inputString.length == 0) {
		
			$('#suggestions').hide();
            $('#suggestions1').hide();
		} else {
			$.post("ajax/pesquisar_auto.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
                     $('#suggestions1').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	}
	
	function fill(thisValue) {
        console.log(thisValue);
		$('#nome').val(thisValue);
		setTimeout("$('#suggestions').hide();", 100);
        setTimeout("$('#suggestions1').hide();", 100);
	}*/
    
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
        }else{
           $("#login").show(1000);
           // $("#login_li").show(1000);
           controlo=0;
        }
    }
    
        
   
    
    function validate()
    {
        var x=document.getElementById("estado").value;

      /*  if(x == "1")
        {
            document.getElementById("data_inicio").readOnly = false;
            document.getElementById("data_fim").readOnly = false;
        }
        else 
        {
            document.getElementById("data_inicio").readOnly = true;
            document.getElementById("data_fim").readOnly = true;
        }
        */
       /* if(document.getElementById('check_gas').checked)
            document.getElementById("id_estrutura_gas").readOnly = false;
        else
            document.getElementById("id_estrutura_gas").readOnly = true;
             
        if(document.getElementById('check_electricidade').checked)
            document.getElementById("id_estrutura_electricidade").readOnly = false;
        else
           document.getElementById("id_estrutura_electricidade").readOnly = true;*/
    }
    
    window.onload = function(){
            $("#login").hide();
            //div electricidade/gas
      //      document.getElementById("data_inicio").readOnly = true;
        //    document.getElementById("data_fim").readOnly = true;
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
              <li><a href="index.php">Início</a></li>
              <li><a href="listar.php">Listar</a></li>
              <li class="active"><a href="pesquisar.php">Pesquisar</a></li>
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
                  <li><a href="admin/log_operacao.php">Ver Log de Operações</a></li>
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

      <br>
    <form method="post" action="ajax/busca_pesquisar.php" name="pesquisar_form" id="pesquisar_form" > 
    <!---------------------- TABELA PRINCIPAL ---------------------->
    <fieldset align="center" >
        <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF" >
                <tr>
                    <td colspan = "7">
                        <label>
                            <hr style="border-color:#f00; background-color: #f00;">
                                <h4>Pesquisar</h4>
                            <hr style="border-color:#f00; background-color: #f00;">
                        </label>
                        <br>
                    </td> 
                  
                </tr> 
                <tr class="hero-unit">
                    <td NOWRAP='NOWRAP'>
                        <label>ID Oferta:</label> 
                    </td>
                    <td colspan="2">
                        <input class='span3' type="text" placeholder="ID" name="id" id="id">
                    </td>
                    <td>
                        <label>Estado:</label> 
                    </td>
                    <td>
                        <select class="span2" id="estado" name="estado">
                            <option value="1">Contrat&aacute;vel</option>
                            <option value="2">N&atilde;o Contrat&aacute;vel</option>
                            <option value="nada" selected>N/A</option>
                        </select>
                    </td>
                     <td>
                        <label>D&eacute;bito Direto:</label> 
                    </td>
                    <td>
                     <select class="span2" id="debito_direto" name="debito_direto" >
                            <option value="1">Obrigat&oacute;rio</option>
                            <option value="2">Facultativo</option>
                            <option value="nada" selected>N/A</option>
                    </td>
                 </tr>
                 <tr class="hero-unit">
                    <td NOWRAP='NOWRAP'>
                        <label>Nome Oferta:</label> 
                    </td>
                    <td colspan="2">
                        <input class='span3' type="text" value="" placeholder="Nome" name="nome" id="nome"   /> 
                            <!--<input type="text" style="width: 200px;" value="" id="CityAjax" class="ac_input"/>
                            <input type="button" onclick="lookupAjax();" value="Get Value"/>-->
                        
                        <!--<div id="suggestions1" style="display: none;border: none;border-radius:none;" align="center">
                            <img src="upArrow.png" style="position: absolute; top: -10px; left: 20px;" alt="upArrow" />
                        </div>
                        <div class="suggestionsBox" id="suggestions" style="position:absolute; top: 300px; left: 20px; display: none;" align="center">
                            <div class="suggestionList" id="autoSuggestionsList">      					
                            </div>
                    	</div>-->
                    </td>
                    <td>
                      <label>Data In&iacute;cio:</label> 
                    </td>
                    <td>
                        <input class="span2" type="date" name="data_inicio" id="data_inicio"> 
                    </td>
                    <td>
                        <label>Conta Certa:</label> 
                    </td>
                    <td>
                     <select class="span2" id="conta_certa" name="conta_certa" >
                            <option value="1">Obrigat&oacute;rio</option>
                            <option value="2">Facultativo</option>
                            <option value="nada" selected>N/A</option>
                     </select>
                    </td>
                 </tr>
                 <tr class="hero-unit">
                   <td NOWRAP='NOWRAP'> 
                        <label> G&aacute;s
                        <input type="checkbox"  name="check_gas" id="check_gas" value="check" onclick="validate()"></label>
                   </td>
                   <td align="left" >
                        <label>Eletricidade
                        <input type="checkbox"  name="check_electricidade" id="check_electricidade" value="check"  onclick="validate()"></label>
                        
                   </td>
                   <td align="left" WIDTH="200">
                      <label>Servi&ccedil;os
                      <input type="checkbox"  name="check_servicos" id="check_servicos" value="check"  onclick="validate()"></label>
                   </td>
                   <td>
                        <label>Data Fim:</label> 
                    </td>
                    <td>
                        <input class="span2" type="date" name="data_fim" id="data_fim"> 
                    </td>
                    <td>
                        <label>Correspond&ecirc;ncia <br> Eletr&oacute;nica</label>
                    </td>
                    <td>
                        <select class="span2" id="correpondencia_elec" name="correpondencia_elec" onchange="validate()">
                            <option value="1">Obrigat&oacute;rio</option>
                            <option value="2">Facultativo</option>
                            <option value="nada" selected>N/A</option>
                        </select>
                    </td>
                 </tr>
                 <tr>
                    <td align="left" colspan="3">
                        Ordenar Por:
                        <select class="span2" id="ordenar" name="ordenar">
                            <option value="nada" selected></option>
                            <option value="id">ID Oferta</option>
                            <option value="nome" >Nome Oferta</option>
                            <option value="estado">Estado</option>
                            <option value="data_inicio">Data Início</option>
                            <option value="data_fim">Data Fim</option>
                            <option value="debito_direto">D&eacute;bito Direto</option>
                            <option value="conta_certa">Conta Certa</option>
                            <option value="correspondencia_elec">Correspondência Ele.</option>
                        </select>
                    </td>
                    <td colspan="4" align="right">
                        <!--<input id="select" type="button" value="Procurar" class="btn btn-danger">-->
                        <input type='submit' value='Procurar' id="Procurar" name="Procurar" class="btn btn-danger" />
                        <!--<button type='button' id="Procurar" name="Procurar" class="btn btn-danger">Procurar</button> -->
                    </td>
                 </tr>
                   
    </table>
    </fieldset>
    </form>
    <div id="resposta" align="center">
                                    
    </div>
    <br><br><br>
    <hr>
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
