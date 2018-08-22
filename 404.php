<?php get_header(); ?>
<?php the_post(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <article id="post-404">
                <figure class="col-lg-5 col-lg-offset-3 col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/404.png" alt="Error 404 Imagen" class="img-fluid" />
                </figure>
                <div class="clearfix"></div>
                <div class="col-lg-5 col-lg-offset-3 col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <h1 class="text-center"><?php _e('Error 404', 'PROYECTO'); ?></h1>
                    <hr>
                    <h4 class="text-center"><?php _e('No podemos encontrar la página que buscas. Dirígete nuevamente al', 'PROYECTO'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'PROYECTO'); ?>"><?php _e('inicio', 'PROYECTO'); ?></a>.</h4>
                </div>
                <div class="clearfix"></div>
            </article>
        </section>
    </div>
</main>
<?php get_footer(); ?>
