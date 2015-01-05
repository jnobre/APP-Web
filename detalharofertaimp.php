<?php

session_start();



include('mysql.php');

include('mysqlconnect.php');


    ob_end_clean();
       ob_start();
      
$idoferta=$_GET['idoferta'];

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


    </head>

    <body>



     


            <!----------------------------------BODY------------------------------------>

            <?php

            $result = mysqli_query($mysqli,"SELECT *  FROM OFERTAS WHERE IDOFERTA='" . $idoferta . "' LIMIT 1"); 

            $row = mysqli_fetch_array($result);

         include('cabecalho.php');
        ?>
   
  <?php
    $file="detalhardump.php";
    $content = ob_get_contents();
    ob_end_clean();

    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->set_paper('a4', 'portrait');
    $componentebasica=$row['COMPONENTE_BASICA'];
    $d = new DateTime($row['DATA_FIM']);
    $d1 = new DateTime($row['DATA_FIM']);  
    $d1->add(new DateInterval('P'.$row['DURACAO'].'D')); 
    $resultrestricoese = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=2" );
    $resultrestricoesgas = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=1" ); 
    $parte1="<html>

<head>
<style>
    table tr { vertical-align:top;  border-bottom: 20px solid;}
    table {page-break-inside: auto;  }

    .break-word {
        word-wrap: break-word;
      }
    @page { margin: 80px 50px; }
    #header { position: fixed; left: 0px; top: -60px; right: 0px; height: 80px;  }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; ; }
    #footer .page:after { content: counter(page, upper-roman); }

</style>
</head>
      <body>

      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <div id='header'><img align='left' style='vertical-align:middle;' src='assets/img/EDP_PDF.jpg'><span style='font-size:medium;''> <font size='15'><b>Detalhe da Oferta nº ". $idoferta . "</b></font></span>
      <hr>
      </div>
       <div id='footer'>
       <hr>
        Set/2013, EDP Soluções Comerciais S.A.";


$pagenumber='<script type="text/php">

        if ( isset($pdf) ) {
          $font = Font_Metrics::get_font("helvetica", "bold");
          $pdf->page_text(500,820, utf8_encode("Página: {PAGE_NUM} de {PAGE_COUNT}"), $font, 8, array(0,0,0));

        }
        </script>';


        
     $parte1.=$pagenumber;

     $parte1.="</div>
      
      <h2 align='center'> " . $row['NOME'] . "
     <table border='0' width='100%'>
        <tr>
        <td>
          <table  width='90%' align='center' border='3'>
                        <tr  class='hero-unit'>

                          <td align='center' WIDTH='200' HEIGHT='30'  colspan = '2'>

                            <label>

                              <h3>1. Carater&iacute;sticas da Oferta</h3>

                            </label>

                          </td>            

                        </tr>
                         <tr  class='hero-unit'>

                          <td  colspan='2'>

                            <label><u>Nome Oferta:</u></label> 
                           ". $row['NOME'] ."

                          </td>

                        </tr>

                        <tr  class='hero-unit'>

                          <td colspan='2'>

                            <!--<label><font color='red'>ID Inserc&ccedil;&atilde;o Obrigat&oacute;ria!</font></label>-->
                           
                            <label><u>ID Oferta:</u></label> 
                           
                            " . $row['IDOFERTA'] ." <br> 
                           
                          </td>
                          

                </tr>

                       

                <tr  class='hero-unit'>

                        <td >

                          <label><u> Componente Básica:</u></label>                             
                         ". $componentebasica ."  <br>

                        </td>
                        <td >

                          <label><u> Estado:</u></label> 

                         ".  $row['ESTADO']  ." <br>

                        </td>

                </tr>

                <tr  class='hero-unit'>

                       <td >

                        <label ><u>Data  Inicio:</u></label><br> 

                     ".  date('j-n-Y',strtotime($row['DATA_INICIO'])) ." <br>

                      </td>

                      <td >

                        <label><u> Data Fim Contratável:</u></label><br> 

                       ". $d->format('d-m-Y') ."<br>   

                      </td>

                </tr>         

                    <tr  class='hero-unit'>

                      <td  >    

                        <label><u>Dura&ccedil;&atilde;o:</u></label> 

                         " .$row['DURACAO']."

                      </td>
                       <td  >   

                        <label><u>Valor:</u></label> 

                         ". $row['VALOR'] ." <br>

                      </td>
                     

                    </tr>
            </table>
        </td>";

        $parte2 ="<td border='0'>
        </td>";

        $parte3="<td>
            
            <table  width='90%' style='vertical-align:middle;' align='center' border='3'>

            <tr  class='hero-unit'>

              <td align='center' WIDTH='200' HEIGHT='30'  colspan = '2'><label>

                <h3>2. Atributos</h3>

              </label></td>            

            </tr>



            <tr class='hero-unit'>

              <td  colspan='2'>

                <label><u> D&eacute;bito Direto: </u></label>

                " . $row['DEBITO_DIRETO']  ."  <br> 

              </td>
            </tr>
            <tr class='hero-unit' >

              <td  colspan='2'>

                <label><u>Conta Certa:</u></label> 

                " . $row['CONTA_CERTA'] . "  <br> 

              </td>

            </tr>
            <tr class='hero-unit' >

              <td  colspan='2'>

                <label><u>Correspond&ecirc;ncia Eletr&oacute;nica:</u></label> 

                 ". $row['CORRESPONDENCIA_ELETRONICA'] ."  <br> 

              </td>

            </tr>
            <tr class='hero-unit' >

              <td  colspan='2'>

                <label><u>Entidade Parceira:</u></label> 

                 " . $row['ENTIDADE_PARCEIRA']  . "  <br> 

              </td>

            </tr>

            <tr class='hero-unit' >

              <td  >

                <label><u>Valor EP:</u></label>

                 " . $row['VALOR_EP'] . "  <br> 

              </td>

              <td  >

                <label><u>Valor Ben&eacute;fico EP:</u></label> 

                " . $row['VALOR_BENEFICO_EP'] . "  <br>

              </td>

            </tr>



            <tr class='hero-unit' >

              <td  >

                <label><u>Unidade EP:</u></label> 

                 " . $row['UNIDADE_EP'] ." <br>

              </td>

              <td  >
                <label><u>Aplicado EP:</u></label> 
                  ". $row['APLICADO_EP'] ."  <br> 
              </td>
            </tr>
          </table>";


