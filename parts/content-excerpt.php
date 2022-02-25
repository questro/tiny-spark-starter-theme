<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
*/

?>

<article>
    
    <div class="post-excerpt-wrapper">
    <?php 
        if ( has_post_thumbnail() ) :
            the_post_thumbnail();
        endif;    
    ?>
        <h2> 
            <?php the_title(); ?> 
        </h2>

        <p>
            <?php the_excerpt(); ?>  
        </p>

        <div class="wp-block-buttons">
            <div class="wp-block-button">
                <a href="<?php the_permalink(); ?>" class="wp-block-button__link"> Read the Post </a></div>
        </div> 
    </div>          


</article>
