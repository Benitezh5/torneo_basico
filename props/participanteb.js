function validarparticipante(){

	var nombre_participante = document.getElementById("nombre_participante").value;
	var fuerza = document.getElementById("fuerza").value;
	var sexo = document.getElementById("sexo").selectedIndex;
	var procedencia = document.getElementById("procedencia").selectedIndex;
	var categoria = document.getElementById("categoria").selectedIndex;


	if(nombre_participante.length==0){
		document.getElementById("nombre_participante").style.boxShadow="0px 0px 15px red";
		document.getElementById("nombre_participante").placeholder="campo Requerido";
		return false;
	}else{
		document.getElementById("nombre_participante").style.boxShadow="0px 0px 15px green";
	}
	if(fuerza.length==0){
		document.getElementById("fuerza").style.boxShadow="0px 0px 15px red";
		document.getElementById("fuerza").placeholder="campo Requerido";
		return false;
	}else{
		document.getElementById("fuerza").style.boxShadow="0px 0px 15px green";
	}
	if(sexo==0){
		document.getElementById("sexo").style.boxShadow="0px 0px 15px red";
		document.getElementById("sexo").placeholder="campo Requerido";
		return false;
	}else{
		document.getElementById("sexo").style.boxShadow="0px 0px 15px green";
	}
	if(procedencia==0){
		document.getElementById("procedencia").style.boxShadow="0px 0px 15px red";
		document.getElementById("procedencia").placeholder="campo Requerido";
		return false;
	}else{
		document.getElementById("procedencia").style.boxShadow="0px 0px 15px green";
	}

		if(categoria==0){
		document.getElementById("categoria").style.boxShadow="0px 0px 15px red";
		document.getElementById("categoria").placeholder="campo Requerido";
		return false;
	}else{
		document.getElementById("categoria").style.boxShadow="0px 0px 15px green";
	}
	return true;
}