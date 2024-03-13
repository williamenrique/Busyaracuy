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
					// 	document.querySelector("#unidad").innerHTML = objData.data.id_unidad
				// 	document.querySelector("#unidad").innerHTML = objData.data.id_unidad
				// 	document.querySelector("#vim").innerHTML = objData.data.vim_unidad
				// 	document.querySelector("#modelo").innerHTML = objData.data.modelo_unidad
				// 	document.querySelector("#txtRutaUnidad").value = objData.data.ruta_unidad
				// 	document.querySelector("#txtFechaEntrada").value = objData.data.fecha_entrada
				// 	document.querySelector("#txtOperador").value = objData.data.operardor_unidad
				// 	document.querySelector("#txtMecanico").value = objData.data.nomb_mecanico
				// 	document.querySelector("#txtCombustible").value = objData.data.tipo_combustible
				// 	document.querySelector("#txtKM").value = objData.data.km_unidad
				// 	document.querySelector("#txtDiagnostico").value = objData.data.diagnostico
				// 	document.querySelector("#txtRecomendacion").value = objData.data.recomendacion
				// 	document.querySelector("#txtCapacidad").value = objData.data.cap_pasajero
				// 	document.querySelector("#txtCreacion").value = objData.data.fecha_creacion
				// 	if(objData.data.tipo_mantenimiento == "c"){
				// 		document.querySelector("#tipoMant").innerHTML = '<span class="badge badge-info">CORRECTIVO</span>'
				// 	}else{
				// 		document.querySelector("#tipoMant").innerHTML = '<span class="badge badge-info">PREVENTIVO</span>'
				// 	}
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