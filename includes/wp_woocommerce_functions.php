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
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


/* ADD CUSTOM SELECTOR FOR COURSE / DISCIPLINES */
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_custom_data_vase', 10, 2 );
function add_cart_item_custom_data_vase( $cart_item_meta, $product_id ) {
    global $woocommerce;
    $current_product = get_post($product_id);
    if ($current_product->post_name == 'black-umbrella') {
        wc_empty_cart();
    }
    $quantity = count($_POST['course_selection']);
    $cart_item_meta['quantity'] = $quantity;
    $cart_item_meta['course_selection'] = $_POST['course_selection'];
    return $cart_item_meta;
}

add_filter( 'woocommerce_get_item_data', 'wc_add_course_to_cart', 10, 2 );
function wc_add_course_to_cart( $cart_data, $cart_item )
{
    $custom_items = array();

    if( !empty( $cart_data ) )
        $custom_items = $cart_data;

    // Get the product ID
    $product_id = $cart_item['product_id'];
    if( isset( $cart_item["course_selection"] ) ) {
        foreach ($cart_item["course_selection"] as $item) {
            $current_post = get_post($item);
            $custom_items[] = array(
                'name' => __( 'Video', 'sombras' ),
                'value' => $item,
                'display' => $current_post->post_title,
            );
        }
    }


    return $custom_items;
}


function add_course_product() {
    global $woocommerce;
    $array_posts = array();

    /* GETTING COURSE BY GET */
    $custom_get_value = $_GET['curso'];

    /* GETTING CART ITEMS */
    $items = $woocommerce->cart->get_cart();
    foreach($items as $item => $values) {
        $custom_items[] = $values['course_selection'];
    }

    /* GETTING COURSES */
    $args = array('post_type' => 'cursos', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'ASC');
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts() ) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
    $array_posts[] = array('key' => get_the_ID(), 'title' => get_the_title());
    endwhile;
    endif;
    wp_reset_query();
?>
<div class="course-selections">
    <h2>
        <?php _e('Videos Seleccionados:', 'sombras'); ?>
    </h2>
    <div class="course-selections-wrapper"></div>
</div>
<?php
    if (empty($custom_items)) {
?>
<select name="course_selection[]" id="course_selection" multiple="multiple">
    <?php foreach ($array_posts as $item) {?>
    <option value="<?php echo $item['key']; ?>" <?php selected($item['key'], $custom_get_value); ?>>
        <?php echo $item['title']; ?>
    </option>
    <?php } ?>
</select>
<?php } else {
        $array_id = array_shift($custom_items);
?>
<select name="course_selection[]" id="course_selection" multiple="multiple">
    <?php foreach ($array_posts as $item) { ?>
    <option value="<?php echo $item['key']; ?>" <?php if (in_array($item['key'], $array_id)) { echo "selected" ; }; ?>>
        <?php echo $item['title']; ?>
    </option>
    <?php } ?>
</select>
<?php
    }
}

add_action('woocommerce_custom_add_course_product', 'add_course_product' );

add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {
    global $woocommerce;
    $array_posts = array();

    $items = $woocommerce->cart->get_cart();
    foreach($items as $item => $values) {
        $custom_items[] = $values['course_selection'];
    }



    echo '<div id="my_custom_checkout_field">';

    woocommerce_form_field( 'custom_course_order', array(
        'type'          => 'text',
        'class'         => array('custom-hidden-class form-row-wide'),
        'label'         => '',
        'placeholder'   => __('Enter something'),
    ),  join(',', $custom_items[0]));

    echo '</div>';

}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['custom_course_order'] ) ) {
        update_post_meta( $order_id, 'custom_course_order', sanitize_text_field( $_POST['custom_course_order'] ) );
    }
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Videos').':</strong> ' . get_post_meta( $order->id, 'custom_course_order', true ) . '</p>';
}
