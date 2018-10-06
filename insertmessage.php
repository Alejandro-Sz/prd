<?php
	    
		
		$claveMascota = $_GET['clavep'];		
		$nombreMascota = $_GET['nombrep'];
		$nombreCustodio = $_GET['nombrec'];	
		$telefonoCustodio = $_GET['telefonoc'];	
		$correoCustodio = $_GET['correo'];
			
		$correoInt = $_GET['email'];
		$nombreInt = $_GET['nombre'];		
		$edadInt = $_GET['edad'];
		$telInt = $_GET['telcasa'];
		$celInt = $_GET['telc'];
		$ocupacionInt = $_GET['ocupacion'];
		$address = $_GET['direccion'];
		$colonia = $_GET['direccion1'];
		$municipio = $_GET['direccion2'];
		$vivesInt = $_GET['quien'];
		$acuerdoInt = $_GET['quien2'];
		$compania = $_GET['compania'];
		$hogarCasa = $_GET['donde'];
		$comentarios = $_GET['msg'];
		
		
		
	$con = mysql_connect("localhost","prodan_prodan","danpro");
	if (!$con){
  		die('No se puede conectar a la base de datos: ' . mysql_error());
  	}
 
		mysql_select_db("prodan_prodan", $con);
 
		
		$sql="INSERT INTO quiero_adoptar VALUES ('".$claveMascota."','".$nombreMascota."','".$nombreCustodio."','".$telefonoCustodio."','".$correoCustodio."','".$correoInt."','".$nombreInt."','".$edadInt."','".$telInt."','".$celInt."','".$ocupacionInt."','".$address."','".$colonia."','".$municipio."','".$vivesInt."','".$acuerdoInt."','".$compania."','".$hogarCasa."','".$comentarios."');";
 
	
	if (!mysql_query($sql,$con)){
  		die('Error: ' . mysql_error());
  	}

 
	mysql_close($con)


?>