$parte4 = "
        </td>

        </tr>
        <tr>
        <td colspan='3'><br><br><br></td>
        </tr>
        <tr>
        <td>
            <table width='90%' align='center' border='3'>
              <tr  class='hero-unit'>
                <td WIDTH='200' HEIGHT='30'   align='center' colspan='2'>
                  <label>
                    <h3> 3.Eletricidade:</h3>
                  </label>
                </td>     

              </tr>
              <tr  class='hero-unit'>
                <td   colspan='2'>
                 <label><u>ID Componente Estruturada:</u> </label>
                " . $row['ID_ESTRUTURADA_E'] . " <br> 

               </td>
             </tr>  
             <tr  class='hero-unit'>
              <td   colspan='2'>
               <label><u>Componente Estruturada:</u> </label>
                ". $row['COMPONENTE_ESTRUTURADA_E'] ." <br> 

              </td>
             </tr>          
            <tr  class='hero-unit'>
            <td   colspan='2'>
             <label><u>ID Estrutura Tarifária:</u> </label>
            ". $row["ID_ESTRUTURA_TARIFARIA_E"] ." <br> 
           </td>
         </tr>  
         <tr  class='hero-unit'>
          <td   colspan='2'>
           <label><u>Estrutura Tarifária:</u> </label>
           ". $row['ESTRUTURA_TARIFARIA_E'] ."<br>
         </td>
        </tr>  
        </table>";

       $parte5="<td></td>
        <td>
          <table width='90%' align='center' border='3'  >
          <tr  class='hero-unit' >
        <td WIDTH='200' HEIGHT='30'   align='center' colspan='2'>
          <label>
            <h3> 4. G&aacute;s:   </h3>
          </label>
        </td>     
      </tr>
      <tr class='hero-unit' >
        <td  colspan='2'>
          <label><u>ID Componente Estruturada:</u></label> 
          ".$row['ID_ESTRUTURADA_GN']." <br>
        </td>
      </tr>
      <tr class='hero-unit' >
        <td  colspan='2'>
          <label><u>Componente Estruturada:</u></label> 
         ".$row['COMPONENTE_ESTRUTURADA_GN']."<br> 
        </td>
      </tr>
      <tr class='hero-unit' >
        <td  colspan='2'>
          <label><u>ID Estrutura Tarifária:</u></label> "
          .$row['ID_ESTRUTURA_TARIFARIA_GN']." <br> 
        </td>
      </tr>
      <tr class='hero-unit'>
        <td  colspan='2'>
          <label><u>Estrutura Tarifária:</u></label> 
          ".$row['ESTRUTURA_TARIFARIA_GN']." <br> 
        </td>
      </tr>
    </table>
    </td>
    </tr><tr><td colspan='3'><br><br><br></td></tr>";

    $parte6="<tr>
             <td>
             <table   width='95%' align='center' border='3' >
                    <tr  class='hero-unit'>
                      <td WIDTH='200' HEIGHT='30'   align='center' colspan='2'>
                        <label>
                          <h3> 3.1 Restrições Eletricidade: </input></h3>
                        </label>
                      </td>     
              
                    </tr>";

      
              
    if($resultrestricoese->num_rows==0)
    {
        $parte7 = '<tr  class="hero-unit">
                        <td  align="left" width="20%" colspan="2"><label>
                          Sem Restrições Eletricidade
                        </label>
                      </td>   
                    </tr>';
              
    }
    else
    {
      while($rowrestricoese = mysqli_fetch_array($resultrestricoese))
      {
         $parte7 .= "<tr  class='hero-unit'>
                        <td   colspan='2'>
                         <label>Restrição: </label>
                         " . wordwrap($rowrestricoese['RESTRICAO'],20,"\n",true). " <br> 
              
                       </td>
                     </tr>  
              
                     <tr  class='hero-unit'>
                      <td   colspan='2'>
                        <label>Valor da Restrição: </label>
                        ".wordwrap($rowrestricoese['VALOR_RESTRICAO'],20,"\n",true)."
                      </td>
                    </tr>";     
       }
     }
     
     $parte7 .="</table>
      </td>
    ";

    $parte8 .="<td></td>
    <td>
     <table   width='90%' align='center' border='3'  >
      <tr  class='hero-unit'>
        <td WIDTH='200' HEIGHT='30'   align='center' colspan='2'>
          <label>
            <h3> 4.1 Restrições Gás:</input></h3>
          </label>
        </td>     

      </tr>";

      if($resultrestricoesgas->num_rows==0)
      {

        

        $parte9="<tr  class='hero-unit'>
          <td  align='left' width='20%' colspan='2'><label>
            Sem Restrições Gás
          </label>
        </td>   
      </tr>";

      


    }
    else
    {
      while($rowrestricoesgas = mysqli_fetch_array($resultrestricoesgas))
      {
        
        $parte9.="<tr  class='hero-unit'>
          <td colspan='2'>
          
           <label>Restrição: </label><br>
           " .  wordwrap($rowrestricoesgas['RESTRICAO'],20,"\n",true) . "<br> 
          
         </td>
       </tr>  

       <tr  class='hero-unit'>
        <td   colspan='2'>
          <label>Valor da Restrição: </label><br>
          " .  wordwrap($rowrestricoesgas['VALOR_RESTRICAO'],20,"\n",true) . "<br> 
        </td>
      </tr> ";    
     
    }
  }
  $parte9.="</table>
      </td> 
      </tr>
     
      <tr><td colspan='3'><br><br><br></td></tr>";


