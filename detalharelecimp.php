<?php
         session_start();
    include('mysql_teste.php');
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

    <?php
     $sql1="SELECT DISTINCT DATA FROM ELECTRICIDADE WHERE ID_TARIFARIO='" . $et . "' ORDER BY DATA DESC";
     $result1 = mysqli_query($mysqli,$sql1);
     $row = mysqli_fetch_array($result1);
      $datas[0]=$row['DATA'];
    
    $i=1;
    while($row_data_si = mysqli_fetch_array($result1))
    {
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
      <div id='header'><img align='left' style='vertical-align:middle;' src='assets/img/EDP_PDF.jpg'><span style='font-size:medium;''> <font size='15'><b>Detalhe de Tarifário de Eletricidade</b></font></span>
      <hr>
      </div>
       <div id='footer'>
       <hr>
        EDP Soluções Comerciais S.A.</div>";
        $sql3="SELECT * FROM TARIFA_SIMPLES WHERE IDTARIFA_SIMPLES=" . $idtarifasimples . " AND POTENCIA!=99";
                $result_si = mysqli_query($mysqli,$sql3);
            
      $parte2="<br><br>
      <hr><h4 align='center'>"
.     $row['NOME'] . " [" . $et . "] <br> Em Vigor a partir de:" . $datas[$iddate] .
      "</h4><hr>
      <br>
      <h4 align='center'> Tarifa Simples:</h4>
      <hr>
      <table align='center' border='3' class='display dataTable' id='tabelasimples'>
        <thead>
        <tr>
          <th>Potência Contratada<br>(em kVa)</th>
          <th>Preço Potência TVCF (€/dia)</th>
          <th>Preço Energia TVCF (€/kWh)</th>
          <th>Desconto(%)</th>
          <th>Preço Potência edpC (€/dia)</th>
          <th>Preço Energia edpC (€/kWh)</th>
              
                
        </tr>
      </thead>
    <tbody>";
       while($rowsi = mysqli_fetch_array($result_si))
        {
            
            $parte3.="<tr>
            <td>" . $rowsi['POTENCIA'] .  "</td>
            <td>" . $rowsi['PRECO_POTENCIA_TVCF'].  "</td>
            <td>" . $rowsi['PRECO_ENERGIA_TVCF']  .  "</td>
            <td>" . $rowsi['DESCONTO']  .  " %</td>
            <td>" . $rowsi['PRECO_POTENCIA_edpC']. "</td>
            <td>" . $rowsi['PRECO_ENERGIA_edpC']  .  "</td>
            </tr>";
            
         }
 

 $parte3.="</tbody>
    
</table>";
  $sql3="SELECT * FROM TARIFA_SIMPLES WHERE IDTARIFA_SIMPLES=" . $idtarifasimples . " AND POTENCIA=99"; 
  $result_si = mysqli_query($mysqli,$sql3);
  if($result_si->num_rows!=0)
    if($rowsi = mysqli_fetch_array($result_si))
    {
      $parte3.="<p><font color='red'>Observações adicionais:</font>" . $rowsi['OBS'] . "<hr>";  
    }


 if($idtarifabi!=NULL)
    {
        $sqlbi="SELECT * FROM TARIFA_BI WHERE IDTARIFA_BI=" . $idtarifabi . " AND POTENCIA!=99";
        $result_bi = mysqli_query($mysqli,$sqlbi);
        
        $parte5.="<br>
        <h4 align='center'>  <hr> Tarifa Bi Horária </h4>  <hr>
        <table align='center'  border='3'>
        <thead>
          <tr>
          <th>Potência Contratada<br>(em kVa)</th>
          <th>Potência TVCF (€/dia) </th>
          <th>Energia Normal TVCF (€/kWh)</th>
          <th>Energia Económico TVCF (€/kWh)</th>
          <th>Desconto(%) </th>
          <th>Potencia edpC</th>
          <th>Energia Normal edpC</th>
          <th>Energia Económico edpC</th>
        </tr>
      </thead>
    <tbody>";
       while($rowbi = mysqli_fetch_array($result_bi))
        {
            $parte5.="<tr>
            <td>" . $rowbi['POTENCIA'] .  "</td>
            <td>" . $rowbi['PRECO_POTENCIA_TVCF']  .  "</td>
            <td>" . $rowbi['ENERGIA_NORMAL_TVCF'] . "</td>    
            <td>" . $rowbi['ENERGIA_ECONOMICO_TVCF'] . "</td>
            <td>" . $rowbi['DESCONTO'] . "</td>
            <td>" . $rowbi['PRECO_POTENCIA_edpC'] . "</td>   
            <td>" . $rowbi['ENERGIA_NORMAL_edpC'] . "</td>
            <td>" . $rowbi['ENERGIA_ECONOMICO_edpC'] . "</td>
            </tr>";

         }
        $sqlobsbi="SELECT * FROM TARIFA_BI WHERE IDTARIFA_BI=" . $idtarifabi . " AND POTENCIA==99";
        // echo("<br>SQL3=" . $sql3);
        $result_obsbi = mysqli_query($mysqli,$sqlobsbi);
        if($result_obsbi->num_rows!=0)
        if($rowsi = mysqli_fetch_array($result_obsbi))
        {
          $parte5.="<p><font color='red'>Observações adicionais:</font>" . $rowsi['OBS'];

        }
      $parte5.="</tbody>
      </table>";
    }
    else
    {
      $parte5="";

    }

$parte6.="<br>";
    if($idtarifatri!=NULL)
    {
        $sqltri="SELECT * FROM TARIFA_TRI WHERE IDTARIFA_TRI=" . $idtarifatri ." AND POTENCIA!=99";
        $result_tri = mysqli_query($mysqli,$sqltri);
        
        $parte6.="<hr>
        <br>
        <h4 align='center'>   <hr>Tarifa Tri Horária </h4>  <hr>
         <table align='center' border='3'>
        <thead>
          <tr>
          <th>Potência Contratada<br>(em kVa)</th>
          <th> Preço da Potência TVCF(€/dia) </th>
          <th>Energia Normal TVCF(€/kWh)</th>
          <th>Económico TVCF(€/kWh)</th>
          <th>Super Económico TVCF(€/kWh)</th>
          <th>Desconto (%)</th>
          <th>Preço da Potência edpC(€/kWh)</th>
          <th>Energia Normal edpC(€/kWh)</th>
          <th>Econónico edpC(€/kWh)</th>
          <th>Super Económico edpC(€/kWh)</th>
  
                
        </tr>
      </thead>
    <tbody>";
       while($rowtri = mysqli_fetch_array($result_tri))
        {
         
    
          
            $parte6.="<tr>
            <td>" . $rowtri['POTENCIA'] .  "</td>
            <td>" . $rowtri['PRECO_POTENCIA_TVCF']  .  "</td>
            <td>" . $rowtri['ENERGIA_NORMAL_TVCF'] . "</td>
            <td>" . $rowtri['ENERGIA_ECONOMICO_TVCF'] . "</td>
            <td>" . $rowtri['ENERGIA_SUPER_ECONOMICO_TVCF'] . "</td>
            <td>" . $rowtri['DESCONTO'] .  "</td>
            <td>" . $rowtri['PRECO_POTENCIA_edpC']  .  "</td>
            <td>" . $rowtri['ENERGIA_NORMAL_edpC'] . "</td>
            <td>" . $rowtri['ENERGIA_ECONOMICO_edpC'] . "</td>
            <td>" . $rowtri['ENERGIA_SUPER_ECONOMICO_edpC'] . "</td>
            </tr>";
            
         }
  $parte6.="</tbody>

</table>";
    $sqltri="SELECT * FROM TARIFA_TRI WHERE IDTARIFA_TRI=" . $idtarifatri . " AND POTENCIA==99";   
    $result_tri = mysqli_query($mysqli,$sqltri);
    if($result_tri->num_rows!=0)
    if($rowsi = mysqli_fetch_array($result_si))
    {
        $parte6.="<p><font color='red'>Observações adicionais:</font>" . $rowsi['OBS'];
    
    }

}
$fim="</body></html>";

$pagenumber='<script type="text/php">

        if ( isset($pdf) ) {
          $font = Font_Metrics::get_font("helvetica", "bold");
          $pdf->page_text(720,575, utf8_encode("Página: {PAGE_NUM} de {PAGE_COUNT}"), $font, 8, array(0,0,0));

        }
        </script>';
  



  require_once("dompdf/dompdf_config.inc.php");
  
  $dompdf = new DOMPDF();
  $dompdf->set_paper('a4', 'landscape');
  $dompdf->load_html($parte1 .$pagenumber .  $parte2 . $parte3 . $parte4 . $parte5 . $parte6. $fim, 'UTF-8');
  $dompdf->render();
  $dompdf->stream('elec_' . $et . '.pdf');  


?>
 