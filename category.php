<?php // get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <?php 
  //================================================
  // Cat template includes the cat buttons above 
  // above innerspace container then featured boxes
  // then post list and year archive.
  //================================================
  ?>
        <div class="innerspace"> 
        <div class="row newspanelitems">
        <?php
                $curr_cat = single_cat_title("", false);  
                $cat = get_cat_ID($curr_cat); 
                $today = getdate();
                //$yr = $today[ 'year' ];
                $args = array(
                'posts_per_page'   => 6,
                'offset'           => 0,
                'category'         => $cat,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                //'year'             => $yr,
                'post_status'      => 'publish',
                'suppress_filters' => true );

                  $cisnewslist = get_posts( $args);?>
          <div class="col-lg-9 col-md-9 col-sm-9">
              <!-- cat title was here -->
                <?php global $post;
                foreach ($cisnewslist as $post) : setup_postdata( $post );   ?>
                <?php //vars 
                $title = $post->post_title;
                $link = get_permalink($post->ID);
                $snip =  get_the_excerpt();
                ?>
                     <article <?php post_class(); ?>>
                        <header>
                        <h2 class="entry-title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                         <?php $postdate = mysql2date('j M Y', $post->post_date);?>
                            <span class="meta<?php if (is_archive()){echo " archive";} ?>"><?php echo $postdate; ?></span>
                        </header>
                        <div class="entry-summary">
                        <?php if (in_category(array('newsletter','security-bulletin'), $post->ID)) {} else { echo $snip; } ?>
                        </div>
                     </article>
                <?php endforeach; wp_reset_query(); ?>
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