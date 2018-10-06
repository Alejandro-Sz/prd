$(document).ready(function () {
		var nombrereg = /^[^0-9]+$/;
		var bussreg = /^[^0-9]+$/;
		var giroreg = /^[^0-9]+$/;
		var apereg = /^[^0-9]+$/;
		var addreg = /^[a-zA-Z0-9\-#\s]+$/;
		var add1reg = /^[0-9]+$/;
		var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		var areareg = /^([0-9]{2,3})$/;
		var phonereg = /^([0-9]{7,8})$/;
		var numreg = /^[0-9]$/;
		var postalreg = /^([0-9]{5})+$/;
	
	$('[name="submit"]').click(function (){
		
	
		
		$(".error").remove();
				
		if( $(".adop-clave").val() == ""){
			$(".adop-clave").focus().after("<span class='error'>Ingrese una clave</span>");
			return false;
		}
		else if( $(".adop-ingresa").val() == ""){
			$(".adop-ingresa").focus().after("<span class='error'>Ingrese quien Ingresa</span>");
			return false;
		}
		else if( $(".adop-origen").val() == ""){
			$(".adop-origen").focus().after("<span class='error'>Ingrese el Origen</span>");
			return false;
		}
		else if( $(".adop-custodio").val() == ""){
			$(".adop-custodio").focus().after("<span class='error'>Ingrese el Custodio</span>");
			return false;
		}
		else if( $(".adop-telefono").val() == ""){
			$(".adop-telefono").focus().after("<span class='error'>Ingrese el telefono</span>");
			return false;
		}
		else if( $(".adop-correo").val() == "" || !emailreg.test($(".adop-correo").val()) ){
			$(".adop-correo").focus().after("<span class='error'>Ingrese un correo correcto</span>");
			return false;
		}
						
	});
		
});