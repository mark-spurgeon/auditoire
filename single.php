<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auditoire
 */

get_header();
?>

	<div id="primary" class="container">
		<main id="main" class="site-index-container">
		<div class="site-index-margin">
			<!-- <?php dynamic_sidebar( 'sidebar-1' ); ?> -->
		</div>
		<div class="site-index-content site-index-content-article">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
		<div class="site-index-sidebar">
			<?php if (!is_page()) { dynamic_sidebar( 'sidebar-2-post' ); }; ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
