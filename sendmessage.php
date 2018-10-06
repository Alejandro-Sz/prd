<?php


 
$conexion = mysql_connect("localhost","prodan_prodan","danpro"); mysql_select_db("prodan_prodan"); // Con esta sentencia SQL insertaremos los datos en la base de datos 
mysql_query("SET NAMES utf8");

mysql_query ("INSERT INTO quiero_adoptar (claveMascota, nombreMascota, nombreCustodio, telefonoCustodio, correoCustodio, correoInt, nombreInt, edadInt, telInt, celInt, ocupacionInt, address, colonia, municipio, vivesInt, acuerdoInt, compania, hogarCasa, comentarios) VALUES ('".$_POST['clavep']."', '".$_POST['nombrep']."', '".$_POST['nombrec']."', '".$_POST['telefonoc']."', '".$_POST['correo']."', '".$_POST['email']."', '".$_POST['nombre']."', '".$_POST['edad']."', '".$_POST['telcasa']."', '".$_POST['telc']."', '".$_POST['ocupacion']."', '".$_POST['direccion']."', '".$_POST['direccion1']."', '".$_POST['direccion2']."', '".$_POST['quien']."', '".$_POST['quien2']."', '".$_POST['compania']."', '".$_POST['donde']."', '".$_POST['msg']."'  )");  
if (mysql_errno()!=0) {  
echo "No se pudo insertar los datos en la tabla. Error: " .mysql_errno() ." - ".mysql_error();    mysql_close($conexion); 
} else { 



$sendto   = $_POST['correo'];
$usermail = $_POST['email'];
$content  = nl2br($_POST['msg']);

$subject  = "Interesado en adoptar a ".$_POST['clavep']. " - " .$_POST['nombrep'];
$headers  = "From: ".$_POST['nombre']." <" . strip_tags($usermail) . "> \r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8 \r\n";
$headers .= "Cc:linda.rodriguez@prodan.org.mx\r\n";


$msg  = "<html><body style='font-family:Arial,sans-serif; font-size:12px; color:rgb(31,73,125);'>";
$msg .= "<p> Hola <b>".$_POST['nombrec']. "</b>, recibimos esta información de una persona interesada en adoptar a <b>".$_POST['clavep']. " - " .$_POST['nombrep']."</b></p>";

$msg .= "<p>Nombre Completo: <b>".$_POST['nombre']. "</b> <br/>";
$msg .= "Edad: <b>".$_POST['edad']. "</b>  <br/>";
$msg .= "Teléfono Casa: <b>".$_POST['telcasa']. "</b>  <br/>";
$msg .= "Teléfono Celular: <b>".$_POST['telc']. "</b>  <br/>";
$msg .= "Ocupacion: <b>".$_POST['ocupacion']. "</b>  <br/>";
$msg .= "Calle y Número: <b>".$_POST['direccion']. "</b>  <br/>";
$msg .= "Colonia: <b>".$_POST['direccion1']. "</b>  <br/>";
$msg .= "Municipio: <b>".$_POST['direccion2']. "</b>  <br/>";
$msg .= "Con quien vives: <b>".$_POST['quien']. "</b>  <br/>";
$msg .= "¿Las personas con quien vives están de acuerdo en adoptar?: <b>".$_POST['quien2']. "</b>  <br/>";
$msg .= "¿Tienes o has tenido otros animales de compañia?: <b>".$_POST['compania']. "</b>  <br/>";
$msg .= "¿ En qué parte de la casa lo planeas tener? (cochera, adentro, patio, terraza, etc): <b>".$_POST['donde']. "</b> <br/>";
$msg .= "Comentarios adicionales: <b>".$_POST['msg']. "</b></p>";


$msg .= "<p>Por favor contáctala, suerte con esa adopción!!!</p>";
$msg .= "<p>Saludos!</p>";
$msg .= "<p>PRODAN</p>";
$msg .= "</body></html>";


	if(@mail($sendto, $subject, $msg, $headers)) {	
		echo "true";
			
	} else {
		echo "false";
	}

}

?>