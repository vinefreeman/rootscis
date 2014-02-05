<?php //get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <div class="col-lg-6 col-md-6">
    <p class="yel">Search the CIS website:</p>
  <?php get_search_form(); ?>
</div>
  <?php $noinner = true; ?>
<?php endif; ?>

<?php if (is_home()){ // check for main news page

     get_template_part('templates/content', 'blog-current'); 

    } else {?>
<?php if (!isset($noinner)){ // display innder div ?><div class="innerspace"><!-- containing bx--><?php } ?>
<?php 
while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
<?php if (!isset($noinner)){?></div><!-- /innerspace --><?php } ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older news', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('More recent news &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
<? } // end bloghome check for main news page ?>
