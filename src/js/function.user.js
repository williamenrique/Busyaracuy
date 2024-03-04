let tableUser;
let tableUserHigh;
var tableUserPend;
var boxUserHigh = document.querySelector('.box_user_high');
var boxUserPend = document.querySelector('.box_user_pend');
document.addEventListener('DOMContentLoaded', function () {
	tableUser = $('#tableUser').DataTable({
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
			"url": ' ' + base_url + 'Usuarios/getUsers',
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
			{ 'data': 'user_status' },
			{ 'data': 'opciones' }
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "asc"]]
	});

	$('#tableUser').DataTable();

	/*************
	 * cargamos la tabla de los usuarios dados de alta
	 */
	if (boxUserHigh) {
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

		/*************
	 * cargamos la tabla de los usuarios pendientes
	 */
	if (boxUserPend) {
		// tableUserPend = $('#tableUserPend').DataTable({
		// 		"language": {
		// 		"sProcessing": "Procesando...",
		// 		"sLengthMenu": "Mostrar _MENU_ registros",
		// 		"sZeroRecords": "No se encontraron resultados",
		// 		"sEmptyTable": "Ningún dato disponible",
		// 		"sInfo": "Total de _TOTAL_ Registros",
		// 		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		// 		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		// 		"sInfoPostFix": "",
		// 		"sSearch": "Buscar:",
		// 		"sUrl": "",
		// 		"sInfoThousands": ",",
		// 		"sLoadingRecords": "Cargando...",
		// 		"oPaginate": {
		// 			"sFirst": "Primero",
		// 			"sLast": "Último",
		// 			"sNext": "Siguiente",
		// 			"sPrevious": "Anterior"
		// 		},
		// 		"oAria": {
		// 			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
		// 			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		// 		},
		// 		"buttons": {
		// 			"copy": "Copiar",
		// 			"colvis": "Visibilidad"
		// 		}
		// 	},
		// 	"responsive": {
		// 		"name": "medium",
		// 		"width": "1188"
		// 	},
		// 	"ajax": {
		// 		"url": ' ' + base_url + 'Usuarios/getUserPend',
		// 		"dataSrc": ''
		// 	},
		// 	"columns": [
		// 		{ 'data': 'user_id' },
		// 		{ 'data': 'user_nick' },
		// 		{ 'data': 'user_nombres' },
		// 		{ 'data': 'user_apellidos' },
		// 		{ 'data': 'user_email' },
		// 		{ 'data': 'user_tlf' },
		// 		{ 'data': 'rol_name' },
		// 		{ 'data': 'user_status' }
		// 	],
		// 	"resonsieve": "true",
		// 	"bDestroy": true,
		// 	"iDisplayLength": 10,
		// 	"order": [[0, "asc"]]
		// });
	}
	// $('#tableUserPend').DataTable();
	/*****************
	 * hacemos el envio del formulario para crear usuario
	 * primeramente validamos si existe el  formulario ya que se esta usando el mismo
	 * scrript para dos archivos diferentes
	 */
	if (document.querySelector('#formUsuario')) {
		var formUser = document.querySelector('#formUsuario');
		//agregar el evento al boton del formulario
		formUser.onsubmit = function (e) {
			e.preventDefault();
			//obenemos todos los valores del formulario  txtIdentificacion
			let intIngreso =  document.querySelector('#ingreso').value;
			var strIdentificacion = document.querySelector('#txtIdentificacion').value;
			var strTxtNombre = document.querySelector('#txtNombres').value;
			var strtxtApellidos = document.querySelector('#txtApellidos').value;
			var intTxtTlf = document.querySelector('#txtTlf').value;
			var strTxtEmail = document.querySelector('#txtEmail').value;
			var strListStatus = document.querySelector('#listStatus').value;
			var intlistRolId = document.querySelector('#listRolId').value;
			/*************************************************
			* creamos el objeto de envio para tipo de navegador
			* hacer una validacion para diferentes navegadores y crear el formato de lectura
			* y hacemos la peticion mediante ajax
			* usando un if reducido creamos un objeto del contenido en(request)
			*****************************************************/
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Usuarios/setUser';
			//creamos un objeto del formulario con los datos haciendo referencia a formData
			let formData = new FormData(formUser );
			//prepara los datos por ajax preparando el dom
			request.open('POST', ajaxUrl, true);
			//envio de datos del formulario que se almacena enla variable
			request.send(formData);
			//obtenemos los resultados
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					//obtenemos los datos y convertimos en JSON
					let objData = JSON.parse(request.responseText);
					//leemos el ststus de la respuesta
					if (objData.status) {
						notifi(objData.msg, 'success');
						$("#modalUser").modal("hide");
						formUser.reset();
						tableUser.ajax.reload();
					} else {
						notifi(objData.msg, 'error');
					}
				}
			}
		}
	}
}, false);
/***********
 * cargamos las funciones al iniciar el documento
 */
