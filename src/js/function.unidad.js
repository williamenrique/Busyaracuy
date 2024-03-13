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
				var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    Swal.fire('info', objData.msg)
                } else {
                    Swal.fire('error', objData.msg)
                }
            }
        }
    }
}
window.addEventListener('load', function () {
	fntViewUnidad()
},false)