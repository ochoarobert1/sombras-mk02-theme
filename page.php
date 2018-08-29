<?php get_header(); ?>
<?php the_post(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">
        <section class="page-container col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
            <?php $images = rwmb_meta( 'st_image_banner', array( 'size' => 'full' ) ); ?>
            <?php if ($images) { ?>
            <?php foreach ( $images as $image ) { $url = $image['url']; } ?>
            <div class="custom-page-banner col-12" style="background: url(<?php echo $url; ?>);">
                <div class="custom-page-banner-overlay">
                    <h1 itemprop="headline" class="animated fadeIn"><?php the_title(); ?></h1>
                </div>
            </div>
            <?php } else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 itemprop="headline" class="animated fadeIn"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" class="page-content col-12 <?php echo join(' ', get_post_class()); ?>">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>


        </section>
    </div>
</main>
<?php get_footer(); ?>
