<!DOCTYPE>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"> 
   
  
  
<meta property="og:title" content="Adopta un Amigo!" />
<meta property="og:description" content="Descubreme y adoptame, comparte tu hogar conmigo" />
<meta property="og:url" content="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'] ?>" />
<?php 		
                    
                          $clave = $_GET['clave']; 
                        
                          $objConnect1 = mysql_connect("localhost","prodan_prodan","danpro") or die(mysql_error());
                          $objDB1 = mysql_select_db("prodan_prodan");
                          $strSQL1 = "SELECT foto1 FROM adopciones WHERE clave='$clave'";
                          
                          $objQuery1 = mysql_query($strSQL1);
                          $Num_Rows1 = mysql_num_rows($objQuery1); 
                          
                          while($objResult1 = mysql_fetch_array($objQuery1))
                           {
                        
                          
						   
						
                    
                    ?>
<meta property="og:image" content="http://www.prodan.org.mx/fotos_adop/<?php echo $objResult1['foto1'] ?>" />
 
 
 <?php } ?>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="icon" type="image/x-icon" href="imgs/favicon.ico" />
    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'> 
    <link rel="stylesheet" type="text/css" href="css/styledet1.css" />
    <link rel="stylesheet" type="text/css" href="css/tsc_social_icons.css" />
    
    <link rel="stylesheet" type="text/css" media="all" href="fancybox/jquery.fancybox.css">
 
    
    <style>
		body {
			margin: 0;
			padding: 0;
		}
		a {
			color: #09f;
		}
		a:hover {
			text-decoration: none;
		}
		#back_to_camera {
			clear: both;
			display: block;
			height: 80px;
			line-height: 40px;
			padding: 20px;
		}
		.fluid_container {
			margin: 0 auto;
			max-width: 1000px;
			width: 90%;
		}
	</style>

    <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //		Scripts
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////--> 

    
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <script type='text/javascript' src='scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='scripts/camera.min.js'></script> 
    
    
    <script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.0.6"></script>
    
    
    <script>
    
    
function validateEmail(email) { 
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return reg.test(email);
	}

	
