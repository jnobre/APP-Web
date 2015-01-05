

<?php
    session_start();
    include('../msql.php');
    include('../mysqlconnect.php');
    
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
                        $array_data[$cell->getColumn()] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');
                   
                    } else if('F' == $cell->getColumn()){
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
                    }

    }
    
    function getdadose($cell,&$array_tarifario_e,$linha,$nome_tarifario,&$caracteristicas_electricidade,&$output)
    {
        
        global $mysqli;
        //echo "TARIFARIO_E celulas visitadas == ".$cell->getCoordinate()." valor == ".$cell->getCalculatedValue()."<br>";
        if($linha  ==  1) {
          
          if('C' == $cell->getColumn()){    
               //$valor = ($cell->getCalculatedValue() === '' ? null :$cell->getCalculatedValue());
               $caracteristicas_electricidade['Data Inicio'] = ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD'));
             }

        }else if($linha == 2){
         
         if('C' == $cell->getColumn()){    
              $caracteristicas_electricidade['Nome Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
            }
         
        }else if($linha == 3){
         
              if('C' == $cell->getColumn()){    
               $caracteristicas_electricidade['ID Tarifario'] = ($cell->getCalculatedValue() === '' ? null : $cell->getCalculatedValue());
             }
             

        }else if($linha > 7){
         
         //echo "TARIFARIO_E celulas visitadas == ".$cell->getColumn()." valor == ".$cell->getCalculatedValue()."<br>";
      
         //Tabelas das tarifas
         if(('B' == $cell->getColumn())){
                 
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : str_replace(",",".",$cell->getCalculatedValue()));
                       
         } else if('C' == $cell->getColumn()){
             
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('D' == $cell->getColumn()){
             
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
         
         } else if('E' == $cell->getColumn()){
             
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0%'));
                  
         } else if('F' == $cell->getColumn()){
             
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('G' == $cell->getColumn()){
             
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
           if(($array_tarifario_e['B']!=null) &&  ($array_tarifario_e['C']!=null) && ($array_tarifario_e['D']!=null))
           {      
                $flag_simples=-1;
                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_SIMPLES (IDTARIFA_SIMPLES,POTENCIA,PRECO_POTENCIA_TVCF,PRECO_ENERGIA_TVCF,PRECO_POTENCIA_edpC,PRECO_ENERGIA_edpC,DESCONTO,TIPO_DESCONTO,FORMATO_DESCONTO,DATA,OBS) VALUES (?,?,?,?,?,?,?,NULL,NULL,?,NULL)"))             
                {
                        //echo "entra aqui<br>";
                        $insert_stmt->bind_param('ddddddss',$caracteristicas_electricidade['Ultimo ID Simples'],$array_tarifario_e['B'],$array_tarifario_e['C'],$array_tarifario_e['D'],$array_tarifario_e['F'],$array_tarifario_e['G'],$array_tarifario_e['E'],$caracteristicas_electricidade['Data Inicio']);
                        $ok=$insert_stmt->execute();
                        $id_tarifa_simples=$mysqli->insert_id;
                		if(!$ok)
                        { 
                            $flag_simples=-1;
                            echo "Insucesso TARIFA SIMPLES == ".$mysqli->error."!!!<br>"; 
                        }
                        else
                        { 
                            $flag_simples=1;
                        }
                        
                        $insert_stmt->close();                  
                }
                else
                    echo("Statement failed: ". $mysqli->error . "<br>");

                if($flag_simples == -1)
                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    //array_push($output, "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                /*else
                    echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                */
           }
         
         } else if('I' == $cell->getColumn()){
             
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : str_replace(",",".",$cell->getCalculatedValue()));
           
         } else if('J' == $cell->getColumn()){
          $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('K' == $cell->getColumn()){
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('L' == $cell->getColumn()){
          
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
            
            //Inserir TARIFA BI          
            if( $array_tarifario_e['I'] != null && $array_tarifario_e['J'] != null && $array_tarifario_e['K'] != null && $array_tarifario_e['L'] != null)
            {
                $flag_tarifa_bi=-1;       
                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_BI (IDTARIFA_BI,POTENCIA,ENERGIA_NORMAL,ENERGIA_ECONOMICO,PRECO_POTENCIA,DATA,OBS) VALUES (?,?,?,?,?,?,NULL)")) 
                {  
                    $insert_stmt->bind_param('ddddds',$caracteristicas_electricidade['Ultimo ID BI'],$array_tarifario_e['I'],$array_tarifario_e['K'],$array_tarifario_e['L'],$array_tarifario_e['J'],$caracteristicas_electricidade['Data Inicio']);
                    $ok=$insert_stmt->execute();
                    $insert_stmt->close();      
                    $id_tarifa_bi=$mysqli->insert_id;
            		if(!$ok)
                    { 
                        $flag_tarifa_bi = -1;
                    }
                    else
                    { 
                        $flag_tarifa_bi = 1;
                    }
                }
                else
                    $flag_tarifa_bi=-1;

                if($flag_tarifa_bi == -1)
                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                        //array_push($output, "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                       // echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
               /* else
                        echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                */
            }

         } else if('N' == $cell->getColumn()){
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : str_replace(",",".",$cell->getCalculatedValue()));
                   
         } else if('O' == $cell->getColumn()){
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('P' == $cell->getColumn()){
          $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('Q' == $cell->getColumn()){
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
                   
         } else if('R' == $cell->getColumn()){
           $array_tarifario_e[$cell->getColumn()] =  ($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000'));
           
           //INSERIR TARIFA TRI   
           if($array_tarifario_e['N'] != null && $array_tarifario_e['O'] != null && $array_tarifario_e['P'] != null && $array_tarifario_e['Q'] != null && $array_tarifario_e['R'] != null)
           {
                $flag_tarifa_tri=-1;
                if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_TRI(IDTARIFA_TRI,POTENCIA,PRECO_POTENCIA,ENERGIA_NORMAL,ENERGIA_ECONOMICO,ENERGIA_SUPER_ECONOMICO,DATA,OBS) VALUES (?,?,?,?,?,?,?,NULL)")) 
                {  
                    $insert_stmt->bind_param('dddddds',$caracteristicas_electricidade['Ultimo ID TRI'],$array_tarifario_e['N'],$array_tarifario_e['O'],$array_tarifario_e['P'],$array_tarifario_e['Q'],$array_tarifario_e['R'],$caracteristicas_electricidade['Data Inicio']);
                    $ok=$insert_stmt->execute();
                    $id_tarifa_simples=$mysqli->insert_id;
                	if(!$ok)
                    {
                        $flag_tarifa_tri = -1;
                        //echo "Insucesso TARIFA TRI == ".$mysqli->error."!!!<br>"; 
                    }
                    else
                    { 
                        $flag_tarifa_tri = 1;
                        //echo "<p align='center'>Sucesso a inserir tarifa TRI.</p>";
                    }        
                    $insert_stmt->close(); 
                }
                else
                    $flag_tarifa_tri = -1;
                    
                if($flag_tarifa_tri == -1)
                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                        //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                        //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
              /*else
                        echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Pot&ecirc;ncia [".$array_tarifario_e['B']."] da Worksheet [".$nome_tarifario."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    */
           }
         }
        }
    }
    
    function getdadosgn($cell,&$array_tarifario_gn,$linha,$nome_plano,$caracteristicas_gas,$empresas_distribuidoras)
    { 
        //echo "TARIFARIO_GN celulas visitadas == ".$cell->getColumn()." valor == ".$cell->getCalculatedValue()."<br>";
        if($linha == 1){
            
             //NOME TARIFARIO
             if('C' == $cell->getColumn()){
             
                $empresas_distribuidoras[0][0] = $cell->getCalculatedValue();
                   
             } else if('D' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][1] = $cell->getCalculatedValue();
                       
             } else if('E' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][2] = $cell->getCalculatedValue();
                       
             } else if('F' == $cell->getColumn()){
                 
              $empresas_distribuidoras[0][3] = $cell->getCalculatedValue();
         
             } else if('G' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][4] = $cell->getCalculatedValue();
        
             } else if('H' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][5] = $cell->getCalculatedValue();
                  
             } else if('I' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][6] = $cell->getCalculatedValue();
                  
             } else if('J' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][7] = $cell->getCalculatedValue();
                  
             } else if('K' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][8] = $cell->getCalculatedValue();
                  
             } else if('L' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][9] = $cell->getCalculatedValue();
                  
             } else if('M' == $cell->getColumn()){
                 
               $empresas_distribuidoras[0][10] = $cell->getCalculatedValue();
                  
             } 
         
        }else if($linha == 2){
            
             //EMPRESA DISTRIBUIDORA
             if('C' == $cell->getColumn()){
              // echo("TARIFARIO_GN C array_data[".$cell->getColumn()."] = ".($cell->getCalculatedValue() === '' ? null : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'General')."<br>");
               $empresas_distribuidoras[1][0] = $cell->getCalculatedValue();
                   
             } else if('D' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][1] = $cell->getCalculatedValue();
                       
             } else if('E' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][2] = $cell->getCalculatedValue();
                       
             } else if('F' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][3] = $cell->getCalculatedValue();
         
             } else if('G' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][4] = $cell->getCalculatedValue();
        
             } else if('H' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][5] = $cell->getCalculatedValue();
                  
             } else if('I' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][6] = $cell->getCalculatedValue();
                  
             } else if('J' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][7] = $cell->getCalculatedValue();
                  
             } else if('K' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][8] = $cell->getCalculatedValue();
                  
             }  else if('L' == $cell->getColumn()){
                 
               $empresas_distribuidoras[1][9] = $cell->getCalculatedValue();
                  
             } else if('M' == $cell->getColumn()){
                 
              $empresas_distribuidoras[1][10] = $cell->getCalculatedValue();
                  
             }
         
        }else if($linha == 3){
            
            //ID TARIFARIO
            if('C' == $cell->getColumn()){
               $empresas_distribuidoras[2][0] = $cell->getCalculatedValue();
                   
             
             } else if('D' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][1] = $cell->getCalculatedValue();
                       
             } else if('E' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][2] = $cell->getCalculatedValue();
                       
             } else if('F' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][3] = $cell->getCalculatedValue();
         
             } else if('G' == $cell->getColumn()){
                 
              $empresas_distribuidoras[2][4] = $cell->getCalculatedValue();
        
             } else if('H' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][5] = $cell->getCalculatedValue();
                  
             } else if('I' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][6] = $cell->getCalculatedValue();
                  
             } else if('J' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][7] = $cell->getCalculatedValue();
                  
             } else if('K' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][8] = $cell->getCalculatedValue();
                  
             }  else if('L' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][9] = $cell->getCalculatedValue();
                  
             } else if('M' == $cell->getColumn()){
                 
               $empresas_distribuidoras[2][10] = $cell->getCalculatedValue();
               
               //echo("<br>");
               /*for($i = 0; $i < 11 ; $i++)
               {
                    echo("Inserir na tabela EMPRESAS DISTRIBUIDORAS: NOME TARIFARIO ==".$empresas_distribuidoras[0][$i]." NOME_EMPRESA == ". $empresas_distribuidoras[1][$i]." ESTRUTRA TARIFARIO == ". $empresas_distribuidoras[2][$i]."<br>");
                    echo("<br>");
               }*/              
               
             }

         } else if( $linha == 4 ) {
             
              if('C' == $cell->getColumn()){    
                $caracteristicas_gas['Data Inicio'] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'YYYY-MM-DD');
             }
                       
         } else if( $linha == 5) {
            
            if('C' == $cell->getColumn()){
                $caracteristicas_gas['Observacao'] = $cell->getCalculatedValue(); 
            }
            else
                $caracteristicas_gas['Observacao'] = null;

         } else if('B' == $cell->getColumn()){
             
          $temp=$cell->getCalculatedValue();
           if(!empty($temp))
                $array_tarifario_gn[$cell->getColumn()] = $cell->getCalculatedValue();
           
                   
         } else if('C' == $cell->getColumn()){
             
           $array_tarifario_gn[$cell->getColumn()] = $cell->getCalculatedValue();
           
                   
         } else if('D' == $cell->getColumn()){
             
          $array_tarifario_gn[$cell->getColumn()] = $cell->getCalculatedValue();
                   
         } else if('E' == $cell->getColumn()){
             
           //echo " Tipo de dados == ".gettype($cell->getCalculatedValue())."<br>";
           $array_tarifario_gn[$cell->getColumn()] =  PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000');
                   
         } else if('F' == $cell->getColumn()){
            
           $array_tarifario_gn[$cell->getColumn()] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0.0000');
     
         } else if('G' == $cell->getColumn()){
           $valor = ($cell->getCalculatedValue() === '' ? '0%' : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0%'));
           
           $array_tarifario_gn[$cell->getColumn()] = $valor;
    
         } else if('H' == $cell->getColumn()){
          /*<----REVER--------------------->*/
          $valor = ($cell->getCalculatedValue() === '' ? '0%' : PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), '0%'));
          //echo("TARIFARIO_GN H array_data[".$cell->getColumn()."] = ".$valor."<br>");
          $array_tarifario_gn[$cell->getColumn()] = $valor;
           
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
    $relatorio_html .= "<div align='left'><h5>Nome do Ficheiro == ".$_FILES['ficheiro']["name"]." </h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
    
     //$maxCol =$objPHPExcel->getActiveSheet()->getHighestColumn(); 
      //$lastRow = $objPHPExcel->getActiveSheet()->getHighestRow();
      //echo("<br><br>Numero de linhas == " .$lastRow. "!!! <br>");
      // echo("<br><br>Numero de worksheet == " . $objPHPExcel->getSheetCount() ."!!! <br>"); 
      // echo("Depois == <br>");
      //print_r($objPHPExcel->getSheetNames());
      //$objReader->setSheetIndex(0);
      //echo("Linha iterador == ".$rowIterator."<br>");
      
      
    $array_data = array('B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','H'=>'','I'=>'','J'=>'','K'=>'','L'=>'','M'=>'','N'=>'','O'=>'','P'=>'','Q'=>'','R'=>'','S'=>'','T'=>'','U'=>'','V'=>'','W'=>'','X'=>'','Y'=>'','Z'=>'','AA'=>'', 'AB'=>'','AC'=>'','AD'=>'','AE'=>'','AF'=>'','AG'=>'','AH'=>'','AI'=>'','AJ'=>'','AK'=>'','AL'=>'','AM'=>'','AN'=>'','AO'=>'','AP'=>'','AQ'=>'','AR'=>'','AS'=>'','AT'=>'','AU'=>'','AV'=>'','AW'=>'','AX'=>'','AY'=>'','AZ'=>'','BA'=>'','BB'=>'','BC'=>'','BD'=>'');            
      
    $array_tarifario_e = array('B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','I'=>'','J'=>'','K'=>'','L'=>'','N'=>'','O'=>'','P'=>'','Q'=>'','R'=>'');
    $array_tarifario_e_desconto = array('B'=>'','C'=>'','D'=>'');
    $caracteristicas_electricidade = array('Data Inicio'=>'','Nome Tarifario'=>'','ID Tarifario'=>'','Ultimo ID Simples'=>'','Ultimo ID BI'=>'','Ultimo ID TRI'=>'');
    $observcao_e = array('Observacao Simples'=>'','Observacao BI'=>'','Observacao TRI'=>'');
      
    $array_tarifario_gn = array('B'=>'','C'=>'','D'=>'','E'=>'','F'=>'','G'=>'','H'=>'','I'=>'','J'=>'','K'=>'','L'=>'','M'=>'','N'=>'','O'=>'');
    $caracteristicas_gas = array('Data Inicio'=>'','ID Gas'=>'','Observacao'=>'null');
      
    //<--GAS--> 0->Nome Tarifario 1->Empresas Distribuidoras 2->ID Tarifario
    $empresas_distribuidoras = array();
    $empresas_distribuidoras[0] = array( 0=>'', 1=>'', 2=>'',3=>'',4=>'',5=>'',6=>'',7=>'',8=>'',9=>'',10=>'');
    $empresas_distribuidoras[1] = array( 0=>'', 1=>'', 2=>'',3=>'',4=>'',5=>'',6=>'',7=>'',8=>'',9=>'',10=>'');
    $empresas_distribuidoras[2] = array( 0=>'', 1=>'', 2=>'',3=>'',4=>'',5=>'',6=>'',7=>'',8=>'',9=>'',10=>'');
    $empresas_distribuidoras[3] = array( 0=>0, 1=>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0);
            
    //<---->
    $output = array();
    $nomes = array();
    $nomes = $objPHPExcel->getSheetNames();
    $dim = $objPHPExcel->getSheetCount();
    $contador_gas = 0;
    $flag_gas = 0;
    $tmp_nome_escalao = null;
      
    /**<----------------Percorre as worksheet---------------->**/
    for($i = $dim-1 ; $i >= 0 ; $i--)
    {   
           $rowIterator = $objPHPExcel->setActiveSheetIndex($i)->getRowIterator();
           // echo("WorkSheet name == ". $nomes[$i] . "<br>");     
           //echo "TESTE == ". $objPHPExcel->getActiveSheet()->getStyle($column.$row)->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT )."<br>";
           //<----TRANSFORMA COLUNA em NUMERO -> columnIndexFromString('A')
           
           /*<----------ELECTRICIDADE-------->*/
           if(($nomes[$i][0] == 'H') || ($nomes[$i][0] == 'H'))
           {
                //Obseracoes da tarifa
                $observcao_e['Observacao Simples'] = ($objPHPExcel->setActiveSheetIndex($i)->getCell('B21') === '' ? null : $objPHPExcel->setActiveSheetIndex($i)->getCell('B21'));
                $observcao_e['Observacao BI'] = ($objPHPExcel->setActiveSheetIndex($i)->getCell('I21') === '' ? null : $objPHPExcel->setActiveSheetIndex($i)->getCell('I21'));
                $observcao_e['Observacao TRI'] = ($objPHPExcel->setActiveSheetIndex($i)->getCell('N21') === '' ? null : $objPHPExcel->setActiveSheetIndex($i)->getCell('N21')); 
                
                      
                /*<--------------Descobrir ultimo id inserido SIMPLES------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_SIMPLES FROM TARIFA_SIMPLES ORDER BY IDTARIFA_SIMPLES DESC LIMIT 1 ")){
                    $stmt->execute(); 
                	$stmt->store_result();
        			$stmt->bind_result($ultimo_id_simples); 
        			$stmt->fetch();
                    //$stmt->close();
                }
                $ultimo_id_simples++;
                $caracteristicas_electricidade['Ultimo ID Simples'] = $ultimo_id_simples;
                
                /*<--------------Descobrir ultimo id inserido BI------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_BI FROM TARIFA_BI ORDER BY IDTARIFA_BI DESC LIMIT 1 ")){
                    $stmt->execute(); 
                	$stmt->store_result();
        			$stmt->bind_result($ultimo_id_bi); 
        			$stmt->fetch();
                    //$stmt->close();
                }
                $ultimo_id_bi++;
                $caracteristicas_electricidade['Ultimo ID BI'] = $ultimo_id_bi;
                
                /*<--------------Descobrir ultimo id inserido TRI------------->*/
                if ($stmt = $mysqli->prepare("SELECT IDTARIFA_TRI FROM TARIFA_TRI ORDER BY IDTARIFA_TRI DESC LIMIT 1 ")){
                    $stmt->execute(); 
                	$stmt->store_result();
        			$stmt->bind_result($ultimo_id_tri); 
        			$stmt->fetch();
                    //$stmt->close();
                }
                $ultimo_id_tri++;
                $caracteristicas_electricidade['Ultimo ID TRI'] = $ultimo_id_tri;
  
           }
           
           //percorre as linhas
           foreach($rowIterator as $row){
              
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(true); // percorre so as celulas definidas

                if((1 == $row->getRowIndex())  && ($nomes[$i][0] == 'B')) continue;
                else if((2 == $row->getRowIndex()) && ($nomes[$i][0] == 'B'))  continue;
                else if((3 == $row->getRowIndex()) && ($nomes[$i][0] == 'B')) continue;
                else if((4 == $row->getRowIndex()) && (($nomes[$i][0] == 'B') || ($nomes[$i][0] == 'e')))  continue;
                else if((5 == $row->getRowIndex()) && ($nomes[$i][0] == 'e'))  continue;
                else if((6 == $row->getRowIndex()) && ($nomes[$i][0] == 'e'))  continue;
                else if((7 == $row->getRowIndex()) && (($nomes[$i][0] == 'g') || ($nomes[$i][0] == 'e')))  continue;
                
                
                if(($row->getRowIndex() == 6) && (($nomes[$i][0] == 'K') || ($nomes[$i][0] == 'K'))) {    
                   
                    if($stmt = $mysqli->prepare("SELECT * FROM GAS WHERE NOME= ? AND DATA= ?")) { 
    
                            $stmt->bind_param('ss', $nomes[$i],$caracteristicas_gas['Data Inicio']); 
                            $stmt->execute(); 
                          	$stmt->store_result();
                      		$stmt->bind_result($id_gas); 
                      		$stmt->fetch();
                          //  echo("Plano == ".$nome_plano." Data == ".$data_vigor." Numero de linhas == ".$stmt->num_rows."<br>");
                			if($stmt->num_rows == 0)
                                $flag_gas = 1;  
                            else
                                $flag_gas = -1; 
                    }
                    
                    if($flag_gas == -1)
                       $relatorio_html .= "<div align='left'><h5>J&aacute; existe esta tarifa Worksheet [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div> "; 
                       //array_push($output,"<div align='left'><h5>J&aacute; existe esta tarifa Worksheet [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div> ");
                       //echo "<div align='left'><h5>J&aacute; existe esta tarifa Worksheet [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div> ";
                   
                    if($flag_gas == 1)
                    {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO GAS (ID,NOME,DATA,OBS) VALUES (NULL,?,?,?)")) 
                        {                       
                            $insert_stmt->bind_param('sss',$nomes[$i],$caracteristicas_gas['Data Inicio'],$caracteristicas_gas['Observacao']);
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
                
                        
                      //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o GÁS da Worksheet [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                     //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o GÁS da Worksheet [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
          
                    }
                    
                    if($flag_gas == 1)
                    {
                        $flag_empresas = 0;
                        for($j=0 ; $j < 11 ; $j++)
                        {                            
                            //query -> INSERIR EMPRESAS DISTRIBUIDORAS
                            if($insert_stmt = $mysqli->prepare("INSERT INTO EMPRESAS_DISTRIBUIDORAS (NOME_TARIFARIO,GAS_IDGAS,NOME_EMPRESA,ESTRUTURA_TARIFARIO) VALUES (?,?,?,?)"))
                            {                        
                                $insert_stmt->bind_param('sdss',$empresas_distribuidoras[0][$j],$caracteristicas_gas['ID Gas'],$empresas_distribuidoras[1][$j],$empresas_distribuidoras[2][$j]);
                                $ok=$insert_stmt->execute();
                                $id_empresa=$mysqli->insert_id;
                                
                    			if(!$ok)
                                {  
                                  //  echo "Insucesso EMPRESAS_DISTRIBUIDORAS == ".$mysqli->error."!!!<br>"; 
                                  $empresas_distribuidoras[3][$j] = -1;
                                  $flag_empresas = 1;
                                }
                                else
                                    $flag_empresas = 1;
                                $empresas_distribuidoras[3][$j] = 1;
                                    
                                $insert_stmt->close();
                            }
                            else
                            {
                                $empresas_distribuidoras[3][$j] = 1;
                                $flag_empresas = -1;
                            }
                                
                                
                            if( $flag_empresas == -1 )
                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Empresa Distribuidora [".trim($empresas_distribuidoras[1][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Empresa Distribuidora [".trim($empresas_distribuidoras[1][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                            else
                                $relatorio_html .=  "<div align='left'><h5>Inserc&ccedil;&atilde;o da Empresa Distribuidora [".trim($empresas_distribuidoras[1][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Empresa Distribuidora [".trim($empresas_distribuidoras[1][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                            //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Empresa Distribuidora [".trim($empresas_distribuidoras[1][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>"); 
                            //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Empresa Distribuidora [".trim($empresas_distribuidoras[1][$j])."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                        }
                    }
                }
                
               
                //<-----------percorre as celulas (uma linha)----------->
                $flag_celulas = 0;
                foreach ($cellIterator as $cell)
                {
                    //restricao de colunas onde nao acede     
                    if('A' == $cell->getColumn()) continue;
                    if((stripos($cell->getCoordinate(),'H') !== false)  && ($nome[$i][0] == 'e')) continue;
                    if((stripos($cell->getCoordinate(),'M') !== false)  && ($nome[$i][0] == 'e')) continue;
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
                        /*if((getdadose($cell,$array_tarifario_e,$cell->getRow(),$nomes[$i],$caracteristicas_electricidade,$output)) == -1)
                            break;*/
                    }
                    else if($nomes[$i][0] === 'g' || $nomes[$i][0] === 'G')
                    {
                       /* if(getdadosgn($cell,$array_tarifario_gn,$cell->getRow(),$nomes[$i],&$caracteristicas_gas,&$empresas_distribuidoras,$output)==1) 
                            break;*/
                    }

                }
                /*<------------------------------------------------------>*/
                
                if($nomes[$i][0] == 'B' && $flag_celulas == 1)
                {
                    if(($array_data['B'] !== '-') && ($array_data['C'] !== '-') && ($array_data['D'] !== '-') && ($array_data['E'] !== '-') && ($array_data['F'] !== '-') && ($array_data['G'] !== '-') && ($array_data['H'] !== '-') && ($array_data['I'] !== '-') && ($array_data['J'] !== '-'))
                    {
                        $flag_oferta = -2;
                        if($stmt = $mysqli->prepare("SELECT IDOFERTA FROM OFERTAS WHERE IDOFERTA = ? LIMIT 1")) 
                        {
                            $stmt->bind_param('s', $array_data['B']); 
                            $stmt->execute(); 
                    		$stmt->store_result();
                    		$stmt->fetch();
                
                    		if($stmt->num_rows == 0)
                    		{
                                $stmt->close();  
                                $observacao = null;
                                if($insert_stmt = $mysqli->prepare("INSERT INTO OFERTAS(IDOFERTA,NOME,ESTADO,DATA_INICIO,DATA_FIM,RECLAMACAO_DIVIDA,DURACAO,PENALIZACAO,VALOR,COMPONENTE_BASICA,COMPONENTE_ESTRUTURADA_E,ID_ESTRUTURADA_E,ESTRUTURA_TARIFARIA_E,ID_ESTRUTURA_TARIFARIA_E,COMPONENTE_ESTRUTURADA_GN,ID_ESTRUTURADA_GN,ESTRUTURA_TARIFARIA_GN,ID_ESTRUTURA_TARIFARIA_GN,DEBITO_DIRETO,CONTA_CERTA,CORRESPONDENCIA_ELETRONICA,ENTIDADE_PARCEIRA,VALOR_EP,VALOR_BENEFICO_EP,UNIDADE_EP,APLICADO_EP,OBSERVACOES,ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO,ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO,ALTER_E,ALTER_GN) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")) 
                                { 
                                        $insert_stmt->bind_param('ssssssdsdssssssssssssssssssssss',$array_data['B'],$array_data['C'],$array_data['D'],$array_data['E'],$array_data['F'],$array_data['G'],$array_data['H'],$array_data['I'],$array_data['J'],$array_data['P'],$array_data['U'],$array_data['V'],$array_data['W'],$array_data['X'],$array_data['AC'],$array_data['AD'],$array_data['AE'],$array_data['AF'],$array_data['AR'],$array_data['AT'],$array_data['AV'],$array_data['AX'],$array_data['AY'],$array_data['AZ'],$array_data['BA'],$array_data['BB'],$observacao,$array_data['AG'],$array_data['AH'],$array_data['BC'],$array_data['BD']);
                                        $ok=$insert_stmt->execute();
                                        //$insert_stmt->close();      
                                        $id_oferta=$array_data['B'];
                                        if(!$ok)
                                        {
                                            $flag_oferta = -1;
                                        }
                                        else
                                            $flag_oferta = 1;
                                        $insert_stmt->close();  
                                }
                                else
                                    $flag_oferta = -1;
                            
                                if( $flag_oferta < 0 )
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>"; 
                                    //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                else
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Oferta [".$array_data['C']."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    		}
                    		else
                    		{
                    		     $relatorio_html .= "<div align='left'><h5>A Oferta [".$array_data['C']."] j&aacute; existe [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    		     //array_push($output,"<div align='left'><h5>A Oferta [".$array_data['C']."] j&aacute; existe [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                    		     //echo "<div align='left'><h5>A Oferta [".$array_data['C']."] j&aacute; existe [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    		}
                        }
                            
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
                                if($insert_stmt = $mysqli->prepare("INSERT INTO CONDICAO_OFERTA (IDCONDICAO_OFERTA,Ofertas_IDOFERTA,CONDICAO_OFERTA,VALOR_CONDICAO) VALUES (NULL,?,?,?)"))
                                {
                                    $insert_stmt->bind_param('sss',$id_oferta,$array_data[$tmp],$valor_condicao);
                                    $ok=$insert_stmt->execute();
                                    $insert_stmt->close();      
                                    if(!$ok)
                                    { 
                                        echo "FALHOU == ".htmlspecialchars($insert_stmt->error)."<br>";
                                        $flag_condicao = -1;
                                    }
                                    else
                                        $flag_condicao = 1;
                                }
                                else
                                    $flag_condicao = -1;
                                        
                                if( $flag_condicao == -1 )
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Condi&ccedil;&atilde;o da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                   //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o Condi&ccedil;&atilde;o da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Condi&ccedil;&atilde;o da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                /*else
                                    echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Condi&ccedil;&atilde;o da Oferta [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                              */
                            }
                        }
                                
                        $flag_restricao = 0;
                        /*INSERIR RESTRICAO ELECTRICIDADE*/
                        for($tmp = 'Q' ; $tmp < 'T' ; $tmp++)
                        {
                            if($tmp == 'R') continue;
                            if($tmp == 'T') continue;
                                    
                            //echo "Indice == ".$tmp."<br>";
                            $aux=$tmp;
                            $valor_restricao = $array_data[++$aux];
                                    

                            if(($array_data[$tmp] !== '-') || ($valor_restricao !== '-'))
                            {
                                if($insert_stmt = $mysqli->prepare("INSERT INTO RESTRICAO_OFERTA(IDRESTRICAO_OFERTA,Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES (NULL,?,?,?,1)"))
                                {
                                    $insert_stmt->bind_param('sss',$id_oferta,$array_data[$tmp],$valor_restricao);
                                    $ok=$insert_stmt->execute();    
                                    $id_restricao_gas=$mysqli->insert_id;
                                    if(!$ok)
                                    { 
                                        echo "FALHOU == ".htmlspecialchars($insert_stmt->error)."<br>";
                                        $flag_restricao = -1; 
                                    }
                                    else
                                        $flag_restricao = 1;
                                            
                                    $insert_stmt->close();  
                                }
                                else
                                    $flag_restricao = -1;
                                        
                                if( $flag_restricao == -1 )
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de Electricidade da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de Electricidade da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de Electricidade da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                /*else
                                    echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de Electricidade da Oferta [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                     */   
                            }
                        }
                                
                        $flag_restricao = 0;
                        /*INSERIR RESTRICAO GAS*/
                        if(($array_data['Y'] !== '-') || ($array_data['Z'] !== '-'))
                        {
                            if($insert_stmt = $mysqli->prepare("INSERT INTO RESTRICAO_OFERTA(IDRESTRICAO_OFERTA,Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES (NULL,?,?,?,2)"))
                            {
                                $insert_stmt->bind_param('sss',$id_oferta,$array_data['Y'],$array_data['Z']);
                                $ok=$insert_stmt->execute();    
                                if(!$ok)
                                { 
                                    echo "FALHOU == ".htmlspecialchars($insert_stmt->error)."<br>";
                                    $flag_restricao = -1;
                                }
                                else
                                    $flag_restricao = 1;
                                            
                                $insert_stmt->close();  
                            }
                            else
                                $flag_restricao = -1;
                                    
                            if( $flag_restricao == -1 )
                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                          /*  else
                                echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
              */      }
                                
                        if(($array_data['AA'] !== '-') || ($array_data['AB'] !== '-'))
                        {
                            if($insert_stmt = $mysqli->prepare("INSERT INTO RESTRICAO_OFERTA(IDRESTRICAO_OFERTA,Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES (NULL,?,?,?,2)"))
                            {
                                $insert_stmt->bind_param('sss',$id_oferta,$array_data['Y'],$array_data['Z']);
                                $ok=$insert_stmt->execute();    
                                if(!$ok)
                                { 
                                    $flag_restricao = -1;
                                }
                                else
                                    $flag_restricao = 1;
                                            
                                $insert_stmt->close();  
                            }
                            else
                                $flag_restricao = -1;
                                    
                            if( $flag_restricao == -1 )
                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                
                            /*else
                                echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Restri&ccedil;&atilde;o de G&aacute;s da Oferta [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                     */ }
                                
                        /*INSERIR SERVICO ESTRUTURADO*/
                        if(($array_data['AO'] !== '-') && ($array_data['AP'] !== '-'))
                        {
                            $flag_serv = 0;
                            if(($array_data['AG'] !== '-') && ($array_data['AH'] !== '-') && ($array_data['AI'] !== '-') && ($array_data['AJ'] !== '-'))
                            {
                                if($insert_stmt = $mysqli->prepare("INSERT INTO SERVICO_ESTRUTURADO (id_servico_estruturado,estrutura_servico,obrigatoriedade,idservicoestruturado,estado,idoferta) VALUES (NULL,?,?,?,?,?)")) 
                                {   
                                    $insert_stmt->bind_param('sssss',$array_data['AG'],$array_data['AJ'],$array_data['AH'],$array_data['AI'],$id_oferta);
                                    $ok=$insert_stmt->execute();
                                    $idservico_estruturado=$mysqli->insert_id;
                                    if(!$ok)
                                    { 
                                        echo "Insucesso SERVICO ESTRUTURADO == ".$mysqli->error."!!!"; 
                                        $flag_serv = -1;
                                    }
                                    else
                                        $flag_serv = 1;
                                    $insert_stmt->close();                        
                                }
                                else
                                    $flag_serv = -1;
                                                
                                if( $flag_serv == -1 )
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                              /* else
                                    echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                               */  
                            }
                                    
                            if(($array_data['AK'] !== '-') && ($array_data['AN'] !== '-') && ($array_data['AL'] !== '-') && ($array_data['AM'] !== '-'))
                            {
                                if($insert_stmt = $mysqli->prepare("INSERT INTO SERVICO_ESTRUTURADO (id_servico_estruturado,estrutura_servico,obrigatoriedade,idservicoestruturado,estado,idoferta) VALUES (NULL,?,?,?,?,?)")) 
                                {   
                                                $insert_stmt->bind_param('sssss',$array_data['AK'],$array_data['AN'],$array_data['AL'],$array_data['AM'],$id_oferta);
                                                $ok=$insert_stmt->execute();
                                                $idservico_estruturado=$mysqli->insert_id;
                                                if(!$ok)
                                                { 
                                                   $flag_serv = -1;
                                                }
                                                else
                                                    $flag_serv = 1;
                                                $insert_stmt->close();                        
                                }
                                else
                                    $flag_serv = -1;
                                            
                                if( $flag_serv == -1 )
                                    $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                    //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                    //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                               /* else
                                    echo "<div align='left'><h5>Inserc&ccedil;&atilde;o Servi&ccedil;o Estruturado [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                           */
                            }
                        }
                                
                        /*INSERIR LOG*/
                        if($insert_stmt = $mysqli->prepare("INSERT INTO LOG(idlog,descricao,user,data,admin) VALUES (NULL,?,?,?,0)"))
                        {
                            $descricao = "Adicionada uma nova oferta [".$array_data['C']."]";
                            $date = date("y/m/d");
                            $insert_stmt->bind_param('sss',$descricao,$_SESSION['nome'],$date);
                            $ok=$insert_stmt->execute(); 
                            if(!$ok)
                                echo "Insucesso LOG == ".$mysqli->error."!!!<br>"; 
                            $id_oferta_alternativa=$mysqli->insert_id;
                            $insert_stmt->close();  
                        }
                        
                    } // fecha flag == 1 oferta
   
                } // fecha insercao de nova oferta
                
                //Inserir os escaloes 
                if(($row->getRowIndex()) > 7   && ($nomes[$i][0] == 'K'))
                {
                    if(($flag_gas == 1))
                    {
                        if($array_tarifario_gn['B'] != $tmp_nome_escalao)
                        {
                            $tmp_nome_escalao = $array_tarifario_gn['B'];  
                            for($k = 0 ; $k < 11 ; $k++)
                            {
                                $valor = str_replace(' ', '', $empresas_distribuidoras[1][$k]);
                                //echo mb_strtoupper($valor, 'UTF-8')." == ".mb_strtoupper($tmp_nome_escalao,'UTF-8')."<br>";
                                //echo "TYPE 1 == ".gettype(mb_strtoupper($empresas_distribuidoras[1][$k], 'UTF-8')). "TYPE 2 == ".gettype(mb_strtoupper($tmp_nome_escalao,'UTF-8'))."<br>";
                                if(mb_strtoupper($valor, 'UTF-8') === mb_strtoupper($tmp_nome_escalao,'UTF-8'))
                                {
                                    //echo "<br>ENTRA no IF<br>";
                                    if($empresas_distribuidoras[3][$k] == 1)
                                    {
                                        $flag_empresas = 1;
                                    }
                                    else
                                    {
                                        $flag_empresas = -1;
                                    }
                                        
                                }
                            }
                            
                        }
                        
                        if($flag_empresas == 1)
                        {                            
                            // echo "Entra aqui gas == ".$flag_gas." && empresas == ".$flag_empresas." linha == ".$row->getRowIndex()."<br>";               
                            if((!empty($array_tarifario_gn['C']) &&  !empty($array_tarifario_gn['D'])) || (!empty($array_tarifario_gn['E']) && !empty($array_tarifario_gn['F'])))
                            {
                               //$caracteristicas_gas['ID Gas'] = 30;
                                //echo "Inserir escalao ID_GAS = ".$caracteristicas_gas['ID Gas']." NOME_EMPRESA = ".$tmp_nome_escalao." ESCALAO_INICIO = ".$array_tarifario_gn['C']." ESCALAO_FIM = ".$array_tarifario_gn['D']." TTF = ".$array_tarifario_gn['E']." ENERGIA = ".$array_tarifario_gn['F']." DESCONTO_TTF = ".$array_tarifario_gn['G']." DESCONTO_ENERGIA = ".$array_tarifario_gn['H'] ."<br>";
                                //executar query
                                if($insert_stmt = $mysqli->prepare("INSERT INTO ESCALAO (IDESCALAO,EMPRESAS_DISTRIBUIDORAS_GAS_IDGAS,EMPRESAS_DISTRIBUIDORAS_NOME_EMPRESA,ESCALAO_INICIO,ESCALAO_FIM,TERMO_TARIFARIO_FIXO,ENERGIA,DESCONTO_TTF,DESCONTO_ENERGIA) VALUES (NULL,?,?,?,?,?,?,?,?)"))
                                {   
                                    $insert_stmt->bind_param('dsddddss',$caracteristicas_gas['ID Gas'],$tmp_nome_escalao,$array_tarifario_gn['C'],$array_tarifario_gn['D'],$array_tarifario_gn['E'],$array_tarifario_gn['F'],$array_tarifario_gn['G'],$array_tarifario_gn['H']);
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
            if(($nomes[$i][0] == 'H') || ($nomes[$i][0] == 'H'))
                if($caracteristicas_electricidade['Data Inicio'] != '' && $caracteristicas_electricidade['Nome Tarifario'] != '' && $caracteristicas_electricidade['ID Tarifario'] != '')
                {
                      //<-------------- INSERCAO DE OBSERVACAO DE TARIFAS--------------->
                    if($observcao_e['Observacao Simples'] != null)
                    {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_SIMPLES (IDTARIFA_SIMPLES,POTENCIA,PRECO_POTENCIA_TVCF,PRECO_ENERGIA_TVCF,PRECO_POTENCIA_edpC,PRECO_ENERGIA_edpC,DESCONTO,TIPO_DESCONTO,FORMATO_DESCONTO,DATA,OBS) VALUES  (?,99,-1,-1,-1,-1,-1,NULL,NULL,?,?)")) 
                        {
                            $insert_stmt->bind_param('dss',$caracteristicas_electricidade['Ultimo ID Simples'],$caracteristicas_electricidade['Data Inicio'],$observcao_e['Observacao Simples']);
                            $ok=$insert_stmt->execute();
                            $insert_stmt->close();      
                            $id_tarifa_bi=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa SIMPLES da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa SIMPLES da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa SIMPLES da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                            }
                                                          
                        }
                    }
                   
                    if($observcao_e['Observacao BI'] != null)
                    {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_BI (IDTARIFA_BI,POTENCIA,ENERGIA_NORMAL,ENERGIA_ECONOMICO,PRECO_POTENCIA,DATA,OBS) VALUES (?,99,-1,-1,-1,?,?)")) 
                        {
                            $insert_stmt->bind_param('dss',$caracteristicas_electricidade['Ultimo ID BI'],$caracteristicas_electricidade['Data Inicio'],$observcao_e['Observacao BI']);
                            $ok=$insert_stmt->execute();
                            $insert_stmt->close();      
                            $id_tarifa_bi=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa BI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa BI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa BI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                            }
                        }
                    }
                         
                    if($observcao_e['Observacao TRI'] != null)
                    {
                        if($insert_stmt = $mysqli->prepare("INSERT INTO TARIFA_TRI(IDTARIFA_TRI,POTENCIA,PRECO_POTENCIA,ENERGIA_NORMAL,ENERGIA_ECONOMICO,ENERGIA_SUPER_ECONOMICO,DATA,OBS) VALUES (?,99,1,1,1,1,?,?)")) 
                        {
                            $insert_stmt->bind_param('dss',$caracteristicas_electricidade['Ultimo ID TRI'],$caracteristicas_electricidade['Data Inicio'],$observcao_e['Observacao TRI']);
                            $ok=$insert_stmt->execute();
                            $insert_stmt->close();      
                            $id_tarifa_tri=$mysqli->insert_id;
                            if(!$ok)
                            { 
                                $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa TRI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                                //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa TRI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                                //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o da Observa&ccedil;&atilde;o do tarif&aacute;rio [".$caracteristicas_electricidade['Nome Tarifario']."] Tarifa TRI da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                            }
                        }
                    }
                    
                    $flag_electricidade = 0;
                    if($insert_stmt = $mysqli->prepare("INSERT INTO ELECTRICIDADE(NOME,ID_TARIFARIO,ID_TARIFA_SIMPLES,ID_TARIFA_BI,ID_TARIFA_TRI) VALUES (?,?,?,?,?)")) 
                    {   
                        $insert_stmt->bind_param('ssddd',$caracteristicas_electricidade['Nome Tarifario'],$caracteristicas_electricidade['ID Tarifario'],$caracteristicas_electricidade['Ultimo ID Simples'],$caracteristicas_electricidade['Ultimo ID BI'],$caracteristicas_electricidade['Ultimo ID TRI']);
                        $ok=$insert_stmt->execute();
                        if(!$ok)
                        { 
                          $flag_electricidade = -1;
                          echo "Insucesso ELETRICIDADE == ".$mysqli->error."!!!<br>"; 
                        }
                        else
                        $flag_electricidade = 1;
         
                        $insert_stmt->close();
                    }
                    else
                        $flag_electricidade = -1;
                    
                    if( $flag_electricidade == -1 )
                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$caracteristicas_electricidade['Nome Tarifario']."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                        //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$caracteristicas_electricidade['Nome Tarifario']."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                        //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$caracteristicas_electricidade['Nome Tarifario']."] da  Worksheet  [".$nomes[$i]."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                    else
                        $relatorio_html .= "<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$caracteristicas_electricidade['Nome Tarifario']."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                        //array_push($output,"<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$caracteristicas_electricidade['Nome Tarifario']."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>");
                        //echo "<div align='left'><h5>Inserc&ccedil;&atilde;o do Tarifario de Eletricidade [".$caracteristicas_electricidade['Nome Tarifario']."] da  Worksheet  [".$nomes[$i]."] [<font color='#4CC417'>OK</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                }   
    }    
 
    echo $relatorio_html;
    if( $relatorio_html !== '' )
    /**<----------- Inserir RELATORIO visivel ao admin no LOG ----------->**/
   /* if($insert_stmt = $mysqli->prepare("INSERT INTO LOG(idlog,descricao,user,data,admin) VALUES (NULL,?,?,?,2)"))
    {
        $date = date("y/m/d");
        $insert_stmt->bind_param('sss',base64_encode($relatorio_html),$_SESSION['nome'],$date);
        $ok=$insert_stmt->execute(); 
        if(!$ok)
            echo "Insucesso LOG 2 == ".$mysqli->error."!!!<br>"; 
        $id_oferta_alternativa=$mysqli->insert_id;
        $insert_stmt->close();  
    }
    */
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
