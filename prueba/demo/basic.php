<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
   
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />    
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
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'> 
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
    
    <script type='text/javascript' src='../scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='../scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='../scripts/camera.min.js'></script> 
    
    
   
 
    
    <script>
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
		


			
	</script>
 
</head>
<body>
	
    
    
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
    	
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
               <div data-thumb="<?php if(empty($objResult['foto1'])){ echo "../../imgs/123.png";}else{ echo "../../../../fotos_adop/$objResult[foto1]";} ?>" data-src="<?php if(empty($objResult['foto1'])){ echo "../../imgs/123.png";}else{ echo "../../../../fotos_adop/$objResult[foto1]";} ?>">
                           
                
            </div>
            <div data-thumb="<?php if(empty($objResult['foto2'])){ echo "../../imgs/123.png";}else{ echo "../../../../fotos_adop/$objResult[foto2]";} ?>" data-src="<?php if(empty($objResult['foto2'])){ echo "../../imgs/123.png";}else{ echo "../../../../fotos_adop/$objResult[foto2]";} ?>" >
                
            </div>
            <div data-thumb="<?php if(empty($objResult['foto3'])){ echo "../../imgs/123.png";}else{ echo "../../../../fotos_adop/$objResult[foto3]";} ?>" data-src="<?php if(empty($objResult['foto3'])){ echo "../../imgs/123.png";}else{ echo "../../../../fotos_adop/$objResult[foto3]";} ?>" >
                
            </div>
            <div data-thumb="../images/slides/thumbs/sea.jpg" data-src="../images/slides/sea.jpg" data-imgLiquid-fill='true'>
                
           
           
        </div><!-- #camera_wrap_1 -->

    	
    </div><!-- .fluid_container -->
    
   <?php   } mysql_close($objConnect);	?>  
    
    <div style="clear:both; display:block; height:100px"></div>
</body> 
</html>