function validateQuien2(quien2) { 
		var reg = /^[^0-9]+$/;
		return reg.test(quien2);
	}	
	
    
    
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
			       
				thumbnails: false,
				autoAdvance: false,
				mobileAutoAdvance: false,
				playPause: false,
				fx: 'scrollLeft',
												
				portrait:true
				
			});
			
			
				
						
		});
		
		$(function(){

		 	$("#inline").hide();
			$("#inline2").hide();
			$("#inline3").hide();
			$("#mensaje").hide();
			
			$(".modalbox").fancybox({
					
				
			});
			
			
			
			$("#contact").submit(function() { 
		return false;
	 });

		
		$("#send").on("click", function(){
		
			var emailval  = $("#email").val();			
			var quien2val  = $("#quien2").val();
						
			var nombreval    = $("#nombre").val();
			var nombrelen    = nombreval.length;
			
			var edadval    = $("#edad").val();
			var edadlen    = edadval.length;
		
			var telcasaval    = $("#telcasa").val();
			var telcasalen    = telcasaval.length;
			
			var telcval    = $("#telc").val();
			var telclen    = telcval.length;
			
			var direccionval    = $("#direccion").val();
			var direccionlen    = direccionval.length;
			
			var direccion1val    = $("#direccion1").val();
			var direccion1len    = direccion1val.length;
			
			var ocupacionval    = $("#ocupacion").val();
			var ocupacionlen    = ocupacionval.length;
			
			var direccion2val    = $("#direccion2").val();
			var direccion2len    = direccion2val.length;
			
			var otrosval    = $("#otros").val();
			var otroslen    = otrosval.length;
			
			var dondeval    = $("#donde").val();
			var dondelen    = dondeval.length;

			
			var mailvalid = validateEmail(emailval);
			
			var quien2valid = validateQuien2(quien2val);			
			
			
			if(mailvalid == false) {
				$("#email").addClass("error");
				$("#mensaje").show();
			}
			else if(mailvalid == true){
				$("#email").removeClass("error");
				$("#mensaje").hide();
			}
			
			
			if(quien2valid == false) {
				$("#quien2").addClass("error");
				$("#mensaje").show();
			}
			else if(quien2valid == true){
				$("#quien2").removeClass("error");
				$("#mensaje").hide();
			}
			
			
			if(nombrelen < 1) {
				$("#nombre").addClass("error");
				$("#mensaje").show();
			}
			else if(nombrelen >= 1){
				$("#nombre").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(edadlen < 1) {
				$("#edad").addClass("error");
				$("#mensaje").show();
			}
			else if(edadlen >= 1){
				$("#edad").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(telcasalen < 1) {
				$("#telcasa").addClass("error");
				$("#mensaje").show();
			}
			else if(telcasalen >= 1){
				$("#telcasa").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(telclen < 1) {
				$("#telc").addClass("error");
				$("#mensaje").show();
			}
			else if(telclen >= 1){
				$("#telc").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(direccionlen < 1) {
				$("#direccion").addClass("error");
				$("#mensaje").show();
			}
			else if(direccionlen >= 1){
				$("#direccion").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(ocupacionlen < 1) {
				$("#ocupacion").addClass("error");
				$("#mensaje").show();
			}
			else if(ocupacionlen >= 1){
				$("#ocupacion").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(direccion1len < 1) {
				$("#direccion1").addClass("error");
				$("#mensaje").show();
			}
			else if(direccion1len >= 1){
				$("#direccion1").removeClass("error");
				$("#mensaje").hide();
			}
			
			
			if(direccion2len < 1) {
				$("#direccion2").addClass("error");
				$("#mensaje").show();
			}
			else if(direccion2len >= 1){
				$("#direccion2").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(otroslen < 1) {
				$("#otros").addClass("error");
				$("#mensaje").show();
			}
			else if(otroslen >= 1){
				$("#otros").removeClass("error");
				$("#mensaje").hide();
			}
			
			if(dondelen < 1) {
				$("#donde").addClass("error");
				$("#mensaje").show();
			}
			else if(dondelen >= 1){
				$("#donde").removeClass("error");
				$("#mensaje").hide();
			}
			
			
			
			    if (mailvalid == true && nombrelen >= 1 && edadlen >= 1 && telcasalen >= 1 && telclen >= 1 && direccionlen >= 1  && ocupacionlen >= 1 && direccion1len >= 1 && direccion2len >= 1 && otroslen >= 1 && dondelen >= 1 && quien2valid == true ) {
    				
    				$("#send").replaceWith("<em>Enviando...</em>");
    				
    				
 				var correo = $('#correo').val();
 				var email = $('#email').val();
 				var clavep = $('#clavep').val();
 				var nombrep = $('#nombrep').val();
 				var nombrec = $('#nombrec').val();
 				var telefonoc = $('#telefonoc').val();
 				var nombre = $('#nombre').val();
 				var edad = $('#edad').val();
 				var telcasa = $('#telcasa').val();
 				var telc = $('#telc').val();
    				var ocupacion = $('#ocupacion').val();
    				var direccion = $('#direccion').val();
    				var direccion1 = $('#direccion1').val();
    				var direccion2 = $('#direccion2').val();
    				var quien = $('#quien').val();
    				var quien2 = $('#quien2').val();
    				var compania = $('#otros').val();
    				var donde = $('#donde').val();
    				var msg = $('#msg').val();
    
    
				    $.ajax({
				        type: 'POST',
				        url: 'sendmessage1.php',
				        data: "correo=" + correo + "&" + "email=" + email + "&" + "clavep=" + clavep + "&" + "nombrep=" + nombrep + "&" + "nombre=" + nombre + "&" + "edad=" + edad + "&" + "telcasa=" + telcasa + "&" + "telc=" + telc + "&" + "ocupacion=" + ocupacion + "&" + "direccion=" + direccion + "&" + "direccion1=" + direccion1 + "&" + "direccion2=" + direccion2 + "&" + "quien=" + quien + "&" + "quien2=" + quien2 + "&" + "compania=" + compania + "&" + "donde=" + donde + "&" + "msg=" + msg + "&" + "nombrec=" + nombrec + "&" + "telefonoc=" + telefonoc ,
				       
				        success: function(data) {
				         
				        
				        
				        if(data == "true") {
                				$("#contact").fadeOut("fast", function(){
                    					$(this).before("<p><strong>Muy bien! El mensaje se ha enviado con exito, Gracias!</strong></p>");
                    					setTimeout("$.fancybox.close()", 2000);
                				});
            				     }
            				     
            				      if(data == "false") {
                				$("#contact").fadeOut("fast", function(){
                    					$(this).before("<p><strong>Error! El correo no existe o se presento alg&uacute;n problema, intente de nuevo!</strong></p>");
                    					setTimeout("$.fancybox.close()", 2000);
                				});
            				     }
				        
				        
				      
				            
				            
				        }
				    });
				    
				    
			 }
			
			
		});
	

		});
			
	</script>
 
</head>
<body>
	
<div id="page">    

	<!--Cabecera -->
    	<div id="header">
        	<!--Logo Prodan -->
                    <div style="width:100%; height:100%; position:relative; border:0px #99FF00 dashed;">
                        <img src="imgs/LOGO_PRODAN.png" width="100%" height="100%"/>
                    </div>
       </div>

	<div id="header2">
       
              <!--Logos Fb, Tw, YT, Home -->
         
                 
                 <div style="width:100%; height:50%; position:relative; margin-top:0em; margin-left:0%; ">
                      
                           <a target="_self" href="http://www.prodan.org.mx/galerianueva/" class="home"></a>
                           <a target="_blank" href="http://www.facebook.com/ProdanAC" class="fb"></a>
                           <a target="_blank" href="http://www.twitter.com/prodanmty" class="tw"></a>
                           <a target="_top" href="mailto:informes@prodan.org.mx" class="ml"></a>
                           <a target="_blank" href="http://www.youtube.com/prodanmty" class="yt"></a>
                 </div> 
              
              <!--Pay Pal Donar --> 
                 <div style="width:100%; height:90%; position:relative; margin-top:0em; margin-left:0%;">
                          
                           <div style="border:0px #0000FF double; margin-top:4%; margin-left:17%; width:30%; height:40%; position:absolute;">
                                    <img src="imgs/paypal_logo.png" width="100%" height="100%"/>  
                           </div>
                            
                            <div style="border:0px #0000FF double; margin-top:3%; margin-left:50%; width:40%; height:50%; position:absolute;"> 
                                <center>  
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="3212311">
                                    <input type="image" src="https://www.paypal.com/es_XC/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="">
                                    <img alt="" border="0" src="https://www.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                
                                 </center>   
                            </div>        
     
  
          
		           </div>
                   
               
       
       </div> 


	<div id="lateral">
         
       <div style=" position:relative; width:90%; height:35%; border:0px #33CC33 dotted; margin-top:2%; margin-left:3%;
               background-color: transparent; border: 4px solid transparent; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px; -moz-box-shadow: 0px 0px 1px #000000; -webkit-box-shadow: 0px 0px 1px #000000; box-shadow: 0px 0px 1px #000000; opacity: 0.9; -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity = 49); filter: alpha(opacity = 49); "> 
                    
                    <div style="position:relative; width:90%; height:20%;  margin-top:2%; margin-left:-4%; background-color: transparent; background-image:url(imgs/rib1.png); background-repeat:no-repeat; background-size:100% 100%; border:0px #33CC33 dotted">
                       
                    </div>
                    
                     <div style="position:relative; width:70%; height:5%;  margin-top:-2.5em; margin-left:2%; color: #eeeeee; font-size:16px; border:0px #33CC33 dotted">
                       <a href="#inline2"  class="modalbox" style="text-decoration:none; color:#FFF;" title="Antes de Adoptar"> ANTES DE ADOPTAR</a>
                    </div>
                    
                       <div style="position:relative; width:90%; height:20%;  margin-top:1.5em; margin-left:4%; font-size:auto;  text-align:justify; border:0px #33CC33 dotted">
                        Conoce el proceso antes de adoptar una mascota, revisa si estas TOTALMENTE preparado para un nuevo integrante en tu familia.
                    </div>
                    
                    <div style="position:relative; width:60%; height:8em;  margin-top:1.5em; margin-left:19%;  background-image:url(imgs/apolo.png); background-repeat:no-repeat; background-size:100% 100%; border:0px #33CC33 dotted">
                        
                    </div>
                     
                     <div style="position:relative; width:15%; height:1.5em;  margin-top:-1em; margin-left:82%; font-size:14px;  border:0px #33CC33 dotted">
                        <a href="#inline2" class="modalbox" title="Antes de Adoptar">+ info </a>
                     </div>
                    
                     
                     
              </div>
              
              
              <div style=" position:relative; width:90%; height:35%; border:0px #33CC33 dotted; margin-top:6%; margin-left:3%;
               background-color: transparent; border: 4px solid transparent; -moz-border-radius: 7px; -webkit-border-radius: 7px; border-radius: 7px; -moz-box-shadow: 0px 0px 1px #000000; -webkit-box-shadow: 0px 0px 1px #000000; box-shadow: 0px 0px 1px #000000; opacity: 0.9; -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity = 49); filter: alpha(opacity = 49); "> 
                    
                    <div style="position:relative; width:90%; height:20%;  margin-top:2%; margin-left:-4%; background-color: transparent; background-image:url(imgs/rib1.png); background-repeat:no-repeat; background-size:100% 100%; border:0px #33CC33 dotted">
                       
                    </div>
                    
                     <div style="position:relative; width:70%; height:5%;  margin-top:-2.5em; margin-left:2%; color: #eeeeee; font-size:16px; border:0px #33CC33 dotted">
                         <a href="#inline3" target="_blank" class="modalbox" style="text-decoration:none; color:#FFF;" title="Proceso de Adopci&oacute;n">PROCESO DE ADOPCI&Oacute;N</a>
                    </div>
                    
                       <div style="position:relative; width:90%; height:20%;  margin-top:1.5em; margin-left:4%; font-size:auto;  text-align:justify; border:0px #33CC33 dotted">
                        &iquest;Ya estas listo para adoptar? .. Selecciona la mascota y verifica el proceso necesario para llevar a cabo la adopci&oacute;n.
                    </div>
                    
                    <div style="position:relative; width:60%; height:8em;  margin-top:1.5em; margin-left:19%;  background-image:url(imgs/bob.png); background-repeat:no-repeat; background-size:100% 100%; border:0px #33CC33 dotted">
                        
                    </div>
                     
                     <div style="position:relative; width:15%; height:1.5em;  margin-top:-1em; margin-left:82%; font-size:14px;  border:0px #33CC33 dotted">
                        <a href="#inline3" target="_blank" class="modalbox">+ info </a>
                     </div>
                    
                     
                     
              </div>
              
               <div  style="border:0px #000066 dotted; position: relative; margin-top:2em; margin-left:0.5em; width:90%; height:20%; border:0px #33CC33 dotted">
                              <div style="border:0px #0000FF double; margin-top:1%; margin-left:25%; width:40%; height:35%; position:relative;"> 
                                    <center>  
                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="3212311">
                                        <input type="image" src="https://www.paypal.com/es_XC/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="">
                                        <img alt="" border="0" src="https://www.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                                        </form>
                    
                                     </center>   
                                </div>
                                
                               <div style="border:0px #0000FF double; margin-top:15%; margin-left:1%; width:100%; height:35%; position:relative; background-image:url(imgs/pedigree.jpg); background-repeat:no-repeat; background-size:contain;">
            						 
            				</div>
                    </div>
              
              
              
              
              
        </div>





    <div id="contenido">
    <?php 		
                    
                          $clave = $_GET['clave']; 
                        
                          $objConnect = mysql_connect("localhost","prodan_prodan","danpro") or die(mysql_error());
                          $objDB = mysql_select_db("prodan_prodan");
                          $strSQL = "SELECT * FROM adopciones WHERE clave='$clave'";
                          
                          $objQuery = mysql_query($strSQL);
                          $Num_Rows = mysql_num_rows($objQuery); 
                          
                          while($objResult = mysql_fetch_array($objQuery))
                           {
                        
                          
                    
     ?>
                    
    
    
	<div class="fluid_container">
    	
        <div class="camera_wrap camera_blue_skin" id="camera_wrap_1">
               <div data-thumb="<?php if(empty($objResult['foto1'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto1]";} ?>" data-src="<?php if(empty($objResult['foto1'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto1]";} ?>" data-link="<?php if(empty($objResult['foto1'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto1]";} ?>" data-target="_blank" data-portrait="true">
                           
                
            </div>
            <div  data-thumb="<?php if(empty($objResult['foto2'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto2]";} ?>" data-src="<?php if(empty($objResult['foto2'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto2]";} ?>" data-link="<?php if(empty($objResult['foto2'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto2]";} ?>" data-target="_blank" data-portrait="true">
                
            </div>
            <div data-thumb="<?php if(empty($objResult['foto3'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto3]";} ?>" data-src="<?php if(empty($objResult['foto3'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto3]";} ?>" data-link="<?php if(empty($objResult['foto3'])){ echo "imgs/123.png";}else{ echo "../fotos_adop/$objResult[foto3]";} ?>" data-target="_blank" data-portrait="true">
                
            </div>
            <div data-src="images/image_1.jpg">
		<iframe src="<?php if(empty($objResult['video'])){ echo "http://www.youtube.com/embed/oELiiYfVQR0?wmode=transparent&autoplay=1";}else{ echo "http://www.youtube.com/embed/$objResult[video]?wmode=transparent&autoplay=1";}?>" data-fake="imgs/prodan_fake.PNG" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	   </div>
                
           
           
        </div><!-- #camera_wrap_1 -->

    	
     </div><!-- .fluid_container -->
     
     
     <div  class="tabla">
                                <table width="100%" >
                                      <tr>
                                        <td class="tdizq">Clave:</td>
                                        <td class="tdder"><?php echo $objResult['clave'] ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Nombre:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['nombre']) ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Es:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['extra']) ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Raza:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['raza']) ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Sexo:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['sexo']) ?></td>
                                      </tr>
                                      <tr>
                                         <td class="tdizq">Edad:</td>
                                         <td class="tdder"><?php echo ucfirst($objResult['edad']) ?></td>
                                      </tr>
                                      <tr>
                                         <td class="tdizq">Tama&ntilde;o:</td>
                                         <td class="tdder"><?php echo ucfirst($objResult['tamano']) ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Descripci&oacute;n:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['comentarios']) ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">En custodia de:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['custodio']) ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Correo para Informaci&oacute;n:</td>
                                        <td class="tdder"><?php echo $objResult['email'] ?></td>
                                      </tr>
                                      <tr>
                                        <td class="tdizq">Tel&eacute;fono para Informes:</td>
                                        <td class="tdder"><?php echo ucfirst($objResult['telefono']) ?></td>
                                      </tr>    
                                    </table>

		</div>
     
     
     <?php

    $correo = $objResult['email'];
    $clavep = $objResult['clave'];
    $nombrep = $objResult['nombre'];
    $nombrec = $objResult['custodio'];
    $telefonoc = $objResult['telefono'];

    $title='Adopta a un amigo en Prodan!!!';
    $image='http://www.prodan.org.mx/fotos_adop/'.$objResult['foto1'];
    $summary='Conoceme y adoptame!!!';
    $url= 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'];
     	

   ?>
     
     
     <div  style="border:0px #00F dotted; margin-left:15em; margin-top:0.1em; width:65%; position:relative; float:left; z-index:4">
                            
                                    <span>Compartir en:</span> 
                                                                        
                                    <a target="_top" class="email_flat3d" title="Enviar por correo" href="mailto:?bcc=informes@prodan.com.mx&subject=Tal vez te interese adoptarlo&body=Hola! %0D%0D Vi la galer&iacute;a de adopci&oacute;n de PRODAN y creo que te puede interesar conocerlo: %0D%0D <?php echo $url ?> %0D%0D ¡Saludos!" 
                                    ></a>
                                    
                                    <a target="_blank" class="facebook_flat3d" title="Compartir en facebook" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>">
                           </a>
                           
                            <a target="_blank" class="twitter_flat3d" title="Tweetear" href="https://twitter.com/intent/tweet?original_referer=&text=Adoptame!!!%0D%0D&url=<?php echo $url ?>" 
                                    ></a>
                              
                              
                                    <a class="button modalbox" title="Adoptame" href="#inline" style="margin-left:7.5em; margin-top:0.5em">Quiero Adoptarlo</a>
                                  
							</div>
     
     
     
     
    </div><!-- contenido --> 
    
   	<?php   } mysql_close($objConnect);	?>  
   	
   	
   	
   	
   	
   	
   	
   	
   	
</div><!-- PAGE -->	
   	
   	
   	
   	
    
     <!-- hidden inline form -->
<div id="inline" >
    <form id="contact" name="contact" action="#" method="GET" class="contact">
        <fieldset>
        
         <legend>Muchas gracias por considerar la adopci&oacute;n. <br/> </legend>
            <legend style="margin-top:-2.5em; margin-left:70%; border="1px #000 dotted;"><img src="imgs/prodan.png" ></img></legend>
              
              Te comentamos los pasos a seguir:
              
              
              
                <ul>
			<li value="1">Solo podemos entregar en adopci&oacute;n a personas mayores de edad.</li>
			<li value="2">Te pedimos oportunidad de visitar tu casa o lugar donde lo tendr&iacute;as. Esto con la intenci&oacute;n de platicar<br/> 
			con ustedes de la responsabilidad que implica tener un animal de compa&ntilde;&iacute;a en la familia y para validar<br/> que tengan el  
			espacio adecuado y seguro (NO entregamos animales si van a vivir en azoteas o <br/>como veladores de bodegas, talleres, etc).</li>
			<li value="3">Nosotros validaremos si a&uacute;n est&aacute; disponible el perro/gato seleccionado y tambi&eacute;n veremos qui&eacute;n de <br/>nuestros voluntarios puede hacerte una visita de acuerdo a tu ubicaci&oacute;n.</li>
			<li value="4">Si todo est&aacute; bien, nos ponemos de acuerdo para que conozcan personalmente al animalito, ya sea en alg&uacute;n<br/> stand de adopci&oacute;n de PRODAN o en un punto intermedio entre tu casa y el hogar temporal del animalito.</li>
			<li value="5">Si todo est&aacute; bien, te lo entregamos para un per&iacute;odo de prueba y llenamos una ficha de adopci&oacute;n con tus datos.</li>
			<li value="6">El animalito no tiene ning&uacute;n costo, solo te pedimos cubrir sus gastos veterinarios iniciales, los cuales<br />  incluyen vacunas, desparasitaci&oacute;n y esterilizaci&oacute;n.
			    <ul>
				<li>Perros: $800 pesos</li>
				<li>
Gatos: $500 pesos</li>
			    </ul>
			 </li>
			 
			 <li value="7">Dejamos el perrito o gatito un par de semanas en per&iacute;odo de prueba, a ver si se adaptan adecuadamente.<br/> Si por alg&uacute;n motivo no lo logran, nos devuelves el perro/gato y t&uacute; decides si te devolvemos lo que pagaste <br/> por los gastos veterinarios o si quisieras probar con alg&uacute;n otro de los que tenemos en adopci&oacute;n.    </li>
			
			
		</ul>
		
		Si est&aacute;s de acuerdo con el proceso, por favor env&iacute;anos tus datos en este formulario (el env&iacute;o de tus datos, no <br/>garantiza que el proceso de adopcion sea exitoso):
	</fieldset>


        <fieldset style="margin-top:10px; ">
        <legend>Informaci&oacute;n</legend>
        <legend style="margin-top:-2.5em; margin-left:70%; "><img src="imgs/prodan.png" ></img></legend>
        
     
        
        <input name="correo" id="correo" class="txt" value="<?php echo $correo ?>" type="hidden"/>
        <input name="clavep" id="clavep" class="txt" value="<?php echo $clavep ?>" type="hidden"/>
        <input name="nombrep" id="nombrep" class="txt" value="<?php echo $nombrep ?>" type="hidden"/>
       
        <input name="nombrec" id="nombrec" class="txt" value="<?php echo $nombrec ?>" type="hidden"/>
        <input name="telefonoc" id="telefonoc" class="txt" value="<?php echo $telefonoc ?>" type="hidden"/>

        
        
        
        <label for="email"><span class="required">*</span> Correo electr&oacute;nico:</label>
        <input name="email" type="email" id="email" class="txt" required/>
	<br />
        
        <label for="nombre"><span class="required">*</span> Nombre completo:</label>
        <input name="nombre" type="text" id="nombre" class="txt" required/>
        <span class="form_hint">Ej: <em>Linda Rodr&iacute;guez</em> </span>
        <br />
        
        <label for="edad"><span class="required">*</span> Edad:</label>
        <input name="edad" type="text" id="edad" class="txt" required/>
        <span class="form_hint">Ej: <em>18</em> </span>

        <br />
        
        <label for="telcasa"><span class="required">*</span> Tel&eacute;fono Casa:</label>
        <input name="telcasa" type="text" id="telcasa" class="txt" required/>
        <span class="form_hint">Ej: <em>8112345678</em> </span>

        <br />
        
        
        <label for="telc"><span class="required">*</span> Tel&eacute;fono Celular:</label>
        <input name="telc" type="text" id="telc" class="txt" required/>
        <span class="form_hint">Ej: <em>8198765432</em> </span>

        <br />
        
         <label for="ocupacion"><span class="required">*</span> Ocupaci&oacute;n:</label>
        <input name="ocupacion" type="text" id="ocupacion" class="txt" required/>
        <span class="form_hint">Ej: <em>Secretaria</em> </span>
        

        <br />
        
        <label for="direccion"><span class="required">*</span> Calle y N&uacute;mero:</label>
        <input name="direccion" type="direccion" id="direccion" class="txt" required />
        <span class="form_hint">Ej: <em>Plutarco El&iacute;as Calles #307</em> </span>

        <br />
        
        <label for="direccion1"><span class="required">*</span> Colonia:</label>
        <input name="direccion1" type="text" id="direccion1" class="txt" required/>
        <span class="form_hint">Ej: <em>Colonia Tampiquito</em> </span>

        <br />
        
        <label for="direccion2"><span class="required">*</span> Municipio:</label>
        <input name="direccion2" type="text" id="direccion2" class="txt" required/>
        <span class="form_hint">Ej: <em>Garza Garc&iacute;a</em> </span>

        <br />
        
        
        
        <label for="quien"><span class="required">*</span> &iquest;Con qui&eacute;n vives?:</label>
        <input name="quien" type="text" id="quien" class="txt" required/>
        <span class="form_hint">Ej: <em>Solo, Con mi pareja, etc</em> </span>


        <br />  <br />
        
        <label for="quien2" ><span class="required">*</span> &iquest;Las personas con quien vives est&aacute;n de acuerdo en adoptar?</label>
             
        <select name="quien2" type="text" id="quien2" class="txt" required>
          <option value="0" selected="selected">Seleccione...</option>
	  <option value="Si">Si</option>
	  <option value="No">No</option>
	  <option value="No se">No se</option>
	</select>

        <br />   <br />
        
        
        <label for="otros" ><span class="required">*</span> &iquest;Tienes o has tenido otros animales de compa&ntilde;&iacute;a? </label>
         <input name="otros" type="text" id="otros" class="txt" required/>
         <span class="form_hint">Ej: <em>He tenido, No he tenido, Tengo un perro y 2 gatos, etc</em> </span>

        <br />   <br />
        
        <label for="donde" ><span class="required">*</span> &iquest;En qu&eacute; parte de la casa lo planeas tener?</label>
        <input name="donde" type="text" id="donde" class="txt" required/>
        <span class="form_hint">Ej: <em>Cochera, adentro, patio, terraza, etc</em> </span>
             
        

        <br /> <br /> <br />
        
         <label for="msg">Comentarios adicionales</label>
	 <textarea id="msg" name="msg" class="txtarea"></textarea>
        <br />
        
        
        
        <button id="send" name="send" class="button1" style="margin-top:2em">Enviar</button>
        
        <span id="mensaje" style="color:#0099ff; margin-left:25%;"><em>Los campos marcados con * son obligatorios</em></span>
        </fieldset>
    </form>
</div>


<div id="inline2">
    <form id="contact" action="#" method="">
        <fieldset>
        
         <legend>ANTES DE ADOPTAR</legend>
         <legend style="margin-top:-2.5em; margin-left:70%; border="1px #000 dotted;"><img src="imgs/prodan.png" ></img></legend>
        
	      <P>Muchas gracias por considerar la adopci&oacute;n de un perrito o gatito. Por favor antes de que sea definitiva <br/> tu decisi&oacute;n piensa bien en lo siguiente y revisa si est&aacute;s preparado para un nuevo integrante en la familia: </p>

	      <ul>
			<li value="1">Los perros y gatos son SERES VIVOS, necesitan cuidados y somos los humanos los responsables de<br/> otorgarle esos cuidados.</li>
			<li value="2">La vida promedio de un perro o gato es de 15 a&ntilde;os &iquest;est&aacute;s dispuesto a tenerlo en tu casa todo ese tiempo?</li>
			<li value="3">&iquest;Tienes espacio adecuado en tu casa para tenerlo? Considera el tama&ntilde;o, la seguridad en puertas para <br/>que no escape, que tenga donde cubrirse del sol, fr&iacute;o y lluvia.</li>
			<li value="4">&iquest;Todas las personas con las que vives est&aacute;n de acuerdo en tener un animal de compa&ntilde;&iacute;a?</li>
			<li value="5">Si tu situaci&oacute;n actual cambiara &iquest;qu&eacute; pasar&iacute;a con este animalito? Por ejemplo, si te casas, <br/>si te divorcias, si te embarazas, si cambias de ciudad, si cambias de trabajo, si te cambias de casa, etc</li>
			<li value="6">&iquest;D&oacute;nde lo dejar&aacute;s cuando salgas de vacaciones?</li> 
			<li value="7">Al menos una vez por a&ntilde;o, los perros y gatos requieren las siguientes vacunas:
			    <ul>
				<li>Perros
				   <ul>
				   	<li>Qu&iacute;ntuple (costo aprox entre $100 y $200 pesos)</li>
				   	<li>Rabia (costo aprox entre $50 y $150 pesos)</li> 
					<li>Desparasitaci&oacute;n (dos veces por a&ntilde;o, costo aprox entre $60 y $200 pesos)</li>
				    </ul>
				</li>
				<li>Gatos
				   <ul>
				   	<li>Triple Felina (costo aprox entre $100 y $200 pesos)</li>
				   	<li>Rabia (costo aprox entre $50 y $150 pesos)</li> 
					<li>Desparasitaci&oacute;n (dos veces por a&ntilde;o, costo aprox entre $60 y $200 pesos)</li>
				    </ul>
				</li>

			    </ul>
			 </li>
			 
			 <li value="8">Los costos de croquetas var&iacute;an mucho, hay desde las que venden en el supermercado con costo<br/> aproximado de $30 pesos por kilo hasta las denominadas superpremium que venden en veterinarias,<br/> con costo superior a los $100 pesos por kilo.</li>
			  <li value="9">Un perro promedio mediano adulto, consume aproximadamente 10Kg por mes.</li>
			
			
		</ul>
	      
        </fieldset>
    </form>
</div>

<div id="inline3">
    <form id="contact" action="#" method="">
        <fieldset>
        
         <legend>PROCESO DE ADOPCI&Oacute;N</legend>
         <legend style="margin-top:-2.5em; margin-left:70%; border="1px #000 dotted;"><img src="imgs/prodan.png" ></img></legend>
        
	      <P>Muchas gracias por considerar la adopci&oacute;n. Una vez que hayas seleccionado el perrito o gatito de tu inter&eacute;s,<br /> estos ser&iacute;an los pasos a seguir para la adopci&oacute;n:</p>

	      <ul>
			<li value="1">Env&iacute;anos tus datos (nombre, direcci&oacute;n y tel&eacute;fono), as&iacute; como la clave o nombre del animalito que te interesa.</li>
			<li value="1">Haremos una peque&ntilde;a entrevista via tel&eacute;fono.</li>
			<li value="3">Te pedimos oportunidad de visitar tu casa o el lugar donde lo tendr&iacute;as. Esto con la intenci&oacute;n  de platicar<br /> con ustedes de la responsabilidad que implica tener un animal de compa&ntilde;&iacute;a en la familia y para validar<br /> que tengan el espacio adecuado y seguro (NO entregamos animales si van a vivir en azoteas o como<br/> veladores de bodegas, talleres, etc).</li>
			<li value="4">Nosotros validaremos si a&uacute;n est&aacute; disponible el perro/gato seleccionado y tambi&eacute;n veremos qui&eacute;n de<br /> nuestros voluntarios puede hacerte una visita de acuerdo a tu ubicaci&oacute;n. </li>
			<li value="5">Si todo est&aacute; bien, nos ponemos de acuerdo para que conozcan personalmente al animalito, ya sea en <br/>alg&uacute;n stand de adopci&oacute;n de PRODAN o en un punto intermedio entre tu casa y el hogar temporal del animalito. </li>
			<li value="6">Si todo est&aacute; bien, te lo entregamos para un per&iacute;odo de prueba y llenamos una ficha de adopci&oacute;n con tus<br /> datos.</li>
			<li value="7">El animalito no tiene ning&uacute;n costo, solo te pedimos cubrir sus gastos veterinarios iniciales, los cuales <br />incluyen vacunas, desparasitaci&oacute;n y esterilizaci&oacute;n.
			    <ul>
				<li>Perros: $700 pesos</li>
				<li>
Gatos: $400 pesos</li>
			    </ul>
			 </li>
			 
			 <li value="7">Dejamos el perrito o gatito un par de semanas en per&iacute;odo de prueba, a ver si se adaptan adecuadamente.<br/>Si por alg&uacute;n motivo no lo logran, nos devuelves el perro/gato y t&uacute; decides si te devolvemos lo que pagaste<br/> por los gastos veterinarios o si quisieras probar con alg&uacute;n otro de los que tenemos en adopci&oacute;n.    </li>
			
			
		</ul>
	      
        </fieldset>
    </form>
</div>

     
     
</body> 
</html>