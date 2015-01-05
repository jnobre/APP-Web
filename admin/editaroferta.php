<?php

session_start();



include('../mysql.php');

include('../mysqlconnect.php');

include('../login_status.php');



$idoferta=$_GET['IDOFERTA'];

function gettarifas_gas($nome_tarifario,$nome_empresa)
  { 
    if($nome_tarifario == '1')
    {
      $sql="SELECT * FROM EMPRESAS_DISTRIBUIDORAS";
      $result=mysql_query($sql) or die(mysql_error());   
    }
    else
    {
      $sql="SELECT ESTRUTURA_TARIFARIO FROM EMPRESAS_DISTRIBUIDORAS WHERE NOME_TARIFARIO='".$nome_tarifario."' AND NOME_EMPRESA='".$nome_empresa."'";
      $result=mysql_query($sql) or die(mysql_error());
    }
      return $result;
  }

    function gettarifas($tipo)
    { 
        // Buscar lista de utilizadaores
        $sql="SELECT * FROM ".$tipo;
        $result=mysql_query($sql) or die(mysql_error());
        return $result;
    }







?>



<!DOCTYPE html>

<html lang="en">

<head>
    

    <script src="../jquery.min.js"></script>
    
<script language="javascript"> 
        


  
 
 function carateres(nome1,nome2,lim){
       var txtBoxRef = document.querySelector("#"+nome1);
       var counterRef = document.querySelector("#"+nome2);
        txtBoxRef.addEventListener("input",function(){
        var remLength = 0;
        remLength = lim - parseInt(txtBoxRef.value.length);
        if(remLength < 0)
         {
          txtBoxRef.value = txtBoxRef.value.substring(0, lim);
           return false;
         }
         
           counterRef.value=remLength;
          },true);
}





        var controlo =0;
        var teste=0;
        $(document).ready(function() {
             $("#botao_actualiar_gas").on('click', function() {
            //alert("Ola mundo!"); 
            var selecionado = 2; 
            $("#select_gas").html("<option> Carregando...</option>"); 
                                            
            $.post("../ajax/busca_oferta.php", {select_gas: teste}, function(resposta) { 
                // Limpa a mensagem de carregamento 
                $("#select_gas").empty(); 
                
                // Coloca as input de id tarifario na DIV 
                $("#select_gas").append(resposta); 
                
                selecionado = $("#select_gas option:selected").val(); 
                console.log(selecionado);
                $("#select_gas").val(selecionado).trigger('change');
                //console.log($("#select_gas").val(selecionado));
                
                //$("#nome_tarifario_gas").empty(); 
                // Coloca as input de id tarifario na DIV 
                //$("#nome_tarifario_gas").append("<input class='span4'  type='text' value='"+selecionado+"' name='select_id_gas' id='select_id_gas'  readonly=true>"); 
                //forçar o evento select_gas
                //hm... interessante... o trigget nao funca com o change...
                //$("#select_gas").trigger("change");       
                //a que dar a volta a questao..
                                
                // $("#select_gas").change();
                
            });
            
             
        });

          // Quando seleciona outro plano de gas
        $("#select_gas").on('change', function() {
            console.log("change selct_gas");
            // Recuperar nome tarifario selecionado 
            var selecionado = $("#select_gas option:selected").val(); 
            // Mensagem de carregando 
            $("#nome_tarifario_gas").html("Carregando..."); 
            // Faz requisição ajax e envia o nome do selcionado via método POST 
            $.post("../ajax/busca_oferta.php", {nome_tarifario_gas: selecionado}, function(resposta) { 
                // Limpa a mensagem de carregamento 
                $("#nome_tarifario_gas").empty(); 
                // Coloca as input de id tarifario na DIV 
                $("#nome_tarifario_gas").append(resposta); 
            }); 
        });



          $("#select_electricidade").on('change', function() {
             // Recuperar nome tarifario selecionado 
             var selecionado = $("#select_electricidade option:selected").val(); 
             // Mensagem de carregando 
             $("#nome_tarifario_electricidade").html("Carregando..."); 
             // Faz requisição ajax e envia o nome do selcionado via método POST 
             $.post("../ajax/busca_oferta.php", {nome_tarifario_electricidade: selecionado}, function(resposta) { 
                 // Limpa a mensagem de carregamento 
                 $("#nome_tarifario_electricidade").empty(); 
                 // Coloca as input de id tarifario na DIV 
                 $("#nome_tarifario_electricidade").append(resposta);
                 
                //$("select#meu_select").trigger("change");
             }); 
         }); 

          $("#botao_actualiar_electricidade").on('click', function() {
             //alert("Ola mundo!"); 
              var selecionado = 2; 
                  var teste = 0;

              $("#select_electricidade").html("<option> Carregando...</option>"); 
                                              
              $.post("../ajax/busca_oferta.php", {select_electricidade: teste}, function(resposta) { 
                  // Limpa a mensagem de carregamento 
                  $("#select_electricidade").empty(); 
                  
                  // Coloca as input de id tarifario na DIV 
                  $("#select_electricidade").append(resposta); 
                  
                  selecionado = $("#select_electricidade option:selected").val(); 
                  console.log(selecionado);
                  $("#select_electricidade").val(selecionado).trigger('change');
              });
          });









              //$(#tr99).hide(); //ver 1 
              carateres("id",'counterBoxid',10);
              carateres("nomeofr",'counterBoxnomeofr',40);
              carateres("reclamacao_div","counterBoxreclamacao",30);
              carateres("penalizacao","counterBoxpenalizacao",120);
              carateres("obs","counterBoxobs",750);

        });
        
        var conta_gn = 1;
        var conta_e = 1;
        var conta_serv = 1;
        var conta = 1;
        var conta_serv=1;

       function removeLinha(id){
               var teste = document.getElementById(id);
               console.log(id);
               teste.parentNode.parentNode.removeChild(teste.parentNode);
        }

        function novaLinha(tabela_name,nome_campo1,id_campo1,nome_campo2,id_campo2,botao_nome){
    
                //alert(tabela_name+" / "+nome_campo1+" / "+id_campo1+" / "+nome_campo2+" / "+id_campo2+" / "+botao_nome);
                var aux = "";
                var aux2 = "";
                var tmp=0;
                if(tabela_name == 'table_condicao')
                {
                    //alert("tabela_condicao");
                    aux = "condicao_"+ conta;
                    conta++;  
                    tmp=conta;
                    aux2 = "condicao_"+ conta;
                    var span=6;
                    var parte0 ="<tr  class='hero-unit'><td   width='20%' align='left'><label> "+nome_campo1+":</label></td>";
                    var parte1 ="<td align='left'><input class='span"+span+"'  type='text' placeholder='"+nome_campo1+"'  name='"+id_campo1+tmp+"' id='"+id_campo1+tmp+"'></td></tr>";
                    var parte2 ="<tr  class='hero-unit'><td   width='20%' align='left'><label>"+nome_campo2+":</label></td>";
                    var parte3 ="<td align='left'><input class='span"+span+"'  type='text' placeholder='"+nome_campo2+"'  name='"+id_campo2+tmp+"' id='"+id_campo2+tmp+"'>";             
                    var parte4 ="<tr class='hero-unit' ><td id='table_linha_" + aux2 + "' align='left' colspan='2'><input type='button' class='btn btn-danger btn-mini' name='"+botao_nome+"' id='"+botao_nome+"' value='+' onClick=\"javascript:novaLinha('"+tabela_name+"','"+nome_campo1+"','"+id_campo1+"','"+nome_campo2+"','"+id_campo2+"','"+botao_nome+"')\"></input> ";
                }
                else if(tabela_name == 'table_restricao_gn')
                {
                    //alert("tabela_restricao_gn");
                    var span=4;
                    aux = "restricao_gn_"+conta_gn;
                    conta_gn++;
                    tmp=conta_gn;
                    aux2 = "restricao_gn_"+conta_gn;
                     var parte0 ="<tr  class='hero-unit'><td   valign='top' colspan='2'><label> "+nome_campo1+":</label>";
                    var parte1 ="<input class='span"+span+"'  type='text' placeholder='"+nome_campo1+"'  name='"+id_campo1+tmp+"' id='"+id_campo1+tmp+"'><br></td></tr>";
                    var parte2 ="<tr  class='hero-unit'><td  colspan='2' ><label>"+nome_campo2+":</label>";
                    var parte3 ="<input class='span"+span+"'  type='text' placeholder='"+nome_campo2+"'  name='"+id_campo2+tmp+"' id='"+id_campo2+tmp+"'><br></td></tr>";             
                    var parte4 ="<tr class='hero-unit' ><td id='table_linha_" + aux2 + "' align='left' colspan='2'><input type='button' class='btn btn-danger btn-mini' name='"+botao_nome+"' id='"+botao_nome+"' value='+' onClick=\"javascript:novaLinha('"+tabela_name+"','"+nome_campo1+"','"+id_campo1+"','"+nome_campo2+"','"+id_campo2+"','"+botao_nome+"')\"></input> ";
                }
                else if(tabela_name == 'table_restricao_e')
                { 
                    //alert("tabela_restricao_e");
                    var span=4;
                    aux = "restricao_e_"+conta_e;
                    conta_e++;
                    tmp=conta_e;
                    aux2 = "restricao_e_"+conta_e;
                    var parte0 ="<tr  class='hero-unit'><td   valign='top' colspan='2'><label> "+nome_campo1+":</label>";
                    var parte1 ="<input class='span"+span+"'  type='text' placeholder='"+nome_campo1+"'  name='"+id_campo1+tmp+"' id='"+id_campo1+tmp+"'><br></td></tr>";
                    var parte2 ="<tr  class='hero-unit'><td  colspan='2' ><label>"+nome_campo2+":</label>";
                    var parte3 ="<input class='span"+span+"'  type='text' placeholder='"+nome_campo2+"'  name='"+id_campo2+tmp+"' id='"+id_campo2+tmp+"'><br></td></tr>";             
                    var parte4 ="<tr class='hero-unit' ><td id='table_linha_" + aux2 + "' align='left' colspan='2'><input type='button' class='btn btn-danger btn-mini' name='"+botao_nome+"' id='"+botao_nome+"' value='+' onClick=\"javascript:novaLinha('"+tabela_name+"','"+nome_campo1+"','"+id_campo1+"','"+nome_campo2+"','"+id_campo2+"','"+botao_nome+"')\"></input> ";
                }
                else if(tabela_name=='table_serv_estruturado')
                {
                      
                    var span=5;
                    aux = "serv_estruturado_"+conta_serv;
                    conta_serv++;
                    tmp=conta_serv;
                    aux2="serv_estruturado_"+conta_serv;
                    var parte0 ="<tr  class='hero-unit'><td align='left'><label> ID Serviço Estruturado:</label></td><td><input class='span"+span+"'  type='text' placeholder='ID Serviço Estruturado' name='ID_SERVICO_ESTRUTURADO_"+tmp+"' id='ID_SERVICO_ESTRUTURADO_"+tmp+"'></input></td></tr>";
                    var parte1 ="<tr  class='hero-unit'><td align='left'><label>Serviço Estruturado:</label></td><td><input class='span"+span+"'  type='text' placeholder='Serviço Estruturado' name='SERVICO_ESTRUTURADO_"+tmp+"' id='SERVICO_ESTRUTURADO_"+tmp+"'></input></td></tr>";
                    var parte2 ="<tr  class='hero-unit'><td align='left'><label> Estado do Serviço:</label></td><td><input class='span"+span+"'  type='text' placeholder='Estado do Serviço' name='ESTADO_SERVICO_"+tmp+"' id='ESTADO_SERVICO_"+tmp+"'></input></td></tr>";
                    var parte3 ="<tr  class='hero-unit'><td align='left'><label>Obrigatoriedade:</label></td><td><input class='span"+span+"'  type='text' placeholder='Obrigatoriedade' name='OBRIGATORIEDADE_"+tmp+"' id='OBRIGATORIEDADE_"+tmp+"'></input></td></tr>";
                    var parte4 ="<tr class='hero-unit' ><td colspan='2' id='table_linha_" + aux2 + "' align='left'><input type='button' class='btn btn-danger btn-mini' name='"+botao_nome+"' id='"+botao_nome+"' value='+' onClick=\"javascript:novaLinha('"+tabela_name+"','custom','custom','custom','custom','"+botao_nome+"')\"></input> ";       

                }

               //alert("nome do campo == "+id_campo1+tmp);
              
                //alert("Antigo table_linha_" + aux +" Novo table_linha_" + aux2);   
                removeLinha("table_linha_" + aux);
                //window.alert("Foi adicionado Campo com ID: "+id_campo1 + tmp );
                //window.alert(id_campo1);
                //window.alert(tmp);
               // document.getElementById(tabela_name).innerHTML += parte0 + parte1 + parte2 + parte3 + parte4;
                //document.getElementById(tabela_name).innerHTML += "</td></tr>";
                $("#"+tabela_name).append(parte0 + parte1 + parte2 + parte3 + parte4 + "</td></tr>");

      }
    
        var state = 'block';
        
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
      
    var controlo1=1;
    function errorbox(){
       window.alert("Erro no Login!");
        return true;
    }
    
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
        
   


    window.onload = function(){
         $("#login").hide();
     }
    }
