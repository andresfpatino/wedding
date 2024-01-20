<?php

function themeWedding_scripts(){
    wp_enqueue_style('font-amatic', 'https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap');
    wp_enqueue_style('font-dancing', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap');
    wp_enqueue_style('font-openSans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;700&display=swap');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/dist/css/app.css', array(), '1.4', 'all');
    echo '<script>function initMap() {}</script>'; // Define initMap in the global scope
    wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBHP7MZmlQgm_8IxzQUZgHzh6S3K-Oi_rI&callback=initMap', null, null, true);
    wp_enqueue_script( 'sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', null, '11', false);
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/dist/js/app.js', array('jquery'), '0.5', true);

    $startDateTimeCountdown = get_field('fecha_hora');
    wp_localize_script(
        'theme-scripts',
        'admin_url',
        array(
            'startCountDown' => $startDateTimeCountdown
        )
    );
}
add_action('wp_enqueue_scripts', 'themeWedding_scripts');