<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auditoire
 */

get_header();
?>

	<div class="container">
		<main id="main" class="site-index-container">
		<div class="site-index-margin">
			<?php
			$current_category_color = get_theme_mod('hint_color', '#575AC2');
			if (single_cat_title(null, false) != '' && function_exists('wp_get_terms_meta')) { 
				$current_category_color = wp_get_terms_meta(get_cat_ID(single_cat_title(null, false)), 'category_color', true); 
				//single_tag_title( '<h1 class="site-margin-header" style="color:'.$current_category_color.'">', '</h1>' );
			}
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
			<?php 
			if (single_cat_title(null, false) != null) { 
				require get_template_directory() . '/template-parts/widget-journal.php'; 
			};
			dynamic_sidebar( 'sidebar-1' ); 
			?>
		</div>
		<div class="site-index-content">
		<?php 
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/card', get_post_type() );
			endwhile;
		?>
			<div class="site-index-navigation">
				<?php the_posts_navigation(); ?>
			</div>
		<?php 
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
