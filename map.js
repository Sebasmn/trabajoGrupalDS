var marker1;


var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};

function success(pos) {
  var crd = pos.coords;

  console.log('Your current position is:');
  console.log('Latitude : ' + crd.latitude);
  console.log('Longitude: ' + crd.longitude);
  console.log('More or less ' + crd.accuracy + ' meters.');
};

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
};

navigator.geolocation.getCurrentPosition(success, error, options);




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
