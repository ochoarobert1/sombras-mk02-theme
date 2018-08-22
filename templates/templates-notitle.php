<?php
/**
* Template Name: Template - Página sin titulo
*
* @package Sombras - Escuela de Danza C.A.
* @subpackage sombras-mk02-theme
* @since Mk. 2.0
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row" role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="page-container col-12" itemprop="articleBody">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
