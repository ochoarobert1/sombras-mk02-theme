<?php get_header(); ?>
<?php the_post(); ?>
<main class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="custom-page-banner col-12" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
            <div class="custom-page-banner-overlay">
                <h1 itemprop="headline" class="animated fadeIn"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="single-main-container col-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <div class="container">
                <div class="row">
                    <div class="single-event-container col-12">
                        <div class="container">
                            <div class="row">
                                <div class="single-event-content col-9">
                                    <?php the_content(); ?>
                                </div>
                                <div class="single-event-meta col-3">
                                    <div class="single-event-meta-wrapper">
                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                        <p><strong><?php _e('Dirección:', 'sombras'); ?></strong></p>
                                        <p><?php echo get_post_meta(get_the_ID(), 'st_event_dir', true); ?></p>
                                        <p><strong><?php _e('Fecha:', 'sombras'); ?></strong> <?php echo get_post_meta(get_the_ID(), 'st_event_date', true); ?></p>
                                        <p><strong><?php _e('Hora de Inicio:', 'sombras'); ?></strong> <?php echo get_post_meta(get_the_ID(), 'st_event_start_time', true); ?></p>
                                        <p><strong><?php _e('Hora de Finalización:', 'sombras'); ?></strong> <?php echo get_post_meta(get_the_ID(), 'st_event_end_time', true); ?></p>
                                        <p><strong><?php _e('Precio:', 'sombras'); ?></strong> <?php echo get_post_meta(get_the_ID(), 'st_event_price', true); ?></p>
                                        <button class="btn-md btn-eventos"><?php _e('Agregar evento a Google Calendar', 'sombras'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
