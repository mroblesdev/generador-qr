$(function () {
    $('[data-toggle="tooltip"]').tooltip();
	
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		var target = $(e.target).attr("id");
		document.getElementById('tab-activo').value = target;
	});
})


$('#generar').on('click', function() {
	let datos = $('#form_qr').serialize();
	
	$.ajax({
		type: "POST",
		url: "includes/genera_qr.php",
		cache: false,
		data: datos
		}).fail(function(error) {
		$("#alert_placeholder").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span class="error-response">'+error.statusText+'</span></div>');
	})
	.done(function(data) {
		
		if ($('#trans-bg').prop('checked')) {
			$('.colorpickerback').colorpicker('disable')
		}
		$("#img-qr").attr("src", data);
		//$("#link-img").attr("href", msg);
		//document.getElementById('link-img').click();
		
		//var result = JSON.parse(msg);
		
	});
});

$('#nav-gps-tab').on('click', function() {
	cargarMapa();
});

function cargarMapa(){
	navigator.geolocation.getCurrentPosition(mostrarPosicion,showError); //Obtiene la posición
}

function mostrarPosicion(position)
{

	var divMap = document.getElementById("map");
	divMap.classList.add("embed-responsive-4by3");
	
	var divMensaje = document.getElementById("mensaje");
	divMensaje.innerHTML="Arrastra el marcador para obtener las coordenadas.";
	
	lat=position.coords.latitude; //Obtener latitud
	lon=position.coords.longitude; //Obtener longitud
	latlon=new google.maps.LatLng(lat, lon); //Crear objeto que representa un punto geográfico
	document.getElementById("gps_latitud").value = lat;
	document.getElementById("gps_longitud").value = lon;
	
	// Opciones para el mapa
	var myOptions={
		center:latlon,zoom:15, //Zoom
		mapTypeId:google.maps.MapTypeId.ROADMAP, //Tipo de mapa
		mapTypeControl:false, //Deshabilita el control de tipo de mapa
		navigationControlOptions:{ style:google.maps.NavigationControlStyle.SMALL } //Aspecto pequeño
	};
	var map=new google.maps.Map(document.getElementById("map"),myOptions); //Funcion que crea un mapa en la div .
	var marker=new google.maps.Marker({position:latlon,map:map,title:"Estás aquí!",draggable:true}); //Constructor para crear marcador de la posición
	
	google.maps.event.addListener(marker, 'dragend', function() {    
		map.setZoom(15);    
		map.setCenter(marker.getPosition());
		//document.getElementById("mapPos").value = marker.getPosition();
		document.getElementById("gps_latitud").value = marker.getPosition().lat();
		document.getElementById("gps_longitud").value = marker.getPosition().lng();						
	});
}

// Funcion para mostrar errores
function showError(error)
{
	var x=document.getElementById("errores");
	
	switch(error.code) 
	{
		case error.PERMISSION_DENIED:
		x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
		break;
		case error.POSITION_UNAVAILABLE:
		x.innerHTML="La información de la localización no esta disponible."
		break;
		case error.TIMEOUT:
		x.innerHTML="El tiempo de petición ha expirado."
		break;
		case error.UNKNOWN_ERROR:
		x.innerHTML="Ha ocurrido un error desconocido."
		break;
	}
}

