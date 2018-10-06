<?php
session_start(); 

if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
   
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_usuarios();
				
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
<script src="js/funciones.js"></script>
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
	


} );

</script>

</head>


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


<a href="nuevouser.php" target="_self"><img src="img/add.png" style="border:0px #000066 dashed; position:relative; float:left; margin-left:10%; margin-top:15px; margin-bottom:5px"/><span style="position:relative; float:left"><strong style="position:relative; float:left;  margin-left:5%; margin-top:15px;; color:#2980b9">Nuevo Registro</strong></span></a>


<div class="demo_jui" id="contenedor">


<table width="771" id="example" class="display">    	
  
    <thead>
      <tr>    
          
        <th colspan="4" scope="col" style="color:#FFF; background-color:#2980b9; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">USUARIOS</th>
       
        <th colspan="2" scope="col" stysle="background-color:#3498db; color:#FFF;"></th>
        
      </tr>
       <tr>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Nombre Completo:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Usuario:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Password:</th>
            <th style="background-color:#3498db; border-color:#ecf0f1; border-style:solid; border-width:1px; text-align:center">Privilegios:</th>
         
            
            
            <th style="background-color:#3498db"></th>
            <th style="background-color:#3498db"></th>
        </tr>
    </thead>
    <tbody>
<?php

if($consulta) {
	while( $cliente = mysql_fetch_array($consulta)){

	?>
	
    
		  <tr id="fila-<?php echo $cliente['id'] ?>">
              <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['user'] ?></td>
              <td><?php echo $cliente['passwd'] ?></td>
              <td><?php if($cliente['privilegio'] == '1'){ echo "Administrador/Full";}elseif($cliente['privilegio'] == '2'){ echo "Administrador/Admin";}else{echo "Usuario";}?></td>       
            

              
			  <td><span class="modi"><a href="actuser.php?id=<?php echo $cliente['id'] ?>"><img src="img/edit.png" title="Ver mas" alt="Ver Mas" /></a></span></td>                      
                         
              <td><span class="modi"><a href="elimiuser.php?id=<?php echo $cliente['id'] ?>"><img src="img/delete.png" title="Ver mas" alt="Ver Mas" /></a></span></td>
              
		  </tr>
	<?php
	}
	

}
?>
    </tbody>
    </table>
</div>



</body>

</html>

<?php 
}else{
	
	 echo '<script>window.location="index.php";</script>';
	 
	}

?>