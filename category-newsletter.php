<?php // get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <?php 
  //================================================
  // Newsletter Category 
  // includes attachments only and links to the files
  // 
  //================================================
  ?>
        <div class="innerspace"> 
        <div class="row newspanelitems">
        <?php
                $curr_cat = single_cat_title("", false);  
                $cat = get_cat_ID($curr_cat); 
                //echo $cat;
                $today = getdate();
                //$yr = $today[ 'year' ];
                 $args = array(
                'posts_per_page'   => 10,
                'offset'           => 0,
                'category'         => $cat,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                //'year'             => $yr,
                'post_status'      => 'publish',
                'suppress_filters' => true );

                  $cisnewsletter = get_posts( $args);?>
          <div class="col-lg-9 col-md-9 col-sm-9">
              <!-- cat title was here -->
                <?php 
             
                foreach ($cisnewsletter as $post) : setup_postdata( $post ); ?>

                <?php //vars  
                global $featured_img;
                $featured_img = $post->ID; // grab here for use in article
                $title = $post->post_title;
                $pdfargs = array(
                   'post_type' => 'attachment',
                   'posts_per_page' => 1,
                   'post_status' => 'any',
                   'post_parent' => $post->ID,
                   'order'       => 'ASC',
                   ); 
                  $attachments = get_posts( $pdfargs );
                  if ($attachments){
                      foreach ($attachments as $post) : global $pdf; setup_postdata( $post );
                      $attach_link = wp_get_attachment_url($post->ID);
                ?>


                     <article <?php post_class(); ?>>
                      <?php if (has_post_thumbnail($featured_img)){ // float featured img to left
                            $attr = array(
                              'class' => 'pdf-thumb',
                            );
                            echo "<a target='_blank' href='" . $attach_link . "'>"; 
                            echo get_the_post_thumbnail($featured_img, 'thumbnail', $attr );
                            echo "</a>"; 
                            } ?>
                        <header>
                          <h2 class="entry-title"><?php echo $title; ?></h2>
                        </header>
                        <div class="entry-summary">
                          <!-- download button here -->
                         <a target="_blank" href="<?php echo $attach_link; ?>" class="btn btn-default btn-sm ">Download</a>  
                        </div>
                     </article>

                   <?php endforeach; wp_reset_postdata(); //attachment list
                    } // if attachments 
                    ?>  
               <?php endforeach; wp_reset_postdata(); ?>
          </div><!-- cols -->
          <div class="col-lg-3 col-md-3 col-sm-3">   
                <h2>News Archive</h2>
                <?php $args = array(
                  'type'            => 'yearly',
                  'limit'           => '',
                  'format'          => 'html', 
                  'before'          => '',
                  'after'           => '',
                  'show_post_count' => false,
                  'echo'            => 1,
                  'order'           => 'DESC'
                ); ?>
                <?php // wp_get_archives( $args ); ?> 

                <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
                  <option value=""><?php echo esc_attr( __( 'Select Year' ) ); ?></option> 
                  <?php wp_get_archives( array( 'type' => 'yearly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
                </select>
          </div><!-- end colums -->

      </div> <!-- end row -->
</div><!-- inner space -->