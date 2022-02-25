<?php
/**
 * The template for displaying all single posts
 *
 * This is the template that displays all single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */

get_header(); ?>

	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();