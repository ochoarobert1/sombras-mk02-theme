<?php get_header(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <?php $page_info = get_page_by_title('archive-cursos', 'ARRAY_A', 'PAGE'); ?>
        <section class="page-banner col-12">
            <h1><?php echo single_term_title(); ?></h1>
        </section>
        <div class="container">
            <div class="row">
                <div class="archive-cursos-content col-12">
                    <?php echo apply_filters('the_content', $page_info['post_content']); ?>
                </div>
                <section class="col-12">
                    <h2 class="text-center"><?php _e('Disciplinas Disponibles', 'sombras'); ?></h2>
                    <?php $terms = get_terms( array( 'taxonomy' => 'disciplinas', 'hide_empty' => false ) ); ?>
                    <div class="row">
                        <?php foreach($terms as $term){ ?>
                        <div class="disciplinas-item col">
                            <?php $term_img = get_term_meta($term->term_id, 'disciplinas-logo', true); ?>
                            <a href="<?php echo get_term_link($term); ?>" title="<?php _e('Ver disciplina', 'sombras'); ?>">
                                <?php echo wp_get_attachment_image($term_img, 'medium', false, array('class' => 'img-fluid')); ?>
                            </a>
                            <a href="<?php echo get_term_link($term); ?>" title="<?php _e('Ver disciplina', 'sombras'); ?>">
                                <h3><?php echo $term->name;?></h3>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>

    </div>
</main>
<?php get_footer(); ?>
