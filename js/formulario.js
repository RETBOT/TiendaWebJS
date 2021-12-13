
function validar(){
	var correoElectronico = document.getElementById('usuario').value;
	var contraseña = document.getElementById('clave').value;
	var nombre = document.getElementById('nombre').value;
	var correoRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var contraseñaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,12}$/;
	var nombreRegex = /^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/;
	if(correoElectronico === "" || contraseña === "" || nombre === ""){
		alert("Todos los campos son obligatorios");
		return false;
	}else if(correoElectronico.length > 30){
		alert("El correo Electronico es muy largo");
		return false;
	}else if(!correoRegex.test(correoElectronico)){
			alert("Ingresa un correo valido");
			return false;
	}else if(contraseña.length > 12 || contraseña.length < 8){
		alert("La contraseña es incorrecta");
		return false;
	}else if(!contraseñaRegex.test(contraseña)){
		alert("Ingresa una contraseña valida. Mínimo 8 y máximo 12 caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial");
		return false;
	}else if(nombre.length > 30){
		alert("El nombre es muy largo");
		return false;
	}else if(!nombreRegex.test(nombre)){
		alert("Ingrese nombre valido. Nombre y apellido");
		return false;
	}
}
