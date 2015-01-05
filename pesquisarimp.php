<?php
session_start();

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
      <div id='header'><img align='left' style='vertical-align:middle;' src='assets/img/EDP_PDF.jpg'><span style='font-size:medium;''> <font size='15'><b>Pesquisa Avançada:</b></font></span>
      <hr>
      </div>
       <div id='footer'>
       <hr>
        EDP Soluções Comerciais S.A.</div>";
      

$pagenumber='<script type="text/php">

        if ( isset($pdf) ) {
          $font = Font_Metrics::get_font("helvetica", "bold");
          $pdf->page_text(720,575, utf8_encode("Página: {PAGE_NUM} de {PAGE_COUNT}"), $font, 8, array(0,0,0));

        }
        </script>';
$parte2="<table border='3' align='center' >
        <thead>
            <tr>
            	<th scope='col' align='center'>ID</th>
                <th scope='col' align='center'>Nome</th>
                <th scope='col' align='center'>Estado</th>
                <th scope='col' align='center'>Data Inicio</th>
                <th scope='col' align='center'>Data Fim</th>
                <th scope='col' align='center' >Componente<br>B&aacute;sica</th>
                <th scope='col' align='center' >D&eacute;bito Direto</th>
                <th scope='col' align='center'>Conta Certa</th>
                <th scope='col' align='center'>Correspond&ecirc;ncia <br> Electr&oacute;nica</th>
            </tr>
        </thead>
        <tbody align='center'>";
        $end="</body></html>";
  require_once("dompdf/dompdf_config.inc.php");
  $dompdf = new DOMPDF();
  $dompdf->set_paper('a4', 'landscape');
  $dompdf->load_html($parte1.$pagenumber. $_SESSION['pesquisado'] . $parte2 . $_SESSION['pesquisar'] . $end, 'UTF-8');
  $dompdf->render();
  $dompdf->stream('pesquisa'. '.pdf');  



?>