//--> 
</script> 
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



                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">Gerir</font> <b class="caret"></b></a>

                    <ul class="dropdown-menu">



                      <li class="nav-header">Users</li>

                      <li ><a href="profile.php">Minha Conta</a></li>

                      <li><a href="registar.php">Criar User</a></li>

                      <li><a href="listarusers.php">Gerir Users Existentes </a> </li>

                      <li class="../divider"></li>

                      <li class="nav-header">Ofertas</li>

                      <li><a href="criaroferta.php">Criar Oferta</a></li>

                      <li class="active" ><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>

                      <li> <a href="upload_ficheiro.php">Upload Ficheiro</a> </li>

                      <li class="divider"></li>
                      <li class="nav-header">Tarifário</li>
                      <li ><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                      <li><a href="gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                      <li class="divider"></li>
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



            ?>

            <div class="container">



              <br>





              <!-- TABELA PRINCIPAL -->
               <form method="post" action=<?php echo("editaroferta2.php?IDOFERTA=" . $idoferta);?> name="editar">   
              <fieldset align="center" >

                <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF;" >
                      
                  <tr>

                    <td colspan = "2"><label>

                        <h3>Editando Oferta nº <?php echo $idoferta ?> </h3>
                        <hr>
                    
                    </label></td>            

                  </tr>
                
                    <!-- <a href="#" onclick="removeLinha('teste1');">hide me</a>
                      <a href="#" onclick="mostrar();">Show me</a>-->
                  <tr>
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
                           
                            <input readonly style=" text-align:center;"  class="span2" type="text" placeholder="ID" name="id" id="id" value=<?php echo $row['IDOFERTA'] ?>> 
                            <input disabled style=" text-align:center;" class="span0" type="text"  placeholder="10" name="counterBoxid" id="counterBoxid">
                           
                            
                            
                          </td>

                        </tr>

                        <tr  class="hero-unit">

                          <td valign="top" colspan="2">

                            <label><u>Nome Oferta:</u></label> 

                            <input style=" text-align:center;"  class="span3" type="text" placeholder="Nome" id="nomeofr" name="nomeofr" value="<?php echo $row['NOME'] ?>">   
                             <input disabled style=" text-align:center;" class="span0" type="text"  placeholder="40" name="counterBoxnomeofr" id="counterBoxnomeofr">

                          </td>

                        </tr>

                        <tr  class="hero-unit">

                         <td valign="top">

                          <label><u> Estado:</u></label> 

                          <input disabled style=" text-align:center;"  class="span2" type="text" placeholder="Estado" name="estado" value="<?php echo $row['ESTADO'] ?>">   <br>

                        </td>

                        <td valign="top">

                          <label><u> Componente Básica:</u></label> 
                            <?php $componentebasica=$row['COMPONENTE_BASICA'];?>
                          <input style=" text-align:center;" readonly class="span2" type="text" placeholder="Componente" name="componentebasica" value="<?php echo $componentebasica;?>">   <br>



                        </td>

                 </tr>

                <tr  class="hero-unit">

                      <td valign="top" >

                        <label ><u>Data Inicio:</u></label> 

                        <input style=" text-align:center;"  class="span2" type="date" name="data_inicio" value=<?php $d = new DateTime($row['DATA_INICIO']); echo ($d->format("Y-m-d"));  ?>> <br>

                      </td>

                      <td valign="top">

                        <label><u> Data Fim:</u></label> 

                        <input style=" text-align:center;"  class="span2" type="text" name="data_fim" value=<?php $d = new DateTime($row['DATA_FIM']); echo ($d->format("Y-m-d"));  ?>> <br>   

                      </td>

                </tr>         

                    <tr  class="hero-unit">

                      <td valign="top" >    

                        <label><u>Dura&ccedil;&atilde;o:</u></label> 

                        <input style=" text-align:center;"  class="span1" type="text" placeholder="Dura&ccedil;&atilde;o" name="duracao"  value=<?php echo $row['DURACAO'] ?>>   <br>

                      </td>
                      <td valign="top" >   

                        <label><u>Valor:</u></label> 

                        <input style=" text-align:center;"  class="span1" type="text" placeholder="Valor" name="valor"  value=<?php echo $row['VALOR'] ?>>   <br>

                      </td>

                  </tr>

                  <tr  class="hero-unit">

                      <td valign="top" colspan="2">  

                        <label><u>Reclama&ccedil;&atilde;o da D&iacute;vida:</u></label> 

                        <input style=" text-align:center;"  class="span2" type="text" placeholder="Reclama&ccedil;&atilde;o da D&iacute;vida" id="reclamacao_div" name="reclamacao_div" value=<?php echo $row['RECLAMACAO_DIVIDA'] ?> >        
                         <input style=" text-align:center;" class="span0" type="text"  placeholder="30" name="counterBoxreclamacao" id="counterBoxreclamacao">
                      </td>

                  </tr>

                  <tr  class="hero-unit">

                      <td valign="top" colspan="2">

                        <label><u>Penaliza&ccedil;&atilde;o:</u></label> 

                        <textarea name="penalizacao" id="penalizacao" style="width: 450px; height: 40px;" ><?php echo $row['PENALIZACAO'] ?></textarea>
                          <input style=" text-align:center;" class="span0" type="text"  placeholder="120" name="counterBoxpenalizacao" id="counterBoxpenalizacao"> 
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
                <select name="debito_direto"  style="width:175px">
                  <?php 
                    if($row['DEBITO_DIRETO']=="Obrigatório")
                    {
                      ?>
                      <option selected="selected" value="Obrigatório">Obrigatório</option>
                    <?php
                    }
                    else
                    {
                      ?>
                         <option value="Obrigatório">Obrigatório</option>
                        <?php

                    }
                    if($row['DEBITO_DIRETO']=="Facultativo")
                    {



                      ?>
                      <option selected="selected" value="Facultativo">Facultativo</option>
                      <?php
                    }
                    else
                    {
                      ?>
                      <option value="Facultativo">Facultativo</option>
                        <?php
                    }
                    if($row['DEBITO_DIRETO']=="N/A")
                    {


                      ?>
                      <option selected="selected" value="N/A">N/A</option>
                      <?php
                    }      
                    else
                    {
                      ?>

                      <option value="N/A">N/A</option>
                      <?php
                    } 
                    ?>  

                  
                </select>
               

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Conta Certa:</u></label> 

                  <select name="conta_certa"  style="width:175px">
                  <?php 
                    if($row['CONTA_CERTA']=="Obrigatório")
                    {
                      ?>
                      <option selected="selected" value="Obrigatório">Obrigatório</option>
                    <?php
                    }
                    else
                    {
                      ?>
                         <option value="Obrigatório">Obrigatório</option>
                        <?php

                    }
                    if($row['CONTA_CERTA']=="Facultativo")
                    {



                      ?>
                      <option selected="selected" value="Facultativo">Facultativo</option>
                      <?php
                    }
                    else
                    {
                      ?>
                      <option value="Facultativo">Facultativo</option>
                        <?php
                    }
                    if($row['CONTA_CERTA']=="N/A")
                    {


                      ?>
                      <option selected="selected" value="N/A">N/A</option>
                      <?php
                    }      
                    else
                    {
                      ?>

                      <option value="N/A">N/A</option>
                      <?php
                    } 
                    ?>  

                  
                </select>
               <br>

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Correspond&ecirc;ncia Eletr&oacute;nica:</u></label> 


                 <select name="ce"  style="width:175px">
                  <?php 
                    if($row['CORRESPONDENCIA_ELETRONICA']=="Obrigatório")
                    {
                      ?>
                      <option selected="selected" value="Obrigatório">Obrigatório</option>
                    <?php
                    }
                    else
                    {
                      ?>
                         <option value="Obrigatório">Obrigatório</option>
                        <?php

                    }
                    if($row['CORRESPONDENCIA_ELETRONICA']=="Facultativo")
                    {



                      ?>
                      <option selected="selected" value="Facultativo">Facultativo</option>
                      <?php
                    }
                    else
                    {
                      ?>
                      <option value="Facultativo">Facultativo</option>
                        <?php
                    }
                    if($row['CORRESPONDENCIA_ELETRONICA']=="N/A")
                    {


                      ?>
                      <option selected="selected" value="N/A">N/A</option>
                      <?php
                    }      
                    else
                    {
                      ?>

                      <option value="N/A">N/A</option>
                      <?php
                    } 
                    ?>  

                  
                </select>
                

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Entidade Parceira:</u></label> 
                 <select name="Entidade_Parceira"  style="width:175px">
                  <?php 
                    if($row['ENTIDADE_PARCEIRA']=="Obrigatório")
                    {
                      ?>
                      <option selected="selected" value="Obrigatório">Obrigatório</option>
                    <?php
                    }
                    else
                    {
                      ?>
                         <option value="Obrigatório">Obrigatório</option>
                        <?php

                    }
                    if($row['ENTIDADE_PARCEIRA']=="Facultativo")
                    {



                      ?>
                      <option selected="selected" value="Facultativo">Facultativo</option>
                      <?php
                    }
                    else
                    {
                      ?>
                      <option value="Facultativo">Facultativo</option>
                        <?php
                    }
                    if($row['ENTIDADE_PARCEIRA']=="N/A")
                    {


                      ?>
                      <option selected="selected" value="N/A">N/A</option>
                      <?php
                    }      
                    else
                    {
                      ?>

                      <option value="N/A">N/A</option>
                      <?php
                    } 
                    ?>  

                  
                </select>


              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Valor EP:</u></label>

                <input style=" text-align:center;"  class="span2" type="text" placeholder="Valor EP" name="valor_ep" value=<?php echo $row['VALOR_EP'] ?>>  <br> 

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Valor Ben&eacute;fico EP:</u></label> 

                <input style=" text-align:center;"  class="span2" type="text" placeholder="Valor Ben&eacute;fico EP" name="v_benefico_ep" value=<?php echo $row['VALOR_BENEFICO_EP'] ?>>   <br>

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Unidade EP:</u></label> 

                <input style=" text-align:center;"  class="span2" type="text" placeholder="Unidade EP" name="unidade_ep" value=<?php echo $row['UNIDADE_EP'] ?>>   <br>

              </td>

            </tr>



            <tr class="hero-unit" >

              <td valign="top" colspan="2">

                <label><u>Aplicado EP:</u></label> 

                <input style=" text-align:center;"  class="span2" type="text" placeholder="Aplicado EP"  name="aplicado_ep" value=<?php echo $row['APLICADO_EP'] ?>> <br> 

              </td>

            </tr>
            <tr  class="hero-unit">

              <td valign="top" colspan="2">

                <label><u>Observações:</u></label> 

                <textarea  name="obs" id="obs" style="width: 450px; height: 40px;" ><?php echo $row['OBSERVACOES'] ?></textarea>
                <input disabled style=" text-align:center;" class="span0" type="text"  placeholder="750" name="counterBoxobs" id="counterBoxobs">

                    <!--<input class="span4"  type="text" placeholder="Penaliza&ccedil;&atilde;o" name="penalizacao" value=""   <br>

                  -->

                </td>

              </tr>

          </table>

        </fieldset>
      </td>



    </tr>
    
   




    <tr>

      <td colspan="2" id="condicoes">

        

        

        <!-- TABELA CONDICOES -->

        <?php

        $resultcondicoes = mysqli_query($mysqli,"SELECT *  FROM CONDICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' ORDER BY IDCONDICAO_OFERTA ASC"); 



        ?>

        <fieldset align="center" >
        <br><br>
          <table  valign="top" id="table_condicao" width='96%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;" >

            <tr valign="top" class="hero-unit">

              <td WIDTH="200" HEIGHT="30"   valign="top" colspan = "2"><label>

                <h3>3. Condições da Oferta</h3>

              </label></td>            

            </tr>

            <?php



            if($resultcondicoes->num_rows==0)
            {
              $_SESSION['cond']=0;
              ?>



              <tr  class="hero-unit" valign="top" >

                <td  valign="top" align="center" width="20%" colspan="2"><label>

                  Sem dados acerca das condições actuais desta oferta

                </label>

              </td>   

            </tr>



            <?php





          }

          else

          {
             $count=1;
            while($rowcondicoes = mysqli_fetch_array($resultcondicoes))
            {         
                $ids[$count]=$rowcondicoes['IDCONDICAO_OFERTA'];
                
                
              ?>

              <tr  valign="top" class="hero-unit" >

                <td align="left" width="20%">

                  <label>Condi&ccedil;&atilde;o da Oferta:</label>
                
                  </td>
              <td align="left" width="80%">

                <input class="span6"  type="text" placeholder="Condi&ccedil;&atilde;o da Oferta"  name="condicao_oferta_update_<?php echo $count ?>" id="condicao_oferta_update_<?php echo $count ?>" value="<?php echo $rowcondicoes['CONDICAO_OFERTA']; ?>"> 
              </td>
            </tr>
            <tr  class="hero-unit">
              <td  align="left" width="20%">
               
                  <label>Valor da Condi&ccedil;&atilde;o:</label>
                
              </td>
              <td align="left" width="80%">
                <input class="span6"  type="text" placeholder="Valor da Oferta"  name="valor_oferta_update_<?php echo $count ?>" id="valor_oferta_update_<?php echo $count ?>" value="<?php echo $rowcondicoes['VALOR_CONDICAO'] ?>" >
              </td>

            </tr>

            <?php
            $count+=1;
          }
        }
        ?>
         <tr class="hero-unit"> 
               <td id="table_linha_condicao_1" align="left" colspan="2">                                                    
                       
                       <input type="button" class="btn btn-danger btn-mini" name="botao_condicao_1" id="botao_condicao_1" value="+" onClick="javascript:novaLinha('table_condicao','Condi&ccedil;&atilde;o da Oferta:','condicao_oferta_','Valor da Condi&ccedil;&atilde;o:','valor_oferta_','botao_condicao_1')"></input>
                         
              </td>
        </tr>

  <!-- <tr  valign="top" class="hero-unit" >

              <td valign="top" align="left" width="20%">

                <label>
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

            </tr>-->
      </table>
    </fieldset>
    <br><br>
  </td>
  </tr>

  <?php
    
    if(stripos($componentebasica,'E') !== false)
    {

?>
    

<tr>
  <td valign="top">
   <!-- TABELA ELECTRICIDADE-->

   <fieldset align="center" >

    <table  id="ELET" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit" >
        <td WIDTH="200" HEIGHT="30"  valign="top" align="center" colspan="2">
          <label>
            <h3> 4.Electricidade:</h3>
          </label>
        </td>     

      </tr>
      <tr  class="hero-unit">
        <td  valign="top " colspan="2">
         <label><u>ID Componente Estruturada Eletricidade:</u> </label>
         <input style=" text-align:center;"  id="id_componente_electricidade" class="span4" type="text" placeholder="ID Componente Estruturada Eletricidade"  name="id_componente_electricidade" value="<?php echo $row['ID_ESTRUTURADA_E'] ?>"> <br> 

       </td>
     </tr>  
     <tr  class="hero-unit">
      <td  valign="top " colspan="2">
       <label><u>Componente Estruturada Eletricidade:</u> </label>
       <input style=" text-align:center;"  class="span4" type="text" placeholder="Componente Estruturada Eletricidade"  id="componente_electricidade" name="componente_electricidade" value="<?php echo $row['COMPONENTE_ESTRUTURADA_E'] ?>"> <br> 

      </td>
     </tr>
     <?php
    $ete=$row['ID_ESTRUTURA_TARIFARIA_E'];
    ?>
   <tr  class="hero-unit">
   <td  valign="top" colspan="2">
        <label>ID Estrutura Tarif&aacute;ria: </label>
        <!--<select id="select_id_electricidade" name="select_id_electricidade" class="span4"
        </select>-->
         <div id="nome_tarifario_electricidade">
         <input class="span4"  type="text" value="<?php echo $ete ?>" name="select_id_electricidade" id="select_id_electricidade"  readonly=true> 
         </div>
        </td>  
 </tr>  
 <tr  class="hero-unit">
 <td  valign="top " colspan="2">
         <label>Estrutura Tarif&aacute;ria:&nbsp; &nbsp;<button type='button' id="botao_actualiar_electricidade" name="botao_actualiar_electricidade" class="btn btn-mini"><img src="../assets/ico/icon_factory_reset.png" alt="Refresh" width="20" height="15"></button> </label> 
         <div id="select_electricidade_js">
         <select id="select_electricidade" name="select_electricidade" class="span4">
           <?php
             $result_e=gettarifas("ELECTRICIDADE");
             while($row_e = mysql_fetch_array($result_e))
             {
                 $nome=$row_e['NOME']; 
                 if($row['ESTRUTURA_TARIFARIA_E']==$nome)
                 {                               
                     echo("<option  value='".$nome."' selected>".$nome."</option>");                           
                 }
                 else
                 {


                    echo("<option  value='".$nome."'>".$nome."</option>");                           


                 }

             }
            
           ?>
         </select>
         </div>
 </td>
</tr>  
</table>
</fieldset>
</td>

<td valign="top" id="RESELET">
    
    <!-- TABELA Restrições Eletricidade -->
  <?php
  $resultrestricoese = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=2 ORDER BY IDRESTRICAO_OFERTA ASC"); 

  ?>
    <fieldset align="center" >
        <table id="table_restricao_e"  width='87%' height='50%'  align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
              <tr  class="hero-unit">
                <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
                  <label>
                    <h3> 4.1 Restrições Eletricidade: </input></h3>
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
              $counte=0;
              while($rowrestricoese = mysqli_fetch_array($resultrestricoese))
              {
                ?>
                <tr  class="hero-unit">
                  <td  valign="top " colspan="2">
                   <label>Restrição: </label>
                   <input style=" text-align:center;" name="restricao_e_<?php echo($counte);?>" id="restricao_e_<?php echo($counte);?>" class="span4" type="text" placeholder="Restrição"  name="restricao" value="<?php echo $rowrestricoese['RESTRICAO'] ?>"> <br> 
        
                 </td>
               </tr>  
        
               <tr  class="hero-unit">
                <td  valign="top " colspan="2">
                  <label>Valor da Restrição: </label>
                  <input style=" text-align:center;"  name="valor_restricao_e_<?php echo($counte);?>" id="valor_restricao_e_<?php echo($counte);?>" class="span4" type="text" placeholder="Valor da Restrição"  name="restricao" value="<?php echo $rowrestricoese['VALOR_RESTRICAO'] ?>"> <br> 
                </td>
              </tr>     
              <?php
              $counte=$counte+1;
            }
          }
          ?>                 
          <tr class="hero-unit">
            <td id="table_linha_restricao_e_1" align="left" colspan="2">    
              <input type="button" class="btn btn-danger btn-mini btn-danger" id="botao_restricao_electricidade"  value="+" onClick="javascript:novaLinha('table_restricao_e','Restri&ccedil;&atilde;o','nv_restricao_e_','Valor da Restri&ccedil;&atilde;o','nv_valor_restricao_e_','botao_restricao_electricidade')"></input>   
            </td>
          </tr>
        </table>
        </fieldset>
            </td>
     </tr>
     
     
     
