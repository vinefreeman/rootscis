<?php // get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <?php 
   $round = 0; //loop count for toggle #ids on vacancies in the template below   
  ?>
  
    <div class="row jobpanels">
  
      <?php
        $post_job = get_post(302); 
        $content = $post_job->post_content;
        $nice_content = apply_filters( 'the_content', $content );
              echo "<div class='col-lg-12 col-md-12 col-sm-12 show-grid'>" . $nice_content . "</div>";
      ?> 
      
      <?php while (have_posts()) : the_post(); ?>
            
            <?php   
                  if ($round == 0) {echo '<div class="col-lg-6 col-md-6 col-sm-6"><div class="panel-group" id="accordion">';}
                  if ($round == (round($wp_query->post_count / 2))) { $acc = 1; echo "</div></div><div class='clearfix visible-xs' style='margin-top: 5px'></div><div class='col-lg-6 col-md-6 col-sm-6'><div class='panel-group' id='accordion$acc'>"; }
                  // get job meta info
                  $client = get_post_meta( $post->ID, 'job_client', true ); 
                  $pay = get_post_meta(  $post->ID, 'job_pay', true ); 
                  $shift = get_post_meta(  $post->ID, 'job_shift', true ); 
                  $ref = get_post_meta(  $post->ID, 'job_ref', true );
                  $mytitle = get_the_title($post->ID);
                  $jobname = sanitize_text_field( $mytitle ) ;

            ?>
                        
              <div class="panel panel-default">
                <div class="panel-heading"><?php if ( ! empty( $pay )){echo "<span class='badge'>" . $pay . "</span>" ;}?>
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php if (isset($acc)){echo $acc;} ?>" href="#collapse<?php echo $round;?>">
                  <?php the_title() ?>&nbsp;<span>+</span>
                  </a>            
                </div>
                <div id="collapse<?php echo $round; ?>" class="panel-collapse collapse<?php if ( $round == '0' ) { echo " in"; } ?>">
                  <div class="panel-body">
                   <?php                          
                        echo "<p class='jobdeets'>";                
                        // job ref in badge        
                        if ( ! empty( $ref )){ echo "<span class='badge'>Ref: " . $ref . "</span>" ;}
                       
                        // job details         
                        if ( ! empty( $client )){ echo "Location: <strong>" . $client . "</strong><br />" ;}
                        if ( ! empty( $pay )){ echo "Pay: <strong>" . $pay . "</strong><br />" ;}
                        
                        if ( ! empty( $shift )){ echo "Shift Information: <strong>" . $shift . "</strong>" ;}
                        echo "</p>";

                       the_content(); ?>
                       <a href="<?php echo get_option('home');  ?>/job-application-form/?jb=<?php echo $jobname;?>&amp;ref=<?php echo $ref; ?>" class='btn btn-dark apply'>Apply Online</a>
                       <?php // date
                        get_template_part('templates/job-meta');?>
                  </div>
                </div>
              </div>
           
           
             <?php if ($round == (round($wp_query->post_count) - 1)) {echo '</div></div>'; } ?>
            <?php $round ++ ;?>
     <?php endwhile; ?>
  
  </div> <!-- row -->

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>
