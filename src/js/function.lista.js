if (document.querySelector('.listUserMenu')) {
	//creamos la ruta de envio
	let ajaxUrl = base_url + "Menu/listMenu";
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("POST", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//let objData = JSON.parse(request.responseText);
			//leemos el ststus de la respuesta
			document.querySelector('.listUserMenu').innerHTML = request.responseText;
		}
	}
}