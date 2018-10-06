<?php

session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){


if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;

	

    $nombre = $_POST['nombre'];
	$user = $_POST['user'];
	$passwd = $_POST['passwd'];	
	$privilegio = $_POST['privilegio'];	
	

		if ( $objCliente->insertaruser(array($nombre, $user, $passwd, $privilegio)) == true){
		 	echo "Datos Guardados";
		}else{	
			echo "Se produjo un error!";
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
    <script src='funciones.js'></script>


<script>

$(document).ready(function() {
	
    
	});
	



</script>

</head>

</head>

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

    
<form id="frmClienteNuevo" name="frmClienteNuevo" method="post" action="nuevouser.php" onsubmit="GrabarUser(); return false" style="margin-top:10px">
       <table  id="example" class="display" style="margin-top:5px;">
	
    
          <tr>
          	<td class="td-titulo" rowspan="11" style=""><strong>USUARIO</strong>
            </td>
            
             <td class="td-titulo2">Nombre:</td>
                 <td class="td-prodan">
                 	<label for="nombre"></label>
                 	<input  type="text" name="nombre" id="nombre" class="usuario-nombre" value="" />
                 </td>
          </tr>
          
           <tr>
          	<td class="td-titulo2">Usuario:</td>
                  <td class="td-prodan">
                  		<label for="user"></label>
             			<input  type="text" name="user" id="user" class="usuario-user" value="" />
                  </td>
     	  </tr>
     
          <tr>
          	<td class="td-titulo2">Password:</td>
                  <td class="td-prodan">
                  	<label for="passwd"></label>
                    <input  type="text" name="passwd" id="passwd" class="usuario-passwd" value="" />
                  </td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Privilegio:</td>
                  <td class="td-prodan">
                  		<label for="raza"></label>
                        <select name="privilegio" id="privilegio">
                          <option value="1" selected>- Administrador / Full -</option>   
                          <option value="2"         >- Administrador / Admin -</option>
                          <option value="3"         >- Usuario -</option>                     
                         </select>
                        
                  </td>
     	  </tr>
          
          
          
 </table>
    
      
      
      <br>
      
	  <p>
		<input type="submit" name="submit" id="button" value="Enviar" class="btn btn-block btn-lg btn-success"/>
	  </p>	
        <p>
        <label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="CancelarUsuario()"  class="btn btn-block btn-lg btn-danger"/>
	  </p>
      
	</form>
    

  
</body>    
	<?php
	}


}
?>