window.addEventListener('load', function () {
	fntRolesUsuarios();
	fntUserPend();
},false)
/*************************
 * funcion para obtener los roles de usuarios
 ************************/
function fntRolesUsuarios() {
	if (document.querySelector('#listRolId')) {
		let ajaxUrl = base_url + "Roles/getSelectRoles";
		//creamos el objeto para os navegadores
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		//abrimos la conexion y enviamos los parametros para la peticion
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//option obtenidos del controlador
				document.querySelector('#listRolId').innerHTML = request.responseText;
				//seleccionando el primer option
				document.querySelector('#listRolId').value = 1;
				$("#listRolId").selectpicker('render');
			}
		}

	}
}
/****************
 * funcion para mostrar el modal del usurio con los datos
 */
function fntViewUser(idUser) {
	var idUser = idUser;
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl = base_url + "Usuarios/getUser/" + idUser;
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		//todo va bien
		if (request.readyState == 4 && request.status == 200) {
			//creamos el objeto de los datos obtenidos del controlador
			var objData = JSON.parse(request.responseText);
			//evaluamos

			if (objData.status) {
				var estadoUser = objData.data.user_status == 1 ?
				'<span class="badge badge-success">Activo</span>' :
				'<span class="badge badge-warning">Inactivo</span>';
				document.querySelector("#celIdentificacion").innerHTML = objData.data.user_ci ;
				document.querySelector("#nickname").innerHTML = objData.data.user_nick ;
				document.querySelector("#celNombres").innerHTML = objData.data.user_nombres ;
				document.querySelector("#celApellidos").innerHTML = objData.data.user_apellidos ;
				document.querySelector("#celEmail").innerHTML = objData.data.user_email ;
				document.querySelector("#celEstado").innerHTML = estadoUser ;
				document.querySelector("#celTelefono").innerHTML = objData.data.user_tlf ;
				document.querySelector("#celTipoUsuario").innerHTML = objData.data.rol_name ;
				document.querySelector("#celFechaReg").innerHTML = objData.data.fecha_reg ;
				$("#modalViewUser").modal("show");
			} else {
				Swal.fire('error', objData.msg);
			}
		}
	}
}
/****************
 * funcion para mostrar el modal del usurio con los datos y poder editarlo
 */
function fntEditUser(idUser) {
	//cambiamos apariencia del modal
	document.querySelector('#idUsuario').value = '';//limpiar el value del input hiden del modal
	document.querySelector('#titleModal').innerHTML = 'Actualizar usuario';
	document.querySelector('.modal-header').classList.replace('headerRegistrer', 'headerUpdate');
	document.querySelector('#btnActionForm').classList.replace('btn-primary', 'btn-info');
	document.querySelector('#btnText').innerHTML = 'Actualizar';

	//nos referimos a ese elmento aque lo hemos dado click
	var idUser = idUser;
	//creamos el objeto para os navegadores
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl = base_url + "Usuarios/getUser/" + idUser;
	//abrimos la conexion y enviamos los parametros para la peticion
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				document.querySelector('#idUsuario').value = objData.data.user_id;
				document.querySelector('#txtIdentificacion').value = objData.data.user_ci;
				document.querySelector('#txtNombres').value = objData.data.user_nombres;
				document.querySelector('#txtApellidos').value = objData.data.user_apellidos;
				document.querySelector('#txtTlf').value = objData.data.user_tlf;
				document.querySelector('#txtEmail').value = objData.data.user_email;
				document.querySelector('#listRolId').value = objData.data.rol_id;
				$('#listRolId').selectpicker('render');
				//condicion para el status
				if (objData.data.user_status == 1) {
					document.querySelector('#listStatus').value = 1;
				} else {
					document.querySelector('#listStatus').value = 2;
				}
				$('#listStatus').selectpicker('render');
			}
		}
		$("#modalUser").modal("show");
	}
}
/****************************
 * funcion boton eliminar usuario
 ****************************/
