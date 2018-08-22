<?php
$contact = get_page_by_path('contacto');
$coord = get_post_meta($contact->ID, 'coord', true);
?>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

    var map = null
    var marker = null

    $(document).ready(function() {
        var mapOptions = {
            center: new google.maps.LatLng(<?php echo $coord ?>),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            navigationControl: false,
            scaleControl: false,
            optimized: false,
            zIndex:0
            /* HYBRID | ROADMAP | SATELLITE| TERRAIN */
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $coord ?>),
            title: 'título del marcador',
            map: map
            //icon: "<?php echo get_template_directory_uri(); ?>/images/marker.png"
        });

    });
</script>
<div class="clearfix"></div>
<div class="map">
    <div id="map_canvas" class="map_gray" style="width:100%; height:335px;"></div>
</div>
<div class="clearfix"></div>
