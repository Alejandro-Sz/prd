$("document").ready(function () {

	
	//Si es perros, gatos o todos
	$("#tipo").change(function(){
		tipo = $('#tipo').val();
		tamano = $('#tamano').val();
		sexo = $('#sexo').val();
		
		
		  // Tipo = Todos, Tamaño = Todos y Sexo = Todos
		  if( tipo == 'todo' && tamano == 'todo' && sexo == 'todo'){
				$('#contenido').load('results.php');
				return false;
		  }
		  
		  
		  // Tipo = Todos, Tamaño = Todos y Sexo = (M o H)
		  if( (tipo == 'todo') && (tamano == 'todo') && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"sexo.php",
						data: "sexo=" + sexo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }
		  
		  
		  // Tipo = Todos, Tamaño = G, M, CH y Sexo = Todos
		  if( (tipo == 'todo') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( sexo == 'todo' ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tamano.php",
						data: "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  } 
		  
		  
		  // Tipo = Todos, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'todo') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
		
			  	$.ajax({
						type:"POST",
						url:"tamsex.php",
						data: "sexo=" + sexo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  } 
		  
		  
		  // Tipo = P o G, Tamaño = Todos y Sexo = Todos
		  if( ( (tipo == 'perro') || (tipo == 'gato') ) && (tamano == 'todo') && ( sexo == 'todo' ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"extra.php",
						data: "tipo=" + tipo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }		  
		
		
		  // Tipo = P o G, Tamaño = Todos y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && (tamano == 'todo') && (  ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tiposex.php",
						data: "tipo=" + tipo + "&" + "sexo=" + sexo ,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }		
		  

		  // Tipo = P o G, Tamaño = Todos y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'todo' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tipotam.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }	
		  

		  // Tipo = P o G, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tipotamsex.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano + "&" + "sexo=" + sexo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }			  		  	  
		  
	
		  
		  				 
	 
		
		
	
	   
    });
	
		//Si es macho o hembra
	$('#tamano').change(function() {
		tipo = $('#tipo').val();
		tamano = $('#tamano').val();
		sexo = $('#sexo').val();
		
		
		  // Tipo = Todos, Tamaño = Todos y Sexo = Todos
		  if( tipo == 'todo' && tamano == 'todo' && sexo == 'todo'){
				$('#contenido').load('results.php');
				return false;
		  }
		  
		  
		  // Tipo = Todos, Tamaño = Todos y Sexo = (M o H)
		  if( (tipo == 'todo') && (tamano == 'todo') && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"sexo.php",
						data: "sexo=" + sexo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }
		  
		  
		  // Tipo = Todos, Tamaño = G, M, CH y Sexo = Todos
		  if( (tipo == 'todo') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( sexo == 'todo' ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tamano.php",
						data: "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  } 
		  
		  
		  // Tipo = Todos, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'todo') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
		
			  	$.ajax({
						type:"POST",
						url:"tamsex.php",
						data: "sexo=" + sexo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  } 
		  
		  
		  // Tipo = P o G, Tamaño = Todos y Sexo = Todos
		  if( ( (tipo == 'perro') || (tipo == 'gato') ) && (tamano == 'todo') && ( sexo == 'todo' ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"extra.php",
						data: "tipo=" + tipo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }		  
		
		
		  // Tipo = P o G, Tamaño = Todos y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && (tamano == 'todo') && (  ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tiposex.php",
						data: "tipo=" + tipo + "&" + "sexo=" + sexo ,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }		
		  

		  // Tipo = P o G, Tamaño = Todos y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'todo' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tipotam.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }	
		  

		  // Tipo = P o G, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tipotamsex.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano + "&" + "sexo=" + sexo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }			  		  	  
		  
	
		  
		  	
	   
    });
	
	
	//Si es macho o hembra
	$('#sexo').change(function() {
		tipo = $('#tipo').val();
		tamano = $('#tamano').val();
		sexo = $('#sexo').val();
		
		
		  // Tipo = Todos, Tamaño = Todos y Sexo = Todos
		  if( tipo == 'todo' && tamano == 'todo' && sexo == 'todo'){
				$('#contenido').load('results.php');
				return false;
		  }
		  
		  
		  // Tipo = Todos, Tamaño = Todos y Sexo = (M o H)
		  if( (tipo == 'todo') && (tamano == 'todo') && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"sexo.php",
						data: "sexo=" + sexo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }
		  
		  
		  // Tipo = Todos, Tamaño = G, M, CH y Sexo = Todos
		  if( (tipo == 'todo') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( sexo == 'todo' ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tamano.php",
						data: "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  } 
		  
		  
		  // Tipo = Todos, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'todo') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
		
			  	$.ajax({
						type:"POST",
						url:"tamsex.php",
						data: "sexo=" + sexo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  } 
		  
		  
		  // Tipo = P o G, Tamaño = Todos y Sexo = Todos
		  if( ( (tipo == 'perro') || (tipo == 'gato') ) && (tamano == 'todo') && ( sexo == 'todo' ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"extra.php",
						data: "tipo=" + tipo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }		  
		
		
		  // Tipo = P o G, Tamaño = Todos y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && (tamano == 'todo') && (  ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tiposex.php",
						data: "tipo=" + tipo + "&" + "sexo=" + sexo ,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }		
		  

		  // Tipo = P o G, Tamaño = Todos y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'todo' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tipotam.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }	
		  

		  // Tipo = P o G, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  
			  	$.ajax({
						type:"POST",
						url:"tipotamsex.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano + "&" + "sexo=" + sexo,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
		  }			  		  	  
		  
	
		  
		  	
	   
    });
	
	
	
	//Lo que escriba en el buscador
	$('#filtro').keyup(function() {
		filtro = this.value;
			
			if(filtro == ''){
				  $('#contenido').load('results.php');
				   return false;
				}
			
			$.ajax({
				 type:"POST",
				 url:"filtro.php",
				 data: "filtro=" + filtro,
				success: function(data){ 
				   $('#contenido').html(data);
				}
			});
	   
    });
	

  

});