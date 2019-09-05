<article id="post-<?php the_ID(); ?>" class="card">
  <?php 
    the_title( '<h2 class="card-headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    auditoire_post_thumbnail();
  ?>
  <div class="card-description">
    <a href="<?php echo esc_url( get_permalink());?>">
      <?php the_excerpt()?>
    </a>
  </div>
  <div class="card-info">
    <?php auditoire_posted_on(); auditoire_posted_by(); ?>
  </div>
</article>