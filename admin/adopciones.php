<?php
session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
   
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_clientes_adop();

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
        return $ano_diferencia .' Año(s)';

      }
 
    }
    

				
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
   "scrollY": 400,
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


 <?php  if ($_SESSION['userpriv']  == '1'  ){	?>


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


<a href="nuevo.php" target="_self"><img src="img/add.png" style="border:0px #000066 dashed; position:relative; float:left; margin-left:10%; margin-top:15px; margin-bottom:5px"/><span style="position:relative; float:left"><strong style="position:relative; float:left;  margin-left:5%; margin-top:15px;; color:#2980b9">Nuevo Registro</strong></span></a>


<div class="demo_jui" id="contenedor">


<table width="771" id="example" class="display">    	
  
    <thead>
      <tr>    
          <th colspan="1" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">ACTUALIZACIÓN</th> 
        <th colspan="9" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">MASCOTA</th>
        <th colspan="3" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">RESPONSABLE</th>

        <th colspan="4" scope="col" style="background-color:#F5F5F5; color:#FFF;"></th>
        
      </tr>
       <tr>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Fecha:</th>
    		
       
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Clave:</th>
    		<th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Tipo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Raza:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Tamaño:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Sexo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Edad:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Estatus:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Facebook:</th>
                        
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Correo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Teléfono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Foto:</th>
            
            
            
            <th style="background-color:#F5F5F5"></th>
            <th style="background-color:#F5F5F5"></th>
            <th style="background-color:#F5F5F5"></th>
        </tr>
    </thead>
    <tbody>
<?php

if($consulta) {
	while( $cliente = mysql_fetch_array($consulta)){

	?>
	
    
		  <tr id="fila-<?php echo $cliente['llave'] ?>">
            <?php $edad1 = $cliente['fechaNacimiento'] ?>

              <td><?php echo $cliente['fechaModificacion'] ?></td>
            
              
              <td><?php echo $cliente['clave'] ?></td>
              <td><?php echo $cliente['extra'] ?></td>
              <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['raza'] ?></td>
              <td><?php echo $cliente['tamano'] ?></td>
              <td><?php echo $cliente['sexo'] ?></td>
              <td><?php echo calculaedad(''.$edad1.'') ?> </td>
              <td><?php echo $cliente['estatus'] ?></td>
              <td><?php echo $cliente['facebook'] ?></td>
              <td><?php echo $cliente['quienIngreso'] ?></td>
              <td><?php echo $cliente['correoResp'] ?></td>
              <td><?php echo $cliente['telResp'] ?></td>
              
              <td><img src="<?php if(empty($cliente['foto1'])){ echo "../imgs/prodan1.png";}else{ echo "../../fotos_adop/$cliente[foto1]";}?>" width="90" height="90"/></td>
			
              
			  <td><span class="modi"><a href="actualizar.php?id=<?php echo $cliente['llave'] ?>"><img src="img/edit.png" title="Ver mas" alt="Ver Mas" /></a></span></td>                      
              
              <td><span class="modi"><a href="upload/index.php?id=<?php echo $cliente['llave'] ?>"><img src="img/images.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
                 <td><span class="modi"><a onClick="return confirm('¿Esta seguro que lo desea borrar?')" href="eliminar.php?id=<?php echo $cliente['llave'] ?>"><img src="img/delete.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
		  </tr>
	<?php
	}
	

}
?>
    </tbody>
    </table>
</div>



</body>

<?php    }elseif ($_SESSION['userpriv']  == '2')  {	?>


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


<a href="nuevo.php" target="_self"><img src="img/add.png" style="border:0px #000066 dashed; position:relative; float:left; margin-left:10%; margin-top:15px; margin-bottom:5px"/><span style="position:relative; float:left"><strong style="position:relative; float:left;  margin-left:5%; margin-top:15px;; color:#2980b9">Nuevo Registro</strong></span></a>


<div class="demo_jui" id="contenedor">


<table width="771" id="example" class="display">    	
  
    <thead>
      <tr>    
          <th colspan="1" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">ACTUALIZACIÓN</th> 
        <th colspan="9" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">MASCOTA</th>
        <th colspan="3" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">RESPONSABLE</th>

        <th colspan="4" scope="col" style="background-color:#F5F5F5; color:#FFF;"></th>
        
      </tr>
       <tr>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Fecha:</th>
        
       
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Clave:</th>
        <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Tipo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Raza:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Tamaño:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Sexo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Edad:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Estatus:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Facebook:</th>
                        
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Correo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Teléfono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Foto:</th>
            
            
            
            <th style="background-color:#F5F5F5"></th>
            <th style="background-color:#F5F5F5"></th>
            <th style="background-color:#F5F5F5"></th>
        </tr>
    </thead>
    <tbody>
<?php

if($consulta) {
	while( $cliente = mysql_fetch_array($consulta)){

	?>
	
    
		  <tr id="fila-<?php echo $cliente['llave'] ?>">
              <td><?php echo $cliente['fechaModificacion'] ?></td>
            
              
              <td><?php echo $cliente['clave'] ?></td>
              <td><?php echo $cliente['extra'] ?></td>
              <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['raza'] ?></td>
              <td><?php echo $cliente['tamano'] ?></td>
              <td><?php echo $cliente['sexo'] ?></td>
              <td><?php echo $cliente['edad'] ?></td>
              <td><?php echo $cliente['estatus'] ?></td>
              <td><?php echo $cliente['facebook'] ?></td>
              <td><?php echo $cliente['quienIngreso'] ?></td>
              <td><?php echo $cliente['correoResp'] ?></td>
              <td><?php echo $cliente['telResp'] ?></td>
              
              <td><img src="<?php if(empty($cliente['foto1'])){ echo "../imgs/prodan1.png";}else{ echo "../../fotos_adop/$cliente[foto1]";}?>" width="90" height="90"/></td>
			
              
			  <td><span class="modi"><a href="actualizar.php?id=<?php echo $cliente['llave'] ?>"><img src="img/edit.png" title="Ver mas" alt="Ver Mas" /></a></span></td>                      
              
              <td><span class="modi"><a href="upload/index.php?id=<?php echo $cliente['llave'] ?>"><img src="img/images.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
                 <td><span class="modi"><a onClick="return confirm('¿Esta seguro que lo desea borrar?')" href="eliminar.php?id=<?php echo $cliente['llave'] ?>"><img src="img/delete.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
		  </tr>
	<?php
	}
	

}
?>
    </tbody>
    </table>
</div>



</body>


<?php	}else{   ?>

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
          <th colspan="1" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">ACTUALIZACIÓN</th> 
        <th colspan="9" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">MASCOTA</th>
        <th colspan="3" scope="col" style="background-color:#2980b9; color:#FFF; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:5px;">RESPONSABLE</th>

        <th colspan="4" scope="col" style="background-color:#F5F5F5; color:#FFF;"></th>
        
      </tr>
       <tr>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Fecha:</th>
        
       
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Clave:</th>
        <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Tipo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Raza:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Tamaño:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Sexo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Edad:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Estatus:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Facebook:</th>
                        
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Nombre:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Correo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Teléfono:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center; padding:3px;">Foto:</th>
            
            
            
            <th style="background-color:#F5F5F5"></th>
            <th style="background-color:#F5F5F5"></th>

        </tr>
    </thead>
    <tbody>
<?php

if($consulta) {
	while( $cliente = mysql_fetch_array($consulta)){

	?>
	
    
		  <tr id="fila-<?php echo $cliente['llave'] ?>">
              <td><?php echo $cliente['fechaModificacion'] ?></td>
            
              
              <td><?php echo $cliente['clave'] ?></td>
              <td><?php echo $cliente['extra'] ?></td>
              <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['raza'] ?></td>
              <td><?php echo $cliente['tamano'] ?></td>
              <td><?php echo $cliente['sexo'] ?></td>
              <td><?php echo $cliente['edad'] ?></td>
              <td><?php echo $cliente['estatus'] ?></td>
              <td><?php echo $cliente['facebook'] ?></td>

              <td><?php echo $cliente['quienIngreso'] ?></td>
              <td><?php echo $cliente['correoResp'] ?></td>
              <td><?php echo $cliente['telResp'] ?></td>

              <td><img src="<?php if(empty($cliente['foto1'])){ echo "../imgs/prodan1.png";}else{ echo "../../fotos_adop/$cliente[foto1]";}?>" width="90" height="90"/></td>
			
              
			  <td><span class="modi"><a href="actualizar.php?id=<?php echo $cliente['llave'] ?>"><img src="img/edit.png" title="Ver mas" alt="Ver Mas" /></a></span></td>                      
              
              <td><span class="modi"><a href="upload/index.php?id=<?php echo $cliente['llave'] ?>"><img src="img/images.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
              
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