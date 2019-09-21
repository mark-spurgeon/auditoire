<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package auditoire
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
	<header class="content-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="content-title">', '</h1>' );
		else :
			the_title( '<h2 class="content-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="content-meta">
				<?php auditoire_posted_on(); echo ', par '; coauthors_posts_links(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php 
		$color = 'rgb(80, 80, 80)';
		if (function_exists('wp_get_terms_meta')) { 
			$color = wp_get_terms_meta(get_the_category()[0]->term_id, 'category_color', true);
		}; 
		?>
	</header><!-- .entry-header -->
	<div class="content-color-hint" style="border-top-color: <?php echo $color; ?>">

	</div>
	<?php auditoire_post_thumbnail(); ?>

	<div class="content-body">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<div class="content-footer">
		<?php auditoire_entry_footer(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
