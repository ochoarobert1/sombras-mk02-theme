<?php

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

require_once('includes/wp_enqueue_styles.php');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue");
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        /*- JQUERY ON LOCAL  -*/
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '3.3.1', false);
        /*- JQUERY MIGRATE ON LOCAL  -*/
        wp_register_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js',  array('jquery'), '3.0.1', false);
    } else {
        /*- JQUERY ON WEB  -*/
        wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', false);
        /*- JQUERY MIGRATE ON WEB  -*/
        wp_register_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', true);
    }
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate');
}

/* NOW ALL THE JS FILES */
require_once('includes/wp_enqueue_scripts.php');

/* --------------------------------------------------------------
    ADD CUSTOM WALKER BOOTSTRAP
-------------------------------------------------------------- */

// WALKER COMPLETO TOMADO DESDE EL NAVBAR COLLAPSE
require_once('includes/class-wp-bootstrap-navwalker.php');

// WALKER CUSTOM SI DEBO COLOCAR ICONOS AL LADO DEL MENU PRINCIPAL - SU ESTRUCTURA ESTA DENTRO DEL MISMO ARCHIVO
//require_once('includes/wp_walker_custom.php');

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('includes/wp_custom_functions.php');

/* --------------------------------------------------------------
    ADD REQUIRED WORDPRESS PLUGINS
-------------------------------------------------------------- */

require_once('includes/class-tgm-plugin-activation.php');
require_once('includes/class-required-plugins.php');


/* --------------------------------------------------------------
    ADD CUSTOM WOOCOMMERCE OVERRIDES
-------------------------------------------------------------- */

require_once('includes/wp_woocommerce_functions.php');

/* --------------------------------------------------------------
    ADD THEME SUPPORT
-------------------------------------------------------------- */

load_theme_textdomain( 'sombras', get_template_directory() . '/languages' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
add_theme_support( 'custom-background',
                  array(
                      'default-image' => '',    // background image default
                      'default-color' => '',    // background color default (dont add the #)
                      'wp-head-callback' => '_custom_background_cb',
                      'admin-head-callback' => '',
                      'admin-preview-callback' => ''
                  )
                 );

/* --------------------------------------------------------------
    ADD NAV MENUS LOCATIONS
-------------------------------------------------------------- */

register_nav_menus( array(
    'header_menu' => __( 'Menu Header - Principal', 'sombras' ),
) );

/* --------------------------------------------------------------
    ADD DYNAMIC SIDEBAR SUPPORT
-------------------------------------------------------------- */

add_action( 'widgets_init', 'sombras_widgets_init' );

function sombras_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar Principal', 'sombras' ),
        'id' => 'main_sidebar',
        'description' => __( 'Estos widgets seran vistos en las entradas y páginas del sitio', 'sombras' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Sidebar de Tienda', 'sombras' ),
        'id' => 'shop_sidebar',
        'description' => __( 'Estos widgets se mostrarán en la sección de Tienda y Categorias de Producto', 'sombras' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebars( 4, array(
        'name'          => __('Pie de Pagina %d', 'sombras'),
        'id'            => 'sidebar_footer',
        'description'   => __('Sección de Pie de Pagina', 'sombras'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ) );

    /* SPECIAL WIDGET FOR NEWS */
    register_widget( 'sombras_news_widget' );
}

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGIN
-------------------------------------------------------------- */

function custom_login_logo() {
    $version_remove = NULL;
    wp_register_style('wp-custom-login', get_template_directory_uri() . '/css/custom-wordpress-admin-style.css', false, $version_remove, 'all');
    wp_enqueue_style('wp-custom-login');

}
add_action('login_head', 'custom_login_logo');

if (! function_exists('dashboard_footer') ){
    function dashboard_footer() {
        echo '<span id="footer-thankyou">';
        _e ('Gracias por crear con ', 'sombras' );
        echo '<a href="http://wordpress.org/" target="_blank">WordPress.</a> - ';
        _e ('Tema desarrollado por ', 'sombras' );
        echo '<a href="http://robertochoa.com.ve/?utm_source=footer_admin&utm_medium=link&utm_content=sombras" target="_blank">Robert Ochoa</a></span>';
    }
}
add_filter('admin_footer_text', 'dashboard_footer');

/* --------------------------------------------------------------
    ADD CUSTOM METABOX
-------------------------------------------------------------- */

require_once('includes/wp_custom_metabox.php');

/* --------------------------------------------------------------
    ADD CUSTOM POST TYPE
-------------------------------------------------------------- */

require_once('includes/wp_custom_post_type.php');

/* --------------------------------------------------------------
    ADD CUSTOM THEME CONTROLS
-------------------------------------------------------------- */

require_once('includes/wp_custom_theme_control.php');

/* --------------------------------------------------------------
    ADD CUSTOM FUNCTIONS FOR CONSTRUCTOR
-------------------------------------------------------------- */

require_once('includes/wp_jscomposer_extended.php');

/* --------------------------------------------------------------
    ADD CUSTOM AJAX
-------------------------------------------------------------- */

function sombras_ajax_handler(){
    if(is_singular('cursos') || is_singular('product')){
        global $wp;
        wp_localize_script( 'main-functions', 'admin_url', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'redirecturl' => home_url( $wp->request ),
            'loading_message' => __( 'Verificando sus datos, por favor espere.', 'sombras' ),
            'login_message' => __( 'Ingreso Exitoso, en breve serás redirigido.', 'sombras' ),
            'button_text' => __('Selecciona los videos', 'sombras'),
        ));
        wp_localize_script( 'videos-functions', 'admin_url', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }
}

add_action( 'wp_enqueue_scripts', 'sombras_ajax_handler' );

/* --------------------------------------------------------------
    ADD CUSTOM LOGIN FUNCTION
-------------------------------------------------------------- */

function sombras_ajax_login(){
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        wp_send_json(array('loggedin'=>false, 'message'=> __( 'Datos Incorrectos, Intente nuevamente.', 'sombras' )));
    } else {
        wp_send_json(array('loggedin'=>true, 'message' => __( 'Ingreso Exitoso, en breve serás redirigido.', 'sombras' )));
        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
    }
    wp_die();
}

add_action( 'wp_ajax_nopriv_sombras_ajax_login', 'sombras_ajax_login' );

function sombras_get_courses() {
    $args = array('post_type' => 'cursos', 'posts_per_page' => -1);
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts() ) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
    $array_values[] = array( "text" => get_the_title(), "value" => get_the_ID());
    endwhile;
    endif;
    return json_encode($array_values);
}
add_action( 'wp_ajax_nopriv_sombras_get_courses', 'sombras_get_courses' );
add_action( 'wp_ajax_sombras_get_courses', 'sombras_get_courses' );


/* --------------------------------------------------------------
    ADD CUSTOM IMAGE SIZE
-------------------------------------------------------------- */
if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 9999, 400, true);
}
if ( function_exists('add_image_size') ) {
    add_image_size('avatar', 64, 64, true);
    add_image_size('service_img', 255, 384, true);
    add_image_size('galerias_img', 340, 225, true);
    add_image_size('banner_img', 9999, 400, array('center', 'center'));
}
