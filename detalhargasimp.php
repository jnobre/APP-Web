<?php
     session_start();
    include('mysql.php');
    include('mysqlconnect.php');  
    include('login_status.php');


    $et=$_GET['ET'];
    if($et=='')
    {
        echo("Nothing to show here");
    }
    $data=$_GET['data'];
    if($data=='')
    {
       echo("Nothing to show here");
    }
?>

    <?php
     $sql1="SELECT NOME_TARIFARIO,GAS_IDGAS,NOME_EMPRESA FROM EMPRESAS_DISTRIBUIDORAS WHERE ESTRUTURA_TARIFARIO='" . $et . "' AND DATA = '".$data."'";
     $result1 = mysqli_query($mysqli,$sql1);
      $row = mysqli_fetch_array($result1);
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
      <div id='header'><img align='left' style='vertical-align:middle;' src='assets/img/EDP_PDF.jpg'><span style='font-size:medium;''> <font size='15'><b>Detalhe de Tarifário de Gás</b></font></span>
      <hr>
      </div>
       <div id='footer'>
       <hr>
        EDP Soluções Comerciais S.A.</div>";
      
     
     
      
      $sql2="SELECT * FROM ESCALAO WHERE EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS=" . $row['GAS_IDGAS'] . " AND EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA='" . $row['NOME_EMPRESA'] . "' ORDER BY ESCALAO_INICIO";
     
      $result2 = mysqli_query($mysqli,$sql2);
      $parte2="<br><br>
      <hr><h4 align='center'>"
.      $row['NOME_TARIFARIO'] . "<br>[" . $et . "]<br> Empresa Distribuidora:" . $row['NOME_EMPRESA']  ."<br> Em vigor a partir de: ". $data .
      "</h4><hr>
      <br>
      <table align='center' border='3'>
        <thead>
		    <tr>
			    <th>Escalao</th>
			    <th>TTF TVCF</th>
         <th>Energia TVCF</th>
         <th>Desconto TTF</th>
         <th>Desconto Energia</th>
         <th>TTF edpC</th>
         <th>Energia edpC</th>      
			  
			   
		    </tr>
	    </thead>
	  <tbody>";
    
       while($row2 = mysqli_fetch_array($result2))
        {


            $parte3.="          
            <tr>
            <td>" . $row2['ESCALAO_INICIO']  . "-" . $row2['ESCALAO_FIM'] .  "</td>
            <td>" . $row2['TERMO_TARIFARIO_FIXO_TVCF']  .  "</td>
            <td>" . $row2['ENERGIA_TVCF']  .  "</td>
            <td>" . $row2['DESCONTO_TTF'] . "</td>
            <td>" . $row2['DESCONTO_ENERGIA']  .  "</td>
            <td>" . $row2['TERMO_TARIFARIO_FIXO_edpC']  .  "</td>
            <td>" . $row2['ENERGIA_edpC'] . "</td>
            </tr>";
            
             
            
         }
  $parte4.="</tbody>
  



</table>";
$pagenumber='<script type="text/php">

        if ( isset($pdf) ) {
          $font = Font_Metrics::get_font("helvetica", "bold");
          $pdf->page_text(500,820, utf8_encode("Página: {PAGE_NUM} de {PAGE_COUNT}"), $font, 8, array(0,0,0));

        }
        </script>';
  require_once("dompdf/dompdf_config.inc.php");
  
  $dompdf = new DOMPDF();
  $dompdf->set_paper('a4', 'portrait');
  $dompdf->load_html($parte1 . $pagenumber. $parte2 . $parte3 . $parte4, 'UTF-8');
  $dompdf->render();
  $dompdf->stream($row['NOME_TARIFARIO'] ."_". $row['NOME_EMPRESA'] . '.pdf');  
?>
 