<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package auditoire
 */

require get_template_directory() . '/template-parts/header-journal.php';
?>

	<div class="error-404">
		<main id="main" class="container">

			<section class="not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Erreur 404', 'auditoire' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( "Cet article n'existe pas...", 'auditoire' ); ?></p>
					<p><?php esc_html_e( "Il s'agit peut-être d'une erreur de notre part. Dans ce cas, contactez-nous par e-mail : auditoire@gmail.com", 'auditoire' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
