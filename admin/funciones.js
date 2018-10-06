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
				
		if( $(".usuario-nombre").val() == "" || !nombrereg.test($(".usuario-nombre").val())){
			$(".usuario-nombre").focus().after("<span class='error'>Ingre un Nombre, Solo letras!!</span>");
			return false;
		}
		else if( $(".usuario-user").val() == ""){
			$(".usuario-user").focus().after("<span class='error'>Ingrese un Usuario</span>");
			return false;
		}
		else if( $(".usuario-passwd").val() == ""){
			$(".usuario-passwd").focus().after("<span class='error'>Ingrese un Password</span>");
			return false;
		}
						
	});
		
});