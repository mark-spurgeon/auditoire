<?php 
	$journaux = new WP_Query( array(
		'post_type' => 'journal',
		'posts_per_page' => 1 // put number of posts that you'd like to display
	) );
  
  if ($journaux->have_posts()) {
		while ( $journaux->have_posts() ) {
			$journaux->the_post(); 
			$color = get_post_meta(get_the_ID(), 'journal_color', true);
			?>
			<div class="widget">
				<h2 class="widget-title">Télécharger le dernier numéro</h2>
			  <div class="card-journal-container" style="border-color: <?php echo $color ?>;">
					<?php get_template_part('template-parts/card', get_post_type()); ?>
					<ul>
					  <?php 
						$links = wp_get_nav_menu_items( get_nav_menu_locations()['journal-ad-links']);
						foreach ($links as $link) {
						?>
							<li>
								<a href="<?php echo esc_url($link->url); ?>">➢ <?php echo $link->title; ?></a>
							</li>
						<?php }; ?>
					</ul>
				</div>
			</div>
			<?php
		};
	};
?>