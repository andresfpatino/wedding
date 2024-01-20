
(function ($) {

        var map;

        function initMap( $el ) {

            // var
            var $markers = $el.find('.marker');
            var args = {
                zoom		:  $el.data('zoom') || 15,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                mapTypeControl: false,
                fullscreenControl: false,
                draggable: true,
                clickableIcons: false,
                disableDoubleClickZoom: "true",
                //gestureHandling: 'none',
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "hue": "#000"
                            },
                            {
                                "saturation": 74
                            },
                            {
                                "lightness": 100
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "weight": 0.6
                            },
                            {
                                "saturation": -85
                            },
                            {
                                "lightness": 61
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "color": "#000"
                            },
                            {
                                "lightness": 26
                            },
                            {
                                "gamma": 5.86
                            }
                        ]
                    }
                ]
            };

            // create map
            map = new google.maps.Map( $el[0], args);

            // add a markers reference
            map.markers = [];

            // add markers
            $markers.each(function(){
                add_marker( $(this), map );
            });

            // center map
            center_map( map );

            // return
            return map;

        }

        /*
        *  add_marker
        *  This function will add a marker to the selected Google Map
        */

        function add_marker( $marker, map ) {

            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            // create marker
            var baseurl = window.location.origin+window.location.pathname;
            var baseIcon = `${baseurl}wp-content/themes/wedding/assets/src/img/favicon.webp`;

            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map,
                icon:     baseIcon
            });



            // add to array
            map.markers.push( marker );

            // if marker contains HTML, add it to an infoWindow
            if( $marker.html() ){
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content		: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open( map, marker );
                });

                // Change marker icon when infoWindow is closed
                google.maps.event.addListenerOnce(infowindow, 'closeclick', function() {
                    marker.setIcon(baseIcon);
                })
            }

            infowindow.open(map, marker);
        }

        /*
        *  center_map
        *  This function will center the map, showing all markers attached to this map
        */

        function center_map( map ) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each( map.markers, function( i, marker ){
                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
                bounds.extend( latlng );
            });

            // only 1 marker?
            if( map.markers.length == 1 ){
                map.setCenter( bounds.getCenter() );
            }
            else{
                // fit to bounds
                map.setCenter( bounds.getCenter() );
                map.setZoom( 13 );
            }
        }

        /*
        *  document ready
        *  This function will render each map when the document is ready (page has loaded)
        */

        // global var
        var map = null;

        $('.acf-map').each(function(){
            map = initMap( $(this) );  // create map
        });


})(jQuery);