function fntDelUser(idUser) {
	//obtenemos el valor del atributo individual
	var idUser = idUser;
	Swal.fire({
		title: 'Estas seguro de eliminar el usuario?',
		text: "No podra ser revertido el proceso!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, eliminar!'
	}).then((result) => {
		if (result.isConfirmed) {
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Usuarios/delUser/' + idUser;
			//id del atributo lr que obtuvimos enla variable
			let strData = "idUser=" + idUser;
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
						//Swal.fire('Proceso Exitoso!', objData.msg, 'success');
						let tableRoles = $('#tableRol').DataTable();
						tableUser.ajax.reload(function () {
							//cada vez que se haga una accion se recarga la tabla y los botones
							fntRolesUsuarios();
						});
					} else {
						Swal.fire('Atencion!', objData.msg, 'error');
					}
				}
			}
		}
	})
}
/****************
 * Cargar el modal con sus respectiva informacion para nuevo
 */
function openModal() {
	document.querySelector('#idUsuario').value = '';//limpiar el value del input hiden del modal
	document.querySelector('#titleModal').innerHTML = 'Nuevo Usuario';
	document.querySelector('.modal-header').classList.replace('headerUpdate', 'headerRegistrer');
	document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
	document.querySelector('#btnText').innerHTML = 'Guardar';
	document.querySelector('#formUsuario').reset();
	$("#modalUser").modal("show");
}
/*************
 * cambiar status
 */
function fntStatus(status,idUser) {
	//obtenemos el valor del atributo individual
	var status = status;
	Swal.fire({
		title: 'Estas seguro de cambiar el estado del usuario?',
		// text: "No podra ser revertido el proceso!",
		icon: 'info',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, cambiar!'
	}).then((result) => {
		if (result.isConfirmed) {
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Usuarios/statusUser/';
			//id del atributo lr que obtuvimos enla variable
			// let strData = [{"status" :status,"idUser": idUser}];
			let strData = new URLSearchParams("idUser="+idUser+"&status="+status);
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
							if (boxUserHigh) {
								tableUserHigh.ajax.reload();
							}
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
						let tableRoles = $('#tableRol').DataTable();
						tableUser.ajax.reload();
					} else {
						Swal.fire('Atencion!', objData.msg, 'error');
					}
				}
			}
		}
	})
}
/*****************
 * actualizar perfil
 */
function compararPass() {
	if (strPass != strPassC) {
		Swal.fire('Password  no coinciden!', 'Oops...', 'info');
		return false;
	}
	var strPass = document.querySelector('#textPass').value;
	var strPassC = document.querySelector('#textPassConfirm').value;
}
//actualizar datos
if (document.querySelector('#formDatos')) {
	var	formDatos = document.querySelector('#formDatos');
	formDatos.onsubmit = function (e) {
		e.preventDefault();
		/*************************************************
		* creamos el objeto de envio para tipo de navegador
		* hacer una validacion para diferentes navegadores y crear el formato de lectura
		* y hacemos la peticion mediante ajax
		* usando un if reducido creamos un objeto del contenido en(request)
		*****************************************************/
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Usuarios/UpdatePerfil';
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formDatos );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados y evaluamos
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
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
					location.reload();
					//Swal.fire('Usuario', objData.msg, 'success');
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: objData.msg
					})
				}
			}
		}
	}
}
//crear usuario
if (document.querySelector('#formNick')) {
	var	formNick = document.querySelector('#formNick');
	formNick.onsubmit = function (e) {
		e.preventDefault();
		/*************************************************
		* creamos el objeto de envio para tipo de navegador
		* hacer una validacion para diferentes navegadores y crear el formato de lectura
		* y hacemos la peticion mediante ajax
		* usando un if reducido creamos un objeto del contenido en(request)
		*****************************************************/
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Usuarios/UpdatePerfil';
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formNick );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados y evaluamos
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
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
					location.reload();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: objData.msg
					})
				}
			}
		}
	}
}
//cambiar password
if (document.querySelector('#formPass')) {
	var	formPass = document.querySelector('#formPass');
	formPass.onsubmit = function (e) {
		e.preventDefault();
		/*************************************************
		* creamos el objeto de envio para tipo de navegador
		* hacer una validacion para diferentes navegadores y crear el formato de lectura
		* y hacemos la peticion mediante ajax
		* usando un if reducido creamos un objeto del contenido en(request)
		*****************************************************/
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Usuarios/UpdatePerfil';
		//creamos un objeto del formulario con los Pass haciendo referencia a formData
		let formData = new FormData(formPass );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados y evaluamos
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
					// $("#modalUser").modal("hide");
					// formUser.reset();
					Swal.fire('Usuario', objData.msg, 'success');
					// tableUser.ajax.reload();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: objData.msg
					})
				}
			}
		}
	}
}

