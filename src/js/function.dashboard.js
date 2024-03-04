document.addEventListener('DOMContentLoaded', function () {
	/************************************************* 
	 * creamos el objeto de envio para tipo de navegador
	 * hacer una validacion para diferentes navegadores y crear el formato de lectura
	 * y hacemos la peticion mediante ajax
	 * usando un if reducido creamos un objeto del contenido en(request)
	 *****************************************************/
	getUnidades();
	getOperativo();
	getDesincorporado();
},false)
function getUnidades(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Dashboard/getUnidades';
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true);
	//hacemos el envio al servidor
	request.send();
	//obtenemos los resultados y evaluamos
	var unidades = document.querySelector('.unidades');

	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidades').innerHTML = request.responseText;
		}
	}
}
function getOperativo(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Dashboard/getOperativo';
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true);
	//hacemos el envio al servidor
	request.send();
	//obtenemos los resultados y evaluamos
	var unidadOperativa = document.querySelector('.unidadOperativa');

	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidadOperativa').innerHTML = request.responseText;
		}
	}
}
function getDesincorporado(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Dashboard/getDesincorporado';
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true);
	//hacemos el envio al servidor
	request.send();
	//obtenemos los resultados y evaluamos
	var unidadesDesincorporadas = document.querySelector('.unidadesDesincorporadas');

	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidadesDesincorporadas').innerHTML = request.responseText;
		}
	}
}
window.addEventListener('load', function () {
	
},false)