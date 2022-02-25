<?php


/**
 * Main template file
 *  
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

get_header(); ?>

<main id="primary"> 
    <?php 
       if ( have_posts() ) :  
       
       /* The Loop (blog home) */ 

       while ( have_posts() ):
           the_post();
           get_template_part( 'parts/content', 'excerpt' );
       endwhile;

           // the posts navigation goes here

   else: 

       get_template_part( 'parts/content', 'none');
       
   endif;
   ?>
</main> 

<?php 
get_footer();

