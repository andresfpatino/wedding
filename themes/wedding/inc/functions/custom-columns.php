<?php 

add_filter('manage_invitado_posts_columns', 'reorganizar_agregar_columna_invitado');
function reorganizar_agregar_columna_invitado($columns) {
    $date_column = $columns['date'];
    unset($columns['date']);
    $columns['asistencia'] = 'Asistencia';
    $columns['acompanado'] = '¿Vendrá acompañado?';
    $columns['restriccion'] = '¿Restricción nutricional?';
    $columns['indicaciones'] = 'Tipo de restricción';
    $columns['date'] = $date_column;

    return $columns;
}

add_action('manage_invitado_posts_custom_column', 'mostrar_valores_columnas_personalizadas_estado', 10, 2);
function mostrar_valores_columnas_personalizadas_estado($column, $post_id) {
    if ($column === 'asistencia') {
        $asistencia = get_post_meta($post_id, 'asistencia', true);
        echo $asistencia;
    } elseif ($column === 'acompanado') {
        $acompanado = get_post_meta($post_id, 'acompanado', true);
        if($acompanado){
            echo $acompanado;
        } else {
            echo 'N/A';
        }
    } elseif ($column === 'restriccion') {
        $restriccion = get_post_meta($post_id, 'restriccion', true);
        if($restriccion){
            echo $restriccion;
        } else{
            echo 'N/A';
        }
    } elseif ($column === 'indicaciones') {
        $indicaciones = get_post_meta($post_id, 'indicaciones', true);
        if($indicaciones){
            echo $indicaciones;
        } else{
            echo 'N/A';
        }
    }
}