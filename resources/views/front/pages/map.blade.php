@inject('utils', 'App\Services\UtilsService')
@inject('stores', 'App\Services\StoresService')
@extends('front/master')

@section('page-class', 'map')

@section('head')
    <title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}" />
    <meta name="keywords" content="{{ $page->meta_keywords }}" />

    @parent
    <style type="text/css" media="screen">
        
        .inspirations #main {
            padding-bottom: 90px;
            position: relative;
        }
        .address {
            overflow-y: auto;
            height: 800px;
            padding: 10px 0 10px 15px;
            border-bottom: 1px solid #E6E6E6;
            text-transform: uppercase;
        }
        .address a:hover{
            color:#fff;
        }
        .block-inspiration2 .st-title h2 {
            text-align: center;
            background: #00b4dd;
            margin:0px;
            padding: 20px;
            font-size: 1.3em;
            color:#fff;
        }
    
        .map {
            padding: 0px;
        }
        .store {
            margin-bottom: 10px;
            padding: 0px;
        }
        .name {
            font-size: 1.3em;
        }
        .gellocation {
            text-align: center;
            margin-bottom: 20px;
        }
        .gellocation div p {
            line-height: 50px;
        }
        .name {
            margin-top: 10px;
        }
        .des-map a {
            padding: 5px;
            margin-top: 10px;
            background: #00b4dd;
            display: block;
            text-align: center;
            color: #fff;
        }
        .address a:hover {
            color:#337ab7;
        }

        .fill .filigrane {
            font-size: 2.4em;
            top: -20px;
        }

        .input-group input {
            border-top-left-radius: 100px !important;
            border-bottom-left-radius: 100px !important;
        }

        .input-group button {
            border-top-right-radius: 100px !important;
            border-bottom-right-radius: 100px !important;    
        }
                
        .st-title h2 {
            text-align: center;
            background: #00b4dd;
            margin: 0;
            padding: 20px;
            font-size: 1.3em;
            color: #fff;
        }
        .address {
            overflow-y: auto;
            height: 800px;
            padding: 10px 0 10px 15px;
            border-bottom: 1px solid #e6e6e6;
            text-transform: uppercase;
        }
    </style>
@endsection

