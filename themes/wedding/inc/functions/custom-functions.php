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
