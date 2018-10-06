<?php
require('clases/cliente.class.php');

$cliente_id=$_GET['id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($cliente_id) == true){
	$mensaje = "Registro eliminado correctamente";
	print "<script>alert('$mensaje')</script>";
	 	echo "<script>window.location='adopciones.php';</script>";
	}else{
		$mensaje = "Se produjo un error intente nuevamente";
        print "<script>alert('$mensaje')</script>";
		echo "<script>window.location='adopciones.php';</script>";
	}
?>