/****
 * cargar de usuarios pendientes
 */

function fntUserPend(){
	if (document.querySelector('.box_user_pend')) {
		var box_user_pend = document.querySelector('.box_user_pend');
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Usuarios/getUserPend';
		//creamos un objeto del formulario con los Pass haciendo referencia a formData
		let formData = new FormData(formPass );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados y evaluamos
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				//let objData = JSON.parse(request.responseText);
				box_user_pend.innerHTML = request.responseText;
			}
		}
	}
}
/****
 * cargar los roles y el nick del usuario para asociarlo
 */
function cargarRol(nick, idUser) {
	var colRol = document.querySelector(".colRol");
	var getRoles = document.querySelector(".getRoles");
	var txtIdUser = document.querySelector("#txtIdUser").value = idUser;
	// var titleCard = document.querySelector("#titleCard").innerHTML = nick;
	var cardText = document.querySelector("#cardText").innerHTML = "Seleccione un rol para "+ nick;
	colRol.style.display = "block";
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Usuarios/getRoles';
	//prepara los datos por ajax preparando el dom
	request.open('POST', ajaxUrl, true);
	//envio de datos del formulario que se almacena enla variable
	request.send();
	//obtenemos los resultados y evaluamos
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//obtenemos los datos y convertimos en JSON
			getRoles.innerHTML= request.responseText;
		}
	}
}
if (document.querySelector('#formRolAsignar')) {
	var formRolAsignar = document.querySelector('#formRolAsignar');
	//agregar el evento al boton del formulario
	formRolAsignar.onsubmit = function (e) {
		e.preventDefault();
		var txtIdUser = document.querySelector("#txtIdUser").value;
		/*************************************************
		* creamos el objeto de envio para tipo de navegador
		* hacer una validacion para diferentes navegadores y crear el formato de lectura
		* y hacemos la peticion mediante ajax
		* usando un if reducido creamos un objeto del contenido en(request)
		*****************************************************/
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + 'Usuarios/asignarRol';
		//creamos un objeto del formulario con los datos haciendo referencia a formData
		let formData = new FormData(formRolAsignar );
		//prepara los datos por ajax preparando el dom
		request.open('POST', ajaxUrl, true);
		//envio de datos del formulario que se almacena enla variable
		request.send(formData);
		//obtenemos los resultados
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				//obtenemos los datos y convertimos en JSON
				let objData = JSON.parse(request.responseText);
				//leemos el ststus de la respuesta
				if (objData.status) {
					notifi(objData.msg, 'success');
					document.querySelector(".colRol").style.display = "none";
					formRolAsignar.reset();
					fntUserPend();
				} else {
					notifi(objData.msg, 'error');
				}
			}
		}
	}
}



function fntActivarUser(idUser) {
	var box= document.querySelector('.box_user_pend');
	var formActivar = document.querySelector('#formActivar');
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + 'Usuarios/activarUser';
	//creamos un objeto del formulario con los Pass haciendo referencia a formData
	let formData = new FormData(formActivar );
	//prepara los datos por ajax preparando el dom
	request.open('POST', ajaxUrl, true);
	//envio de datos del formulario que se almacena enla variable
	request.send(formData);
	//obtenemos los resultados y evaluamos
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			//obtenemos los datos y convertimos en JSON
			let objData = JSON.parse(request.responseText);
			// evaluamos el resultado
			if (objData.status) {
				notifi(objData.msg, 'success');
				fntUserPend();
			} else {
				notifi(objData.msg, 'error');
			}
		}
	}
}