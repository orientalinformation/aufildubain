var markers2 = [];
        var circles = [];

        function initMap() {
                var geocoder;
                var center = {lat: 48.864716, lng: 2.349014};
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: center
            });

            var input = document.getElementById('zip');
            var autocomplete = new google.maps.places.Autocomplete(input);
           
            var markers = [];
            infoWindow = new google.maps.InfoWindow;
            
            geocoder = new google.maps.Geocoder();

            $(document).keypress(function(e) {
                
                if(e.which == 13) {
                    var zip = $('#zip').val();    

                    if( zip.length < 1 ){
                    
                        $('#zip').attr('placeholder',"Vous n'avez pas entré de valeur");      

                    } else {
                        
                        $('.address').html('');
                        codeZip();
                    }
                }
            });

            $('.search-zip').click(function(){
               
                var zip = $('#zip').val();
                if( zip.length < 1 ){

                    $('#zip').attr('placeholder',"Vous n'avez pas entré de valeur");      

                } else {

                    $('.address').html('');
                    codeZip();
                    
                }
            });

            function codeZip() {

                deleteMarkers();
                removeAllcircles();
                
                var zip = document.getElementById('zip').value;
                geocoder.geocode( { 'address': zip}, function(results, status) {
                    if (status == 'OK') {
                        map.setCenter(results[0].geometry.location);
                        map.setZoom(10);

                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });

                        var circle = results[0].geometry.location;
                        var cityCircle = new google.maps.Circle({
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35,
                            map: map,
                            center: circle,
                            radius: 30000
                        });

                        markers2.push(marker);
                        circles.push(cityCircle);
                        
                        var gps = circle.toString().split(",");
                        
                        var lat = gps[0].toString().split("(");
                            lat = lat[1];

                        var lng = gps[1].toString().split(")");
                            lng = lng[0];    

                        var count = 0;

                        @foreach($stores->all() as $store)
                            <?php 
                                $gps = $store->getCoordinates();
                                $lat2 = $gps[0]['lat'];
                                $lng2 = $gps[0]['lng'];
                            ?>
                        var lat2 = '{{ $lat2 }}';
                        var lng2 = '{{ $lng2 }}';
                        var na = '{{ $store->name }}';

                            var dis = distanceTwoPoints(lat, lng, lat2, lng2 );
                            if( dis <= 30000 ){
                                var results = '<p class="name"><strong>{{$store->name}}</strong></p>                            <p>                                {{$store->address}}<br/>                                {{$store->address_2}}<br/>                                {{$store->zip}} {{$store->city}}                            </p>                            <p>                                Tel: {{$store->phone}}<br/>                                Fax: {{$store->fax}}                            </p>                            <p></p>                            <a href="{{ route('store.view', [$store->slug] )}}" class="btn-o more-store"> VOIR LA FICHE </a>                    <hr/>   '; 
                            count += 1;

                            $('.address').prepend(results);        
                            
                        }    
                        @endforeach   
                        $('#count').text(count);
                    } else {
                        $('#zip').val('');
                        $('#count').text(0);
                        $('#zip').attr('placeholder',"RÉSULTATS ZÉRO");
                    }
                });
            }
            
            $('#geo').click(function(){ 
                    
                    deleteMarkers();
                    removeAllcircles();

                    $('.address').html('');
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                          lat: position.coords.latitude,
                          lng: position.coords.longitude
                    };
                                       
                    infoWindow.open(map);
                    map.setCenter(pos);
                    map.setZoom(10);
                    var markerGeo = new google.maps.Marker({
                            position: {lat:position.coords.latitude, lng: position.coords.longitude},
                            map: map,
                    });

                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    var cityCircle = new google.maps.Circle({
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35,
                            map: map,
                            center: pos,
                            radius: 30000
                        });
                    
                    markers2.push(markerGeo);
                    circles.push(cityCircle);

                    var count = 0;
                    @foreach($stores->all() as $store)
                        <?php 
                            $gps = $store->getCoordinates();
                            $lat2 = $gps[0]['lat'];
                            $lng2 = $gps[0]['lng'];
                        ?>
                    var lat2 = '{{ $lat2 }}';
                    var lng2 = '{{ $lng2 }}';
                    

                    var dis = distanceTwoPoints(lat, lng, lat2, lng2 );
                    if( dis <= 30000 ){
                        var results = '<p class="name"><strong>{{$store->name}}</strong></p>                            <p>                                {{$store->address}}<br/>                                {{$store->address_2}}<br/>                                {{$store->zip}} {{$store->city}}                            </p>                            <p>                                Tel: {{$store->phone}}<br/>                                Fax: {{$store->fax}}                            </p>                            <p></p>                            <a href="{{ route('store.view', [$store->slug] )}}" class="btn-o more-store"> VOIR LA FICHE </a>                    <hr/>   '; 
                    count += 1;

                    $('.address').prepend(results);        
                             
                        
                    }
                    @endforeach        
                    $('#count').text(count);

                           
                });
            });
            
            @foreach($stores->all() as $store)
                <?php 
                    $gps = $store->getCoordinates();
                    $lat = $gps[0]['lat'];
                    $lng = $gps[0]['lng'];

                ?>

                var marker{{$store->id}} = new google.maps.Marker({
                            position: {lat: <?=$lat;?>, lng: <?=$lng;?>},
                            map: map,
                            icon :"/images/picto-map.png",
                           
                        });

                var INFOWINDOW = new google.maps.InfoWindow();

                google.maps.event.addListener(marker{{$store->id}},"click", function () {
                                            INFOWINDOW.setContent('<div class=\"des-map\"><b>{{ $store->name }}</b><br />{{ $store->address }} <br /> {{$store->zip}} {{$store->city}}<br /><a class=\"btn-o \" rel=\"#select\" href=\"{{ route('store.view', [$store->slug]) }}\"><span><span><span><span>Voir la fiche</span></span></span></span></a><br /><br /><br /></div>');
                                            INFOWINDOW.open(map, marker{{$store->id}});
                                            return false;
                                        });

                markers.push(marker{{$store->id}});
            @endforeach

            
            var stylesCo = [
                {
                    textColor: "white",
                    textSize: "14",
                    url :"/images/picto-map.png",
                    width: 28,
                    height: 33
                }
            ];
            var markerCluster = new MarkerClusterer(map, markers,{styles: stylesCo});
      
        }

    function distanceTwoPoints( lat1, lng1, lat2, lng2) { 
        var R = 6371;
        var dLat = (lat2-lat1)* Math.PI / 180;
        var dLon = (lng2-lng1)* Math.PI / 180;
        var dLat1 = (lat1)* Math.PI / 180;
        var dLat2 = (lat2)* Math.PI / 180;
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(dLat1) * Math.cos(dLat1) *
                Math.sin(dLon/2) * Math.sin(dLon/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return d = R * c *1000;
    }    

    function setMapOnAll(map) {
        for (var i = 0; i < (markers2.length); i++) {
            markers2[i].setMap(map);
           
        }


    }
    function removeAllcircles() {
        for (var i = 0; i < (circles.length); i++) {  
            circles[i].setMap(null);

        }
        
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
        
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers2 = [];
    }   
    