var marker1;
navigator.geolocation.getCurrentPosition(function(location) {
  var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

  var mymap = L.map('myMap').setView(latlng, 14)
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 18,
}).addTo(mymap);

  marker1 = L.marker(latlng).addTo(mymap);
  mymap.on('click', function (e) {
    if (marker1) {
      mymap.removeLayer(marker1);
    }
    let latLng = mymap.mouseEventToLatLng(e.originalEvent);
    marker1 = new L.marker([latLng.lat, latLng.lng],13.5).addTo(mymap);
  });

});
