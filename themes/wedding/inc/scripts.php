<?php
function themeWedding_scripts(){
    wp_enqueue_style('font-amatic', 'https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap');
    wp_enqueue_style('font-dancing', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap');
    wp_enqueue_style('font-openSans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/dist/css/app.css', array(), '1.0', 'all');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/dist/js/app.js', array('jquery'), '0.1', true);

    $startDateCountdown = get_field('fecha');
    wp_localize_script(
        'theme-scripts',
        'admin_url',
        array(
            'startCountDown' => $startDateCountdown
        )
    );

}
add_action('wp_enqueue_scripts', 'themeWedding_scripts');