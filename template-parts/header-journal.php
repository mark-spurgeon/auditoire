<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auditoire
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/hk-grotesk" type="text/css"/> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'auditoire' ); ?></a>
	<?php 
		$meta = get_post_meta(get_the_ID(), 'journal_attachment', true);
		$pdf_file = wp_get_attachment_url($meta);  
	?>

	<header id="masthead" class="site-header journal" style="background-image: url(<?php echo get_header_image(); ?>)">
		<div class="container site-header-top" style="color: <?php echo $current_category_color; ?>">
			<div class="site-header-logo">
				<?php the_custom_logo(); ?>
			</div>
			<div class="site-header-top-middle">
				<!-- nothing here, but maybe should add something ? -->
			</div>
			<div class="site-header-links-social">
				<ul style="flex-direction: row-reverse">
					<?php if (get_theme_mod('social_twitter') != ''): ?>
					<li>
            <a target="_blank" href="<?php echo get_theme_mod('social_twitter', '#'); ?>"><i class="fab fa-twitter"></i></a>
					</li>
					<?php endif; if (get_theme_mod('social_fb') != ''): ?>
					<li>
            <a target="_blank" href="<?php echo get_theme_mod('social_fb', '#'); ?>"><i class="fab fa-facebook"></i></a>
					</li>
					<?php endif; if (get_theme_mod('social_insta') != ''): ?>
					<li>
            <a target="_blank" href="<?php echo get_theme_mod('social_insta', '#'); ?>"><i class="fab fa-instagram"></i></a>
					</li>
					<?php endif; if (get_theme_mod('social_yt') != ''): ?>
					<li>
            <a target="_blank" href="<?php echo get_theme_mod('social_yt', '#'); ?>"><i class="fab fa-youtube"></i></a>
					</li>
					<?php endif; ?>

					<?php if ($pdf_file != null): ?>
					<li class="site-header-download">
						<a target="_blank" href="<?php echo $pdf_file ?>">					
							📥 Télécharger
						</a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
