
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="imagem">Imagem:</label>
		   <input type="file" name="imagem"/>
		   <br/>
		   <input type="submit" value="Enviar"/>
    </form>
</body>
</html>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Salvando imagem no BD</title>
	<meta charset="utf-8"/>
     
    <head>
        Adicionando referências
        <script src="Resources/dynamsoft.webtwain.initiate.js"> </script>
        <script src="Resources/dynamsoft.webtwain.config.js"> </script>
        <script src="Resources/addon/dynamsoft.webtwain.addon.webcam.js"> </script>

         adicionados recentemente --
        <script src="/Resources/addon/dynamsoft.webtwain.addon.webcam.js"> </script>
	    <link rel="stylesheet" href="Style/ds.demo.css">
    </head>
    
   
</head>
<body>
    <form action="salve.php" method="POST" enctype="multipart/"></form>

     Criar um contêiner
    <div id="dwtcontrolContainer"> </div>
    <select class="w100p" id="source"></select>
    <input type="button" id="btn-switch" class="btn  bgBlue mt20" value="Hide Video" onclick="SwitchViews();" />
    <input type="button" id="btn-grab" class="btn  bgBlue mt20"  value="Acquire From a webcam" onclick="CaptureImage();" />
    <input type="button" id="btn-upload" class="btn  bgBlue mt20" value="Upload" onclick="upload();" disabled />
    
   

    <script type="text/javascript">
        var DWObject;
        var isVideoOn = true;
        
        //Inicialize o objeto chamando Dynamsoft_OnReady ()
        function Dynamsoft_OnReady() {
            DWObject = Dynamsoft.WebTwainEnv.GetWebTwain('dwtcontrolContainer'); // Get the Dynamic Web TWAIN object that is embedded in the div with id 'dwtcontrolContainer'
            if (DWObject) {
                DWObject.Width = 504;
                DWObject.Height = 600;
 
                var arySource = DWObject.Addon.Webcam.GetSourceList();
                for (var i = 0; i < arySource.length; i++)
                    document.getElementById("source").options.add(new Option(arySource[i], arySource[i]), i); // Get Webcam Source names and put them in a drop-down box
            }
            document.getElementById('source').onchange = function () {
          DWObject.Addon.Webcam.SelectSource(document.getElementById("source").options[document.getElementById("source").selectedIndex].value);
                SetIfWebcamPlayVideo(true);           
            }
            document.getElementById('source').onchange();

        // Controlar a webcam
        function enableButton(element) {
            element.style.backgroundColor = "";
            element.disabled = "";
            }
 
        function disableButton(element) {
            element.style.backgroundColor = "#aaa";
            element.disabled = "disabled";
           }
        
        function SetIfWebcamPlayVideo(bShow) {
            if (bShow) {
                DWObject.Addon.Webcam.StopVideo();
                DWObject.Addon.Webcam.PlayVideo(DWObject, 80, function () { });
                isVideoOn = true;
                enableButton(document.getElementById("btn-grab"));
                document.getElementById("btn-switch").value = "Hide Video";
            }
            else {
                DWObject.Addon.Webcam.StopVideo();
                isVideoOn = false;
                disableButton(document.getElementById("btn-grab"));
                document.getElementById("btn-switch").value = "Show Video";             
            }
        }
 
        function SwitchViews() {
            if (isVideoOn == false) {
                // continue the video
                SetIfWebcamPlayVideo(true);
            } else {
                // stop the video
                SetIfWebcamPlayVideo(false);
            }           
        }
        
        // Capturar imagens usando CaptureImage Certo tbm
        function CaptureImage() {
            if (DWObject) {
                if (document.getElementById('source').selectedIndex < webCamStartingIndex) {
                    DWObject.IfShowUI = true;
                    DWObject.IfDisableSourceAfterAcquire = true;
                    DWObject.SelectSourceByIndex(document.getElementById('source').selectedIndex);
                    DWObject.CloseSource();
                    DWObject.OpenSource();
                    DWObject.AcquireImage();
                }
                else {
 
                    var funCaptureImage = function () {
                        SetIfWebcamPlayVideo(false);
                    };
                    DWObject.Addon.Webcam.CaptureImage(funCaptureImage, funCaptureImage);
                }
            }
        }

        /* Certo
        function CaptureImage() {
            if (DWObject) {
                var funCaptureImage = function () {
                    SetIfWebcamPlayVideo(false);
                };
                DWObject.Addon.Webcam.CaptureImage(funCaptureImage, funCaptureImage);
            }
            
        }
     
        function CaptureImage() {
            if (DWObject) {
                if (document.getElementById('source').selectedIndex < webCamStartingIndex) {
                    DWObject.IfShowUI = true;
                    DWObject.IfDisableSourceAfterAcquire = true;
                    DWObject.SelectSourceByIndex(document.getElementById('source').selectedIndex);
                    DWObject.CloseSource();
                    DWObject.OpenSource();
                    DWObject.AcquireImage();
                }
                else {
 
                    var funCaptureImage = function () {
                        SetIfWebcamPlayVideo(false);
                    };
                    DWObject.Addon.Webcam.CaptureImage(funCaptureImage, funCaptureImage);
                }
            }
            
        }

        <input type="button" id="btn-upload" class="btn  bgBlue mt20"
               value="Upload" onclick="upload();" disabled />
               function upload() {
                   if (DWObject) {
                      // If no image in buffer, return the function
                      if (DWObject.HowManyImagesInBuffer == 0)
                      return;
 
                       var strHTTPServer = location.hostname; //The name of the HTTP server. For example: "www.dynamsoft.com";
                       var CurrentPathName = unescape(location.pathname);
                       var CurrentPath = CurrentPathName.substring(0, CurrentPathName.lastIndexOf("/") + 1);
                       var strActionPage = CurrentPath + "filename"; // Action page
                       DWObject.IfSSL = false; // Set whether SSL is used
                       DWObject.HTTPPort = location.port == "" ? 80 : location.port;
 
                       var Digital = new Date();
                       var uploadfilename = Digital.getMilliseconds(); // Uses milliseconds according to local time as the file name
 
                       //Upload image in JPEG
                       DWObject.HTTPUploadThroughPost(strHTTPServer, DWObject.CurrentImageIndexInBuffer, strActionPage, uploadfilename + ".jpg", OnHttpUploadSuccess, OnHttpUploadFailure);
            }
        }
     
        */
        }
    </script>
    
    
</body>
</html>
-->




