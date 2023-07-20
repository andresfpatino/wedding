<?php
// Get Image
function fps_get_Image($image){
    if ($image){
        $img_url = $image['url'];
        $img_alt = $image['alt'];
        $img_width = round($image['width'] / 2);
        $img_height = round($image['height'] / 2);
        $html = '<img src="' . $img_url . '" alt="' . $img_alt . '" width="' . $img_width . '" height="' . $img_height . '" >';
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
    $fecha_obj = DateTime::createFromFormat('d/m/Y g:i a', $fecha);
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