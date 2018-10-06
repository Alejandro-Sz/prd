<?php

session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
 
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;

	
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$username = $_POST['username'];	
    $passwd = $_POST['passwd'];
	$privilegio = $_POST['privilegio'];



	if ( $objCliente->actuser(array($nombre, $username, $passwd, $privilegio),$id) == true){
		echo "Datos Guardados!";
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	}
}else{
	if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_usuario($_GET['id']);
		$cliente = mysql_fetch_array($consulta);
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

    
	<form  method="post" action="actuser.php" onsubmit="ActualizarUsuario(); return false" style="margin-top:5px">
    	<input type="hidden" name="id" id="id" value="<?php echo $cliente['id']?>" />
     
	         
	
       <table  id="example" class="display" style="margin-top:5px;">
	
    	 
  	    <!-- MASCOTA -->
          <tr>
          	<td class="td-titulo" rowspan="11" style=""><strong>USUARIO</strong>
            </td>
            
             <td class="td-titulo2">Nombre Completo:</td>
                 <td class="td-prodan">
                 	<label for="nombre"></label>
                 	<input  type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre']?>" class="usuario-nombre"/>
                 </td>
          </tr>
          
           <tr>
          	<td class="td-titulo2">Usuario:</td>
                  <td class="td-prodan">
                  	<label for="user"></label>
                    <input  type="text" name="user" id="user" value="<?php echo $cliente['user']?>" class="usuario-user"/>
                  </td>
     	  </tr>
          
           <tr>
          	<td class="td-titulo2">Contraseña:</td>
                  <td class="td-prodan">
                  		<label for="passwd"></label>
                    	<input  type="text" name="passwd" id="passwd" value="<?php echo $cliente['passwd']?>" class="usuario-passwd"/>
                  </td>
     	  </tr>
          
           <tr>
          	<td class="td-titulo2">Permisos:</td>
                  <td class="td-prodan">
                  		<label for=""></label>
             				<select name="privilegio" id="privilegio">
           		  			    <option value="1" <?php if($cliente['privilegio']==1) echo "selected=\"selected\" "?>>- Administrador / Full -</option>
                  				<option value="2" <?php if($cliente['privilegio']==2) echo "selected=\"selected\" "?>>- Administrador / Admin -</option>  
                  				<option value="3" <?php if($cliente['privilegio']==3) echo "selected=\"selected\" "?>>- Usuario -</option>
              				</select>
                  </td>
     	  </tr>
     

</table>
    
    
      
      
      <br>
      
	  <p>
		<input type="submit" name="submit" id="button" value="Enviar" class="btn btn-block btn-lg btn-success" />
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

}
?>