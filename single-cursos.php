<?php get_header(); ?>
<?php the_post(); ?>
<main class="container">
    <div class="row">
        <div class="single-main-container col-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <div class="container">
                <div class="row">
                    <div class="single-curso-container col-12">
                        <div class="container">
                            <div class="row no-gutters">
                                <div class="single-curso-video-header col-12">
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                    <h3><strong><?php _e('Instructor', 'sombras'); ?>:</strong>
                                        <?php echo get_post_meta(get_the_ID(), 'st_curso_teacher', true); ?>
                                    </h3>
                                </div>
                                <div class="single-curso-video-container col-9">
                                    <div class="single-curso-video-wrapper">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe src="https://player.vimeo.com/video/<?php echo sombras_vimeo_fetch(get_post_meta(get_the_ID(), 'st_curso_link', true)); ?>" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-curso-video-sidebar col-3">
                                    membresias ideas
                                </div>
                                <div class="w-100"></div>
                                <div class="single-curso-info-container col-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Comentarios</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h4>
                                                <?php _e('Descripción del Video', 'sombras'); ?>:</h4>
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <?php get_template_part('templates/templates-comment'); ?>
                                        </div>
                                    </div>

                                    <div class="w-100"></div>

                                </div>
                                <div class="single-curso-meta-container col-12">
                                    <div class="single-curso-disciplina">
                                        <div class="single-curso-disciplina-wrapper">
                                            <h4>
                                                <?php _e('Disciplina', 'sombras')?>:</h4>
                                            <?php $terms = get_the_terms(get_the_ID(), 'disciplinas'); ?>
                                            <?php foreach ($terms as $term) { ?>
                                            <?php $currentterm = $term->term_id; ?>
                                            <a href="<?php echo get_term_link($term); ?>" title="<?php _e('Ver Disciplina', 'sombras')?>">
                                                <p>
                                                    <?php echo $term->name; ?>
                                                </p>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="single-curso-dificultad">
                                        <div class="single-curso-dificultad-wrapper">
                                            <h4>
                                                <?php _e('Dificultad', 'sombras')?>:</h4>
                                            <div class="disciplina-video-item-level-wrapper">
                                                <?php $nivel = get_post_meta(get_the_ID(), 'st_curso_nivel', true); ?>
                                                <?php for ($i = 1; $i <= $nivel; $i++) { ?>
                                                <?php echo '<span></span>'; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $post_ID = get_the_ID(); ?>
                                <div class="single-curso-related-videos col-12">
                                    <h2>
                                        <?php _e('Videos Relacionados', 'sombras'); ?>
                                    </h2>
                                    <?php $args= array('post_type' => 'cursos', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'ASC', 'post__not_in' => array($post_ID), 'tax_query' => array( array( 'taxonomy' => 'disciplinas', 'field'    => 'ID', 'terms'    => $currentterm, ))); ?>
                                    <?php query_posts($args); ?>
                                    <?php if (have_posts()) : ?>
                                    <div class="container">
                                        <div class="row">
                                            <?php while (have_posts()) : the_post(); ?>
                                            <div class="related-videos-item col">
                                                <div class="related-videos-item-wrapper">
                                                    <div class="related-videos-item-img">
                                                        <div class="related-videos-item-img-wrapper">
                                                            <a href="<?php the_permalink(); ?>" title="<?php _e('Ver video', 'sombras'); ?>">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/images/play-button.png" alt="<?php _e('Ver video', 'sombras'); ?>" />
                                                            </a>
                                                        </div>
                                                        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                                    </div>
                                                    <div class="related-videos-item-info">
                                                        <a href="<?php the_permalink(); ?>" title="<?php _e('Ver video', 'sombras'); ?>">
                                                            <h3><?php the_title(); ?></h3>
                                                        </a>
                                                        <?php the_excerpt(); ?>
                                                        <div class="related-videos-item-meta">
                                                            <h4>
                                                                <?php _e('Nivel', 'sombras'); ?>
                                                            </h4>
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
                                    <?php endif; ?>
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
