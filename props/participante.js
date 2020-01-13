function validarparticipante(){

	var nombre_participante =$('#nombre_participante').val();
	var fuerza =$('#fuerza').val();
	var sexo =$('#sexo').val();
	var procedencia =$('#procedencia').val();
	var categoria =$('#categoria').val();


	if(nombre_participante.length==0){
		$('#nombre_participante').css("boxShadow", "0px 0px 15px red");
		$('#nombre_participante').css("placeholder", "este campo es requerido");
		return false;
	}else{
		$('#nombre_participante').css("boxShadow", "0px 0px 15px green");
	}


	if(fuerza.length==0){
		$('#fuerza').css("boxShadow", "0px 0px 15px red");
		$('#fuerza').css("placeholder", "este campo es requerido");
		return false;
	}else{
		$('#fuerza').css("boxShadow", "0px 0px 15px green");
	}

	if(sexo.length==0){
		$('#sexo').css("boxShadow", "0px 0px 15px red");
		$('#sexo').css("placeholder", "este campo es requerido");
		return false;
	}else{
		$('#sexo').css("boxShadow", "0px 0px 15px green");
	}


	if(procedencia.length==0){
		$('#procedencia').css("boxShadow", "0px 0px 15px red");
		$('#procedencia').css("placeholder", "este campo es requerido");
		return false;
	}else{
		$('#procedencia').css("boxShadow", "0px 0px 15px green");
	}


	if(categoria.length==0){
		$('#categoria').css("boxShadow", "0px 0px 15px red");
		$('#categoria').css("placeholder", "este campo es requerido");
		return false;
	}else{
		$('#categoria').css("boxShadow", "0px 0px 15px green");
	}


	return true;


}