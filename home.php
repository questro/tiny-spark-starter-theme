<?php

/**
 * Blog home template file
 *  
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

 get_header(); ?>

 <main id="primary"> 

    <div class="wp-block-cover alignfull"> 
        <div class="wp-block-cover__inner-container">
            <div class="wp-block-group">
                <div class="wp-block-group__inner-container">
                    <h1> Blog Home Archive </h1>
                </div> 
                </div>
                
            </div>
        </div>
    </div>

    <h2 class="blog-posts-category-header"> Recent Posts </h2>	
    
    <section class="blog-articles-list">

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
            get_template_part( 'parts/content', 'excerpt' );
        endwhile;

            // the posts navigation goes here

    else: 

        get_template_part( 'parts/content', 'none');
    endif;
    ?>
    </section>

  </main> 

<?php 

get_footer();


    