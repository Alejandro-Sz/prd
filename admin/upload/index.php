<?php 
session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){

if(isset($_GET['id'])){
	
		require('../clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente_foto($_GET['id']);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Prodan AC Uploader</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
   
<script language="javascript" type="text/javascript">
<!--
function startUpload(){
      document.getElementById('f1_upload_process').style.visibility = 'visible';
      document.getElementById('f1_upload_form').style.visibility = 'hidden';	  
      return true;
}

function stopUpload(success, success1, success2){
      var result = '';
	  
      if (success == 1 || success1 == 1 || success2 == 1){
         alert('Archivo(s) subidos correctamente');
		 location.reload();		 
      }
	  else {
         result = '<span class="emsg">Ocurrio un error!<\/span><br/><br/>';
      }
	 
	  
      document.getElementById('f1_upload_process').style.visibility = 'hidden';
      document.getElementById('f1_upload_form').innerHTML = result + '';
      document.getElementById('f1_upload_form').style.visibility = 'visible';      
      return true;   
}
//-->
</script>   
</head>

 <?php   	if ($_SESSION['userpriv']  == '1'  || $_SESSION['userpriv']  == '2'  ) {		?>

<body>
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">Seleccione las fotos a subir!</div><div id="header_right"></div></div>
            <div id="content">
            
            <?php

			if($consulta) {
				while( $cliente = mysql_fetch_array($consulta)){

			?>
                <form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process" style="margin-top:-10px;">Cargando...<br/><img src="loader.gif" /></p>
                      
                      <p id="f1_upload_form" align="center" style="border:#093 0px dotted;"><br/></p>
                        
                         <input name="id" id="id" type="hidden" size="30" value="<?php echo $_GET['id']?>"/>
                       
                         <label for="myfile">Foto 1: 
                         	<input name="myfile" type="file" size="30" />                     
                         
                       <div style="border:#093 0px dotted; text-align:center">
                        Actualmente:<br /><img src="<?php if(empty($cliente['foto1'])){ echo "../../imgs/prodan1.png";}else{ echo "../../../fotos_adop/$cliente[foto1]";}?>" width="120" height="90" /> 
                       </div>
                       
                       </label> 
                     
                        <label>Foto 2:   
                              <input name="myfile1" type="file" size="30" /> 
                                                           
                         <div >
                         Actualmente:<br /><img src="<?php if(empty($cliente['foto2'])){ echo "../../imgs/prodan1.png";}else{ echo "../../../fotos_adop/$cliente[foto2]";}?>" width="120" height="90" />
                         </div>
                      
                         <label for="myfile2">Foto 3:   </label>
                              <input name="myfile2" type="file" size="30" /> 
                                                           
                       <div >
                       Actualmente:<br /> <img src="<?php if(empty($cliente['foto3'])){ echo "../../imgs/prodan1.png";}else{ echo "../../../fotos_adop/$cliente[foto3]";}?>" width="120" height="90" />
                       </div>
                       </label>
                       
                         
                    
                   
                   
                         <label style="border:#093 0px dotted; margin-left:70px; margin-top:160px;">
                             <input type="submit" name="submitBtn" class="sbtn" value="Upload" />
                      
                             <input type="button" name="cancelar" class="sbtn" value="Cancelar" onclick="window.location.href = '../adopciones.php';"/>
                         </label>
                         
                                              
                
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:17px solid #fff;"></iframe>
                     
                  
                 </form>
                 
                	<?php } } ?>
             </div>
             <div id="footer">Prodan AC</div>
         </div>
                 
</body>   

<?php	}else{   ?>

<body>
       <div id="container">
            <div id="header"><div id="header_left"></div>
            <div id="header_main">Seleccione las fotos a subir!</div><div id="header_right"></div></div>
            <div id="content">
            
            <?php

			if($consulta) {
				while( $cliente = mysql_fetch_array($consulta)){

			?>
                <form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process" style="margin-top:-10px;">Cargando...<br/><img src="loader.gif" /></p>
                      
                      <p id="f1_upload_form" align="center"><br/></p>
                        
                         <input name="id" id="id" type="hidden" size="30" value="<?php echo $_GET['id']?>"/>
                       
                         <label for="myfile">Foto 1:                     
                         
                       <div style="text-align:center">
                        Actualmente:<br /><img src="<?php if(empty($cliente['foto1'])){ echo "../imgs/prodan1.png";}else{ echo "../../../fotos_adop/$cliente[foto1]";}?>" width="120" height="90" /> 
                       </div>
                       
                       </label> 
                     
                        <label>Foto 2:   
                                                                                    
                         <div >
                         Actualmente:<br /><img src="<?php if(empty($cliente['foto2'])){ echo "../imgs/prodan1.png";}else{ echo "../../../fotos_adop/$cliente[foto2]";}?>" width="120" height="90" />
                         </div>
                      
                         <label for="myfile2">Foto 3:   </label>
                                                           
                       <div >
                       Actualmente:<br /> <img src="<?php if(empty($cliente['foto3'])){ echo "../imgs/prodan1.png";}else{ echo "../../../fotos_adop/$cliente[foto3]";}?>" width="120" height="90" />
                       </div>
                       </label>
                       
                         
                    
                   
                   
                         <label style="border:#093 0px dotted; margin-left:130px; margin-top:160px;">
                                               
                             <input type="button" name="cancelar" class="sbtn" value="Cancelar" onclick="window.location.href = '../adopciones.php';"/>
                         </label>
                         
                                              
                
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:17px solid #fff;"></iframe>
                     
                  
                 </form>
                 
                	<?php } } ?>
             </div>
             <div id="footer">Prodan AC</div>
         </div>
                 
</body>  
<?php	} ?>


<?php
	}}

?>