<?php
// Get Image
function fps_get_Image($image, $class=null ){
    if ($image) {
        $img_url = $image['url'];
        $img_alt = '"' . $image['alt'] . '"';
        $img_width = round($image['width'] / 2);
        $img_height = round($image['height'] / 2);
        $class = ($class) ? "class='$class'" : '' ;
        $html = "<img $class src='$img_url' alt=$img_alt width='$img_width' height='$img_height' loading='lazy'>";
        echo $html;
    }
}

// Remove frameborder iframes
add_filter('oembed_dataparse', function ($return, $data, $url){
    if (is_object($data)){
        // remove unwanted attributes
        $return = str_ireplace(array('frameborder="0"'), '', $return);
    }
    return $return;
}, 10, 3);


function event_date($fecha) {
    $fecha_obj = DateTime::createFromFormat('m/d/Y', $fecha);
    $nombres_meses_espanol = array(
        'January' => 'enero',
        'February' => 'febrero',
        'March' => 'marzo',
        'April' => 'abril',
        'May' => 'mayo',
        'June' => 'junio',
        'July' => 'julio',
        'August' => 'agosto',
        'September' => 'septiembre',
        'October' => 'octubre',
        'November' => 'noviembre',
        'December' => 'diciembre',
    );

    $nombre_mes_espanol = $nombres_meses_espanol[$fecha_obj->format('F')];

    return "<p class='date'>" . $fecha_obj->format('j \d\e ') . $nombre_mes_espanol . $fecha_obj->format(' \d\e Y') . "</p>";
}

/** Google map API key **/
function google_maps_api($api){
    $api['key'] = 'AIzaSyBHP7MZmlQgm_8IxzQUZgHzh6S3K-Oi_rI';
    return $api;
}
add_filter('acf/fields/google_map/api', 'google_maps_api');