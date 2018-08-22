<?php
add_filter( 'rwmb_meta_boxes', 'proyecto_metabox' );

function proyecto_metabox( $meta_boxes )
{
    $prefix = 'rw_';

    $meta_boxes[] = array(
        'title'    => 'Media',
        'pages'    => array( 'portafolio' ),
        'fields' => array(
            array(
                'name' => 'URL',
                'id'   => $prefix . 'url',
                'type' => 'text',
            ),
        )
    );

    return $meta_boxes;
}
