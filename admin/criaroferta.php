 <?php
    session_start();
    include ('../gerar_alea.php');
    include('../mysql.php');
    include('../mysqlconnect.php');
    include('../login_status.php');
    error_reporting(E_ERROR);

    function gettarifas($tipo)
    { 
        // Buscar lista de utilizadaores
        $sql="SELECT * FROM ".$tipo;
        $result=mysql_query($sql) or die(mysql_error());
        return $result;
    }
    
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
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
    <script type="text/javascript" charset="utf-8" src="../assets/js/jquery.mim.js"></script>
    <script src="../jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8">
    var teste = 0;
    $(document).ready(function()
    {        
        // Quando seleciona outro plano de gas
        $("#select_gas").on('change', function() {
           
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
        
         $("#debito_direto").on('change', function() {
            console.log("change debito direto");
            // Recuperar opcao selecionada
            var selecionado = $("#debito_direto option:selected").val(); 
            // se for obrigatorio nao existe forma de pagamento
            if(selecionado == 'Obrigatório')
                $("input[name='forma_pagamento']").prop('disabled',true);
            else
                $("input[name='forma_pagamento']").prop('disabled',false);

        }); 
      
         // Quando seleciona outro plano de electricidade
         //$("#select_electricidade").change(function() { 
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
        
     
        
        // Quando seleciona outro plano de electricidade
         //$("#botao_actualiar_gas").click(function(){
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
        
              
        //$("#botao_actualiar_electricidade").click(function() { 
        $("#botao_actualiar_electricidade").on('click', function() {
           //alert("Ola mundo!"); 
            var selecionado = 2; 
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

        carateres("id",'counterBoxid',10);
        carateres("nome",'counterBoxnomeofr',70);
        carateres("reclamacao_div","counterBoxreclamacao",30);
        carateres("penalizacao","counterBoxpenalizacao",120);
        carateres("estado","counterBoxestado",20);
        carateres("duracao","counterBoxduracao",10);
        carateres("valor","counterBoxvalor",10);
        //carateres("obs","counterBoxobs",750);
    });
    
    var conta_gn = 1;
    var conta_e = 1;
    var conta_serv = 1;
    var conta = 1;
    function validate(){
        if (document.getElementById('gas').checked){
                //alert("checked"); 
                document.getElementById("componente_gas").readOnly = false;
                document.getElementById("id_componente_gas").readOnly = false;
                document.getElementById("select_gas").disabled = false;
                //document.getElementById("select_id_gas").disabled = false;
                document.getElementById("botao_tarifa_gas").disabled = false;
                document.getElementById("botao_actualiar_gas").disabled = false;
                //restricao
                document.getElementById("botao_restricao_gas").disabled = false;
                //alert("conta gn == "+conta_gn);
                for(var i=1;i<=conta_gn;i++)
                {
                    document.getElementById("restricao_gas_"+i).readOnly = false;
                    document.getElementById("valor_restricao_gas_"+i).readOnly = false;
                }
                  
        }else{
                //document.getElementById('electricidade').setAttribute("type","checkbox");
                document.getElementById("componente_gas").readOnly = true;
                document.getElementById("id_componente_gas").readOnly = true;
                document.getElementById("select_gas").disabled = true;
                //document.getElementById("select_id_gas").disabled = true;
                document.getElementById("botao_tarifa_gas").disabled = true;
                document.getElementById("botao_actualiar_gas").disabled = true;
                document.getElementById("botao_restricao_gas").disabled = true;
                //restricao
                //alert("conta gn == "+conta_gn);
                for(var i=1;i<=conta_gn;i++)
                {
                    document.getElementById("restricao_gas_"+i).readOnly = true;
                    document.getElementById("valor_restricao_gas_"+i).readOnly = true;
                 
                }
                
        }
        
        if (document.getElementById('electricidade').checked){
        
                document.getElementById("componente_electricidade").readOnly = false;
                document.getElementById("id_componente_electricidade").readOnly = false;
                document.getElementById("select_electricidade").disabled = false;
                //document.getElementById("select_id_electricidade").disabled = false;
                document.getElementById("botao_tarifa_electricidade").disabled = false;
                document.getElementById("botao_actualiar_electricidade").disabled = false;
                //restricao
                document.getElementById("botao_restricao_electricidade").disabled = false;
                //alert("conta e == "+conta_e);
                for(var i=1;i<=conta_e;i++)
                {
                    document.getElementById("restricao_electricidade_"+i).readOnly = false;
                    document.getElementById("valor_restricao_electricidade_"+i).readOnly = false;
                }
                  
        }else{
                //document.getElementById('electricidade').setAttribute("type","checkbox");
                document.getElementById("componente_electricidade").readOnly = true;
                document.getElementById("id_componente_electricidade").readOnly = true;
                document.getElementById("select_electricidade").disabled = true;
                //document.getElementById("select_id_electricidade").disabled = true;
                document.getElementById("botao_tarifa_electricidade").disabled = true;
                document.getElementById("botao_actualiar_electricidade").disabled = true;
                //restricao
                document.getElementById("botao_restricao_electricidade").disabled = true;
                //alert("conta e == "+conta_e);
                for(var i=1;i<=conta_e;i++)
                {
                    document.getElementById("restricao_electricidade_"+i).readOnly = true;
                    document.getElementById("valor_restricao_electricidade_"+i).readOnly = true;
                 
                }
        } 
    }
    
    function removeLinha(id){
               var teste = document.getElementById(id);
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
                }
                else if(tabela_name == 'table_restricao_gn')
                {
                    //alert("tabela_restricao_gn");
                    aux = "restricao_gn_"+conta_gn;
                    conta_gn++;
                    tmp=conta_gn;
                    aux2 = "restricao_gn_"+conta_gn;
                }
                else if(tabela_name == 'table_restricao_e')
                { 
                    //alert("tabela_restricao_e");
                    aux = "restricao_e_"+conta_e;
                    conta_e++;
                    tmp=conta_e;
                    aux2 = "restricao_e_"+conta_e;
                }
                
                //alert("nome do campo == "+id_campo1+tmp);
                var parte0 ="<tr  class='hero-unit'><td   width='20%' align='left'><label> "+nome_campo1+":</label></td>";
                var parte1 ="<td align='left'><input class='span6'  type='text' placeholder='"+nome_campo1+"'  name='"+id_campo1+tmp+"' id='"+id_campo1+tmp+"'></td></tr>";
                var parte2 ="<tr  class='hero-unit'><td   width='20%' align='left'><label>"+nome_campo2+":</label></td>";
                var parte3 ="<td align='left'><input class='span6'  type='text' placeholder='"+nome_campo2+"'  name='"+id_campo2+tmp+"' id='"+id_campo2+tmp+"'></td></tr>";             

                var parte4 ="<tr class='hero-unit' ><td id='table_linha_" + aux2 + "' align='left' colspan='2'><form><input type='button' class='btn btn-primary  btn-mini btn-danger' name='"+botao_nome+"' id='"+botao_nome+"' value='+' onClick=\"javascript:novaLinha('"+tabela_name+"','"+nome_campo1+"','"+id_campo1+"','"+nome_campo2+"','"+id_campo2+"','"+botao_nome+"')\"></input> </form>";
                //alert("Antigo table_linha_" + aux +" Novo table_linha_" + aux2);   
                removeLinha("table_linha_" + aux);

                /*document.getElementById(tabela_name).innerHTML += parte0 + parte1 + parte2 + parte3 + parte4;
                document.getElementById(tabela_name).innerHTML += "</td></tr>";*/

                $("#"+tabela_name).append(parte0 + parte1 + parte2 + parte3 + parte4+"</td></tr>");

    }
    
    
    function novaLinha_v2(){
    
                conta_serv++;
                var parte7 = "<tr class='hero-unit'><td   width='20%' align='left' colspan='2'><h4>"+(conta_serv)+"</h4></td></tr>"
                var parte0 ="<tr  class='hero-unit'><td   width='20%' align='left'><label>Servi&ccedil;o Estruturado:</label></td><td align='left'><input class='span6' type='text' placeholder='Servi&ccedil;o Estruturado'  name='servico_estruturado_"+conta_serv+"' id='servico_estruturado_"+conta_serv+"'></td></tr>";
                
                var parte1 ="<tr  class='hero-unit'><td   width='20%' align='left'><label>ID Servi&ccedil;o Estruturado:</label></td><td align='left'><input class='span6'  type='text' placeholder='ID Servi&ccedil;o Estruturado'  name='id_servico_estruturado_"+conta_serv+"' id='id_servico_estruturado_"+conta_serv+"'></td></tr>";
                var parte2 ="<tr  class='hero-unit'><td   width='20%' align='left'><label>Estado do Servi&ccedil;o:</label></td><td align='left'><input class='span6'  type='text' placeholder='Estado do Servi&ccedil;o'  name='estado_servico_"+conta_serv+"' id='estado_servico_"+conta_serv+"'></td></tr>";
                
                var parte3 ="<tr  class='hero-unit'><td   width='20%' align='left'><label>Obrigatoriadade:</label></td><td align='left'><select class='span2' name='obrigatoriadeda_servico_"+conta_serv+"' id='obrigatoriadeda_servico_"+conta_serv+"'><option value='sim'>Sim</option><option value='N��o'>N&atilde;o</option></select></td></tr>";
            
                var parte4 ="<tr class='hero-unit' ><td id='tabela_linha_serv_" + conta_serv + "' colspan='2' align='left'><form><input type='button' class='btn btn-primary btn-mini btn-danger'  value='+' onClick='javascript:novaLinha_v2()'></input> </form>";
                var aux = conta_serv-1;
                removeLinha("tabela_linha_serv_" + aux);
                /*document.getElementById("table_serv").innerHTML += parte7 + parte0 + parte1 + parte2 + parte3 + parte4;
                document.getElementById("table_serv").innerHTML += "</td></tr>";*/
                 $("#table_serv").append(parte0 + parte1 + parte2 + parte3 + parte4+"</td></tr>");
    }
    
    
    function valida_dados(form)
    {
        if (form.id.value=="") {
            alert("O ID da oferta não está preenchido!");
           form.id.focus();
           return false;
        }
        
        if (form.nome.value=="") {
            alert("O Nome da oferta não está preenchido!");
           form.nome.focus();
           return false;
        }
        
        if (form.estado.value=="") {
            alert("O Estado da oferta não está preenchido!");
           form.estado.focus();
           return false;
        }
        
        if (form.data_inicio.value=="") {
            alert("A Data inicio não está preenchida!");
           form.data_inicio.focus();
           return false;
        }
        
        if (form.reclamacao_div.value=="") {
            alert("A Reclamação da dívida não está preenchida!");
           form.reclamacao_div.focus();
           return false;
        }
        
        if (form.duracao.value=="") {
            alert("A Duração da oferta não está preenchida!");
           form.duracao.focus();
           return false;
        }
        
        if (form.valor.value=="") {
            alert("O Valor da oferta não está preenchido!");
           form.valor.focus();
           return false;
        }
        
        if (form.data_fim.value=="") {
            alert("A Data Fim não está preenchida!");
           form.data_fim.focus();
           return false;
        }
        
        if (form.penalizacao.value=="") {
            alert("A Penalização não está preenchida!");
           form.penalizacao.focus();
           return false;
        }
        
        if (form.debito_direto.value=="") {
            alert("D&eacute;bito Direto não está preenchido!");
           form.debito_direto.focus();
           return false;
        }
        
        if (form.conta_certa.value=="") {
            alert("Conta Certa não está preenchida!");
           form.conta_certa.focus();
           return false;
        }
       
        
        if (form.correspondencia_electronica.value=="") {
            alert("Correspond&ecirc;ncia Eletronica não está preenchida!");
           form.correspondencia_electronica.focus();
           return false;
        }
        
        if (form.entidade_parceira.value=="") {
            alert("Entidade Parceira não está preenchida!");
           form.entidade_parceira.focus();
           return false;
        }
        
        return true; 
    }
 
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

    window.onload = function(){
                //div electricidade/gas
                document.getElementById("componente_gas").readOnly = true;
                document.getElementById("id_componente_gas").readOnly = true;
                document.getElementById("select_gas").disabled = true;
                //document.getElementById("select_id_gas").disabled = true;
                document.getElementById("botao_tarifa_gas").disabled = true;
                document.getElementById("botao_actualiar_gas").disabled = true;
                document.getElementById("componente_electricidade").readOnly = true;
                document.getElementById("id_componente_electricidade").readOnly = true;
                document.getElementById("select_electricidade").disabled = true;
                document.getElementById("select_id_electricidade").disabled = true;
                document.getElementById("botao_actualiar_electricidade").disabled = true;
                document.getElementById("botao_tarifa_electricidade").disabled = true;
                //3.1
                document.getElementById("restricao_gas_1").readOnly = true;
                document.getElementById("valor_restricao_gas_1").readOnly = true;
                document.getElementById("botao_restricao_gas").disabled = true;
                //4.1
                document.getElementById("restricao_electricidade_1").readOnly = true;
                document.getElementById("valor_restricao_electricidade_1").readOnly = true;
                document.getElementById("botao_restricao_electricidade").disabled = true;
        /*var cboxes = document.getElementsByName('gas');
        var len = cboxes.length;
        alert(cboxes[0].value);
        for (var i=0; i<len; i++) {
            //alert(i + (cboxes[i].checked?' checked ':' unchecked ') + cboxes[i].value);
            //alert(cboxes[i].is(":checked").value);
        }*/ 
        }
    
        </script>
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

          </button>

          </button>

          </button>
          <a class="brand" href="#"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="..\index.php">Inicio</a></li>
              <li><a href="..\listar.php">Listar</a></li>
              <li><a href="..\pesquisar.php">Pesquisar</a></li>
        <?php if(login_status()!=1)
            {?>
              <meta HTTP-EQUIV="REFRESH" content="0; url=../erro_interno.php">
              <li id="login_li"><a href="#" onclick="esconder()">Login</a></li> <?php } ?>
              <li class="dropdown active">
              
              <?php 
                if(login_status()==1)
                {
                    ?>

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerir <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                  <li class="nav-header">Users</li>
                  <li><a href="profile.php">Minha Conta</a></li>
                  <li> <a href="registar.php">Criar User</a> </li>
                  <li> <a href="listarusers.php">Gerir Utilizadores Existentes</a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li class="active"><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li><a href="upload_ficheiro.php">Upload Ficheiro</a></li>
                  <li class="divider"></li>
                   <li class="nav-header">Tarifário</li>
                  <li><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Servidor</li>
                  <li><a href="log_operacao.php">Ver Log de Operações</a></li>
                  <li><a href="gerirlinks.php">Gerir Links Rápidos</a></li>
                  
                </ul>
              </li>
              <?php
                }?>
                
            </ul>
            <?php             
                if(login_status()==1)
                {
                    ?>
                    <div class="navbar-form pull-right"> 
                    <ul class="nav">
                    <li style="line-height:15px"> <br><font color="white"> <?php
                    echo("Bem Vindo <a href=profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");
                    echo ("  <a href='../logout.php'>[Logout]</a>");
                    ?></font></ul></li></div><?php
                }
                else
                {
            ?>  
                
                <form id="login" method="post" action="login.php?lastpage=index.php" name="login" class="navbar-form pull-right">
                  <input class="span2" type="text" placeholder="Utilizador" name="user">
                  <input class="span2" type="password" placeholder="Password" name="pass">
                  <button type="submit" class="btn">Login</button>
                </form>
            <?php
                }
            ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <!----------------------------------BODY------------------------------------>
    <div class="container">
    <br>
    <?php 
    
        /**variavel de debug 0->sem debug / 1->print do php / 2->print sql**/
        //$debug=1;
        //echo("Valor == ".$_POST['valor']."<br>");
        if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['estado']) &&  isset($_POST['duracao']) &&  isset($_POST['valor']) &&  isset($_POST['data_fim']) &&  isset($_POST['penalizacao']) &&  isset($_POST['debito_direto']) &&  isset($_POST['conta_certa']))  
        {
            /**<---------------------------LEITURA DE DADOS------------------------->**/
            /**<----Caracteristicas---->**/
            $id_oferta = $_POST['id'];
            $nome_oferta = $_POST['nome'];
            $estado_oferta = $_POST['estado'];
            $data_inicio_oferta = $_POST['data_inicio'];
            $reclamacao_div_oferta = $_POST['reclamacao_div'];
            $duracao_oferta = $_POST['duracao'];
            $valor_oferta = $_POST['valor'];
            $data_fim_oferta = $_POST['data_fim'];
            $penalizacao_oferta = $_POST['penalizacao'];
            
            /*if($_POST['gas']=='check' && $_POST['electricidade']=='check')
                $componente_basica = 'G+E';
            else if($_POST['electricidade']=='check')
                $componente_basica = 'E';
            else if($_POST['gas']=='check')
                $componente_basica = 'G';
            else
                $componente_basica = 'N/A';*/

            $cp = 0;
            if($_POST['electricidade'] == 'check')
            {
                if($cp == 1)
                    $componente_basica.='+';
                $componente_basica.='E';
                $cp = 1;
            }
            if($_POST['gas'] == 'check')
            {
                if($cp == 1)
                    $componente_basica.='+';
                $componente_basica.='G';
                $cp = 1;
            }  

            if((!empty($_POST['estrutura_tarifaria_serv_1'])) && (!empty($_POST['id_estrutura_tarifaria_serv_1'])) && (!empty($_POST['servico_estruturado_1'])) && (!empty($_POST['id_servico_estruturado_1'])) && (!empty($_POST['estado_servico_1'])) && (!empty($_POST['obrigatoriadade_servico_1'])))
            { 
                if($cp == 1)
                    $componente_basica.='+';
                $componente_basica.='S';
                $cp = 1;
            }
            if($cp == 0)
                $componente_basica.='Indisponível';

                 
            if($debug==1)
            {
                echo("id_oferta ==".$id_oferta."<br>");
                echo("nome_oferta ==".$nome_oferta."<br>");
                echo("estado_oferta ==".$estado_oferta."<br>");
                echo("data_inicio_oferta ==".$data_inicio_oferta."<br>");
                echo("reclamacao_div_oferta ==".$reclamacao_div_oferta."<br>");
                echo("duracao_oferta ==".$duracao_oferta."<br>");
                echo("valor_oferta ==".$valor_oferta."<br>");
                echo("data_fim_oferta ==".$data_fim_oferta."<br>");
                echo("penalizacao_oferta ==".$penalizacao_oferta."<br>");
                echo("componente_basica ==".$componente_basica."<br>"); 
            }
                        
            /**<----Atributos----->**/
            $debito_direto = $_POST['debito_direto'];
            $forma_pagamento = (!empty($_POST['forma_pagamento']) ? $_POST['forma_pagamento']: 'Indisponível');
            $conta_certa = $_POST['conta_certa'];
            $correspondencia_electronica = $_POST['correspondencia_electronica'];
            $entidade_parceira = $_POST['entidade_parceira'];
            $valor_ep = (!empty($_POST['valor_ep']) ? $_POST['valor_ep']: 'Indisponível');
           
            //$valor_ep = $_POST['valor_ep'];
            $valor_benefico_ep = (!empty($_POST['valor_benefico_ep']) ? $_POST['valor_benefico_ep']: 'Indisponível');
            //$valor_benefico_ep = $_POST['valor_benefico_ep'];
            $unidade_ep = (!empty($_POST['unidade_ep']) ? $_POST['unidade_ep']: 'Indisponível');
            //$unidade_ep = $_POST['unidade_ep'];
            $aplicado_ep = (!empty($_POST['aplicado_ep']) ? $_POST['aplicado_ep']: 'Indisponível');
            //$aplicado_ep = $_POST['aplicado_ep'];
            
            $condicao_particular = array();
            $restricao_gas = array();
            $restricao_electricidade = array();
            
            if($debug==1)
            {
                echo("debito_direto ==".$debito_direto."<br>");
                echo("Forma pagamento == ".$forma_pagamento."<br>");
                echo("conta_certa ==".$conta_certa."<br>");
                echo("correspondencia_electronica ==".$correspondencia_electronica."<br>");
                echo("entidade_parceira ==".$entidade_parceira."<br>");
                echo("valor_ep ==".$valor_ep."<br>");
                echo("valor_benefico_ep ==".$valor_benefico_ep."<br>");
                echo("unidade_ep ==".$unidade_ep."<br>");
                echo("aplicado_ep ==".$aplicado_ep."<br>"); 
            }
            
            /**<----Produtos Comerciais----->**/            
            /**<------ GAS ------->**/
           $componente_gas = (!empty($_POST['componente_gas']) ? $_POST['componente_gas']: 'Indisponível');
           $id_componente_gas = (!empty($_POST['id_componente_gas']) ? $_POST['id_componente_gas']: 'Indisponível');
            /*  if(isset($_POST['componente_gas']))
                    $componente_gas = $_POST['componente_gas'];
                else
                    $componente_gas = null;
                    
                if(isset($_POST['id_componente_gas']))
                    $id_componente_gas = $_POST['id_componente_gas'];
                else
                    $id_componente_gas = null;*/
            
            if(stripos($componente_basica,'G') !== false)
            {        
                if(isset($_POST['select_gas']))
                    $estrutura_tarifaria_gas = $_POST['select_gas'];
                else
                    $estrutura_tarifaria_gas = null;
                
                if(isset($_POST['select_id_gas']))
                    $id_estrutura_tarifaria_gas = $_POST['select_id_gas'];
                else
                    $id_estrutura_tarifaria_gas = null;
            }
            else
            {
                $estrutura_tarifaria_gas = 'Indisponível';
                $id_estrutura_tarifaria_gas = 'Indisponível'; 
            }
            
            /**<------ ELECTRICIDADE ------->**/
            $componente_electricidade = (!empty($_POST['componente_electricidade']) ? $_POST['componente_electricidade']: 'Indisponível');
            $id_componente_electricidade = (!empty($_POST['id_componente_electricidade']) ? $_POST['id_componente_electricidade']: 'Indisponível'); 
         
                    
            if(stripos($componente_basica,'E') !== false)
            {       
                if(isset($_POST['select_electricidade']))
                    $estrutura_tarifaria_electricidade = $_POST['select_electricidade'];
                else
                    $estrutura_tarifaria_electricidade = '-';
                
                if(isset($_POST['select_id_electricidade']))
                    $id_estrutura_tarifaria_electricidade = $_POST['select_id_electricidade'];
                else
                    $id_estrutura_tarifaria_electricidade = '-';
                 
            }
            else
            {
                $estrutura_tarifaria_electricidade = 'Indisponível';
                $id_estrutura_tarifaria_electricidade = 'Indisponível'; 
            }
            
            if($debug==1)
            {
                echo("GAS: <br>");
                echo("componente_gas ==".$componente_gas."<br>");
                echo("id_componente_gas ==".$id_componente_gas."<br>");
                echo("estrutura_tarifaria_gas ==".$estrutura_tarifaria_gas."<br>");
                echo("id_estrutura_tarifaria_gas ==".$id_estrutura_tarifaria_gas."<br>");
                echo("ELECTRICIDADE: <br>");
                echo("componente_electricidade ==".$componente_electricidade."<br>");
                echo("id_componente_electricidade ==".$id_componente_electricidade."<br>");
                echo("estrutura_tarifaria_electricidade ==".$estrutura_tarifaria_electricidade."<br>");
                echo("id_estrutura_tarifaria_electricidade ==".$id_estrutura_tarifaria_electricidade."<br>");
            }
            
            /**<------SERVICO ESTRUTURADO ----->**/
            $estrutura_tarifaria_serv = (!empty($_POST['estrutura_tarifaria_serv_1']) ? $_POST['estrutura_tarifaria_serv_1']: 'Indisponível');
            $id_estrutura_tarifaria_serv = (!empty($_POST['id_estrutura_tarifaria_serv_1']) ? $_POST['id_estrutura_tarifaria_serv_1']: 'Indisponível');
            $servicos_estruturados = array();
            
            /**<------OFERTAS ALTERNATIVAS------>**/
            $electricidade_alternativas = (!empty($_POST['electricidade_alternativa']) ? $_POST['electricidade_alternativa']: 'Indisponível');
            $gas_alternativas = (!empty($_POST['gas_alternativa']) ? $_POST['gas_alternativa']: "Indisponível");
            
            $contador = 1;
            $controlador = 0;
            if($debug==1)
            {
                echo("SERVICO ESTRUTURADO: <br>");
                echo("estrutura_tarifaria_serv ==".$estrutura_tarifaria_serv."<br>");
                echo("id_estrutura_tarifaria_serv ==".$id_estrutura_tarifaria_serv."<br>");
                echo("electricidade_alternativas ==".$electricidade_alternativas."<br>");
                echo("gas_alternativas ==".$gas_alternativas."<br>");
            }
  
            /**<------------Tratamento os dados------------->**/
            foreach($_POST as $param_name => $param_val)
            {
                if($param_name!='id' && $param_name!='nome' && $param_name!='estado' && $param_name!='data_inicio' && $param_name!='reclamacao_div' && $param_name!='duracao' && $param_name!='reclamacao_div')
                {                                               
                    $partes=explode("_",$param_name);
                    $contador=$partes[count($partes)-1];
                    if($debug==3)
                        echo("Parametros == ".$param_name." == ".$param_val."<br>");
                    
                    if(stripos($param_name,'servico_estruturado_') !== false)
                        if(!is_null($param_val))
                            $servicos_estruturados[$contador-1]['servico_estruturado']=$param_val;
                   
                    if(stripos($param_name,'id_servico_estruturado_') !== false)
                        if(!is_null($param_val))
                            $servicos_estruturados[$contador-1]['id_servico_estruturado']=$param_val;
                     
                    if(stripos($param_name,'estado_servico_') !== false)
                        if(!is_null($param_val))
                            $servicos_estruturados[$contador-1]['estado_servico']=$param_val;
                                        
                    if(stripos($param_name,'obrigatoriadade_servico_1') !== false)
                        if(!is_null($param_val))
                            $servicos_estruturados[$contador-1]['obrigatoriadade_servico']=$param_val;
                                
                    if(stripos($param_name,'condicao_oferta_') !== false)
                        if(!is_null($param_val))
                            $condicao_particular[$contador-1]['condicao_oferta']=$param_val;
                        
                    if(stripos($param_name,'valor_oferta_') !== false)
                        if(!is_null($param_val))
                            $condicao_particular[$contador-1]['valor_oferta']=$param_val;
                        
                    if(stripos($param_name,'restricao_gas_') !== false)
                        if(!is_null($param_val))
                            $restricao_gas[$contador-1]['restricao_gas']=$param_val;
                        
                    if(stripos($param_name,'valor_restricao_gas_') !== false)
                        if(!is_null($param_val))
                            $restricao_gas[$contador-1]['valor_restricao_gas']=$param_val;
                        
                     if(stripos($param_name,'restricao_electricidade_') !== false)
                        if(!is_null($param_val))
                            $restricao_electricidade[$contador-1]['restricao_electricidade']=$param_val;
                        
                    if(stripos($param_name,'valor_restricao_electricidade_') !== false)
                        if(!is_null($param_val))
                            $restricao_electricidade[$contador-1]['valor_restricao_electricidade']=$param_val;
                }
            }
            
            //echo("<br><br><-----------SERVICO ESTRUTURADO---------><br><br>");
            if($debug==1)
            {
                echo("estrutura servico == ".$estrutura_tarifaria_serv."<br>");
                echo("ID estrutura servico == ".$id_estrutura_tarifaria_serv."<br>");
                for($i=0;$i<count($servicos_estruturados);$i++)
                {
                    echo($i." servico_estruturado == ".$servicos_estruturados[$i]['servico_estruturado']."<br>"); 
                    echo($i." id_servico_estruturado  == ".$servicos_estruturados[$i]['id_servico_estruturado']."<br>");
                    echo($i." estado_servico  == ".$servicos_estruturados[$i]['estado_servico']."<br>");
                    echo($i." obrigatoriadade_servico  == ".$servicos_estruturados[$i]['obrigatoriadade_servico']."<br>"); 
                }
            
                echo("<br><br>Condicao particular: <br>");
                for($i=0;$i<count($condicao_particular);$i++)
                {
                    echo($i." condicao_oferta == ".$condicao_particular[$i]['condicao_oferta']."<br>"); 
                    echo($i." valor_oferta  == ".$condicao_particular[$i]['valor_oferta']."<br>");
                }
    
                echo("<br><br>Restricao gas: <br>");
                for($i=0;$i<count($restricao_gas);$i++)
                {
                    echo($i." condicao_oferta == ".$restricao_gas[$i]['restricao_gas']."<br>"); 
                    echo($i." valor_oferta  == ".$restricao_gas[$i]['valor_restricao_gas']."<br>");
                }
                
                echo("<br><br>Restricao electricidade: <br>");
                for($i=0;$i<count($restricao_electricidade);$i++)
                {
                    echo($i." condicao_oferta == ".$restricao_electricidade[$i]['restricao_electricidade']."<br>"); 
                    echo($i." valor_oferta  == ".$restricao_electricidade[$i]['valor_restricao_electricidade']."<br>");
                }
            }
            
            /**<----------------------------------------------------------------------->**/
            if(!empty($_POST['observacao']))
                $observacao = $_POST['observacao'];
            else
                $observacao = 'Indisponível';

            $relatorio = "";
            $controlador = 0;
            

            /**<---------------------Inserir Oferta------------------------>**/
            if($stmt = $mysqli->prepare("SELECT * FROM OFERTAS WHERE IDOFERTA = ? LIMIT 1")) 
            {
            
                $stmt->bind_param('s', $id_oferta); 
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->fetch();

                if($stmt->num_rows == 0)
                {  
                    if($insert_stmt = $mysqli->prepare("INSERT INTO OFERTAS(IDOFERTA,NOME,ESTADO,DATA_INICIO,DATA_FIM,RECLAMACAO_DIVIDA,DURACAO,PENALIZACAO,VALOR,COMPONENTE_BASICA,COMPONENTE_ESTRUTURADA_E,ID_ESTRUTURADA_E,ESTRUTURA_TARIFARIA_E,ID_ESTRUTURA_TARIFARIA_E,COMPONENTE_ESTRUTURADA_GN,ID_ESTRUTURADA_GN,ESTRUTURA_TARIFARIA_GN,ID_ESTRUTURA_TARIFARIA_GN,DEBITO_DIRETO,FORMA_PAGAMENTO,CONTA_CERTA,CORRESPONDENCIA_ELETRONICA,ENTIDADE_PARCEIRA,VALOR_EP,VALOR_BENEFICO_EP,UNIDADE_EP,APLICADO_EP,OBSERVACOES,ID_ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO,ESTRUTURA_TARIFARIA_SERVICOESTRUTURADO,ALTER_E,ALTER_GN) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")) 
                    { 
                            $insert_stmt->bind_param('ssssssdsdsssssssssssssssssssssss',$id_oferta,$nome_oferta,$estado_oferta,$data_inicio_oferta,$data_fim_oferta,$reclamacao_div_oferta,$duracao_oferta,$penalizacao_oferta,$valor_oferta,$componente_basica,$componente_electricidade,$id_componente_electricidade,$estrutura_tarifaria_electricidade,$id_estrutura_tarifaria_electricidade,$componente_gas,$id_componente_gas,$estrutura_tarifaria_gas,$id_estrutura_tarifaria_gas,$debito_direto,$forma_pagamento,$conta_certa,$correspondencia_electronica,$entidade_parceira,$valor_ep,$valor_benefico_ep,$unidade_ep,$aplicado_ep,$observacao,$estrutura_tarifaria_serv,$id_estrutura_tarifaria_serv,$electricidade_alternativas,$gas_alternativas);
                            $ok=$insert_stmt->execute();
                            //$insert_stmt->close();      
                            //$id_oferta=$mysqli->insert_id;
                            //echo("Error message: ". htmlspecialchars($mysqli->error) . "<br>");
                            if(!$ok)
                            { 
                                $controlador = 0;
                               // echo "FALHOU == ".htmlspecialchars($insert_stmt->error)."<br>";
                                   /* ?>
                                   <meta HTTP-EQUIV="REFRESH" content="5; url=criaroferta.php">
                                <?php*/
                            }
                            else
                            {
                                $controlador = 1;
                            }  
                            $insert_stmt->close();  
                    }
                    else
                        $controlador = 0;
                }
                else
                    $controlador = 0;
            }

   
        /**<---------------------Inserir condicoes de oferta (caso exista)------------------------>**/
        if($controlador == 1)
        {
            for($i=0;$i<count($condicao_particular);$i++)
            {
                if(!empty($condicao_particular[$i]['condicao_oferta']) || !empty($condicao_particular[$i]['valor_oferta']))
                    if($insert_stmt = $mysqli->prepare("INSERT INTO CONDICAO_OFERTA (IDCONDICAO_OFERTA,Ofertas_IDOFERTA,CONDICAO_OFERTA,VALOR_CONDICAO) VALUES (NULL,?,?,?)"))
                    {
                        $insert_stmt->bind_param('sss',$id_oferta,$condicao_particular[$i]['condicao_oferta'],$condicao_particular[$i]['valor_oferta']);
                        $ok=$insert_stmt->execute();
                        $insert_stmt->close();      
                        $id_condicao=$mysqli->insert_id;
                        if(!$ok)
                            $relatorio .= "<div align='center'><h5>Inserc&ccedil;&atilde;o da Condi&ccedil;&atilde; [".$condicao_particular[$i]['condicao_oferta']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
     
                    }
                    else
                     $relatorio .= "<div align='center'><h5>Inserc&ccedil;&atilde;o da Condi&ccedil;&atilde; [".$condicao_particular[$i]['condicao_oferta']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
            }
            
            /**<---------------------Inserir restricoes de gas/electricidade (caso exista)------------>**/
            /**<---------------------RESTRICAOA ==  1 -> GAS / 2 -> Electricidade--------------->**/
            for($i=0;$i<count($restricao_gas);$i++)
            {
                if(!empty($restricao_gas[$i]['restricao_gas']) || !empty($restricao_gas[$i]['valor_restricao_gas']))
                    if($insert_stmt = $mysqli->prepare("INSERT INTO RESTRICAO_OFERTA(IDRESTRICAO_OFERTA,Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES (NULL,?,?,?,1)"))
                    {
                        $insert_stmt->bind_param('sss',$id_oferta,$restricao_gas[$i]['restricao_gas'],$restricao_gas[$i]['valor_restricao_gas']);
                        $ok=$insert_stmt->execute();    
                        $id_restricao_gas=$mysqli->insert_id;
                        if(!$ok)
                            $relatorio .= "<div align='center'><h5>Inserc&ccedil;&atilde;o da Restri&ccedil;&atilde;o G&aacute;s [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                        $insert_stmt->close();  
                    }
                    else
                        $relatorio .= "<div align='center'><h5>Inserc&ccedil;&atilde;o da Restri&ccedil;&atilde;o G&aacute;s [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

            }
            
            for($i=0;$i<count($restricao_electricidade);$i++)
            {
                if(!empty($restricao_electricidade[$i]['restricao_electricidade']) || !empty($restricao_electricidade[$i]['valor_restricao_electricidade']))
                    if($insert_stmt = $mysqli->prepare("INSERT INTO RESTRICAO_OFERTA(IDRESTRICAO_OFERTA,Ofertas_IDOFERTA,RESTRICAO,VALOR_RESTRICAO,RESTRICAOA) VALUES (NULL,?,?,?,2)"))
                    {
                        $insert_stmt->bind_param('sss',$id_oferta,$restricao_electricidade[$i]['restricao_electricidade'],$restricao_electricidade[$i]['valor_restricao_electricidade']);
                        $ok=$insert_stmt->execute();    
                        $id_restricao_electricidade=$mysqli->insert_id;
                        if(!$ok)
                            $relatorio .= "<div align='center'><h5>Inserc&ccedil;&atilde;o da Restri&ccedil;&atilde;o Eletricidade [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                        $insert_stmt->close();  
                    }
                    else
                        $relatorio .= "<div align='center'><h5>Inserc&ccedil;&atilde;o da Restri&ccedil;&atilde;o Eletricidade [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

            }
            
            
            /**<---------------------Inserir servico estruturado (caso exista)------------------------>**/
            if($debug==1)
                for($i=0;$i<count($servicos_estruturados);$i++)
                {
                    echo($i." servico_estruturado == ".$servicos_estruturados[$i]['servico_estruturado']."<br>"); 
                    echo($i." id_servico_estruturado  == ".$servicos_estruturados[$i]['id_servico_estruturado']."<br>");
                    echo($i." estado_servico  == ".$servicos_estruturados[$i]['estado_servico']."<br>");
                    echo($i." obrigatoriadade_servico  == ".$servicos_estruturados[$i]['obrigatoriadade_servico']."<br>"); 
                }

            if((!empty($_POST['estrutura_tarifaria_serv_1'])) && (!empty($_POST['id_estrutura_tarifaria_serv_1'])) && (!empty($_POST['servico_estruturado_1'])) && (!empty($_POST['id_servico_estruturado_1'])) && (!empty($_POST['estado_servico_1'])) && (!empty($_POST['obrigatoriadade_servico_1'])))
                for($i=0;$i<count($servicos_estruturados);$i++)
                {
                    if(!empty($servicos_estruturados[$i]['servico_estruturado']) || !empty($servicos_estruturados[$i]['id_servico_estruturado']) || !empty($servicos_estruturados[$i]['estado_servico']))
                        if($insert_stmt = $mysqli->prepare("INSERT INTO SERVICO_ESTRUTURADO (id_servico_estruturado,estrutura_servico,obrigatoriedade,idservicoestruturado,estado,idoferta) VALUES (NULL,?,?,?,?,?)")) 
                        {   
                                $insert_stmt->bind_param('sssss',$servicos_estruturados[$i]['servico_estruturado'],$servicos_estruturados[$i]['obrigatoriadade_servico'],$servicos_estruturados[$i]['id_servico_estruturado'],$servicos_estruturados[$i]['estado_servico'],$id_oferta);
                                $ok=$insert_stmt->execute();
                                    
                                $idservico_estruturado=$mysqli->insert_id;
                                if(!$ok)
                                    echo "<div align='center'><h5>Inserc&ccedil;&atilde;o do Servico Estruturado [".$servicos_estruturados[$i]['servico_estruturado']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                                 $insert_stmt->close(); 
                        }
                        else
                           echo "<div align='center'><h5>Inserc&ccedil;&atilde;o do Servico Estruturado [".$servicos_estruturados[$i]['servico_estruturado']."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";

                }
        
            /**<-------------------------Inserir ofertas alternativas (caso exista)-------------------------->**/
           /* if($electricidade_alternativas || $gas_alternativas )
                if($insert_stmt = $mysqli->prepare("INSERT INTO OFERTAS_ALTERNATIVAS(id,oferta_electricidade,oferta_gas,idoferta) VALUES (NULL,?,?,?)"))
                {
                        $insert_stmt->bind_param('sss',$electricidade_alternativas,$gas_alternativas,$id_oferta);
                        $ok=$insert_stmt->execute();    
                        $id_oferta_alternativa=$mysqli->insert_id;
                        if($debug==2)
                            if(!$ok)
                            { 
                                echo "FALHOU == ".htmlspecialchars($insert_stmt->error)."<br>";
                                echo "Insucesso OFERTAS ALTERNATIVAS!!!"; 
                            }

                        $insert_stmt->close();  
                }
                else
                {
                        $correct=-1;
                        echo("<img align=center width = 100 heigth = 100  src=../assets/img/EDP_logo.jpg>");
                        echo("<p align=center> Erro na Inserc&ccedil;&atilde;o OFERTAS ALTERNATIVAS. Redirecionando...</p>");
                        $mysqli->close();
                        ?>
                            <!--<meta HTTP-EQUIV="REFRESH" content="3; url=criartarifario_gas.php">-->
                        <?php
                }*/
                
            /*<---------------------LOG----------------------------------->*/
            if($insert_stmt = $mysqli->prepare("INSERT INTO LOG(idlog,descricao,user,data) VALUES (NULL,?,?,?)"))
            {
                $descricao = "Adicionada uma nova oferta [".$nome_oferta."]";
                date_default_timezone_set ("Europe/Lisbon");
                $date =  date('y/m/d H:i:s', time());
                $insert_stmt->bind_param('sss',$descricao,$_SESSION['nome'],$date);
                $ok=$insert_stmt->execute();    
                $insert_stmt->close();  
            }

            echo("<div align='center'><img  width = 100 heigth = 100  src=../assets/img/EDP_logo.jpg>");
            echo "<br>".$relatorio."";
            echo "<p><h4>Sucesso a inserir a OFERTA [<a href='../detalharoferta.php?idoferta=".$id_oferta."'>".$nome_oferta."</a>].</h4></p></div>";

            
            }
            else
            {
                //insercao da oferta falhada
                echo "<div align='center'><h5>Inserc&ccedil;&atilde;o da OFERTA [".$nome_oferta."] [<font color='red'>FALHOU</font>]</h5><hr style='border-color:#827676; background-color: #827676;'></div>";
                echo "<div align='center'><h5>Rederecionando...</h5></div>";
                
                ?>
                    <meta HTTP-EQUIV="REFRESH" content="5; url=criaroferta.php">
                <?php
            }
            
        }
        else
        {
    ?>

    <form method="post" action="criaroferta.php" onsubmit="return valida_dados(this);" name="criaroferta"> 
    <!---------------------- TABELA PRINCIPAL ---------------------->
    <fieldset align="center" >
    <table width='100%' height='100%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF" >
                <tr>
                <td  align = "center" colspan = "2"><label>
                    <h3>Adicionar Nova Oferta</h3>
                </label></td>            
                </tr> 

                <tr>
                    <td valign="top">
                    <!---------------------- TABELA CARACTERISTICAS ---------------------->
                                 <fieldset align="center" >
                                 <table width='87%' height='100%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;;TABLE-LAYOUT: fixed;" >
                                    <tr class="hero-unit">
                                        <td  align = "center" WIDTH="200" HEIGHT="30"  colspan = "2"><label>
                                            <h3>1. Carater&iacute;sticas</h3>
                                        </label></td>            
                                    </tr>
                                    <tr  class="hero-unit">
                                        <td align = "center" valign="top">
                                            <!--<label><font color="red">ID Inserc&ccedil;&atilde;o Obrigat&oacute;ria!</font></label>-->
                                            <label>ID Oferta<font color="red">*</font>:</label> 
                                            <input class="span2" type="text" placeholder="ID" name="id" id="id"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="10" name="counterBoxid" id="counterBoxid">  
                                        </td>
                                        <td align = "center">
                                            <label>Reclama&ccedil;&atilde;o da D&iacute;vida<font color="red">*</font>:</label> 
                                            <input class="span2" type="text" placeholder="Reclama&ccedil;&atilde;o da D&iacute;vida" name="reclamacao_div" id="reclamacao_div"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="30" name="counterBoxreclamacao" id="counterBoxreclamacao">
                                        </td>
                                    <tr>
                                    <tr class="hero-unit" >
                                        <td align = "center">
                                            <label>Nome Oferta<font color="red">*</font>:</label> 
                                            <input class="span2" type="text" placeholder="Nome" name="nome" id="nome"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="70" name="counterBoxnomeofr" id="counterBoxnomeofr">  
                                        </td>
                                        <td align = "center">
                                            <label>Dura&ccedil;&atilde;o<font color="red">*</font>:</label> 
                                            <input class="span2" type="text" placeholder="Dura&ccedil;&atilde;o" name="duracao" id="duracao"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="10" name="counterBoxduracao" id="counterBoxduracao">  
                                        </td>
                                    </tr>
                                    <tr class="hero-unit" >
                                        <td align = "center">
                                            <label>Estado<font color="red">*</font>:</label> 
                                            <input class="span2" type="text" placeholder="Estado" name="estado" id="estado"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="20" name="counterBoxestado" id="counterBoxestado">
                                        </td>
                                        <td align = "center">
                                            <label>Valor<font color="red">*</font>:</label> 
                                            <input class="span2" type="text" placeholder="Valor" name="valor" id="valor"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="10" name="counterBoxvalor" id="counterBoxvalor"> 
                                        </td>
                                    </tr>
                                    <tr class="hero-unit" >
                                        <td align = "center">   
                                            <label>Data inicio<font color="red">*</font>:</label> 
                                            <input class="span2" type="date" name="data_inicio" id="data_inicio"> <br>                                 
                                        </td>
                                        <td align = "center" valign="top">
                                            <label>Data fim<font color="red">*</font>:</label> 
                                            <input class="span2" type="date" name="data_fim" id="data_fim"> <br>   
                                        </td>
                                    </tr>
                                    <tr class="hero-unit" align="center" valign="top">
                                        <td align = "center" colspan = "2" >
                                            <label>  Penaliza&ccedil;&atilde;o<font color="red">*</font>:</label> 
                                            <input class="span4"  type="text" placeholder="Penaliza&ccedil;&atilde;o" name="penalizacao" id="penalizacao"><input disabled style="width: 30px; padding: 2px; border: 1px solid black; text-align:center;" class="span0" type="text"  placeholder="120" name="counterBoxpenalizacao" id="counterBoxpenalizacao">   <br>
                                        </td>
                                    </tr>
                                </table>
                                </fieldset>
                                <h5><font color="red">*</font> Campo de Preenchimento Obrigat&oacute;rio</h5>
                        </td> 
                        <td valign="top">  
                    <!---------------------- TABELA ATRIBUTOS ---------------------->
                    <fieldset align="center">
                         <table width='87%' height='100%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                             <tr class="hero-unit">
                                <td align = "center" WIDTH="200" HEIGHT="30"  colspan = "2">
                                <label>
                                    <h3>2. Atributos</h3>
                                </label>
                                </td>            
                            </tr>
                            <tr class="hero-unit">
                                <td align = "center" colspan="2" >
                                    <label>Conta Certa<font color="red">*</font>:</label> 
                                    <select class="span2" name="conta_certa" id="conta_certa">
                                      <option value="Obrigatório">Obrigat&oacute;rio</option>
                                      <option value="Facultativo">Facultativo</option>
                                      <option value="Indisponível" selected>Indispon&iacute;vel</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td align = "center" colspan="2">
                                    <label>Correspond&ecirc;ncia Electr&oacute;nica<font color="red">*</font>:</label> 
                                    <select class="span2" name="correspondencia_electronica" id="correspondencia_electronica">
                                      <option value="Obrigatório">Obrigat&oacute;rio</option>
                                      <option value="Facultativo">Facultativo</option>
                                      <option value="Indisponível" selected>Indispon&iacute;vel</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td align = "center" colspan="2">    
                                    <label>Entidade Parceira<font color="red">*</font>:</label> 
                                    <select class="span2" name="entidade_parceira" id="entidade_parceira">
                                      <option value="Obrigatório">Obrigat&oacute;rio</option>
                                      <option value="Facultativo">Facultativo</option>
                                      <option value="Indisponível" selected>Indispon&iacute;vel</option>
                                    </select> 
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td align = "center" valign="top">
                                    <label> D&eacute;bito Direto<font color="red">*</font>: </label>
                                    <select class="span2" name="debito_direto" id="debito_direto">
                                      <option value="Obrigatório">Obrigat&oacute;rio</option>
                                      <option value="Facultativo">Facultativo</option>
                                      <option value="Indisponível" selected>Indispon&iacute;vel</option>
                                    </select>
                                </td>
                                <td align = "center">
                                    <label>Forma de Pagamento:</label>
                                    <input  class="span2" type="text" placeholder="Forma de pagamento" name="forma_pagamento" id="forma_pagamento">
                                </td>
                            </tr>
                            <tr class="hero-unit"> 
                                <td align = "center" valign="top">
                                    <label>Valor EP:</label>
                                    <input  class="span2" type="text" placeholder="Valor EP" name="valor_ep" id="valor_ep">  
                                </td>
                                <td align = "center" valign="top">
                                    <label>Valor Ben&eacute;fico EP:</label> 
                                    <input class="span2" type="text" placeholder="Valor Ben&eacute;fico EP" name="valor_benefico_ep" id="valor_benefico_ep">
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td align = "center">
                                    <label>Unidade EP:</label> 
                                    <input class="span2" type="text" placeholder="Estado" name="unidade_ep" id="unidade_ep">
                                </td>
                                <td  align = "center">
                                    <label>Aplicado EP:</label> 
                                    <input class="span2" type="text" placeholder="Aplicado EP"  name="aplicado_ep" id="aplicado_ep"> <br> 
                                </td>
                            
                            </tr>  
                          
                    </table>
                    </fieldset>

            </td>
        </tr>
         <tr>
       
         </tr>   
        <tr align="left">
            <td colspan="2">
             <br>
             <!---------------------- TABELA CONDICOES ---------------------->
              <fieldset align="center" >
                <table  id="table_condicao" width='93%' height='50%' align="center" border="2" abordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Condi&ccedil;&atilde;o da Oferta:
                                    </label>
                                </td>
                                <td align="left">
                                    <input class="span6"  type="text" placeholder="Condi&ccedil;&atilde;o da Oferta"  name="condicao_oferta_1" id="condicao_oferta_1">
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td width="20%" align="left">
                                    <label>
                                        Valor da Condi&ccedil;&atilde;o:
                                    </label>
                                </td>
                                <td align="left">
                                     <input class="span6" type="text" placeholder="Valor da Condi&ccedil;&atilde;o"  name="valor_oferta_1" id="valor_oferta_1">
                                </td>
                            </tr>
                            <tr class="hero-unit"> 
                                 <td id="table_linha_condicao_1" align="left" colspan="2">                                                    
                                  <form>    
                                    <input type="button" class="btn btn-primary btn-mini btn-danger" name="botao_condicao_1" id="botao_condicao_1" value="+" onClick="javascript:novaLinha('table_condicao','Condi&ccedil;&atilde;o da Oferta:','condicao_oferta_','Valor da Condi&ccedil;&atilde;o:','valor_oferta_','botao_condicao_1')"></input>
                                  </form>    
                                </td>
                            </tr>

                </table>
             </fieldset>
            </td>
        </tr>
    
        <tr>
                <td valign="top" >
                <br><br>
                <!---------------------- TABELA GAS ---------------------->
                <fieldset align="left" >
                    <table  width='87%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" charset="utf-8">
                            <tr  class="hero-unit">
                                <td WIDTH="200" HEIGHT="30"   align="left" colspan="2">
                                    <label>
                                        <h4>3. G&aacute;s:  <input type="checkbox" id="gas" value="check" name="gas" onclick="validate()" ></h4>
                                    </label>
                                </td>     
                            </tr>
                             <tr  class="hero-unit">
                                <td align="center" width="20%" colspan="2">
                                    <label>
                                        Componente Estruturada :
                                    </label>
                                     <input class="span4"  type="text" placeholder="Componente Estruturada G&aacute;s: "  name="componente_gas" id="componente_gas">
                                </td>
                            <tr  class="hero-unit">
                                <td align="center" width="20%" colspan="2">
                                    <label>
                                       ID Componente Estruturada :
                                    </label>
                                     <input class="span4"  type="text" placeholder="ID Componente Estruturada G&aacute;s: "  name="id_componente_gas" id="id_componente_gas">
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                <td  valign="top" align="center" colspan="2">
                                        <label>Estrutura Tarif&aacute;ria:&nbsp; &nbsp;<button  style="width:65;height:65" id="botao_actualiar_gas" name="botao_actualiar_gas" class="btn btn-mini" ><img  src="../assets/ico/icon_factory_reset.png" alt="Refresh" style="width:20px; height: 20px" ></button> </label>
                                        <div id="select_gas_js"> 
                                        <select id="select_gas" name="select_gas" class="span4">
                                         <?php
                                            $result=gettarifas_gas('1','1');
                                            $rows=mysql_num_rows($result);
                                            while($row = mysql_fetch_array($result))
                                            {
                                                $nome_tarifario = $row['NOME_TARIFARIO'];
                                                $nome_empresa = $row['NOME_EMPRESA'];                              
                                                echo("<option value='".$nome_tarifario."' selected>".$row['NOME_TARIFARIO']."</option>");  
                                            }
                                        ?>
                                        </select>
                                         </div>  
                                       <!-- <input type="text" id="refesh_gas" name="refesh_gas" class="icon-refresh"> btn btn-primary btn-mini-->
                                </td>  
                            </tr>
                            <tr class="hero-unit">
                                <td  valign="top" align="center" colspan="2">
                                        <label>ID Estrutura Tarif&aacute;ria: </label>
                                        <!--<select id="select_id_gas" name="select_id_gas" class="span4" disabled="true">-->
                                          <?php
                                            $result=gettarifas_gas($nome_tarifario,$nome_empresa);
                                            $rows=mysql_num_rows($result);
                                            $row = mysql_fetch_array($result);
                                            //echo $row['ESTRUTURA_TARIFARIO'];
                                            //echo("<option value='1'>".$rows."</option>");  
                                            /*while($row = mysql_fetch_array($result))
                                            {
                                               echo("<option value='".$row['ESTRUTURA_TARIFARIO']."' selected>".$row['ESTRUTURA_TARIFARIO']."</option>");  
                                            } */                                 
                                          ?>
                                        <!--</select>-->
                                        <div id="nome_tarifario_gas">
                                            <input class="span4"  type="text" value="<?php echo $row['ESTRUTURA_TARIFARIO'] ?>" name="select_id_gas" id="select_id_gas"  readonly=true> 
                                        </div>
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                 <td WIDTH="200" HEIGHT="30"  align="right" colspan="2">
                                    <a href="criartarifario_gas.php"  target="_blank">   
                                        <input type="button" class="btn btn-group.open btn-mini btn-danger" id="botao_tarifa_gas" value="Adicionar Tarif&aacute;rio"></input>
                                    </a> 
                                </td> 
                            </tr>
                                  
                                </table>
                         </fieldset>
                        </td> 
            <td valign="top">
                <br><br>
                <!---------------------- TABELA ELECTRICIDADE ---------------------->
                 <fieldset align="center">
                    <table   width='87%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                             <tr  class="hero-unit">
                                <td WIDTH="200" HEIGHT="30"   align="left" colspan="2">
                                    <label>
                                        <h4> 4. Eletricidade:  <input type="checkbox" id="electricidade" value="check" name="electricidade"  onclick="validate()" ></h4>
                                    </label>
                                </td>     
                             </tr>
                             <tr  class="hero-unit">
                                    <td   width="20%" align="center" colspan="2">
                                        <label>
                                            Componente Estruturada:
                                        </label>
                                    <input class="span4"  type="text" placeholder="Componente Estruturada Electricidade: "  name="componente_electricidade" id="componente_electricidade">
                                    </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td   width="20%" align="center" colspan="2">
                                    <label>
                                       ID Componente Estruturada:
                                    </label>
                                    <input class="span4"  type="text" placeholder="ID Componente Estruturada Electricidade: "  name="id_componente_electricidade" id="id_componente_electricidade">
                                </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td  valign="top "  align="center" colspan="2">
                                        <label>Estrutura Tarif&aacute;ria:&nbsp; &nbsp;<button type='button' id="botao_actualiar_electricidade" name="botao_actualiar_electricidade" class="btn btn-mini"><img src="../assets/ico/icon_factory_reset.png" alt="Refresh" style="width:20px; height: 20px"></button> </label> 
                                        <div id="select_electricidade_js">
                                        <select id="select_electricidade" name="select_electricidade" class="span4">
                                          <?php
                                            $result=gettarifas("ELECTRICIDADE");
                                            $rows=mysql_num_rows($result);
                                            while($row = mysql_fetch_array($result))
                                            {
                                                $nome=$row['NOME'];                                
                                                echo("<option  value='".$nome."' selected>".$nome."</option>");                           
                                            }
                                           
                                          ?>
                                        </select>
                                        </div>
                                </td>
                            </tr> 
                            <tr class="hero-unit">
                                <td  valign="top"  align="center" colspan="2">
                                        <label>ID Estrutura Tarif&aacute;ria: </label>
                                        <!--<select id="select_id_electricidade" name="select_id_electricidade" class="span4">
                                          <?php 
                                            $sql="SELECT ID_TARIFARIO FROM ELECTRICIDADE WHERE NOME='".$nome."'";
                                            $result=mysql_query($sql) or die(mysql_error());
                                            $row = mysql_fetch_array($result);
                                          ?>
                                        </select>-->
                                        <div id="nome_tarifario_electricidade">
                                            <input class="span4"  type="text" value="<?php echo $row['ID_TARIFARIO'] ?>" name="select_id_electricidade" id="select_id_electricidade"  readonly=true> 
                                        </div>
                                </td>        
                            </tr>
                            <tr  class="hero-unit">
                                 <td WIDTH="200" HEIGHT="30"  align="right" colspan="2">
                                    <a href="criartarifario.php"  target="_blank">   
                                        <input type="button" class="btn btn-group.open btn-mini btn-danger" id="botao_tarifa_electricidade" name="botao_tarifa_electricidade" value="Adicionar Tarif&aacute;rio"></input>
                                    </a> 
                                </td> 
                            </tr>
                                  
                                </table>
                         </fieldset>
                        </td> 
    </tr>
    <tr>
            <td colspan="2">
             <br>
              <!---------------------- TABELA RESTRICOES GAS---------------------->
              <fieldset align="center" >
                <p align="center"><h4>3.1 G&aacute;s:</h4></p>
                <table  id="table_restricao_gn" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td width="20%" align="left">
                                    <label>
                                        Restri&ccedil;&atilde;o:
                                    </label>
                                </td>
                                <td align="left">
                                    <input class="span6"  type="text" placeholder="Restri&ccedil;&atilde;o"  name="restricao_gas_1" id="restricao_gas_1">
                                
                                </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Valor da Restri&ccedil;&atilde;o:
                                    </label>
                                </td>
                                <td align="left">
                                     <input class="span6"  type="text" placeholder="Valor da Restri&ccedil;&atilde;o"  name="valor_restricao_gas_1" id="valor_restricao_gas_1">
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                 <td id="table_linha_restricao_gn_1"  align="left" colspan="2">   
                                    <input type="button" id="botao_restricao_gas" class="btn btn-primary btn-mini btn-danger" value="+" onClick="javascript:novaLinha('table_restricao_gn','Restri&ccedil;&atilde;o','restricao_gas_','Valor da Restri&ccedil;&atilde;o','valor_restricao_gas_','botao_restricao_gas')"></input>  
                                </td>
                            </tr>
                </table>
             </fieldset>
            </td>
     </tr>
     <tr>
            <td colspan="2">
             <br>
             <!---------------------- TABELA RESTRICOES ELECTRICIDADE---------------------->
              <fieldset align="center" >
                <p align="center" ><h4>4.1 Electricidade:</h4></p>
                <table  id="table_restricao_e" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Restri&ccedil;&atilde;o:
                                    </label>
                                </td>
                                <td align="left">
                                    <input class="span6"  type="text" placeholder="Restri&ccedil;&atilde;o"  name="restricao_electricidade_1" id="restricao_electricidade_1">

                                </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Valor da Restri&ccedil;&atilde;o:
                                    </label>
                                </td>
                                <td align="left">
                                     <input class="span6"  type="text" placeholder="Valor da Restri&ccedil;&atilde;o"  name="valor_restricao_electricidade_1" id="valor_restricao_electricidade_1">
                                </td>
                            </tr>
                            <tr class="hero-unit">
                                 <td id="table_linha_restricao_e_1" align="left" colspan="2">    
                                    <input type="button" class="btn btn-primary btn-mini btn-danger" id="botao_restricao_electricidade"  value="+" onClick="javascript:novaLinha('table_restricao_e','Restri&ccedil;&atilde;o','restricao_electricidade_','Valor da Restri&ccedil;&atilde;o','valor_restricao_electricidade_','botao_restricao_electricidade')"></input>   
                                </td>
                            </tr>
                </table>
             </fieldset>
            </td>
        </tr>
    
        <tr>
            <td colspan="2">
             <br>
             <!---------------------- TABELA SERVICO ESTRUTURADO---------------------->
              <fieldset align="center" >
                   <h4> 5. Servi&ccedil;o Estruturado:</h4></label>          
                <table  id="table_serv" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                             <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Estrutura Tarif&aacute;ria:
                                    </label>
                                </td>
                                <td align="left">
                                     <input class="span6"  type="text" placeholder="Estrutura Tarif&aacute;ria"  name="estrutura_tarifaria_serv_1" id="estrutura_tarifaria_serv_1">
                              </td>
                             </tr>
                             <tr  class="hero-unit">
                                <td width="20%" align="left">
                                    <label>
                                       ID Estrutura Tarif&aacute;ria:
                                    </label>
                                </td>
                                <td align="left">
                                      <input class="span6"  type="text" placeholder="ID Estrutura Tarif&aacute;ria"  name="id_estrutura_tarifaria_serv_1" id="id_estrutura_tarifaria_serv_1">
                                </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Servi&ccedil;o Estruturado:
                                    </label>
                                </td>
                                <td align="left">
                                    <input class="span6"  type="text" placeholder="Servi&ccedil;o Estruturado"  name="servico_estruturado_1" id="servico_estruturado_1">
                                </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td  width="20%" align="left">
                                <label>
                                   ID Servi&ccedil;o Estruturado:
                                </label>
                                </td>
                                <td align="left">
                                     <input class="span6"  type="text" placeholder="ID Servi&ccedil;o Estruturado"  name="id_servico_estruturado_1" id="id_servico_estruturado_1">
                                </td>
                             </tr>
                             <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                <label>
                                   Estado do Servi&ccedil;o:
                                </label>
                                </td>
                                <td align="left">
                                     <input class="span6"  type="text" placeholder="Estado do Servi&ccedil;o"  name="estado_servico_1" id="estado_servico_1">
                                </td>
                            </tr>
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                       Obrigatoriadade:
                                    </label>
                                </td>
                                <td align="left">
                                     <!--<input   type="checkbox" value="Sim" id="obrigatoriadeda_servico_1" name="obrigatoriadeda_servico_1" >-->
                                     <select class="span2" name="obrigatoriadade_servico_1" id="obrigatoriadade_servico_1">
                                      <option value="Sim">Sim</option>
                                      <option value="Não">N&atilde;o</option>
                                      <option value="N/A" selected>N/A</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <tr class="hero-unit">
                                 <td id="tabela_linha_serv_1" align="left" colspan="2">    
                                    <input type="button" class="btn btn-primary btn-mini btn-danger" id="botao_servico_estruturado_1" name="botao_servico_estruturado_1" value="+" onClick="javascript:novaLinha_v2()"></input>
                                  </form>    
                                </td>
                            </tr>
                                
                </table>
             </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="2">
             <br>
             <!---------------------- TABELA OFERTAS ALTERNATIVAS---------------------->
             <fieldset align="center" >
                <h4> 6. Ofertas Alternativas:</h4></label>          
                <table  id="table_serv" width='93%' height='50%' align="center" border="2" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        Electricidade:
                                    </label>
                                </td>
                                <td align="left">
                                    <input class="span6"  type="text" placeholder="Electricidade Alternativa"  name="electricidade_alternativa" id="electricidade_alternativa">
                                </td>
                            </tr>
                           <tr  class="hero-unit">
                                <td   width="20%" align="left">
                                    <label>
                                        G&aacute;s:
                                    </label>
                                </td>
                                <td align="left">
                                    <input class="span6"  type="text" placeholder="G&aacute;s Alternativo"  name="gas_alternativa" id="gas_alternativa">
                                </td>
                            </tr>
                </table>
             </fieldset>
            </td>
        </tr>
         <tr>
            <td colspan="2">
             <br>
             <!---------------------- TABELA Obeservacao---------------------->
             <fieldset align="center" >
                <h4> 7. Observ&ccedil;&otilde;es adicionais:</h4></label>          
                <table  id="table_serv" width='93%' height='50%' align="center" border="0" bordercolor="#000000" style="background-color:#FFFFFF;TABLE-LAYOUT: fixed;" >
                            <tr  class="hero-unit">
                                <td   width="20%" align="center" colpsn="2">
                                    <textarea  id="observacao" name="observacao" class="span11" rows="10"> </textarea>
                                </td>
                            </tr>
                </table>
             </fieldset>
            </td>
        </tr>
    </table>
    </fieldset>

    <br><br>
    <br>   <br><br>
    <p align="center"><button id="select" type="submit" class="btn btn-primary btn-large btn-danger">Adicionar</button></p>
    </form>
    
    <?php
        }
    ?>
    <br><br><br>
    <hr>

     <footer>
        <p><strong>&copy; EDP Soluções Comerciais, S.A</strong> <img class="pull-right" src="../assets/img/logo.gif"></p>
    </footer>
    </div> <!-- /container -->
        
    <!-- Le javascript
    ================================================== -->
             <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="../chilistats/stats.php"><img src="../chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="../chilistats/stats.php"><img src="../chilistats/counter.php" /></a></noscript>
    </div>
    <!-- No final do documento para acelarar carregamento da pagina-->
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