<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
        <!--<div class="innerspace">-->
    <!--<div class="entry-content">-->
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 show-grid">
<!-- featured image-->
       <?php $attr = array(
            'class' => "img-responsive",
            'alt' => trim(strip_tags( $attachment->post_excerpt )),
            'title' => trim(strip_tags( $attachment->post_title )),
    );
            if (has_post_thumbnail()){
            the_post_thumbnail( 'full', $attr) ; 
          } else { ?>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/newstaff.jpg" class='img-responsive' />
          <?php } ?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-7 col-xs-12">
<!-- content-->
    <?php the_content(); ?>
    <?php 
    global $thispost;
    $thispost = $post->ID ; 
     ?>
    </div>
    <div class="col-lg-4 col-md-4 col-md-offset-1 cold-sm-12 col-xs-12 sidestaff">
<!-- featured image-->

      <?php //while (have_posts()) : the_post();
          $args = array(
        'posts_per_page'   => -1,
        'offset'           => 0,
        'category'         => '',
        'orderby'          => 'post_date',
        'order'            => 'ASC',
        'include'          => '',
        'exclude'          => $thispost,
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'manteam',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

          $cisstaff = get_posts( $args);?>
          <ul class="manteam">
          <?php foreach ($cisstaff as $staff) : setup_postdata( $staff );
       //$content = $staff->post_content;
          $title = get_post_meta( $staff->ID, 'job_title', true );
          $person = $staff->post_title;
         $link = get_permalink($staff->ID);
        echo "<li>";?>
        <a href="<?php echo $link; ?>" title="<?php echo $person; ?>">
        <span class="golink">+</span>  
        <?php $attr = array(
            'class' => "img-responsive",
            'alt' => trim(strip_tags( $attachment->post_excerpt )),
            'title' => trim(strip_tags( $attachment->post_title )),
    );
            if (has_post_thumbnail($staff->ID)){
            echo get_the_post_thumbnail( $staff->ID, 'staff-minithumb', $attr) . "<br />"; 
          } else { ?>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/newstaff-77.jpg" class="img-responsive" /><br /></a>
        <?php } ?>
        <div class="mteam-info">
        <a href="<?php echo $link; ?>" title="<?php echo $person; ?>">
        <?php echo "<span class='jperson'>" . $staff->post_title . "</span>"; ?>
        
        <?php echo "</a></div></li>"; ?>
        <?php $round ++ ;?>
        <?php //endwhile; 
        endforeach; ?> 
        </ul>




    </div>
    
     
      
    <!--</div>-->
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
   <!-- </div> -->
 </div> <!-- row -->
  </article>

<?php endwhile; ?>
