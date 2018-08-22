<?php

function portafolio() {

    $labels = array(
        'name'                  => _x( 'Portafolios', 'Post Type General Name', 'sombras' ),
        'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'sombras' ),
        'menu_name'             => __( 'Portafolio', 'sombras' ),
        'name_admin_bar'        => __( 'Portafolio', 'sombras' ),
        'archives'              => __( 'Archivo de Portafolio', 'sombras' ),
        'attributes'            => __( 'Atributos de Portafolio', 'sombras' ),
        'parent_item_colon'     => __( 'Portafolio Padre:', 'sombras' ),
        'all_items'             => __( 'Todos los Items', 'sombras' ),
        'add_new_item'          => __( 'Agregar Nuevo Item', 'sombras' ),
        'add_new'               => __( 'Agregar Nuevo', 'sombras' ),
        'new_item'              => __( 'Nuevo Item', 'sombras' ),
        'edit_item'             => __( 'Editar Item', 'sombras' ),
        'update_item'           => __( 'Actualizar Item', 'sombras' ),
        'view_item'             => __( 'Ver Item', 'sombras' ),
        'view_items'            => __( 'Ver Portafolio', 'sombras' ),
        'search_items'          => __( 'Buscar en Portafolio', 'sombras' ),
        'not_found'             => __( 'No hay Resultados', 'sombras' ),
        'not_found_in_trash'    => __( 'No hay Resultados en la Papelera', 'sombras' ),
        'featured_image'        => __( 'Imagen Destacada', 'sombras' ),
        'set_featured_image'    => __( 'Colocar Imagen Destacada', 'sombras' ),
        'remove_featured_image' => __( 'Remover Imagen Destacada', 'sombras' ),
        'use_featured_image'    => __( 'Usar como Imagen Destacada', 'sombras' ),
        'insert_into_item'      => __( 'Insertar dentro de Item', 'sombras' ),
        'uploaded_to_this_item' => __( 'Cargado a este item', 'sombras' ),
        'items_list'            => __( 'Listado del Portafolio', 'sombras' ),
        'items_list_navigation' => __( 'Navegación de Listado del Portafolio', 'sombras' ),
        'filter_items_list'     => __( 'Filtro de Listado del Portafolio', 'sombras' ),
    );
    $args = array(
        'label'                 => __( 'Portafolio', 'sombras' ),
        'description'           => __( 'Portafolio de Desarrollos', 'sombras' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'custom-fields', ),
        'taxonomies'            => array( 'custom_portafolio' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'portafolio', $args );

}
add_action( 'init', 'portafolio', 0 );