@section('content')
    <div class="page-header wave-end">
        <div class="container wow fadeInLeft">
            <div class="text-center">
                <div class="h1 page title">
                    <h1>{{$page->title}}</h1>
                    <span class="filigrane">
                        {{ __('VOTRE RÉSEAU D\'EXPERTS') }}
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        {!! $utils->replaceTplVar($page->body) !!}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page-header -->
    <div class="page-content">
        <div class="container">
            <div class="row text-center">
                <div class="form-group col-12 col-lg-4">
                    <p>Trouvez le magasin le plus proche de chez vous </p>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <button type="button" id="geo" class="btn btn-lg btn-alt-primary col">
                        <i class="icon-location"></i>
                        Proche de moi 
                    </button>
                </div>
                <div class="visible-xs visible-sm" style="height: 10px;">
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <div class="input-group input-group-lg">
                      <input type="text" id="zip" class="form-control" placeholder="Nom de la ville, ex : Paris or Lyon" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-alt-primary search-zip" type="button" id="basic-addon2">
                            <i class="la la-search" style="font-size:1.5rem"></i>
                        </button>
                      </div>
                    </div>
                </div>
            </div>   
            <div class="row">
                <div class="col-md-3 store">
                    <div class="st-title">
                        <div class="row">
                        
                            <div class="col"><h2 id="count"><strong><?=count($stores->all());?></strong> RESULSTATS</h2></div>
                            <div class="col d-md-none">
                                <a href="#" class="carte-goto">
                                    <h2>
                                        CARTE
                                    </h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="address">                    
                    @foreach($stores->all() as $key => $store)
                        <p class="name"><strong>{{$store->name}}</strong></p>
                        <p>
                            {{$store->address}}<br/>
                            {{$store->address_2}}<br/>
                            {{$store->zip}} {{$store->city}}
                        </p>
                        <p>
                            Tel: {{$store->phone}}<br/>
                            @if($store->fax != '')
                            Fax: {{$store->fax}}
                                @endif
                        </p>
                        <p><a href="{{ route('store.view', [$store->slug] )}}" > Salle de bain {{$store->city}} </a></p>
                        <div class="hidden"><h2>Salle de bain {{$store->city}}</h2></div>
                        <a href="{{ route('store.view', [$store->slug] )}}" class="btn btn-sm btn-alt-primary"> VOIR LA FICHE </a>
            
                    <hr/>    
                    @endforeach
            
                    </div>
                </div>
                <div class="col-md-9 map">
                    <a name="carte"></a>
                    <div id="map"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
       
    </script>
    <script>
        var markers2 = [];
        var circles = [];

        $('.carte-goto').click(function(e) {
            e.preventDefault();
            $('html,body').animate({scrollTop: $("a[name='carte']").offset().top},'slow');
        });
        
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
            var infoWindow = new google.maps.InfoWindow;

            
            geocoder = new google.maps.Geocoder();
            
            currentValue = window.location.hash.substr(1);

            if(currentValue.length > 0){
                $('#zip').val(currentValue);
                $('.address').html('');
                codeZip();
            }


            $(document).keypress(function(e) {
                
                if(e.which == 13) {
                    var zip = $('#zip').val();    

                    if( zip.length < 1 ){
                    
                        $('#zip').attr('placeholder',"Vous n'avez pas entré de valeur");

                    } else {
                        window.location = "#"+zip;
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
                    window.location = "#"+zip;
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
                            position: results[0].geometry.location,
                            icon : "/images/pin-2.png",
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

                        $.ajax({
                            url: "{{route('store.json')}}",
                            type: "get",
                            success: function (data) {
                        
                            for(var k in data){
                                var  gps = (data[k].coordinates);
                                var lat2 = parseFloat(gps[0].lat);
                                var lng2 = parseFloat(gps[0].lng);
                                var slug = 'salle-de-bain-'+data[k].slug+'.html';
                                
                                var dis = distanceTwoPoints(lat, lng, lat2, lng2);
                                if( dis <= 30000 ){
                                    var results = '<p class="name"><strong>'+data[k].name+'</strong></p><p>'
                                        +data[k].address+'<br/>'+data[k].address_2+'<br/>'+data[k].zip+' '+data[k].city+'</p><p>Tel: '
                                        +data[k].phone+'<br/>Fax: '+data[k].fax+'</p><p></p><a href="'+slug
                                        +'" class="btn btn-sm btn-alt-primary more-store"> VOIR LA FICHE </a><hr/>';
                                    count += 1;

                                    $('.address').prepend(results);        
                                    
                                }

                            }
                            if (count <= 1) {
                                $('#count').html('<strong>'+(count.toString())+'</strong> RÉSULTAT');
                            } else {
                                $('#count').html('<strong>'+(count.toString())+'</strong> RÉSULTATS');
                            }
                        } 

                    });
                        
                        
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
                            icon : "/images/pin-2.png",
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
                    

                    $.ajax({
                    url: "{{route('store.json')}}",
                    type: "get",
                    success: function (data) {

                        for(var k in data){
                            var  gps = (data[k].coordinates);
                            var lat2 = parseFloat(gps[0].lat);
                            var lng2 = parseFloat(gps[0].lng);
                            var slug = 'salle-de-bain-'+data[k].slug+'.html';
                            
                            var dis = distanceTwoPoints(lat, lng, lat2, lng2 );
                            if( dis <= 30000 ){
                                var results = '<p class="name"><strong>'+data[k].name+'</strong></p><p>'+data[k].address+'<br/>'+data[k].address_2+'<br/>'+data[k].zip+' '+data[k].city+'</p><p>Tel: '+data[k].phone+'<br/>Fax: '+data[k].fax+'</p><p></p><a href="'+slug+'" class="btn btn-sm btn-alt-primary more-store"> VOIR LA FICHE </a><hr/>'; 
                            count += 1;

                            $('.address').prepend(results);        
                            }
                        }
                        if (count <= 1) {
                            $('#count').html('<strong>'+(count.toString())+'</strong> RÉSULTAT');
                        } else {
                            $('#count').html('<strong>'+(count.toString())+'</strong> RÉSULTATS');
                        }
                    },
                   
                });    
                           
                });
            });
            
            $(document).ready(function(e) {

                $.ajax({
                    url: "{{route('store.json')}}",
                    type: "get",
                    success: function (data) {

                        var locations = [];
                        
                        for(var k in data){
                            var  gps = (data[k].coordinates);
                            var lat = parseFloat(gps[0].lat);
                            var lng = parseFloat(gps[0].lng);

                            var slug = 'salle-de-bain-'+data[k].slug+'.html';
                            locations[k] = { lat: lat, lng: lng, info: '<div class=\"des-map\"><b>'+data[k].name+'</b><br />'+data[k].address+' <br /> '+data[k].zip+' '+data[k].city+' <br /><a class=\"btn btn-sm btn-alt-primary \" rel=\"#select\" href=\"'+slug+'\"><span><span><span><span>Voir la fiche</span></span></span></span></a><br /><br /><br /></div>' };
                    
                        };

                        var markers = locations.map(function(location, i) {
                            var marker = new google.maps.Marker({
                              position: location,
                              icon : "/images/picto-map-small.png",
                            });
                            google.maps.event.addListener(marker, 'click', function(evt) {
                              infoWindow.setContent(location.info);
                              infoWindow.open(map, marker);
                            })
                            return marker;
                        });
                        
                        var stylesCo = [
                                    {
                                        textColor: "#FFFFFF",
                                        textSize: "12",
                                        url :"/images/picto-map-large.png",
                                        width: 30,
                                        height: 37,
                                        

                                    },                                    
                                ];
                        var markerCluster = new MarkerClusterer(map, markers,{styles: stylesCo});    
                               
                    },
                   
                });
            });

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
    
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{setting('site.api_map')}}&libraries=places&callback=initMap"></script>
@endsection
