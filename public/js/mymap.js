function initMap() {

    
    var data = $('#src').val();
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    //alert(data);
    // Map options
    var options = {
        zoom: 2,
        center: {lat: 23.777176, lng: 90.399452}
    };

    // New map
    var map = new google.maps.Map(document.getElementById('map'), options);

    directionsDisplay.setMap(map);

    var onChangeHandler = function() {
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    };

    //document.getElementById('end').addEventListener('change', onChangeHandler);

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };


            addMrker(pos);

            function addMrker(coords) {
                var marker = new google.maps.Marker({
                    position: coords,
                    map: map
                });
            }


            
            // calculate distance
        
            
            var origin = pos;
            var destination = data;
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        
        // get distance results
        function callback(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    console.log(response.rows[0].elements[0].distance);
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;
                    $('#in_mile').text(distance_in_mile.toFixed(2));
                    $('#in_kilo').text(distance_in_kilo.toFixed(2));
                    $('#duration_text').text(duration_text);
                    $('#duration_value').text(duration_value);
                    $('#from').text(origin);
                    $('#to').text(destination);
                    $('#tsfrom').text(origin);
                    $('#tsto').text(destination);
                }
            }
        }
        
            var geocoder = new google.maps.Geocoder();
            var address = data;

            geocoder.geocode({'address': address}, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    // alert(latitude);
                }
            });



            // direction
            var start = pos;
            var end = address;
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };

            

            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    var myRoute = response.routes[0];
                    var txtDir = '';
                    for (var i = 0; i < myRoute.legs[0].steps.length; i++) {
                        txtDir += myRoute.legs[0].steps[i].instructions + "<br />";
                    }
                    document.getElementById('directions').innerHTML = txtDir;
                }
            });

             

        }, function() {
            //handleLocationError(true, infoWindow, map.getCenter());
        });

        

    } else {
        // Browser doesn't support Geolocation
        //handleLocationError(false, infoWindow, map.getCenter());
    }

    //Marker
//                addMrker({lat: 23.777176, lng: 90.399452});
//                addMrker({lat: 23.901041, lng: 90.408822});
//                addMrker({lat: 26.270871, lng: 88.595175});
//                addMrker({lat: 26.270871, lng: 88.595175});
//
//                function addMrker(coords) {
//                    var marker = new google.maps.Marker({
//                        position: coords,
//                        map: map
//                    });
//                }




}