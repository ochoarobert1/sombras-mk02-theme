<?php get_header(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <?php $page_info = get_page_by_path('archive-eventos', 'ARRAY_A', 'PAGE'); ?>
        <?php $images = rwmb_meta( 'st_image_banner', array( 'size' => 'full' ), $page_info['ID'] ); ?>
        <?php if ($images) { ?>
        <?php foreach ( $images as $image ) { $url = $image['url']; } ?>
        <div class="custom-page-banner col-12" style="background: url(<?php echo $url; ?>);">
            <div class="custom-page-banner-overlay">
                <h1><?php echo get_the_archive_title(); ?></h1>
            </div>
        </div>
        <?php } else { ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo get_the_archive_title(); ?></h1>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <section class="events-archive-current col-12">
                    <?php /* RECOLECTO TODAS LOS EVENTOS PROXIMOS */?>
                    <?php $array_posts = array(); ?>
                    <?php $args = array('post_type' => 'eventos', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date'); ?>
                    <?php query_posts($args); ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php $fecha_evento = get_post_meta(get_the_ID(), 'st_event_date', true); ?>
                    <?php $today = date("Y-m-d H:i:s"); ?>
                    <?php $date = $fecha_evento . "00:00:00"; ?>
                    <?php if ($today < $date) {  ?>
                    <?php array_push($array_posts, get_the_ID()); ?>
                    <?php } ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    <?php /* TRAIGO LOS PRÓXIMOS */?>
                    <?php if (empty($array_posts)) { $cantidad = 'post_type'; } else { $cantidad = ''; }?>
                    <?php $args = array('post_type' => 'eventos'. $cantidad, 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date', 'post__in' => $array_posts); ?>
                    <?php query_posts($args); ?>
                    <?php if (have_posts()) : ?>
                    <div class="main-events-title-container">
                        <h2><?php _e('Próximos eventos', 'sombras'); ?></h2>
                    </div>
                    <div class="events-archive-current-container">
                        <ul class="list-unstyled">
                            <?php while (have_posts()) : the_post(); ?>
                            <li class="media event-media">
                                <img class="align-self-center mr-3" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php _e('Ver información del evento', 'sombras')?>" />
                                <div class="media-body">
                                    <div class="media-title-container">
                                        <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                                        <button class="btn-md btn-eventos"><?php _e('Agregar evento a Google Calendar', 'sombras'); ?></button>
                                    </div>
                                    <?php the_excerpt(); ?>
                                    <div class="event-single-meta-container">
                                        <div class="event-single-meta-item">
                                            <strong><?php _e('Fecha:', 'sombras'); ?></strong> <?php  echo get_post_meta(get_the_ID(), 'st_event_date', true); ?>
                                        </div>
                                        <div class="event-single-meta-item">
                                            <strong><?php _e('Hora:', 'sombras'); ?></strong> <?php  echo get_post_meta(get_the_ID(), 'st_event_start_time', true); ?> - <?php  echo get_post_meta(get_the_ID(), 'st_event_end_time', true); ?>
                                        </div>

                                        <div class="event-single-meta-item">
                                            <strong><?php _e('Precio:', 'sombras'); ?></strong> <?php  echo get_post_meta(get_the_ID(), 'st_event_price', true); ?>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    <div class="main-events-title-container">
                        <h2><?php _e('Eventos anteriores', 'sombras'); ?></h2>
                    </div>
                    <div class="events-archive-current-container">
                        <ul class="list-unstyled">
                            <?php $args = array('post_type' => 'eventos', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date', 'post__not_in' => $array_posts); ?>
                            <?php query_posts($args); ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <li class="media event-media">
                                <a href="<?php the_permalink(); ?>" title="<?php _e('Ver Evento', 'sombras'); ?>">
                                    <img class="align-self-center mr-3" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?php _e('Ver información del evento', 'sombras')?>" />
                                </a>
                                <div class="media-body">
                                    <div class="media-title-container">
                                        <a href="<?php the_permalink(); ?>" title="<?php _e('Ver Evento', 'sombras'); ?>">
                                            <h5 class="mt-0 mb-1"><?php the_title(); ?></h5>
                                        </a>
                                    </div>
                                    <?php the_excerpt(); ?>
                                    <div class="event-single-meta-container">
                                        <div class="event-single-meta-item">
                                            <strong><?php _e('Fecha:', 'sombras'); ?></strong> <?php  echo get_post_meta(get_the_ID(), 'st_event_date', true); ?>
                                        </div>
                                        <div class="event-single-meta-item">
                                            <strong><?php _e('Hora:', 'sombras'); ?></strong> <?php  echo get_post_meta(get_the_ID(), 'st_event_start_time', true); ?> - <?php  echo get_post_meta(get_the_ID(), 'st_event_end_time', true); ?>
                                        </div>

                                        <div class="event-single-meta-item">
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>

                    </div>
                </section>
            </div>
        </div>

    </div>
</main>
<?php get_footer(); ?>
