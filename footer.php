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
				<p style="font-size: 10pt;">© 2019 - <?php echo date('Y') ?> L'auditoire.</p>
				<p style="font-size: 10pt; opacity: 0.4;">Admin : <a href="<?php echo admin_url() ?>">connexion</a>.</p>

			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
