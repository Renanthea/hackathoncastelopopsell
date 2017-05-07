(function () {
  var marker = null;
  var latlng = null;
  var API_KEY = "AIzaSyAefzKRkesd5paJ5myJCrhIp77SU0vDEac";


    var mapa  = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -23.533970, lng: -46.628870 },
      zoom: 8,
      panControl: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.RIGHT_CENTER
      },
      mapTypeControl: false,
      scaleControl: false,
      streetViewControl: false,
      overviewMapControl: true,
      rotateControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{
        featureType: 'poi',
        elementType: 'label.text',
        stylers: [{
          visibility: 'off'
        }]
      }, {
        featureType: 'transit',
        elementType: 'geometry',
        stylers: [{
          visibility: 'on'
        }]
      }]
    });



    var marker = new google.maps.Marker({
      position: { lat: 1.00, lng: 23 },
      map: mapa,
      title: 'UBS'
    });


  var marker2 = new google.maps.Marker({
    position: { lat: 14.00, lng: 53 },
    map: mapa,
    title: 'UBS'
  });
})();
