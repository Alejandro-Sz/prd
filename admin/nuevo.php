<?php

session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
	
   


require('functions.php');
require('functions_2.php');
require('functions_3.php');
require('functions_4.php');

if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;

	
	$clave = $_POST['clave'];
	$extra = $_POST['extra'];	
  $nombre = $_POST['nombre'];
	$raza = $_POST['raza'];
	$color = $_POST['color'];	
	$tamano = $_POST['tamano'];
	$sexo = $_POST['sexo'];
	$fechaNacimiento = $_POST['fechaNacimiento'];	
	$fechaIngreso = $_POST['fechaIngreso'];

	$quienIngreso = $_POST['quienIngreso'];
  $correoResp = $_POST['correoResp'];
  $telResp = $_POST['telResp'];

	$origen = $_POST['origen'];
	$descripcion = $_POST['descripcion'];
	$estatus = $_POST['estatus'];
	$publicado = $_POST['publicado'];
	$cartilla = $_POST['cartilla'];
	$fechaEsterilizacion = $_POST['fechaEsterilizacion'];
	$fechaAdopcion = $_POST['fechaAdopcion'];
	$fichaAdop = $_POST['fichaAdop'];
	$custodio = $_POST['custodio'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$direccion = $_POST['direccion'];
	$facebook = $_POST['facebook'];
	$comentarios = $_POST['comentarios'];
	$video = $_POST['video'];


		if ( $objCliente->insertar(array($clave, $extra, $nombre, $raza, $color, $tamano, $sexo, $fechaNacimiento, $fechaIngreso, $quienIngreso, $origen, $descripcion, $estatus, $publicado, $cartilla, $fechaEsterilizacion, $fechaAdopcion, $fichaAdop, $custodio, $telefono, $email, $direccion, $facebook, $comentarios, $video, $correoResp, $telResp)) == true){
		$mensaje = "Datos Guardados";
        print "<script>alert('$mensaje')</script>";
	 	echo "<script>window.location='adopciones.php';</script>";
	}else{
		$mensaje = "Se produjo un error intente nuevamente";
        print "<script>alert('$mensaje')</script>";
		echo "<script>window.location='adopciones.php';</script>";
	}
}else{
		
	?>
    
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<style type="text/css" title="currentStyle">
	@import "css/estiloact.css";
	@import "css/index.css";
	@import "css/dashboard.css";
</style>


	
	<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
    <script src='http://srajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
    <script src="js/jquery.functions.js" type="text/javascript"></script>
    <script src='funciones1.js'></script>


<script>

$(document).ready(function() {
	
    
	});
	



</script>

</head>

</head>

<body>


<?php   	if ($_SESSION['userpriv']  == '1'  ){		?>
<ul class="menu1">
 
    <li><a href="adopciones.php">Galeria</a></li>
    <li><a href="quieroadoptar.php">Quiero Adoptar</a></li>
    <li><a href="usuarios.php">Usuarios</a></li>    
    
   <?php echo '<div class="nombre"> 
     <span style="color:#FFF;">Bienvenido:</span>  <strong style="color:#3498db">'.$_SESSION['usuario'].'</strong> 
	 <div class="session_on">   
		<a href="javascript:void(0);" id="sessionKiller" style="color:#f39c12;">Cerrar Sesión</a></p>
	 </div>
	 </div>
	 '; ?>
     
 </ul>
<?php }elseif($_SESSION['userpriv']  == '2'  ){ ?>
<ul class="menu1">
 
    <li><a href="adopciones.php">Galeria</a></li>
    <li><a href="quieroadoptar.php">Quiero Adoptar</a></li>
 
    
   <?php echo '<div class="nombre"> 
     <span style="color:#FFF;">Bienvenido:</span>  <strong style="color:#3498db">'.$_SESSION['usuario'].'</strong> 
	 <div class="session_on">   
		<a href="javascript:void(0);" id="sessionKiller" style="color:#f39c12;">Cerrar Sesión</a></p>
	 </div>
	 </div>
	 '; ?>
     
 </ul>
 
 <?php } ?>
 
    
<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevo.php" onsubmit="GrabarDatos(); return false" style="margin-top:10px">
       <table  id="example" class="display" style="margin-top:5px;">
	
    	 
  	    <!-- MASCOTA -->
          <tr>
          	<td class="td-titulo" rowspan="12" style=""><strong>MASCOTA</strong>
            </td>
            
             <td class="td-titulo2">Clave:</td>
                 <td class="td-prodan">
                 	<label for="clave"></label>
                 	<input  type="text" name="clave" id="clave" value="" class="adop-clave"/>
                 </td>
          </tr>
          
           <tr>
          	<td class="td-titulo2">Tipo:</td>
                  <td class="td-prodan">
                  		<label for="extra"></label>
             				<select name="extra" id="extra">
           		  				<option value="Perro">Perro</option>
                  				<option value="Gato">Gato</option>
                  				<option value="Otro">Otro</option>
              				</select>
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Nombre:</td>
                  <td class="td-prodan">
                  	<label for="nombre"></label>
                    <input  type="text" name="nombre" id="nombre" value="" />
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Raza:</td>
                  <td class="td-prodan">
                  		<label for="raza"></label>
                    	<input  type="text" name="raza" id="raza" value="" />
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Color:</td>
                  <td class="td-prodan">
                  		<label for="color"></label>
                        <input  type="text" name="color" id="color" value="" /> 
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Tamaño:</td>
                  <td class="td-prodan">
                  		<label for="tamano"></label>
                        <select name="tamano" id="tamano">
           		  	<option value="Gigante">Gigante</option>
                  		<option value="Grande">Grande</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Chico">Chico</option>
                                <option value="Muy Chico">Muy Chico</option>
              		</select> 	
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Sexo:</td>
                  <td class="td-prodan">
                  		<label for="sexo"></label>
             				<select name="sexo" id="sexo">
           		  				<option value="Hembra">Hembra</option>
                  				<option value="Macho">Macho</option>
              				</select> 		
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Fecha de Nacimiento:</td>
                  <td class="td-prodan">
                  		<label><a onclick="show_calendar()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
        					<input readonly class="text" type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo date("Y-m-j")?>" />
        				<div id="calendario1" style="display:none;"><?php calendar_html() ?></div>
        				</label> 		
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Edad:</td>
                  <td class="td-prodan">
                  		<label for="edad"></label>
                        <input  type="text" name="edad" id="edad" value="" /> 		
                  </td>
     	  </tr> 
          
          <tr>
          	<td class="td-titulo2">Estatus:</td>
                  <td class="td-prodan">
                  
                  	<label for="estatus"></label>
                       <select name="estatus" id="estatus">
           		  				
           		  				<option value="Disponible">- Disponible -</option>
                  				<option value="En Prueba de Adopción">- En Prueba de Adopción -</option>
                                <option value="Adoptado">- Adoptado -</option>
              				</select>           				 
             				
                  </td>
     	  </tr>  

        <tr>
            <td class="td-titulo2">Descripcion:</td>
                  <td class="td-prodan">
                      <label></label> 
                        <textarea rows="6" cols="35" id="descripcion" name="descripcion">
 
                         </textarea>    
                  </td>
        </tr>
          
          <tr>
          	<td class="td-titulo2">Publicado:</td>
                  <td class="td-prodan">
                  		<label for="publicado"></label>
                        <select name="publicado" id="publicado">
           		  	<option value="Si">- Si -</option>
                  		<option value="No">- No -</option>
                         </select> 		
                  </td>
     	  </tr>   

        
 </table>


 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- CUSTODIO  = CONTACTO -->   
        <tr>  
            <td rowspan="4" class="td-titulo"><strong>CONTACTO</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan">
                  <label ></label> 
                    <input  type="text" name="custodio" id="custodio" value="" class="adop-custodio"/>
               </td>
         </tr>
     
          <tr>
            <td class="td-titulo2">Teléfono:</td>
                  <td class="td-prodan">
                      <label for="adop-telefono"> </label> 
                        <input type="text" name="telefono" id="telefono" value="" class="adop-telefono"/>     
                  </td>
        </tr>     
               
          <tr>
            <td class="td-titulo2">Correo:</td>
                  <td class="td-prodan">
                      <label for="adop-correo"></label>  
                        <input type="text" name="email" id="email" value="" class="adop-correo"/>   
                  </td>
        </tr>
         
          
 </table>
 

 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- INGRESO  =  RESPONSABLE -->   

        <tr>  
          	<td rowspan="4" class="td-titulo"><strong>RESPONSABLE</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan">
               		<label for="quienIngreso"></label> 
                    <input type="text" name="quienIngreso" id="quienIngreso" value="" class="adop-ingresa" />
                    
               </td>
         </tr>

        <tr>
            <td class="td-titulo2">Correo:</td>
                  <td class="td-prodan">
                      <label for="resp-correo"></label>  
                        <input type="text" name="correoResp" id="correoResp" value="" class="resp-correo"/>   
                  </td>
        </tr>

          <tr>
            <td class="td-titulo2">Teléfono:</td>
                  <td class="td-prodan">
                      <label for="resp-telefono"> </label> 
                        <input type="text" name="telResp" id="telResp" value="" class="resp-telefono"/>     
                  </td>
        </tr>

        <tr>
            <td class="td-titulo2">Dirección:</td>
                  <td class="td-prodan">
                      <label></label>  
                        <input class="mail1" type="text" name="direccion" id="direccion" value="" />    
                  </td>
        </tr>


          
</table>
 
 
  
 
      
 
  <table id="example" class="display" style="margin-top:5px;">          
         <!-- OTROS DATOS -->
         <tr>
          	<td rowspan="9" class="td-titulo"><strong>OTROS DATOS</strong></td>
            
            <td class="td-titulo2">Vacunado:</td>
               <td class="td-prodan">
	               <label></label> 
	               <select name="cartilla" id="cartilla">
           		 	<option value="Si">- Si -</option>
                  		<option value="No">- No -</option>
              		</select>
               </td>
         </tr>

        <tr>
            <td class="td-titulo2">Origen:</td>
                  <td class="td-prodan">
                      <label></label> 
                        <input type="text" name="origen" id="origen" value="" class="adop-origen"/>     
                  </td>
        </tr>

         <tr>
            <td class="td-titulo2">Fecha de Ingreso:</td>
                  <td class="td-prodan">
                      <label><a onclick="show_calendar2()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
                  <input readonly class="text" type="text" name="fechaIngreso" id="fechaIngreso" value="<?php echo date("Y-m-j")?>" />
                <div id="calendario2" style="display:none;"><?php calendar_html2() ?></div>
                </label>    
                  </td>
        </tr>
            
         
         <tr>
          	<td class="td-titulo2">Fecha de Esterilización:</td>
                  <td class="td-prodan">
                  		<label><a onclick="show_calendar3()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
        					<input readonly class="text" type="text" name="fechaEsterilizacion" id="fechaEsterilizacion" value="" />
        				<div id="calendario3" style="display:none;"><?php calendar_html3() ?></div>
        				</label> 		
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Fecha de Adopción:</td>
                  <td class="td-prodan">
                  		<label><a onclick="show_calendar4()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
        					<input readonly class="text" type="text" name="fechaAdopcion" id="fechaAdopcion" value="" />
        				<div id="calendario4" style="display:none;"><?php calendar_html4() ?></div>
        				</label> 		
                  </td>
     	  </tr>
          
 		<tr>
          	<td class="td-titulo2">Ficha de Adopción:</td>
            	<td class="td-prodan">
                	<label> </label>  
                    <input type="text" name="fichaAdop" id="fichaAdop" value="" />
                </td>            
     	 </tr> 
                  
          <tr>
          	<td class="td-titulo2">Facebook:</td>
            	<td class="td-prodan">
                 <label></label>
             		<select name="facebook" id="facebook">
           		 		<option value="Si">- Si -</option>
                  		<option value="No">- No -</option>
              		</select>
                </td>            
     	 </tr>
     
        <tr>
          	<td class="td-titulo2">Comentarios:</td>
            	<td class="td-prodan">
                	<label> </label>  
                    <input type="text" name="comentarios" id="comentarios" value="" />
                </td>            
     	 </tr>
     
	    <tr>
          	<td class="td-titulo2">Video:</td>
            	<td class="td-prodan">
                  <label> </label>  
                  <input type="text" name="video" id="video" value="" />
                </td>            
     	</tr>
        
               
    
</table>
    
    
      
      
      <br>
      
	  <p>
		<input type="submit" name="submit" id="button" value="Enviar" class="btn btn-block btn-lg btn-success" />
	  </p>	
        <p>
        <label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()"  class="btn btn-block btn-lg btn-danger"/>
	  </p>
      
	</form>
    

  
</body>    
	<?php
	}


}
?>