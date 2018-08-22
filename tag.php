<?php get_header(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>
                <?php single_term_title(); ?>
            </h1>
            <hr>
            <div class="col-xl-9 col-md-9 col-sm-9 col-12">
                <?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" class="archive-item col-md-12 no-paddingl no-paddingr <?php echo join(' ', get_post_class()); ?>" role="article">
                    <picture class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('blog_img', $defaultatts); ?>
                        </a>
                        <?php else : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <img itemprop="image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.jpg" alt="No img" class="img-fluid" />
                        </a>
                        <?php endif; ?>
                    </picture>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <header>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <h2 rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
                            </a>
                            <time class="date" datetime="<?php echo get_the_time('Y-m-d') ?>" itemprop="datePublished"><?php the_time('d-m-Y'); ?></time>
                            <span class="author" itemprop="author" itemscope itemptype="http://schema.org/Person">Publicado por: <?php the_author_posts_link(); ?></span>
                        </header>
                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </article>
                <?php endwhile; ?>
                <div class="pagination col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(function_exists('wp_paginate')) { wp_paginate(); } else { posts_nav_link(); wp_link_pages(); } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
                <?php get_sidebar(); ?>
            </div>
            <?php else: ?>
            <article>
                <h2>
                    <?php _e('Disculpe, su busqueda no arrojo ningun resultado', 'sombras'); ?>
                </h2>
                <h3>
                    <?php _e('Dirígete nuevamente al', 'sombras'); ?>
                    <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'sombras'); ?>">
                        <?php _e('inicio', 'sombras'); ?>
                    </a>.</h3>
            </article>
            <?php endif; ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>
