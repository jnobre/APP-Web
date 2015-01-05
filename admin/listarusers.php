<?php
    session_start();
    include('../mysqlconnect.php');
    include('../login_status.php');
    $_BS['PorPagina'] = 20; 

    function getusers($inicio,$porpagina)
    { // Buscar lista de utilizadores
        $sql="SELECT iduser,username,email,conf,hash FROM UTILIZADORES WHERE admin = 0 ORDER BY iduser ASC LIMIT ".$inicio.", ".$porpagina;
	      $result=mysql_query($sql) or die(mysql_error());
	    
        return $result;
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
                  <li class="active"><a href="#">Gerir Users Existentes</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li><a href="upload_ficheiro.php">Upload Ficheiro</a></li>
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

      <h3 align="center">Administradores:</h3>
      <hr>
      <!-- Example row of columns -->
          <div class="container marketing">  
    	    <?php
              if (isset($_GET['pagina'])) {

                $pagina = (int) $_GET['pagina'];

              } else {

                $pagina = 1;

              }
              
              $sql = "SELECT COUNT(*) AS total FROM `utilizadores` WHERE (`admin` != 1 )";
              $query = mysql_query($sql);
              $total = mysql_result($query, 0, 'total');
              $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
              
              $pagina = max(min($paginas, $pagina), 1);

              $inicio = ($pagina - 1) * $_BS['PorPagina'];

	            $result=getusers($inicio,$_BS['PorPagina']);
            ?>
	<fieldset align="center">
	<table id="newspaper-a" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr>
        	<th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Confirmado</th>
            <th scope="col">Editar</th>
            <th scope"col">Apagar </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $rows=mysql_num_rows($result);
        while($row = mysql_fetch_array($result))
        {
            $id=$row['iduser'];
            if($_GET['edit']==1)
            {
                // onclick="window.location='editaruser.php?iduser=<?php echo($id);'"
                ?>
                <tr>
                <?php
            }
            else if($_GET['eliminar']==1)
            {
                 //onclick="window.location='eliminaruser.php?iduser=<?php echo($id);'"
                ?>
                <tr>
                <?php
            }
            
            if($row['conf'] > 0)
                $confir = 'Sim';
            else
                $confir = 'N&atilde;o';
                
            echo ("<td>" . $id . "</td>");
            echo ("<td>" . $row['username'] . "</td>");
            echo ("<td>" . $row['email'] . "</td>");
            echo ("<td align = center>" . $confir . "</td>");
            echo ("<td align = center>" . "<a href='editarperfil.php?hash=" .$row['hash']. "'> <img  src=../assets/img/b_edit.png></a>" . "</td>");
            echo ("<td align = center>" . "<a href='apagarperfil.php?hash=" .$row['hash']. "'> <img  src=../assets/img/b_drop.png></a>" ."</td>");
            echo ("</tr>");
        }
        ?>
    </tbody>
</table>

   <?php
         if ($rows > 0) {
                  $adjacents = 3;
                  
                  $query = "SELECT COUNT(*) as num FROM utilizadores";
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
    <!--<p align="center"> Listagem de Utilizadores </p>-->
          
                
				

    </fieldset>
		<hr>
	
      <?php
        include('../cabecalho.php');
        ?>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
             <div style="visibility:hidden" >
    <script type="text/javascript">
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
 <?php
    }
?>
</html>