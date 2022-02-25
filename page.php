<?php

/**
 * The template for displaying all pages
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @since 0.1.0
 */

get_header(); ?> 

<main id="primary">

    <?php 
    while ( have_posts() ) : 
    
        the_post();
        get_template_part( 'parts/content', 'page' );

    endwhile;

    ?> 
</main>

<?php 
get_footer();