<?php
add_filter( 'rwmb_meta_boxes', 'sombras_metabox' );

function sombras_metabox( $meta_boxes )
{
    $prefix = 'st_';

    $meta_boxes[] = array(
        'id'         => 'eventos',
        'title'      => __('Información especifica del evento', 'sombras'),
        'post_types' => 'eventos',
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(
            array(
                'type' => 'custom_html',
                'std'  => '<div class="alert alert-warning">'. __('Datos Principales', 'sombras').':</div>',
            ),
            array(
                'name'  => __('Fecha', 'sombras'),
                'desc'  => __('Fecha del Evento', 'sombras'),
                'id'    => $prefix . 'event_date',
                'type'  => 'date',
            ),
            array(
                'name'  => __('Hora de Inicio', 'sombras'),
                'desc'  => __('Hora del Evento', 'sombras'),
                'id'    => $prefix . 'event_start_time',
                'type'  => 'time',
            ),
            array(
                'name'  => __('Hora de Finalización', 'sombras'),
                'desc'  => __('Hora del Evento', 'sombras'),
                'id'    => $prefix . 'event_end_time',
                'type'  => 'time',
            ),
            array(
                'name'  => __('Precio', 'sombras'),
                'desc'  => __('Precio de la entrada del Evento', 'sombras'),
                'id'    => $prefix . 'event_price',
                'type'  => 'text',
            ),
            array(
                'type' => 'divider',
            ),
            array(
                'type' => 'custom_html',
                'std'  => '<div class="alert alert-warning">'. __('Lugar', 'sombras').':</div>',
            ),
            array(
                'name'  => __('Dirección', 'sombras'),
                'desc'  => __('Dirección del Evento', 'sombras'),
                'id'    => $prefix . 'event_dir',
                'type'  => 'textarea',
            ),
            array(
                'name'  => __('Página Web', 'sombras'),
                'desc'  => __('Página Web del Evento', 'sombras'),
                'id'    => $prefix . 'event_webpage',
                'type'  => 'text',
            ),
            array(
                'type' => 'divider',
            ),
            array(
                'type' => 'custom_html',
                'std'  => '<div class="alert alert-warning">'. __('Organizador', 'sombras').':</div>',
            ),
            array(
                'name'  => __('Nombre del Organizador:', 'sombras'),
                'desc'  => __('Organizador del Evento', 'sombras'),
                'id'    => $prefix . 'event_dir',
                'type'  => 'textarea',
            ),
            array(
                'name'  => __('Correo Electrónico:', 'sombras'),
                'desc'  => __('Correo electrónico del Organizador
                ', 'sombras'),
                'id'    => $prefix . 'event_webpage',
                'type'  => 'text',
            ),
        )
    );

    return $meta_boxes;
}
