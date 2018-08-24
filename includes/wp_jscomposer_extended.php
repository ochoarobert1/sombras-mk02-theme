<?php
class VCExtendAddonClass {

    function __construct() {
        // HOOK FOR VC
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // CREATING SHORTCODE
        add_shortcode( 'sombras_blog_grid', array( $this, 'render_sombras_blog_grid' ) );

        // CREATING SHORTCODE
        add_shortcode( 'sombras_media_grid', array( $this, 'render_sombras_media_grid' ) );

        // Register CSS and JS
        // add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
    }

    public function integrateWithVC() {
        // Check if WPBakery Page Builder is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Extend WPBakery Page Builder is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        /* WPBakery Logic Script */
        vc_map( array(
            'name' => __('Sombras - Grilla del Blog Especial', 'sombras'),
            'description' => __('Shortcode para insertar entradas escalonados', 'sombras'),
            'base' => 'sombras_blog_grid',
            'class' => '',
            'controls' => 'full',
            'icon' => get_template_directory_uri() . '/images/logo.png',
            'category' => __('Content', 'js_composer'),
            'params' => array(
                array(
                    'type' => 'posttypes',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __( 'Seleccione Tipo de Entrada', 'sombras' ),
                    'description' => __( 'Seleccione el tipo de entrada a colocar en grilla.', 'sombras' ),
                    'param_name' => 'post_type_selection'
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __('Cantidad de Entradas', 'sombras'),
                    'param_name' => 'entry_quantity',
                    'value' => '',
                    'description' => __('Inserte la cantidad de entradas a colocar en esta zona.', 'sombras')
                )
            )
        ) );

        /* WPBakery Logic Script */
        vc_map( array(
            'name' => __('Sombras - Grilla en Lista Especial', 'sombras'),
            'description' => __('Shortcode para insertar entradas listados', 'sombras'),
            'base' => 'sombras_media_grid',
            'class' => '',
            'controls' => 'full',
            'icon' => get_template_directory_uri() . '/images/logo.png',
            'category' => __('Content', 'js_composer'),
            'params' => array(
                array(
                    'type' => 'posttypes',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __( 'Seleccione Tipo de Entrada', 'sombras' ),
                    'description' => __( 'Seleccione el tipo de entrada a colocar en grilla.', 'sombras' ),
                    'param_name' => 'post_type_selection'
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __('Cantidad de Entradas', 'sombras'),
                    'param_name' => 'entry_quantity',
                    'value' => '',
                    'description' => __('Inserte la cantidad de entradas a colocar en esta zona.', 'sombras')
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __('Cantidad de Entradas a Saltar', 'sombras'),
                    'param_name' => 'skip_quantity',
                    'value' => '',
                    'description' => __('Inserte la cantidad de entradas que deben saltarse (Util para colocar elementos anteriores al más reciente).', 'sombras')
                ),
            )
        ) );
    }

    /* Shortcode logic how it should be rendered */
    public function render_sombras_blog_grid( $atts, $content = null ) {
        extract( shortcode_atts( array( 'entry_quantity' => 'entry_quantity', 'post_type_selection' => 'post_type_selection' ), $atts ) );
        $output = '';
        $custom_loop = new WP_Query(array('posts_per_page' => $entry_quantity, 'post_type' => $post_type_selection));
        $output .= '<div class="container p-0"><div class="row sombras-custom-grid">';

        while ($custom_loop->have_posts()) : $custom_loop->the_post();
        $output .= '<div class="sombras-custom-grid-item col"><a href="'. get_permalink() .'" title="'. get_the_title() .'">' . get_the_post_thumbnail(get_the_ID(), "full", array("class" => "img-fluid")). '</a><h2>'. get_the_title() .'</h2></div>';
        endwhile;
        wp_reset_query();

        $output .= '</div></div>';
        return $output;
    }

    /* Shortcode logic how it should be rendered */
    public function render_sombras_media_grid( $atts, $content = null ) {
        extract( shortcode_atts( array( 'entry_quantity' => 'entry_quantity', 'skip_quantity' => 'skip_quantity', 'post_type_selection' => 'post_type_selection' ), $atts ) );

        if ($skip_quantity == '') { $skip_quantity = 0; }
        $output = '';
        $custom_loop = new WP_Query(array('posts_per_page' => $entry_quantity, 'post_type' => $post_type_selection, 'offset' => $skip_quantity));
        $output .= '<ul class="list-unstyled">';

        while ($custom_loop->have_posts()) : $custom_loop->the_post();
        $output .= ' <li class="media"><a href="'. get_permalink() .'" title="'. get_the_title() .'">' . get_the_post_thumbnail(get_the_ID(), "avatar", array("class" => "mr-3 media-custom-image")). '</a><div class="media-body"></a><h5 class="mt-0 mb-1">'. get_the_title() .'</h5></div></li>';
        endwhile;
        wp_reset_query();

        $output .= '</ul>';
        return $output;
    }



    /* Load plugin css and javascript files which you may need on front end of your site */
    //    public function loadCssAndJs() {
    //        wp_register_style( 'sombras_style', plugins_url('assets/sombras.css', __FILE__) );
    //        wp_enqueue_style( 'sombras_style' );
    //
    //        // If you need any javascript files on front end, here is how you can load them.
    //        //wp_enqueue_script( 'sombras_js', plugins_url('assets/sombras.js', __FILE__), array('jquery') );
    //    }
}

// Finally initialize code
new VCExtendAddonClass();
