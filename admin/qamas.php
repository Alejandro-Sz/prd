<?php

session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
	
if(isset($_GET['id'])){
		
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente_qa($_GET['id']);
		$cliente = mysql_fetch_array($consulta);
		
		
				
	?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<style type="text/css" title="currentStyle">
	@import "css/estiloqam.css";
	@import "css/index.css";
	@import "css/dashboard.css";
</style>

<script src="js/jquery.js"></script>

<script type="text/javascript" src="functions.ajax.js"></script>

<script>

$(document).ready(function() {
	    
	$('#button').click(function() {
		   
		  estatusAdop = $('#estatusAdop').val();
		  id = $('#id').val();
			
	  
		  $.ajax({
						type:"POST",
						url:"qamasestatus.php",
						  data: "estatusAdop=" + estatusAdop + "&id=" + id,
						  success: function(data){
						  
						    if(data == 1){
							  alert('Estatus Actualizado con Exito!');
							  window.location.href = "quieroadoptar.php";
							}else{
							  alert('Ocurrio un error!');
							  window.location.href = "quieroadoptar.php";
							
							}
						}
				});
				
    });
	

});

</script>

</head>

<?php   	if ( $_SESSION['userpriv']  == '1' || $_SESSION['userpriv']  == '2'  ){		?>
 
<body class="ex_highlight_row">

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


<div class="demo_jui" id="contenedor" style="margin-top:10px;">


<table  id="example" class="display" style="margin-top:5px;">
	
    	<input type="hidden" name="id" id="id" value="<?php echo $cliente['id']?>" />
  	    <!-- MASCOTA -->
          <tr>
          	<td class="td-titulo" rowspan="2" style="">MASCOTA
            </td>
            
             <td class="td-titulo2">Clave:</td>
                 <td class="td-prodan"><strong> <?php echo $cliente['claveMascota'] ?> </strong></td>
          </tr>
     
          <tr>
          	<td class="td-titulo2">Nombre:</td>
                  <td class="td-prodan"><strong><?php echo $cliente['nombreMascota'] ?></strong></td>
     	  </tr>
 </table>

 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- CUSTODIO -->   
        <tr>  
          	<td rowspan="3" class="td-titulo">CUSTODIO</td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan"><strong> <?php echo $cliente['nombreCustodio'] ?> </strong></td>
         </tr>
     
          <tr>
          	 <td class="td-titulo2">Telefono:</td>
             	<td class="td-prodan"><strong> <?php echo $cliente['telefonoCustodio'] ?> </strong></td>
     	  </tr>
     
         <tr>
          	<td class="td-titulo2">Correo:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['telefonoCustodio'] ?> </strong></td>            
     	 </tr>
 
 </table>
 
      
 
  <table id="example" class="display" style="margin-top:5px;">          
         <!-- INTERESADO -->
         <tr>
          	<td rowspan="15" class="td-titulo">INTERESADO</td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan"><strong> <?php echo $cliente['nombreInt'] ?> </strong></td>
         </tr>
         
          <tr>
          	<td class="td-titulo2">Correo:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['correoInt'] ?> </strong></td>            
     	 </tr>
     
          <tr>
          	 <td class="td-titulo2">Edad:</td>
             	<td class="td-prodan"><strong> <?php echo $cliente['edadInt'] ?> </strong></td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Tel&eacute;fono:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['telInt'] ?> </strong></td>            
     	 </tr>
     
        <tr>
          	<td class="td-titulo2">Celular:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['celInt'] ?> </strong></td>            
     	 </tr>
     
	    <tr>
          	<td class="td-titulo2">Ocupacion:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['ocupacionInt'] ?> </strong></td>            
     	</tr>
        
        <tr>
          	<td class="td-titulo2">Direccion:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['address'] ?>, <?php echo $cliente['colonia'] ?>, <?php echo $cliente['municipio'] ?></strong></td>            
     	</tr>

		<tr>
          	<td class="td-titulo2">&iquest;Con quien vives?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['vivesInt'] ?> </strong></td>            
     	</tr>
        
        <tr>
          	<td class="td-titulo2">&iquest;Las personas con quien vives est&aacute;n de acuerdo en adoptar?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['acuerdoInt'] ?> </strong></td>            
     	</tr>
    
    	<tr>
          	<td class="td-titulo2">&iquest;Tienes o has tenido otros animales de compa&ntilde;&iacute;a?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['compania'] ?> </strong></td>            
     	</tr>
    
    	<tr>
          	<td class="td-titulo2">&iquest;En qu&eacute; parte de la casa lo planeas tener?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['hogarCasa'] ?> </strong></td>            
     	</tr>
        
		<tr>
          	<td class="td-titulo2">Comentarios:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['comentarios'] ?> </strong></td>            
     	</tr> 
        
               
    
</table>
    
    
<table style=" width:50%; margin-left:187px">
    <tr style="width:25%">
     	<td class="td-titulo2">Fecha:</td>
     	<td class="td-prodan"><strong> <?php echo $cliente['fecha'] ?> </strong></td>            
    </tr>
    
    <tr style="width:75%">
     	<td class="td-titulo2">Estatus:</td>
     	<td class="td-prodan"><strong> 
          <select name="estatusAdop" id="estatusAdop">
           		<option value="Nuevo Contacto" <?php if($cliente['estatusAdop']=="Nuevo Contacto") echo "selected=\"selected\""?>>Nuevo Contacto</option>
                <option value="No Apto" <?php if($cliente['estatusAdop']=="No Apto") echo "selected=\"selected\""?>>No Apto</option>
                <option value="Adoptado" <?php if($cliente['estatusAdop']=="Adoptado") echo "selected=\"selected\""?>>Adoptado</option>
                <option value="Pendiente Validar" <?php if($cliente['estatusAdop']=="Pendiente Validar") echo "selected=\"selected\""?>>Pendiente Validar</option>
                <option value="Pendiente Contactar" <?php if($cliente['estatusAdop']=="Pendiente Contactar") echo "selected=\"selected\""?>>Pendiente Contactar</option>
               
          </select> </strong></td>            
          
        
    </tr>


</table>    
    
    
</div>
<p>
<input type="submit" name="submit" id="button" value="Enviar" class="btn btn-block btn-lg btn-success" style="margin-top:5px"/>
</p>
<p>
<input class="btn btn-block btn-lg btn-danger" type="submit" name="back"  value="Regresar" onClick="history.back()" style="margin-top:2px;"/>
</p>
</body>


<?php	}else{   ?>


<body class="ex_highlight_row">

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


<div class="demo_jui" id="contenedor" style="margin-top:10px;">


<table  id="example" class="display" style="margin-top:5px;">
	
    	<input type="hidden" name="id" id="id" value="<?php echo $cliente['id']?>" />
  	    <!-- MASCOTA -->
          <tr>
          	<td class="td-titulo" rowspan="2" style="">MASCOTA
            </td>
            
             <td class="td-titulo2">Clave:</td>
                 <td class="td-prodan"><strong> <?php echo $cliente['claveMascota'] ?> </strong></td>
          </tr>
     
          <tr>
          	<td class="td-titulo2">Nombre:</td>
                  <td class="td-prodan"><strong><?php echo $cliente['nombreMascota'] ?></strong></td>
     	  </tr>
 </table>

 <table id="example" class="display" style="margin-top:5px;">         
      
        <!-- CUSTODIO -->   
        <tr>  
          	<td rowspan="3" class="td-titulo">CUSTODIO</td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan"><strong> <?php echo $cliente['nombreCustodio'] ?> </strong></td>
         </tr>
     
          <tr>
          	 <td class="td-titulo2">Telefono:</td>
             	<td class="td-prodan"><strong> <?php echo $cliente['telefonoCustodio'] ?> </strong></td>
     	  </tr>
     
         <tr>
          	<td class="td-titulo2">Correo:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['telefonoCustodio'] ?> </strong></td>            
     	 </tr>
 
 </table>
 
      
 
  <table id="example" class="display" style="margin-top:5px;">          
         <!-- INTERESADO -->
         <tr>
          	<td rowspan="15" class="td-titulo">INTERESADO</td>
            
            <td class="td-titulo2">Nombre:</td>
               <td class="td-prodan"><strong> <?php echo $cliente['nombreInt'] ?> </strong></td>
         </tr>
         
          <tr>
          	<td class="td-titulo2">Correo:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['correoInt'] ?> </strong></td>            
     	 </tr>
     
          <tr>
          	 <td class="td-titulo2">Edad:</td>
             	<td class="td-prodan"><strong> <?php echo $cliente['edadInt'] ?> </strong></td>
     	  </tr>
          
          <tr>
          	<td class="td-titulo2">Tel&eacute;fono:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['telInt'] ?> </strong></td>            
     	 </tr>
     
        <tr>
          	<td class="td-titulo2">Celular:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['celInt'] ?> </strong></td>            
     	 </tr>
     
	    <tr>
          	<td class="td-titulo2">Ocupacion:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['ocupacionInt'] ?> </strong></td>            
     	</tr>
        
        <tr>
          	<td class="td-titulo2">Direccion:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['address'] ?>, <?php echo $cliente['colonia'] ?>, <?php echo $cliente['municipio'] ?></strong></td>            
     	</tr>

		<tr>
          	<td class="td-titulo2">&iquest;Con quien vives?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['vivesInt'] ?> </strong></td>            
     	</tr>
        
        <tr>
          	<td class="td-titulo2">&iquest;Las personas con quien vives est&aacute;n de acuerdo en adoptar?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['acuerdoInt'] ?> </strong></td>            
     	</tr>
    
    	<tr>
          	<td class="td-titulo2">&iquest;Tienes o has tenido otros animales de compa&ntilde;&iacute;a?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['compania'] ?> </strong></td>            
     	</tr>
    
    	<tr>
          	<td class="td-titulo2">&iquest;En qu&eacute; parte de la casa lo planeas tener?:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['hogarCasa'] ?> </strong></td>            
     	</tr>
        
		<tr>
          	<td class="td-titulo2">Comentarios:</td>
            	<td class="td-prodan"><strong> <?php echo $cliente['comentarios'] ?> </strong></td>            
     	</tr> 
        
               
    
</table>
    
    
<table style=" width:50%; margin-left:187px">
    <tr style="width:25%">
     	<td class="td-titulo2">Fecha:</td>
     	<td class="td-prodan"><strong> <?php echo $cliente['fecha'] ?> </strong></td>            
    </tr>
    
    <tr style="width:75%">
     	<td class="td-titulo2">Estatus:</td>
     	<td class="td-prodan"><strong> <?php echo $cliente['estatusAdop'] ?></strong></td>            
          
        
    </tr>


</table>    
    
    
</div>

<p>
<input class="btn btn-block btn-lg btn-danger" type="submit" name="back"  value="Regresar" onClick="history.back()" style="margin-top:2px;"/>
</p>
</body>







<?php } ?>

</html>

<?php 

}
}else{
	
	 echo '<script>window.location="index.php";</script>';
	 
	}

?>