$parte10.=" <tr>

      <td colspan='3'>";


        $resultservicoestruturado = mysqli_query($mysqli,"SELECT *  FROM SERVICO_ESTRUTURADO WHERE idoferta='" . $idoferta . "'"); 

        

$parte10.="<table   width='95%' align='center' border='3' >

            <tr  class='hero-unit'>

              <td WIDTH='200' HEIGHT='30'  colspan = '2'>
              <label>
                <h3>5. Serviço Estruturado</h3>

              </label></td>            

            </tr>";





            if($resultservicoestruturado->num_rows==0)

            {
              $parte11.="<tr  class='hero-unit'>

                <td  align='left' width='20%' colspan='2'><label>

                  Sem dados acerca dos Serviços Estruturados desta Oferta

                </label>

              </td>   

            </tr>";





          }

          else

          {

            while($rowservicoestruturado = mysqli_fetch_array($resultservicoestruturado))

            {
             

              $parte11 .= "<tr  class='hero-unit'>

                <td  align='left' width='20%'><label>

                  ID Serviço Estruturado
                </label>
              </td>
              <td width='80%'>

               " . $rowservicoestruturado['idservicoestruturado'] ."  
              </td>
            </tr>
            <tr  class='hero-unit'>
              <td  align='left' width='20%'>
                <label>
                 Serviço Estruturado
                </label>
              </td>
              <td width='80%'>
                " . $rowservicoestruturado['estrutura_servico'] ."
              </td>
            </tr>
             <tr  class='hero-unit'>
              <td  align='left' width='20%'>
                <label>
                 Estado do Serviço
                </label>
              </td>
              <td width='80%'>
                ". $rowservicoestruturado['estado'] . "
              </td>

            </tr>
             <tr  class='hero-unit'>
              <td  align='left' width='20%'>
                <label>
                Obrigatoriedade
                </label>
              </td>
              <td width='80%'>
                " . $rowservicoestruturado['obrigatoriedade'] . "
              </td>

            </tr>";
            
          
              }
        
            $parte11.="<tr  class='hero-unit'>
              <td  align='left' width='20%'>
                <label>
                 ID Estrutura Tarifária
                </label>
              </td>
              <td width='80%'>
                ". $row['ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ."
              </td>
            </tr>

            <tr  class='hero-unit'>
              <td  align='left' width='20%'>
                <label>
                 Estrutura Tarifária
                </label>
              </td>
              <td width='80%'>
                ". $row['ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ."
              </td>
            </tr>";
            

            }

            
      $parte11.="</table>
    
    
  </td>
