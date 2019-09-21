<article id="post-<?php the_ID(); ?>" class="card">
  <?php 
    the_title( '<h2 class="card-headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    auditoire_post_thumbnail();
  ?>
  <div class="card-description">
    <a href="<?php echo esc_url( get_permalink());?>" title="<?php the_title(null, false) ?>">
      <?php the_excerpt()?>
    </a>
  </div>
  <div class="card-info">
    <?php auditoire_posted_on(); echo ', par '; coauthors_posts_links(); ?>
  </div>
</article>