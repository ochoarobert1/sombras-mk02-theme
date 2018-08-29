<?php
add_filter( 'rwmb_meta_boxes', 'sombras_metabox' );

function sombras_metabox( $meta_boxes )
{
    $prefix = 'st_';

    $meta_boxes[] = array(
        'id'         => 'general',
        'title'      => __('Información General', 'sombras'),
        'post_types' => array('post', 'page'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'type' => 'custom_html',
                'std'  => '<div class="alert alert-warning">'. __('Datos Principales', 'sombras').':</div>',
            ),
            array(
                'name'  => __('Imagen de Banner', 'sombras'),
                'desc'  => __('Ingrese una imagen si desea colocar una imagen de banner con el título encima', 'sombras'),
                'id'    => $prefix . 'image_banner',
                'type' => 'image_advanced',
                'force_delete'     => false,
                'max_file_uploads' => 1,
                'max_status'       => 'true',
                'image_size'       => array('9999x400')
            )
        )
    );


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

    $meta_boxes[] = array(
        'id'         => 'talleres',
        'title'      => __('Información especifica del Taller', 'sombras'),
        'post_types' => 'talleres',
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'type' => 'custom_html',
                'std'  => '<div class="alert alert-warning">'. __('Datos Principales', 'sombras').':</div>',
            ),
            array(
                'name'  => __('Fecha', 'sombras'),
                'desc'  => __('Fecha del Taller', 'sombras'),
                'id'    => $prefix . 'taller_date',
                'type'  => 'date',
            ),
            array(
                'name'  => __('Hora de Inicio', 'sombras'),
                'desc'  => __('Hora del Evento', 'sombras'),
                'id'    => $prefix . 'taller_start_time',
                'type'  => 'time',
            ),
            array(
                'name'  => __('Hora de Finalización', 'sombras'),
                'desc'  => __('Hora del Taller', 'sombras'),
                'id'    => $prefix . 'taller_end_time',
                'type'  => 'time',
            ),
            array(
                'name'  => __('Precio', 'sombras'),
                'desc'  => __('Precio del Taller', 'sombras'),
                'id'    => $prefix . 'taller_price',
                'type'  => 'text',
            )
        )
    );

    $meta_boxes[] = array(
        'id'         => 'disciplinas',
        'title'      => __('Información General', 'sombras'),
        'post_types' => array('cursos'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'type' => 'custom_html',
                'std'  => '<div class="alert alert-warning">'. __('Datos Principales', 'sombras').':</div>',
            ),
            array(
                'id'    => $prefix . 'curso_nivel',
                'name'  => __('Nivel de Dificultad', 'sombras'),
                'desc'  => __('Seleccione el nivel de dificultad del video.', 'sombras'),
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    '1'       => 'Nivel 1',
                    '2'       => 'Nivel 2',
                    '3'       => 'Nivel 3',
                    '4'       => 'Nivel 4',
                    '5'       => 'Nivel 5'
                ),
                'multiple'        => false,
                'placeholder'     => __('Nivel de Dificultad', 'sombras'),
                'select_all_none' => false
            ),
            array(
                'id'    => $prefix . 'curso_link',
                'name'  => __('Link del Video', 'sombras'),
                'desc'  => __('Inserte el link del video.', 'sombras'),
                'type'  => 'text',
                'size'  => 90
            ),
            array(
                'id'    => $prefix . 'curso_teacher',
                'name'  => __('Instructor', 'sombras'),
                'desc'  => __('Inserte el nombre del instructor del video.', 'sombras'),
                'type'  => 'text',
            )
        )
    );


    return $meta_boxes;
}
