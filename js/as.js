(function($) {
    $.fn.myTest = function(lat, lng) {

        var loc = {lat: +lat, lng: +lng};

        var testMap = new google.maps.Map(document.getElementById('ajax_form_map'), {
            center: loc,
            scrollwheel: true,
            zoom: 5
        });

        var testMarker = new google.maps.Marker({
            position: loc,
            map: testMap
        });

        /*for (var key in arr) {
            alert("Ключ: " + key + "значення: " + arr[key]);
        }; */
    };

    $.fn.randomMap = function(lat, lng) {

        var randloc = {lat: lat, lng: lng};

        var randMap = new google.maps.Map(document.getElementById('ajax_form_map'), {
            center: randloc,
            scrollwheel: true,
            zoom: 5
        });

        var randMarker = new google.maps.Marker({
            position: randloc,
            map: randMap
        });
    };
})(jQuery);