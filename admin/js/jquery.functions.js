	function ActualizarDatos(){
		var id = $('#id').attr('value');
 		var clave = $('#clave').attr('value');
		var extra = $('#extra').attr('value');
		var nombre = $('#nombre').attr('value');
		var raza = $('#raza').attr('value');
		var color = $('#color').attr('value');
		var tamano = $('#tamano').attr('value');
		var sexo = $('#sexo').attr('value');
		var fechaNacimiento = $('#fechaNacimiento').attr('value');
		var fechaIngreso = $('#fechaIngreso').attr('value');
		var quienIngreso = $('#quienIngreso').attr('value');
		var origen = $('#origen').attr('value');
		var descripcion = $('#descripcion').attr('value');
		var estatus = $("select[@name='estatus']:selected").attr("value");
		var publicado = $("select[@name='publicado']:selected").attr("value");
		var cartilla = $('#cartilla').attr('value');
		var fechaEsterilizacion = $('#fechaEsterilizacion').attr('value');
		var fechaAdopcion = $('#fechaAdopcion').attr('value');
		var fichaAdop = $('#fichaAdop').attr('value');	
		var custodio = $('#custodio').attr('value');	
		var telefono = $('#telefono').attr('value');	
		var email = $('#email').attr('value');
		var direccion = $('#direccion').attr('value');
		var facebook = $("select[@name='facebook']:selected").attr("value");
		var comentarios = $('#comentarios').attr('value');
		var video = $("#video").attr('value');
			
	
		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&clave="+clave+"&extra="+extra+"&nombre="+nombre+"&raza="+raza+"&color="+color+"&tamano="+tamano+"&sexo="+sexo+"&fechaNacimiento="+fechaNacimiento+"&fechaIngreso="+fechaIngreso+"&quienIngreso="+quienIngreso+"&origen="+origen+"&descripcion="+descripcion+"&estatus="+estatus+"&publicado="+publicado+"&cartilla="+cartilla+"&fechaEsterilizacion="+fechaEsterilizacion+"&fechaAdopcion="+fechaAdopcion+"&fichaAdopcion="+fichaAdopcion+"&custodio="+custodio+"&telefono="+telefono+"&email="+email+"&direccion="+direccion+"&facebook="+facebook+"&comentarios="+comentarios+"&video="+video+"&id="+id,
			success: function(datos){
			
			}
		});
	}
	
	
	
	function ActualizarUsuario(){
		var id = $('#id').attr('value');
 		var nombre = $('#nombre').attr('value');
		var username = $('#user').attr('value');
		var passwd = $('#passwd').attr('value');
		var privilegio = $('#privilegio').attr('value');
			
			

		$.ajax({
			url: 'actuser.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&username="+username+"&passwd="+passwd+"&privilegio="+privilegio+"&id="+id,
			success: function(datos){
			    alert(datos);
			 	window.location.href = "usuarios.php";
			}
		});
	}
	
	

	function GrabarDatos(){
		var id = $('#id').attr('value');
 		var clave = $('#clave').attr('value');
		var extra = $('#extra').attr('value');
		var nombre = $('#nombre').attr('value');
		var raza = $('#raza').attr('value');
		var color = $('#color').attr('value');
		var tamano = $('#tamano').attr('value');
		var sexo = $('#sexo').attr('value');
		var fechaNacimiento = $('#fechaNacimiento').attr('value');
		var fechaIngreso = $('#fechaIngreso').attr('value');
		var quienIngreso = $('#quienIngreso').attr('value');
		var origen = $('#origen').attr('value');
		var descripcion = $('#descripcion').attr('value');
		var estatus = $("select[@name='estatus']:selected").attr("value");
		var publicado = $("select[@name='publicado']:selected").attr("value");
		var cartilla = $('#cartilla').attr('value');
		var fechaEsterilizacion = $('#fechaEsterilizacion').attr('value');
		var fechaAdopcion = $('#fechaAdopcion').attr('value');
		var fichaAdop = $('#fichaAdop').attr('value');	
		var custodio = $('#custodio').attr('value');	
		var telefono = $('#telefono').attr('value');	
		var email = $('#email').attr('value');
		var direccion = $('#direccion').attr('value');
		var facebook = $("select[@name='facebook']:selected").attr("value");
		var comentarios = $('#comentarios').attr('value');
		var video = $("#video").attr('value');
       
			
	
		$.ajax({
			url: 'nuevo.php',
			type: "POST",
			data: "submit=&clave="+clave+"&extra="+extra+"&nombre="+nombre+"&raza="+raza+"&color="+color+"&tamano="+tamano+"&sexo="+sexo+"&fechaNacimiento="+fechaNacimiento+"&fechaIngreso="+fechaIngreso+"&quienIngreso="+quienIngreso+"&origen="+origen+"&descripcion="+descripcion+"&estatus="+estatus+"&publicado="+publicado+"&cartilla="+cartilla+"&fechaEsterilizacion="+fechaEsterilizacion+"&fechaAdopcion="+fechaAdopcion+"&fichaAdopcion="+fichaAdopcion+"&custodio="+custodio+"&telefono="+telefono+"&email="+email+"&direccion="+direccion+"&facebook="+facebook+"&comentarios="+comentarios+"&video="+video,
			success: function(datos){
	
			}
		});
		return false;
	}


	

	function GrabarUser(){		
 		var user = $('#user').attr('value');
		var passwd = $('#passwd').attr('value');
		var nombre = $('#nombre').attr('value');
		var privilegio = $('#privilegio').attr('value');
		
		
		$.ajax({
			url: 'nuevouser.php',
			type: "POST",
			data: "submit=&passwd="+passwd+"&user="+user+"&nombre="+nombre+"&privilegio="+privilegio,
			success: function(datos){
				alert(datos);
			 	window.location.href = "usuarios.php";
			}
		});
		return false;
		
		
	}

   
	
	function EliminarDato(cliente_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					$("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	}
	



	function Cancelar(){
		window.location.href = "adopciones.php";
		
	}
	
	
	function CancelarUsuario(){
		window.location.href = "usuarios.php";
		
	}
	
	
	
	
	
	
	
	
	
	
	// funciones del calendario
	function update_calendar(){
		var month = $('#calendar_mes').attr('value');
		var year = $('#calendar_anio').attr('value');
	
		var valores='month='+month+'&year='+year;
	
		$.ajax({
			url: 'calendario.php',
			type: "GET",
			data: valores,
			success: function(datos){
				$("#calendario_dias").html(datos);
			}
		});
	}
	
	
	
	function set_date(date){
		$('#fechaNacimiento').attr('value',date);
		show_calendar();
				
		var today = new Date();
		var birthDate = new Date($('#fechaNacimiento').attr('value'));
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
			age--;
		}
		$("#edad").attr('value',age + ' a\u00f1o(s)  --' + m + ' mes(es)');
	}
	
	
	function show_calendar(){
		$('#calendario1').toggle();
	}
	
	
	
	
	<!-- Quien Ingreso -->
	
	
	function update_calendar2(){
		var month = $('#calendar_mes').attr('value');
		var year = $('#calendar_anio').attr('value');
	
		var valores='month='+month+'&year='+year;
	
		$.ajax({
			url: 'calendario.php',
			type: "GET",
			data: valores,
			success: function(datos){
				$("#calendario_dias").html(datos);
			}
		});
	}
	
	function set_date2(date){
		$('#fechaIngreso').attr('value',date);
		show_calendar2();
	}	
	
	function show_calendar2(){
		$('#calendario2').toggle();
	}
	
	
	<!-- Fecha de Esterelización -->
	
	
	function update_calendar3(){
		var month = $('#calendar_mes').attr('value');
		var year = $('#calendar_anio').attr('value');
	
		var valores='month='+month+'&year='+year;
	
		$.ajax({
			url: 'calendario.php',
			type: "GET",
			data: valores,
			success: function(datos){
				$("#calendario_dias").html(datos);
			}
		});
	}
	
	function set_date3(date){
		$('#fechaEsterilizacion').attr('value',date);
		show_calendar3();
	}	
	
	function show_calendar3(){
		$('#calendario3').toggle();
	}
	
	
	<!-- Fecha de Adopcion -->
	
	
	function update_calendar4(){
		var month = $('#calendar_mes').attr('value');
		var year = $('#calendar_anio').attr('value');
	
		var valores='month='+month+'&year='+year;
	
		$.ajax({
			url: 'calendario.php',
			type: "GET",
			data: valores,
			success: function(datos){
				$("#calendario_dias").html(datos);
			}
		});
	}
	
	function set_date4(date){
		$('#fechaAdopcion').attr('value',date);
		show_calendar4();
	}	
	
	function show_calendar4(){
		$('#calendario4').toggle();
	}
		
	