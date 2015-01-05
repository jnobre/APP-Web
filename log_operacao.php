<?php
    session_start();
  
    include('mysql.php');
    include('mysqlconnect.php');
    include('login_status.php');

    $_BS['PorPagina'] = 20; 


    function getlog($inicio,$porpagina)
    {   
        // Buscar lista 
        $sql="SELECT * FROM LOG WHERE admin != 1 ORDER BY data DESC LIMIT ".$inicio.", ".$porpagina;
        $result=mysql_query($sql) or die(mysql_error());
      
        return $result;
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/img/EDP_logo.jpg">

    <script language="JavaScript" type="text/javascript" src="assets//js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="assets//js/sprinkle.js"></script>
    
    <link href="assets/css/tabela.css" rel="stylesheet">
    <script type="text/javascript">
    
    var conta = 2;

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
              <li><a href="index.php">Inicio</a></li>
              <li><a href="listar.php">Listar</a></li>
              <li><a href="pesquisar.php">Pesquisar</a></li>
              <li class="dropdown active">
              <?php 
                if(login_status()==1)
                {
                    ?>
                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li><a href="admin/profile.php">Minha Conta</a></li>
                  <li><a href="admin/registar.php">Criar User</a></li>
                  <li><a href="admin/listarusers.php">Gerir Users Existentes </a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="admin/criaroferta.php">Criar Oferta</a></li>
                  <li><a href="admin/gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li><a href="admin/upload_ficheiro.php">Upload Ficheiro</a></li>
                  <li class="divider"></li>
                <li class="nav-header">Tarifário</li>
                  <li><a href="admin/gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="admin/gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                  <li class="nav-header active">Servidor</li>
                  <li class="active"><a href="admin/log_operacao.php">Log de Operações</a></li>
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
                    echo("Bem Vindo <a href=profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");
                    echo ("  <a href='../logout.php'>[Logout]</a>")
                    ?></font></ul></li></div><?php
                }
                ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <!----------------------------------BODY------------------------------------>
    <div class="container">

        <div style='text-align:center;'>
            <h4> Log de Operações </h4>
            <br>
                <table id="newspaper-a" align="center" border="1" summary="Lista de Operaçoes">
    <thead>
        <tr>
        
            <th scope="col">Data Operação</th>
              <th scope="col">Hora</th>
            <th scope="col">Descrição da Operação</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
              if (isset($_GET['pagina'])) {

                $pagina = (int) $_GET['pagina'];

              } else {

                $pagina = 1;

              }
              $sql = "SELECT COUNT(*) AS total FROM `log` WHERE (`admin` != -1 )";
              $query = mysql_query($sql);
              $total = mysql_result($query, 0, 'total');
              $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
              
              $pagina = max(min($paginas, $pagina), 1);

              $inicio = ($pagina - 1) * $_BS['PorPagina'];

              $result=getlog($inicio,$_BS['PorPagina']);
              $rows=mysql_num_rows($result);
              
              while($row = mysql_fetch_array($result))
              {
                 
                    $d = new DateTime($row['data']);  
                    echo("<tr>");
                    echo ("<td>" . $d->format("d-m-Y") . "</td>");
                    echo ("<td>" . $d->format("H:i") . "</td>");
                    if($row['admin']!=2)
                    {
                      echo ("<td>" . $row['descricao'] . "</td>");
                    }
                    else
                    {
                      echo ("<td>Upload de ficheiro Excel. <a href='verrelatorio.php?id=" . $row['idlog'] . "'>[Ver Relatório]</a>  </td>");  
                    }
                    
                    echo("</tr>");
            }
           

        ?>
    </tbody>
</table>

      <?php
         if ($rows > 0) {
                  $adjacents = 3;
                  
                  $query = "SELECT COUNT(*) as num FROM log";
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

               /* echo "Total == ".$total."<br>";
                echo "limite == ".$limite."<br>";
                echo "Ultima pagina == ".$ultima_pag."<br>";
                echo "proxima == ".$prox."<br>";
                echo "anterior == ".$ant."<br>";
                echo "Penultima == ".$penultima."<br>";
                echo '<div class="paginacao">';*/
                
                  $paginacao .= "<div>";
                  //previous button
                  if ($page > 1) 
                    $paginacao .='<a href="?pagina='.$prev.'">&laquo;Anterior</a>&nbsp;&nbsp;';
                    //$paginacao.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
                  
                  //pages 
                  if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
                  { 
                    for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                      if ($counter == $page)
                        $paginacao .= '<u>'.$counter.'</u>&nbsp;&nbsp;';
                       else
                        $paginacao .='<a href="?pagina='.$counter.'">'.$counter.'</a>&nbsp;&nbsp;';     
                    }
                  }
                  elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
                  {
                    //close to beginning; only hide later pages
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
                    //in middle; hide some front and some back
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
                    //close to end; only hide early pages
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
                  
                  //next button
                  if ($page < $counter - 1) 
                    $paginacao.= "<a href=\"?pagina=$next\">Seguinte&raquo;</a>";
                  $paginacao.= "</div>\n";   
           } 

           echo $paginacao;
      ?>

    
    </div>
      
      
      
    <hr>

    <footer>
        <p><strong>&copy; EDP Soluções Comerciais S.A</strong> <img class="pull-right" src="../assets/img/logo.gif"></p>
    </footer>
   
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