<?php
}

if(stripos($componentebasica,'G') !== false)
{
 
?>
<td colspan="2"><br><br></td>
    </tr>


    
<tr>
  <td valign="top" id="GAS">
    
    <!--TABELA GAS -->
    <fieldset align="center" >
     <table   width='87%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
      <tr  class="hero-unit" >
        <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
          <label>
            <h3> 5. G&aacute;s:   </h3>
          </label>
        </td>     

      </tr>
      <tr class="hero-unit" >
        <td valign="top" colspan="2">
          <label><u>ID Componente Estruturada Gás</u></label> 
          <input style=" text-align:center;"  class="span4" type="text" placeholder="ID Componente"  name="ID_Componente_Estruturada_Gas" value="<?php echo $row['ID_ESTRUTURADA_GN'] ?>"> <br> 
        </td>
      </tr>
      <tr class="hero-unit" >
        <td valign="top" colspan="2">
          <label><u>Componente Estruturada Gás</u></label> 
          <input style=" text-align:center;"  class="span4" type="text" placeholder="Componente Estruturada Gas"  name="Componente_Estruturada_Gas" value="<?php echo $row['COMPONENTE_ESTRUTURADA_GN'] ?>"> <br> 
        </td>
      </tr>
      
      <tr class="hero-unit">
          <td  valign="top" colspan="2">
                  <label>Estrutura Tarif&aacute;ria:&nbsp; &nbsp;<button type='button' id="botao_actualiar_gas" name="botao_actualiar_gas" class="btn btn-mini"><img src="../assets/ico/icon_factory_reset.png" alt="Refresh" width="20" height="15"></button> </label>
                  <div id="select_gas_js"> 
                  <select id="select_gas" name="select_gas" class="span4">
                   <?php
                      $result_gn=gettarifas_gas('1','1');
                      while($rows = mysql_fetch_array($result_gn))
                      {
                          $nome_tarifario = $rows['NOME_TARIFARIO'];
                          $nome_empresa = $rows['NOME_EMPRESA'];
                          if($row['ESTRUTURA_TARIFARIA_GN']==$rows['NOME_TARIFARIO'])
                          {                              
                              echo("<option value='".$nome_tarifario."' selected>".$rows['NOME_TARIFARIO']."</option>");  
                          }
                          else
                          {
                            echo("<option value='".$nome_tarifario."'>".$rows['NOME_TARIFARIO']."</option>");  
                          }
                      }
                  ?>
                  </select>
                   </div>  
                 <!-- <input type="text" id="refesh_gas" name="refesh_gas" class="icon-refresh"> btn btn-primary btn-mini-->
          </td>  
      </tr>
      <tr class="hero-unit">
          <td  valign="top" colspan="2">
                  <label>ID Estrutura Tarif&aacute;ria: </label>
                  <!--<select id="select_id_gas" name="select_id_gas" class="span4" disabled="true">-->
                    <?php
                      $result_gn=gettarifas_gas($nome_tarifario,$nome_empresa);
                      $rows = mysql_fetch_array($result_gn);
                      //echo $row['ESTRUTURA_TARIFARIO'];
                      //echo("<option value='1'>".$rows."</option>");  
                      /*while($row = mysql_fetch_array($result))
                      {
                         echo("<option value='".$row['ESTRUTURA_TARIFARIO']."' selected>".$row['ESTRUTURA_TARIFARIO']."</option>");  
                      } */                                 
                    ?>
                  <!--</select>-->
                  <div id="nome_tarifario_gas">
                      <input class="span4"  type="text" value="<?php echo $rows['ESTRUTURA_TARIFARIO'] ?>" name="select_id_gas" id="select_id_gas"  readonly=true> 
                  </div>
          </td>
      </tr>
      <tr  class="hero-unit">
           <td WIDTH="200" HEIGHT="30"  align="right" colspan="2">
              <a href="criartarifario_gas.php"  target="_blank">   
                  <input type="button" class="btn btn-group.open btn-mini btn-danger" id="botao_tarifa_gas" value="Adicionar Tarif&aacute;rio"></input>
              </a> 
          </td> 
      </tr>
       


    </table>
  </fieldset>
</td> 
<td valign="top" id="RESTGAS" >

  <!-- TABELA Restrições Gás -->
  <?php
  $resultrestricoesgas = mysqli_query($mysqli,"SELECT *  FROM RESTRICAO_OFERTA WHERE Ofertas_IDOFERTA='" . $idoferta . "' AND RESTRICAOA=1 ORDER BY IDRESTRICAO_OFERTA ASC" ); 

  ?>
  <fieldset align="center" >
  <table id="table_restricao_gn"  width='87%' height='50%'  align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
          <tr  class="hero-unit">
            <td WIDTH="200" HEIGHT="30"   align="center" colspan="2">
              <label>
                <h3> 5.1 Restrições Gás: </input></h3>
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
          $countgas=0;
          while($rowrestricoesgas = mysqli_fetch_array($resultrestricoesgas))
          {
            ?>
            <tr  class="hero-unit">
              <td  valign="top " colspan="2">
               <label>Restrição: </label>
               <input style=" text-align:center;" name="restricao_gn_<?php echo($countgas);?>" id="restricao_gn_<?php echo($countgas);?>" class="span4" type="text" placeholder="Restrição"  name="restricao" value="<?php echo $rowrestricoesgas['RESTRICAO'] ?>"> <br> 
    
             </td>
           </tr>  
    
           <tr  class="hero-unit">
            <td  valign="top " colspan="2">
              <label>Valor da Restrição: </label>
              <input style=" text-align:center;"  name="valor_restricao_gn_<?php echo($countgas);?>" id="valor_restricao_gn_<?php echo($countgas);?>" class="span4" type="text" placeholder="Valor da Restrição"  name="restricao" value="<?php echo $rowrestricoesgas['VALOR_RESTRICAO'] ?>"> <br> 
            </td>
          </tr>     
          <?php
          $countgas=$countgas+1;
        }
      }
      ?>                 
      <tr class="hero-unit">
        <td id="table_linha_restricao_gn_1" align="left" colspan="2">    
          <input type="button" class="btn btn-danger btn-mini btn-danger" id="botao_restricao_gas"  value="+" onClick="javascript:novaLinha('table_restricao_gn','Restri&ccedil;&atilde;o','nv_restricao_gn_','Valor da Restri&ccedil;&atilde;o','nv_valor_restricao_gn_','botao_restricao_gas')"></input>   
        </td>
      </tr>
    </table>




    
