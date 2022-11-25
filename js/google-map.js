
//Google map
function initialize() {
 
  var image = 'images/map-marker.png'; //Map marker - image location
  
  var myLatlng = new google.maps.LatLng(53.407928, -2.990489); //Your location
  
  var mapOptions = {
    zoom: 14,
	scrollwheel: false,
    center: myLatlng,
	  mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    }
  }
  
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: image,
	  title:"Company name", //Map marker - Title
  });

}

google.maps.event.addDomListener(window, 'load', initialize);