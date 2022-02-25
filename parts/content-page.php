<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 
 * */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if( has_post_thumbnail() ) :
			the_post_thumbnail('large');
		endif; 
		?>

		<?php if(get_post_type() === 'post') : ?>
			<div class="single-post-meta-wrapper">
				<div class="single-blog-post-meta">
					<p><?php the_category(', '); ?></p>
					<p> | By: <?php the_author(); ?>  </p>
				</div>
				<div class="single-post-date-updated"> 
					<?php
						echo "<p>Updated on "; 
						the_modified_time('F jS, Y'); 
						echo "</p> "; 
					?> 
				</div>
			</div>
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gutenberg-starter-theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<!-- removed edit link --> 
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-
