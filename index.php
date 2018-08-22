<?php get_header(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <section class="col">
            <h1><?php _e('Ultimas Entradas', 'PROYECTO'); ?></h1>
            <hr>
            <div class="row">
                <div class="col-9">
                    <?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="archive-item col no-paddingl no-paddingr <?php echo join(' ', get_post_class()); ?>" role="article">
                        <div class="row">
                            <picture class="col-5" >
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
                            <div class="col-7">
                                <header>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <h2 rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
                                    </a>
                                    <time class="date" datetime="<?php echo get_the_time('Y-m-d') ?>" itemprop="datePublished"><?php the_time('d-m-Y'); ?></time>
                                    <span class="author" itemprop="author" itemscope itemptype="http://schema.org/Person">Publicado por: <?php the_author_posts_link(); ?></span>
                                </header>
                                <p><?php the_excerpt(); ?></p>

                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>
                    </article>
                    <?php endwhile; ?>
                    <div class="pagination col">
                        <?php if(function_exists('wp_paginate')) { wp_paginate(); } else { posts_nav_link(); wp_link_pages(); } ?>
                    </div>
                </div>
                <div class="col-3 hidden-xs">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <?php else: ?>
            <article>
                <h2><?php _e('Disculpe, su busqueda no arrojo ningun resultado', 'PROYECTO'); ?></h2>
                <h3><?php _e('Dirígete nuevamente al', 'PROYECTO'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'PROYECTO'); ?>"><?php _e('inicio', 'PROYECTO'); ?></a>.</h3>
            </article>
            <?php endif; ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>
