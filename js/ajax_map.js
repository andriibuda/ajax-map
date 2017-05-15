/**
 * @file
 * Attaches behaviors for the custom Google Maps.
 */

(function ($, Drupal) {

    const mapElement = 'ajax_form_map';

    /**
     * Initializes the map.
     */
    function init (lat, lng) {

        alert('jell');

        lat = typeof geoLoc !== 'undefined' ? lat : 51;
        lng = typeof geoLoc !== 'undefined' ? lgn : 28;
        var point = {lat: +lat, lng: +lng};

        var map = new google.maps.Map(document.getElementById(mapElement), {
            center: point,
            scrollwheel: false,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            position: point,
            map: map
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }

    Drupal.behaviors.ajaxMapBehavior = {
        attach: function (context, settings) {
            $(context).find('#'+mapElement).once('ajaxMapBehavior').each(function () {
                init();
            })
        }
    }

})(jQuery, Drupal);
