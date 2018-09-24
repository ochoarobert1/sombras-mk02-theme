<?php
/* WOOCOMMERCE CUSTOM COMMANDS */

/* WOOCOMMERCE - DECLARE THEME SUPPORT - BEGIN */
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );
/* WOOCOMMERCE - DECLARE THEME SUPPORT - END */

/* WOOCOMMERCE - CUSTOM WRAPPER - BEGIN */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main" class="container-fluid p-0"><div class="row no-gutters"><div class="woocustom-main-container col-12">';
}

function my_theme_wrapper_end() {
    echo '</div></div></section>';
}
/* WOOCOMMERCE - CUSTOM WRAPPER - END */


add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3;
    }
}

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


/* ADD CUSTOM SELECTOR FOR COURSE / DISCIPLINES */
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_custom_data_vase', 10, 2 );
function add_cart_item_custom_data_vase( $cart_item_meta, $product_id ) {
    global $woocommerce;
    $cart_item_meta['course_selection'] = $_POST['course_selection'];
    return $cart_item_meta;
}

function render_custom_data_on_cart_checkout( $cart_item_meta, $cart_item ) {
    $custom_items = array();
    /* Woo 2.4.2 updates */
    if( !empty( $cart_item ) ) {
        $custom_items = $cart_data;
    }
    if( isset( $cart_item["course_selection"] ) ) {
        $custom_items[] = array( "name" => "Curso", "value" => $cart_item["course_selection"] );
    }
    return $custom_items;
}
add_filter( 'woocommerce_get_item_data', 'render_custom_data_on_cart_checkout', 10, 2 );


function add_course_product() {
    $custom_get_value = $_GET['curso'];
    $args = array('post_type' => 'cursos', 'posts_per_page' => -1);
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts() ) :
?>
<select name="course_selection" id="course_selection">
    <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
    <option value="<?php echo get_the_ID(); ?>" <?php selected(get_the_ID(), $custom_get_value); ?>>
        <?php echo get_the_title(); ?>
    </option>
    <?php endwhile; ?>
</select>
<?php
    endif;
    wp_reset_query();
}

add_action('woocommerce_custom_add_course_product', 'add_course_product' );
