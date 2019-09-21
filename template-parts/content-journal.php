
<?php 
  $meta = get_post_meta(get_the_ID(), 'journal_attachment', true);
  $pdf_file = wp_get_attachment_url($meta);  
?>
<div class="content-pdf-container">
  <iframe class="content-pdf" src="<?php echo $pdf_file; ?>" frameborder="0">
  </iframe>
</div>