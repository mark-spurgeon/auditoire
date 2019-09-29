<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auditoire
 */

/* CONSTANTS */
$current_category = null;
$current_category_color = get_theme_mod('hint_color', '#575AC2');
if (single_cat_title(null, false) != '' && function_exists('wp_get_terms_meta')) { 
	$current_category = single_cat_title(null, false);
	$current_category_color = wp_get_terms_meta( get_cat_ID($current_category), 'category_color', true); 
} elseif (is_single() && function_exists('wp_get_terms_meta')) { 
	$current_category = get_the_category()[0]->name;
	$current_category_color = wp_get_terms_meta(get_the_category()[0]->term_id, 'category_color', true);
}; 

get_header();
?>

	<div class="container">
		<main id="main" class="site-index-container">
			<div class="site-index-margin">
				
				 <?php 
				 	require get_template_directory() . '/template-parts/widget-journal.php';
					dynamic_sidebar( 'sidebar-1' ); 
				 ?>
			</div>
			<div class="site-index-content">
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				$count = 0;
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();					
					get_template_part( 'template-parts/card', get_post_type() );
					
					$count++;

				endwhile;
				?>
				<div class="site-index-navigation">
					<?php the_posts_navigation(); ?>
				</div>
				<?php
			else :

				get_template_part( 'template-parts/card', 'none' );

			endif;
			?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
