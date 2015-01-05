<?php

session_start();

$idoferta=$_GET['IDOFERTA'];
//echo("ID OFERTA=" . $idoferta);
include('../mysql.php');

include('../mysqlconnect.php');

include('../login_status.php');



function alteracoesofrcond($resultcondicoes,$resultrestricoese,$resultrestricoesgn,$resultrestricoesserv,$idoferta,$sqlcondicoes)
{
    $i=1;
    $contadoraux=1;

           echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>3 .Condições Particulares<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");


     while($rowcondicoes = mysqli_fetch_array($resultcondicoes))
     {
            $condicao_oferta_update=$_POST['condicao_oferta_update_'. (string) $i];
            if(empty($condicao_oferta_update))
            {
    
                $condicao_oferta_update="-";
            }

            $valor_oferta_update=$_POST['valor_oferta_update_'. (string) $i];
            if(empty($valor_oferta_update))
            {
    
              $valor_oferta_update="-";
    
            }
            $sqlcondicoes[$i]="UPDATE CONDICAO_OFERTA";
            $sqlcondicoes[$i]= $sqlcondicoes[$i] . " SET CONDICAO_OFERTA = '".$condicao_oferta_update."', VALOR_CONDICAO= '" . $valor_oferta_update. "' WHERE IDCONDICAO_OFERTA=" . $rowcondicoes['IDCONDICAO_OFERTA'];

            $i++;

          echo("<tr><td>Condição Oferta " . $contadoraux . " </td><td>"); 
          echo($condicao_oferta_update);
          echo("</td></tr>");
          echo("<tr><td>Valor Condição Oferta " . $contadoraux . " </td><td>"); 
          echo($valor_oferta_update);
          echo("</td></tr>");
          $contadoraux++;

     }

    $j=2;
    while(($_POST['condicao_oferta_' . (string) $j]!=NULL) || ($_POST['valor_oferta_' . (string) $j]!=NULL))
    {

            $condicao_oferta=$_POST['condicao_oferta_'. (string) $j];
            if(empty($condicao_oferta))
            {

                $condicao_oferta="-";
            }

            $valor_oferta=$_POST['valor_oferta_'. (string) $j];
            if(empty($valor_oferta))
            {

              $valor_oferta="-";
            }
      $sqlcondicoes[$i]="INSERT INTO CONDICAO_OFERTA (Ofertas_IDOFERTA,CONDICAO_OFERTA,VALOR_CONDICAO) VALUES ('" . $idoferta . "','".$condicao_oferta."','".$valor_oferta."')";
      $j++;
      $i++;
          echo("<tr><td>Condição Oferta " . $contadoraux . " </td><td>"); 
          echo($condicao_oferta);
          echo("</td></tr>");
          echo("<tr><td>Valor Condição Oferta " . $contadoraux . " </td><td>"); 
          echo($valor_oferta);
          echo("</td></tr>");
          $contadoraux++;


    }
      $k=0;
      $contadoraux=1;

             echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>4 .Eletricidade<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");


  //Electricidade  actualizar tarifario
    $sqlcondicoes[$i]="UPDATE OFERTAS SET COMPONENTE_ESTRUTURADA_E='" . $_POST['componente_electricidade']  . "', ID_ESTRUTURADA_E='" . $_POST['id_componente_electricidade']. "', ID_ESTRUTURA_TARIFARIA_E='" . $_POST['select_id_electricidade'] . "', ESTRUTURA_TARIFARIA_E='" . $_POST['select_electricidade'] . "' WHERE IDOFERTA='" . $idoferta . "'"; 
    $i++;
        echo("<tr><td>ID Componente <br> Estruturada : </td><td>"); 
       echo($_POST['id_componente_electricidade']);
       echo("</td></tr>");
       echo("<tr><td>Componente Estruturada :</td><td>"); 
       echo($_POST['componente_electricidade']);
       echo("</td></tr>");
       echo("<tr><td>ID Estrutura Tarifária :</td><td>"); 
       echo($_POST['select_id_electricidade']);
       echo("</td></tr>");
       echo("<tr><td>Estrutura Tarifária:</td><td>"); 
       echo($_POST['select_electricidade']);
       echo("</td></tr>");

        echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>4.1. Restrições Eletricidade<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");





      while($rowrestricoese = mysqli_fetch_array($resultrestricoese))
     {
            $restricao_e_update=$_POST['restricao_e_'. (string) $k];
            if(empty($restricao_e_update))
            {
    
                $restricao_e_update="-";
            }

            $valor_restricao_e=$_POST['valor_restricao_e_'. (string) $k];
            if(empty($valor_restricao_e))
            {
    
              $valor_restricao_e="-";
    
            }
            $sqlcondicoes[$i]="UPDATE RESTRICAO_OFERTA";
            $sqlcondicoes[$i]= $sqlcondicoes[$i] . " SET RESTRICAO = '".$restricao_e_update."', VALOR_RESTRICAO= '" . $valor_restricao_e. "' WHERE IDRESTRICAO_OFERTA=" . $rowrestricoese['IDRESTRICAO_OFERTA'];
            $i++;
            $k++;
            echo("<tr><td>Restrição Eletricidade " . $contadoraux . " </td><td>"); 
            echo($restricao_e_update);
            echo("</td></tr>");
            echo("<tr><td>Valor Restrição Eletricidade " . $contadoraux . " </td><td>"); 
            echo($valor_restricao_e);
            echo("</td></tr>");
            $contadoraux++;


     }
    $j=2;
    while(($_POST['nv_restricao_e_' . (string) $j]!=NULL) || ($_POST['nv_valor_restricao_e_' . (string) $j]!=NULL))
    {
            
            $restricao_e=$_POST['nv_restricao_e_'. (string) $j];
            if(empty( $restricao_e))
            {
                
                 $restricao_e="-";
            }

            $valor_restricao_e=$_POST['nv_valor_restricao_e_'. (string) $j];
            if(empty($valor_restricao_e))
            {
              
              $valor_restricao_e="-";
              
            }
          $sqlcondicoes[$i]="INSERT INTO RESTRICAO_OFERTA (Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES ('" . $idoferta . "','".$restricao_e."','".$valor_restricao_e."',2)";
          $j++;
          $i++;   
          
          echo("<tr><td>Restricao Eletricidade " . $contadoraux . " </td><td>"); 
          echo($restricao_e);
          echo("</td></tr>");
          echo("<tr><td>Valor Restricao Eletricidade " . $contadoraux . " </td><td>"); 
          echo($valor_restricao_e);
          echo("</td></tr>");
          $contadoraux++;


    }


            echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>5 .Gás<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");

    //GAS
    $contadoraux=1;
     $sqlcondicoes[$i]="UPDATE OFERTAS SET ID_ESTRUTURADA_GN='" . $_POST['ID_Componente_Estruturada_Gas'] . "', COMPONENTE_ESTRUTURADA_GN='" . $_POST['Componente_Estruturada_Gas'] . "', ESTRUTURA_TARIFARIA_GN='" . $_POST['select_gas'] . "', ID_ESTRUTURA_TARIFARIA_GN='" . $_POST['select_id_gas'] . "' WHERE IDOFERTA='" . $idoferta . "'";
       echo("<tr><td>ID Componente <br> Estruturada : </td><td>"); 
       echo($_POST['ID_Componente_Estruturada_Gas']);
       echo("</td></tr>");
       echo("<tr><td>Componente Estruturada :</td><td>"); 
       echo($_POST['Componente_Estruturada_Gas']);
       echo("</td></tr>");
       echo("<tr><td>ID Estrutura Tarifária :</td><td>"); 
       echo($_POST['select_id_gas']);
       echo("</td></tr>");
       echo("<tr><td>Estrutura Tarifária:</td><td>"); 
       echo($_POST['select_gas']);
       echo("</td></tr>");
      $i++;
      $k=0;



        echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>5.1. Restrições Gás<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");

    while($rowrestricoesgn = mysqli_fetch_array($resultrestricoesgn))
     {
            $restricao_gn_update=$_POST['restricao_gn_'. (string) $k];
            if(empty($restricao_gn_update))
            {
    
                $restricao_gn_update="-";
            }

            $valor_restricao_gn=$_POST['valor_restricao_gn_'. (string) $k];
            if(empty($valor_restricao_gn))
            {
    
              $valor_restricao_gn="-";
    
            }
            $sqlcondicoes[$i]="UPDATE RESTRICAO_OFERTA";
            $sqlcondicoes[$i]= $sqlcondicoes[$i] . " SET RESTRICAO = '".$restricao_gn_update."', VALOR_RESTRICAO= '" . $valor_restricao_gn. "' WHERE IDRESTRICAO_OFERTA=" . $rowrestricoesgn['IDRESTRICAO_OFERTA'];
            $i++;
            $k++;


            echo("<tr><td>Restricao " . $contadoraux . " </td><td>"); 
            echo($restricao_gn_update);
            echo("</td></tr>");
            echo("<tr><td>Valor Restricao  " . $contadoraux . " </td><td>"); 
            echo($valor_restricao_gn);
            echo("</td></tr>");
            $contadoraux++;

     }
    $j=2;
    while(($_POST['nv_restricao_gn_' . (string) $j]!=NULL) || ($_POST['nv_valor_restricao_gn_' . (string) $j]!=NULL))
    {

            $restricao_gn=$_POST['nv_restricao_gn_'. (string) $j];
            if(empty($restricao_gn))
            {
                
                 $restricao_gn="-";
            }

            $valor_restricao_gn=$_POST['nv_valor_restricao_gn_'. (string) $j];
            if(empty($valor_restricao_gn))
            {
              
              $valor_restricao_gn="-";
              
            }
          $sqlcondicoes[$i]="INSERT INTO RESTRICAO_OFERTA (Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES ('" . $idoferta . "','".$restricao_gn."','".$valor_restricao_gn."',1)";
      $j++;
      $i++;  

          echo("<tr><td>Restricao " . $contadoraux . " </td><td>"); 
            echo($restricao_gn);
            echo("</td></tr>");
            echo("<tr><td>Valor Restricao  " . $contadoraux . " </td><td>"); 
            echo($valor_restricao_gn);
            echo("</td></tr>");
            $contadoraux++;





    }

          echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>6 .Serviços Estruturados<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");



    //6. Serviços Estruturados
    //Fazer UPDATE DO ID Estrutura Tarifária e Estrutura Tarifária
    $contadoraux=1;
    $sqlcondicoes[$i]="UPDATE OFERTAS SET ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO='" . $_POST['ID_Estrutura_Tarifaria_Serv'] ."', ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO='" . $_POST['Estrutura_Tarifaria_Serv'] . "' WHERE IDOFERTA='" . $idoferta . "'";
       echo("<tr><td>ID Estrutura Tarifária :</td><td>"); 
       echo($_POST['ID_Estrutura_Tarifaria_Serv']);
       echo("</td></tr>");
       echo("<tr><td>Estrutura Tarifária:</td><td>"); 
       echo($_POST['Estrutura_Tarifaria_Serv']);
       echo("</td></tr>");


    //Update Serviços Estruturados ID Serviço Estruturado SErviço estruturado Estado do SErviço e Obrigatoriedade já inseridos
      $k=0;
    while($rowserv = mysqli_fetch_array($resultrestricoesserv))
     {
            $id_serv_estruturado=$_POST['idservest_'. (string) $k];
            if(empty($id_serv_estruturado))
            {
    
                $id_serv_estruturado="-";
            }

            $serv_estruturado=$_POST['servest_'. (string) $k];
            if(empty($serv_estruturado))
            {
    
              $serv_estruturado="-";
    
            }
              $estadoserv=$_POST['estserv_'. (string) $k];
            if(empty($estadoserv))
            {
    
              $estadoserv="-";
    
            }
              $obrigatoriedade_serv=$_POST['obrg_'. (string) $k];
            if(empty($obrigatoriedade_serv))
            {
    
              $obrigatoriedade_serv="-";
    
            }
            $sqlcondicoes[$i]="UPDATE SERVICO_ESTRUTURADO";
            $sqlcondicoes[$i]= $sqlcondicoes[$i] . " SET idservicoestruturado = '".$id_serv_estruturado."', estrutura_servico= '" . $serv_estruturado. "',estado='" . $estadoserv . "', obrigatoriedade='" . $obrigatoriedade_serv ."'  WHERE id_servico_estruturado=" . $rowserv['id_servico_estruturado'];
            $i++;
            $k++;

            echo("<tr><td>ID Serviço Estruturado " . $contadoraux . " </td><td>"); 
            echo($id_serv_estruturado);
            echo("</td></tr>");
            echo("<tr><td>Serviço Estruturado " . $contadoraux . "   </td><td>"); 
            echo($serv_estruturado);
            echo("</td></tr>");
            echo("<tr><td>Estado " . $contadoraux . " </td><td>"); 
            echo($estadoserv);
            echo("</td></tr>");
            echo("<tr><td>Obrigatoriedade " . $contadoraux . " </td><td>"); 
            echo($obrigatoriedade_serv);
            echo("</td></tr>");
            $contadoraux++;




     }


      $j=2;
    while(($_POST['ID_SERVICO_ESTRUTURADO_' . (string) $j]!=NULL) || ($_POST['SERVICO_ESTRUTURADO_' . (string) $j]!=NULL) || ($_POST['OBRIGATORIEDADE_' . (string) $j]!=NULL) || ($_POST['ESTADO_SERVICO_' . (string) $j]!=NULL))
    {
            
            $id_serv_estruturado=$_POST['ID_SERVICO_ESTRUTURADO_' . (string) $j];
            if(empty($id_serv_estruturado))
            {
                
                 $id_serv_estruturado="-";
            }

            $serv_estruturado=$_POST['SERVICO_ESTRUTURADO_'. (string) $j];
            if(empty($serv_estruturado))
            {
              
              $serv_estruturado="-";
              
            }
             $obrigatoriedade=$_POST['OBRIGATORIEDADE_'. (string) $j];
            if(empty($obrigatoriedade))
            {
              
              $obrigatoriedade="-";
              
            }
             $estadoserv=$_POST['ESTADO_SERVICO_'. (string) $j];
            if(empty($estadoserv))
            {
              
              $estadoserv="-";
              
            }
          $sqlcondicoes[$i]="INSERT INTO SERVICO_ESTRUTURADO (estrutura_servico,obrigatoriedade,idservicoestruturado,estado,idoferta) VALUES ('" . $serv_estruturado . "','".$obrigatoriedade."','".$id_serv_estruturado."','" . $estadoserv . "','". $idoferta ."')";
          $j++;
          $i++;  
          echo("<tr><td>ID Serviço Estruturado " . $contadoraux . " </td><td>"); 
            echo($id_serv_estruturado);
            echo("</td></tr>");
            echo("<tr><td>Serviço Estruturado " . $contadoraux . "   </td><td>"); 
            echo($serv_estruturado);
            echo("</td></tr>");
            echo("<tr><td>Estado " . $contadoraux . " </td><td>"); 
            echo($estadoserv);
            echo("</td></tr>");
            echo("<tr><td>Obrigatoriedade " . $contadoraux . " </td><td>"); 
            echo($obrigatoriedade_serv);
            echo("</td></tr>");
            $contadoraux++;



    }


            echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>7 .Ofertas Alternativas<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");

      $sqlcondicoes[$i]="UPDATE OFERTAS SET ALTER_E='" . $_POST['electricidade_alternativa'] . "', ALTER_GN='" . $_POST['gas_alternativo'] . "' WHERE IDOFERTA='" . $idoferta . "'";
          echo("<tr><td>Oferta Alternativa Eletricidade </td><td>"); 
            echo($_POST['electricidade_alternativa']);
            echo("</td></tr>");
            echo("<tr><td>Oferta Alternativa Gás </td><td>"); 
            echo($_POST['gas_alternativo']);
            echo("</td></tr>");
               echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'></th>
           
        </tr>");

       

            


?>
<input type='hidden' id='sqlcondicoes1' name='sqlcondicoes1' value="<?php print_r($sqlcondicoes); ?> " /> 

<?php

return $sqlcondicoes;
}
//Funcao que verifica as alterações efectuadas pelo utilizador e faz display na página para o utilizador confirmar algum eventual erro.
function verificaralteracoesofr($row)
{
      /*$n1 = strtotime($_POST['data_inicio']);
      $data_inicio = date("Y-m-d", $n1) . " 00:00:00";
      $n2 = strtotime($_POST['data_fim']);
      $data_fim = date("Y-m-d", $n2) . " 00:00:00";*/

      $data_inicio = $_POST['data_inicio'] ." 00:00:00";
      $data_fim = $_POST['data_fim'] ." 00:00:00";
      $idofertanv=$_POST['id'];

      $flag = 0;
      $sql = "UPDATE OFERTAS SET ";
      if($_POST['id']!=$row['IDOFERTA'])
      {
          if($flag==1)
              $sql.=" , ";
          
          $sql.="IDOFERTA ='".$_POST['id']."'";
          $flag=1;
      }

       echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>1 .Caraterísticas da Oferta<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");
       
      echo("<tr><td>ID Oferta</td><td>");
      echo($_POST['id']);
      echo("</td></tr>");
      if($_POST['nomeofr']!=$row['NOME'])
      {
          if($flag==1)
              $sql.=" , ";
          $sql.="NOME ='".$_POST['nomeofr']."'";
          $flag=1;
      }
          echo("<tr><td>Nome Oferta</td><td>");
          echo($_POST['nomeofr']);
          echo("</td></tr>");
      
      if($_POST['duracao']!=$row['DURACAO'])
      {
            if($flag==1)
              $sql.=" , ";
            $sql.="DURACAO =".$_POST['duracao']."";
            $flag=1;
      }
      echo("<tr><td>Duração</td><td>");
      echo($_POST['duracao']);
      echo("</td></tr>");
      
      if($_POST['valor']!=$row['VALOR'])
      {
          if($flag==1)
              $sql.=" , ";        
          $sql.="VALOR =".$_POST['valor']."";
          $flag=1;
      }
          echo("<tr><td>Valor</td><td>");
          echo($_POST['valor']);
          echo("</td></tr>");
      
      if($_POST['reclamacao_div']!=$row['RECLAMACAO_DIVIDA'])
      {
          if($flag==1)
              $sql.=" , ";   
          $sql.="RECLAMACAO_DIVIDA ='".$_POST['reclamacao_div']."'";
          $flag=1;
      }
          echo("<tr><td>Reclamação da Dívida</td><td>");
          echo($_POST['reclamacao_div']);
          echo("</td></tr>");
      
      if($_POST['penalizacao']!=$row['PENALIZACAO'])
      {
          if($flag==1)
              $sql.=" , ";   
          $sql.="PENALIZACAO ='".$_POST['penalizacao']."'";
          $flag=1;
      }
          echo("<tr><td>Penalização</td><td>"); 
          echo($_POST['penalizacao']);
          echo("</td></tr>");
      
      if($_POST['componentebasica']!=$row['COMPONENTE_BASICA'])
      {
        if($flag==1)
              $sql.=" , ";  
        $sql.="COMPONENTE_BASICA ='".$_POST['componentebasica']."'";
        $flag=1;

      }
        echo("<tr><td>Componente Básica</td><td>");
        echo($_POST['componentebasica']);
        echo("</td></tr>");
      
      if($data_inicio!=$row['DATA_INICIO'])
      {
        if($flag==1)
          $sql.=" , ";  
        $sql.="DATA_INICIO ='".$_POST['data_inicio']."'";
        $flag=1;
      }
        echo("<tr><td>Data Inicio da Oferta</td><td>");
        echo($data_inicio);
        echo("</td></tr>");
      

      if($data_fim!=$row['DATA_FIM'])
      {
        if($flag==1)
          $sql.=" , ";  
        $sql.="DATA_FIM ='".$_POST['data_fim']."'";
        $flag=1;
      }
        echo("<tr><td>Data Fim da Oferta</td><td>");
        echo($data_fim);
        echo("</td></tr>");
      
      if($_POST['debito_direto']!=$row['DEBITO_DIRETO'])
      {
        if($flag==1)
          $sql.=" , ";  
         $sql.="DEBITO_DIRETO ='".$_POST['debito_direto']."'";
        $flag=1;
      }


       echo(" <tr style='text-align:center'>
            <th  colspan='2' scope='col'><br></th>
           
        </tr>");

         echo("<tr><td colspan='2' style='background: #e0dafd; color: red;'><br>2 .Atributos da Oferta<br><br></td></tr>");
       echo(" <tr style='text-align:center'>
            <th scope='col'>Atributo</th>
            <th scope='col'>Valor</th>
        </tr>");


        echo("<tr><td>Débito Direto</td><td>");
        echo($_POST['debito_direto']);
        echo("</td></tr>");
      

      if($_POST['conta_certa']!=$row['CONTA_CERTA'])
      {
         if($flag==1)
          $sql.=" , ";
        $sql.="CONTA_CERTA ='".$_POST['conta_certa']."'";
        $flag=1;
      }
        echo("<tr><td>Conta Certa</td><td>");
        echo($_POST['conta_certa']);
        echo("</td></tr>");
      

      if($_POST['ce']!=$row['CORRESPONDENCIA_ELETRONICA'])
      {
          if($flag==1)
           $sql.=" , ";
          $sql.="CORRESPONDENCIA_ELETRONICA ='".$_POST['ce']."'";
           $flag=1;
      }
          echo("<tr><td>Correspondência Eletrónica</td><td>");
          echo($_POST['ce']);
          echo("</td></tr>");
      

      if($_POST['Entidade_Parceira']!=$row['ENTIDADE_PARCEIRA'])
      {
         if($flag==1)
          $sql.=" , ";
          $sql.="ENTIDADE_PARCEIRA ='".$_POST['Entidade_Parceira']."'";
           $flag=1;       
      }
          echo("<tr><td>Entidade Parceira</td><td>");
          echo($_POST['Entidade_Parceira']);
          echo("</td></tr>");
      

      if($_POST['valor_ep']!=$row['VALOR_EP'])
      { 
          if($flag==1)
          $sql.=" , ";
          $sql.="VALOR_EP ='".$_POST['valor_ep']."'";
           $flag=1;          
        
      }
        echo("<tr><td>Valor EP</td><td>");
          echo($_POST['valor_ep']);
          echo("</td></tr>");
      
      if($_POST['v_benefico_ep']!=$row['VALOR_BENEFICO_EP'])
      {
        if($flag==1)
          $sql.=" , ";
          $sql.="VALOR_BENEFICO_EP ='".$_POST['v_benefico_ep']."'";
           $flag=1;  
      }
      echo("<tr><td>Valor Benéfico EP</td><td>");
      echo($_POST['v_benefico_ep']);
      echo("</td></tr>");
         
      
      if($_POST['unidade_ep']!=$row['UNIDADE_EP'])
      {
          if($flag==1)
            $sql.=" , ";
          $sql.="UNIDADE_EP ='".$_POST['unidade_ep']."'";
           $flag=1;
      }
          echo("<tr><td>Unidade EP</td><td>");
          echo($_POST['unidade_ep']);
          echo("</td></tr>");
      
      if($_POST['aplicado_ep']!=$row['APLICADO_EP'])
      {
        if($flag==1)
          $sql.=" , ";
         $sql.="APLICADO_EP ='".$_POST['aplicado_ep']."'";
        $flag=1; 
      }
        echo("<tr><td>Aplicado EP</td><td>");
        echo($_POST['aplicado_ep']);
        echo("</td></tr>");
      
      if($_POST['obs']!=$row['OBSERVACOES'])
      {
          if($flag==1)
          $sql.=" , ";
          $sql.="OBSERVACOES ='".$_POST['obs']."'";
          $flag=1; 
      }
          echo("<tr><td>Observações</td><td>");
          echo($_POST['obs']);
          echo("</td></tr>");
      

      $resultado = $sql. " WHERE IDOFERTA='" .$row['IDOFERTA']."'";
      if($flag==0)
      {
          $resultado="UPDATE OFERTAS SET IDOFERTA='" . $idoferta . "' WHERE IDOFERTA='" . $idoferta . "'";


      }

      return $resultado;
}


?>



<!DOCTYPE html>

<html lang="en">

<head>
    

    <script src="../jquery.min.js"></script>

  <meta charset="utf-8">

  <title>EDP Fatura&ccedil;&atilde;o</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">

  <meta name="author" content="">



  <!-- Le styles -->

  <link href="../assets/css/bootstrap.css" rel="stylesheet">

  <style type="text/css">

    body {

      padding-top: 60px;

      padding-bottom: 40px;

    }

  </style>



  <style type="text/css" title="currentStyle">

   


  </style>

  <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

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
      <link href="../assets/css/tabela.css" rel="stylesheet">

    </head>

    <body>
    <?php
      

    ?>
    <script src="../ajax/jquery-1.9.1.js"></script>
    <script src="../ajax/jquery-ui.js"></script>
   <!-- <script type="text/javascript" src="../ajax/jquery.form.js"></script> -->
   

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

                <li><a href="../index.php">Inicio</a></li>

                <li ><a href="../listar.php">Listar</a></li>

                <li><a href="../pesquisar.php">Pesquisar</a></li>
                <?php if(login_status()!=1)
                {?>
                <li id="login_li"><a href="#" onclick="esconder()">Login</a></li> <?php } ?>
                
                <li class="dropdown active">

                  <?php 

                  if(login_status()==1)

                  {

                    ?>



                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>

                    <ul class="dropdown-menu">



                      <li class="nav-header">Users</li>

                      <li ><a href="profile.php">Minha Conta</a></li>

                      <li><a href="registar.php">Criar User</a></li>

                      <li><a href="listarusers.php">Gerir Users Existentes </a> </li>

                      <li class="../divider"></li>

                      <li class="nav-header">Ofertas</li>

                      <li><a href="criaroferta.php">Criar Oferta</a></li>

                      <li class="active" ><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>

                      <li class="divider"></li>
         <li class="nav-header">Tarifário</li>
                  <li ><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                      <li class="nav-header">Servidor</li>

                      <li><a href="log.php">Ver Log de Operações</a></li>
                      <li><a href="gerirlinks.php">Gerir Links Rápidos</a></li>


                    </ul>

                  </li>

                  <?php

                }?>

                

              </ul>



              <div class="navbar-form pull-right"> 

                <ul class="nav">

                  <li style="line-height:15px"> <br><font color="white"> <?php

                    echo("Bem Vindo <a href=profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");

                    echo ("<a href='logout.php'>  [Logout]</a>")

                    ?></font></ul></li></div>



                  </div><!--/.nav-collapse -->

                </div>

              </div>

            </div>

            <!----------------------------------BODY------------------------------------>

            <?php

            $result = mysqli_query($mysqli,"SELECT *  FROM OFERTAS WHERE IDOFERTA='" . $idoferta . "' LIMIT 1"); 

            $row = mysqli_fetch_array($result);
            $resultcondicoes = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' ORDER BY IDCONDICAO_OFERTA ASC");
            $sqle="SELECT * FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=2 ORDER BY IDRESTRICAO_OFERTA ASC";
            $sqlgn="SELECT * FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=1 ORDER BY IDRESTRICAO_OFERTA ASC";
            $sqlserv="SELECT * FROM SERVICO_ESTRUTURADO WHERE idoferta='" . $idoferta . "' ORDER BY id_servico_estruturado ASC"; 
            $resultrestricoese = mysqli_query($mysqli,$sqle);
            $resultrestricoesgn = mysqli_query($mysqli,$sqlgn);
            $resultrestricoesserv= mysqli_query($mysqli,$sqlserv);
            //echo "teste2 == SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' ORDER BY IDCONDICAO_OFERTA ASC<br>";
        
            ?>

            <div class="container">
              <div id="teste1">


              <br>


              <fieldset align="center" >

                  <hr style="border-color:#f00; background-color: #f00;">      
              <h4> Editar Oferta nº [<?php echo($idoferta);?>]</h4>
              <hr style="border-color:#f00; background-color: #f00;">  


              <br>
              <h5> Antes de efetuar as alterações a esta oferta, por favor , confirme as alterações que vão ser efetuadas, </h5>


              
              <br>
               <table id="box-table-a" border="1" align="center" summary="Lista de Utilizadores">
            
    <thead>
       
    </thead>
        
    
    <tbody align="center">
              <?php
                $sqlcondicoes=array();
                $sqlcondicoes[0]=verificaralteracoesofr($row);
                $sqlcondicoes=alteracoesofrcond($resultcondicoes,$resultrestricoese,$resultrestricoesgn,$resultrestricoesserv,$idoferta,$sqlcondicoes);
              ?>
    </tbody>
</table>


<hr>
<h5>Confirma Alterações?</h5>
  
               <br><button name="sim" id="sim" class="btn btn-primary btn-medium" >Sim</button>
                <button class="btn btn-primary btn-medium"  onclick="window.history.back()">Não</button>



            </fieldset>
    </div>

     <input id="query" name="query" type="hidden" value="<?php echo $resultado;  ?>"/>
     <input id="idofertavar" name="idofertavar" type="hidden" value="<?php echo ($_POST['id']); ?>"/>
     <input id="nomeoferta" name="nomeoferta" type="hidden" value="<?php echo ($_POST['nomeofr']); ?>"/>

    <div align="center" id="teste2">

    </div>
    <br><br><br>

    
      <br><br><br>
      
      <hr>

   <?php
        include('../cabecalho.php');
        ?>
   
      </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- No final do documento para acelarar carregamento da pagina-->
    
     <script language="javascript" type="text/javascript">
     
    $(document).ready(function()
    {   
         $("#sim").on('click', function() {
            var jArray = <?php echo json_encode($sqlcondicoes); ?>;
            var resultado = $('#query').val();
            //alert(resultado);
            var idoferta = $('#idofertavar').val();
            var condicoes= $('#sqlcondicoes1').val();
            var nomeoferta=$('#nomeoferta').val();
            
           /* for(var i=0;i<jArray.length;i++){
                console.log(jArray[i]);
            }*/ 

          
          $.ajax({
                    url: "../ajax/editaroferta_pedido.php",
                    type: "POST",
                    data: { dados : jArray, idoferta : idoferta , nomeoferta : nomeoferta },
                    datatype: "json"
                  }).done(function( resposta ) {
                   
                    $("#teste1").empty();
                    $("#teste2").append(resposta);
          }); 

      }); 

           /*$.post("../ajax/editaroferta_pedido.php", {dados: resultado,condicoes: condicoes, idoferta: idoferta}, function(resposta) { 
                   //alert("ola");
                 //document.getElementById('teste1').style.display = 'none';
                 //document.getElementById('teste2').style.display = 'block';
                 $("#teste1").empty();
                 $("#teste2").append(resposta);
            });

            });*/ 


    //-->
    });
    </script>
             <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="../chilistats/stats.php"><img src="../chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="../chilistats/stats.php"><img src="../chilistats/counter.php" /></a></noscript>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>

  </html>