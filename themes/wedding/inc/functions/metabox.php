<?php 

function agregar_metabox() {
    add_meta_box(
        'datos_invitado',          
        'Confirmación del invitado',          
        'mostrar_metabox_invitado', 
        'invitado',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'agregar_metabox');


function mostrar_metabox_invitado($post) {

    $nombre_completo = $post->post_title;
    $asistencia = get_post_meta($post->ID, 'asistencia', true); 
    $acompanado = get_post_meta($post->ID, 'acompanado', true); 
    $restriccion = get_post_meta($post->ID, 'restriccion', true); 
    $indicaciones = get_post_meta($post->ID, 'indicaciones', true); 

    echo "<p><strong>Asistencia: </strong>" . esc_attr($asistencia) . "</p>";

    if( $asistencia === "Asistiré" ) {
        if( $acompanado === "Si, iré acompañado" ) {
            echo "<p><strong>¿Vendrá acompañado? </strong>" . esc_attr($acompanado) . "</p>";
        }
        echo "<p><strong>¿Tiene alguna restricción nutricional?: </strong>" . esc_attr($restriccion) . "</p>";
        if( $restriccion === "Si" ) {
            echo "<p><strong>Tipo de restricción: </strong>" . esc_attr($indicaciones) . "</p>";
        }
    }
}