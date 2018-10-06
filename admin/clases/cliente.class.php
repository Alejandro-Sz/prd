<?php 
include_once("conexion.class.php");


class Cliente{
 //constructor	
 	var $con;
 	function Cliente(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){			
				 			
		    mysql_query("SET NAMES utf8");
							
			 return mysql_query ("INSERT INTO adopciones2 (clave, extra, nombre, raza, color, tamano, sexo, fechaNacimiento, fechaIngreso, quienIngreso, origen, descripcion, estatus, publicado, cartilla, fechaEsterilizacion, fechaAdopcion, fichaAdop, custodio, telefono, email, direccion, facebook, comentarios, video, correoResp, telResp) VALUES ('".$campos[0]."', '".$campos[1]."', '".$campos[2]."', '".$campos[3]."', '".$campos[4]."', '".$campos[5]."', '".$campos[6]."', '".$campos[7]."', '".$campos[8]."', '".$campos[9]."', '".$campos[10]."', '".$campos[11]."', '".$campos[12]."', '".$campos[13]."', '".$campos[14]."', '".$campos[15]."', '".$campos[16]."', '".$campos[17]."', '".$campos[18]."', '".$campos[19]."', '".$campos[20]."', '".$campos[21]."', '".$campos[22]."', '".$campos[23]."', '".$campos[24]."' , '".$campos[25]."' , '".$campos[26]."'  )");	
					
		}
	}
	
	function insertaruser($campos){
		if($this->con->conectar()==true){			
				 			
		   //print_r($campos);
			 mysql_query("SET NAMES ISO-8859-1");
							
			 return mysql_query ("INSERT INTO qa_usuarios (nombre, user, passwd, privilegio) VALUES ('".$campos[0]."', '".$campos[1]."', '".$campos[2]."', '".$campos[3]."' )");	
					
		}
	}	
	
	
	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			 mysql_query("SET NAMES ISO-8859-1");
					 
			return mysql_query("UPDATE adopciones2 SET clave = '".$campos[0]."', extra = '".$campos[1]."', nombre = '".$campos[2]."', raza = '".$campos[3]."', color = '".$campos[4]."', tamano = '".$campos[5]."', sexo = '".$campos[6]."', fechaNacimiento = '".$campos[7]."', fechaIngreso = '".$campos[8]."', quienIngreso = '".$campos[9]."', origen = '".$campos[10]."', descripcion = '".$campos[11]."', estatus = '".$campos[12]."', publicado = '".$campos[13]."', cartilla = '".$campos[14]."', fechaEsterilizacion = '".$campos[15]."', fechaAdopcion = '".$campos[16]."', fichaAdop = '".$campos[17]."', custodio = '".$campos[18]."', telefono = '".$campos[19]."', email = '".$campos[20]."', direccion = '".$campos[21]."', facebook = '".$campos[22]."', comentarios = '".$campos[23]."', video = '".$campos[24]."'  ,  correoResp = '".$campos[25]."' , telResp = '".$campos[26]."'  WHERE llave = ".$id);
		}
	}
	

	function actuser($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			 mysql_query("SET NAMES ISO-8859-1");
							 
			return mysql_query("UPDATE qa_usuarios SET nombre = '".$campos[0]."', user = '".$campos[1]."', passwd = '".$campos[2]."', privilegio = '".$campos[3]."' WHERE id = ".$id);
		}
	}
	
	
	
	function mostrar_cliente($id){
		if($this->con->conectar()==true){
			  mysql_query("SET NAMES UTF-8");
			return mysql_query("SELECT * FROM adopciones2 WHERE llave=".$id);
		}
	}
	
	
	function mostrar_cliente_qa($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM quiero_adoptar WHERE id=".$id);
		}
	}




	function mostrar_clientes(){
		if($this->con->conectar()==true){
		
			return mysql_query("SELECT * FROM quiero_adoptar WHERE Disponible=0 ORDER BY fecha ASC");
		}
	}
	
	
	function mostrar_clientes_adop(){
		if($this->con->conectar()==true){
		
			return mysql_query("SELECT * FROM adopciones2 WHERE disponible=0");
		}
	}
	
	
	function mostrar_usuarios(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM qa_usuarios");
		}
	}
	
		function mostrar_usuario($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM qa_usuarios WHERE id=".$id);
		}
	}
	
		function mostrar_cliente_foto($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT foto1, foto2, foto3 FROM adopciones2 WHERE llave=".$id);
		}
	}

	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("UPDATE adopciones2 SET disponible=1 WHERE llave=".$id);
		}
	}
	
		function eliminaruser($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM qa_usuarios WHERE id=".$id);
		}
	}
	
}
?>