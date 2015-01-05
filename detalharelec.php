<?php
     session_start();
    include('mysql.php');
    include('mysqlconnect.php');
    include('login_status.php');
    $et=$_GET['ET'];
    $iddate=$_POST['data'];
    if($iddate==NULL)
    {
        $iddate=0;
    }
    
    if($et=='')
    {
        echo("Nothing to show here");
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

                      <li class="divider"></li>

                      <li class="nav-header">Ofertas</li>

                      <li><a href="admin/criaroferta.php">Criar Oferta</a></li>

                      <li><a href="admin/editaroferta.php">Gerir Ofertas Existentes</a></li>

                       <li><a href="admin/upload_ficheiro.php">Upload Ficheiro</a></li>
                       
                      <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                  <li><a href="admin/gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="admin/gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                      <li class="nav-header">Servidor</li>

                      <li><a href="admin/log_operacao">Ver Log de Operações</a></li>         
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
          $sql1="SELECT DISTINCT DATA FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et . "' ORDER BY DATA DESC";
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

           $sql2="SELECT * FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et . "' AND DATA='" . $datas[$iddate] . "'";
          $result2 = mysqli_query($mysqli,$sql2);
          $row2 = mysqli_fetch_array($result2);

          $idtarifasimples=$row2['ID_TARIFA_SIMPLES'];
          $idtarifabi=$row2['ID_TARIFA_BI'];
          $idtarifatri=$row2['ID_TARIFA_TRI'];
          


      ?>
      <!-- Example row of columns -->
       <h3 align="center">Tarifário de Eletricidade </h3><br>
       <h4 align="center"><?php echo($row2['NOME'] . " [" . $et . "]");?> </h4>
       <br>
       
    <div id="emvigor">
       
      </div> 
       <p align="right"><a href="#" onclick="escondernotas()">[Esconder/Mostrar Notas]</a></p>
        <div id="notas">
        </div>
      <hr style="border-color:#f00; background-color: #f00;"> 
       <div align="right" id="interacao">
        
            <form id="data" method="post" action="detalharelec.php?ET=<?php echo $et ?>"  name="data">
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
         
            <div >
               
               <a id="testeimagem" href="detalharelecimp.php?ET=<?php echo $et ?>&iddate=<?php echo( $iddate)?>" ><img border="0" src="icones/print.png" alt="Print " width="32" height="32"></a>
            
          </div>
             </div>

       
       <div class="teste" width="70%">
       <?php
                
                $sql3="SELECT * FROM TARIFA_SIMPLES WHERE IDTARIFA_SIMPLES=" . $idtarifasimples . " AND POTENCIA!=99";
                $result_si = mysqli_query($mysqli,$sql3);
            ?>
     <hr style="border-color:#f00; background-color: #f00;">  <h4 align="center">Tarifa Simples </h4>  <hr style="border-color:#f00; background-color: #f00;">
        <table align="center" cellpadding="0" cellspacing="0" border="1" class="display dataTable" id="tabelasimples">
        <thead>
        <tr>
          <th>Potência Contratada(em kVa)</th>
          <th>Preço Potência TVCF (€/dia)</th>
          <th>Preço Energia TVCF (€/kWh)</th>
          <th>Desconto</th>
          <th>Preço Potência edpC (€/dia)</th>
          <th>Preço Energia edpC (€/kWh)</th>
              
                
        </tr>
      </thead>
    <tbody>
      <?php
       while($rowsi = mysqli_fetch_array($result_si))
        {
            
            echo("<tr>");
            echo("<td>" . $rowsi['POTENCIA'] .  "</td>");
            echo("<td>" . $rowsi['PRECO_POTENCIA_TVCF'].  "</td>");
            echo("<td>" . $rowsi['PRECO_ENERGIA_TVCF']  .  "</td>");
            echo("<td>" . $rowsi['DESCONTO']  .  " </td>");
            echo("<td>" . $rowsi['PRECO_POTENCIA_edpC'].  "</td>");
            echo("<td>" . $rowsi['PRECO_ENERGIA_edpC']  .  "</td>");
            echo("</tr>");
            
         }
      ?>
  </tbody>
    
</table>
<?php
 $sql3="SELECT * FROM TARIFA_SIMPLES WHERE IDTARIFA_SIMPLES=" . $idtarifasimples . " AND POTENCIA=99";
 // echo("<br>SQL3=" . $sql3);
$result_si = mysqli_query($mysqli,$sql3);
if($result_si->num_rows!=0)
if($rowsi = mysqli_fetch_array($result_si))
{
    echo("<p><font color='red'>Observações adicionais:</font>" . $rowsi['OBS']);
    
}
?>
<hr>
<?php
    if($idtarifabi!=NULL)
    {
        $sqlbi="SELECT * FROM TARIFA_BI WHERE IDTARIFA_BI=" . $idtarifabi . " AND POTENCIA!=99";
      //  echo("<br>SQLBI=" . $sqlbi);
        $result_bi = mysqli_query($mysqli,$sqlbi);
        ?>
        <br>
<h4 align="center">   <hr style="border-color:#f00; background-color: #f00;"> Tarifa Bi Horária </h4>  <hr style="border-color:#f00; background-color: #f00;">
 <table align="center" cellpadding="0" cellspacing="0" border="1" class="display dataTable" id="tabelabi">
        <thead>
          <tr>
          <th>Potência Contratada(em kVa)</th>
          <th>Potência TVCF (€/dia) </th>
          <th>Energia Normal TVCF (€/kWh)</th>
          <th>Energia Económico TVCF (€/kWh)</th>
          <th>Desconto</th>
          <th>Potência edpC</th>
          <th>Energia Normal edpC</th>
          <th>Energia Económico edpC</th>    
        </tr>
      </thead>
    <tbody>
      <?php
       while($rowbi = mysqli_fetch_array($result_bi))
        {
            echo("<tr>");
            echo("<td>" . $rowbi['POTENCIA'] .  "</td>");
            echo("<td>" . $rowbi['PRECO_POTENCIA_TVCF']  .  "</td>");
            echo("<td>" . $rowbi['ENERGIA_NORMAL_TVCF'] . "</td>");    
            echo("<td>" . $rowbi['ENERGIA_ECONOMICO_TVCF'] . "</td>");   
            echo("<td>" . $rowbi['DESCONTO'] . "</td>");   
            echo("<td>" . $rowbi['PRECO_POTENCIA_edpC'] . "</td>");   
            echo("<td>" . $rowbi['ENERGIA_NORMAL_edpC'] . "</td>");   
            echo("<td>" . $rowbi['ENERGIA_ECONOMICO_edpC'] . "</td>");   
            echo("</tr>");

         }
      ?>
  </tbody>

</table>
<?php
  $sqlobsbi="SELECT * FROM TARIFA_BI WHERE IDTARIFA_BI=" . $idtarifabi . " AND POTENCIA=99";
    // echo("<br>SQL3=" . $sql3);
    $result_obsbi = mysqli_query($mysqli,$sqlobsbi);
    if($result_obsbi->num_rows!=0)
    if($rowsi = mysqli_fetch_array($result_obsbi))
    {
        echo("<p><font color='red'>Observações adicionais:</font>" . $rowsi['OBS']);

    }
}
?>
<br>
<?php
    if($idtarifatri!=NULL)
    {
        $sqltri="SELECT * FROM TARIFA_TRI WHERE IDTARIFA_TRI=" . $idtarifatri . " AND POTENCIA!=99";
       
        $result_tri = mysqli_query($mysqli,$sqltri);
        ?>
        <hr>
        <br>
        <h4 align="center">   <hr style="border-color:#f00; background-color: #f00;">Tarifa Tri Horária </h4>  <hr style="border-color:#f00; background-color: #f00;">
         <table align="center" cellpadding="0" cellspacing="0" border="1" class="display dataTable" id="tabelatri">
        <thead>
          <tr>
          <th>Potência Contratada(em kVa)</th>
          <th> Preço da Potência TVCF(€/dia) </th>
          <th>Energia Normal TVCF(€/kWh)</th>
          <th>Económico TVCF(€/kWh)</th>
          <th>Super Económico TVCF(€/kWh)</th>
          <th>Desconto </th>
          <th>Preço da Potência edpC(€/kWh)</th>
          <th>Energia Normal edpC(€/kWh)</th>
          <th>Econónico edpC(€/kWh)</th>
          <th>Super Económico edpC(€/kWh)</th>
  
                
        </tr>
      </thead>
    <tbody>
      <?php
       while($rowtri = mysqli_fetch_array($result_tri))
        {
         
    
          
            echo("<tr>");
            echo("<td>" . $rowtri['POTENCIA'] .  "</td>");
            echo("<td>" . $rowtri['PRECO_POTENCIA_TVCF']  .  "</td>");
            echo("<td>" . $rowtri['ENERGIA_NORMAL_TVCF'] . "</td>");    
            echo("<td>" . $rowtri['ENERGIA_ECONOMICO_TVCF'] . "</td>");   
             echo("<td>" . $rowtri['ENERGIA_SUPER_ECONOMICO_TVCF'] . "</td>");  
            echo("<td>" . $rowtri['DESCONTO'] .  "</td>");
            echo("<td>" . $rowtri['PRECO_POTENCIA_edpC']  .  "</td>");
            echo("<td>" . $rowtri['ENERGIA_NORMAL_edpC'] . "</td>");    
            echo("<td>" . $rowtri['ENERGIA_ECONOMICO_edpC'] . "</td>");   
             echo("<td>" . $rowtri['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td>");  
            echo("</tr>");
            
         }
      ?>
  </tbody>

</table>
<?php
    $sqltri="SELECT * FROM TARIFA_TRI WHERE IDTARIFA_TRI=" . $idtarifatri . " AND  POTENCIA=99";   
    $result_tri = mysqli_query($mysqli,$sqltri);
    if($result_tri->num_rows!=0)
    {
      
      if($rowstri = mysqli_fetch_array($result_tri))
    {
       
        echo("<p><font color='red'>Observações adicionais:</font>" . $rowstri['OBS']);
    
    }

    }
    

?>
<?php
}
?>
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


            }else
            {
              //$("#notas").show(1000);
                // $("#notas").show(1000);

     
              var parte01 = " <hr style='border-color:#f00; background-color: #f00;'><h5 align='center'> Notas:</h5>";
              var parte02 = "<h6 align='center'> 1. TVCF: Tarifa venda consumidor final </h6><h6 align='center'> 2. edpC: EDP consumidor, preço final com desconto incluído </h6>";
              var parte03 = "<h6 align='center'> 3. Desconto: pode ser representado em percentagem (%) ou em euros (€)</h6>";
  
              $("#notas").append(parte01+parte02+parte03);

              controlonotas=0;


            }


        }

      $(document).ready( function () {
               TableTools.DEFAULTS.aButtons = [ "copy", "xls","pdf" ];
               $('#tabelasimples').dataTable( {
                        
                        "bPaginate": false,
                        "sDom": '<"clear">lfrtip',
                        "bDeferRender": true,
                       
                    "oLanguage": {
                        "sEmptyTable": "Sem Dados para mostrar",
                        "sInfoEmpty": "Sem Dados",
                          "sInfo": "",
                         "sSearch": "Pesquisa: _INPUT_ "
                    }
                     
        });
                $('#tabelabi').dataTable( {
                        
                        "bPaginate": false,
                        "sDom": '<"clear">lfrtip',
                        "bDeferRender": true,
              
                    "oLanguage": {
                        "sEmptyTable": "Sem Dados para mostrar",
                        "sInfoEmpty": "Sem Dados",
                          "sInfo": "",
                         "sSearch": "Pesquisa: _INPUT_ "
                    }
                  
        });
                
                $('#tabelatri').dataTable( {
                        
                        "bPaginate": false,
                        "sDom": '<"clear">lfrtip',
                        "bDeferRender": true,
                       
                    "oLanguage": {
                        "sEmptyTable": "Sem Dados para mostrar",
                        "sInfoEmpty": "Sem Dados",
                         "sInfo": "",
                         "sSearch": "Pesquisa: _INPUT_ "
                    }
               
        });

        $('#testeimagem').click(function() {
              
              $('#testeimagem').hide();

              $('#teste2').html("");    
            
        });
                
      } );
            
            
           
     
      function esconder_componentes(id1){
          $("#"+id1).hide();
          
        }
        
        function prepararprint(){

            document.getElementById("emvigor").innerHTML = "<h5 align='center'> Em vigor a partir de: <?php echo($datas[$iddate]);?></h5>";
            esconder_componentes("interacao");
            esconder_componentes("menu");
            window.print();
  
        
        }
        function showprogress()
        {

          document.getElementById('testeimagem').append("<img src='icones/espere.gif'/>");

        }
    
    var controlo=0;
    function errorbox(){
       window.alert("Erro no Login!");
        return true;
    }
    
    function esconder(){
         //alert("Esconder");
        //echo "Controlo == ".$control;
        if(controlo == 1)
        { 
            $("#login").hide("slow");
            controlo=0;
            //$("#login_li").hide("slow");
        } else {
           $("#login").show(1000);
           // $("#login_li").show(1000);
           controlo=1;
        }
        
    }
        
     window.onload = function(){
         $("#login").hide();
          //  $("#notas").hide();
              
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