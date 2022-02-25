<?php
/**
 * The template for 404 page not found
 *
 * This is the template that displays all single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

get_header(); ?>
 
	<main id="primary" class="site-main">

    <div class="not-found-page-content">
		<p>
            <?php _e( 'All of this has happened before...  Try a search.', 'tiny_spark' ); ?>
        </p>

			<?php get_search_form(); 
            ?>
	</div>	

	</main><!-- #primary -->

<?php
get_footer();

