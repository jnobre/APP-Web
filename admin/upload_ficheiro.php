<?php
    session_start();
    include('../mysql.php');
    include('../mysqlconnect.php');
    include('../login_status.php');
    
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
    <link href="../assets/css/upload.css" rel="stylesheet">
        
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
    <!--<script type="text/javascript" charset="utf-8" src="../assets/js/jquery.mim.js"></script>-->
    <script src="../jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        // common variables
        var iBytesUploaded = 0;
        var iBytesTotal = 0;
        var iPreviousBytesLoaded = 0;
        var iMaxFilesize = 1048576; // 1MB
        var oTimer = 0;
        var sResultFileSize = '';
        
        window.onload = function(){
            //div electricidade/gas
            document.getElementById("Upload").disabled = true;
        }
     
        function secondsToTime(secs) { // we will use this function to convert seconds in normal time format
            var hr = Math.floor(secs / 3600);
            var min = Math.floor((secs - (hr * 3600))/60);
            var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

            if (hr < 10) {hr = "0" + hr; }
            if (min < 10) {min = "0" + min;}
            if (sec < 10) {sec = "0" + sec;}
            if (hr) {hr = "00";}
            return hr + ':' + min + ':' + sec;
        };

        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB'];
            if (bytes == 0) return 'n/a';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
        };

        function fileSelected() {

            // hide different warnings
            document.getElementById('upload_response').style.display = 'none';
            document.getElementById('error').style.display = 'none';
            document.getElementById('error2').style.display = 'none';
            document.getElementById('abort').style.display = 'none';
            document.getElementById('warnsize').style.display = 'none';

            // get selected file element
            var oFile = document.getElementById('ficheiro').files[0];

            // filter for image files
            //var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
            //var rFilter = /^(image\/xlsx|image\/cvs)$/i;
            
            var rFilter = /^(application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet|application\/vnd.ms-excel)$/i;
            if (! rFilter.test(oFile.type)) {
                document.getElementById('error').style.display = 'block';
                document.getElementById('Upload').disabled = true;
                return;
            }
            else
            {
                document.getElementById('Upload').disabled = false;
            }
            
            // little test for filesize
            if (oFile.size > iMaxFilesize) {
                document.getElementById('warnsize').style.display = 'block';
                return;
            }

            // get preview element
            //var oImage = document.getElementById('preview');

            // prepare HTML5 FileReader
            var oReader = new FileReader();
            oReader.onload = function(e){

                // e.target.result contains the DataURL which we will use as a source of the image
              /*  oExcel.src = e.target.result;

                oExcel.onload = function () { // binding onload event
                    // we are going to display some custom image information here
                    sResultFileSize = bytesToSize(oFile.size);
                    document.getElementById('fileinfo').style.display = 'block';
                    document.getElementById('filename').innerHTML = 'Name: ' + oFile.name;
                    document.getElementById('filesize').innerHTML = 'Size: ' + sResultFileSize;
                    document.getElementById('filetype').innerHTML = 'Type: ' + oFile.type;
                    document.getElementById('filedim').innerHTML = 'Dimension: ' + oImage.naturalWidth + ' x ' + oImage.naturalHeight;
                }; */
            };

            // read selected file as DataURL
            oReader.readAsDataURL(oFile);
        }
        
        function reqListener () {
          console.log(this.responseText);
        };

        function startUploading() {

            // limpar todos os temp's disponiveis
            iPreviousBytesLoaded = 0;
            document.getElementById('upload_response').style.display = 'none';
            document.getElementById('error').style.display = 'none';
            document.getElementById('error2').style.display = 'none';
            document.getElementById('abort').style.display = 'none';
            document.getElementById('warnsize').style.display = 'none';
            document.getElementById('progress_percent').innerHTML = '';
            var oProgress = document.getElementById('progress');
            oProgress.style.display = 'block';
            oProgress.style.width = '0px';

            // get form data for POSTing
            //var vFD = document.getElementById('upload_form').getFormData(); // for FF3
            var vFD = new FormData(document.getElementById('upload_form')); 

            // create XMLHttpRequest object, adding few event listeners, and POSTing our data
            var oXHR = new XMLHttpRequest();   

            oXHR.upload.addEventListener('progress', uploadProgress, false);
            oXHR.addEventListener('load', uploadFinish, false);
            oXHR.addEventListener('error', uploadError, false);
            oXHR.addEventListener('abort', uploadAbort, false);
            //oXHR.onload = reqListener;
            oXHR.open('POST', 'upload.php');
            oXHR.send(vFD);
 
           /*oXHR.onreadystatechange=function()
            {
              if (oXHR.readyState==4 && oXHR.status==200)
              {
                console.log("ENTRA");
                document.getElementById("upload_response").innerHTML=oXHR.responseText;
              }
            }*/
            
            //document.getElementById("upload_response").innerHTML=oXHR.responseText;                                     
            // set inner timer
            oTimer = setInterval(doInnerUpdates, 300);
        }

        function doInnerUpdates() { // mostra velocidade do upload
            var iCB = iBytesUploaded;
            var iDiff = iCB - iPreviousBytesLoaded;

            // if nothing new loaded - exit
            if (iDiff == 0)
                return;

            iPreviousBytesLoaded = iCB;
            iDiff = iDiff * 2;
            var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
            var secondsRemaining = iBytesRem / iDiff;

            // info velocidade de upload
            var iSpeed = iDiff.toString() + 'B/s';
            
            if (iDiff > 1024 * 1024) {
                iSpeed = (Math.round(iDiff * 100/(1024*1024))/100).toString() + 'MB/s';
            } else if (iDiff > 1024) {
                iSpeed =  (Math.round(iDiff * 100/1024)/100).toString() + 'KB/s';
            }

            document.getElementById('speed').innerHTML = iSpeed;
            document.getElementById('remaining').innerHTML = '| ' + secondsToTime(secondsRemaining);        
        }

        function uploadProgress(e) { // upload process in progress
            if (e.lengthComputable) {
                iBytesUploaded = e.loaded;
                iBytesTotal = e.total;
                var iPercentComplete = Math.round(e.loaded * 100 / e.total);
                var iBytesTransfered = bytesToSize(iBytesUploaded);

                document.getElementById('progress_percent').innerHTML = iPercentComplete.toString() + '%';
                document.getElementById('progress').style.width = (iPercentComplete * 4).toString() + 'px';
                document.getElementById('b_transfered').innerHTML = iBytesTransfered;
                if (iPercentComplete == 100) {
                    var oUploadResponse = document.getElementById('upload_response');
                    oUploadResponse.innerHTML = "<img src='../assets/img/ajax-loader.gif' alt='Load' height='50' width='50'><h1>Carregando...</h1>";
                    oUploadResponse.style.display = 'block';
                }
            } else {
                document.getElementById('progress').innerHTML = 'unable to compute';
            }
        }

        function uploadFinish(e) { // upload successfully finished
            var oUploadResponse = document.getElementById('upload_response');
            oUploadResponse.innerHTML = e.target.responseText;
            oUploadResponse.style.display = 'block';

            document.getElementById('progress_percent').innerHTML = '100%';
            document.getElementById('progress').style.width = '400px';
            document.getElementById('filesize').innerHTML = sResultFileSize;
            document.getElementById('remaining').innerHTML = '| 00:00:00';

            clearInterval(oTimer);
        }

        function uploadError(e) { // upload error
            document.getElementById('error2').style.display = 'block';
            clearInterval(oTimer);
        }  

        function uploadAbort(e) { // upload abort
            document.getElementById('abort').style.display = 'block';
            clearInterval(oTimer);
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
                  <li ><a href="profile.php">Minha Conta</a></li>
                  <li> <a href="registar.php">Criar User</a> </li>
                  <li> <a href="listarusers.php">Gerir Utilizadores Existentes</a> </li>
                  <li class="divider"></li>
                  <li class="nav-header">Ofertas</li>
                  <li><a href="criaroferta.php">Criar Oferta</a></li>
                  <li><a href="gerirofertas.php">Gerir Ofertas Existentes</a></li>
                  <li class="active"><a href="upload_ficheiro.php">Upload Ficheiro</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Tarifário</li>
                   <li ><a href="gerirtarifario.php">Gerir Tarifários Eletricidade</a></li>
                  <li><a href="gerirtarifario_g.php">Gerir Tarifários Gás</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Servidor</li>
                  <li><a href="log_operacao.php">Ver Log de Opera&ccedil;&otilde;s</a></li>
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
                    echo("Bem Vindo <a href=admin/profile.php?nome=" . $_SESSION['nome'] . ">" . $_SESSION['nome'] . "</a>");
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

    <!---------------------- Upload Imagem ---------------------->
        
            <div class="contr"><h2>Selecione ficheiro (excel) e clique no Bot&atilde;o de Upload</h2></div>

            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                      <!--  <div><label for="ficheiro">Por favor selecione ficheiro</label></div>-->
                        <div><input type="file" name="ficheiro" id="ficheiro" onchange="fileSelected();" /></div>
                    </div>
                    <div>
                        <input type="button" id = "Upload" value="Upload" onclick="startUploading()"/>
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                     <div id="error"> Deve selecionar arquivos de excel v&aacute;lidos! </div>
                     <div id="error2"> Ocorreu um erro ao carregar o arquivo </div>
                     <div id="abort"> O carregamento foi cancelado. Liga&ccedil;&atilde;o est&aacute; em baixo.</div>
                    <div id="warnsize"> Arquivo demasiado grande. Selecione um arquivo mais pequeno </div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response" align="center">
                        ola mundo
                        </div>
                        <?php
                          //  echo "TEste ==" .  $_SESSION['nome'] ."<br>";
                        ?> 
                    </div>
                    
                </form>
               
               <!-- <img id="preview" />-->
            </div>


    <br><br>

    <br><br><br>
    <hr>

     <footer>
        <p><strong>&copy; EDP Solu&ccedil;&otilde;es Comerciais</strong> <img class="pull-right" src="../assets/img/logo.gif"></p>
    </footer>
    </div> <!-- /container -->
         <div style="visibility:hidden" >
    <script type="text/javascript">
        document.write('<a href="chilistats/stats.php"><img src="chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
        </script>
      <noscript><a href="chilistats/stats.php"><img src="chilistats/counter.php" /></a></noscript>
    </div>
    <!-- Le javascript
    ================================================== -->
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