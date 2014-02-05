<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="innerspace">
    <div class="entry-content">

     <?php if(get_post_meta( $post->ID, '_nicetitle', true )){
        echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
      } ?>

      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
    <div class="nextpostnav">
      <p class="blue">Other news...</p>
        <div class="previous"><?php previous_post_link('< %link','%title',TRUE); ?></div>
        <div class="next"><?php next_post_link('%link >','%title',TRUE); ?></div>
        <p class="clearfix">&nbsp;</p>
    </div>

  </div>
  </article>
  <?php 
    global $single;
    $single = $post->ID ; 
    //id of curr post for exclusion in side lists
    ?>
<?php endwhile; ?>
