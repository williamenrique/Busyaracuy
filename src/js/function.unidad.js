// if(document.querySelector("#idGetUnidad")){
//     let idGetUnidad = document.querySelector("#idGetUnidad")
//     alert(idGetUnidad)
// }
/***************VER UNIDAD EN MANTENIMIENTO ***************************/
function fntViewUnidad() {
	if(document.querySelector('#idGetUnidad')){
		//obtener los datos de la unidad en mantenimiento
		var idGetUnidad = document.querySelector('#idGetUnidad').value;
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url + "Flota/getUnidad/" + idGetUnidad;
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			//todo va bien 
			if (request.readyState == 4 && request.status == 200) {
				//creamos el objeto de los datos obtenidos del controlador
				document.querySelector('.historia').innerHTML = request.responseText;
				// var objData = JSON.parse(request.responseText);
                // if (objData.status) {
                //     Swal.fire('info', objData.msg)
	
                // } else {
                //     Swal.fire('error', objData.msg)
                // }
            }
        }
    }
}
/************salir de unidad en mantenimiento************************/
function fntSalirMant(idFlota){
	let formUndMant = document.querySelector('#formUndMant')
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'Flota/setSalirMantenimiento'
	//creamos un objeto del formulario con los datos haciendo referencia a formData
	let formData = new FormData(formUndMant); 
	//prepara los datos por ajax preparando el dom
	request.open('POST', ajaxUrl, true);
	//envio de datos del formulario que se almacena enla variable
	request.send(formData);
	//despues del envio retornamos una funcion con los datos
	request.onreadystatechange = function () {
		//validamos la respuesta del servidor al enviar los datos
		if (request.readyState == 4 && request.status == 200) {
			//obtener el json y convertirlo a un objeto en javascript
			var objData = JSON.parse(request.responseText);
			//condionamos la respuesta del array del controlador
			if (objData.status) {
				// formUndMant.reset();
				notifi(objData.msg, 'success');
			} else {
				notifi(objData.msg, 'error');
			}
		}
	}
}
window.addEventListener('load', function () {
	fntViewUnidad()
},false)