</fieldset>
</td> 

</tr>
<?php
}
?>






<td colspan="2"><br><br></td>
    <tr>

      <td colspan="2" valign="top" id="SERVEST">

        


        <!-- TABELA SERV_ESTRUTURADO -->

        <?php

        $resultservicoestruturado = mysqli_query($mysqli,"SELECT *  FROM SERVICO_ESTRUTURADO WHERE idoferta='" . $idoferta . "' ORDER BY id_servico_estruturado ASC"); 



        ?>

        <fieldset align="center" >

          <table name="table_serv_estruturado" id="table_serv_estruturado" width='93%' height='50%' align="center" border="3" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >

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
            ?>
            <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 ID Estrutura Tarifária
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="ID Estrutura Tarifária"  name="ID_Estrutura_Tarifaria_Serv" id="ID_Estrutura_Tarifaria_Serv" value="<?php echo $row['ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ?>">
              </td>
            </tr>

            <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 Estrutura Tarifária
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Estrutura Tarifária"  name="Estrutura_Tarifaria_Serv" id="Estrutura_Tarifaria_Serv" value="<?php echo $row['ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO'] ?>">
              </td>
            </tr>
            <?php
            $countserv=0;
            while($rowservicoestruturado = mysqli_fetch_array($resultservicoestruturado))

            {

              ?>

              <tr  class="hero-unit">

                <td  align="left" width="20%"><label>

                  ID Serviço Estruturado
                </label>
              </td>
              <td width="80%">

                <input class="span5"  type="text" placeholder="ID Serviço Estruturado"  name="idservest_<?php echo($countserv);?>" id="idservest_<?php echo($countserv);?>" value="<?php echo $rowservicoestruturado['idservicoestruturado']; ?>"> 
              </td>
            </tr>
            <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 Serviço Estruturado
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Serviço Estruturado"  name="servest_<?php echo($countserv);?>" id="servest_<?php echo($countserv);?>" value="<?php echo $rowservicoestruturado['estrutura_servico'] ?>">
              </td>

            </tr>
             <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                 Estado do Serviço
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Estado do Serviço"  name="estserv_<?php echo($countserv);?>" id="estserv_<?php echo($countserv);?>" value="<?php echo $rowservicoestruturado['estado'] ?>">
              </td>

            </tr>
             <tr  class="hero-unit">
              <td  align="left" width="20%">
                <label>
                Obrigatoriedade
                </label>
              </td>
              <td width="80%">
                <input class="span5"  type="text" placeholder="Obrigatoriedade"  name="obrg_<?php echo($countserv);?>" id="obrg_<?php echo($countserv);?>" value="<?php echo $rowservicoestruturado['obrigatoriedade'] ?>">
              </td>

            </tr>
            <?php
            $countserv++;
              }
        ?>
              
            <?php

            }

            ?>
            <tr class="hero-unit">
        <td id="table_linha_serv_estruturado_1" align="left" colspan="2">    
          <input type="button" class="btn btn-danger btn-mini btn-danger" id="botao_serv_estruturado"  value="+" onClick="javascript:novaLinha('table_serv_estruturado','custom','custom','custom','custom','botao_serv_estruturado')"></input>   
        </td>
      </tr>
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

                      <td WIDTH="200" HEIGHT="30"  colspan = "2">
                      <label>

                         <h3>7. Ofertas Alternativas</h3>
                      </label></td>            
                    </tr>
                  
                  <tr  class="hero-unit">
                  <td width="20%" align="left"><label>
                    Oferta Alternativa Eletricidade:
                  </label>
                                </td>
                                <td align="left">
                                    <input class="span5"  type="text" placeholder="Eletricidade Alternativa"  name="electricidade_alternativa" id="electricidade_alternativa" value="<?php echo $row['ALTER_E'] ?>">
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
             <br><button type="submit" class="btn btn-danger btn-large">Editar</button>
            </td>

        </tr>


    </table>
      </fieldset>
      </form>

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