var tableMantenimiento;
document.addEventListener('DOMContentLoaded', function () {
	tableMantenimiento = $('#tableMantenimiento').DataTable({
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
			"url": ' ' + base_url + 'Flota/listUnidadMantenimiento',
			"dataSrc": ''
		},
		"columns": [
			{ 'data': 'id_unidad' },
			{ 'data': 'fecha_entrada' },
			{ 'data': 'nomb_mecanico' },
            { 'data': 'km_unidad' },
            { 'data': 'tipo_mantenimiento' },
            { 'data': 'diagnostico' },
			{ 'data': 'recomendacion' },
			{ 'data': 'fecha_salida' },
			{ 'data': 'opciones' }
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "asc"]]
	});

	/***************INGRESAR UNIDAD EN MANTENIMIENTO ***************************/
	if(document.querySelector('#formIngMantUnidad')){
		let formIngMantUnidad = document.querySelector('#formIngMantUnidad');
		formIngMantUnidad.onsubmit = function (e) {
			e.preventDefault();
			let intIdUnidad = document.querySelector('#listUnidad').value;
			let srtRutaUnidad = document.querySelector('#txtRutaUnidad').value;
			let srtOperador = document.querySelector('#txtOperador').value;
			let srtMecanico = document.querySelector('#txtMecanico').value;
			let srtKm = document.querySelector('#txtKilometraje').value;
			let srtFechaEntrada = document.querySelector('#txtFechaEntrada').value;
			let srtHoraEntrada = document.querySelector('#txtHoraEntrada').value;
			let srtDisgnostico = document.querySelector('#txtDiagnostico').value;
			let srtRecomendacion = document.querySelector('#txtRecomendacion').value;
			var radioOption = $('[name="radioTipo"]:checked').val();
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			//usando un if reducido creamos un objeto del contenido en (request)
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Flota/setIMantenimiento';
			//creamos un objeto del formulario con los datos haciendo referencia a formData
			let formData = new FormData(formIngMantUnidad); 
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
						formIngMantUnidad.reset();
						notifi(objData.msg, 'success');
						//refrescamos el dataTable
						let tableMantenimiento = $('#tableMantenimiento').DataTable();
						//recargamos la tabla 
						tableMantenimiento.ajax.reload(function () {
							//cada vez que se haga una accion se recarga la tabla y los botones
						});
					} else {
						notifi(objData.msg, 'error');
					}
				}
			}
		}
	}
})

window.addEventListener('load', function () {
	fntUnidad()
},false)
/***************funcion para listar las unidades y cargarlos en los select para ingresar unidad en mantenimiento ***************/
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