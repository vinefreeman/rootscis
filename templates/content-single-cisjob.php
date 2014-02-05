<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
   
    <div class="innerspace">
    <div class="entry-content">

   <?php  // Custom job fields 
        $client = get_post_meta( $post->ID, 'job_client', true ); 
       $pay = get_post_meta(  $post->ID, 'job_pay', true ); 
        $shift = get_post_meta(  $post->ID, 'job_shift', true ); 
        $ref = get_post_meta(  $post->ID, 'job_ref', true );
     
     if ( ! empty( $client )){ echo "<p><strong>Client/Location:</strong> " . $client . "</p>" ;}
      if ( ! empty( $pay )){ echo "<p><strong>Pay:</strong> " . $pay . "</p>" ;}
       if ( ! empty( $shift )){ echo "<p><strong>Shift Information:</strong> " . $shift . "</p>" ;}
        if ( ! empty( $ref )){ echo "<p><strong>Job Ref:</strong> " . $ref . "</p>" ;}
$mytitle = get_the_title($post->ID);
       $jobname = sanitize_text_field( $mytitle ) ;       
      ?>
        <a href="<?php echo get_option('home');  ?>/job-application-form/?jb=<?php echo $jobname;?>&amp;ref=<?php echo $ref; ?>" class='btn btn-dark apply' style="float: none !important;">Apply Online</a>


      <?php the_content(); 

      ?>




   

      

    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
   </div>
  </article>
<?php endwhile; ?>
