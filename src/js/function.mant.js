var tableFlota;
document.addEventListener('DOMContentLoaded', function () {
	tableFlota = $('#tableFlota').DataTable({
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
			"url": ' ' + base_url + 'Flota/getFlota',
			"dataSrc": ''
		},
		"columns": [
			{ 'data': 'id_unidad' },
			{ 'data': 'marca_unidad' },
			{ 'data': 'modelo_unidad' },
			{ 'data': 'vim_unidad' },
			{ 'data': 'fecha_creacion' },
            { 'data': 'cap_pasajero' },
            { 'data': 'tipo_combustible' },
            { 'data': 'status_unidad' }
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "asc"]]
	});

	/****************NUEVA UNIDAD **********************
	funcion para capturar los daros de un nuevo rol *
	************************************************/
	let formUnidad = document.querySelector('#formUnidad');
	formUnidad.onsubmit = function (e) {
		e.preventDefault();
		let intIdUnidad = document.querySelector('#idUnidad').value;
		let srtIdUnidad = document.querySelector('#txtIdUnidad').value;
		let srtMarcaUnidad = document.querySelector('#listMarcaUnidad').value;
		let srtVimUnidad = document.querySelector('#txtVimUnidad').value;
		let srtModelo = document.querySelector('#listModelo').value;
		let srtFechaUnidad = document.querySelector('#txtFechaUnidad').value;
		let srtCapacidad = document.querySelector('#txtCapacidad').value;
		let srtTipoCombustible = document.querySelector('#txtTipoCombustible').value;
		//var radioOption = $('[name="radioStatus"]:checked').val();
		//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
		//usando un if reducido creamos un objeto del contenido en (request)
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Flota/setUnidad';
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formUnidad); 
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
					formUnidad.reset();
					notifi(objData.msg, 'success');
					//refrescamos el dataTable
					let tableFlotas = $('#tableFlota').DataTable();
					//recargamos la tabla 
					tableFlotas.ajax.reload(function () {
						//cada vez que se haga una accion se recarga la tabla y los botones
						// fntEditRol();
						// fntDelRol();
					});
				} else {
					notifi(objData.msg, 'error');
				}
			}
		};
	};
})
window.addEventListener('load', function () {
	fntUnidad();
},false)
/*************************
 * funcion para obtener los modelos y cargarlos en los select
 ************************/
function fntUnidad() {
	if (document.querySelector('#listUnidad')) {
		let ajaxUrl = base_url + "Flota/getSelectUnidad";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listUnidad').innerHTML = request.responseText;
				//seleccionando el primer option
				$("#listUnidad").selectpicker('render');
			}
		}

	}
}
/***
 * funcion cambiar el estado de la unidad
 */
function fntStatus(status,idUnidad) {
	//obtenemos el valor del atributo individual
	var status = status;
	Swal.fire({
		title: 'Estas seguro de cambiar el estado del usuario?',
		icon: 'info',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, cambiar!'
	}).then((result) => {
		if (result.isConfirmed) {
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Flota/statusUnidad/';
			//id del atributo lr que obtuvimos enla variable
			// let strData = [{"status" :status,"idUnidad": idUnidad}];
			let strData = new URLSearchParams("idUnidad="+idUnidad+"&status="+status);
			request.open("POST", ajaxUrl, true);
			//forma en como se enviara
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//enviamos
			request.send(strData);
			// request.send();
			request.onreadystatechange = function () {
				//comprobamos la peticion
				if (request.readyState == 4 && request.status == 200) {
					//convertir en objeto JSON
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						if (objData.estado == 1) {
							$(function () {
								var Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000
								})
								Toast.fire({
									icon: 'success',
									title: objData.msg
								})
							})
						} else {
							$(function () {
								var Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000
								})
								Toast.fire({
									icon: 'success',
									title: objData.msg
								})
							})
						}
						//Swal.fire('Proceso Exitoso!', objData.msg, 'success');
						// let tableRoles = $('#tableRol').DataTable();
						tableFlota.ajax.reload();
					} else {
						Swal.fire('Atencion!', objData.msg, 'error');
					}
				}
			}
		}
	})
}