<?php
session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
   
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_clientes();
				
	?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<style type="text/css" title="currentStyle">
	@import "css/demo_table_jui.css";
	@import "css/estilo.css";
	@import "css/index.css";
	@import "css/dashboard.css";	
</style>

<script src="js/jquery.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="functions.ajax.js"></script>

<script>

$(document).ready(function() {
	oTable = $('#example').dataTable({
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",

    	"oLanguage": {
      	"sEmptyTable": "No hay datos",//tabla vacia
	      "sInfo": "Mostrando  (_START_ - _END_) de _TOTAL_ registros",
        "sLengthMenu": 'Mostrar <select>'+
		'<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">Todo</option>'+
        '</select> registros',
	      "sLoadingRecords": "Espere un momento, cargando...",
	      "sSearch": "Buscar:",
	      "sZeroRecords": "No hay datos con esa busqueda",
      	 "oPaginate": {
         "sFirst": "Primero",
	       "sLast": "Ultimo",
	       "sNext": "Siguiente",
	       "sPrevious": "Anterior",
      	}
    	}

	});
	

	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$.ajax({
			type: "GET",
			url: 'nuevo.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});


} );

</script>

</head>

<?php   if ($_SESSION['userpriv']  == '1'  ){  ?>

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


<div class="demo_jui" id="contenedor">


<table width="771" id="example" class="display">    	
  
    <thead>
      <tr>    
        <th colspan="1" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">REGISTRO</th>   
        <th colspan="2" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">MASCOTA</th>
        <th colspan="3" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">CUSTODIO</th>
        <th colspan="4" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">INTERESADO</th>
         <th colspan="1" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">ADOPCIÓN</th>
        <th colspan="2" scope="col" style="background-color:#3498db; color:#FFF;"></th>
        
      </tr>
       <tr>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Fecha:</th>
    		<th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Clave:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre:</th>
                        
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Telefono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Correo:</th>
            
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Edad:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Telefono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Ocupacion:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Estatus:</th>
            
            <th style="background-color:#3498db"></th>
        </tr>
    </thead>
    <tbody>
<?php

if($consulta) {
	while( $cliente = mysql_fetch_array($consulta)){

	?>
	
    
		  <tr id="fila-<?php echo $cliente['id'] ?>">
              <td><?php echo $cliente['fecha'] ?></td>
			  <td><?php echo $cliente['claveMascota'] ?></td>
			  <td><?php echo $cliente['nombreMascota'] ?></td>
			  <td><?php echo $cliente['nombreCustodio'] ?></td>
			  <td><?php echo $cliente['telefonoCustodio'] ?></td>
              <td><?php echo $cliente['correoCustodio'] ?></td>
              <td><?php echo $cliente['nombreInt'] ?></td>
              <td><?php echo $cliente['edadInt'] ?></td>
              <td><?php echo $cliente['telInt']?></td>
              <td><?php echo $cliente['ocupacionInt'] ?></td>
              <td><?php echo $cliente['estatusAdop'] ?></td>
              
			  <td><span class="modi"><a href="qamas.php?id=<?php echo $cliente['id'] ?>"><img src="img/resultset_next.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
		  </tr>
	<?php
	}
	

}
?>
    </tbody>
    </table>
</div>



</body>


<?php  }elseif ($_SESSION['userpriv']  == '2' || $_SESSION['userpriv']  == '3')  {  ?>

<body class="ex_highlight_row">

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


<div class="demo_jui" id="contenedor">


<table width="771" id="example" class="display">    	
  
    <thead>
      <tr>    
        <th colspan="1" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">REGISTRO</th>   
        <th colspan="2" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">MASCOTA</th>
        <th colspan="3" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">CUSTODIO</th>
        <th colspan="4" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">INTERESADO</th>
         <th colspan="1" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">ADOPCIÓN</th>
        <th colspan="2" scope="col" style="background-color:#3498db; color:#FFF;"></th>
        
      </tr>
       <tr>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Fecha:</th>
    		<th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Clave:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre:</th>
                        
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Telefono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Correo:</th>
            
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Edad:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Telefono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Ocupacion:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Estatus:</th>
            
            <th style="background-color:#3498db"></th>
        </tr>
    </thead>
    <tbody>
<?php

if($consulta) {
	while( $cliente = mysql_fetch_array($consulta)){

	?>
	
    
		  <tr id="fila-<?php echo $cliente['id'] ?>">
              <td><?php echo $cliente['fecha'] ?></td>
			  <td><?php echo $cliente['claveMascota'] ?></td>
			  <td><?php echo $cliente['nombreMascota'] ?></td>
			  <td><?php echo $cliente['nombreCustodio'] ?></td>
		 <td><?php echo $cliente['telefonoCustodio'] ?></td>
              <td><?php echo $cliente['correoCustodio'] ?></td>
              <td><?php echo $cliente['nombreInt'] ?></td>
              <td><?php echo $cliente['edadInt'] ?></td>
              <td><?php echo $cliente['telInt']?></td>
              <td><?php echo $cliente['ocupacionInt'] ?></td>
              <td><?php echo $cliente['estatusAdop'] ?></td>
              
			  <td><span class="modi"><a href="qamas.php?id=<?php echo $cliente['id'] ?>"><img src="img/resultset_next.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
		  </tr>
	<?php
	}
	

}
?>
    </tbody>
    </table>
</div>



</body>


<?php } ?>



</html>

<?php 
}else{
	
	 echo '<script>window.location="index.php";</script>';
	 
	}

?>