</tr>";

$parte12.="<tr>
            <td colspan='3' id='OFRALT'>
    
                        
                <table  width='95%' align='center' border='3' >
                   <tr  class='hero-unit'>

              <td WIDTH='200' HEIGHT='30'  colspan = '2'>
              <label>
                <h3>6. Ofertas Alternativas</h3>

              </label></td>            

            </tr>
                    
<tr  class='hero-unit'>
                  <td   width='20%' align='left'><label>
                    Oferta Alternativa Eletricidade:
                  </label>
                                </td>
                                <td align='left'>
                          ".  $row['ALTER_E'] . "
                                </td>
                 </tr>
                           <tr  class='hero-unit'>
                    <td   width='20%' align='left'><label>
                   Oferta Alternativa G&aacute;s:
                  </label>
                                </td>
                                <td align='left'>
                              " . $row['ALTER_GN'] ."
                                </td>
                </tr>
                </table>
             
            </td><tr><td colspan='3'><br><br><br></td></tr>";


$parte13.="<tr>

      <td colspan='3' id='condicoes'>";

        

    
        

        $resultcondicoes = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "'" ); 



        

      $parte13.=  "<table  width='95%' align='center' border='3' >

            <tr  class='hero-unit'>

              <td WIDTH='200' HEIGHT='30'    colspan = '2'><label>

                <h3>7. Condições da Oferta</h3>

              </label></td>            

            </tr>";





            if($resultcondicoes->num_rows==0)

            {



$parte13.="  <tr   class='hero-unit'>

                <td   align='left' width='20%' colspan='2'><label>

                  Sem dados sobre as condições desta oferta

                </label>

              </td>   

            </tr>";



          





          }

          else

          {

            while($rowcondicoes = mysqli_fetch_array($resultcondicoes))

            {

              

             $parte13.=" <tr   class='hero-unit' >

                <td  align='left' width='20%'><label>

                  Condi&ccedil;&atilde;o da Oferta:
                </label>
              </td>
              <td width='80%'>
                ". $rowcondicoes['CONDICAO_OFERTA'] ." 
              </td>
            </tr>
            <tr  class='hero-unit'>
              <td  align='left' width='20%'>
                <label>
                  Valor da Condi&ccedil;&atilde;o:
                </label>
              </td>
              <td width='80%'>
                ". $rowcondicoes['VALOR_CONDICAO'] ."
              </td>

            </tr>";
          
          }
        }
        

     $parte13.=" </table>

    
   
  </td>";


  $parte14.="<tr><td colspan='3'> <br><br><br></td></tr><tr>
            <td colspan='3' id='OFRALT'>
      
             <!-- TABELA OFERTAS ALTERNATIVAS-->
             
                        
                <table  width='95%' align='center' border='3' >
                   <tr  class='hero-unit'>

                      <td WIDTH='200' HEIGHT='30'  colspan = '2'>
                      <label>

                         <h3>8. Outras Informações:</h3>
                      </label></td>            
                    </tr>
                    
                    
                    
            

                       <tr  class='hero-unit'>

                      <td  colspan='2'>  

                        <label><u>Reclama&ccedil;&atilde;o da D&iacute;vida:</u></label> 

                        ". $row['RECLAMACAO_DIVIDA'] ." <br>       

                      </td>

                    </tr>
                    <tr  class='hero-unit'>

                      <td  colspan='2'>

                        <label><u>Penaliza&ccedil;&atilde;o:</u></label> 

                        " . $row['PENALIZACAO'] ."
                

              </td>

            </tr>

                 <tr  class='hero-unit'>

              <td  colspan='2'>

                <label><u>Observações:</u></label> 

               ". $row['OBSERVACOES']  ."

                    
                </td>

              </tr>

                </table>
            </td>
        </tr>
    </table>

</body></html>";
    







     

  $dompdf->load_html($parte1 . $parte2 . $parte3 . $parte4 . $parte5 . $parte6 . $parte7. $parte8 . $parte9 . $parte10 . $parte11 . $parte12 . $parte13 . $parte14, 'UTF-8');
  $dompdf->render();
  $dompdf->stream($idoferta . '.pdf');      
?>

</body>
</head>
</html>
