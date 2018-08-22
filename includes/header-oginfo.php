<meta name="title" content="<?php if (is_home()) { echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); } else { echo get_bloginfo('name') . ' | ' . get_the_title(); } ?>">
<?php $current_url = $_SERVER['REQUEST_URI']; $clean_url = str_replace('/', '', $current_url); ?>
<?php if(is_single()) : $the_slug = $clean_url; $args=array('name' => $the_slug, 'posts_per_page' => 1); $my_posts = get_posts( $args ); ?>
<?php if( $my_posts ) { $excerpt = $my_posts[0]->post_excerpt; echo '<meta name="description" content="' . htmlentities($excerpt, ENT_QUOTES, 'UTF-8') . '" />'; } ?>
<?php endif; ?>
<?php if (is_home() ) { echo '<meta name="description" content="'. get_bloginfo("name") .' | ' . get_bloginfo("description") . '">'; } ?>
<?php if (is_page() ) { echo '<meta name="description" content="'. get_bloginfo("name") .' | ' . get_bloginfo("description") . '">'; } ?>
<?php if(is_single()) : $the_slug = $clean_url; $args=array('name' => $the_slug, 'posts_per_page' => 1); $my_posts = get_posts( $args ); ?>
<?php if( $my_posts ) { $terms = get_the_terms( $my_posts[0]->ID, 'post_tag' ); if ( $terms && ! is_wp_error( $terms ) ) : $draught_links = array(); ?>
<?php foreach ( $terms as $term ) { $draught_links[] = $term->name; } $on_draught = join( ", ", $draught_links ); endif;
                       echo '<meta name="keywords" content="KEYWORDS , '. $on_draught .'" />'; } ?>
<?php endif; ?>
<?php if (is_home() || is_page() ) { echo '<meta name="keywords" content="KEYWORDS" />'; } ?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@USERNAME_TWITTER" />
<meta name="twitter:creator" content="@USERNAME_TWITTER" />
<meta property='fb:admins' content='100000133943608' />
<meta property="fb:app_id" content="FACEBOOK_APPID" />
<meta property="og:title" content="<?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>" />
<meta property="og:site_name" content="PROYECTO" />
<meta property="og:type" content="article" />
<meta property="og:locale" content="es_ES" />
<meta property="og:url" content="<?php if(is_single()) { the_permalink(); } else { echo 'DIRECCION_PROYECTO'; }?>" />
<?php if(is_single()) : $the_slug = $clean_url; $args=array('name' => $the_slug, 'posts_per_page' => 1); $my_posts = get_posts( $args ); ?>
<?php if( $my_posts ) { $excerpt = $my_posts[0]->post_excerpt; echo '<meta property="og:description" content="' . htmlentities($excerpt, ENT_QUOTES, 'UTF-8') . '" />'; } ?>
<?php endif; ?>
<?php if (is_home() ) { echo '<meta property="og:description" content="'. get_bloginfo("name") .'" | "' . get_bloginfo("description") . '">'; } ?>
<?php if (is_page() ) { echo '<meta property="og:description"  content="'. get_bloginfo("name") .'" | "' . get_bloginfo("description") . '">'; } ?>
<meta property="og:image" content='<?php if(is_single()){ $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; } else { echo esc_url( get_template_directory_uri() ) ."/images/oglogo.png"; } ?>' />
