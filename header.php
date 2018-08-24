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
                <div class="the-header col-12">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="the-logo col-4">
                                <a class="navbar-brand" href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>" class="img-logo"/>
                                </a>
                            </div>
                            <div class="the-navbar col-4">
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
                                        'menu_class'        => 'nav navbar-nav ml-auto',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker(),
                                    ) );
                                    ?>
                                </nav>
                            </div>
                            <div class="the-social-search col-4">
                                <a href=""><i class="fa fa-search"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-instagram"></i></a>

                                <div class="lang-selector">
                                    <?php if(function_exists('qtrans_getLanguage')) { ?>
                                    <?php global $wp; ?>
                                    <?php if (qtrans_getLanguage()=="en") { ?>
                                    <a href="<?php echo home_url( $wp->request ); ?>?lang=en"><span class="active">EN</span></a>
                                    <a href="<?php echo home_url( $wp->request ); ?>?lang=es"><span class="">ES</span></a>
                                    <?php } else { ?>
                                    <a href="<?php echo home_url( $wp->request ); ?>?lang=en"><span class="">EN</span></a>
                                    <a href="<?php echo home_url( $wp->request ); ?>?lang=es"><span class="active">ES</span></a>
                                    <?php } } ?>
                                </div>

                                <div class="login-container">
                                    <?php if (is_user_logged_in()) { ?>
                                    <a href="">Mi cuenta</a>
                                    <?php } else { ?>
                                    <a href="">Iniciar sesion</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- MENU FLOTANTE -->
        <nav class="floating-nav is-hidden menu_scroll_loader">
            <div class="floating-nav__inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="the-header col-12">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="the-logo col-4">
                                        <a class="navbar-brand" href="<?php echo home_url('/');?>" title="<?php echo get_bloginfo('name'); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo('name'); ?>" class="img-logo"/>
                                        </a>
                                    </div>
                                    <div class="the-navbar col-4">
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
                                                'menu_class'        => 'nav navbar-nav ml-auto',
                                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                                'walker'            => new WP_Bootstrap_Navwalker(),
                                            ) );
                                            ?>
                                        </nav>
                                    </div>
                                    <div class="the-social-search col-4">
                                        <a href=""><i class="fa fa-search"></i></a>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-instagram"></i></a>

                                        <div class="lang-selector">
                                            <?php if(function_exists('qtrans_getLanguage')) { ?>
                                            <?php global $wp; ?>
                                            <?php if (qtrans_getLanguage()=="en") { ?>
                                            <a href="<?php echo home_url( $wp->request ); ?>?lang=en"><span class="active">EN</span></a>
                                            <a href="<?php echo home_url( $wp->request ); ?>?lang=es"><span class="">ES</span></a>
                                            <?php } else { ?>
                                            <a href="<?php echo home_url( $wp->request ); ?>?lang=en"><span class="">EN</span></a>
                                            <a href="<?php echo home_url( $wp->request ); ?>?lang=es"><span class="active">ES</span></a>
                                            <?php } } ?>
                                        </div>

                                        <div class="login-container">
                                            <?php if (is_user_logged_in()) { ?>
                                            <a href="">Mi cuenta</a>
                                            <?php } else { ?>
                                            <a href="">Iniciar sesion</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
