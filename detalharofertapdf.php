<?php

session_start();

include ('gerar_alea.php');

include('mysql.php');

include('mysqlconnect.php');

include('login_status.php');



$idoferta=$_GET['idoferta'];

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <script language="JavaScript" type="text/javascript" src="assets//js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="assets//js/sprinkle.js"></script>
   <script src="jquery.min.js"></script>
    

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



    @import "assets/table/media/css/mystyle.css";

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


    </head>

    <body>



     

            <!----------------------------------BODY------------------------------------>

            <?php

            $result = mysqli_query($mysqli,"SELECT *  FROM OFERTAS WHERE IDOFERTA='" . $idoferta . "' LIMIT 1"); 

            $row = mysqli_fetch_array($result)



            ?>

   



       <!-- TABELA PRINCIPAL -->

              <fieldset align="center" >

                <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF;" >

                  <tr>

                    <td colspan = "2"><label>

                        <h3>Detalhando Oferta nº <?php echo $idoferta ?> </h3>
                        <hr>
                    
                    </label></td>            

                  </tr>
                
                    <!-- <a href="#" onclick="removeLinha('teste1');">hide me</a>
                      <a href="#" onclick="mostrar();">Show me</a>-->
                  <tr  >

                    <td valign="top" id="teste1">
                   
                     <!-- TABELA CARACTERISTICAS -->

                     <fieldset align="center" >

                       <table width='500px' height='500px' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;;TABLE-LAYOUT: fixed;" >

                        <tr  class="hero-unit">

                          <td  WIDTH="200" HEIGHT="30"  colspan = "2">

                            <label>

                              <h3>1. Carater&iacute;sticas da Oferta</h3>

                            </label>

                          </td>            

                        </tr>

                        <tr  class="hero-unit">

                          <td valign="top" colspan="2">

                            <!--<label><font color="red">ID Inserc&ccedil;&atilde;o Obrigat&oacute;ria!</font></label>-->

                            <label><u>ID Oferta:</u></label> 

                            <input style=" text-align:center;" disabled class="span2" type="text" placeholder="ID" name="id" value=<?php echo $row['IDOFERTA'] ?>>   <br> 

                          </td>

                        </tr>

                        <tr  class="hero-unit">

                          <td valign="top" colspan="2">

                            <label><u>Nome Oferta:</u></label> 

                            <input style=" text-align:center;" disabled class="span3" type="text" placeholder="Nome" name="nome" value="<?php echo $row['NOME'] ?>">   <br>

                          </td>

                        </tr>

                        <tr  class="hero-unit">

                         <td valign="top">

                          <label><u> Estado:</u></label> 

                          <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Estado" name="estado" value="<?php echo $row['ESTADO'] ?>">   <br>

                        </td>

                        <td valign="top">

                          <label><u> Componente Básica:</u></label> 

                          <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Componente" name="componentebasica" value="<?php echo $row['COMPONENTE_BASICA'] ?>">   <br>



                        </td>

                </tr>

                <tr  class="hero-unit">

                       <td valign="top" >

                        <label ><u>Data Inicio:</u></label> 

                        <input style=" text-align:center;" disabled class="span2" type="text" name="data_inicio" value=<?php echo date("j-n-Y",strtotime($row['DATA_INICIO'])) ?>> <br>

                      </td>

                      <td valign="top">

                        <label><u> Data Fim:</u></label> 

                        <input style=" text-align:center;" disabled class="span2" type="text" name="data_fim" value=<?php echo date("j-n-Y",strtotime($row['DATA_FIM'])) ?>> <br>   

                      </td>
                </tr>         

                    <tr  class="hero-unit">

                      <td valign="top" >    

                        <label><u>Dura&ccedil;&atilde;o:</u></label> 

                        <input style=" text-align:center;" disabled class="span1" type="text" placeholder="Dura&ccedil;&atilde;o" name="duracao"  value=<?php echo $row['DURACAO'] ?>>   <br>

                      </td>



                      <td valign="top" >   

                        <label><u>Valor:</u></label> 

                        <input style=" text-align:center;" disabled class="span1" type="text" placeholder="Valor" name="valor"  value=<?php echo $row['VALOR'] ?>>   <br>

                      </td>

                    </tr>

                    <tr  class="hero-unit">

                      <td valign="top" colspan="2">  

                        <label><u>Reclama&ccedil;&atilde;o da D&iacute;vida:</u></label> 

                        <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Reclama&ccedil;&atilde;o da D&iacute;vida" name="reclamacao_div" value=<?php echo $row['RECLAMACAO_DIVIDA'] ?> >   <br>       

                      </td>

                    </tr>

                    <tr  class="hero-unit">

                      <td valign="top" colspan="2">

                        <label><u>Penaliza&ccedil;&atilde;o:</u></label> 

                        <textarea disabled style="width: 450px; height: 40px;" ><?php echo $row['PENALIZACAO'] ?></textarea>

                  <!--<input class="span4"  type="text" placeholder="Penaliza&ccedil;&atilde;o" name="penalizacao" value=""   <br>

                -->

              </td>

            </tr>

            <tr  class="hero-unit">

              <td valign="top" colspan="2">

                <label><u>Observações:</u></label> 

                <textarea disabled style="width: 450px; height: 40px;" ><?php echo $row['OBSERVACOES'] ?></textarea>

                    <!--<input class="span4"  type="text" placeholder="Penaliza&ccedil;&atilde;o" name="penalizacao" value=""   <br>

                  -->

                </td>

              </tr>



            </table>

          </fieldset>

        </td> 

        <td  id="teste2" valign="top">  

          <!--TABELA ATRIBUTOS -->

          <fieldset align="center">

           <table  width='500px' height='500px' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

            <tr  class="hero-unit">

              <td WIDTH="200" HEIGHT="30"  colspan = "2"><label>

                <h3>2. Atributos</h3>

              </label></td>            

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u> D&eacute;bito Direto: </u></label>

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Débito Direto" name="debito_direto" value=<?php echo $row['DEBITO_DIRETO'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Conta Certa:</u></label> 

                <input  style=" text-align:center;" disabled class="span2" type="text" placeholder="Conta Direta" name="conta_certa" value=<?php echo $row['CONTA_CERTA'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Correspond&ecirc;ncia Eletr&oacute;nica:</u></label> 

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Correspondência" name="ce" value=<?php echo $row['CORRESPONDENCIA_ELETRONICA'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Entidade Parceira:</u></label> 

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Entidade Parceira" name="Entidade_Parceira" value=<?php echo $row['ENTIDADE_PARCEIRA'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Valor EP:</u></label>

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Valor EP" name="valor_ep" value=<?php echo $row['VALOR_EP'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Valor Ben&eacute;fico EP:</u></label> 

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Valor Ben&eacute;fico EP" name="v_benefico_ep" value=<?php echo $row['VALOR_BENEFICO_EP'] ?>>   <br>

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Unidade EP:</u></label> 

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Unidade EP" name="unidade_ep" value=<?php echo $row['UNIDADE_EP'] ?>>   <br>

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Aplicado EP:</u></label> 

                <input style=" text-align:center;" disabled class="span2" type="text" placeholder="Aplicado EP"  name="aplicado_ep" value=<?php echo $row['APLICADO_EP'] ?>> <br> 

              </td>

            </tr>







          </table>

        </fieldset>
      </td>



    </tr>
    
    


    <tr>

      <td colspan="2" id="condicoes">

        <hr>

        <br>

        <!-- TABELA CONDICOES -->

        <?php

        $resultcondicoes = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "'"); 



        ?>

        <fieldset align="center" >

          <table  id="table_condicao" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

            <tr  class="hero-unit">

              <td WIDTH="200" HEIGHT="30"  colspan = "2"><label>

                <h3>3. Condições da Oferta</h3>

              </label></td>            

            </tr>

            <?php



            if($resultcondicoes->num_rows==0)

            {



              ?>



              <tr  class="hero-unit">

                <td  align="left" width="20%" colspan="2"><label>

                  Sem dados acerca das condições desta oferta

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

              <tr  class="hero-unit">

                <td  align="left" width="20%"><label>

                  Condi&ccedil;&atilde;o da Oferta:
                </label>
              </td>
              <td width="80%">

                <input class="span5"  type="text" placeholder="Condi&ccedil;&atilde;o da Oferta"  name="condicao_oferta" id="condicao_oferta" value=<?php echo $rowcondicoes['CONDICAO_OFERTA']; ?>> 
              </td>
            </tr>
            <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                  Valor da Condi&ccedil;&atilde;o:
                </label>
              </td>
              <td width="80%">
                <input class="span5"  id="tabela_condicao_1" type="text" placeholder="Valor da Oferta"  name="valor_oferta" id="valor_oferta" value=<?php echo $rowcondicoes['VALOR_CONDICAO'] ?> >
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





<tr>
  <td valign="top" id="GAS">
    <br><br>
    <!--TABELA GAS -->
    <fieldset align="center" >
     <table   width='87%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit" >
        <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
          <label>
            <h3> 4. G&aacute;s:  <input type="button" id="botao_tarifa_gas" value="+"></input> </h3>
          </label>
        </td>     

      </tr>
      <tr class="hero-unit" >
        <td valign="top" colspan="2">
          <label><u>ID Componente Estruturada Gás</u></label> 
          <input style=" text-align:center;" disabled class="span4" type="text" placeholder="ID Componente"  name="ID Componente Estruturada Gas" value="<?php echo $row['ID_ESTRUTURADA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td valign="top" colspan="2">
          <label><u>Componente Estruturada Gás</u></label> 
          <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Componente Estruturada Gas"  name="Componente Estruturada Gás" value="<?php echo $row['COMPONENTE_ESTRUTURADA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td valign="top" colspan="2">
          <label><u>ID Estrutura Tarifária Gás</u></label> 
          <?php
           $et=$row['ID_ESTRUTURA_TARIFARIA_GN'];
           ?>
          <input style=" text-align:center;" disabled class="span4" type="text" placeholder="ID Estrutura Tarifária Gás"  name="ID Estrutura Tarifária Gas" value="<?php echo $row['ID_ESTRUTURA_TARIFARIA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td valign="top" colspan="2">
          <label><u>Estrutura Tarifária Gás</u></label> 
         
              <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Estrutura Tarifária Gás"  name="Estrutura Tarifaria Gas" value="<?php echo $row['ESTRUTURA_TARIFARIA_GN']; ?>"> <br> 
          <a href="detalhargas.php?ET=<?php echo $et ?> ">[Detalhar Tarifário]</a>
        </td>
      </tr>


    </table>
  </fieldset>
</td> 
<td valign="top" id="RESTGAS" >
  <br><br>
  <!-- TABELA Restrições Gás -->
  <?php
  $resultrestricoesgas = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=1" ); 

  ?>
  <fieldset align="center" >
    <table   width='87%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit">
        <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
          <label>
            <h3> 4.1 Restrições Gás: <input type="button" id="botao_tarifa_electricidade" value="+"></input></h3>
          </label>
        </td>     

      </tr>
      <?php

      if($resultrestricoesgas->num_rows==0)
      {

        ?>

        <tr  class="hero-unit">
          <td  align="left" width="20%" colspan="2"><label>
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
          <td  valign="top " colspan="2">
           <label>Restrição: </label>
           <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Restrição"  name="restricao" value="<?php echo $rowrestricoesgas['RESTRICAO'] ?>"> <br> 

         </td>
       </tr>  

       <tr  class="hero-unit">
        <td  valign="top " colspan="2">
          <label>Valor da Restrição: </label>
          <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Valor da Restrição"  name="restricao" value="<?php echo $rowrestricoesgas['VALOR_RESTRICAO'] ?>"> <br> 
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
    

<tr>
  <td >
   <br>
   <!-- TABELA ELECTRICIDADE-->

   <fieldset align="center" >

    <table  id="ELET" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit" >
        <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
          <label>
            <h3> 5.Electricidade: <input type="button" id="botao_tarifa_electricidade" value="+"></input></h3>
          </label>
        </td>     

      </tr>
      <tr  class="hero-unit">
        <td  valign="top " colspan="2">
         <label><u>ID Componente Estruturada Eletricidade:</u> </label>
         <input style=" text-align:center;" disabled class="span4" type="text" placeholder="ID Componente Estruturada Eletricidade"  name="ID Componente Estruturada Eletricidade" value="<?php echo $row['ID_ESTRUTURADA_E'] ?>"> <br> 

       </td>
     </tr>  
     <tr  class="hero-unit">
      <td  valign="top " colspan="2">
       <label><u>Componente Estruturada Eletricidade:</u> </label>
       <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Componente Estruturada Eletricidade"  name="Componente Estruturada Eletricidade" value="<?php echo $row['COMPONENTE_ESTRUTURADA_E'] ?>"> <br> 

      </td>
     </tr>  
   <tr  class="hero-unit">
    <td  valign="top " colspan="2">
     <label><u>ID Estrutura Tarifária:</u> </label>
     <input style=" text-align:center;" disabled class="span4" type="text" placeholder="ID Estrutura Tarifária"  name="ID Estrutura Tarifaria" value="<?php echo $row['ID_ESTRUTURA_TARIFARIA_E'] ?>"> <br> 

   </td>
 </tr>  
 <tr  class="hero-unit">
  <td  valign="top " colspan="2">
   <label><u>Estrutura Tarifária:</u> </label>
   <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Estrutura Tarifária"  name="Estrutura Tarifária" value="<?php echo $row['ESTRUTURA_TARIFARIA_E'] ?>"> <br> 

 </td>
</tr>  
</table>
</fieldset>
</td>

<td valign="top" id="RESELET">
    
    <!-- TABELA Restrições Eletricidade -->
  <?php
  $resultrestricoese = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=2" ); 

  ?>
    <fieldset align="center" >
        <table   width='87%' height='50%'  align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
              <tr  class="hero-unit">
                <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
                  <label>
                    <h3> 5.1 Restrições Eletricidade: <input type="button" id="botao_tarifa_electricidade" value="+"></input></h3>
                  </label>
                </td>     
        
              </tr>
              <?php
        
              if($resultrestricoese->num_rows==0)
              {
        
                ?>
        
                <tr  class="hero-unit">
                  <td  align="left" width="20%" colspan="2"><label>
                    Sem Restrições Eletricidade
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
                  <td  valign="top " colspan="2">
                   <label>Restrição: </label>
                   <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Restrição"  name="restricao" value="<?php echo $rowrestricoese['RESTRICAO'] ?>"> <br> 
        
                 </td>
               </tr>  
        
               <tr  class="hero-unit">
                <td  valign="top " colspan="2">
                  <label>Valor da Restrição: </label>
                  <input style=" text-align:center;" disabled class="span4" type="text" placeholder="Valor da Restrição"  name="restricao" value="<?php echo $rowrestricoese['VALOR_RESTRICAO'] ?>"> <br> 
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
     
     
     
   
    <tr>

      <td colspan="2" id="SERVEST">

        <hr>

        <br>

        <!-- TABELA SERV_ESTRUTURADO -->

        <?php

        $resultservicoestruturado = mysqli_query($mysqli,"SELECT *  FROM SERVICO_ESTRUTURADO WHERE idoferta='" . $idoferta . "'"); 



        ?>

        <fieldset align="center" >

          <table  id="table_condicao" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

            <tr  class="hero-unit">

              <td WIDTH="200" HEIGHT="30"  colspan = "2"><label>

                <h3>6. Serviço Estruturado</h3>

              </label></td>            

            </tr>

            <?php



            if($resultservicoestruturado->num_rows==0)

            {



              ?>



              <tr  class="hero-unit">

                <td  align="left" width="20%" colspan="2"><label>

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

                <td  align="left" width="20%"><label>

                  ID Serviço Estruturado
                </label>
              </td>
              <td width="80%">

                <input class="span5"  type="text" placeholder="ID Serviço Estruturado"  name="idservest" id="idservest" value="<?php echo $rowservicoestruturado['idservicoestruturado']; ?>"> 
              </td>
            </tr>
            <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 Serviço Estruturado
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Serviço Estruturado"  name="servest" id="servest" value="<?php echo $rowservicoestruturado['estrutura_servico'] ?>">
              </td>

            </tr>
             <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 Estado do Serviço
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Estado do Serviço"  name="estserv" id="estsrv" value="<?php echo $rowservicoestruturado['estado'] ?>">
              </td>

            </tr>
             <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                Obrigatoriedade
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Obrigatoriedade"  name="obrg" id="obrg" value="<?php echo $rowservicoestruturado['obrigatoriedade'] ?>">
              </td>

            </tr>
            <?php
          
              }
        ?>
             <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 ID Estrutura Tarifária
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="ID Estrutura Tarifária"  name="ID Estrutura Tarifária" id="ID Estrutura Tarifária" value="<?php echo $row['ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ?>">
              </td>
            </tr>

            <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 Estrutura Tarifária
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Estrutura Tarifária"  name="Estrutura Tarifária" id="Estrutura Tarifária" value="<?php echo $row['ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ?>">
              </td>
            </tr> 
            <?php

            }

            ?>
      </table>
    </fieldset>
  </td>
</tr>
        <tr>
            <td colspan="2" id="OFRALT">
             <br>
             <!-- TABELA OFERTAS ALTERNATIVAS-->
              <fieldset align="center" >
                        
                <table  id="table_serv" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                   <tr  class="hero-unit">

                      <td WIDTH="200" HEIGHT="30"  colspan = "2">
                      <label>

                         <h3>7. Ofertas Alternativas</h3>
                      </label></td>            
                    </tr>
                    
                    
                    
            

                          <tr  class="hero-unit">
                  <td   width="20%" align="left"><label>
                    Oferta Alternativa Electricidade:
                  </label>
                                </td>
                                <td align="left">
                                    <input class="span5"  type="text" placeholder="Electricidade Alternativa"  name="electricidade_alternativa" id="electricidade_alternativa" value="<?php echo $row['ALTER_E'] ?>">
                                </td>
                 </tr>
                           <tr  class="hero-unit">
                    <td   width="20%" align="left"><label>
                   Oferta Alternativa G&aacute;s:
                  </label>
                                </td>
                                <td align="left">
                                    <input class="span5"  type="text" placeholder="G&aacute;s Alternativo"  name="gas_alternativo" id="gas_alternativo" value="<?php echo $row['ALTER_GN'] ?>">
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
   


    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
    <script src="assets/js/jquery.js"></script>


  </body>

  </html>