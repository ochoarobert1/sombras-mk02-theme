<?php
/** FUNCION PARA COLOCAR TIEMPO EN ENTRADAS **/
function sombras_time_ago() {
    global $post;
    $date = get_post_time('G', true, $post);
    $chunks = array(
        array( 60 * 60 * 24 * 365 , __( 'año', 'sombras' ), __( 'años', 'sombras' ) ),
        array( 60 * 60 * 24 * 30 , __( 'mes', 'sombras' ), __( 'meses', 'sombras' ) ),
        array( 60 * 60 * 24 * 7, __( 'semana', 'sombras' ), __( 'semanas', 'sombras' ) ),
        array( 60 * 60 * 24 , __( 'dia', 'sombras' ), __( 'dias', 'sombras' ) ),
        array( 60 * 60 , __( 'hora', 'sombras' ), __( 'horas', 'sombras' ) ),
        array( 60 , __( 'minuto', 'sombras' ), __( 'minutos', 'sombras' ) ),
        array( 1, __( 'segundo', 'sombras' ), __( 'segundos', 'sombras' ) )
    );
    if ( !is_numeric( $date ) ) {
        $time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
        $date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
        $date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
    }
    $current_time = current_time( 'mysql', $gmt = 0 );
    $newer_date = time( );
    $since = $newer_date - $date;
    if ( 0 > $since )
        return __(  ' un momento', 'sombras' );
    for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        if ( ( $count = floor($since / $seconds) ) != 0 )
            break;
    }
    $output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
    if ( !(int)trim($output) ){
        $output = '0 ' . __( 'segundos', 'sombras' );
    }
    return $output;
}

/* CUSTOM EXCERPT */
function get_excerpt($count){
    $foto = 0;
    $permalink = get_permalink($post->ID);
    $category = get_taxonomies($post->ID);
    $excerpt = get_the_excerpt($post->ID);
    if ($excerpt == ""){
        $excerpt = get_the_content($post->ID);
    }
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = $excerpt.'... <a class="plus" href="'.$permalink.'">+</a>';
    return $excerpt;
}

/* IMAGES RESPONSIVE ON ATTACHMENT IMAGES */
function image_tag_class($class) {
    $class .= ' img-fluid';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

/* ADD CONTENT WIDTH FUNCTION */

if ( ! isset( $content_width ) ) $content_width = 1170;

/* --------------------------------------------------------------
    ADD CUSTOM NEWS WIDGET - FOR FOOTER
-------------------------------------------------------------- */

class sombras_news_widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'sombras-news-widget',
            'description' => esc_html__( 'Noticias Destacadas con foto a la izquierda', 'sombras' ),
        );
        parent::__construct( 'sombras_widget', esc_html__( 'Noticias Destacadas', 'sombras' ), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        if ( ! empty( $instance['quantity'] ) ) {
            $cantidad = $instance['quantity'];
        } else {
            $cantidad = 4;
        }

        $args2 = array('post_type' => 'post', 'posts_per_page' => $cantidad, 'order_by' => 'date', 'order' => 'DESC');
        query_posts($args2);
        if (have_posts()) :
?>
<ul class="list-unstyled">
    <?php while(have_posts()) : the_post(); ?>
    <li class="media">
        <?php $url = get_the_post_thumbnail_url(get_the_ID(), 'avatar'); ?>
        <a href="<?php the_permalink(); ?>" title="<?php _e('Ver noticia en detalle', 'sombras'); ?>">
            <img class="align-self-center mr-3" src="<?php echo $url; ?>" alt="<?php echo get_the_title(); ?>" />
        </a>
        <div class="media-body">
            <a href="<?php the_permalink(); ?>" title="<?php _e('Ver noticia en detalle', 'sombras'); ?>">
                <h5 class="mt-0"><?php the_title(); ?></h5>
            </a>
        </div>
    </li>
    <?php endwhile; ?>
</ul>
<?php
        endif;
        wp_reset_query();
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Noticias', 'sombras' );
        $quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : 4;
?>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Título', 'sombras' ); ?>:</label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
<p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>"><?php esc_attr_e( 'Cantidad de Noticias a Mostrar', 'sombras' ); ?>:</label>
    <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" type="number" value="<?php echo esc_attr( $quantity ); ?>" step="1" min="1" size="3">
</p>
<?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

        return $instance;
    }
}


/* GETTING OUT THE LABEL IN ARCHIVES */

function sombras_custom_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'sombras_custom_archive_title' );

function custom_reverse_post_order( $query ) {
    if ( is_admin() )
        return;
    if (($query->is_main_query()) && (is_tax('disciplinas'))){
        $query->set( 'posts_per_page', '-1' );
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'ASC' );
    }
}

add_action( 'pre_get_posts', 'custom_reverse_post_order' );

/* --------------------------------------------------------------
    VIMEO CUSTOM FETCHER
-------------------------------------------------------------- */
function sombras_vimeo_fetch($link) {
    /* REMOVER PROTOCOLO HTTPS:// */
    $link_protocol = trim($link, 'https://');
    /* SEPARAMOS EL LINK EN PEDAZOS EN ARRAY */
    $link_array = explode('/', $link_protocol, 3);
    /* DEVUELVO EL ID DEL VIDEO */
    return $link_array[1];

}

