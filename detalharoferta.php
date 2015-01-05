<?php

session_start();

include ('gerar_alea.php');

include('mysql.php');

include('mysqlconnect.php');

include('login_status.php');

       //ob_start();
      
$idoferta=$_GET['idoferta'];

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <!--<script type="text/javascript" src="../assets/js/jquery.mim.js"></script>-->
   <!-- <script language="JavaScript" type="text/javascript" src="assets/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="assets/js/sprinkle.js"></script>-->
    <script language="javascript" type="text/javascript" src="jquery.min.js"></script>

  <script language="javascript"> 
        var controlo = new Array();
        var controlo1 = 0;
        controlo[0]=0; 
        controlo[1]=0;
        controlo[2]=0;
        controlo[3]=0;
        controlo[4]=0;       
        controlo[6]=0; 
        var state = 'block';
          
        function esconder(){
             //alert("Esconder");
            //echo "Controlo == ".$control;
            if(controlo1 == 0)
            { 
                $("#login").hide("slow");
                controlo1=1;
                //$("#login_li").hide("slow");
            } else {
               $("#login").show(1000);
               // $("#login_li").show(1000);
               controlo1=0;
            }
            
        }

        function esconder_table(id1,id2){
          $("#"+id1).hide("slow");
          $("#"+id2).hide("slow");
          
        }
        
        function mostrar(id1,id2)
        {  
            $("#"+id1).show(500);
            $("#"+id2).show(500);
            /*$("#teste1").show();
            $("#teste2").show();*/
        }
        
        function removeLinha(id1,id2,ind){

            if(controlo[ind]==0)
            {

                esconder_table(id1,id2);
                controlo[ind]=1;
                document.getElementById('show_hidden_'+ind).value='Mostrar';
              
            }
            else
            {
              
                mostrar(id1,id2);
                controlo[ind]=0;
              
                document.getElementById('show_hidden_'+ind).value='Esconder';
              
            }
            
           // mostrar(); 
        }
        
        function showhide(layer_ref) {

            if (state == 'block') { 
                state = 'hidden'; 
            } 
            else { 
            state = 'block'; 
            } 
        if (document.all) { //IS IE 4 or 5 (or 6 beta) 
            eval( "document.all." + layer_ref + ".style.display = state"); 
            } 
        if (document.layers) { //IS NETSCAPE 4 or below 
            document.layers[layer_ref].display = state; 
        } 
        if (document.getElementById &&!document.all) { 
            hza = document.getElementById(layer_ref); 
            hza.style.display = state; 
            
        } 
    } 
    
    function makeVisible(pName) 
    {
      var item = document.getElementById(pName);
      var contentPanel = document.getElementById("content");
      var contents = contentPanel.getElementsByTagName("p");
        alert(item.value);
      for (var i = 0; i < contents.length; i++) {
        if (contents[i] != item) {
          contents[i].style.display = "none"
        }
      }
      item.style.display = "";

    }

     function errorbox(){
       window.alert("Erro no Login!");
        return true;
    }
   
  
    window.onload = function(){
         $("#login").hide();
     }
        
