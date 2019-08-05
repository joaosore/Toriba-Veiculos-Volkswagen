var map, directionsService, directionsDisplay, autoSrc, autoDest, pinA, pinB;
var markers = [];

export function init_maps()
{
	get_data();
	get_script();
}

$(window).on( "load", function()
{	
	init_maps();
});

function get_script()
{	
	startMaps();
}

function get_data()
{
	var api = '/wp-json/wp/v2/lojas';
	$.ajax({
		type: "GET",
		url: api,
		dataType: "json",
		success: function(response)
		{
			setPins(response);
		},
		error: function()
		{

		}
	});

}

function startMaps()
{	
	mapSetup();
	invokeEvents();
}

function Selectors()
{
	var $Selectors = {
		mapCanvas: jQuery('#map')[0],
		dirSrc: jQuery('#dirSrc'),
		dirDst: jQuery('#dirDst'),
		getDirBtn: jQuery('.btn-rota'),
		useGPSBtn: jQuery('#useGPS'),
		paneResetBtn: jQuery('.sair-mapa')
	};
	return $Selectors;
}

function autoCompleteSetup() {
	autoDest = new google.maps.places.Autocomplete(Selectors().dirDst[0]);
} // autoCompleteSetup Ends

function directionsSetup() {
	directionsService = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer({
		suppressMarkers: true
	});
}

function trafficSetup() {
	// Creating a Custom Control and appending it to the map
	var controlDiv = document.createElement('div'),
	controlUI = document.createElement('div'),
	trafficLayer = new google.maps.TrafficLayer();

	jQuery(controlDiv).addClass('gmap-control-container').addClass('gmnoprint');
	jQuery(controlUI).text('Traffic').addClass('gmap-control');
	jQuery(controlDiv).append(controlUI);

	// Traffic Btn Click Event	  
	google.maps.event.addDomListener(controlUI, 'click', function() {
		if (typeof trafficLayer.getMap() == 'undefined' || trafficLayer.getMap() === null) {
			jQuery(controlUI).addClass('gmap-control-active');
			trafficLayer.setMap(map);
		} else {
			trafficLayer.setMap(null);
			jQuery(controlUI).removeClass('gmap-control-active');
		}
	});
	map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);
} // trafficSetup Ends

function mapSetup() {

	var centralizar = {lat: 0, lng: 0};
	map = new google.maps.Map(Selectors().mapCanvas, {
		center: new google.maps.LatLng(0, 0),
        zoom: 13,
        disableDefaultUI: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,

        panControl: true,
        mapTypeControl: false,
        panControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        scaleControl: false,
        streetViewControl: false,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },

		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	autoCompleteSetup();
	directionsSetup();
} // mapSetup Ends 


function setMapOnAll(map) {
	for (var i = 0; i < markers.length; i++) {
	  markers[i].setMap(map);
	}
}

function clearMarkers() {
	setMapOnAll(null);
}

function setPins(arr)
{
	var bounds = new google.maps.LatLngBounds();
	arr.forEach(function(currentValue, index){
		var image = currentValue.acf.icone_maps.sizes.pin_maps;
		var item = new google.maps.LatLng(currentValue.acf.endereco_maps.lat, currentValue.acf.endereco_maps.lng);
		var marker = new google.maps.Marker({
			position: item,
			map: map,
			icon: image
		});
		markers.push(marker);
	 	bounds.extend(item);
	});
    map.fitBounds(bounds);
}

function directionsRender(source, destination) {

	var markerA = new google.maps.MarkerImage($('#dirSrc').find(':selected').data('img'));
	var markerB = new google.maps.MarkerImage($('#pin_voce').val());

	directionsDisplay.setMap(map);

	var request = {
		origin: source,
		destination: destination,
		provideRouteAlternatives: false,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
	};

	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
			var _route = response.routes[0].legs[0];
			pinA = new google.maps.Marker({ position: _route.start_location, map: map, icon: markerA }),
			pinB = new google.maps.Marker({ position: _route.end_location, map: map, icon: markerB });
		}
	});
} // directionsRender Ends

function fetchAddress(p) {
	var Position = new google.maps.LatLng(p.coords.latitude, p.coords.longitude),
	Locater = new google.maps.Geocoder();

	Locater.geocode({ 'latLng': Position }, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var _r = results[0];
			Selectors().dirSrc.val(_r.formatted_address);
		}
	});
} // fetchAddress Ends

function invokeEvents() {
	// Get Directions
	Selectors().getDirBtn.on('click', function(e) {
		e.preventDefault();
		var dirDst = $('#dirDst').val().length;
		var dirSrc = $('#dirSrc').val().length;
		if(dirDst > 0 && dirSrc > 0)
		{
			clearMarkers();
			$(this).hide();
			$('.sair-mapa').show();
			$('#dirDst').removeClass('error');
			$('#dirSrc').removeClass('error');
			var src = Selectors().dirSrc.val(),
			dst = Selectors().dirDst.val();
			if(dst.length > 0) {
				$('.formulario').addClass('mapsSearch');
				directionsRender(src, dst);
			}
		}
		else
		{
			if(dirDst == 0)
			{
				$('#dirDst').addClass('error');
			}
			if(dirSrc == 0)
			{
				$('#dirSrc').addClass('error');
			}
		}
	});

	// Reset Btn
	Selectors().paneResetBtn.on('click', function(e) {
		Selectors().dirDst.val('');
		get_data();
		$(this).hide();
		$('.btn-rota').show();
		if (pinA) pinA.setMap(null);
		if (pinB) pinB.setMap(null);
		directionsDisplay.setMap(null);
		$('.formulario').removeClass('mapsSearch');
		mapSetup();
	});

	// Use My Location / Geo Location Btn
	// Selectors.useGPSBtn.on('click', function(e) {
	// 	if (navigator.geolocation) {
	// 		navigator.geolocation.getCurrentPosition(function(position) {
	// 			fetchAddress(position);
	// 		});
	// 	}
	// });
} //invokeEvents Ends 


$('.box-form').on('keyup keypress', function(e) {
	var keyCode = e.keyCode || e.which;
	if (keyCode === 13) { 
		e.preventDefault();
		return false;
	}
});