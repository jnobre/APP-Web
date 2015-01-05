<?php
     session_start();
    include('mysql.php');
    include('login_status.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
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
    
         <style type="text/css" title="currentStyle">
            @import "assets/table/media/css/demo_page.css";
        @import "assets/table/media/css/demo_table.css";
            @import "assets/table/media/css/ColVis.css";
            @import "assets/table/media/css/TableTools.css";
            @import "assets/table/media/css/dataTables.scroller.css";
            @import "assets/table/media/css/mystyle.css";
           
      
    </style>
    
    <script type="text/javascript" language="javascript" src="assets/table/media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="assets/table/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/table/media/js/ColVis.js"></script>
       <script type="text/javascript" charset="utf-8" src="assets/table/media/js/FixedColumns.js"></script>

        <script type="text/javascript" charset="utf-8" src="assets/table/media/js/ZeroClipboard.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/table/media/js/TableTools.js"></script>
        <script type="text/javascript" language="javascript" src="assets/table/media/js/dataTables.scroller.js"></script>
    

        
    <!--<script src="jquery.min.js"></script>-->
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
              <li ><a href="index.php">Inicio</a></li>
              <li class="active"><a href="listar.php">Listar</a></li>
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
      <br>
      <?php
      $result = mysqli_query($mysqli,"SELECT *  FROM OFERTAS"); 
      ?>
      <!-- Example row of columns -->
       <h3 align="center">Lista de Ofertas</h3>
        <hr>
            <h6> Para detalhar uma oferta clique no nome da oferta a detalhar. </h6>
            <h6> Para comparar duas ofertas selecione-as clicando nelas e clique em Comparar Ofertas no canto inferior esquerdo. </h6>
        <hr>
       <div class="teste">
       <a href="downloadlistar.php"> <p align="right"> <img  width="50" height="50" src="icones/excel.png"></p></a>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead>
        <tr>
                <th>ID Oferta</th>
                <th>Nome</th>
                <th>Estado </th>
                <th>Data Inicio</th>
                <th>Data Fim</th>
                <th>Reclamação Divida </th>
                <th>Duracao</th> 
                <th>Penalização</th>
                <th>Valor</th>
                <th>Componente Basica</th>
                <th>Componente Estruturada E</th>
                <th>ID Estruturada E</th>
                <th>Estrutura Tarifaria E </th>
                <th>ID Estrutura Tarifaria E</th>
                <th>Componente Estruturada GN</th>
                <th>ID Estruturada GN </th>
                <th>Estrutura Tarifaria GN</th>
                <th>ID Estrutura Tarifaria GN</th>
                <th>Débito Direto</th>
                <th>Conta Certa</th>
                <th>Correspondência Eletrónica</th>
                <th>Entidade Parceira</th>
                <th>Valor EP</th>
                <th>Valor Benéfico EP </th>
                <th>Unidade EP </th>
                <th>Aplicado EP </th>
                <th>Observações </th>
                <th>Solução Alternativa Eletricidade </th>
                <th>Solução Alternativa Gás </th>
        </tr>
      </thead>
    <tbody>
      <?php
       while($row = mysqli_fetch_array($result))
        {
            $idoferta=$row['IDOFERTA'];
            echo("<tr>");
            echo("<td>" . $idoferta . "</td>");
            echo("<td><a href='detalharoferta.php?idoferta=" . $idoferta . "'>" . $row['NOME'] . "</a></td>");
            echo("<td align='center'>" . $row['ESTADO'] . "</td>");
            echo("<td align='center'>" . date("j-n-Y",strtotime($row['DATA_INICIO'])) . "</td>");
             $d = new DateTime($row['DATA_FIM']); 
            echo("<td align='center'>" . ($d->format("d-m-Y"))  . "</td>");
            echo("<td align='center'>" . $row['RECLAMACAO_DIVIDA'] . "</td>");
            echo("<td align='center'>" . $row['DURACAO'] . "</td>");
            echo("<td align='center'>" . $row['PENALIZACAO'] . "</td>");
            echo("<td align='center'>" . $row['VALOR'] . "</td>");
            echo("<td align='center'>" . $row['COMPONENTE_BASICA'] . "</td>");
            echo("<td align='center'>" . $row['COMPONENTE_ESTRUTURADA_E'] . "</td>");
            echo("<td align='center'>" . $row['ID_ESTRUTURADA_E'] . "</td>");
            echo("<td align='center'>" . $row['ESTRUTURA_TARIFARIA_E'] . "</td>");
            echo("<td align='center'>" . $row['ID_ESTRUTURA_TARIFARIA_E'] . "</td>");
            echo("<td align='center'>" . $row['COMPONENTE_ESTRUTURADA_GN'] . "</td>");
            echo("<td align='center'>" . $row['ID_ESTRUTURADA_GN'] . "</td>");
            echo("<td align='center'>" . $row['ESTRUTURA_TARIFARIA_GN'] . "</td>");
            echo("<td align='center'>" . $row['ID_ESTRUTURA_TARIFARIA_GN'] . "</td>");
            echo("<td align='center'>" . $row['DEBITO_DIRETO'] . "</td>");
            echo("<td align='center'>" . $row['CONTA_CERTA'] . "</td>");
            echo("<td align='center'>" . $row['CORRESPONDENCIA_ELETRONICA'] . "</td>");
            echo("<td align='center'>" . $row['ENTIDADE_PARCEIRA'] . "</td>");
            echo("<td align='center'>" . $row['VALOR_EP'] . "</td>");
            echo("<td align='center'>" . $row['VALOR_BENEFICO_EDP'] . "</td>");
            echo("<td align='center'>" . $row['UNIDADE_EP'] . "</td>");
            echo("<td align='center'>" . $row['APLICADO_EP'] . "</td>");
            echo("<td align='center'>" . $row['OBSERVACOES'] . "</td>");
            echo("<td align='center'>" . $row['ALTER_E'] . "</td>");
            echo("<td align='center'>" . $row['ALTER_GN'] . "</td>");
            echo("</tr>");
            
            
             
            
         }
      ?>
  </tbody>

</table>

</div>
      
      
      <hr>
 <button type="submit" onClick="conf_comp();" class="btn btn-primary btn-medium btn-danger">Comparar Ofertas</button>
 
 <hr>
      <?php
        include('cabecalho.php');
    ?>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
     <script type="text/javascript" charset="utf-8">
     var contador=0;
     var ofr1=0;
     var ofr2=0;
     var aux=0;
           $(document).ready( function () {
             $('#example tr').click( function() {
              if ($(this).hasClass('row_selected') )
                  {
                  
                    var aPos = oTable.fnGetPosition( this );
                    var aux=oTable.fnGetData(aPos);
                   
                    if(aux[0]==ofr1[0])
                    {
                        ofr1=0;
                    }
                    else if(aux[0]==ofr2[0])
                    {
                        ofr2=0;
                    }
                    else
                    {
                        alert("Something went wrong , please restart...");
                    }
              $(this).removeClass('row_selected');
                    contador=contador-1;
                   }
            else
                 {
                    if(contador!=2)
                    {
                        var aPos = oTable.fnGetPosition( this );
                        if(ofr1==0)
                        {
                           ofr1 = oTable.fnGetData(aPos);
                        }
                        else if(ofr2==0)
                        {
                           ofr2 = oTable.fnGetData(aPos);
                            
                        }
                        else
                        {
                            alert("Something went wrong, please restart... ");
                        }
                  $(this).addClass('row_selected');
                        contador=contador+1;
                    }
                }
  } );
  
       var oTable=$('#example').dataTable( {          
                         "sScrollY": "500px",
                        "sScrollX": "300px",
             "bScrollCollapse": true,
                        "bPaginate": false,
                        "sDom": 'TC<"clear">lfrtip',
                        "bDeferRender": true,
                        "oColVis": {
                       "buttonText": "Visibilidade",
                "activate": "click",
          },
                    "aoColumnDefs": [
                    
                          
                          {"bVisible": false, "aTargets": [5,6,7,8,11,13,15,17,22,23,24,25,26]},
                          {"sWidth": "140px", "aTargets": [ 1,3,4,12,14,16 ]},
                           {"sWidth": "400px", "aTargets": [ 7 ]}
                        ],
                     "oTableTools": {
                      
                         "sSwfPath": "assets/table/media/swf/copy_csv_xls_pdf.swf",
                         "aButtons": [
                         "copy",
                  
            ]
                         
                        },
                    "oLanguage": {
                        "sEmptyTable": "Sem Dados para mostrar",
                        "sInfoEmpty": "Sem Dados",
                         "sInfo": "",
                          "sSearch": "Pesquisa: _INPUT_ "
                    }
                        
                       
        }

      
                
                
                
                );
                
      } );
            
     var controlo=1;
     
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
     function getofr1()
     {
        return ofr1[0];
     }
     function getofr2()
     {
        return ofr2[0];
        
     }
     
        function conf_comp()
        {
            if(contador==2)
            {
              var r=confirm("Pretende comparar a oferta: " + getofr1() + " com: " + getofr2() + " ? ");
              if (r==true)
              {
                  window.location = 'compararofertas.php?OFR1=' + getofr1() + '&OFR2=' + getofr2();
              }
            }
            else
            {
              window.alert("Erro:Tem de selecionar pelo menos duas ofertas para efeitos de comparação");
            }
     
        }
     
  </script>
            <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>
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