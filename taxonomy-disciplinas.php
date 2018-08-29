<?php get_header(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <?php $page_info = get_page_by_title('archive-disciplinas', 'ARRAY_A', 'PAGE'); ?>
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
                <section class="disciplina-video-container col-12">
                    <?php if (have_posts()) : ?>
                    <div class="container">
                        <div class="row">
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="disciplina-video-item col">
                                <div class="disciplina-video-item-wrapper">
                                    <div class="disciplina-video-item-img">
                                        <div class="disciplina-video-item-img-wrapper">
                                            <a href="<?php the_permalink(); ?>" title="<?php _e('Ver video', 'sombras'); ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/play-button.png" alt="<?php _e('Ver video', 'sombras'); ?>" class="img-fluid" />
                                            </a>
                                        </div>
                                        <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>

                                    </div>
                                    <div class="disciplina-video-item-info">
                                        <a href="<?php the_permalink(); ?>" title="<?php _e('Ver video', 'sombras'); ?>">
                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                        <h5><?php echo get_post_meta(get_the_ID(), 'st_curso_teacher', true); ?></h5>
                                        <p><?php the_excerpt(); ?></p>
                                        <div class="disciplina-video-item-level">
                                            <div class="disciplina-video-item-level-wrapper">
                                                <?php $nivel = get_post_meta(get_the_ID(), 'st_curso_nivel', true); ?>
                                                <?php for ($i = 1; $i <= $nivel; $i++) { ?>
                                                <?php echo '<span></span>'; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php else : ?>

                    <?php endif; ?>
                </section>

            </div>
        </div>

    </div>
</main>
<?php get_footer(); ?>
