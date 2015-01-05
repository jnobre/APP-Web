<?php
     session_start();
    include('mysql.php');
    include('login_status.php');
    $ofr1=$_GET['OFR1'];
    $ofr2=$_GET['OFR2'];
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
    <link href="assets/css/tabela.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    
         <style type="text/css" title="currentStyle">
            @import "assets/table/media/css/mystyle.css";
           
        
    	</style>
    
    <script type="text/javascript" language="javascript" src="assets/table/media/js/jquery.js"></script>  
    <script src="jquery.min.js"></script>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
         var controlo=1;
         var controlonotas=0;
      function errorbox(){
         window.alert("Erro no Login!");
          return true;
      }
      
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
    <!-- OFR1 SQL e OFR2 SEL -->
    <?php

            $result = mysqli_query($mysqli,"SELECT *  FROM OFERTAS WHERE IDOFERTA='" . $ofr1 . "' LIMIT 1"); 

            $row1 = mysqli_fetch_array($result);

            $result2 = mysqli_query($mysqli,"SELECT *  FROM OFERTAS WHERE IDOFERTA='" . $ofr2 . "' LIMIT 1"); 

            $row2 = mysqli_fetch_array($result2) ;           
            $nomeofr1= $row1['NOME'];
            $nomeofr2= $row2['NOME'];
            $componentebasica1=$row1['COMPONENTE_BASICA'];
            $componentebasica2=$row2['COMPONENTE_BASICA'];

    ?>

    <div class="container">
    <br>
    
    <h4 align="center"> <?php echo $nomeofr1 ?> VS <?php echo $nomeofr2 ?> </h4>
  
    <br>
    <p align="right"><a href="#" onclick="escondernotas()">[Esconder/Mostrar Notas]</a></p>
    <div id="notas">
      <hr style="border-color:#f00; background-color: #f00;"> 
      <h5 align="center"> Notas:</h5>
      <h6> 1.Em baixo segue-se uma tabela que irá comparar atributo a atributo entre as duas ofertas que você escolheu. Esse atributo é especificado na primeira coluna da tabela; </h6>
      <h6> 2.Na segunda coluna é dado os valores do atributo em relação à oferta 1; </h6>
      <h6> 3.Na terceira coluna é dado os valores do atributo em relação à oferta 2; </h6>
  
      <div align="center">
        <h5> Ligações Rápidas: </h5> 
        <a href="#caracteristicasoferta">[1. Carateristicas da Oferta] </a><a href="#atributos">[2.Atributos] </a> 
        <a href="#condicoespart">[3.Condições Particulares da Oferta ]</a> <a href="#eletricidade">[4. Eletricidade] </a>
        <a href="#resteletricidade">[4.1 Restrições de Eletricidade] </a><a href="#gas">[5. Gás] </a><a href="#restgas">[5.1 Restrições Gás] </a>
      </div>
    </div>
      <hr style="border-color:#f00; background-color: #f00;"> 
    <fieldset align="center">
    
    <a name="caracteristicasoferta"></a>
    <h5 align="center"> 1. Carateristicas da Oferta </h5>
    <hr>
        	<table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
        	<th scope="col">Atributo</th>
            <th scope="col"><?php echo($nomeofr1); ?> </th>
            <th scope="col"> VS </th>
            <th scope="col"> <?php echo($nomeofr2);?> </th>
            
        </tr>
    </thead>
    
    
    <tbody align="center">
       
       <?php
       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Estado</u></td>");
       echo("<td>" . $row1['ESTADO'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['ESTADO'] . "</td>");
       echo("</tr>");
       
       echo("<tr>");
        echo("<td style='background-color:#D1C0C0;'><u>Data de Início</u></td>");
       echo("<td>" . date("j-n-Y",strtotime($row1['DATA_INICIO'])) . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . date("j-n-Y",strtotime($row2['DATA_INICIO'])) . "</td>");
       echo("</tr>");
      
      echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Data Fim</u></td>");
          $d = new DateTime($row1['DATA_FIM']); 

       echo("<td>" .  ($d->format("d-m-Y")) . "</td>");
       echo("<td width='1'> VS </td>");
       $d = new DateTime($row2['DATA_FIM']);
       echo("<td>" .  ($d->format("d-m-Y")) . "</td>");
       echo("</tr>");
      
      echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Componente Básica</u></td>");
       echo("<td>" . $componentebasica1 . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $componentebasica2 . "</td>");
       echo("</tr>");
       
       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Duração</u></td>");
       
       echo("<td>" . $row1['DURACAO'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['DURACAO'] . "</td>");
       echo("</tr>");
       
       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Penalização</u></td>");
       echo("<td>" . $row1['PENALIZACAO'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['PENALIZACAO'] . "</td>");
       echo("</tr>");
       
       
      
      echo("<tr>");
      echo("<td style='background-color:#D1C0C0;'><u>Componente Estruturada Gás</u></td>");
       echo("<td>" . $row1['COMPONENTE_ESTRUTURADA_GN'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['COMPONENTE_ESTRUTURADA_GN'] . "</td>");
       echo("</tr>");
      
       echo("<td style='background-color:#D1C0C0;'><u>Observações</u></td>");
       echo("<td>" . $row1['OBSERVACOES'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['OBSERVACOES'] . "</td>");
       echo("</tr>");
       ?>
    </tbody>
</table>
        <A name="atributos"></a>
     <hr style="border-color:#f00; background-color: #f00;">
    <h5>2.Atributos</h5>
     <hr style="border-color:#f00; background-color: #f00;">
     <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
        	<th scope="col">Atributo</th>
            <th scope="col"><?php echo($nomeofr1); ?> </th>
            <th scope="col"> VS </th>
            <th scope="col"> <?php echo($nomeofr2);?> </th>
            
        </tr>
    </thead>
    
    
    <tbody align="center">
       
       <?php
      
      echo("<tr>");
      echo("<td style='background-color:#D1C0C0;'><u>Débito Direto</u></td>");
       echo("<td>" . $row1['DEBITO_DIRETO'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['DEBITO_DIRETO'] . "</td>");
       echo("</tr>");
       
       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Conta Certa</u></td>");
       echo("<td>" . $row1['CONTA_CERTA'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['CONTA_CERTA'] . "</td>");
       echo("</tr>");





       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Correspondência Eletrónica</u></td>");
       echo("<td>" . $row1['CORRESPONDENCIA_ELETRONICA'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['CORRESPONDENCIA_ELETRONICA'] . "</td>");
       echo("</tr>");
       
       echo("<tr>");
        echo("<td style='background-color:#D1C0C0;'><u>Entidade Parceira</u></td>");
        echo("<td>" . $row1['ENTIDADE_PARCEIRA'] . "</td>");
        echo("<td width='1'> VS </td>");
        echo("<td>" . $row2['ENTIDADE_PARCEIRA'] . "</td>");
       echo("</tr>");
       


       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Valor EP</u></td>");
       echo("<td>" . $row1['VALOR_EP'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['VALOR_EP'] . "</td>");
       echo("</tr>");
       


       echo("<tr>");
          echo("<td style='background-color:#D1C0C0;'><u>Valor Benéfico EP</u></td>");
       echo("<td>" . $row1['VALOR_EP'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['VALOR_EP'] . "</td>");
       echo("</tr>");
       

       echo("<tr>");
      echo("<td style='background-color:#D1C0C0;'><u>Unidade EP</u></td>");
       echo("<td>" . $row1['UNIDADE_EP'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['UNIDADE_EP'] . "</td>");
       echo("</tr>");
       

       echo("<tr>");
       echo("<td style='background-color:#D1C0C0;'><u>Aplicado EP</u></td>");
       echo("<td>" . $row1['UNIDADE_EP'] . "</td>");
       echo("<td width='1'> VS </td>");
       echo("<td>" . $row2['UNIDADE_EP'] . "</td>");
       echo("</tr>");
       
       ?>
    
    </tbody>
</table>




<!-- OFR1 SQL e OFR2 SQL CONDIÇÕES PARTICULARES -->
   <?php

            $resultcondicoes = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $ofr1 . "'"); 
            $resultcondicoes2 = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $ofr2 . "'"); 
         
           


    ?>
    <A name="condicoespart"></a>
<hr style="border-color:#f00; background-color: #f00;">
    <h5> 3.Condições Particulares das Ofertas</h5>
     <hr style="border-color:#f00; background-color: #f00;">
     <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
            <th scope="col">Condição OFR1 </th>
            <th scope="col">Valor Condição OFR1 </th>
            <th scope="col">Condição OFR2 </th>
            <th scope="col">Valor Condição OFR2 </th>
        </tr>
        
            
    </thead>
    
    
    <tbody align="center">
       
       <?php
       if(($resultcondicoes->num_rows==0) && ($resultcondicoes2->num_rows==0))
       {
           echo("<tr>");
            echo("<td colspan='4'>Nenhuma das ofertas escolhidas tem condições particulares.</td>");
           echo("</tr>");
       }
       else
        while( ($row_condicoes1 = mysqli_fetch_array($resultcondicoes)) )
        {
        echo("<tr>");
           echo("<td>" . $row_condicoes1['CONDICAO_OFERTA'] . "</td>");
           echo("<td>" . $row_condicoes1['VALOR_CONDICAO'] . "</td>");
           if($row_condicoes2 = mysqli_fetch_array($resultcondicoes2))
           {
                echo("<td>" . $row_condicoes2['CONDICAO_OFERTA'] . "</td>");
                echo("<td>" . $row_condicoes2['vALOR_CONDICAO'] . "</td>");    
           }
           else
           {
                 echo("<td> - </td>");
                 echo("<td> - </td>"); 
           }
           
       echo("</tr>");
        }     
       ?>
    
    </tbody>
</table>
    <br>
    <?php
            $resulte = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $ofr1 . "' AND RESTRICAOA=2"); 
            $resulte2 = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $ofr2 . "' AND RESTRICAOA=2");
            
?>

 <A name="eletricidade"></a>
<hr style="border-color:#f00; background-color: #f00;">
<h5> 4. Eletricidade </h5>
<hr style="border-color:#f00; background-color: #f00;">

<br>

  <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
            <th scope="col">Atributo</th>

            <th scope="col"><?php echo($nomeofr1); ?> </th>
            <th scope="col"> VS </th>
            <th scope="col"> <?php echo($nomeofr2);?> </th>
            
        </tr>
    </thead>
    
    
    <tbody align="center">
       
      <?php
      echo("<tr>");
          echo("<td style='background-color:#D1C0C0;'><u>Tem Eletricidade?</u></td>");
            if((stripos($componentebasica1,'E')  !== false ) || (stripos($componentebasica1,'e')  !== false ))
            {
                echo("<td>Sim</td>");
                $sim1=1;
            }
            else
            {
                echo("<td>Não</td>");
                $sim1=0;
            }
            echo("<td>VS</td>");
            if((stripos($componentebasica2,'E')  !== false ) || (stripos($componentebasica1,'e')  !== false))
            {
                echo("<td>Sim</td>");
                $sim2=1;
            }
            else
            {
                echo("<td>Não</td>");
                $sim2=0;
            }
            echo("</tr>");
            echo("<tr>");
            if(($sim1==1) && ($sim2==1))
            {
              if(($row1['ID_ESTRUTURA_TARIFARIA_E']!=NULL) && ($row2['ID_ESTRUTURA_TARIFARIA_E']!=NULL))
                echo("<td colspan='4'><a href=comparartarifarioe.php?ET1=" . $row1['ID_ESTRUTURA_TARIFARIA_E'] . "&ET2=" . $row2['ID_ESTRUTURA_TARIFARIA_E'] . ">
                [Comparar Tarifários]</a></td></tr>");
              else
                echo("<td colspan='4'>Um dos tarifários escolhidos tem uma Estrutura Tarifária Inválida , portanto esta funcionalidade foi desactivada.</td>");
            }
            else
            {
                echo("<td colspan='4'>Uma ou mais ofertas escolhidas para comparação não contêm componente básica de eletricidade. Funcionalidade:Comparação dos tarifários desactivada</td></tr>");
            }
    ?>
    </tbody>
</table>



 <A name="resteletricidade"></a>
<hr style="border-color:#f00; background-color: #f00;">
<h5>4.1 Restrições Eletricidade </h5>
<hr style="border-color:#f00; background-color: #f00;">
  <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
            <th scope="col">Restrição E OFR1 </th>
            <th scope="col">Valor Restrição E OFR1 </th>
            <th scope="col">Restrição E OFR2 </th>
            <th scope="col">Valor Restrição E OFR2 </th>
        </tr>
        
            
    </thead>
    
    <tbody align="center">
       
       <?php
       if(($resulte->num_rows==0) && ($resulte2->num_rows==0))
       {
              echo("<tr>");
           echo("<td colspan='4'>Nenhuma das ofertas selecionadas para comparação tem Restrições referentes ao tarifário de Eletricidade</td>");
           echo("</tr>");
       }
       else
        while(($row_e1 = mysqli_fetch_array($resulte)))
        {
        echo("<tr>");
           echo("<td>" . $row_e1['RESTRICAO'] . "</td>");
           echo("<td>" . $row_e1['VALOR_RESTRICAO'] . "</td>");
           if($row_e2 = mysqli_fetch_array($resulte2))
           {
               echo("<td>" . $row_e2['RESTRICAO'] . "</td>");
               echo("<td>" . $row_e2['VALOR_RESTRICAO'] . "</td>");
           }
           else
           {
               echo("<td> - </td>");
               echo("<td> - </td>");
           }
       echo("</tr>");
        }     
       ?>
    
    </tbody>
</table>

 <A name="gas"></a>
<hr style="border-color:#f00; background-color: #f00;">
<h5> 5. Gás </h5>
<hr style="border-color:#f00; background-color: #f00;">

<br>

  <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
            <th scope="col">Atributo</th>

            <th scope="col"><?php echo($nomeofr1); ?> </th>
            <th scope="col"> VS </th>
            <th scope="col"> <?php echo($nomeofr2);?> </th>
            
        </tr>
    </thead>
    
    
    <tbody align="center">
       
      <?php
      echo("<tr>");
      echo("<td style='background-color:#D1C0C0;'><u>Tem Gás?</u></td>");

      
            if((stripos($componentebasica1,'G')  !== false ) || (stripos($componentebasica1,'g')  !== false ))
            {
                echo("<td>Sim</td>");
                $sim1=1;
            }
            else
            {
                echo("<td>Não</td>");
                $sim1=0;
            }
            echo("<td>VS</td>");
            if((stripos($componentebasica2,'G')  !== false ) || (stripos($componentebasica2,'g')  !== false ))
            {
                echo("<td>Sim</td>");
                $sim2=1;
            }
            else
            {
                echo("<td>Não</td>");
                $sim2=0;
            }
            echo("</tr>");
            echo("<tr>");
            if(($sim1==1) && ($sim2==1))
            {
              if(($row1['ID_ESTRUTURA_TARIFARIA_GN']!=NULL) && ($row2['ID_ESTRUTURA_TARIFARIA_GN']!=NULL))
                 echo("<td colspan='4'><a href=comparartarifariog.php?ET1=" . $row1['ID_ESTRUTURA_TARIFARIA_GN'] . "&ET2=" . $row2['ID_ESTRUTURA_TARIFARIA_GN'] . ">
                      [Comparar Tarifários]</a></td></tr>");
              else
                 echo("<td colspan='4'>Uma ou mais ofertas não tem uma Estrutura Tarifária inválida. Funcionalidade de Comparação desactivada.");
                
            }
            else
            {
               
                  echo("<td colspan='4'>Uma ou mais ofertas escolhidas para comparação não contêm componente básica de gás. Funcionalidade de comparação desactivada.</td></tr>");

            }
    ?>
    </tbody>
</table>
   
<?php
            $resultg = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $ofr1 . "' AND RESTRICAOA=1"); 
            $resultg2 = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $ofr2 . "' AND RESTRICAOA=1"); 
?>
 <A name="restgas"></a>
<hr style="border-color:#f00; background-color: #f00;">
<h5>5.1 Restrições Gás </h5>
<hr style="border-color:#f00; background-color: #f00;">
  <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
    <thead>
        <tr style="text-align:center">
            <th scope="col">Restrição Gás OFR1 </th>
            <th scope="col">Valor Restrição Gás OFR1 </th>
            <th scope="col">Restrição Gás OFR2 </th>
            <th scope="col">Valor Restrição Gás OFR2 </th>
        </tr>
        
            
    </thead>
    
    <tbody align="center">
       
       <?php
       if(($resultg->num_rows==0) && ($resultg2->numrows==0))
       {
           echo("<tr>");
           echo("<td colspan='4'>Nenhuma das ofertas selecionadas para comparação tem restrições referentes ao tarifário de Gás</td>");
           echo("</tr>");
       }
       else
        while(($row_g1 = mysqli_fetch_array($resultg)))
        {
        echo("<tr>");
           echo("<td>" . $row_g1['RESTRICAO'] . "</td>");
           echo("<td>" . $row_g1['VALOR_RESTRICAO'] . "</td>");
           if($row_g2 = mysqli_fetch_array($resultg2))
           {
               echo("<td>" . $row_g2['RESTRICAO'] . "</td>");
               echo("<td>" . $row_g2['VALOR_RESTRICAO'] . "</td>");
           }
           else
           {
               echo("<td> - </td>");
               echo("<td> - </td>");
           }
       echo("</tr>");
        }     
       ?>
    
    </tbody>
</table>
    
    
    </fieldset>
    
 <hr style="border-color:#f00; background-color: #f00;">
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