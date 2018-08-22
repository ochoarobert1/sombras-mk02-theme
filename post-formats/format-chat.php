<?php /* POST FORMAT - AUDIO */ ?>

<article id="post-<?php the_ID(); ?>" class="the-single col-md-9 <?php echo join(' ', get_post_class()); ?>"  itemscope itemtype="http://schema.org/BlogPosting">
    <?php if ( has_post_thumbnail()) : ?>
    <picture>
        <?php the_post_thumbnail('single_img', $defaultargs); ?>
    </picture>
    <?php endif; ?>
    <header>
        <a href="<?php echo get_edit_post_link(); ?> "><i class="fa fa-edit fa-2x pull-right"></i></a>
        <h1 itemprop="name"><?php the_title(); ?></h1>
        <?php the_tags( __( 'Tags: ', 'PROYECTO' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
    </header>
    <div class="post-content" itemprop="articleBody">
        <?php the_content() ?>
        <?php wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'PROYECTO' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>', ) ); ?>
        <footer>
            <p>Categorias: <?php the_category(', '); // Separated by commas ?></p>
            <span class="date" datetime="<?php echo get_the_time('Y-m-d') ?>"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
            <span class="author" itemprop="author" itemscope itemptype="http://schema.org/Person">Publicado por: <?php the_author_posts_link(); ?></span>
        </footer>
    </div><!-- .post-content -->
    <meta itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-d') ?>" content="<?php echo get_the_date('i') ?>">
    <meta itemprop="author" content="<?php echo esc_attr(get_the_author()) ?>">
    <meta itemprop="url" content="<?php the_permalink() ?>">
    <?php if ( comments_open() ) { comments_template(); } ?>
</article> <?php // end article ?>