</script> 
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



  <style type="text/css" title="currentStyle">

    @import "assets/table/media/css/demo_page.css";

    @import "assets/table/media/css/demo_table.css";

    @import "assets/table/media/css/ColVis.css";

    @import "assets/table/media/css/TableTools.css";

    @import "assets/table/media/css/dataTables.scroller.css";

    @import "assets/table/media/css/mystyle.css";

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

    <!--  <script type="text/javascript" src="assets/js/jquery.mim.js"></script>-->

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



            <!----------------------------------BODY------------------------------------>

            <?php

            $result = mysqli_query($mysqli,"SELECT *  FROM OFERTAS WHERE IDOFERTA='" . $idoferta . "' LIMIT 1"); 

            $row = mysqli_fetch_array($result);



            ?>

            <div class="container">



              <br>





              <!-- TABELA PRINCIPAL -->

              <fieldset align="center" >

                <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF;" >

                  <tr>

                    <td align="center" colspan = "2"><label>
                        <a id="imprimiroferta" href="detalharofertaimp.php?idoferta=<?php echo $idoferta ?> "><img id="imprimiroferta" align="right" src="icones/print.png" ></a>
                        <h3>Detalhe da Oferta nº <?php echo $idoferta ?> </h3>

                        <hr>
                    
                    </label></td>            

                  </tr>
                  <tr align="right">

                        <td align="right" colspan = "2"><label><h5>Caraterísticas\Atributos da Oferta

                       <input type="button" class="btn  btn-danger" id="show_hidden_0"  value="Esconder" onClick="javascript:removeLinha('teste1','teste2',0);"></input>
                            </h5>
                      </label>

                    </td>            

                  </tr>

                    <!-- <a href="#" onclick="removeLinha('teste1');">hide me</a>
                      <a href="#" onclick="mostrar();">Show me</a>-->
                  <tr  >

                    <td  align="center" valign="top" id="teste1">
                   
                     <!-- TABELA CARACTERISTICAS -->

                     <fieldset align="center" >

                       <table width='500px' height='500px' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;;TABLE-LAYOUT: fixed;" >

                        <tr  class="hero-unit">

                          <td  align="center" WIDTH="200" HEIGHT="30"  colspan = "2">

                            <label>

                              <h3>1. Carater&iacute;sticas da Oferta</h3>

                            </label>

                          </td>            

                        </tr>
                        <tr class="hero-unit">
                           <td align="center" valign="top" colspan="2">

                            <label><u>Nome Oferta:</u></label> 

                            <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Nome" name="nome" value="<?php echo $row['NOME'] ?>">   <br>

                          </td>
                      </tr>
                        <tr class="hero-unit">

                          <td align="center" valign="top" colspan="2">

                            <!--<label><font color="red">ID Inserc&ccedil;&atilde;o Obrigat&oacute;ria!</font></label>-->
                           
                            <label><u>ID Oferta:</u></label> 
                           
                            <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="ID" name="id" value=<?php echo $row['IDOFERTA'] ?>>   <br> 
                           
                          </td>
                         


                      </tr>

                    
                      <tr class="hero-unit">   
                          <td align="center" valign="top">

                          <label><u> Componente Básica:</u></label> 
                            <?php $componentebasica=$row['COMPONENTE_BASICA'];?>
                          <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Componente" name="componentebasica" value="<?php echo $componentebasica;?>">   <br>

                        </td>
                         <td align="center" valign="top">

                          <label><u> Estado:</u></label> 

                          <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Estado" name="estado" value="<?php echo $row['ESTADO'] ?>">   <br>

                        </td>
                       

                  </tr>

                <tr  class="hero-unit">

                       <td align="center" valign="top" >

                        <label ><u>Data Inicio:</u></label> 

                        <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" name="data_inicio" value=<?php echo date("j-n-Y",strtotime($row['DATA_INICIO'])) ?>> <br>

                      </td>

                      <td align="center" valign="top">

                        <label><u> Data Fim Contrat&aacute;vel:</u></label> 

                        <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" name="data_fim" value=<?php $d = new DateTime($row['DATA_FIM']); echo ($d->format("d-m-Y"));  ?>> <br>   

                      </td>

                </tr>         

                <tr  class="hero-unit">

                      <td align="center" valign="top" >    

                        <label><u>Dura&ccedil;&atilde;o:</u></label> 

                        <input style=" text-align:center; cursor: auto;" disabled class="span1" type="text" placeholder="Dura&ccedil;&atilde;o" name="duracao"  value=<?php echo $row['DURACAO'] ?>>   <br>

                      </td>
                       <td align="center" valign="top" >   

                        <label><u>Valor:</u></label> 

                        <input style="text-align:center; cursor: auto;" disabled class="span1" type="text" placeholder="Valor" name="valor"  value=<?php echo $row['VALOR'] ?>>   <br>

                      </td>
                   <!--   <td align="center" valign="top">

                        <label><u> Data Fim:</u><font color="red">*</font></label> 

                        <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" name="data_fim" value=<?php $d = new DateTime($row['DATA_FIM']);  $d->add(new DateInterval('P'.$row['DURACAO'].'D')); echo ($d->format("d-m-Y"));  ?>> <br>   

                     </td>
                      -->
                  

              </tr>

                              


            </table>

          </fieldset>
          <!--  <h5><font color="red">*</font>&nbsp;Data Fim Contrat&aacute;vel com dura&ccedil;&atilde;o inclu&iacute;da</h5>-->
        </td> 

        <td align="center" id="teste2" valign="top">  

          <!--TABELA ATRIBUTOS -->

          <fieldset align="center">

           <table  width='500px' height='500px' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

            <tr  class="hero-unit">

              <td align="center" WIDTH="200" HEIGHT="30"  colspan = "2"><label>

                <h3>2. Atributos</h3>

              </label></td>            

            </tr>



            <tr class="hero-unit" >

              <td  align="center" valign="top" colspan="2">

                <label><u> D&eacute;bito Direto: </u></label>

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Débito Direto" name="debito_direto" value=<?php echo $row['DEBITO_DIRETO'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td align="center" valign="top" colspan="2">

                <label><u>Conta Certa:</u></label> 

                <input  style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Conta Direta" name="conta_certa" value=<?php echo $row['CONTA_CERTA'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td align="center" valign="top" colspan="2">

                <label><u>Correspond&ecirc;ncia Eletr&oacute;nica:</u></label> 

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Correspondência" name="ce" value=<?php echo $row['CORRESPONDENCIA_ELETRONICA'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td align="center" valign="top" colspan="2">

                <label><u>Entidade Parceira:</u></label> 

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Entidade Parceira" name="Entidade_Parceira" value=<?php echo $row['ENTIDADE_PARCEIRA'] ?>>  <br> 

              </td>

            </tr>



           

            <tr class="hero-unit" >



              <td align="center" valign="top" >

                <label><u>Valor EP:</u></label>

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Valor EP" name="valor_ep" value=<?php echo $row['VALOR_EP'] ?>>  <br> 

              </td>

              <td align="center" valign="top" >

                <label><u>Valor Ben&eacute;fico EP:</u></label> 

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Valor Ben&eacute;fico EP" name="v_benefico_ep" value=<?php echo $row['VALOR_BENEFICO_EP'] ?>>   <br>

              </td>

            </tr>



            <tr class="hero-unit" >

              <td align="center" valign="top" >

                <label><u>Unidade EP:</u></label> 

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Unidade EP" name="unidade_ep" value=<?php echo $row['UNIDADE_EP'] ?>>   <br>

              </td>




              <td align="center" valign="top" >

                <label><u>Aplicado EP:</u></label> 

                <input style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Aplicado EP"  name="aplicado_ep" value=<?php echo $row['APLICADO_EP'] ?>> <br> 

              </td>


            </tr>
   
          </table>

        </fieldset>
      </td>



    </tr>
    
      
   
  <?php
    
    if(stripos($componentebasica,'E') !== false)
    {

?>
    
<tr align="right">

                        <td align="right" colspan = "2"><label><h5>Tarifa Eletricidade da Oferta

                       <input type="button" class="btn  btn-danger" id="show_hidden_2"  value="Esconder" onClick="javascript:removeLinha('ELET','RESELET',2);"></input>
                          
                      </h5>

                    </label></td>            

   </tr>
<tr>
  <td align="center" valign="top" id="ELET">
   <!-- TABELA ELECTRICIDADE-->

   <fieldset align="center" >

    <table   width='87%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit"  >
        <td WIDTH="200" HEIGHT="30"  valign="top" align="center" colspan="2">
          <label>
            <h3> 3.Eletricidade:</h3>
          </label>
        </td>     

      </tr>
      <tr  class="hero-unit" >
        <td align="center" valign="top " colspan="2">
         <label><u>ID Componente Estruturada:</u> </label>
         <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="ID Componente Estruturada Eletricidade"  name="ID Componente Estruturada Eletricidade" value="<?php echo $row['ID_ESTRUTURADA_E'] ?>"> <br> 

       </td>
     </tr>  
     <tr  class="hero-unit">
      <td align="center" valign="top " colspan="2">
       <label><u>Componente Estruturada:</u> </label>
       <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Componente Estruturada Eletricidade"  name="Componente Estruturada Eletricidade" value="<?php echo $row['COMPONENTE_ESTRUTURADA_E'] ?>"> <br> 

      </td>
     </tr>
     <?php
    $ete=$row['ID_ESTRUTURA_TARIFARIA_E'];
    ?>
   <tr  class="hero-unit">
    <td  valign="top " colspan="2">
     <label><u>ID Estrutura Tarifária:</u> </label>
     <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="ID Estrutura Tarifária"  name="ID Estrutura Tarifaria" value="<?php echo $ete ?>"> <br> 
    
   </td>
 </tr>  
 <tr  class="hero-unit">
  <td align="center" valign="top " colspan="2">
   <label><u>Estrutura Tarifária:</u> </label>
   <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Estrutura Tarifária"  name="Estrutura Tarifária" value="<?php echo $row['ESTRUTURA_TARIFARIA_E'] ?>"> <br> 
     <a  target="_blank" href="detalharelec.php?ET=<?php echo $ete ?> ">[Detalhar Tarifário]</a>

 </td>
</tr>  
</table>
</fieldset>
</td>

<td align="center" valign="top" id="RESELET">
    
    <!-- TABELA Restrições Eletricidade -->
  <?php
  $resultrestricoese = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=2" ); 

  ?>
    <fieldset align="center" >
        <table   width='87%' height='50%'  align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
              <tr  class="hero-unit">
                <td align="center" WIDTH="200" HEIGHT="30"   align="center" colspan="2">
                  <label>
                    <h3> 3.1 Restrições Eletricidade: </input></h3>
                  </label>
                </td>     
        
              </tr>
              <?php
        
              if($resultrestricoese->num_rows==0)
              {
        
                ?>
        
                <tr  class="hero-unit">
                  <td align="center" align="left" width="20%" colspan="2"><label>
                    Sem Restrições Eletricidade
                  </label>
                </td>   
              </tr>
        
              <?php
        
        
            }
            else
            {
              while($rowrestricoese = mysqli_fetch_array($resultrestricoese))
              {
                ?>
                <tr  class="hero-unit">
                  <td align="center" valign="top " colspan="2">
                   <label>Restrição: </label>
                   <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Restrição"  name="restricao" value="<?php echo $rowrestricoese['RESTRICAO'] ?>"> <br> 
        
                 </td>
               </tr>  
        
               <tr  class="hero-unit">
                <td align="center" valign="top " colspan="2">
                  <label>Valor da Restrição: </label>
                  <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Valor da Restrição"  name="restricao" value="<?php echo $rowrestricoese['VALOR_RESTRICAO'] ?>"> <br> 
                </td>
              </tr>     
              <?php
            }
          }
          ?>                 
        </table>
        </fieldset>
            </td>
     </tr>
     
     
     
<?php
}

