<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auditoire
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container site-footer-widgets">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="site-footer-foot">
			<div class="container">
				<p><?php echo '<span class="site-footer-blogname">'.get_bloginfo( 'title' ).'</span>. '.get_bloginfo( 'description', 'display' ); ?></p>
				<p style="font-size: 10pt;">Copyright © 2019 - <?php echo date('Y') ?> L'auditoire.</p>
				<p style="font-size: 9pt; opacity: 0.4;">Admin : <a href="<?php echo admin_url() ?>">connexion</a>.</p>
				<p style="font-size: 9pt; opacity: 0.8;">Réalisation du site par <a href="https://github.com/the-duck" target="_blank">Mark Spurgeon</a></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap" rel="stylesheet">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/hk-grotesk" type="text/css"/> 

</body>
</html>
