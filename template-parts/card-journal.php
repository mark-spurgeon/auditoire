<?php 
  $meta = get_post_meta(get_the_ID(), 'journal_attachment', true);
  $date = get_post_meta(get_the_ID(), 'journal_date', true);
  $color = get_post_meta(get_the_ID(), 'journal_color', true);
  $pdf_file = wp_get_attachment_url($meta);  

  $link = esc_url( get_permalink());
?>
<article id="post-<?php the_ID(); ?>" class="card card-journal" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <a class="card-journal-background-link" href="<?php echo $link ?>">

    </a>
    <div class="card-journal-text-box" >
      <?php   the_title( '<h2 class="card-journal-headline"><a style="background-color:'.$color.'" name="'.get_the_title().'" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
      <a class="card-journal-info" href="<?php echo esc_url( get_permalink());?>" name="<?php the_title() ?>">
        <?php echo $date ?>
      </a>
      <div class="card-journal-description">
        <a href="<?php echo esc_url( get_permalink());?>" name="<?php the_title() ?>">
          <?php the_excerpt();?>
          <meta content="description" />
        </a>
      </div>
    </div>
</article>