if(stripos($componentebasica,'G') !== false)
{

?>

    </tr>

      <tr align="right">

                        <td align="right" colspan = "2"><label><h5>Tarifa de Gás da Oferta

                       <input type="button" class="btn  btn-danger" id="show_hidden_3"  value="Esconder" onClick="javascript:removeLinha('GAS','RESTGAS',3);"></input>
                        </h5>
                    </label></td>            

    </tr>
    
    
<tr>
  <td align="center" valign="top" id="GAS">
    
    <!--TABELA GAS -->
    <fieldset align="center" >
     <table   width='87%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit" >
        <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
          <label>
            <h3> 4. G&aacute;s:   </h3>
          </label>
        </td>     

      </tr>
      <tr class="hero-unit" >
        <td align="center" valign="top" colspan="2">
          <label><u>ID Componente Estruturada:</u></label> 
          <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="ID Componente"  name="ID Componente Estruturada Gas" value="<?php echo $row['ID_ESTRUTURADA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td align="center" valign="top" colspan="2">
          <label><u>Componente Estruturada:</u></label> 
          <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Componente Estruturada Gas"  name="Componente Estruturada Gás" value="<?php echo $row['COMPONENTE_ESTRUTURADA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td align="center" valign="top" colspan="2">
          <label><u>ID Estrutura Tarifária:</u></label> 
          <?php
           $et=$row['ID_ESTRUTURA_TARIFARIA_GN'];
           ?>
          <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="ID Estrutura Tarifária Gás"  name="ID Estrutura Tarifária Gas" value="<?php echo $row['ID_ESTRUTURA_TARIFARIA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td align="center" valign="top" colspan="2">
          <label><u>Estrutura Tarifária:</u></label> 
         
              <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Estrutura Tarifária Gás"  name="Estrutura Tarifaria Gas" value="<?php echo $row['ESTRUTURA_TARIFARIA_GN']; ?>"> <br> 
          <a target="_blank" href="detalhargas.php?ET=<?php echo $et ?> ">[Detalhar Tarifário]</a>
        </td>
      </tr>


    </table>
  </fieldset>
</td> 
<td align="center" valign="top" id="RESTGAS" >

  <!-- TABELA Restrições Gás -->
  <?php
  $resultrestricoesgas = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=1" ); 

  ?>
  <fieldset align="center" >
    <table   width='87%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit">
        <td align="center" WIDTH="200" HEIGHT="30"   align="center" colspan="2">
          <label>
            <h3> 4.1 Restrições Gás:</input></h3>
          </label>
        </td>     

      </tr>
      <?php

      if($resultrestricoesgas->num_rows==0)
      {

        ?>

        <tr  class="hero-unit">
          <td align="center" align="left" width="20%" colspan="2"><label>
            Sem Restrições Gás
          </label>
        </td>   
      </tr>

      <?php


    }
    else
    {
      while($rowrestricoesgas = mysqli_fetch_array($resultrestricoesgas))
      {
        ?>
        <tr  class="hero-unit">
          <td align="center" valign="top " colspan="2">
           <label>Restrição: </label>
           <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Restrição"  name="restricao" value="<?php echo $rowrestricoesgas['RESTRICAO'] ?>"> <br> 

         </td>
       </tr>  

       <tr  class="hero-unit">
        <td align="center" valign="top " colspan="2">
          <label>Valor da Restrição: </label>
          <input style=" text-align:center; cursor: auto;" disabled class="span4" type="text" placeholder="Valor da Restrição"  name="restricao" value="<?php echo $rowrestricoesgas['VALOR_RESTRICAO'] ?>"> <br> 
        </td>
      </tr>     
      <?php
    }
  }
  ?>                 
</table>
</fieldset>
</td> 
</tr>
<?php
}
?>
      <tr align="right">




      <tr align="right">

                        <td align="right" colspan = "2"><label><h5>Serviço Estruturado da Oferta

                       <input type="button" class="btn  btn-danger" id="show_hidden_4"  value="Esconder" onClick="javascript:removeLinha('SERVEST','OFRALT',4);"></input>
                          
                      
</h5>
                    </label></td>            

                  </tr> 
    <tr>

      <td align="center" colspan="2" valign="top" id="SERVEST">

        


        <!-- TABELA SERV_ESTRUTURADO -->



        <?php

        $resultservicoestruturado = mysqli_query($mysqli,"SELECT *  FROM SERVICO_ESTRUTURADO WHERE idoferta='" . $idoferta . "'"); 



        ?>

        <fieldset align="center" >

          <table  id="table_condicao" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

            <tr  class="hero-unit">

              <td align="center" WIDTH="200" HEIGHT="30"  colspan = "2"><label>

                <h3>5. Serviço Estruturado</h3>

              </label></td>            

            </tr>

            <?php



            if($resultservicoestruturado->num_rows==0)

            {



              ?>



              <tr  class="hero-unit">

                <td align="center" width="20%" colspan="2"><label>

                  Sem dados acerca dos Serviços Estruturados desta Oferta

                </label>

              </td>   

            </tr>



            <?php





          }

          else

          {

            while($rowservicoestruturado = mysqli_fetch_array($resultservicoestruturado))

            {

              ?>

              <tr  class="hero-unit">

                <td align="center" width="20%"><label>

                  ID Serviço Estruturado
                </label>
              </td>
              <td width="80%">

                <input readonly class="span5" style=" text-align:center; cursor: auto;" type="text" placeholder="ID Serviço Estruturado"  name="idservest" id="idservest" value="<?php echo $rowservicoestruturado['idservicoestruturado']; ?>"> 
              </td>
            </tr>
            <tr  class="hero-unit">
              <td align="center" width="20%">
                <label>
                 Serviço Estruturado
                </label>
              </td>
              <td width="80%">
                <input readonly class="span5" style=" text-align:center; cursor: auto;" type="text" placeholder="Serviço Estruturado"  name="servest" id="servest" value="<?php echo $rowservicoestruturado['estrutura_servico'] ?>">
              </td>

            </tr>
             <tr  class="hero-unit">
              <td  align="center" width="20%">
                <label>
                 Estado do Serviço
                </label>
              </td>
              <td width="80%">
                <input readonly class="span5"  style=" text-align:center; cursor: auto;" type="text" placeholder="Estado do Serviço"  name="estserv" id="estsrv" value="<?php echo $rowservicoestruturado['estado'] ?>">
              </td>

            </tr>
             <tr  class="hero-unit">
              <td align="center" width="20%">
                <label>
                Obrigatoriedade
                </label>
              </td>
              <td align="center" width="80%">
                <input readonly class="span5" style=" text-align:center; cursor: auto;"  type="text" placeholder="Obrigatoriedade"  name="obrg" id="obrg" value="<?php echo $rowservicoestruturado['obrigatoriedade'] ?>">
              </td>

            </tr>
            <?php
          
              }
        ?>
             <tr  class="hero-unit">
              <td align="center" width="20%">
                <label>
                 ID Estrutura Tarifária
                </label>
              </td>
              <td width="80%">
                <input readonly class="span5"  style=" text-align:center; cursor: auto;" type="text" placeholder="ID Estrutura Tarifária"  name="ID Estrutura Tarifária" id="ID Estrutura Tarifária" value="<?php echo $row['ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ?>">
              </td>
            </tr>

            <tr  class="hero-unit">
              <td  align="center" width="20%">
                <label>
                 Estrutura Tarifária
                </label>
              </td>
              <td width="80%">
                <input readonly class="span5" style=" text-align:center; cursor: auto;"  type="text" placeholder="Estrutura Tarifária"  name="Estrutura Tarifária" id="Estrutura Tarifária" value="<?php echo $row['ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ?>">
              </td>
            </tr> 
            <?php

            }

            ?>
      </table>
    </fieldset>
    <hr>
  </td>
</tr>
        <tr>
            <td colspan="2" id="OFRALT">
      
             <!-- TABELA OFERTAS ALTERNATIVAS-->
              <fieldset align="center" >
                        
                <table  id="table_serv" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                   <tr  class="hero-unit">

                      <td align="center" WIDTH="200" HEIGHT="30"  colspan = "2">
                      <label>

                         <h3>6. Ofertas Alternativas</h3>
                      </label></td>            
                    </tr>
                  
                 <tr  class="hero-unit">
                  <td   width="20%" align="center"><label>
                    Oferta Alternativa Eletricidade:
                  </label>
                                </td>
                                <td align="center">
                                    <input readonly class="span5" style=" text-align:center; cursor: auto;" type="text" placeholder="Eletricidade Alternativa"  name="electricidade_alternativa" id="electricidade_alternativa" value="<?php echo $row['ALTER_E'] ?>">
                                </td>
                 </tr>
                  <tr  class="hero-unit">
                    <td   width="20%" align="center"><label>
                   Oferta Alternativa G&aacute;s:
                  </label>
                                </td>
                                <td align="center">
                                    <input readonly class="span5"  style=" text-align:center; cursor: auto;" type="text" placeholder="G&aacute;s Alternativo"  name="gas_alternativo" id="gas_alternativo" value="<?php echo $row['ALTER_GN'] ?>">
                                </td>
                </tr>
                </table>
             </fieldset>
             <hr>
            </td>

                    <tr align="right">

                        <td align="right" colspan = "2"><label><h5>Condições Particulares da Oferta

                       <input type="button" class="btn  btn-danger" id="show_hidden_1"  value="Esconder" onClick="javascript:removeLinha('condicoes','2',1);"></input>
                          </h5>
                      

                    </label></td>            

                  </tr>



 <tr>

      <td align="center" colspan="2" id="condicoes">

        

        

        <!-- TABELA CONDICOES -->

        <?php

        $resultcondicoes = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "'"); 



        ?>

        <fieldset align="center" >

          <table  valign="top" id="table_condicao" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

            <tr align="center" valign="top" class="hero-unit">

              <td align="center" WIDTH="200" HEIGHT="30"   valign="top" colspan = "2"><label>

                <h3>7. Condições da Oferta</h3>

              </label></td>            

            </tr>

            <?php



            if($resultcondicoes->num_rows==0)

            {



              ?>



              <tr  valign="top" class="hero-unit">

                <td  valign="top" align="center" width="20%" colspan="2"><label>

                  Sem dados sobre as condições desta oferta

                </label>

              </td>   

            </tr>



            <?php





          }

          else

          {

            while($rowcondicoes = mysqli_fetch_array($resultcondicoes))

            {

              ?>

              <tr  valign="top" class="hero-unit" >

                <td valign="top" align="center" width="20%"><label>

                  Condi&ccedil;&atilde;o da Oferta:
                </label>
              </td>
              <td width="80%">

                <input readonly class="span5" style=" text-align:center; cursor: auto;" type="text" placeholder="Condi&ccedil;&atilde;o da Oferta"  name="condicao_oferta" id="condicao_oferta" value="<?php echo $rowcondicoes['CONDICAO_OFERTA'] ?>"> 
              </td>
            </tr>
            <tr  class="hero-unit">
              <td  align="center" width="20%">
                <label>
                  Valor da Condi&ccedil;&atilde;o:
                </label>
              </td>
              <td width="80%">
                <input readonly class="span5"  style=" text-align:center; cursor: auto;" id="tabela_condicao_1" type="text" placeholder="Valor da Oferta"  name="valor_oferta" id="valor_oferta" value="<?php echo $rowcondicoes['VALOR_CONDICAO'] ?>" >
              </td>

            </tr>
            <?php
          }
        }
        ?>

      </table>

    </fieldset>
    <hr>
  </td>
