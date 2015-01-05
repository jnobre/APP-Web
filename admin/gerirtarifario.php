<?php
    session_start();
    include('../mysqlconnect.php');
    include('../login_status.php');
    
    function gete($inicio,$fim)
    { // Buscar lista de utilizadores
        $sql="SELECT * FROM Electricidade ORDER BY NOME ASC,DATA DESC LIMIT ".$inicio.", ".$fim;
	      $result=mysql_query($sql) or die(mysql_error());
        return $result;
    }

    $_BS['PorPagina'] = 20; 

    if (isset($_GET['pagina'])) {
        $pagina = (int) $_GET['pagina'];
    } else {
        $pagina = 1;
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
       <script type="text/javascript" charset="utf-8">
        function conf_apagar(id,data)
        {
              var r=confirm("De certeza que deseja apagar o tarifário?");
              if (r==true)
              {
                  window.location = "apagartarifarioe.php?ID='" + id + "'&DATA='" + data+"'";
              }
           
     
        }


         var controlonotas=0;

    function escondernotas()
      {
      
        if(controlonotas==0)
          {
            $("#notas").hide("slow");
            controlonotas=1;


          }else
          {
            $("#notas").show(1000);
            controlonotas=0;


          }
        }
        </script>
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
                  <li ><a href="registar.php">Criar User</a></li>
                  <li ><a href="#">Gerir Users Existentes</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                  <li class="active"><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
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
                    echo("Bem Vindo " . $_SESSION['nome'] );
                    echo("<a href='../logout.php'>  [Logout]</a>")
                    ?></font></ul></li></div> 
                </div><!--/.nav-collapse -->
          </div>
      </div>
    </div>

   <div class="container">
  <br>
      <h3 align="center"> Tarifários de Eletricidade </h3>
<br>

     <p align="right"><a href="#" onclick="escondernotas()">[Esconder Notas]</a></p>
    <div id="notas">
      <hr style="border-color:#f00; background-color: #f00;"> 
      <h5 align="center"> Notas:</h5>
      <h6> Nesta página estão listados todos os tarifários existentes na Base de Dados.</h6>
      <h6>Se pretender apagar um tarifário , tenha em atenção se está ligada a alguma oferta. Caso apagar um tarifário que esteja ligado a uma oferta, não será possível detalhar o tarifário em questão</h6>
      <hr style="border-color:#f00; background-color: #f00;"> 
<br>
    </div>
     
      <!-- Example row of columns -->
          <div class="container marketing">  
    	    <?php

              $sql = "SELECT COUNT(*) AS total FROM Electricidade ORDER BY NOME ASC,DATA DESC";
              $query = mysql_query($sql);
              $total = mysql_result($query, 0, 'total');
              //echo "TOtal == ".$total."<br>";
              $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
              $pagina = max(min($paginas, $pagina), 1);
              $inicio = ($pagina - 1) * $_BS['PorPagina'];

	            $result=gete($inicio,$_BS['PorPagina']);
            ?>
	<fieldset align="center">
  <BR>

	<table id="newspaper-a" align="center" summary="Lista deEle">
    <thead>
        <tr>
        	<th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">ET</th>
            <th scope="col">Data</th>
            <th scope="col">Detalhar </th>
            <th scope="col">Actualizar</th>
            <th scope="col">Apagar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        $rows=mysql_num_rows($result);
      
        while($row = mysql_fetch_array($result))
        {   
            $linkdetalhar="../detalharelec.php?ET=" . $row['ID_TARIFARIO'] ;
            $et=$row['ID_TARIFARIO'];
            echo ("<td>" . $i . "</td>");
            echo ("<td>" . $row['NOME'] . "</td>");
            echo ("<td>" . $et . "</td>");
            echo("<td>" . $row['DATA'] . "</td>");
            echo ("<td align = center><a href=" . $linkdetalhar . ">[Detalhar]</a></td>");
            echo ("<td align = center><a href=criartarifario.php?ET=" . $row['ID_TARIFARIO'] ."&hash=" . base64_encode($row['NOME']) . ">[Actualizar]</a>" ."</td>");
            echo ("<td align = center>" . "<a id='apagar' href='#' onclick=\"conf_apagar('".$row['ID_TARIFARIO']."','" . $row['DATA'] . "');\">[Apagar]</a>" ."</td>");
            echo ("</tr>");
            $i++;
        }
        ?>
    </tbody>
</table>

<br>
 				

    </fieldset>
         <?php
      
         if ($rows > 0) {

                  $adjacents = 3;
                  
                  $query = "SELECT COUNT(*) as num FROM Electricidade ORDER BY NOME ASC,DATA DESC";
                  $total_pages = mysql_fetch_array(mysql_query($query));
                  $total_pages = $total_pages[num];
           
                  /* Setup vars for query. */
                  $limit = 20;                 //how many items to show per page
                  $page = $_GET['pagina'];
                  if($page) 
                    $start = ($page - 1) * $limit;      //first item to display on this page
                  else
                    $start = 0;     
                  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
                    $prev = $page - 1;              //previous page is page - 1
                  $next = $page + 1;              //next page is page + 1
                  $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.
                  $lpm1 = $lastpage - 1;  

             /*  echo "Total == ".$total."<br>";
                echo "limite == ".$limite."<br>";
                echo "Ultima pagina == ".$ultima_pag."<br>";
                echo "proxima == ".$prox."<br>";
                echo "anterior == ".$ant."<br>";
                echo "Penultima == ".$penultima."<br>";
                echo '<div class="paginacao">';*/
                
                  $paginacao .= "<div align=center>";
                  //previous button
                  if ($page > 1) 
                    $paginacao .='<a href="?pagina='.$prev.'">&laquo;Anterior</a>&nbsp;&nbsp;';
                    //$paginacao.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
                                 
                  if ($lastpage < 7 + ($adjacents * 2)) 
                  { 
                    for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                      if ($counter == $page)
                        $paginacao .= '<u>'.$counter.'</u>&nbsp;&nbsp;';
                       else
                        $paginacao .='<a href="?pagina='.$counter.'">'.$counter.'</a>&nbsp;&nbsp;';     
                    }
                  }
                  elseif($lastpage > 5 + ($adjacents * 2))  
                  {
                    if($page < 1 + ($adjacents * 2))    
                    {
                      for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                      {
                        if ($counter == $page)
                          $paginacao .= '<u>'.$counter.'</u>&nbsp;&nbsp;';
                        else
                          $paginacao .='<a href="?pagina='.$counter.'">'.$counter.'</a>&nbsp;&nbsp;';         
                      }
                      $paginacao.= "...";
                      $paginacao .='<a href="?pagina='.$lpm1.'">'.$lpm1.'</a>&nbsp;&nbsp;';
                      $paginacao .='<a href="?pagina='.$lastpage.'">'.$lastpage.'</a>&nbsp;&nbsp;';
                    }
                    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                      $paginacao.= "<a href='?pagina=1'>1</a>";
                      $paginacao.= "<a href='?pagina=2'>2</a>";
                      $paginacao.= "...";
                      for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                      {
                        if ($counter == $page)
                          $paginacao .= '<u>'.$counter.'</u>&nbsp;&nbsp;';
                        else
                          $paginacao .='<a href="?pagina='.$counter.'">'.$counter.'</a>&nbsp;&nbsp;';         
                      }
                      $paginacao.= "...";
                      $paginacao .='<a href="?pagina='.$lpm1.'">'.$lpm1.'</a>&nbsp;&nbsp;';
                      $paginacao .='<a href="?pagina='.$lastpage.'">'.$lastpage.'</a>&nbsp;&nbsp;';   
                    }
                    else
                    {
                      $paginacao.= "<a href=\"?pagina=1\">1</a>";
                      $paginacao.= "<a href=\"?pagina=2\">2</a>";
                      $paginacao.= "...";
                      for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                      {
                        if ($counter == $page)
                          $paginacao .= '<u>'.$counter.'</u>&nbsp;&nbsp;';
                        else
                           $paginacao .='<a href="?pagina='.$counter.'">'.$counter.'</a>&nbsp;&nbsp;';         
                      }
                    }
                  }
                  
                  if ($page < $counter - 1) 
                    $paginacao.= "<a href=\"?pagina=$next\">Seguinte&raquo;</a>";
                  $paginacao.= "</div>\n";   
           } 

           echo $paginacao;
      ?>  
		<hr>
	
      <?php
        include('../cabecalho.php');
        ?>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
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