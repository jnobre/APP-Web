<?php

/** require the PHPExcel file 1.0 */
    require 'admin/PHPExcel.php';

    ini_set("memory_limit","500M"); 

    $dbhost = "127.0.0.1";
    $dbuser = "edp";
    $dbpass = "password";
    $dbname = "edp";
    mysql_connect($dbhost,$dbuser,$dbpass);
    mysql_select_db($dbname);

    $query = "SELECT * FROM OFERTAS";

    if ($result = mysql_query($query) or die(mysql_error())) {
/** Create a new PHPExcel object 1.0 */
   $objPHPExcel = new PHPExcel();

   $objPHPExcel->getActiveSheet()->setTitle('Data');
   }  
   $styleArray = array(
       'borders' => array(
             'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
                    'color' => array('rgb' => '000000'),
                     
             ),
              'right' => array(
        			  'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
        			   'color' => array('rgb' => '000000'),
       		 ),

                
                


       ),
       'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb'=>'D9D9D9'),
                ),
                'font' => array(
                    'bold' => true,
                ),
);

   $styleArray2 = array(
       'borders' => array(
             'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                     
             ),
              'right' => array(
        			  'style' => PHPExcel_Style_Border::BORDER_THIN,
        			   'color' => array('rgb' => '000000'),
       		 ),

       ),
);





  		PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
/** SET HEADER **/
		  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('A1','ID Oferta');

          $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('B1','Nome da Oferta');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('C1','Estado');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('D1','Data Inicio');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('E1','Data Fim');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('F1','Reclamação Dívida');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('G1','Duração');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('H1','Penalização');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('I1','Valor');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('J1','Componente Básica');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('K1','Componente Estruturada E');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('L1','ID Componente Estruturada E');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('M1','Estrutura Tarifária E');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('N1','ID Estrutura Tarifária E');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('O1','Componente Estruturada GN');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('P1','ID Componente Estruturada GN');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('Q1','Estrutura Tarifária GN');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('R1','ID Estrutura Tarifária GN');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('S1','Debito Direto');
		 
		      $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('T1','Forma de Pagamento:');         
          
          $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('U1','Conta Certa');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('V1','Correspondência Eletrónica');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('W1','Entidade Parceira');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('X1','Valor EP');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('Y1','Valor Benéfico EP');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('Z1','Unidade EP');
         
          $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('AA1','Aplicado EP');
         
		      $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('AB1','Observações');
        
          $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('AC1','ID ET Serviço Estruturado');
        
          $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('AD1','ET Serviço Estruturado	'); 	

          $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('AE1','Solução Alternativa Eletricidade');
          
          $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue('AF1','Solução Alternativa Gás');
          
          $objPHPExcel->getActiveSheet()->getStyle('A1:AF1')->applyFromArray($styleArray);



	

/** Loop through the result set 1.0 */
    $rowNumber = 2; //start in cell 2
    while ($row = mysql_fetch_row($result)) {
       $col = 'A'; // start at column A
       foreach($row as $cell) {
       	  $valor = utf8_encode($cell);
       	  $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$valor);
          $col++;
       }
       $rowNumber++;
}
	  $objPHPExcel->getActiveSheet()->getStyle('A2:AF' .$rowNumber)->applyFromArray($styleArray2);

   
/** Create Excel 2007 file with writer 1.0 */
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Listar_ofertas.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
exit;

?>