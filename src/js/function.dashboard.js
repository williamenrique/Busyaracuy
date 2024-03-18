document.addEventListener('DOMContentLoaded', function () {
	/************************************************* 
	 * creamos el objeto de envio para tipo de navegador
	 * hacer una validacion para diferentes navegadores y crear el formato de lectura
	 * y hacemos la peticion mediante ajax
	 * usando un if reducido creamos un objeto del contenido en(request)
	 *****************************************************/
	getUnidades()
	getOperativo()
	getDesincorporado()
	getMantenimiento()
	getInoperativo()
},false)
function getUnidades(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'Dashboard/getUnidades'
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true)
	//hacemos el envio al servidor
	request.send()
	//obtenemos los resultados y evaluamos
	var unidades = document.querySelector('.unidades')

	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidades').innerHTML = request.responseText
		}
	}
}
function getOperativo(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'Dashboard/getOperativo'
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true)
	//hacemos el envio al servidor
	request.send()
	//obtenemos los resultados y evaluamos
	var unidadOperativa = document.querySelector('.unidadOperativa')
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidadOperativa').innerHTML = request.responseText
		}
	}
}
function getInoperativo(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'Dashboard/getInoperativo'
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true)
	//hacemos el envio al servidor
	request.send()
	//obtenemos los resultados y evaluamos
	var unidadOperativa = document.querySelector('.unidadInoperativa')
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidadInoperativa').innerHTML = request.responseText
		}
	}
}
function getDesincorporado(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'Dashboard/getDesincorporado'
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true)
	//hacemos el envio al servidor
	request.send()
	//obtenemos los resultados y evaluamos
	var unidadesDesincorporadas = document.querySelector('.unidadesDesincorporadas')
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidadesDesincorporadas').innerHTML = request.responseText
		}
	}
}
function getMantenimiento(){
	let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
	let ajaxUrl = base_url + 'Dashboard/getMantenimiento'
	//prepara los datos por ajax preparando el dom
	request.open('GET', ajaxUrl, true)
	//hacemos el envio al servidor
	request.send()
	//obtenemos los resultados y evaluamos
	var unidadesMant = document.querySelector('.unidadesMant')
	request.onreadystatechange = function () { 
		if (request.readyState == 4 && request.status == 200) {
			document.querySelector('.unidadesMant').innerHTML = request.responseText
		}
	}
}


$(function () {
	//-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
	
	$.post( base_url + 'Dashboard/getCountUnidadStatus',
	function (data){
		var name = []
		var marks = []
		let content = JSON.parse(data)
		let totalFlota = parseInt(content[1].status) + parseInt(content[2].status) + parseInt(content[3].status) + parseInt(content[0].status)
		// operativa =  Math.round((parseInt(content[1].status / totalFlota * 100)))
		operativa =  content[1].status / totalFlota * 100
		mantenimiento = content[2].status / totalFlota * 100
		inoperativa =content[3].status / totalFlota * 100
		critica =  content[0].status / totalFlota * 100
		// desincorporada =  content[4].status / totalFlota * 100
		console.log(operativa.toFixed(2))
		var donutData        = {
			labels: [
					'Operativas %',
					'Mantenimiento %',
					'inoperativa %',
					'Criticas %',
				],
				datasets: [
				{
					data: [operativa.toFixed(2) , mantenimiento.toFixed(2) , inoperativa.toFixed(2) , critica.toFixed(2)],
					backgroundColor : ['#00a65a','#f39c12','#d2d6de','#f56954'],
				}
			]
		}
		var donutOptions     = {
			maintainAspectRatio : false,
			responsive : true,
		}
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		new Chart(donutChartCanvas, {
			type: 'doughnut',
			data: donutData,
			options: donutOptions
		})
	})
})