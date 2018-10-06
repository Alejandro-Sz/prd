$('document').ready(function(){
	//Inicion
	

	
	$("#inline").hide();
	$("#inline2").hide();
	$("#inline3").hide();
	
	
	$(".modalbox").fancybox();
	
	//Cargar todos los registros al iniciar
	$('#contenido').load('results.php');
	
	
	
	//Si es perros, gatos o todos
	$("#tipo").change(function(){
		tipo = $('#tipo').val();
		tamano = $('#tamano').val();
		sexo = $('#sexo').val();
		$('#filtro').val('');
		
		
		
		  // Tipo = Todos, Tamaño = Todos y Sexo = Todos
		  if( tipo == 'todo' && tamano == 'todo' && sexo == 'todo'){
			  $('#tamano').attr('disabled',false); 
			  $('label[for="tamano"]').css('opacity', '1');	
		 		
				$('#contenido').load('results.php');
				return false;
		  }
		  
		  
		  // Tipo = Todos, Tamaño = Todos y Sexo = (M o H)
		  if( (tipo == 'todo') && (tamano == 'todo') && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  $('#tamano').attr('disabled',false); 
			  
			  $('label[for="tamano"]').css('opacity', '1');	
		 		
			  
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
		  if( (tipo == 'todo') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( sexo == 'todo' ) ){
			  
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
		  if( (tipo == 'todo') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
		 	
		 	
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
		  
		  	  if ( (tipo == 'gato') ){
		  	        $('#tamano').attr('value','todo');
				$('#tamano').attr('disabled',true);
				
				
				$('label[for="tamano"]').css('opacity', '0.32');
				
				
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					  $('label[for="tamano"]').css('opacity', '1');
					  
			  
			   }
			  
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
		  
		  	if ( (tipo == 'gato') ){
		  	        $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
				    $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false);
					  $('label[for="tamano"]').css('opacity', '1');
			  
			   }
			  
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
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'todo' ) ) ){

		  	if ( (tipo == 'gato') ){
		  	        $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
				    $('label[for="tamano"]').css('opacity', '0.32');
					
					
							$.ajax({
								type:"POST",
								url:"extra.php",
								data: "tipo=" + tipo ,
								success: function(data){ 
										$('#contenido').html(data);
								}
							});
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					  $('label[for="tamano"]').css('opacity', '1');
					  
					  $.ajax({
						type:"POST",
						url:"tipotam.php",
						data: "tipo=" + tipo + "&" + "tamano=" + tamano,
						success: function(data){ 
								$('#contenido').html(data);
						}
				});
			  
			   }
			  
			  	
		  }	
		  

		  // Tipo = P o G, Tamaño = G, M, CH y Sexo = M o H
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
			  

		  	if ( (tipo == 'gato') ){
		  	        $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
					$('label[for="tamano"]').css('opacity', '0.32');
		 		  
				
					  $('#tamano').attr('disabled',false); 
					   $('label').css('opacity', '1');
							$.ajax({
								type:"POST",
								url:"tiposex.php",
								data: "tipo=" + tipo + "&" + "sexo=" + sexo ,
								success: function(data){ 
										$('#contenido').html(data);
								}
							});
		 		  
				  }else if( (tipo == 'perro') && (tipo == 'todo')){
					  $('#tamano').attr('disabled',false); 
					  $('label[for="tamano"]').css('opacity', '1');
					  
					  	$.ajax({
								type:"POST",
								url:"tipotamsex.php",
								data: "tipo=" + tipo + "&" + "tamano=" + tamano + "&" + "sexo=" + sexo,
								success: function(data){ 
										$('#contenido').html(data);
								}
						});
					  
			   }


		  }			  		  	  
		  
	
		  
		  				 
	 
		
		
	
	   
    });
	
		//Si es macho o hembra
	$('#tamano').change(function() {
		tipo = $('#tipo').val();
		tamano = $('#tamano').val();
		sexo = $('#sexo').val();
		$('#filtro').val('');
		
		
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
		  if( (tipo == 'todo') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( sexo == 'todo' ) ){
			  
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
		  if( (tipo == 'todo') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){

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

		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		  $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					  $('label[for="tamano"]').css('opacity', '1');
			   }
			  
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


		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		  $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					   $('label[for="tamano"]').css('opacity', '1');
			   }
			  
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
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'todo' ) ) ){

		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		 $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					   $('label[for="tamano"]').css('opacity', '1');
			   }
			  
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
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
	
	
			  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		  $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					  $('label[for="tamano"]').css('opacity', '1');
			   }
		  
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
		$('#filtro').val('');
		
		
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
		  if( (tipo == 'todo') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( sexo == 'todo' ) ){
			  
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
		  if( (tipo == 'todo') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){
		
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
			  
		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		    $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					   $('label[for="tamano"]').css('opacity', '1');
			   }


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


		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		     $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					   $('label[for="tamano"]').css('opacity', '1');
			   }
			  
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
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'todo' ) ) ){

		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
		 		  
		 		    $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					   $('label[for="tamano"]').css('opacity', '1');
			   }
			  
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
		  if( (tipo == 'perro' || tipo == 'gato') && ( (tamano == 'gigante') || (tamano == 'grande') || (tamano == 'mediano') || (tamano == 'chico') || (tamano == 'mchico') ) && ( ( sexo == 'macho' || sexo == 'hembra' ) ) ){

		  	if ( (tipo == 'gato') ){
		  	            $('#tamano').attr('value','todo');
				    $('#tamano').attr('disabled',true);
				    
				    $('label[for="tamano"]').css('opacity', '0.32');
		 		  
				  }else{
					  $('#tamano').attr('disabled',false); 
					   $('label[for="tamano"]').css('opacity', '1');
			  
			   }
			  
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
	
		
		
		
		
		filtro = $('#filtro').val();
		
		
			
			if(filtro == ''){
				  $('#contenido').load('results.php');
				   return false;
			}else{
			  
				$.ajax({
				         
					 type:"POST",
					 url:"filtro.php",
					 data: "filtro=" + filtro,
					 success: function(data){ 
					    $('#contenido').html(data);
					   
					}
				});
			
			}
	   
    });
	

      $('#filtro').focus(function() {
		  
		  
		 $('#tipo').attr('disabled',true);
		 $('#tamano').attr('disabled',true);
		 $('#sexo').attr('disabled',true);
		 
		
		
		
		
		$('label').css('opacity', '0.32');
		
		
		 

		 
		 $('#tipo').attr('value','todo');
		 $('#tamano').attr('value','todo');
		 $('#sexo').attr('value','todo');
      });
	  
	  $('#filtro').blur(function() {
		  
		  
		
                 $('#tipo').attr('disabled',false);
		 $('#tamano').attr('disabled',false);
		 $('#sexo').attr('disabled',false);
		 
		 $('label').css('opacity', '1');
		
		 
		
		 
    });
        
      
    $('#limpiar').click(function() {
		    
		$('#tipo').attr('value','todo');
		 $('#tamano').attr('value','todo');
		 $('#sexo').attr('value','todo');
		$('#tipo').val('todo');
		$('#tamano').val('todo');
		$('#sexo').val('todo');
		$('#filtro').val('');
		
		
		$('label').css('opacity', '1');
		
		$('#contenido').load('results.php');
		
		 
    });  
	    
	  
    
  

});