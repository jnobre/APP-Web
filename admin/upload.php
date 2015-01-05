<?php
    session_start();
    include('../mysql.php');
    include('../mysqlconnect.php');
    //set_time_limit(300);
    
    function bytesToSize1024($bytes, $precision = 2) {
        $unit = array('B','KB','MB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    }
    
    function getdadosofertas($cell,&$array_data,$linha)
    { 
                    if(('B' == $cell->getColumn())){
                        $array_data[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                       
                    } else if('C' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                   
                    } else if('D' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                   
                    } else if('E' == $cell->getColumn()){

                      if($cell->getCalculatedValue() == '-')
                         $array_data[$cell->getColumn()] = '0000-00-00';
                      else
                        $array_data[$cell->getColumn()] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');

                    } else if('F' == $cell->getColumn()){

                      if($cell->getCalculatedValue() == '-')
                         $array_data[$cell->getColumn()] = '0000-00-00';
                      else
                        $array_data[$cell->getColumn()] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');

                    } else if('G' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('H' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('H' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('I' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('J' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('K' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('L' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('M' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                        
                    } else if('N' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('O' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('P' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('Q' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('R' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                        
                    } else if('S' == $cell->getColumn()){
                       $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('T' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('U' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('V' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('W' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('X' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('Y' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                        
                    } else if('Z' == $cell->getColumn()){
                         $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AA' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AB' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                        
                    } else if('AC' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());    
                        
                    } else if('AD' == $cell->getColumn()){
                         $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());   
                
                    } else if('AE' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                          
                    } else if('AF' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AG' == $cell->getColumn()){
                         $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AH' == $cell->getColumn()){
                       $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AI' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AJ' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AK' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AL' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AM' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AN' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AO' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AP' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AQ' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AR' == $cell->getColumn()){
                       $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AS' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AT' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                        
                    } else if('AU' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AV' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AW' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AX' == $cell->getColumn()){
                       $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('AY' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('AZ' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
            
                    } else if('BA' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
            
                    } else if('BB' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('BC' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                
                    } else if('BD' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    
                    } else if('BE' == $cell->getColumn()){
                        $array_data[$cell->getColumn()] = ($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue());
                    }

    }
      
             
    function getdadose($cell,&$array_tarifario_e,$linha,$nome_tarifario,&$caracteristicas_electricidade,&$relatorio_html)
    {        
        global $mysqli,$nome_tarifario_e,$id_tarifa_e,$data_inicio_e,$tipo_desconto_simples,$tipo_desconto_bi,$tipo_desconto_tri,$correcto_e;

        //echo "TARIFARIO_E celulas visitadas == ".$cell->getCoordinate()." valor == ".$cell->getCalculatedValue()."<br>";
        if($linha  ==  1) {

          if(('B' != $cell->getColumn())){    
               //$valor = ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD'));
               //$caracteristicas_electricidade['Data Inicio'] = ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD'));
               $valor = $cell->getCalculatedValue();
               if($cell->getColumn() != '-')
                  array_push($data_inicio_e,  ($valor === '' ? '0000-00-00' : PHPExcel_Style_NumberFormat::toFormattedString($valor, 'YYYY-MM-DD')));
               else
                  array_push($data_inicio_e, '0000-00-00');          
         }

        }else if($linha == 2){
         
         if(('B' != $cell->getColumn())){    
              //$valor =  ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
             //$caracteristicas_electricidade['Nome Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
              $valor = $cell->getCalculatedValue();
              array_push($nome_tarifario_e,($valor === '' ? '-' : $valor));

            }
         
        }else if($linha == 3){
              if(('B' != $cell->getColumn())){    
               // $valor = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
               //$caracteristicas_electricidade['ID Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
                $valor = $cell->getCalculatedValue();
                array_push($id_tarifa_e,  ($valor === '' ? '-' : $valor));
             }

        }else if($linha > 7){
         
         //echo "TARIFARIO_E celulas visitadas == ".$cell->getColumn()." valor == ".$cell->getCalculatedValue()."<br>";
      
         //Tabelas das tarifas
         if(('B' == $cell->getColumn())){
           $valor = $cell->getCalculatedValue();    
           $array_tarifario_e['B'] =  ($valor === '' ? null : str_replace(",",".",$valor));
                       
         } else if('C' == $cell->getColumn()){
            $valor = $cell->getCalculatedValue();
           $array_tarifario_e['C'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('D' == $cell->getColumn()){
             $valor = $cell->getCalculatedValue();
           $array_tarifario_e['D'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
         
         } else if('E' == $cell->getColumn()){
           $valor = $cell->getCalculatedValue();
           if($tipo_desconto_simples == '%') 
              $array_tarifario_e['E'] =  ($valor === '' ? '-' : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.00%'));
           else 
              $array_tarifario_e['E'] =  ($valor === '' ? null :  PHPExcel_Style_NumberFormat::toFormattedString($valor, '@') .'€');
           
         } else if('F' === $cell->getColumn()){
           
          //  echo " ANTESColuna == ".$cell->getColumn()." Valor == ".$cell->getCalculatedValue()."<br>"; 
          //   echo " ANTESColuna == ".$cell->getColumn()." Valor == ".$cell->getCalculatedValue()."<br>"; 
           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['F'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
           //  echo " DEPOIS Coluna == ".$cell->getColumn()." Valor == ".$cell->getCalculatedValue()."<br>";        

         } else if('G' === $cell->getColumn()){
            
          //  echo " ANTES Coluna == ".$cell->getColumn()." Valor == ".$cell->getCalculatedValue()."<br>";
            //   echo " ANTES Coluna == ".$cell->getColumn()." Valor == ".$cell->getCalculatedValue()."<br>";
          $valor = $cell->getCalculatedValue();
          $array_tarifario_e['G'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
           // echo " DEPOIS Coluna == ".$cell->getColumn()." Valor == ".$cell->getCalculatedValue()." teste == ".$cell->getFormattedValue()."<br>";

           if(($array_tarifario_e['B'] != null) &&  ($array_tarifario_e['F'] != null) && ($array_tarifario_e['G'] != null))
           {      
                $flag_simples=-1;
                //echo "Desconto simples == ".$afrray_tarifario_e['E']."<br>";
                //echo "Inserir B == ".$array_tarifario_e['B']." C == ".$array_tarifario_e['C']." D == ".$array_tarifario_e['D']." E == ".$array_tarifario_e['E']." F == ".$array_tarifario_e['F']." G == ".$array_tarifario_e['G']." E == ".$array_tarifario_e['E']."<br>";
                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_SIMPLES (IDTARIFA_SIMPLES,POTENCIA,PRECO_POTENCIA_TVCF,PRECO_ENERGIA_TVCF,PRECO_POTENCIA_edpC,PRECO_ENERGIA_edpC,DESCONTO,TIPO_DESCONTO,FORMATO_DESCONTO,DATA,OBS) VALUES (?,?,?,?,?,?,?,NULL,NULL,'0000-00-00',NULL)"))             
                {
                        //echo "entra aqui<br>";
                        $insert_stmt->bind_param('dddddds',$caracteristicas_electricidade['Ultimo ID Simples'],$array_tarifario_e['B'],$array_tarifario_e['C'],$array_tarifario_e['D'],$array_tarifario_e['F'],$array_tarifario_e['G'],$array_tarifario_e['E']);
                        $ok=$insert_stmt->execute();
                        $id_tarifa_simples=$mysqli->insert_id;
                        if(!$ok)
                        { 
                            $flag_simples=-1;
                           // echo "Insucesso TARIFA SIMPLES == ".$mysqli->error."!!!<br>"; 
                        }
                        else
                        { 

                            $correcto_e['Simples'] = 1;
                            $flag_simples=1;
                        }
                        $insert_stmt->close();                  
                }
                else
                    echo("Statement failed: ". $mysqli->error . "<br>");

                if($flag_simples == -1)
                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
           }
         
         } else if('I' == $cell->getColumn()){

            $valor = $cell->getCalculatedValue();
           $array_tarifario_e['I'] =  ($valor === '' ? null : str_replace(",",".",$valor));
           
         } else if('J' == $cell->getColumn()){

          $valor = $cell->getCalculatedValue();
          $array_tarifario_e['J'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('K' == $cell->getColumn()){

           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['K'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('L' == $cell->getColumn()){

           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['L'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
         
         } else if('M' == $cell->getColumn()){

            $valor = $cell->getCalculatedValue();
            if($tipo_desconto_bi == '%') 
              $array_tarifario_e['M'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.00%'));
           else 
              $array_tarifario_e['M'] =  ($valor === '' ? null :  PHPExcel_Style_NumberFormat::toFormattedString($valor, '@') .'€');

         } else if('N' == $cell->getColumn()){
           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['N'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('O' == $cell->getColumn()){
           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['O'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('P' == $cell->getColumn()){
          
           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['P'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
            //echo "Desconto bi == ".$array_tarifario_e['M']."<br>";
            //Inserir TARIFA BI          
            if( $array_tarifario_e['I'] != null && $array_tarifario_e['N'] != null && $array_tarifario_e['O'] != null && $array_tarifario_e['P'] != null)
            {
                $flag_tarifa_bi=-1;       
                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_BI (IDTARIFA_BI,POTENCIA,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,PRECO_POTENCIA_TVCF,DESCONTO,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,PRECO_POTENCIA_edpC,DATA,OBS) VALUES (?,?,?,?,?,?,?,?,?,NULL,NULL)")) 
                {  
                    $insert_stmt->bind_param('dddddsddd',$caracteristicas_electricidade['Ultimo ID BI'],$array_tarifario_e['I'],$array_tarifario_e['K'],$array_tarifario_e['L'],$array_tarifario_e['J'],$array_tarifario_e['M'],$array_tarifario_e['O'],$array_tarifario_e['P'],$array_tarifario_e['N']);
                    $ok=$insert_stmt->execute();
                    $insert_stmt->close();      
                    $id_tarifa_bi=$mysqli->insert_id;
                    if(!$ok)
                    { 
                        $flag_tarifa_bi = -1;
                    }
                    else
                    { 
                        $correcto_e['BI'] = 1;
                        $flag_tarifa_bi = 1;
                    }
                }
                else
                    $flag_tarifa_bi=-1;

                if($flag_tarifa_bi == -1)
                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                        
            }

         } else if('R' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
           $array_tarifario_e['R'] = ($valor === '' ? null : str_replace(",",".",$valor));
                   
         } else if('S' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
           $array_tarifario_e['S'] = ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('T' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
          $array_tarifario_e['T'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('U' == $cell->getColumn()){
           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['U'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('V' == $cell->getColumn()){
           $valor = $cell->getCalculatedValue();
           $array_tarifario_e['V'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
        
         } else if('W' == $cell->getColumn()){
           $valor = $cell->getCalculatedValue();
           if($tipo_desconto_tri == '%') 
              $array_tarifario_e['W'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.00%'));
           else if($tipo_desconto_tri == '€')
              $array_tarifario_e['W'] =  ($valor === '' ? null :  PHPExcel_Style_NumberFormat::toFormattedString($valor, '@') .'€');
             // $array_tarifario_e[$cell->getColumn()] 
     
           
         } else if('X' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
           $array_tarifario_e['X'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('Y' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
           $array_tarifario_e['Y'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('Z' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
           $array_tarifario_e['Z'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('AA' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
           $array_tarifario_e['AA'] =  ($valor=== '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
            //echo "Desconto tri == ".$array_tarifario_e['W']."<br>";
           //INSERIR TARIFA TRI   
           if($array_tarifario_e['R'] != null && $array_tarifario_e['X'] != null && $array_tarifario_e['Y'] != null && $array_tarifario_e['Z'] != null && $array_tarifario_e['AA'] != null)
           {
                $flag_tarifa_tri=-1;
                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_TRI(IDTARIFA_TRI,POTENCIA,PRECO_POTENCIA_TVCF,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,ENERGIA_SUPER_ECONOMICO_TVCF,DESCONTO,PRECO_POTENCIA_edpC,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,ENERGIA_SUPER_ECONOMICO_edpC,DATA,OBS) VALUES (?,?,?,?,?,?,?,?,?,?,?,NULL,NULL)")) 
                {  
                    $insert_stmt->bind_param('ddddddsdddd',$caracteristicas_electricidade['Ultimo ID TRI'],$array_tarifario_e['R'],$array_tarifario_e['S'],$array_tarifario_e['T'],$array_tarifario_e['U'],$array_tarifario_e['V'],$array_tarifario_e['W'],$array_tarifario_e['X'],$array_tarifario_e['Y'],$array_tarifario_e['Z'],$array_tarifario_e['AA']);
                    $ok=$insert_stmt->execute();
                    $id_tarifa_simples=$mysqli->insert_id;
                    if(!$ok)
                    {
                        $flag_tarifa_tri = -1;
                        //echo "Insucesso TARIFA TRI == ".$mysqli->error."!!!<br>"; 
                    }
                    else
                    { 
                        $correcto_e['TRI'] = 1;
                        $flag_tarifa_tri = 1;
                        //echo "<p align='center'>Sucesso a inserir tarifa TRI.</p>";
                    }        
                    $insert_stmt->close(); 
                }
                else
                    $flag_tarifa_tri = -1;
                    
                if($flag_tarifa_tri == -1)
                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
             
           }

         }
        }
    }
    
    function getdadosgn($cell,&$array_tarifario_gn,$linha,$nome_plano,&$caracteristicas_gas,&$empresas_distribuidoras)
    { 
        //echo "TARIFARIO_GN celulas visitadas == ".$cell->getColumn()." valor == ".$cell->getCalculatedValue()."<br>";
        global $tipo_desconto_ttf,$tipo_desconto_energia;
        //echo "[INICIO] Estou na coluna == ".$cell->getColumn()."<br>";
        if($linha == 1){
            
             //NOME TARIFARIO
               if(('' != $cell->getCalculatedValue()) && ('B' != $cell->getColumn())){    
               //$valor = ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD'));
               //$caracteristicas_electricidade['Data Inicio'] = ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD'));
              array_push($empresas_distribuidoras[0],  ($cell->getCalculatedValue() === '-' ? '0000-00-00' : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD')));
               //echo $cell->getCalculatedValue() . "<br>";      
         }
         
        }else if($linha == 2){
            
             //EMPRESA DISTRIBUIDORA
             if(('' != $cell->getCalculatedValue()) && ('B' != $cell->getColumn())){    
              //$valor =  ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
             //$caracteristicas_electricidade['Nome Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
              array_push($empresas_distribuidoras[1],($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue()));
               //echo $cell->getCalculatedValue() . "<br>";    
            }
         
        }else if($linha == 3){
            
            //ID TARIFARIO
           if(('' != $cell->getCalculatedValue()) && ('B' != $cell->getColumn())){    
              //$valor =  ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
             //$caracteristicas_electricidade['Nome Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
              array_push($empresas_distribuidoras[2],($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue()));
              // echo $cell->getCalculatedValue() . "<br>";    
            }

         }else if( $linha == 4 ) {
             
             if(('' != $cell->getCalculatedValue()) && ('B' != $cell->getColumn())){    
              //$valor =  ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
             //$caracteristicas_electricidade['Nome Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
              array_push($empresas_distribuidoras[3],($cell->getCalculatedValue() === '' ? '-' : $cell->getCalculatedValue()));
              // echo $cell->getCalculatedValue() . "<br>";    
            }
                       
         } else if( $linha == 5) {
            
              if(('' != $cell->getCalculatedValue()) && ('B' != $cell->getColumn())){    
              //$valor =  ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
             //$caracteristicas_electricidade['Nome Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
              array_push($empresas_distribuidoras[4],($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue()));
              // echo $cell->getCalculatedValue() . "<br>";    
            }

         } else if(($linha > 8) && ($linha < 53)){
          
        if('B' == $cell->getColumn()){   
          $temp=$cell->getCalculatedValue();
          if(!empty($temp))
                $array_tarifario_gn['B'] = $cell->getCalculatedValue();
           
                   
         } else if('C' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
         // echo "<br> Entra no C linha == ".$linha." valor == ".$cell->getCalculatedValue()."<br>";
           $array_tarifario_gn['C'] =  ($valor === '' ? '-' : $valor);
                              
         } else if('D' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();   
          $array_tarifario_gn['D'] = ($valor === '' ? '-' : $valor);
                   
         } else if('E' == $cell->getColumn()){
            $valor = $cell->getCalculatedValue();
            //echo " E == ".$cell->getCalculatedValue() . "Coluna == ".$cell->getColumn(). "<br>";
           //echo " Tipo de dados == ".gettype($cell->getCalculatedValue())."<br>";
           $array_tarifario_gn['E'] = ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
                   
         } else if('F' == $cell->getColumn()){
         // echo " F == ".$cell->getCalculatedValue() .  "Coluna == ".$cell->getColumn()."<br>";
          //echo ("<br>Tipo de desconto == ".$tipo_desconto_ttf ."<br>");
          $valor = $cell->getCalculatedValue();
           if(($valor === '>') || ($valor === '<'))
              $array_tarifario_gn['F'] = $valor;
           else if($tipo_desconto_ttf =='%') 
              $array_tarifario_gn['F'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.00%'));
           else 
              $array_tarifario_gn['F'] =  ($valor === '' ? null :  PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000') .'€');

     
         } else if('G' == $cell->getColumn()){
          $valor = $cell->getCalculatedValue();
         // echo " G == ".$cell->getColumn() ."<br>";
          $array_tarifario_gn['G'] = ($valor === '-' ? '-' : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
        //  echo "     valor == ".$array_tarifario_gn['G']."<br>";
         
    
         } else if('H' == $cell->getColumn()){
          //echo " H == ".$cell->getCalculatedValue() ."Coluna == ".$cell->getColumn(). "<br>";
          $valor = $cell->getCalculatedValue();   
          $array_tarifario_gn['H'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
           
         } else if('I' == $cell->getColumn()){
             
         // echo " I == ".$cell->getCalculatedValue() . "Coluna == ".$cell->getColumn()." tipo de desconto == ". $tipo_desconto_energia ."<br>";
           $valor = $cell->getCalculatedValue();
           if(($valor === '>') || ($valor === '<'))
              $array_tarifario_gn['I'] = $valor;
           else if($tipo_desconto_energia == '%') 
              $array_tarifario_gn['I'] =  ($valor === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.00%'));
           else 
              $array_tarifario_gn['I'] =  ($valor === '' ? null :  PHPExcel_Style_NumberFormat::toFormattedString($valor, '@') .'€');
           // echo "Valor I == ".$cell->getColumn()."<br>";
            
         } else if('J' == $cell->getColumn()){
             //echo " J == ".$cell->getCalculatedValue() . "  Coluna == ".$cell->getColumn()."<br>";
            $valor = $cell->getCalculatedValue();
            if($cell->getCalculatedValue() == '-')
              $array_tarifario_gn['J'] =  $valor;
            else
              $array_tarifario_gn['J'] = ($valor === '' ? '-' : PHPExcel_Style_NumberFormat::toFormattedString($valor, '0.0000'));
     
         } 
       }
         return 0;
    }

    
    $sFileName = $_FILES['ficheiro']['name'];
    $sFileType = $_FILES['ficheiro']['type'];
    $sFileSize = bytesToSize1024($_FILES['ficheiro']['size'], 1);
     
    //echo "Filename == ".$sFileName."<br>";
    /*<-------MEDIR TEMPO------->*/
    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
   
    include("PHPExcel.php");
    $time_start = microtime_float();
    $objPHPExcel = new PHPExcel();  
    $objReader = new PHPExcel_Reader_Excel2007();
    $objReader->setReadDataOnly(true);
    //$objPHPExcel = $objReader->load( dirname(__FILE__) . '/ficheiros/Base_de_dados_Configurador_Ofertas2013vteste.xlsx' );
    $objPHPExcel = $objReader->load($_FILES['ficheiro']["tmp_name"]);
    $objWorksheet = $objPHPExcel->getActiveSheet();
    $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
    $relatorio_html = "";
    $relatorio_html .= "<div align='left'><h5>Nome do Ficheiro: ".$_FILES['ficheiro']["name"]." </h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
    
     //$maxCol =$objPHPExcel->getActiveSheet()->getHighestColumn(); 
      //$lastRow = $objPHPExcel->getActiveSheet()->getHighestRow();
    //  echo("<br><br>Numero de linhas == " .$lastRow. "!!! <br>");
      // echo("<br><br>Numero de worksheet == " . $objPHPExcel->getSheetCount() ."!!! <br>"); 
      // echo("Depois == <br>");
      //print_r($objPHPExcel->getSheetNames());
      //$objReader->setSheetIndex(0);
      //echo("Linha iterador == ".$rowIterator."<br>");
      $nomes = array();
      $nomes = $objPHPExcel->getSheetNames();
      $dim = $objPHPExcel->getSheetCount();
          
    /**<----------------Percorre as worksheet---------------->**/
    for($i = $dim-1 ; $i >= 0 ; $i--)
    {   
         
          /*<----------Backup Insert---------->*/
          $ofertas =  array();
          $condicao_oferta = array();
          $restricao_oferta = array();
          $servico_estruturado = array();
          $log_operacao = array();
          /*<---------------------------------->*/
          
          $array_data = array('B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','H'=>'','I'=>'','J'=>'','K'=>'','L'=>'','M'=>'','N'=>'','O'=>'','P'=>'','Q'=>'','R'=>'','S'=>'','T'=>'','U'=>'','V'=>'','W'=>'','X'=>'','Y'=>'','Z'=>'','AA'=>'', 'AB'=>'','AC'=>'','AD'=>'','AE'=>'','AF'=>'','AG'=>'','AH'=>'','AI'=>'','AJ'=>'','AK'=>'','AL'=>'','AM'=>'','AN'=>'','AO'=>'','AP'=>'','AQ'=>'','AR'=>'','AS'=>'','AT'=>'','AU'=>'','AV'=>'','AW'=>'','AX'=>'','AY'=>'','AZ'=>'','BA'=>'','BB'=>'','BC'=>'','BD'=>'','BE' => '');            
            
          $array_tarifario_e = array('B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','I'=>'','J'=>'','K'=>'','L'=>'','N'=>'','O'=>'','P'=>'','Q'=>'','R'=>'');
          $array_tarifario_e_desconto = array('B'=>'','C'=>'','D'=>'');
          $caracteristicas_electricidade =  array('Data Inicio'=>'','Nome Tarifario'=>'','ID Tarifario'=>'','Ultimo ID Simples'=>'','Ultimo ID BI'=>'','Ultimo ID TRI'=>'');
          $data_inicio_e = array();
          $nome_tarifario_e = array();
          $id_tarifa_e = array();

          /*$ultimo_id_simples = array();
          $ultimo_id_bi = array();
          $ultimo_id_tri = array();*/
          $correcto_e = array('Simples' => 0 ,'BI' => 0,'TRI' => 0);
          $observcao_e = array('Observacao Simples'=>'','Observacao BI'=>'','Observacao TRI'=>'');
            
          $array_tarifario_gn = array('B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','H'=>'','I'=>'','J'=>'','K'=>'','L'=>'','M'=>'','N'=>'','O'=>'');
          $caracteristicas_gas = array('Data Inicio'=>'','ID Gas'=>'','Observacao'=>'null');
            
          //<--GAS--> 0->Nome Tarifario 1->Empresas Distribuidoras 2->ID Tarifario
          $empresas_distribuidoras = array();
          $empresas_distribuidoras[0] = array();
          $empresas_distribuidoras[1] = array();
          $empresas_distribuidoras[2] = array();
          $empresas_distribuidoras[3] = array();
          $empresas_distribuidoras[4] = array();
          $empresas_distribuidoras[5] = array();
                  
          //<---->
          $output = array();
         
          $contador_gas = 0;
          $flag_gas = 0;
          $tmp_nome_escalao = null;
          $tipo_desconto_simples = 0;
          $tipo_desconto_bi = 0;
          $tipo_desconto_tri = 0;
          $tipo_desconto_ttf = 0;
          $tipo_desconto_energia = 0;
          $flag_empresas = 1;
                
        
           $rowIterator = $objPHPExcel->setActiveSheetIndex($i)->getRowIterator();
           // echo("WorkSheet name == ". $nomes[$i] . "<br>");     
           //echo "TESTE == ". $objPHPExcel->getActiveSheet()->getStyle($column.$row)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT )."<br>";
           //<----TRANSFORMA COLUNA em NUMERO -> columnIndexFromString('A')
         
           /*<----------ELECTRICIDADE-------->*/
           if(($nomes[$i][0] == 'e') || ($nomes[$i][0] == 'E'))
           {
                //Obseracoes da tarifa
                $observcao_e['Observacao Simples'] = ($objPHPExcel->setActiveSheetIndex($i)->getCell('B21') == '' ? '-' : $objPHPExcel->setActiveSheetIndex($i)->getCell('B21'));
                $observcao_e['Observacao BI'] = ($objPHPExcel->setActiveSheetIndex($i)->getCell('I21') == '' ? '-' : $objPHPExcel->setActiveSheetIndex($i)->getCell('I21'));
                $observcao_e['Observacao TRI'] = ($objPHPExcel->setActiveSheetIndex($i)->getCell('R21') == '' ? '-' : $objPHPExcel->setActiveSheetIndex($i)->getCell('R21')); 
                $tipo_desconto_simples = ($objPHPExcel->setActiveSheetIndex($i)->getCell('E7') == '' ? '%' : $objPHPExcel->setActiveSheetIndex($i)->getCell('E7')); 
                $tipo_desconto_bi = ($objPHPExcel->setActiveSheetIndex($i)->getCell('M7') == '' ? '%' : $objPHPExcel->setActiveSheetIndex($i)->getCell('M7')); 
                $tipo_desconto_tri = ($objPHPExcel->setActiveSheetIndex($i)->getCell('W7') == '' ? '%' : $objPHPExcel->setActiveSheetIndex($i)->getCell('W7'));

              /* echo "desconto simples == ".$tipo_desconto_simples." e o valor == ".$objPHPExcel->setActiveSheetIndex($i)->getCell('E7')." <br>";
                echo "desconto bi == ".$tipo_desconto_bi." o valor == ".$objPHPExcel->setActiveSheetIndex($i)->getCell('M7')."<br>";
                echo "desconto tri == ".$tipo_desconto_tri." o valor == ".$objPHPExcel->setActiveSheetIndex($i)->getCell('W7')."<br>";*/

                /*<--------------Descobrir ultimo id inserido SIMPLES------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_SIMPLES FROM TARIFA_SIMPLES ORDER BY IDTARIFA_SIMPLES DESC LIMIT 1 ")){
                  $stmt->execute(); 
                	$stmt->store_result();
            			$stmt->bind_result($ultimo_id_simples_e); 
            			$stmt->fetch();
                    //$stmt->close();
                }
                $ultimo_id_simples_e++;
                $caracteristicas_electricidade['Ultimo ID Simples'] = $ultimo_id_simples_e;
                /*<--------------Descobrir ultimo id inserido BI------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_BI FROM TARIFA_BI ORDER BY IDTARIFA_BI DESC LIMIT 1 ")){
                  $stmt->execute(); 
                	$stmt->store_result();
            			$stmt->bind_result($ultimo_id_bi_e); 
            			$stmt->fetch();
                    //$stmt->close();
                }
                $ultimo_id_bi_e++;
                $caracteristicas_electricidade['Ultimo ID BI'] = $ultimo_id_bi_e;
                /*<--------------Descobrir ultimo id inserido TRI------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_TRI FROM TARIFA_TRI ORDER BY IDTARIFA_TRI DESC LIMIT 1 ")){
                  $stmt->execute(); 
                	$stmt->store_result();
            			$stmt->bind_result($ultimo_id_tri_e); 
            			$stmt->fetch();
                    //$stmt->close();
                }
                $ultimo_id_tri_e++;
                $caracteristicas_electricidade['Ultimo ID TRI'] = $ultimo_id_tri_e;
          }
           
           //percorre as linhas
           foreach($rowIterator as $row)
           {              
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(true); // percorre so as celulas definidas
              /*  if($nomes[$i] === 'gn_TOTAL')
                  echo "Numero linha == ".$row->getRowIndex()." nome == ".$nomes[$i]."<br>";*/
                 
                
                /*<---------------Optimizacao salta linhas vazias------------------>*/
                if((52 < $row->getRowIndex()) && ($nomes[$i][0] === 'g' || $nomes[$i][0] === 'G'))  continue;
                if((21 < $row->getRowIndex()) && ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E'))  continue;
                if((1 == $row->getRowIndex())  && ($nomes[$i][0] === 'b' || $nomes[$i][0] === 'B')) continue;
                else if((2 == $row->getRowIndex()) && ($nomes[$i][0] === 'b' || $nomes[$i][0] === 'B'))  continue;
                else if((3 == $row->getRowIndex()) && ($nomes[$i][0] === 'b' || $nomes[$i][0] === 'B')) continue;
                else if((4 == $row->getRowIndex()) && (($nomes[$i][0] === 'b' || $nomes[$i][0] === 'B') || ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E')))  continue;
                else if((5 == $row->getRowIndex()) && ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E'))  continue;
                else if((6 == $row->getRowIndex()) && ((($nomes[$i][0] == 'g') || ($nomes[$i][0] == 'G')) || ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E')))  continue;
                else if((7 == $row->getRowIndex()) && ((($nomes[$i][0] == 'g') || ($nomes[$i][0] == 'G')) || ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E')))  continue;
                else if((8 == $row->getRowIndex()) && ($nomes[$i][0] === 'g' || $nomes[$i][0] === 'G'))  continue; 
                /**<--------------------------------------------------------------->**/

                /************************************************INSERCAO DE GAS E EMPRESAS DISTRIBUIDORAS******************************************/
                if(($row->getRowIndex() == 9) && (($nomes[$i][0] == 'g') || ($nomes[$i][0] == 'G'))) {
                    $tipo_desconto_ttf = ($objPHPExcel->setActiveSheetIndex($i)->getCell('F8') == '' ? '%' : $objPHPExcel->setActiveSheetIndex($i)->getCell('F8'));
                    $tipo_desconto_energia = ($objPHPExcel->setActiveSheetIndex($i)->getCell('I8') == '' ? '%' : $objPHPExcel->setActiveSheetIndex($i)->getCell('I8'));
                  
                   /* echo "desconto ttf == ".$tipo_desconto_ttf ."<br>";
                    echo "desconto energia == ".$tipo_desconto_energia."<br>";*/

                    $flag_gas = 1;
                    if($flag_gas == 1)
                    {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO GAS (ID,NOME,DATA,OBS) VALUES (NULL,?,'0000-00-00',NULL)")) 
                        {                       
                            $insert_stmt->bind_param('s',$nomes[$i]);
                            $ok=$insert_stmt->execute();        
                            $caracteristicas_gas['ID Gas'] = $mysqli->insert_id;
                            if(!$ok)
                            { 
                                $flag_gas = -1;
                                echo "Insucesso GAS == ".$mysqli->error."!!!<br>"; 
                            }
                            else
                                $flag_gas = 1;
                            $insert_stmt->close();  
                        }
                        else
                            $flag_gas = -1;
                        
                        if($flag_gas == -1)
                            $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o GÁS da Worksheet [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div> ";
                            //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o GÁS da Worksheet [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div> ";
                        else
                           $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o GÁS da Worksheet [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
                            //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o GÁS da Worksheet [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                
                        //query -> INSERIR EMPRESAS DISTRIBUIDORAS
                        if($insert_stmt = $mysqli->prepare("INSERT INTO EMPRESAS_DISTRIBUIDORAS (NOME_TARIFARIO,GAS_IDGAS,NOME_EMPRESA,ESTRUTURA_TARIFARIO,DATA,OBS) VALUES (?,?,?,?,?,?)"))
                        {  
                                $flag_empresas = 0;
                                $insert_stmt->bind_param('sdssss',$nome_tar,$gas_id,$nome_emp,$estrut_tar,$data_inicio_g,$observacao_g); 
                                for($j=0 ; $j < count($empresas_distribuidoras[1]) ; $j++)
                                {
                                     if($stmt = $mysqli->prepare("SELECT GAS_IDGAS FROM EMPRESAS_DISTRIBUIDORAS WHERE NOME_EMPRESA= ? AND ESTRUTURA_TARIFARIO = ? AND DATA = ?")) { 
                
                                        $stmt->bind_param('sss',$empresas_distribuidoras[2][$j],$empresas_distribuidoras[3][$j],$empresas_distribuidoras[0][$j]); 
                                        $stmt->execute(); 
                                        $stmt->store_result();
                                        $stmt->bind_result($id_gas); 
                                        $stmt->fetch();
                                        if($stmt->num_rows == 0)
                                        {    
                                          $nome_tar =  $empresas_distribuidoras[1][$j];
                                          $gas_id = $caracteristicas_gas['ID Gas'];
                                          $nome_emp = $empresas_distribuidoras[2][$j];
                                          $estrut_tar = $empresas_distribuidoras[3][$j];
                                          $data_inicio_g = $empresas_distribuidoras[0][$j];
                                          $observacao_g = $empresas_distribuidoras[4][$j];
                                          if($nome_tar == '-' && $estrut_tar == '-') continue;
                                          $ok = $insert_stmt->execute();
                                			      if(!$ok)
                                            {  
                                               //echo "Insucesso EMPRESAS_DISTRIBUIDORAS == ".$mysqli->error."!!!<br>"; 
                                               $empresas_distribuidoras[5][$j] = -1;
                                               $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o [".trim($empresas_distribuidoras[1][$j])."] da Empresa Distribuidora [".trim($empresas_distribuidoras[2][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                       
                                            }
                                            else
                                            {
                                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o [".trim($empresas_distribuidoras[1][$j])."] da Empresa Distribuidora [".trim($empresas_distribuidoras[2][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                                $empresas_distribuidoras[5][$j] = 1;
                                            }
                                        }
                                        else
                                           $relatorio_html .= "<div align='left'><h5>J&aacute; existe [".$empresas_distribuidoras[1][$j]."][".$empresas_distribuidoras[2][$j]."][".$empresas_distribuidoras[0][$j]."][<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div> "; 

                                    }
                                    $stmt->close();
                                }
                                $insert_stmt->close();
                        }
                        else
                        {
                            $empresas_distribuidoras[5][$j] = -1;
                            $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o [".trim($empresas_distribuidoras[1][$j])."] da Empresa Distribuidora [".trim($empresas_distribuidoras[2][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                        }
                    }
                }
                
                              
                //<-----------percorre as celulas (uma linha)----------->
                $flag_celulas = 0;
                foreach ($cellIterator as $cell)
                {
                    //restricao de colunas onde nao acede     
                    if('A' == $cell->getColumn()) continue;
                    if((stripos($cell->getCoordinate(),'H') !== false)  && ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E')) continue;
                    if((stripos($cell->getCoordinate(),'Q') !== false)  && ($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E')) continue;
                    //if((stripos($cell->getCoordinate(),'J') !== false)  && ($nome[$i][2] == 'e')) continue;
                    $flag_celulas = 1;
                    //echo "LINHA == ".$cell->getCoordinate()."  <br> ";
                    //echo "celulas visitadas == ".$cell->getCoordinate()." valor == ".$cell->getCalculatedValue()."<br>";
                    if($nomes[$i][0] === 'b' || $nomes[$i][0] === 'B')
                    {
                        if(getdadosofertas($cell,$array_data,$row->getRowIndex()) == -1)
                            break;
                    }
                    else if($nomes[$i][0] === 'e' || $nomes[$i][0] === 'E')
                    {
                        if((getdadose($cell,$array_tarifario_e,$cell->getRow(),$nomes[$i],$caracteristicas_electricidade,$relatorio_html)) == -1)
                            break;
                    }
                    else if($nomes[$i][0] === 'g' || $nomes[$i][0] === 'G')
                    {
                        if(getdadosgn($cell,$array_tarifario_gn,$cell->getRow(),$nomes[$i],$caracteristicas_gas,$empresas_distribuidoras) == 1) 
                            break;
                    }
                }

                /*<------------------------------------------------------>*/
                
                if(($nomes[$i][0] === 'b' || $nomes[$i][0] === 'B') && $flag_celulas == 1)
                {
                    if(($array_data['B'] !== '-' || $array_data['B'] !== '') && ($array_data['C'] !== '-' || $array_data['C'] !== '') && ($array_data['D'] !== '-' || $array_data['D'] !== '') && ($array_data['E'] !== '-' || $array_data['E'] !== '') && ($array_data['F'] !== '-' || $array_data['F'] !== '') && ($array_data['G'] !== '-' || $array_data['G'] !== '') && ($array_data['H'] !== '-' || $array_data['H'] !== '') && ($array_data['I'] !== '-' || $array_data['I'] !== '') && ($array_data['J'] !== '-' || $array_data['J'] !== ''))
                    {
                        $flag_oferta = 1;
                        $observacao = $array_data['BE'];
                        array_push($ofertas,array(0=>$array_data['B'], 1=>$array_data['C'], 2=>$array_data['D'],3=>$array_data['E'],4=>$array_data['F'],5=>$array_data['G'],6=>$array_data['H'],7=>$array_data['I'],8=>$array_data['J'],9=>$array_data['P'],10=>$array_data['U'],11=>$array_data['V'],12=>$array_data['W'],13=>$array_data['X'],14=>$array_data['AC'],15=>$array_data['AD'],16=>$array_data['AE'],17=>$array_data['AF'],18=>$array_data['AR'],19=>$array_data['AT'],20=>$array_data['AV'],21=>$array_data['AX'],22=>$array_data['AY'],23=>$array_data['AZ'],24=>$array_data['BA'],25=>$array_data['BB'],26=>$observacao,27=>$array_data['AP'],28=>$array_data['AO'],29=>$array_data['BC'],30=>$array_data['BD'],31=>0));
        
                    }
                    
                           
                    if($flag_oferta == 1)
                    {
                        /**INSERIR CONDICAO DA OFERTA**/
                        for($tmp = 'K' ; $tmp < 'P' ; $tmp++)
                        {
                            if($tmp === 'L') continue;
                            if($tmp === 'N') continue;
                            $aux=$tmp;
                            $valor_condicao = ($tmp === 'O' ? '-' : $array_data[++$aux]);
                            if(($array_data[$tmp] !== '-') || ($valor_condicao !== '-'))
                            {
                                $flag_condicao = 0;
                                array_push($condicao_oferta,array( 0=>$array_data['B'], 1=>$array_data[$tmp], 2=>$valor_condicao));
                            }
                        }
                                
                        $flag_restricao = 0;
                        /*INSERIR RESTRICAO ELECTRICIDADE*/
                        for($tmp = 'Q' ; $tmp < 'T' ; $tmp++)
                        {
                            if($tmp == 'R') continue;
                            if($tmp == 'T') continue;
                                    
                            $aux=$tmp;
                            $valor_restricao = $array_data[++$aux];
                                    
                            if(($array_data[$tmp] !== '-') || ($valor_restricao !== '-'))
                            {                 
                               array_push($restricao_oferta,array( 0=>$array_data['B'], 1=>$array_data[$tmp], 2=>$valor_restricao, 3=>2));
                            }
                        }
                                
                        $flag_restricao = 0;
                        /*INSERIR RESTRICAO GAS*/
                        if(($array_data['Y'] !== '-') || ($array_data['Z'] !== '-'))
                        {
                           array_push($restricao_oferta,array( 0=>$array_data['B'], 1=>$array_data['Y'], 2=>$array_data['Z'], 3=>1));
                        }
                                
                        if(($array_data['AA'] !== '-') || ($array_data['AB'] !== '-'))
                        {
                           array_push($restricao_oferta,array( 0=>$array_data['B'], 1=>$array_data['AA'], 2=>$array_data['AB'], 3=>1));
                        }
                                
                        /*INSERIR SERVICO ESTRUTURADO*/
                        if(($array_data['AO'] !== '-') || ($array_data['AP'] !== '-') || ($array_data['AG'] !== '-') || ($array_data['AH'] !== '-') || ($array_data['AI'] !== '-')  || ($array_data['AJ'] !== '-'))
                        {
                            $flag_serv = 0;
                            if(($array_data['AG'] !== '-') || ($array_data['AH'] !== '-') || ($array_data['AI'] !== '-') || ($array_data['AJ'] !== '-'))
                            {                                
                                array_push($servico_estruturado,array( 0=>$array_data['AG'], 1=>$array_data['AH'], 2=>$array_data['AI'], 3=>$array_data['AJ'], 4=>$array_data['B']));                               
                            }
                                    
                            if(($array_data['AK'] !== '-') || ($array_data['AN'] !== '-') || ($array_data['AL'] !== '-') || ($array_data['AM'] !== '-'))
                            {                                
                                array_push($servico_estruturado,array( 0=>$array_data['AK'], 1=>$array_data['AL'], 2=>$array_data['AM'], 3=>$array_data['AN'], 4=>$array_data['B']));                              
                            }
                        }     
                        /*INSERIR LOG*/
                        $descricao = "Adicionada uma nova oferta [".$array_data['C']."]";
                        //$date = date("y/m/d H:i:s");
                        date_default_timezone_set ("Europe/Lisbon");
                        $date =  date('y/m/d H:i:s', time());
                        array_push($log_operacao,array(0=>$descricao,1=>$_SESSION['nome'],2=>$date));

                    } // fecha flag == 1 oferta
   
                } // fecha insercao de nova oferta
                
                //Inserir os escaloes 
                if((($row->getRowIndex()) > 8)   && ($flag_celulas == 1) && (($nomes[$i][0] == 'g') || ($nomes[$i][0] == 'G')))
                {
                    if(($flag_gas == 1))
                    {
                        if($array_tarifario_gn['B'] != $tmp_nome_escalao)
                        {
                            $tmp_nome_escalao = $array_tarifario_gn['B'];  
                            for($k = 0 ; $k < count($empresas_distribuidoras[1]) ; $k++)
                            {
                                $valor = str_replace(' ', '', $empresas_distribuidoras[2][$k]);
                                $empresas_distribuidora = str_replace(' ', '', $tmp_nome_escalao);
                                //echo mb_strtoupper($valor, 'UTF-8')." == ".mb_strtoupper($empresas_distribuidora,'UTF-8')."<br>";
                                //echo "TYPE 1 == ".gettype(mb_strtoupper($empresas_distribuidoras[1][$k], 'UTF-8')). "TYPE 2 == ".gettype(mb_strtoupper($tmp_nome_escalao,'UTF-8'))."<br>";
                                if(mb_strtoupper($valor, 'UTF-8') == mb_strtoupper($empresas_distribuidora ,'UTF-8'))
                                {
                                    //echo "<br>ENTRA no IF<br>";
                                    if($empresas_distribuidoras[5][$k] == 1)
                                    {
                                        $flag_empresas = 1;
                                        break;
                                    }
                                    else
                                    {
                                        $flag_empresas = -1;
                                        break;
                                    }
                                        
                                }

                            }
                            
                        }

                        if($flag_empresas == 1)
                        {                            
                            // echo "Entra aqui gas == ".$flag_gas." && empresas == ".$flag_empresas." linha == ".$row->getRowIndex()."<br>";     
                            //echo "Inserir escalao <br>";
                           // echo "C == ".$array_tarifario_gn['C'] ." D == ".$array_tarifario_gn['D'] ." G == ".$array_tarifario_gn['G'] ." J == ".$array_tarifario_gn['J'] ."<br>";          
                            if(($array_tarifario_gn['C'] !== '-' &&  $array_tarifario_gn['D'] !== '-') && ( $array_tarifario_gn['G'] != '-' && $array_tarifario_gn['J'] != '-'))
                            {
                                //echo "Entra com escalao == " . $array_tarifario_gn['C'] ."<br>";
                               //$caracteristicas_gas['ID Gas'] = 30;
                                //echo "Inserir escalao ID_GAS = ".$caracteristicas_gas['ID Gas']." NOME_EMPRESA = ".$tmp_nome_escalao." ESCALAO_INICIO = ".$array_tarifario_gn['C']." ESCALAO_FIM = ".$array_tarifario_gn['D']." TTF_tvcf = ".$array_tarifario_gn['E']." Desconto_ttf = ".$array_tarifario_gn['F']." ttf_edpC = ".$array_tarifario_gn['G']." Energia_tvcf = ".$array_tarifario_gn['H'] ." Energia_Desconto = ".$array_tarifario_gn['I'] ."  Energia_edpC = ".$array_tarifario_gn['J'] ."<br>";
                               // echo "Linha == ".$cell->getRow()." Worksheet == ".$nomes[$i]."<br>";
                                //executar query
                                if($insert_stmt = $mysqli->prepare("INSERT INTO ESCALAO (IDESCALAO,EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS,EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA,ESCALAO_INICIO,ESCALAO_FIM,TERMO_TARIFARIO_FIXO_TVCF,ENERGIA_TVCF,DESCONTO_TTF,DESCONTO_ENERGIA,TERMO_TARIFARIO_FIXO_edpC,ENERGIA_edpC) VALUES (NULL,?,?,?,?,?,?,?,?,?,?)"))
                                {   
                                    $insert_stmt->bind_param('dsddddssdd',$caracteristicas_gas['ID Gas'],$tmp_nome_escalao,$array_tarifario_gn['C'],$array_tarifario_gn['D'],$array_tarifario_gn['E'],$array_tarifario_gn['H'],$array_tarifario_gn['F'],$array_tarifario_gn['I'],$array_tarifario_gn['G'],$array_tarifario_gn['J']);
                                    $ok = $insert_stmt->execute();
                                    $id_escalao=$mysqli->insert_id;
                                    
                                    if(!$ok)
                                    { 
                                        $flag_escalao = -1;
                                        echo "Insucesso ESCALAO == ".$mysqli->error."!!!<br>"; 
                                    }
                                    else
                                        $flag_escalao = 0;
                                    
                                    $insert_stmt->close(); 
                                }
                                else
                                    $flag_escalao = -1;
                                
                                if($flag_escalao == -1)
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o do ESCALAO [".$array_tarifario_gn['C']."][".$array_tarifario_gn['D']."] [".$tmp_nome_escalao."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o do ESCALAO [".$array_tarifario_gn['C']."][".$array_tarifario_gn['D']."] [".$tmp_nome_escalao."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o do ESCALAO [".$array_tarifario_gn['C']."][".$array_tarifario_gn['D']."] [".$tmp_nome_escalao."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                      
                            }
                        }
                    }
                }
                
            } // fecha ciclo para percorrer linhas da worksheet
            
            //Inserir nova tarifa de electricidade
            if(($nomes[$i][0] == 'e') || ($nomes[$i][0] == 'E'))
            {               
                    //<-------------- INSERCAO DE OBSERVACAO DE TARIFAS--------------->
                    if($observcao_e['Observacao Simples'] != '-')
                    {
                                
                                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_SIMPLES (IDTARIFA_SIMPLES,POTENCIA,PRECO_POTENCIA_TVCF,PRECO_ENERGIA_TVCF,PRECO_POTENCIA_edpC,PRECO_ENERGIA_edpC,DESCONTO,TIPO_DESCONTO,FORMATO_DESCONTO,DATA,OBS) VALUES  (?,99,-1,-1,-1,-1,-1,NULL,NULL,'0000-00-00',?)")) 
                                {
                                    $insert_stmt->bind_param('ds',$ultimo_id_simples_e,$observcao_e['Observacao Simples']);
                                    $ok=$insert_stmt->execute();
                                    if(!$ok)
                                    { 
                                        echo "Insucesso observacao simples == ".$mysqli->error."!!!<br>"; 
                                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio Tarifa SIMPLES da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                        //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa SIMPLES da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                        //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa SIMPLES da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    }
                                    $insert_stmt->close();      
                                                                
                                }
                    }
                           
                    if($observcao_e['Observacao BI'] != '-')
                    {
                                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_BI (IDTARIFA_BI,POTENCIA,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,PRECO_POTENCIA_TVCF,DESCONTO,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,PRECO_POTENCIA_edpC,DATA,OBS) VALUES (?,99,-1,-1,-1,-1,-1,-1,-1,NULL,?)")) 
                                {
                                    $insert_stmt->bind_param('ds',$ultimo_id_bi_e,$observcao_e['Observacao BI']);
                                    $ok=$insert_stmt->execute();
                                    if(!$ok)
                                    { 
                                        echo "Insucesso observacao BI == ".$mysqli->error."!!!<br>"; 
                                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio Tarifa BI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                        //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa BI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                        //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa BI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    }
                                }
                    }
                                 
                    if($observcao_e['Observacao TRI'] != '-')
                    {
                                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_TRI(IDTARIFA_TRI,POTENCIA,PRECO_POTENCIA_TVCF,ENERGIA_NORMAL_TVCF,ENERGIA_ECONOMICO_TVCF,ENERGIA_SUPER_ECONOMICO_TVCF,DESCONTO,PRECO_POTENCIA_edpC,ENERGIA_NORMAL_edpC,ENERGIA_ECONOMICO_edpC,ENERGIA_SUPER_ECONOMICO_edpC,DATA,OBS) VALUES (?,99,-1,-1,-1,-1,-1,-1,-1,-1,-1,NULL,?)")) 
                                {
                                    $insert_stmt->bind_param('ds',$ultimo_id_tri_e,$observcao_e['Observacao TRI']);
                                    $ok=$insert_stmt->execute();  
                                    if(!$ok)
                                    { 
                                        echo "Insucesso observacao TRi == ".$mysqli->error."!!!<br>"; 
                                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio Tarifa TRI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                        //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa TRI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                        //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa TRI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    }
                                    $insert_stmt->close();  
                                }
                    }
                    
                    if($correcto_e['Simples'] != 1)
                        $caracteristicas_electricidade['Ultimo ID Simples'] = null;
                    if($correcto_e['BI'] != 1)
                        $caracteristicas_electricidade['Ultimo ID BI'] = null;
                    if($correcto_e['TRI'] != 1)
                        $caracteristicas_electricidade['Ultimo ID TRI'] = null;

                    $flag_electricidade = 0;
                    if($insert_stmt = $mysqli->prepare("INSERT INTO ELECTRICIDADE(NOME,ID_TARIFARIO,ID_TARIFA_SIMPLES,ID_TARIFA_BI,ID_TARIFA_TRI,DATA) VALUES (?,?,?,?,?,?)")) 
                    {  
                            $insert_stmt->bind_param('ssddds',$nome_aux,$id_aux,$caracteristicas_electricidade['Ultimo ID Simples'],$caracteristicas_electricidade['Ultimo ID BI'],$caracteristicas_electricidade['Ultimo ID TRI'],$data_aux);
                            //echo "Worksheet == ".$nomes[$i]." Numero de ET == ".count($nome_tarifario_e)."<br>";
                            for($p = 0 ; $p < count($nome_tarifario_e) ; $p++)
                            {
                              if($nome_tarifario_e[$p] != '-' && $id_tarifa_e[$p] != '-')
                              {
                                  if($stmt = $mysqli->prepare("SELECT NOME,DATA FROM ELECTRICIDADE WHERE NOME= ? AND ID_TARIFARIO = ? AND DATA = ?")) 
                                  { 
                
                                        $stmt->bind_param('sss',$nome_tarifario_e[$p],$id_tarifa_e[$p],$data_inicio_e[$p]); 
                                        $stmt->execute(); 
                                        $stmt->store_result();
                                        $stmt->bind_result($nome_elec,$data_elect); 
                                        $stmt->fetch();
                                        if($stmt->num_rows == 0)
                                        {                                            
                                            $nome_aux = $nome_tarifario_e[$p];
                                            $id_aux = $id_tarifa_e[$p];
                                            $data_aux = $data_inicio_e[$p];
                                            
                                            $ok=$insert_stmt->execute();
                                            if(!$ok)
                                            { 
                                              $flag_electricidade = -1;
                                              echo "Insucesso ELETRICIDADE == ".$mysqli->error."!!!<br>"; 
                                            }
                                            else
                                            $flag_electricidade = 1;

                                            if( $flag_electricidade == -1 )
                                              $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$nome_tarifario_e[$p]."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                            else
                                              $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$nome_tarifario_e[$p]."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                       }
                                       else
                                          $relatorio_html .= "<div align='left'><h5>Tarifario de Eletricidade [".$nome_elec."][".$data_elect."] da  Worksheet  [".$nomes[$i]."] j&aacute; existe [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                      $stmt->close();
                                  }

                              }
                            }
                            $insert_stmt->close();
                    }
                    else
                      $flag_electricidade = -1;
                    
            }
    }    

    $flag_oferta = -1;
    /** <--------------------Ofertas-----------------> **/
    if(count($ofertas) > 0)
    if($insert_stmt = $mysqli->prepare("INSERT INTO OFERTAS(IDOFERTA,NOME,ESTADO,DATA_INICIO,DATA_FIM,RECLAMACAO_DIVIDA,DURACAO,PENALIZACAO,VALOR,COMPONENTE_BASICA,COMPONENTE_ESTRUTURADA_E,ID_ESTRUTURADA_E,ESTRUTURA_TARIFARIA_E,ID_ESTRUTURA_TARIFARIA_E,COMPONENTE_ESTRUTURADA_GN,ID_ESTRUTURADA_GN,ESTRUTURA_TARIFARIA_GN,ID_ESTRUTURA_TARIFARIA_GN,DEBITO_DIRETO,FORMA_PAGAMENTO,CONTA_CERTA,CORRESPONDENCIA_ELETRONICA,ENTIDADE_PARCEIRA,VALOR_EP,VALOR_BENEFICO_EP,UNIDADE_EP,APLICADO_EP,OBSERVACOES,ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO,ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO,ALTER_E,ALTER_GN) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NULL,?,?,?,?,?,?,?,?,?,?,?,?)")) 
    {  
        $insert_stmt->bind_param('ssssssdsdssssssssssssssssssssss',$array_data['B'],$array_data['C'],$array_data['D'],$array_data['E'],$array_data['F'],$array_data['G'],$array_data['H'],$array_data['I'],$array_data['J'],$array_data['P'],$array_data['U'],$array_data['V'],$array_data['W'],$array_data['X'],$array_data['AC'],$array_data['AD'],$array_data['AE'],$array_data['AF'],$array_data['AR'],$array_data['AT'],$array_data['AV'],$array_data['AX'],$array_data['AY'],$array_data['AZ'],$array_data['BA'],$array_data['BB'],$observacao,$array_data['AP'],$array_data['AO'],$array_data['BC'],$array_data['BD']);
        for($i=0 ; $i < count($ofertas) ; $i++)
        {
            if($stmt = $mysqli->prepare("SELECT IDOFERTA FROM OFERTAS WHERE IDOFERTA = ? LIMIT 1")) 
            {
                $stmt->bind_param('s',$ofertas[$i][0]); 
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->fetch();
                $num = $stmt->num_rows;
                $stmt->close();
                if($num > 0) 
                {
                    $relatorio_html .= "<div align='left'><h5> A Oferta [".$ofertas[$i][1]."] j&aacute; existe [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    continue;	
                }
                
            }
            
            $array_data['B'] = $ofertas[$i][0];
            $array_data['C'] = $ofertas[$i][1];
            $array_data['D'] = $ofertas[$i][2];
            $array_data['E'] = $ofertas[$i][3];
            $array_data['F'] = $ofertas[$i][4];
            $array_data['G'] = $ofertas[$i][5];
            $array_data['H'] = $ofertas[$i][6];
            $array_data['I'] = $ofertas[$i][7];
            $array_data['J'] = $ofertas[$i][8];
            $array_data['P'] = $ofertas[$i][9];
            $array_data['U'] = $ofertas[$i][10];
            $array_data['V'] = $ofertas[$i][11];
            $array_data['W'] = $ofertas[$i][12];
            $array_data['X'] = $ofertas[$i][13];
            $array_data['AC'] = $ofertas[$i][14];
            $array_data['AD'] = $ofertas[$i][15];
            $array_data['AE'] = $ofertas[$i][16];
            $array_data['AF'] = $ofertas[$i][17];
            $array_data['AR'] = $ofertas[$i][18];
            $array_data['AT'] = $ofertas[$i][19];
            $array_data['AV'] = $ofertas[$i][20];
            $array_data['AX'] = $ofertas[$i][21]; 
            $array_data['AY'] = $ofertas[$i][22];
            $array_data['AZ'] = $ofertas[$i][23];
            $array_data['BA'] = $ofertas[$i][24];
            $array_data['BB'] = $ofertas[$i][25];
            $observacao = $ofertas[$i][26];
            $array_data['AP'] = $ofertas[$i][27];
            $array_data['AO'] = $ofertas[$i][28];
            $array_data['BC'] = $ofertas[$i][29];
            $array_data['BD'] = $ofertas[$i][30];
       
            $ok=$insert_stmt->execute();
           
            if(!$ok)
            {
                echo "Erro linha [".$i."] == ".htmlspecialchars($insert_stmt->error)."<br>";
                $ofertas[$i][31] = -1;
                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$ofertas[$i][1]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
            }
            else
            {
               $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$ofertas[$i][1]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
               $ofertas[$i][31] = 0;
            }
       
        }
        $insert_stmt->close();  
       
    }
    else
    {
        $ofertas[$i][31] = -1;
        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
        echo "Erro == ".$mysqli->error."<br>";
    }
        
    /** <-------------------- Condicao Oferta -------------> **/
    if(count($condicao_oferta) > 0)
    if($insert_stmt = $mysqli->prepare("INSERT INTO CONDICAO_OFERTA (IDCONDICAO_OFERTA,Ofertas_IDOFERTA,CONDICAO_OFERTA,VALOR_CONDICAO) VALUES (NULL,?,?,?)"))
    {
        $insert_stmt->bind_param('sss',$id_oferta,$condicao,$valor_condicao);
        for($i = 0 ; $i < count($condicao_oferta) ; $i++)
        {
            for($j = 0 ; $j < count($ofertas) ; $j++)
            {
                if($ofertas[$j][0] == $condicao_oferta[$i][0])
                    if($ofertas[$j][31] == -1)
                    {
                        $flag = -1;
                        break;
                    }
                    else
                    {
                        $flag = 1;
                        break;
                    }
            }
            if($flag == 1)
            {
                $id_oferta = $condicao_oferta[$i][0];
                $condicao = $condicao_oferta[$i][1];
                $valor_condicao = $condicao_oferta[$i][2];
                $ok=$insert_stmt->execute();
                if(!$ok)
                 $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Condi&ccedil;&atilde;o da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
            }
            
        }
        $insert_stmt->close();  
        
    }
    else
        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Condi&ccedil;&atilde;o da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

    /** <-------------------- Restricao -----------------> **/
    if(count($restricao_oferta) > 0)
    if($insert_stmt = $mysqli->prepare("INSERT INTO RESTRICAO_OFERTA(IDRESTRICAO_OFERTA,Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES (NULL,?,?,?,?)"))
    {
        $insert_stmt->bind_param('ssss',$id_oferta,$restricao,$valor_restricao,$restricaoa);
        for($i = 0 ; $i < count($restricao_oferta) ; $i++)
        {
            for($j = 0 ; $j < count($ofertas) ; $j++)
            {
                if($ofertas[$j][0] == $restricao_oferta[$i][0])
                    if($ofertas[$j][31] == -1)
                    {
                        $flag = -1;
                        break;
                    }
                    else
                    {
                        $flag = 1;
                        break;
                    }
            }
            if($flag == 1)
            {
                $id_oferta = $restricao_oferta[$i][0];
                $restricao = $restricao_oferta[$i][1];
                $valor_restricao = $restricao_oferta[$i][2];
                $restricaoa = $restricao_oferta[$i][3];
                $ok=$insert_stmt->execute();    
                if(!$ok)
                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
            }
            
        }    
                                            
        $insert_stmt->close();  
        
    }
    else
        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";


    /** <------------------- Servico Estruturado ---------> **/
    if(count($servico_estruturado) > 0)
    if($insert_stmt = $mysqli->prepare("INSERT INTO SERVICO_ESTRUTURADO (id_servico_estruturado,estrutura_servico,obrigatoriedade,idservicoestruturado,estado,idoferta) VALUES (NULL,?,?,?,?,?)")) 
    {   
        $insert_stmt->bind_param('sssss',$serv_est,$obrig,$id_serv,$estado_se,$id_oferta);
        for($i = 0 ; $i < count($servico_estruturado) ; $i++)
        {
            for($j = 0 ; $j < count($ofertas) ; $j++)
            {
                if($ofertas[$j][0] == $servico_estruturado[$i][4])
                    if($ofertas[$j][31] == -1)
                    {
                        $flag = -1;
                        break;
                    }
                    else
                    {
                        $flag = 1;
                        break;
                    }
            }

            if($flag == 1)
            {
                $serv_est = $servico_estruturado[$i][0];
                $id_serv = $servico_estruturado[$i][1];
                $estado_se = $servico_estruturado[$i][2];
                $obrig = $servico_estruturado[$i][3];
                $id_oferta = $servico_estruturado[$i][4];
                $ok=$insert_stmt->execute();

                if(!$ok)
                {
                    echo "Falhou SE == ".$mysqli->error."<br>"; 
                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                }
            }
        }
        $insert_stmt->close();                        
    }
    else
       $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
 
     
    /** <------------------- LOG ----------------------> **/
    if(count($log_operacao) > 0)
    if($insert_stmt = $mysqli->prepare("INSERT INTO LOG(idlog,descricao,user,data,admin) VALUES (NULL,?,?,?,0)"))
    {
        $insert_stmt->bind_param('sss',$descricao,$user,$date);
        for($i = 0 ; $i < count($log_operacao) ; $i++)
        {
            $descricao = $log_operacao[$i][0];
            $user = $log_operacao[$i][1];
            $date = $log_operacao[$i][2];
            $ok=$insert_stmt->execute(); 
            if(!$ok)
                echo "Insucesso LOG == ".$mysqli->error."!!!<br>"; 
        }
        $insert_stmt->close();  
    }
    
    echo $relatorio_html;
   // if( $relatorio_html !== '' )
    /**<----------- Inserir RELATORIO visivel ao admin no LOG ----------->**/
   /*if($insert_stmt = $mysqli->prepare("INSERT INTO LOG(idlog,descricao,user,data,admin) VALUES (NULL,?,?,?,2)"))
    {
        $date = date("y/m/d");
        $relatorio_encode = base64_encode($relatorio_html);
        $insert_stmt->bind_param('sss',$relatorio_encode,$_SESSION['nome'],$date);
        $ok=$insert_stmt->execute(); 
        if(!$ok)
            echo "Insucesso LOG 2 == ".$mysqli->error."!!!<br>"; 
        $id_oferta_alternativa=$mysqli->insert_id;
        $insert_stmt->close();  
    }*/

    $time_end = microtime_float();
    $time = $time_end - $time_start;
    echo "Demorou == $time segundos\n"; 
    

    /* $target_path = "ficheiros/";
    $target_path = $target_path . basename( $_FILES['ficheiro']['name']); 
    $_FILES['ficheiro']['tmp_name'];  


    $target_path = "ficheiros/";

    $target_path = $target_path . basename( $_FILES['ficheiro']['name']); 

    if(move_uploaded_file($_FILES['ficheiro']['tmp_name'], $target_path)) {
        echo "O ficheiro e ".  basename( $_FILES['ficheiro']['name']). 
        " foi bem sucessido";
    }else{
        echo "Erro no upload. Tente outra vez!";
    }*/

?>
 <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>