</tr>
    <tr align="right">
        <td align="right" colspan = "2"><label><h5>Outras Informações
        <input type="button" class="btn  btn-danger" id="show_hidden_6"  value="Esconder" onClick="javascript:removeLinha('outras_informacao','2',6);"></input>
        </h5>
        </label></td>            

   </tr>
   <tr>
     <td align="center" colspan="2" id="outras_informacao">
      
             <!-- TABELA OFERTAS ALTERNATIVAS-->
              <fieldset align="center">
                <table  id="table_serv" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                   <tr  class="hero-unit">

                      <td align="center" WIDTH="200" HEIGHT="30"  colspan = "2">
                      <label>

                         <h3>8. Outras Informações:</h3>
                      </label></td>            
                    </tr>
                   
                  <tr  class="hero-unit">

                      <td align="center" valign="top" colspan="2">  

                        <label><u>Reclama&ccedil;&atilde;o da D&iacute;vida:</u></label> 

                        <input readonly style=" text-align:center; cursor: auto;" disabled class="span2" type="text" placeholder="Reclama&ccedil;&atilde;o da D&iacute;vida" name="reclamacao_div" value="<?php echo $row['RECLAMACAO_DIVIDA'] ?>" >   <br>       

                      </td>

                    </tr>
                    <tr  class="hero-unit">

                      <td align="center" valign="top" colspan="2">

                        <label><u>Penaliza&ccedil;&atilde;o:</u></label> 

                        <textarea disabled style="width: 93%; height: 40px; cursor: auto;" ><?php echo $row['PENALIZACAO'] ?></textarea>

                  <!--<input class="span4"  type="text" placeholder="Penaliza&ccedil;&atilde;o" name="penalizacao" value=""   <br>

                -->

              </td>

            </tr>

                 <tr  class="hero-unit">

              <td align="center" valign="top" colspan="2">

                <label><u>Observações:</u></label> 

                <textarea disabled style="width: 93%; height: 80px; cursor: auto;" ><?php echo $row['OBSERVACOES'] ?></textarea>

                    <!--<input class="span4"  type="text" placeholder="Penaliza&ccedil;&atilde;o" name="penalizacao" value=""   <br>

                  -->

                </td>

              </tr>

                </table>
             </fieldset>
            </td>
        </tr>
    </table>
    </fieldset>
    
    <br><br><br>

    
      <br><br><br>
      
      <hr>

   <?php
        include('cabecalho.php');
        ?>
   
      </div> <!-- /container -->
  <script language="javascript"> 
 $('#imprimiroferta').click(function() {
              
              $('#imprimiroferta').hide();

             
        });
 </script>
    <!-- Le javascript
           <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>
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

  </body>

  </html>
  