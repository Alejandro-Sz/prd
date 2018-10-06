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

	
	$id = $_POST['id'];
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


		if ( $objCliente->actualizar(array($clave, $extra, $nombre, $raza, $color, $tamano, $sexo, $fechaNacimiento, $fechaIngreso, $quienIngreso, $origen, $descripcion, $estatus, $publicado, $cartilla, $fechaEsterilizacion, $fechaAdopcion, $fichaAdop, $custodio, $telefono, $email, $direccion, $facebook, $comentarios, $video, $correoResp, $telResp),$id) == true){
		$mensaje = "Datos Guardados";
        print "<script>alert('$mensaje')</script>";
	 	echo "<script>window.location='adopciones.php';</script>";
	}else{
		$mensaje = "Se produjo un error intente nuevamente";
        print "<script>alert('$mensaje')</script>";
		echo "<script>window.location='adopciones.php';</script>";
	}
}else{
	if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['id']);
		$cliente = mysql_fetch_array($consulta);
		
		
		function calculaedad($fechanacimiento){
		
		  if($fechanacimiento == '0000-00-00'){
		       return '-';
		      }else{
		 
			list($ano,$mes,$dia) = explode("-",$fechanacimiento);
			$ano_diferencia  = date("Y") - $ano;
			$mes_diferencia = date("m") - $mes;
			$dia_diferencia   = date("d") - $dia;
			if ($dia_diferencia < 0 || $mes_diferencia < 0)
				$ano_diferencia--;
			return $ano_diferencia .' año(s)' .' -'. $mes_diferencia . ' mes(es)';
			}
			
		}
		

	
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


 <?php   	if ($_SESSION['userpriv']  == '1'  ){		?>

<body>


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
 
 

    
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false" style="margin-top:5px">
    	<input type="hidden" name="id" id="id" value="<?php echo $cliente['llave']?>" />
     
	  
        
	
       <table  id="example" class="display" style="margin-top:5px;">
	
    	 
  	    <!-- MASCOTA -->
          <tr>
          	<td class="td-titulo" rowspan="14" style=""><strong>MASCOTA</strong>
            </td>
            
             <td class="td-titulo2">Clave:</td>
                 <td class="td-prodan">
                 	<label for="clave"></label>
                 	<input  type="text" name="clave" id="clave" value="<?php echo $cliente['clave']?>" class="adop-clave"/>
                 </td>
          </tr>
          
           <tr>
          	<td class="td-titulo2">Tipo:</td>
                  <td class="td-prodan">
                  		<label for="extra"></label>
             				<select name="extra" id="extra">
           		  				<option value="Perro" <?php if($cliente['extra']=="Perro") echo "selected=\"selected\""?>>Perro</option>
                  				<option value="Gato" <?php if($cliente['extra']=="Gato") echo "selected=\"selected\""?>>Gato</option>
                  				<option value="Otro" <?php if($cliente['extra']=="Otro") echo "selected=\"selected\""?>>Otro</option>
              				</select>
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Nombre:</td>
                  <td class="td-prodan">
                  	<label for="nombre"></label>
                    <input  type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre']?>" />
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Raza:</td>
                  <td class="td-prodan">
                  		<label for="raza"></label>
                    	<input  type="text" name="raza" id="raza" value="<?php echo $cliente['raza']?>" />
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Color:</td>
                  <td class="td-prodan">
                  		<label for="color"></label>
                        <input  type="text" name="color" id="color" value="<?php echo $cliente['color']?>" /> 
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Tamaño:</td>
                  <td class="td-prodan">
                  		<label for="tamano"></label>
                        <select name="tamano" id="tamano">
           		  				<option value="Gigante" <?php if($cliente['tamano']=="Gigante") echo "selected=\"selected\""?>>Gigante</option>
                  				<option value="Grande" <?php if($cliente['tamano']=="Grande") echo "selected=\"selected\""?>>Grande</option>
                                <option value="Mediano" <?php if($cliente['tamano']=="Mediano") echo "selected=\"selected\""?>>Mediano</option>
                                <option value="Chico" <?php if($cliente['tamano']=="Chico") echo "selected=\"selected\""?>>Chico</option>
                                <option value="Muy Chico" <?php if($cliente['tamano']=="Muy Chico") echo "selected=\"selected\""?>>Muy Chico</option>
              				</select> 	
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Sexo:</td>
                  <td class="td-prodan">
                  		<label for="sexo"></label>
                        <input  type="text" name="sexo" id="sexo" value="<?php echo $cliente['sexo']?>" /> 		
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Fecha de Nacimiento:</td>
                  <td class="td-prodan">
                  		<label><a onclick="show_calendar()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
        					<input readonly class="text" type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $cliente['fechaNacimiento'] ?>" />
        				<div id="calendario1" style="display:none;"><?php calendar_html() ?></div>
        				</label> 		
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Edad:</td>
                  <td class="td-prodan">
                  	<label for="edad"></label>
                  	<?php $edad1 = $cliente['fechaNacimiento'] ?>
                        <input  type="text" name="edad" id="edad" value="<?php echo calculaedad(''.$edad1.'') ?>" />		
                  </td>
     	  </tr> 
          
          <tr>
          	<td class="td-titulo2">Estatus:</td>
                  <td class="td-prodan">
                  
                  	<label for="estatus"></label>
             				<select name="estatus" id="estatus">
           		  				<option value="Disponible" <?php if($cliente['estatus']=="Disponible") echo "selected=\"selected\""?>>- Disponible -</option>
                  				<option value="En Prueba de Adopción" <?php if($cliente['estatus']=="En Prueba de Adopción") echo "selected=\"selected\""?>>- En Prueba de Adopción -</option>
                                <option value="Adoptado" <?php if($cliente['estatus']=="Adoptado") echo "selected=\"selected\""?>>- Adoptado -</option>
              				</select>
                  </td>
     	  </tr>  

        <tr>
            <td class="td-titulo2">Descripcion:</td>
                  <td class="td-prodan">                   
                      
                         <textarea rows="8" cols="24" id="descripcion" name="descripcion" >
                              <?php echo $cliente['descripcion'] ?>   
                         </textarea>   
                           
            </td>  
        </tr>

        <tr>
            <td class="td-titulo2">Foto:</td>
                  <td class="td-prodan">
                      <img src="<?php if(empty($cliente['foto1'])){ echo "../imgs/prodan1.png";}else{ echo "../../fotos_adop/$cliente[foto1]";}?>" width="100" height="100"/> 
                           
                  </td>
        </tr>
          
          <tr>
          	<td class="td-titulo2">Publicado:</td>
                  <td class="td-prodan">
                  		<label for="publicado"></label>
                        <select name="publicado" id="publicado">
           		  	<option value="Si" <?php if($cliente['publicado']=="Si") echo "selected=\"selected\""?>>- Si -</option>
                  		<option value="No" <?php if($cliente['publicado']=="No") echo "selected=\"selected\""?>>- No -</option>           				</select> 		
                  </td>
     	  </tr>    

        <tr>
            <td class="td-titulo2">Facebook:</td>
              <td class="td-prodan">
                 <label></label>
                <select name="facebook" id="facebook">
                  <option value="Si" <?php if($cliente['extra']=="Si") echo "selected=\"selected\""?>>- Si -</option>
                      <option value="No" <?php if($cliente['extra']=="No") echo "selected=\"selected\""?>>- No -</option>
                  </select>
                </td>            
       </tr>                        
          
          
 </table>

   <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- CUSTODIO = CONTACTO -->   
        <tr>  
            <td rowspan="3" class="td-titulo"><strong>CONTACTO</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan">
                  <label ></label> 
                    <input type="text" name="custodio" id="custodio" value="<?php echo $cliente['custodio']?>" class="adop-custodio"/>
               </td>
         </tr>
     
          <tr>
            <td class="td-titulo2">Teléfono:</td>
                  <td class="td-prodan">
                      <label> </label> 
                        <input  type="text" name="telefono" id="telefono" value="<?php echo $cliente['telefono']?>" class="adop-telefono"/>     
                  </td>
        </tr>     
               
          <tr>
            <td class="td-titulo2">Correo:</td>
                  <td class="td-prodan">
                      <label></label>  <input class="adop-correo" type="text" name="email" id="email" value="<?php echo $cliente['email']?>" />   
                  </td>
        </tr>
     
    </table>



 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- INGRESO  =  RESPONSABLE -->   
        <tr>  
          	<td rowspan="4" class="td-titulo"><strong>RESPONSABLE</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan">
               		<label></label> 
                    <input type="text" name="quienIngreso" id="quienIngreso" value="<?php echo $cliente['quienIngreso']?>" class="adop-ingresa"/>
               </td>
         </tr>
     

        <tr>
            <td class="td-titulo2">Correo:</td>
                  <td class="td-prodan">
                      <label></label>  <input class="resp-correo" type="text" name="correoResp" id="correoResp" value="<?php echo $cliente['correoResp']?>" />   
                  </td>
        </tr>  


        <tr>
            <td class="td-titulo2">Teléfono:</td>
                  <td class="td-prodan">
                      <label> </label> 
                        <input  class="resp-telefono" type="text" name="telResp" id="telResp" value="<?php echo $cliente['telResp']?>" />     
                  </td>
        </tr>                
          
        <tr>
            <td class="td-titulo2">Dirección:</td>
                  <td class="td-prodan">
                      <label></label>  
                        <input class="mail1" type="text" name="direccion" id="direccion" value="<?php echo $cliente['direccion']?>" />    
                  </td>
        </tr>
     
 </table>
 
 

 
 
      
 
  <table id="example" class="display" style="margin-top:5px;">          
         <!-- OTROS DATOS -->
         <tr>
          	<td rowspan="10" class="td-titulo"><strong>OTROS DATOS</strong></td>
            
            <td class="td-titulo2">Vacunado:</td>
               <td class="td-prodan">
               <label></label> 
               <select name="cartilla" id="cartilla">
           		 		<option value="Si" <?php if($cliente['cartilla']=="Si") echo "selected=\"selected\""?>>- Si -</option>
                  		<option value="No" <?php if($cliente['cartilla']=="No") echo "selected=\"selected\""?>>- No -</option>
              		</select>
               </td>
         </tr>

        <tr>
            <td class="td-titulo2">Origen:</td>
                  <td class="td-prodan">
                      <label></label> 
                        <input type="text" name="origen" id="origen" value="<?php echo $cliente['origen']?>" />     
                  </td>
        </tr>

         <tr>
            <td class="td-titulo2">Fecha de Ingreso:</td>
                  <td class="td-prodan">
                      <label><a onclick="show_calendar2()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
                  <input readonly class="text" type="text" name="fechaIngreso" id="fechaIngreso" value="<?php echo $cliente['fechaIngreso'] ?>" />
                <div id="calendario2" style="display:none;"><?php calendar_html2() ?></div>
                </label>    
                  </td>
        </tr>
         
         <tr>
          	<td class="td-titulo2">Fecha de Esterilización:</td>
                  <td class="td-prodan">
                  		<label><a onclick="show_calendar3()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
        					<input readonly class="text" type="text" name="fechaEsterilizacion" id="fechaEsterilizacion" value="<?php echo $cliente['fechaEsterilizacion'] ?>" />
        				<div id="calendario3" style="display:none;"><?php calendar_html3() ?></div>
        				</label> 		
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Fecha de Adopción:</td>
                  <td class="td-prodan">
                  		<label><a onclick="show_calendar4()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
        					<input readonly class="text" type="text" name="fechaAdopcion" id="fechaAdopcion" value="<?php echo $cliente['fechaAdopcion'] ?>" />
        				<div id="calendario4" style="display:none;"><?php calendar_html4() ?></div>
        				</label> 		
                  </td>
     	  </tr>
          
 		<tr>
          	<td class="td-titulo2">Ficha de Adopción:</td>
            	<td class="td-prodan">
                	<label> </label>  
                    <input class="mail1" type="text" name="fichaAdop" id="fichaAdop" value="<?php echo $cliente['fichaAdop']?>" />
                </td>            
     	 </tr> 
                  

     
        <tr>
          	<td class="td-titulo2">Comentarios:</td>
            	<td class="td-prodan">
                	<label> </label>  
                    <input class="mail1" type="text" name="comentarios" id="comentarios" value="<?php echo $cliente['comentarios']?>" />
                </td>            
     	 </tr>
     
	    <tr>
          	<td class="td-titulo2">Video:</td>
            	<td class="td-prodan">
                  <label> </label>  
                  <input class="mail1" type="text" name="video" id="video" value="<?php echo $cliente['video']?>" />
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

<?php    } elseif ($_SESSION['userpriv']  == '2')  {	?>

<body>

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
 
 

    
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false" style="margin-top:5px">
    	<input type="hidden" name="id" id="id" value="<?php echo $cliente['llave']?>" />
     
	  
        
	
       <table  id="example" class="display" style="margin-top:5px;">
  
       
        <!-- MASCOTA -->
          <tr>
            <td class="td-titulo" rowspan="14" style=""><strong>MASCOTA</strong>
            </td>
            
             <td class="td-titulo2">Clave:</td>
                 <td class="td-prodan">
                  <label for="clave"></label>
                  <input  type="text" name="clave" id="clave" value="<?php echo $cliente['clave']?>" class="adop-clave"/>
                 </td>
          </tr>
          
           <tr>
            <td class="td-titulo2">Tipo:</td>
                  <td class="td-prodan">
                      <label for="extra"></label>
                    <select name="extra" id="extra">
                        <option value="Perro" <?php if($cliente['extra']=="Perro") echo "selected=\"selected\""?>>Perro</option>
                          <option value="Gato" <?php if($cliente['extra']=="Gato") echo "selected=\"selected\""?>>Gato</option>
                          <option value="Otro" <?php if($cliente['extra']=="Otro") echo "selected=\"selected\""?>>Otro</option>
                      </select>
                  </td>
        </tr>
     
          <tr>
            <td class="td-titulo2">Nombre:</td>
                  <td class="td-prodan">
                    <label for="nombre"></label>
                    <input  type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre']?>" />
                  </td>
        </tr>
          
          <tr>
            <td class="td-titulo2">Raza:</td>
                  <td class="td-prodan">
                      <label for="raza"></label>
                      <input  type="text" name="raza" id="raza" value="<?php echo $cliente['raza']?>" />
                  </td>
        </tr>
          
          <tr>
            <td class="td-titulo2">Color:</td>
                  <td class="td-prodan">
                      <label for="color"></label>
                        <input  type="text" name="color" id="color" value="<?php echo $cliente['color']?>" /> 
                  </td>
        </tr>

          <tr>
            <td class="td-titulo2">Tamaño:</td>
                  <td class="td-prodan">
                      <label for="tamano"></label>
                        <select name="tamano" id="tamano">
                        <option value="Gigante" <?php if($cliente['tamano']=="Gigante") echo "selected=\"selected\""?>>Gigante</option>
                          <option value="Grande" <?php if($cliente['tamano']=="Grande") echo "selected=\"selected\""?>>Grande</option>
                                <option value="Mediano" <?php if($cliente['tamano']=="Mediano") echo "selected=\"selected\""?>>Mediano</option>
                                <option value="Chico" <?php if($cliente['tamano']=="Chico") echo "selected=\"selected\""?>>Chico</option>
                                <option value="Muy Chico" <?php if($cliente['tamano']=="Muy Chico") echo "selected=\"selected\""?>>Muy Chico</option>
                      </select>   
                  </td>
        </tr>

          <tr>
            <td class="td-titulo2">Sexo:</td>
                  <td class="td-prodan">
                      <label for="sexo"></label>
                        <input  type="text" name="sexo" id="sexo" value="<?php echo $cliente['sexo']?>" />    
                  </td>
        </tr>

          <tr>
            <td class="td-titulo2">Fecha de Nacimiento:</td>
                  <td class="td-prodan">
                      <label><a onclick="show_calendar()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
                  <input readonly class="text" type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $cliente['fechaNacimiento'] ?>" />
                <div id="calendario1" style="display:none;"><?php calendar_html() ?></div>
                </label>    
                  </td>
        </tr>
          
          <tr>
            <td class="td-titulo2">Edad:</td>
                  <td class="td-prodan">
                    <label for="edad"></label>
                    <?php $edad1 = $cliente['fechaNacimiento'] ?>
                        <input  type="text" name="edad" id="edad" value="<?php echo calculaedad(''.$edad1.'') ?>" />    
                  </td>
        </tr> 
          
          <tr>
            <td class="td-titulo2">Estatus:</td>
                  <td class="td-prodan">
                  
                    <label for="estatus"></label>
                    <select name="estatus" id="estatus">
                        <option value="Disponible" <?php if($cliente['estatus']=="Disponible") echo "selected=\"selected\""?>>- Disponible -</option>
                          <option value="En Prueba de Adopción" <?php if($cliente['estatus']=="En Prueba de Adopción") echo "selected=\"selected\""?>>- En Prueba de Adopción -</option>
                                <option value="Adoptado" <?php if($cliente['estatus']=="Adoptado") echo "selected=\"selected\""?>>- Adoptado -</option>
                      </select>
                  </td>
        </tr>  

        <tr>
            <td class="td-titulo2">Descripcion:</td>
                  <td class="td-prodan">
                      <label></label> 
                         <textarea rows="8" cols="24" id="descripcion" name="descripcion">
                            <?php echo $cliente['descripcion'] ?>   
                         </textarea>   
                           
            </td>  
        </tr>
          
        <tr>
            <td class="td-titulo2">Foto:</td>
                  <td class="td-prodan">
                      <img src="<?php if(empty($cliente['foto1'])){ echo "../imgs/prodan1.png";}else{ echo "../../fotos_adop/$cliente[foto1]";}?>" width="150" height="150"/> 
                           
                  </td>
        </tr> 

          <tr>
            <td class="td-titulo2">Publicado:</td>
                  <td class="td-prodan">
                      <label for="publicado"></label>
                        <select name="publicado" id="publicado">
                  <option value="Si" <?php if($cliente['publicado']=="Si") echo "selected=\"selected\""?>>- Si -</option>
                      <option value="No" <?php if($cliente['publicado']=="No") echo "selected=\"selected\""?>>- No -</option>                   </select>     
                  </td>
        </tr>    

        <tr>
            <td class="td-titulo2">Facebook:</td>
              <td class="td-prodan">
                 <label></label>
                <select name="facebook" id="facebook">
                  <option value="Si" <?php if($cliente['extra']=="Si") echo "selected=\"selected\""?>>- Si -</option>
                      <option value="No" <?php if($cliente['extra']=="No") echo "selected=\"selected\""?>>- No -</option>
                  </select>
                </td>            
       </tr>                        
          
          
 </table>

   <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- CUSTODIO = CONTACTO -->   
        <tr>  
            <td rowspan="3" class="td-titulo"><strong>CONTACTO</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan">
                  <label ></label> 
                    <input type="text" name="custodio" id="custodio" value="<?php echo $cliente['custodio']?>" class="adop-custodio"/>
               </td>
         </tr>
     
          <tr>
            <td class="td-titulo2">Teléfono:</td>
                  <td class="td-prodan">
                      <label> </label> 
                        <input  type="text" name="telefono" id="telefono" value="<?php echo $cliente['telefono']?>" class="adop-telefono"/>     
                  </td>
        </tr>     
               
          <tr>
            <td class="td-titulo2">Correo:</td>
                  <td class="td-prodan">
                      <label></label>  <input class="adop-correo" type="text" name="email" id="email" value="<?php echo $cliente['email']?>" />   
                  </td>
        </tr>
     
    </table>



 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- INGRESO  =  RESPONSABLE -->   
        <tr>  
            <td rowspan="4" class="td-titulo"><strong>RESPONSABLE</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan">
                  <label></label> 
                    <input type="text" name="quienIngreso" id="quienIngreso" value="<?php echo $cliente['quienIngreso']?>" class="adop-ingresa"/>
               </td>
         </tr>
     

        <tr>
            <td class="td-titulo2">Correo:</td>
                  <td class="td-prodan">
                      <label></label>  <input class="resp-correo" type="text" name="correoResp" id="correoResp" value="<?php echo $cliente['correoResp']?>" />   
                  </td>
        </tr>  


        <tr>
            <td class="td-titulo2">Teléfono:</td>
                  <td class="td-prodan">
                      <label> </label> 
                        <input  class="resp-telefono" type="text" name="telResp" id="telResp" value="<?php echo $cliente['telResp']?>" />     
                  </td>
        </tr>                
          
        <tr>
            <td class="td-titulo2">Dirección:</td>
                  <td class="td-prodan">
                      <label></label>  
                        <input class="mail1" type="text" name="direccion" id="direccion" value="<?php echo $cliente['direccion']?>" />    
                  </td>
        </tr>
   
 </table>
  
 
     
 
  <table id="example" class="display" style="margin-top:5px;">          
         <!-- OTROS DATOS -->
         <tr>
            <td rowspan="10" class="td-titulo"><strong>OTROS DATOS</strong></td>
            
            <td class="td-titulo2">Vacunado:</td>
               <td class="td-prodan">
               <label></label> 
               <select name="cartilla" id="cartilla">
                  <option value="Si" <?php if($cliente['cartilla']=="Si") echo "selected=\"selected\""?>>- Si -</option>
                      <option value="No" <?php if($cliente['cartilla']=="No") echo "selected=\"selected\""?>>- No -</option>
                  </select>
               </td>
         </tr>

        <tr>
            <td class="td-titulo2">Origen:</td>
                  <td class="td-prodan">
                      <label></label> 
                        <input type="text" name="origen" id="origen" value="<?php echo $cliente['origen']?>" />     
                  </td>
        </tr>

         <tr>
            <td class="td-titulo2">Fecha de Ingreso:</td>
                  <td class="td-prodan">
                      <label><a onclick="show_calendar2()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
                  <input readonly class="text" type="text" name="fechaIngreso" id="fechaIngreso" value="<?php echo $cliente['fechaIngreso'] ?>" />
                <div id="calendario2" style="display:none;"><?php calendar_html2() ?></div>
                </label>    
                  </td>
        </tr>
         
         <tr>
            <td class="td-titulo2">Fecha de Esterilización:</td>
                  <td class="td-prodan">
                      <label><a onclick="show_calendar3()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
                  <input readonly class="text" type="text" name="fechaEsterilizacion" id="fechaEsterilizacion" value="<?php echo $cliente['fechaEsterilizacion'] ?>" />
                <div id="calendario3" style="display:none;"><?php calendar_html3() ?></div>
                </label>    
                  </td>
        </tr>
     
          <tr>
            <td class="td-titulo2">Fecha de Adopción:</td>
                  <td class="td-prodan">
                      <label><a onclick="show_calendar4()" style="cursor: pointer;"><small>(Mostrar)</small></a><br />
                  <input readonly class="text" type="text" name="fechaAdopcion" id="fechaAdopcion" value="<?php echo $cliente['fechaAdopcion'] ?>" />
                <div id="calendario4" style="display:none;"><?php calendar_html4() ?></div>
                </label>    
                  </td>
        </tr>
          
    <tr>
            <td class="td-titulo2">Ficha de Adopción:</td>
              <td class="td-prodan">
                  <label> </label>  
                    <input class="mail1" type="text" name="fichaAdop" id="fichaAdop" value="<?php echo $cliente['fichaAdop']?>" />
                </td>            
       </tr> 
                  

     
        <tr>
            <td class="td-titulo2">Comentarios:</td>
              <td class="td-prodan">
                  <label> </label>  
                    <input class="mail1" type="text" name="comentarios" id="comentarios" value="<?php echo $cliente['comentarios']?>" />
                </td>            
       </tr>
     
      <tr>
            <td class="td-titulo2">Video:</td>
              <td class="td-prodan">
                  <label> </label>  
                  <input class="mail1" type="text" name="video" id="video" value="<?php echo $cliente['video']?>" />
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

<?php	}else{   ?>

<body>

<ul class="menu1">
 
    <li><a href="adopciones.php">Adopciones</a></li>
    <li><a href="quieroadoptar.php">Quiero Adoptar</a></li>
 
    
   <?php echo '<div class="nombre"> 
     <span style="color:#FFF;">Bienvenido:</span>  <strong style="color:#3498db">'.$_SESSION['usuario'].'</strong> 
	 <div class="session_on">   
		<a href="javascript:void(0);" id="sessionKiller" style="color:#f39c12;">Cerrar Sesión</a></p>
	 </div>
	 </div>
	 '; ?>
     
 </ul>

    
	<form id="frmClienteActualizar" name="frmClienteActualizar" style="margin-top:5px">   
	  
        
	
       <table  id="example" class="display" style="margin-top:5px;">
	
    	 
  	    <!-- MASCOTA -->
          <tr>
          	<td class="td-titulo" rowspan="14" style=""><strong>MASCOTA</strong>
            </td>
            
             <td class="td-titulo2">Clave:</td>
                 <td >
                 	<label for="clave"><strong><?php echo $cliente['clave']?></strong></label>
                 </td>
          </tr>
          
           <tr>
          	<td class="td-titulo2">Tipo:</td>
                  <td >
                  		<label><strong><?php echo $cliente['extra']?></strong></label>
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Nombre:</td>
                  <td >
                  	<label><strong><?php echo $cliente['nombre']?></strong></label>
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Raza:</td>
                  <td >
                  		<label><strong><?php echo $cliente['raza']?></strong></label>
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Color:</td>
                  <td >
                  		<label><strong><?php echo $cliente['color']?></strong></label> 
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Tamaño:</td>
                  <td>
                  		<label><strong><?php echo $cliente['tamano']?></strong></label>	
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Sexo:</td>
                  <td >
                  		<label ><strong><?php echo $cliente['sexo']?></strong></label>		
                  </td>
     	  </tr>

          <tr>
          	<td class="td-titulo2">Fecha de Nacimiento:</td>
                  <td >
                  		<label><strong><?php echo $cliente['fechaNacimiento']?></strong></label> 		
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Edad:</td>
                  <td >
                  		<?php $edad1 = $cliente['fechaNacimiento'] ?>
                  		<label ><strong><?php echo calculaedad(''.$edad1.'') ?></strong></label>	
                  </td>
     	  </tr> 
          
          <tr>
          	<td class="td-titulo2">Estatus:</td>
                  <td >
                  
                  	<label ><strong><?php echo $cliente['estatus']?></strong></label>
                  </td>
     	  </tr>  
          
          <tr>
          	<td class="td-titulo2">Descripcion:</td>
                  <td >
                  	<label><strong><?php echo $cliente['descripcion']?></strong></label> 	
                  </td>
     	  </tr> 
          
          
          <tr>
          	<td class="td-titulo2">Publicado:</td>
                  <td >
                  		<label><strong><?php echo $cliente['publicado']?></strong></label>          			
                  </td>
     	  </tr>     
     	  
          <tr>
          	<td class="td-titulo2">Facebook:</td>
            	<td >
                 <label><strong> <?php echo $cliente['facebook'] ?> </strong></label>             
                </td>            
     	 </tr>     	  
     	                         
          
          
 </table>
 
  <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- CUSTODIO  = CONTACTO-->   
        <tr>  
          	<td rowspan="3" class="td-titulo"><strong>CONTACTO</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td >
               		<label ><strong><?php echo $cliente['custodio']?></strong></label> 
               </td>
         </tr>
     
          <tr>
          	<td class="td-titulo2">Teléfono:</td>
                  <td >
                  		<label><strong><?php echo $cliente['telefono']?></strong></label> 		
                  </td>
     	  </tr>     
               
          <tr>
          	<td class="td-titulo2">Correo:</td>
                  <td >
                  		<label><strong><?php echo $cliente['email']?></strong></label> 	
                  </td>
     	  </tr>

       
          
 </table>
 
 

 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- INGRESO 0= RESPONSALE -->   
        <tr>  
          	<td rowspan="4" class="td-titulo"><strong>RESPONSABLE</strong></td>
            
            <td class="td-titulo2">Nombre:</td>
               <td>
               		<label><strong><?php echo $cliente['quienIngreso']?></strong></label> 
               </td>
         </tr>
     
           <tr>
          	<td class="td-titulo2">Correo:</td>
                  <td >
                  		<label><strong><?php echo $cliente['correoResp'] ?>   </strong></label> 		
                  </td>
     	  </tr>
     	  
            <tr>
          	<td class="td-titulo2">Telefono:</td>
                  <td >
                  		<label><strong><?php echo $cliente['telResp'] ?>   </strong></label> 		
                  </td>
     	  </tr>    	  
     
          <tr>
          	<td class="td-titulo2">Dirección:</td>
                  <td >
                  		<label><strong><?php echo $cliente['direccion']?></strong></label>		
                  </td>
     	  </tr>

         
          
 </table>
 
 
 
      
 
  <table id="example" class="display" style="margin-top:5px;">          
         <!-- OTROS DATOS -->
         <tr>
          	<td rowspan="8" class="td-titulo"><strong>OTROS DATOS</strong></td>
            
            <td class="td-titulo2">Vacunado:</td>
               <td >
               <label><strong><?php echo $cliente['cartilla']?></strong></label>                
               </td>
         </tr>
         
         <tr>
          	<td class="td-titulo2">Fecha de Esterilización:</td>
                  <td >
                  		<label><strong><?php echo $cliente['fechaEsterilizacion'] ?> </strong></label> 		
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Fecha de Adopción:</td>
                  <td >
                  		<label><strong><?php echo $cliente['fechaAdopcion'] ?></strong></label> 		
                  </td>
     	  </tr>
          
 		<tr>
          	<td class="td-titulo2">Ficha de Adopción:</td>
            	<td >
                	<label><strong><?php echo $cliente['fichaAdop']?> </strong></label>                      
                </td>            
     	 </tr> 
                  

     
        <tr>
          	<td class="td-titulo2">Comentarios:</td>
            	<td >
                	<label><strong> <?php echo $cliente['comentarios']?> </strong></label>  
                    
                </td>            
     	 </tr>
     
	    <tr>
          	<td class="td-titulo2">Video:</td>
            	<td >
                  <label><strong> <?php echo $cliente['video']?> </strong></label>                  
                </td>            
     	</tr>
        
               
    
</table>

        <p>
        <label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()"  class="btn btn-block btn-lg btn-danger"/>
	  </p>
      
	</form>
    

  
</body>  









<?php  } ?>
   
	<?php
	}
}

}
?>