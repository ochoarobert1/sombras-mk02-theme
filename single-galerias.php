<?php get_header(); ?>
<?php the_post(); ?>
<main class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="custom-page-banner col-12" style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
            <div class="custom-page-banner-overlay">
                <h1 itemprop="headline" class="animated fadeIn">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
        <div class="single-main-container col-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <div class="container">
                <div class="row">
                    <div class="single-galerias-container col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $args = array('post_type' => 'galerias', 'posts_per_page' => 3, 'order' => 'DESC', 'orderby' => 'date', 'post__not_in' => array(get_the_ID()) ); ?>
        <?php query_posts($args); ?>
        <?php if (have_posts()) : ?>
        <div class="single-galerias-related-container col-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <div class="container">
                <div class="row">
                    <div class="single-galerias-related-content col-12">
                        <h4><?php _e('¿Quieres ver más Galerias?', 'sombras'); ?></h4>
                        <?php while (have_posts()) : the_post();  ?>
                        <div class="archive-galerias-item col-4">
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
            </div>
        </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</main>
<?php get_footer(); ?>
