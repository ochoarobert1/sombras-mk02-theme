<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <?php /* MAIN STUFF */ ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset') ?>" />
        <meta name="robots" content="NOODP, INDEX, FOLLOW" />
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="320" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="dns-prefetch" href="//connect.facebook.net" />
        <link rel="dns-prefetch" href="//facebook.com" />
        <link rel="dns-prefetch" href="//googleads.g.doubleclick.net" />
        <link rel="dns-prefetch" href="//pagead2.googlesyndication.com" />
        <link rel="dns-prefetch" href="//google-analytics.com" />
        <?php /* FAVICONS */ ?>
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
        <?php /* THEME NAVBAR COLOR */ ?>
        <meta name="msapplication-TileColor" content="#BE1B20" />
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png" />
        <meta name="theme-color" content="#BE1B20" />
        <?php /* AUTHOR INFORMATION */ ?>
        <meta name="language" content="<?php echo get_bloginfo('language'); ?>" />
        <meta name="author" content="Sombras - Escuela de Danzas C.A." />
        <meta name="copyright" content="2018" />
        <meta name="geo.position" content="10.4692928,-66.8210035" />
        <meta name="ICBM" content="10.4692928,-66.8210035" />
        <meta name="geo.region" content="VE" />
        <meta name="geo.placename" content="Macaracuay, Av Principal, Centro Comercial Macaracuay PB – Caracas" />
        <meta name="DC.title" content="<?php if (is_home()) { echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); } else { echo get_the_title() . ' | ' . get_bloginfo('name'); } ?>" />
        <?php /* MAIN TITLE - CALL HEADER MAIN FUNCTIONS */ ?>
        <?php wp_title('|', false, 'right'); ?>
        <?php wp_head() ?>
        <?php /* OPEN GRAPHS INFO - COMMENTS SCRIPTS */ ?>
        <?php get_template_part('includes/header-oginfo'); ?>
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php /* IE COMPATIBILITIES */ ?>
        <!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7" /><![endif]-->
        <!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8" /><![endif]-->
        <!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9" /><![endif]-->
        <!--[if gt IE 8]><!-->
        <html <?php language_attributes(); ?> class="no-js" />
        <!--<![endif]-->
        <!--[if IE]> <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script> <![endif]-->
        <!--[if IE]> <script type="text/javascript" src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script> <![endif]-->
        <!--[if IE]> <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" /> <![endif]-->
        <?php get_template_part('includes/fb-script'); ?>
        <?php get_template_part('includes/ga-script'); ?>
    </head>

    <body class="the-main-body <?php echo join(' ', get_body_class()); ?>" itemscope itemtype="http://schema.org/WebPage">
        <div id="fb-root"></div>
        <header class="container-fluid p-0" role="banner" itemscope itemtype="http://schema.org/WPHeader">
            <div class="row no-gutters">
                <div class="the-header d-none d-sm-none d-md-none d-lg-block d-xl-block col-xl-12 col-lg-12">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="the-logo col-2">
                                <a class="navbar-brand" href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>" class="img-logo"/>
                                </a>
                            </div>
                            <div class="the-navbar col-6">
                                <nav class="navbar navbar-expand-md navbar-light" role="navigation">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'header_menu',
                                        'depth'             => 2,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'bs-example-navbar-collapse-1',
                                        'menu_class'        => 'nav navbar-nav mr-auto ml-auto',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker(),
                                    ) );
                                    ?>
                                </nav>
                            </div>
                            <div class="the-social-search col-4">
                                <a id="search_btn_fixed" title="<?php _e('Haga click para realizar su busqueda', 'sombras'); ?>">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a href="https://www.facebook.com/sombrastribal/" target="_blank" title="<?php _e('Visite nuestra página de Facebook', 'sombras'); ?>"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/sombrastribal" target="_blank" title="<?php _e('Visite nuestro perfil de Twitter', 'sombras'); ?>"><i class="fa fa-twitter"></i></a>
                                <a href="https://instagram.com/sombrastribal" target="_blank"  title="<?php _e('Sigue nuestro perfil en Instagram', 'sombras'); ?>"><i class="fa fa-instagram"></i></a>

                                <?php if(function_exists('qtrans_getLanguage')) { ?>
                                <?php global $wp; ?>
                                <?php if (qtrans_getLanguage()=="en") { ?>
                                <a href="<?php echo home_url( $wp->request ); ?>?lang=en" title="<?php _e('Ver el sitio en Ingles', 'sombras'); ?>"><span class="active">EN</span></a>
                                <a href="<?php echo home_url( $wp->request ); ?>?lang=es" title="<?php _e('Ver el sitio en Español', 'sombras'); ?>"><span class="">ES</span></a>
                                <?php } else { ?>
                                <a href="<?php echo home_url( $wp->request ); ?>?lang=en" title="<?php _e('Ver el sitio en Ingles', 'sombras'); ?>"><span class="">EN</span></a>
                                <a href="<?php echo home_url( $wp->request ); ?>?lang=es" title="<?php _e('Ver el sitio en Español', 'sombras'); ?>"><span class="active">ES</span></a>
                                <?php } } ?>
                                <a id="cart_btn_fixed" title="<?php _e('Abrir Carrito', 'sombras'); ?>"><i class="fa fa-shopping-cart"></i></a>
                                <?php $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); ?>
                                <?php if ( $myaccount_page_id ) { $myaccount_page_url = get_permalink( $myaccount_page_id ); } ?>
                                <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Ingresar a mi cuenta', 'sombras'); ?>"><i class="fa fa-user-o"></i></a>
                                <div class="search-container search-container-fixed search-container-hidden">
                                    <?php get_search_form(); ?>
                                </div>
                                <div class="cart-container cart-container-fixed cart-container-hidden">
                                    <h2><?php _e('Carrito', 'sombras'); ?></h2>
                                    <?php woocommerce_mini_cart(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mobile col-12 col-sm-12 col-md-12 d-lg-none d-xl-none">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="header-mobile-container col-12">
                                <div class="row align-items-center">
                                    <div class="header-mobile-logo col-6">
                                        <a class="navbar-brand" href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>" class="img-logo"/>
                                        </a>
                                    </div>
                                    <div class="header-mobile-icon col-6">
                                        <button id="header_mobile_btn">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-mobile-menu-content header-mobile-menu-hidden">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'header_menu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'menu_class'        => '',
                        ) );
                        ?>
                        <div class="header-menu-icon-content">
                            <a id="search_btn_fixed" title="<?php _e('Haga click para realizar su busqueda', 'sombras'); ?>">
                                <i class="fa fa-search"></i>
                            </a>
                            <a href="https://www.facebook.com/sombrastribal/" target="_blank" title="<?php _e('Visite nuestra página de Facebook', 'sombras'); ?>"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/sombrastribal" target="_blank" title="<?php _e('Visite nuestro perfil de Twitter', 'sombras'); ?>"><i class="fa fa-twitter"></i></a>
                            <a href="https://instagram.com/sombrastribal" target="_blank"  title="<?php _e('Sigue nuestro perfil en Instagram', 'sombras'); ?>"><i class="fa fa-instagram"></i></a>

                            <?php if(function_exists('qtrans_getLanguage')) { ?>
                            <?php global $wp; ?>
                            <?php if (qtrans_getLanguage()=="en") { ?>
                            <a href="<?php echo home_url( $wp->request ); ?>?lang=en" title="<?php _e('Ver el sitio en Ingles', 'sombras'); ?>"><span class="active">EN</span></a>
                            <a href="<?php echo home_url( $wp->request ); ?>?lang=es" title="<?php _e('Ver el sitio en Español', 'sombras'); ?>"><span class="">ES</span></a>
                            <?php } else { ?>
                            <a href="<?php echo home_url( $wp->request ); ?>?lang=en" title="<?php _e('Ver el sitio en Ingles', 'sombras'); ?>"><span class="">EN</span></a>
                            <a href="<?php echo home_url( $wp->request ); ?>?lang=es" title="<?php _e('Ver el sitio en Español', 'sombras'); ?>"><span class="active">ES</span></a>
                            <?php } } ?>
                            <a id="cart_btn_fixed" title="<?php _e('Abrir Carrito', 'sombras'); ?>"><i class="fa fa-shopping-cart"></i></a>
                            <?php $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); ?>
                            <?php if ( $myaccount_page_id ) { $myaccount_page_url = get_permalink( $myaccount_page_id ); } ?>
                            <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Ingresar a mi cuenta', 'sombras'); ?>"><i class="fa fa-user-o"></i></a>
                            <div class="search-container search-container-fixed search-container-hidden">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



        <!-- MENU FLOTANTE -->
        <nav class="floating-nav is-hidden menu_scroll_loader">
            <div class="floating-nav__inner">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="the-header d-none d-sm-none d-md-none d-lg-block d-xl-block col-xl-12 col-lg-12">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="the-logo col-2">
                                        <a class="navbar-brand" href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>" class="img-logo"/>
                                        </a>
                                    </div>
                                    <div class="the-navbar col-6">
                                        <nav class="navbar navbar-expand-md navbar-light" role="navigation">
                                            <!-- Brand and toggle get grouped for better mobile display -->
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <?php
                                            wp_nav_menu( array(
                                                'theme_location'    => 'header_menu',
                                                'depth'             => 2,
                                                'container'         => 'div',
                                                'container_class'   => 'collapse navbar-collapse',
                                                'container_id'      => 'bs-example-navbar-collapse-1',
                                                'menu_class'        => 'nav navbar-nav mr-auto ml-auto',
                                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                                'walker'            => new WP_Bootstrap_Navwalker(),
                                            ) );
                                            ?>
                                        </nav>
                                    </div>
                                    <div class="the-social-search col-4">
                                        <a id="search_btn_sticky" title="<?php _e('Haga click para realizar su busqueda', 'sombras'); ?>">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="https://www.facebook.com/sombrastribal/" target="_blank" title="<?php _e('Visite nuestra página de Facebook', 'sombras'); ?>"><i class="fa fa-facebook"></i></a>
                                        <a href="https://twitter.com/sombrastribal" target="_blank" title="<?php _e('Visite nuestro perfil de Twitter', 'sombras'); ?>"><i class="fa fa-twitter"></i></a>
                                        <a href="https://instagram.com/sombrastribal" target="_blank"  title="<?php _e('Sigue nuestro perfil en Instagram', 'sombras'); ?>"><i class="fa fa-instagram"></i></a>

                                        <?php if(function_exists('qtrans_getLanguage')) { ?>
                                        <?php global $wp; ?>
                                        <?php if (qtrans_getLanguage()=="en") { ?>
                                        <a href="<?php echo home_url( $wp->request ); ?>?lang=en" title="<?php _e('Ver el sitio en Ingles', 'sombras'); ?>"><span class="active">EN</span></a>
                                        <a href="<?php echo home_url( $wp->request ); ?>?lang=es" title="<?php _e('Ver el sitio en Español', 'sombras'); ?>"><span class="">ES</span></a>
                                        <?php } else { ?>
                                        <a href="<?php echo home_url( $wp->request ); ?>?lang=en" title="<?php _e('Ver el sitio en Ingles', 'sombras'); ?>"><span class="">EN</span></a>
                                        <a href="<?php echo home_url( $wp->request ); ?>?lang=es" title="<?php _e('Ver el sitio en Español', 'sombras'); ?>"><span class="active">ES</span></a>
                                        <?php } } ?>
                                        <a id="cart_btn_sticky" title="<?php _e('Abrir Carrito', 'sombras'); ?>"><i class="fa fa-shopping-cart"></i></a>
                                        <?php $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); ?>
                                        <?php if ( $myaccount_page_id ) { $myaccount_page_url = get_permalink( $myaccount_page_id ); } ?>
                                        <a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('Ingresar a mi cuenta', 'sombras'); ?>"><i class="fa fa-user-o"></i></a>
                                        <div class="search-container search-container-sticky search-container-hidden">
                                            <?php get_search_form(); ?>
                                        </div>
                                        <div class="cart-container cart-container-sticky cart-container-hidden">
                                            <h2><?php _e('Carrito', 'sombras'); ?></h2>
                                            <?php woocommerce_mini_cart(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
