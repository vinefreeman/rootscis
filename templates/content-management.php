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
  
    <div class="row staffpanels">
  
      <?php
        $post_man = get_post(106); 
        $content = $post_man->post_content;
        $nice_content = apply_filters( 'the_content', $content );
              echo "<div class='col-lg-12 col-md-12 col-sm-12 show-grid'>" . $nice_content . "</div>";
      ?> 
      
      <?php //while (have_posts()) : the_post();
      		$args = array(
				//'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'menu_order',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'manteam',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

      		$cisstaff = get_posts( $args);?>
      		<div class="col-lg-12 col-md-12 col-sm-12">
      		<div class="panel-group" id="accordion">	
      		<?php foreach ($cisstaff as $staff) : setup_postdata( $staff );
      			# code...
      		$title = get_post_meta( $staff->ID, 'job_title', true );
       			?>
       			 	
            	
            		

		        		 <div class="panel panel-default">
		            		<div class="panel-heading"><?php // if ( ! empty( $pay )){echo "<span class='badge'>" . $pay . "</span>" ;}?>
			                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $round;?>">
							  <?php
							   echo get_the_post_thumbnail( $staff->ID, array(100,200));
							   echo $staff->post_title; ?>&nbsp;-&nbsp;<?php if ($title) {echo $title;} ?><span>+</span>
			                  </a>            
			                </div>
			                <div id="collapse<?php echo $round; ?>" class="panel-collapse collapse<?php // if ( $round == '0' ) { echo " in"; } ?>">
			                  	<div class="panel-body">
		                   <?php                          
		                        echo "<p class='jobdeets'>";                
		                        // job ref in badge        
		                       // if ( ! empty( $ref )){ echo "<span class='badge'>Ref: " . $ref . "</span>" ;}
		                       
		                                  the_content(); ?>
		                       
			                   	</div>
			                </div>
			            </div>

            		
            	
            
             
            <?php $round ++ ;?>
 		    <?php //endwhile; 
     		endforeach; ?>
     		</div>
     		</div>
  
  </div> <!-- row -->

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>
