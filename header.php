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
	<link href="https://fonts.googleapis.com/css?family=Crimson+Pro:400,400i,600,600i,900,900i&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Darker+Grotesque:800&display=swap" rel="stylesheet">

	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/hk-grotesk" type="text/css"/> 
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'auditoire' ); ?></a>

	<?php 
		$current_category = null;
		$current_category_color = '#575AC2';
		if (single_cat_title(null, false) != '' && function_exists('wp_get_terms_meta')) { 
			$current_category = single_cat_title(null, false);
			$current_category_color = wp_get_terms_meta( get_cat_ID($current_category), 'category_color', true); 
		}
	?>

	<header id="masthead" class="site-header">
		<div class="container site-header-top" style="color: <?php echo $current_category_color; ?>">

			<div class="site-header-links-social">
				<ul>
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
				</ul>
			</div>
			<div class="site-header-top-middle">
				<!-- nothing here, but maybe should add something ? -->
			</div>
			<div class="site-header-links-about">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2-about',
					'menu_id'        => 'interact-menu',
				) );
				?>
			</div>
		</div>

		<div class="container site-header-branding-container">
			<div class="site-header-branding">
				<?php 
				the_custom_logo();
				$auditoire_description = get_bloginfo( 'description', 'display' );
				if ( $auditoire_description || is_customize_preview() ) :
					?>
					<p class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $auditoire_description; /* WPCS: xss ok. */ ?></a></p>
				<?php endif; ?>
			</div>

			<button class="site-header-nav-button" onclick="toggleMenu()">
				<svg class="svg" 
					width="100%" height="100%" 
					viewBox="0 0 44 40" version="1.1" 
					xmlns="http://www.w3.org/2000/svg" 
					xmlns:xlink="http://www.w3.org/1999/xlink" 
					xml:space="preserve" xmlns:serif="http://www.serif.com/" 
					style="fill:<?php echo $current_category_color; ?>">
						<g transform="matrix(1,0,0,0.636949,0.493864,19.747)">
								<rect x="2.93" y="3.549" width="37.153" height="6.083"/>
						</g>
						<g transform="matrix(1,0,0,0.636949,0.493864,27.5624)">
								<rect x="2.93" y="3.549" width="37.153" height="6.083"/>
						</g>
						<g transform="matrix(1,0,0,0.636949,0.493864,11.8692)">
								<rect x="2.93" y="3.549" width="37.153" height="6.083"/>
						</g>
						<g transform="matrix(1,0,0,0.636949,0.493864,4.04218)">
								<rect x="2.93" y="3.549" width="37.153" height="6.083"/>
						</g>
				</svg>
			</button><!-- .site-header-nav-button -->

		</div><!-- .site-header-branding-container -->

		<nav class="container site-header-categories" id="site-header-categories" style="border-bottom-color:<?php echo $current_category_color; ?>">
			<ul>
			<?php
				$categories = wp_get_nav_menu_items( get_nav_menu_locations()['menu-1-categories']);
				foreach ($categories as $cat):
					$color = 'black';
					if (function_exists('wp_get_terms_meta')) { $color = wp_get_terms_meta(get_cat_ID($cat->title), 'category_color', true); };
					$style_prefix = null;
					if ($cat->title == $current_category) {
						$style_prefix = "color:white; background-color:".$color.';';
					}
					?>
					<li style="<?php echo $style_prefix ?>border-color: <?php echo $color; ?>">
						<a style="color: <?php if (isset($style_prefix)) { echo 'white';} else { echo $color; }; ?>" href="<?php echo esc_url($cat->url); ?>"><?php echo $cat->title; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<?php if (get_theme_mod('header_bigbanner_image') != null): ?>
	<div class="site-header-banner" style="background-color: <?php echo get_theme_mod('header_bigbanner_bg'); ?>">
			<a href="<?php echo esc_url(get_theme_mod('header_bigbanner_link')); ?>">
				<img src="<?php echo get_theme_mod('header_bigbanner_image'); ?>" />
			</a>
	</div>
	<?php endif; ?>

	<div id="content" class="site-content">
