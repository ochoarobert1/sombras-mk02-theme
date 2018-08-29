<?php get_header(); ?>
<?php the_post(); ?>
<main class="container">
    <div class="row">
        <div class="single-main-container col-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <div class="row">
                <div class="single-curso-container col-12">

                    <div class="container">
                        <div class="row">
                            <div class="single-curso-video-header col-12">
                                <h1><?php the_title(); ?></h1>
                                <h3><?php _e('Instructor', 'sombras'); ?>: <?php echo get_post_meta(get_the_ID(), 'st_curso_teacher', true); ?></h3>
                            </div>
                            <div class="single-curso-video-container col-9">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="https://player.vimeo.com/video/<?php echo sombras_vimeo_fetch(get_post_meta(get_the_ID(), 'st_curso_link', true)); ?>" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media"></iframe>
                                </div>
                            </div>
                            <div class="single-curso-video-sidebar col-3">
                                membresias ideas
                            </div>
                            <div class="w-100"></div>
                            <div class="single-curso-info-container col-12">
                                <h4><?php _e('Descripción del Video', 'sombras'); ?>:</h4>
                                <?php the_content(); ?>
                                <div class="w-100"></div>

                            </div>
                            <div class="single-curso-meta-container col-12">
                                <div class="single-curso-disciplina">
                                    <div class="single-curso-disciplina-wrapper">
                                        <h4><?php _e('Disciplina', 'sombras')?>:</h4>
                                        <?php $terms = get_the_terms(get_the_ID(), 'disciplinas'); ?>
                                        <?php foreach ($terms as $term) { ?>
                                        <a href="<?php echo get_term_link($term); ?>" title="<?php _e('Ver Disciplina', 'sombras')?>"><p><?php echo $term->name; ?></p></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="single-curso-dificultad">
                                    <div class="single-curso-dificultad-wrapper">
                                        <h4><?php _e('Dificultad', 'sombras')?>:</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
