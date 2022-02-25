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

           // if blog home is set as homepage
           if ( is_home() && is_front_page() ) :
               ?> 
               <header> 
                   <h1> 
                       <?php single_post_title(); ?> 
                   </h1>
               </header>
               <?php
           endif;        
       
       /* The Loop (blog home) */ 

       while ( have_posts() ):
           the_post();
           get_template_part( 'template-parts/content', 'excerpt' );
       endwhile;

           // the posts navigation goes here

   else: 

       get_template_part( 'template-parts/content', 'none');
       
   endif;
   ?>
</main> 

<?php 
get_footer();


   