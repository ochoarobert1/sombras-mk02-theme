<?php
/* --------------------------------------------------------------
    ADD CUSTOM POST TYPE
-------------------------------------------------------------- */

// Register Custom Post Type
function servicios() {

    $labels = array(
        'name'                  => _x( 'Servicios', 'Post Type General Name', 'sombras' ),
        'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'sombras' ),
        'menu_name'             => __( 'Servicios', 'sombras' ),
        'name_admin_bar'        => __( 'Servicios', 'sombras' ),
        'archives'              => __( 'Archivo de Servicios', 'sombras' ),
        'attributes'            => __( 'Atributos del Servicio', 'sombras' ),
        'parent_item_colon'     => __( 'Servicio Padre', 'sombras' ),
        'all_items'             => __( 'Todos los Servicios', 'sombras' ),
        'add_new_item'          => __( 'Agregar nuevo Servicio', 'sombras' ),
        'add_new'               => __( 'Agregar nuevo', 'sombras' ),
        'new_item'              => __( 'Nuevo Servicio', 'sombras' ),
        'edit_item'             => __( 'Editar Servicio', 'sombras' ),
        'update_item'           => __( 'Actualizar Servicio', 'sombras' ),
        'view_item'             => __( 'Ver Servicio', 'sombras' ),
        'view_items'            => __( 'Ver Servicios', 'sombras' ),
        'search_items'          => __( 'Buscar Servicio', 'sombras' ),
        'not_found'             => __( 'No hay resultados', 'sombras' ),
        'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'sombras' ),
        'featured_image'        => __( 'Imagen Destacada', 'sombras' ),
        'set_featured_image'    => __( 'Colocar Imagen Destacada', 'sombras' ),
        'remove_featured_image' => __( 'Remover Imagen Destacada', 'sombras' ),
        'use_featured_image'    => __( 'Usar como Imagen Destacada', 'sombras' ),
        'insert_into_item'      => __( 'Insertar en Servicio', 'sombras' ),
        'uploaded_to_this_item' => __( 'Cargado a este Servicio', 'sombras' ),
        'items_list'            => __( 'Listado de Servicios', 'sombras' ),
        'items_list_navigation' => __( 'Nevgación del Listado de Servicios', 'sombras' ),
        'filter_items_list'     => __( 'Filtro del Listado de Servicios', 'sombras' ),
    );
    $args = array(
        'label'                 => __( 'Servicio', 'sombras' ),
        'description'           => __( 'Servicios ofrecidas por la Empresa', 'sombras' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 99,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'servicios', $args );

}
add_action( 'init', 'servicios', 0 );

// Register Custom Post Type
function cursos() {

    $labels = array(
        'name'                  => _x( 'Cursos', 'Post Type General Name', 'sombras' ),
        'singular_name'         => _x( 'Curso', 'Post Type Singular Name', 'sombras' ),
        'menu_name'             => __( 'Cursos', 'sombras' ),
        'name_admin_bar'        => __( 'Cursos', 'sombras' ),
        'archives'              => __( 'Archivo de Cursos', 'sombras' ),
        'attributes'            => __( 'Atributos de Cursos', 'sombras' ),
        'parent_item_colon'     => __( 'Curso Padre:', 'sombras' ),
        'all_items'             => __( 'Todos los Cursos', 'sombras' ),
        'add_new_item'          => __( 'Agregar Nuevo Curso', 'sombras' ),
        'add_new'               => __( 'Agregar Nuevo', 'sombras' ),
        'new_item'              => __( 'Nuevo Curso', 'sombras' ),
        'edit_item'             => __( 'Editar Curso', 'sombras' ),
        'update_item'           => __( 'Actualizar Curso', 'sombras' ),
        'view_item'             => __( 'Ver Curso', 'sombras' ),
        'view_items'            => __( 'Ver Cursos', 'sombras' ),
        'search_items'          => __( 'Buscar Curso', 'sombras' ),
        'not_found'             => __( 'No hay Resultados', 'sombras' ),
        'not_found_in_trash'    => __( 'No hay Resultados en Papelera', 'sombras' ),
        'featured_image'        => __( 'Imagen Descriptiva', 'sombras' ),
        'set_featured_image'    => __( 'Colocar Imagen Descriptiva', 'sombras' ),
        'remove_featured_image' => __( 'Remover Imagen Descriptiva', 'sombras' ),
        'use_featured_image'    => __( 'Usar como Imagen Descriptiva', 'sombras' ),
        'insert_into_item'      => __( 'Insertar en Curso', 'sombras' ),
        'uploaded_to_this_item' => __( 'Cargado a este Curso', 'sombras' ),
        'items_list'            => __( 'Listado de Cursos', 'sombras' ),
        'items_list_navigation' => __( 'Navegación del Listado de Cursos', 'sombras' ),
        'filter_items_list'     => __( 'Filtro del Listado de Cursos', 'sombras' ),
    );
    $args = array(
        'label'                 => __( 'Curso', 'sombras' ),
        'description'           => __( 'Cursos Ofrecidos por la Academia', 'sombras' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'comments', 'excerpt', 'thumbnail', ),
        'taxonomies'            => array( 'custom_cursos' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 99,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'cursos', $args );

}
add_action( 'init', 'cursos', 0 );

// Register Custom Post Type
function galerias() {

    $labels = array(
        'name'                  => _x( 'Galerias', 'Post Type General Name', 'sombras' ),
        'singular_name'         => _x( 'Galería', 'Post Type Singular Name', 'sombras' ),
        'menu_name'             => __( 'Galerías', 'sombras' ),
        'name_admin_bar'        => __( 'Galerías', 'sombras' ),
        'archives'              => __( 'Archivo de Galerías', 'sombras' ),
        'attributes'            => __( 'Atributos de Galería', 'sombras' ),
        'parent_item_colon'     => __( 'Galería Padre:', 'sombras' ),
        'all_items'             => __( 'Todas las Galerías', 'sombras' ),
        'add_new_item'          => __( 'Agregar Nueva Galería', 'sombras' ),
        'add_new'               => __( 'Agregar Nueva', 'sombras' ),
        'new_item'              => __( 'Nueva Galería', 'sombras' ),
        'edit_item'             => __( 'Editar Galería', 'sombras' ),
        'update_item'           => __( 'Actualizar Galería', 'sombras' ),
        'view_item'             => __( 'Ver Galería', 'sombras' ),
        'view_items'            => __( 'Ver Galerías', 'sombras' ),
        'search_items'          => __( 'Buscar Galería', 'sombras' ),
        'not_found'             => __( 'No hay resultados', 'sombras' ),
        'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'sombras' ),
        'featured_image'        => __( 'Imagen de Portada', 'sombras' ),
        'set_featured_image'    => __( 'Colocar Imagen de Portada', 'sombras' ),
        'remove_featured_image' => __( 'Remover Imagen de Portada', 'sombras' ),
        'use_featured_image'    => __( 'Usar como Imagen de Portada', 'sombras' ),
        'insert_into_item'      => __( 'Insertar en Galería', 'sombras' ),
        'uploaded_to_this_item' => __( 'Cargado a esta Galería', 'sombras' ),
        'items_list'            => __( 'Listado de Galerías', 'sombras' ),
        'items_list_navigation' => __( 'Navegación del Listado de Galerías', 'sombras' ),
        'filter_items_list'     => __( 'Filtro del Listado de Galerías', 'sombras' ),
    );
    $args = array(
        'label'                 => __( 'Galería', 'sombras' ),
        'description'           => __( 'Galerías de la Academia', 'sombras' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 99,
        'menu_icon'             => 'dashicons-format-gallery',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'galerias', $args );

}
add_action( 'init', 'galerias', 0 );

// Register Custom Post Type
function talleres() {

    $labels = array(
        'name'                  => _x( 'Talleres', 'Post Type General Name', 'sombras' ),
        'singular_name'         => _x( 'Taller', 'Post Type Singular Name', 'sombras' ),
        'menu_name'             => __( 'Talleres', 'sombras' ),
        'name_admin_bar'        => __( 'Talleres', 'sombras' ),
        'archives'              => __( 'Archivo de Talleres', 'sombras' ),
        'attributes'            => __( 'Atributos de Talleres', 'sombras' ),
        'parent_item_colon'     => __( 'Taller Padre:', 'sombras' ),
        'all_items'             => __( 'Todos los Talleres', 'sombras' ),
        'add_new_item'          => __( 'Agregar Nuevo Taller', 'sombras' ),
        'add_new'               => __( 'Agregar Nuevo', 'sombras' ),
        'new_item'              => __( 'Nuevo Taller', 'sombras' ),
        'edit_item'             => __( 'Editar Taller', 'sombras' ),
        'update_item'           => __( 'Actualizar Taller', 'sombras' ),
        'view_item'             => __( 'Ver Taller', 'sombras' ),
        'view_items'            => __( 'Ver Talleres', 'sombras' ),
        'search_items'          => __( 'Buscar Taller', 'sombras' ),
        'not_found'             => __( 'No hay resultados', 'sombras' ),
        'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'sombras' ),
        'featured_image'        => __( 'Imagen del Taller', 'sombras' ),
        'set_featured_image'    => __( 'Colocar Imagen del Taller', 'sombras' ),
        'remove_featured_image' => __( 'Remover Imagen del Taller', 'sombras' ),
        'use_featured_image'    => __( 'Usar como Imagen del Taller', 'sombras' ),
        'insert_into_item'      => __( 'Insertar en Taller', 'sombras' ),
        'uploaded_to_this_item' => __( 'Cargado a este Taller', 'sombras' ),
        'items_list'            => __( 'Listado de Talleres', 'sombras' ),
        'items_list_navigation' => __( 'Navegación del Listado de Talleres', 'sombras' ),
        'filter_items_list'     => __( 'Filtro del Listado de Talleres', 'sombras' ),
    );
    $args = array(
        'label'                 => __( 'Taller', 'sombras' ),
        'description'           => __( 'Talleres presenciales impartidos en Sombras', 'sombras' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 99,
        'menu_icon'             => 'dashicons-pressthis',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'talleres', $args );

}
add_action( 'init', 'talleres', 0 );

// Register Custom Post Type
function eventos() {

    $labels = array(
        'name'                  => _x( 'Eventos', 'Post Type General Name', 'sombras' ),
        'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'sombras' ),
        'menu_name'             => __( 'Eventos', 'sombras' ),
        'name_admin_bar'        => __( 'Eventos', 'sombras' ),
        'archives'              => __( 'Archivo de Eventos', 'sombras' ),
        'attributes'            => __( 'Atributos de Eventos', 'sombras' ),
        'parent_item_colon'     => __( 'Evento Padre:', 'sombras' ),
        'all_items'             => __( 'Todos los Eventos', 'sombras' ),
        'add_new_item'          => __( 'Agregar Nuevo Evento', 'sombras' ),
        'add_new'               => __( 'Agregar Nuevo', 'sombras' ),
        'new_item'              => __( 'Nuevo Evento', 'sombras' ),
        'edit_item'             => __( 'Editar Evento', 'sombras' ),
        'update_item'           => __( 'Actualizar Evento', 'sombras' ),
        'view_item'             => __( 'Ver Evento', 'sombras' ),
        'view_items'            => __( 'Ver Eventos', 'sombras' ),
        'search_items'          => __( 'Buscar Evento', 'sombras' ),
        'not_found'             => __( 'No hay resultados', 'sombras' ),
        'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'sombras' ),
        'featured_image'        => __( 'Imagen del Evento', 'sombras' ),
        'set_featured_image'    => __( 'Colocar Imagen del Evento', 'sombras' ),
        'remove_featured_image' => __( 'Remover Imagen del Evento', 'sombras' ),
        'use_featured_image'    => __( 'Usar como Imagen del Evento', 'sombras' ),
        'insert_into_item'      => __( 'Insertar en Evento', 'sombras' ),
        'uploaded_to_this_item' => __( 'Cargado a este Evento', 'sombras' ),
        'items_list'            => __( 'Listado de Eventos', 'sombras' ),
        'items_list_navigation' => __( 'Navegación del Listado de Eventos', 'sombras' ),
        'filter_items_list'     => __( 'Filtro del Listado de Eventos', 'sombras' ),
    );
    $args = array(
        'label'                 => __( 'Evento', 'sombras' ),
        'description'           => __( 'Eventos de la academia', 'sombras' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => false,
        'menu_position'         => 99,
        'menu_icon'             => 'dashicons-pressthis',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'eventos', $args );

}
add_action( 'init', 'eventos', 0 );



// Register Custom Taxonomy
function custom_cursos() {

    $labels = array(
        'name'                       => _x( 'Disciplina', 'Taxonomy General Name', 'sombras' ),
        'singular_name'              => _x( 'Disciplina', 'Taxonomy Singular Name', 'sombras' ),
        'menu_name'                  => __( 'Disciplinas', 'sombras' ),
        'all_items'                  => __( 'Todos las Disciplinas', 'sombras' ),
        'parent_item'                => __( 'Disciplina Padre', 'sombras' ),
        'parent_item_colon'          => __( 'Disciplina Padre:', 'sombras' ),
        'new_item_name'              => __( 'Nueva Disciplina', 'sombras' ),
        'add_new_item'               => __( 'Agregar Nueva Disciplina', 'sombras' ),
        'edit_item'                  => __( 'Editar Disciplina', 'sombras' ),
        'update_item'                => __( 'Actualizar Disciplina', 'sombras' ),
        'view_item'                  => __( 'Ver Disciplina', 'sombras' ),
        'separate_items_with_commas' => __( 'Separar Disciplinas por comas', 'sombras' ),
        'add_or_remove_items'        => __( 'Agregar o remover Disciplinas', 'sombras' ),
        'choose_from_most_used'      => __( 'Escoger de los más usados', 'sombras' ),
        'popular_items'              => __( 'Disciplinas Populares', 'sombras' ),
        'search_items'               => __( 'Buscar Disciplinas', 'sombras' ),
        'not_found'                  => __( 'No hay resultados', 'sombras' ),
        'no_terms'                   => __( 'No hay Disciplinas', 'sombras' ),
        'items_list'                 => __( 'Listado de Disciplinas', 'sombras' ),
        'items_list_navigation'      => __( 'Navegación del Listado de Disciplinas', 'sombras' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'disciplinas', array( 'cursos' ), $args );

}
add_action( 'init', 'custom_cursos', 0 );
