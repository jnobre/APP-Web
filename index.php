<?php
    session_start();
    include('mysql.php');
    include('mysqlconnect.php');
    include('login_status.php');
    
    $control=0;
    function getlinks()
    {

      $sql="SELECT * FROM LINK";
      $result=mysql_query($sql) or die(mysql_error());
      return $result;
    }
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

        .myMarquee {width:100%; height:80px; overflow:hidden; position:relative; border:1px solid #aaa; margin:0 auto;box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.7);-o-border-radius: 18px 18px;-moz-border-radius: 18px 18px;-webkit-border-radius: 18px 18px;border-radius: 18px 18px;background:#f8f8f8;background-image: -webkit-gradient(linear, 0% 0%, 0% 95%, from(rgba(255, 255, 255, 0.7)), to(rgba(255, 255, 255, 0)));background-image: -moz-linear-gradient(-90deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0));}

        .scroller {display:block; width:1240px; height:40px; position:absolute; left:0; top:0;-moz-animation-iteration-count: infinite;-moz-animation-timing-function: linear;-moz-animation-duration:10s;-moz-animation-name: scroll;-webkit-animation-iteration-count: infinite;-webkit-animation-timing-function: linear;-webkit-animation-duration:10s;-webkit-animation-name: scroll;}

        .scroller div {font-family:georgia, serif; font-size:16px; line-height:40px; float:left; width:600px; color:#000; font-weight:bold; padding:0 10px; }

        .scroller div a {color:#c00;}

        @-moz-keyframes scroll {
        0% {left:0;}
        100% {left:-620px;}
        }
        .scroller:hover {
         -moz-animation-play-state: paused;
         }

        @-webkit-keyframes scroll {
        0% {left:0;}
        100% {left:-620px;}
        }
        .scroller:hover {
         -webkit-animation-play-state: paused;
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
    $(document).ready(function()
    {    
        $('#changelog').change(function () {
              var selecionado = $("#changelog option:selected").val();
               $("#teste").empty(); 
              
              //var select='<h2>Altera&ccedil;&otilde;es Recentes</h2><select id="changelog"><option value="3">v[1.0.1.1]</option><option value="2">v[1.0.1]-Fix</option><option value="1">v[1.0.1]-Funcionalidades</option>            </select>';
              var parte0='<hr style="margin:0">';
              if(selecionado=="1")
              {
                 
                  var parte1='<p>[v.1.0.1]<font color="green"> Funcionalidade: </font> Adicionada listagem detalhada de uma oferta (Clicando no ID Oferta pretendido).<br> <font color="red">Nota:</font> A oferta de momento mais completa na base de dados é a oferta com o <a href="detalharoferta.php?idoferta=OFR2952093">ID:OFR2952093</a></p><hr style="margin:0"><p>[v.1.0.1]<font color="green"> Template: </font>Criação do template criar oferta e algumas das suas funcionalidades(Não completo )</p>';
                  var parte2='<p>[v.1.0.1]<font color="green"> Funcionalidade: </font>Criação de inserção manual dos Tarifários de Eletricidade/Gás</p>';
                  var parte3='<p>[v.1.0.1]<font color="green"> Funcionalidade: </font>Ver em detalhe o tarifário de gás atribuido a uma determinada oferta clicando em [Detalhar Tarifário] na componente Gás (Tabela 4)</p>';
                  var parte4='<p>[v.1.0.1]<font color="green"> Funcionalidade: </font>Ver em detalhe o tarifário de Eletricidade atribuido a uma determinada oferta clicando em [Detalhar Tarifário] na componentes Eletricidade (Tabela 5)</p>';
                  var parte5='<p>[v.1.0.1]<font color="green"> Funcionalidade: </font>Na Página detalhar uma oferta, adicionada a funcionalidade de esconder/mostrar um determinado grupo de dados para o utilizador poder visualizar com mais facilidade os dados que pretende(Sem scroll excessivo)</p>'
                // document.getElementById('changelogdiv').innerHTML = parte1  + parte0 + parte2 + parte0 + parte3 + parte0 + parte4 + parte0 + parte5 + parte0 + parte6 + parte0 + parte7 + parte0 + parte8 + parte0;
                 $("#teste").append(parte1  + parte0 + parte2 + parte0 + parte3 + parte0 + parte4 + parte0 + parte5 + parte0); 
              }
              else if(selecionado=="2")
              {

                parte1='<p>[v.1.0.1]<font color="red">Fix: </font>Página: Detalhar Oferta: Clicando no detalhar tarifário eletricidade ou gás irá agora abrir numa nova aba do browser </p>';
                parte2='<p>[v.1.0.1]<font color="red"> Fix: </font> Alteração da cor do menu;</p>';
                parte3='<p>[v.1.0.1]<font color="red"> Fix: </font> Formulário de Login só irá aparecer/esconder quando o utilizador o desejar</p>';
                parte4='<p>[v.1.0.1]<font color="red"> Fix: </font> Na página de listagem de todas as ofertas,estrutura da página corrigida para o browser IE</p>';
                //document.getElementById('changelogdiv').innerHTML = parte1 + parte0 + parte2 + parte0 + parte3 + parte0 + parte4 + parte0;
                 $("#teste").append(parte1 + parte0 + parte2 + parte0 + parte3 + parte0 + parte4 + parte0);
              }
              else if(selecionado=="3")
              {

                parte1=' <p>[v.1.0.1.1]<font color="red"> Nota:</font> Aplicação web optimizada nesta versão apenas para o browser Google Chrome.</p>';
                parte2='<p>[v.1.0.1.1]<font color="green">Funcionalidade:</font>Páginas:Detalhar Tarifário de eletricidade / gás : Modo de Impressão adicionado.';
                //document.getElementById('changelogdiv').innerHTML = parte1 + parte0 + parte2 + parte0;
                $("#teste").append(parte1 + parte0 + parte2 + parte0);
              
              }

        });    
    
    
    });
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
                  <li><a href="admin/log_operacao.php">Ver Log de Operações</a></li>
                  <li><a href="admin/gerirlinks.php">Gerir Links Rápidos</a></li>

                  
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
      <div class="row">
       <div class="span4">
          <h2>D&uacute;vidas Frequentes</h2>
          <p><a href="faq1.php">1.Como posso efetuar uma pesquisa?</a></p>
          <hr style="margin:0">
          <p><a href="faq2.php">2.Como listo todas as ofertas?</a></p>
          <hr style="margin:0">
          <p><a href="faq3.php">3.Como imprimo todas as ofertas?</a></p>
          <hr style="margin:0"
          ><p><a href="faq4.php">4.Quero imprimir e detalhar uma oferta.</a></p>
          <hr style="margin:0">
          <p><a href="faq5.php">5. Como vejo o preçário de uma oferta(Gás ou Eletricidade) ?</a></p>
          <hr style="margin:0"> 
          <p><a href="faq6.php">6. Quero comparar duas ofertas</a></p>
          <hr style="margin:0">
          
          <?php
          if(login_status()==1)
          {
            ?>
          <p><a href="faq_template.php">7. [Administração] Como preencho o Template para o Upload?</a></p>
          <hr style="margin:0">   
          <p><a href="admin/faq1.php">8 [Administração] Gestão de Users</a></p>
          <hr style="margin:0">
          <p><a href="admin/faq2.php">9 [Administração] Gestão de Ofertas </a></p>
          <hr style="margin:0">
          <p><a href="admin/faq3.php">10 [Administração] Gestão de Tarifários </a></p>
          <hr style="margin:0">

<?php
          }
     ?>     
        </div>
       <div class="span4" id="changelogdiv">
         <h2>Altera&ccedil;&otilde;es Recentes</h2>
         <ul>
         <?php
              $sql = "SELECT * FROM log WHERE admin = 0 LIMIT 5";
              $result=mysql_query($sql) or die(mysql_error());
              while($row = mysql_fetch_array($result))
              { 
                 echo "<li> <font color=##6b70ac>[".$row['data']."]</font> ".$row['descricao']."</li><hr style='margin:5px'>";
              }

          ?>
        </ul>
      <?php
      if(login_status()==1)
      {
        ?>
          <p><a class="btn" href="admin/log_operacao.php">Ver detalhes &raquo;</a></p>
        <?php

      }
      else
      {
        ?>
        <p><a class="btn" href="log_operacao.php">Ver detalhes &raquo;</a></p>
        <?php
      }
?>
       </div>
        <div class="span4">
        <?php
        $result=getlinks();
        ?>
          <h2>Links R&aacute;pidos</h2>
          <?php
          while($row = mysql_fetch_array($result))
          {
            ?>
            <p><a href="<?php echo($row['LINK']);?>" target="_blank"><?php echo($row['NOME']);?></a></p>
            <hr style="margin:0">
            <?php
          }   
          ?>
   
       </div>
      </div>
      <br><br><br>
      <div align="left" >
      <img class="pull-left" src="icones/warning_32.png">
      <?php
        $sql = "SELECT * FROM alertas ";
        $result=mysql_query($sql) or die(mysql_error());
        $num_rows = mysql_num_rows($result);
        if($num_rows == 0)
          echo "<br>&nbsp;&nbsp;Sem Alertas.";
        else
        {
      ?>
      <marquee behavior="scroll" direction="left">
      <?php 
        while($row = mysql_fetch_array($result))
        { 
           echo " Oferta [".$row['descricao']."] irá expirar amanhã. &nbsp;&nbsp;&nbsp;";
        }
      ?>
      </marquee>
      <?php } ?> 

      </div>
    <!--  <div class="myMarquee">
      <div class="scroller">
<br>
       <?php 

        /* while($row = mysql_fetch_array($result))
         { 
                 echo " Oferta [".$row['descricao']."] já expirou. &nbsp;&nbsp;&nbsp;";
          }*/
       ?>

      </div>
      </div>-->
        <!--<a href="updates.php">[Actualizações da aplicação]</a>-->
        <br>
        <br>
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
    <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>
    <?php
    verificaerro();
    ?>
  </body>
</html>
