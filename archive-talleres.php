<?php get_header(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <?php $page_info = get_page_by_path('archive-talleres', 'ARRAY_A', 'PAGE'); ?>
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
                <div class="archive-talleres-content col-12">
                    <?php echo apply_filters('the_content', $page_info['post_content']); ?>
                </div>
                <section class="archive-talleres-container col-12">
                    <?php if ( have_posts() ) : ?>
                    <div class="container">
                        <div class="row">
                            <?php while ( have_posts() ) : the_post(); ?>
                            <div class="archive-talleres-item col-4">
                                <a href="<?php the_permalink(); ?>" title="<?php _e('Ver Galería', 'sombras'); ?>">
                                    <?php the_post_thumbnail('galerias_img', array('class' => 'img-fluid')); ?>
                                </a>
                                <a href="<?php the_permalink(); ?>" title="<?php _e('Ver Galería', 'sombras'); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>

    </div>
</main>
<?php get_footer(); ?>
