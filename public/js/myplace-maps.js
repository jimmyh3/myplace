var geocoder;
var latlong;
var mapOptions;

function initMaps() {
    geocoder = new google.maps.Geocoder();
    latlong = new google.maps.LatLng( 37.7219, -122.4782);
    mapOptions = {
        zoom: 12,
        center: latlong,
        mapTypeControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        // TODO more options here
    };
}

function createMap( id, zipcode) {
    var mapCanvas = $('#map'+id)[0];
    zipcode = zipcode.toString();
    
    //alert( "Apt id: " + id + "\nZipcode: " + zipcode);
    
    var map = new google.maps.Map( mapCanvas, mapOptions);
    if( geocoder) {
        geocoder.geocode( { 'address': zipcode}, function( results, status) {
            if( status == google.maps.GeocoderStatus.OK) {
                if( status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                    setTimeout( function() { map.setCenter( results[ 0].geometry.location);}, 500);
                    
                    var circle = new google.maps.Circle({
                        map: map,
                        radius: 1414, // 1.5 miles
                        fillColor: '#b300b3', // maybe change color
                        center: results[ 0].geometry.location
                    });
                    
                    google.maps.event.addListenerOnce( map, "idle", function() {
                        google.maps.event.trigger( map, "resize"); 
                     });
                } else {
                    console.log( "No results");
                }
            } else {
                console.log( "Geocode error: " + status);
            }
        });
    } else { // geocoder not initialized
        console.log( "Geocoder not initilized");
    }
    
    //$('#openApt'+id).unbind('click');
}


