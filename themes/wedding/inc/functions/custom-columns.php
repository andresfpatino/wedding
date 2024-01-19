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


add_filter('manage_edit-invitado_sortable_columns', 'sortable_columns_invitado');
function sortable_columns_invitado($columns) {
    $columns['asistencia'] = 'asistencia';
    $columns['acompanado'] = 'acompanado';
    $columns['restriccion'] = 'restriccion';
    $columns['indicaciones'] = 'indicaciones';

    return $columns;
}

add_action('pre_get_posts', 'orderby_custom_columns_invitado');
function orderby_custom_columns_invitado($query) {
    if(!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') == 'asistencia') {
        $query->set('meta_key', 'asistencia');
        $query->set('orderby', 'meta_value');
    } elseif ($query->get('orderby') == 'acompanado') {
        $query->set('meta_key', 'acompanado');
        $query->set('orderby', 'meta_value');
    } elseif ($query->get('orderby') == 'restriccion') {
        $query->set('meta_key', 'restriccion');
        $query->set('orderby', 'meta_value');
    } elseif ($query->get('orderby') == 'indicaciones') {
        $query->set('meta_key', 'indicaciones');
        $query->set('orderby', 'meta_value');
    }
}

