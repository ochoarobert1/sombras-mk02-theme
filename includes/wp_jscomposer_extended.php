<?php
class VCExtendAddonClass {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'product_woocommerce_custom', array( $this, 'renderProductCustom' ) );

        add_shortcode( 'casos_custom', array( $this, 'renderCasos' ) );

        // Register CSS and JS
        //        add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
    }

    public function integrateWithVC() {
        // Check if WPBakery Page Builder is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Extend WPBakery Page Builder is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        /*
        Add your WPBakery Page Builder logic here.
        Lets call vc_map function to "register" our custom shortcode within WPBakery Page Builder interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */

        /* GET PRODUCTS */
        $products_array = array();
        $args = array('post_type' => 'product', 'posts_per_page' => -1);
        query_posts($args);
        $i = 0;
        while (have_posts()) : the_post();
        $products_array[get_the_title()] = get_the_ID();
        endwhile;
        wp_reset_query();
        /* GET PRODUCTS */

        vc_map( array(
            "name" => __("Producto Woocommerce - Escalonado", 'redkraniet'),
            "description" => __("Shortcode para insertar productos escalonados", 'redkraniet'),
            "base" => "product_woocommerce_custom",
            "class" => "",
            "controls" => "full",
            "icon" => get_template_directory_uri() . '/images/logo-composer.png', // or css class name which you can reffer in your css file later. Example: "redkraniet_my_class"
            "category" => __('Content', 'js_composer'),
            //'admin_enqueue_js' => array(plugins_url('assets/redkraniet.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/redkraniet_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
                array(
                    "type" => "number",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __('Cantidad de Entradas', 'redkraniet'),
                    "param_name" => "entry_quantity",
                    "value" => '',
                    "description" => __("Titulo del Producto.", 'redkraniet')
                ),
                array(
                    'type' => 'dropdown',
                    "holder" => "div",
                    "class" => "",
                    'heading' => __( 'Seleccione Producto', 'redkraniet' ),
                    'description' => __( 'Seleccione el producto a colocar.', 'redkraniet' ),
                    'param_name' => 'product_selection',
                    'value' => $products_array,
                ),
                array(
                    "type" => "textarea_html",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Descripción del Producto", 'redkraniet'),
                    "param_name" => "content",
                    "value" => __("<p>Esta es la Descripción del Producto.</p>", 'redkraniet'),
                    "description" => __("Ingrese el contenido.", 'redkraniet')
                ),

                array(
                    'type' => 'checkbox',
                    "holder" => "div",
                    "class" => "",
                    'heading' => __( '¿Invertir zona?', 'js_composer' ),
                    'param_name' => 'invert_div',
                    "description" => __("Seleccione si desea invertir el orden del contenedor del proyecto (Imagen / Descripción)", 'redkraniet')
                ),

            )
        ) );

    }

    /*
    Shortcode logic how it should be rendered
    */
    public function renderProductCustom( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'product_title' => 'product_title',
            'product_selection' => 'product_selection',
            'invert_div' => 'invert_div'
        ), $atts ) );
        $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
        $image = wp_get_attachment_image_src( $proyect_image, 'full' );
        $image_url = $image[0];
        $product = get_post($product_selection);
        $image = get_the_post_thumbnail_url($product->ID, 'full');
        $link = get_permalink($product->ID);


        if ($invert_div === 'true') {
            $output = "<div class='container p-0'><div class='row product-custom-container'><div class='product-custom-content col-12'><h2>{$product_title}</h2><p>{$content}</p><a class='btn btn-md btn-product-custom' href='{$link}'>buy Now</a></div><div class='product-custom-picture col-12'><img src='{$image}' class='img-fluid'/></div></div></div>";
        } else {
            $output = "<div class='container p-0'><div class='row product-custom-container'><div class='product-custom-content col-12'><h2>{$product_title}</h2><p>{$content}</p><a class='btn btn-md btn-product-custom' href='{$link}'>buy Now</a></div><div class='product-custom-picture col-12'><img src='{$image}' class='img-fluid'/></div></div></div>";
        }
        return $output;
    }

    public function renderCasos( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'casos_title' => 'casos_title',
            'casos_desc' => 'casos_desc',
            'casos_image' => 'casos_image',
            'casos_video' => 'casos_video',
        ), $atts ) );

        $image = wp_get_attachment_image_src( $casos_image, 'full' );
        $image_url = $image[0];
        $btn_img = get_template_directory_uri() . "/images/play-btn.png";

        $casos_title_id = sanitize_title($casos_title);

        $output = "<div id='{$casos_title_id}' data-video='{$casos_video}' class='casos-custom-item' style='background: url({$image_url});'><div class='casos-custom-content'><h2>{$casos_title}</h2><p>{$casos_desc}</p><div class='play-btn-container'><img id='{$casos_title_id}' src='{$btn_img}' alt='play video' class='img-fluid img-play-btn play-modal' /></div></div></div>";

        return $output;
    }

    //    /*
    //    Load plugin css and javascript files which you may need on front end of your site
    //    */
    //    public function loadCssAndJs() {
    //        wp_register_style( 'redkraniet_style', plugins_url('assets/redkraniet.css', __FILE__) );
    //        wp_enqueue_style( 'redkraniet_style' );
    //
    //        // If you need any javascript files on front end, here is how you can load them.
    //        //wp_enqueue_script( 'redkraniet_js', plugins_url('assets/redkraniet.js', __FILE__), array('jquery') );
    //    }
}
// Finally initialize code
new VCExtendAddonClass();
