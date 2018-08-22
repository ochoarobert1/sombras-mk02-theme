<?php
/* --------------------------------------------------------------
CUSTOM CSS FOR ADMIN
-------------------------------------------------------------- */
add_action('admin_init', 'sombras_css_admin_handler');

function sombras_css_admin_handler() {
    /*- WORDPRESS STYLE -*/
    $version_remove = NULL;
    wp_register_style('wp-admin-style', get_template_directory_uri() . '/css/custom-wordpress-admin-style.css', false, $version_remove, 'all');
    wp_enqueue_style('wp-admin-style');
}


/* --------------------------------------------------------------
CUSTOM AREA FOR OPTIONS DATA - SOMBRAS
-------------------------------------------------------------- */

add_menu_page( __('Sombras, Escuela de Danzas - Escritorio', 'sombras'), __('Sombras', 'sombras'), 'manage_options', 'sombras-admin', 'sombras_admin_dashboard_function', get_template_directory_uri() . '/images/logo-icon.png' , 0 );
add_submenu_page( 'sombras-admin', __( 'Servicios', 'sombras' ), __( 'Servicios', 'sombras' ), 'manage_options', 'edit.php?post_type=servicios');
add_submenu_page( 'sombras-admin', __( 'Galerias', 'sombras' ), __( 'Galerias', 'sombras' ), 'manage_options', 'edit.php?post_type=galerias');
add_submenu_page( 'sombras-admin', __( 'Talleres', 'sombras' ), __( 'Talleres', 'sombras' ), 'manage_options', 'edit.php?post_type=talleres');
add_submenu_page( 'sombras-admin', __( 'Eventos', 'sombras' ), __( 'Eventos', 'sombras' ), 'manage_options', 'edit.php?post_type=eventos');
add_submenu_page( 'sombras-admin', __( 'Cursos', 'sombras' ), __( 'Cursos', 'sombras' ), 'manage_options', 'edit.php?post_type=cursos');
add_submenu_page( 'sombras-admin', __( 'Disciplinas', 'sombras' ), __( 'Disciplinas', 'sombras' ), 'manage_options', 'edit-tags.php?taxonomy=disciplinas');

function sombras_admin_dashboard_function() {
?>
<header class="sombras-admin-header">
    <div class="sombras-admin-header-column">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php _e('Sombras - Escuela de Danzas', 'sombras'); ?>" />
    </div>
    <div class="sombras-admin-header-column">
        <h2><?php echo get_admin_page_title(); ?></h2>
    </div>
</header>
<section class="sombras-admin-body">
    <div class="sombras-admin-body-column">
        <h3><?php _e('Disciplinas', 'sombras'); ?>:</h3>
    </div>
    <div class="sombras-admin-body-column">
        <h3><?php _e('Talleres', 'sombras'); ?>:</h3>
    </div>
</section>
<?php
                                            }
