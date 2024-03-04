let tableUserHigh;
document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('.box_user_high')) { 
		tableUserHigh = $('#tableUserHigh').DataTable({
				"language": {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible",
				"sInfo": "Total de _TOTAL_ Registros",
				"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				},
				"buttons": {
					"copy": "Copiar",
					"colvis": "Visibilidad"
				}
			},
			"responsive": {
				"name": "medium",
				"width": "1188"
			},
			"ajax": {
				"url": ' ' + base_url + 'Usuarios/getUserHigh',
				"dataSrc": ''
			},
			"columns": [
				{ 'data': 'user_id' },
				{ 'data': 'user_nick' },
				{ 'data': 'user_nombres' },
				{ 'data': 'user_apellidos' },
				{ 'data': 'user_email' },
				{ 'data': 'user_tlf' },
				{ 'data': 'rol_name' },
				{ 'data': 'user_status' }
			],
			"resonsieve": "true",
			"bDestroy": true,
			"iDisplayLength": 10,
			"order": [[0, "asc"]]
		});
	}

	$('#tableUserHigh').DataTable();
	/***********
	 * hacemos el llamado a los usurios de baja
	 * verificamos que el contenedor exista
	 */
	// if (document.querySelector('.box_user_high')) {
	// 	console.log('aqui');
	// 	//creamos el objeto para os navegadores
	// 	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	// 	var ajaxUrl = base_url + "Usuarios/getUserHigh/";
	// 	//abrimos la conexion y enviamos los parametros para la peticion
	// 	request.open("GET", ajaxUrl, true);
	// 	request.send();
	// 	request.onreadystatechange = function () {
	// 		//todo va bien 
	// 		if (request.readyState == 4 && request.status == 200) {
	// 			//creamos el objeto de los datos obtenidos del controlador
	// 			var objData = JSON.parse(request.responseText);
	// 			//evaluamos

	// 			if (objData.status) {
	// 				alert(objData.data.user_nombres);
	// 				document.querySelector("#nickname").innerHTML = objData.data.user_name;
	// 			} else {
	// 				Swal.fire('error', objData.msg);
	// 			}
	// 		}
	// 	}
	// }
}, false);