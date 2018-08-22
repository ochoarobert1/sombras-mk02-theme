<?php
class BS3_Walker_Nav_Menu extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( isset( $args[0] ) && is_object( $args[0] ) ) { $args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( is_object($args) && !empty($args->has_children) ) { $link_after = $args->link_after; $args->link_after = ' <b class="caret"></b>'; }
        parent::start_el($output, $item, $depth, $args, $id);
        if ( is_object($args) && !empty($args->has_children) ) { $args->link_after = $link_after; }
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) { $indent = ''; $output .= "$indent<ul class=\"dropdown-menu list-unstyled\">"; }
}

/* HOOK TO WORDPRESS MENU */
add_filter('nav_menu_link_attributes', 'nav_link_att', 10, 3);

function nav_link_att($atts, $item, $args) {
    if ( $args->has_children ) { $atts['data-toggle'] = 'dropdown'; $atts['class'] = 'dropdown-toggle'; }
    return $atts;
}

/* ESTRUCTURA PARA WORDPRESS MENU */
/*
wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'header_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                    'walker' => new BS3_Walker_Nav_Menu ));

*/

