<?php
error_reporting(E_ERROR);
     session_start();
    include('mysql.php');
    include('mysqlconnect.php');  
    include('login_status.php');


    $et=$_GET['ET'];
    if($et=='')
    {
        echo("Nothing to show here");
    }
    $iddate=$_POST['data'];
    if($iddate==NULL)
    {
        $iddate=0;
    }
    
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
    <script src="jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="assets/table/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/table/media/js/ColVis.js"></script>
       <script type="text/javascript" charset="utf-8" src="assets/table/media/js/FixedColumns.js"></script>

        <script type="text/javascript" charset="utf-8" src="assets/table/media/js/ZeroClipboard.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/table/media/js/TableTools.js"></script>
        <script type="text/javascript" language="javascript" src="assets/table/media/js/dataTables.scroller.js"></script>
    

        
    
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

    <div class="navbar navbar-inverse navbar-fixed-top" id="menu">
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

                      <li><a href="admin/registar.php">Criar User</a></li>

                      <li><a href="admin/listarusers.php">Gerir Users Existentes </a> </li>
                      <li> <a href="admin/upload_ficheiro.php">Upload Ficheiro</a> </li>
                      <li class="divider"></li>

                      <li class="nav-header">Ofertas</li>

                      <li><a href="admin/criaroferta.php">Criar Oferta</a></li>

                      <li><a href="admin/editaroferta.php">Gerir Ofertas Existentes</a></li>

                      <li class="divider"></li>
                       <li class="nav-header">Tarifário</li>
                  <li><a href="admin/gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="admin/gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                      <li class="nav-header">Servidor</li>

                      <li><a href="admin/log_operacao.php">Ver Log de Operações</a></li>
                  
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
                    echo ("<a href='logout.php'>  [Logout]</a>")
                    ?></font></ul></li></div><?php
                }
                else
                {
                
            ?>  
                <form method="post" action="login.php?lastpage=index.php" id="login" name="login" class="navbar-form pull-right">
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
      <?php
        $datas = array();
        $sql1="SELECT DISTINCT DATA FROM EMPRESAS_DISTRIBUIDORAS WHERE ESTRUTURA_TARIFARIO='" . $et . "' ORDER BY DATA DESC";
        $result1 = mysqli_query($mysqli,$sql1);
        $row = mysqli_fetch_array($result1);
        $datas[0]=$row['DATA']; 

      
        $i=1;
        while($row_data_si = mysqli_fetch_array($result1))
        {
            //echo($row_data_si['DATA']);
            $datas[$i]=$row_data_si['DATA'];
            $i=$i+1;
        }
        $max=$i;
        $i=0;


      $sql1="SELECT NOME_TARIFARIO,GAS_IDGAS,NOME_EMPRESA FROM EMPRESAS_DISTRIBUIDORAS WHERE ESTRUTURA_TARIFARIO='" . $et . "' AND DATA = '".$datas[$iddate]."'";
      //echo "sql == ".$sql1."<br>";
      $result1 = mysqli_query($mysqli,$sql1);
     
      $row = mysqli_fetch_array($result1);
      //echo "IDgas == ".$row['GAS_IDGAS']." Nome empresa == ".$row['NOME_EMPRESA'] ."<br>";
     
      $sql2="SELECT * FROM ESCALAO WHERE EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS=" . $row['GAS_IDGAS'] . " AND replace(EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA,' ','')=replace('" . $row['NOME_EMPRESA'] . "',' ','') ORDER BY ESCALAO_INICIO ASC";
     // echo "sql == ".$sql2."<br>";
      
      $result2 = mysqli_query($mysqli,$sql2);

      ?>
      <!-- Example row of columns -->
       <h3 align="center">Tarifário de Gás </h3>
       <h4 align="center"><?php echo($row['NOME_TARIFARIO'] . "[" . $et . "]");?></h4>
       <br>
       <p align="right"><a href="#" onclick="escondernotas()">[Mostrar/Esconder Notas]</a></p>
      <div id="notas">
         </div>

      <hr style="border-color:#f00; background-color: #f00;"> 
       <div align="right" id="interacao"> 
            <form id="data" method="post" action="detalhargas.php?ET=<?php echo $et ?>"  name="data">
                Em vigor a partir de:
               <select name="data">
                   <?php
                    for ($j = 0; $j < $max; $j++) {
                        if($j == $iddate)
                          echo("<option value=" . $j . " selected>" . $datas[$j] . "</option>");
                        else
                          echo("<option value=" . $j . ">" . $datas[$j] . "</option>");
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary btn-min btn-danger">OK</button>
            </form>
         
        </div>
       <br>
       <div align="right">
            <a id="testeimagem" href="detalhargasimp.php?ET=<?php echo $et; ?>&data=<?php echo $datas[$iddate]; ?>"><img border="0" src="icones/print.png" alt="Print " width="32" height="32"></a>
       </div>
       
       <hr style="border-color:#f00; background-color: #f00;">
       <h4 align="center"> Empresa Distruibuidora: <?php echo($row['NOME_EMPRESA']); ?> </h4>
       <hr style="border-color:#f00; background-color: #f00;">
       <br>
       <div class="teste" >
       
        <table align="center" cellpadding="0" cellspacing="0" border="1" class="display" id="example">
        <thead>
        <tr>
          <th>Escalao Inicio</th>
          <th>Escalao Fim</th>
          <th>TTF TVCF</th>
          <th>Desconto TTF</th>
          <th>TTF edpC</th>
          <th>Energia TVCF</th>
          <th>Desconto Energia</th>
          <th>Energia edpC</th>      
        </tr>
      </thead>
    <tbody>
      <?php
        while($row2 = mysqli_fetch_array($result2))
        {
            echo("<tr>");
            echo("<td>" . $row2['ESCALAO_INICIO']  .  "</td>");
            echo("<td>" . $row2['ESCALAO_FIM']  .  "</td>");
            echo("<td>" . $row2['TERMO_TARIFARIO_FIXO_TVCF']  .  "</td>");
            echo("<td>" . $row2['DESCONTO_TTF'] . "</td>");
            echo("<td>" . $row2['TERMO_TARIFARIO_FIXO_edpC']  .  "</td>");
            echo("<td>" . $row2['ENERGIA_TVCF']  .  "</td>");
            echo("<td>" . $row2['DESCONTO_ENERGIA']  .  "</td>");
            echo("<td>" . $row2['ENERGIA_edpC'] . "</td>");
     
            echo("</tr>");
        }

      ?>
  </tbody>

</table>

</div>
      
      
      <hr>

      <?php
        include('cabecalho.php');
    ?>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
     <script type="text/javascript" charset="utf-8">
      var controlonotas=1;
        function escondernotas()
        {

            if(controlonotas==0)
            {
             // $("#notas").hide("slow");
               $("#notas").empty();
              controlonotas=1;


            }else{

             // $("#notas").show(1000);
              var parte01 = "<hr style='border-color:#f00; background-color: #f00;'><h5 align='center'> Notas:</h5><h6 align='center'> 1. TVCF: Tarifa venda consumidor final </h6><h6 align='center'> 2. edpC: Preço final com desconto incluído </h6>";
              var parte02 = "<h6 align='center'> 3. Desconto: pode ser representado em percentagem (%) ou em euros (€)</h6>";
              var parte03 = "<h6 align='center'> 4. Desconto: Quando o preço Energia edpC for superior ao preço Energia TVCF, o campo Desconto correspondente será representado por '>' (energia do escalão 4 é superior ao MR)</h6>";
  
              $("#notas").append(parte01+parte02+parte03);

              controlonotas=0;


            }


        }
           $(document).ready( function () {
    
          $('#example').dataTable( {
                        
                        "bPaginate": false,
                        "sDom": '<"clear">lrtip',
                        "bDeferRender": true,
                       
                "oLanguage": {
                        "sEmptyTable": "Sem Dados para mostrar",
                        "sInfoEmpty": "Sem Dados",
                         "sInfo": ""
                    }
               
          });
                
      } );
            
    var controlo=1;
    
    
          function esconder_componentes(id1){
          $("#"+id1).hide();
          
        }
        
        function prepararprint(){
            esconder_componentes("interacao");
            esconder_componentes("menu");
           
            window.print();
            
        
        
        
        
        }
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
          $('#testeimagem').click(function() {
              
              $('#testeimagem').hide();

              $('#teste2').html("");    
            
        });
                
    
        
    window.onload = function(){
         $("#login").hide();
         //("#notas").hide();
     }
     
  </script>
        
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