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
  <?php
  $round = 0; //loop count for toggle #ids on vacancies in the template below   
  ?>

  <?php //while (have_posts()) : the_post();
        $args = array(
        'posts_per_page'   => 3,
        'offset'           => 0,
        'category'         => '',
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'tag'              => 'featured', 
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => '',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

          $cisnews = get_posts( $args);?>
 <!-- innerspace was here --> 
        <div class="row newspanels show-grid">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <!-- 3 featured posts with images -->
               <h2 class="yel">Featured</h2>
               <ul class="manteam">

                       <?php global $post;
                        foreach ($cisnews as $post) : setup_postdata( $post );
                        $title = $post->post_title;
                        $link = get_permalink($post->ID);
                        $alt = get_the_excerpt();
                        echo "<li>";?>
                        <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
                  
                        <span class="golink">+</span>
                        <?php $attr = array(
                            'class' => "img-responsive",
                            'alt' => trim(strip_tags( $title )),
                            'title' => trim(strip_tags( $title )),
                         );
                         if (has_post_thumbnail($news->ID)){
                            echo "<div class='newspic'>";
                            echo get_the_post_thumbnail( $post->ID, 'full', $attr);
                            echo "</div>"; 
                             } else { ?>
                              <div class='newspic'>
                             <img src="<?php bloginfo('template_url'); ?>/assets/img/cis-security-news.jpg" class="img-responsive" /><br /></a>
                              </div>
                        <?php } ?>
                        <div class="mteam-info"> <!-- div closed in php below -->
                            <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
                            <?php echo "<span class='jperson'>" . $post->post_title . "</span>"; ?>
                            <?php echo "</a></div></li>"; ?>
                        <?php $round ++ ;?>
                        <?php //endwhile; 
                        endforeach; ?> 
                        <?php wp_reset_query(); ?>
                </ul>
            </div><!-- end main column from  line 40 -->
        </div> <!-- row -->
        <div class="innerspace"> 
        <div class="row newspanelitems">
        <?php
                $curr_cat = single_cat_title("", false);  
                $cat = get_cat_ID($curr_cat); 
                $today = getdate();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
              //  $yr = $today[ 'year' ];
                $args = array(
                'posts_per_page'   => 20,
                'offset'           => 0,
                //'category'         => $cat, list all news on current as per susan j 30/01/14
                'paged'           => $paged,
                'category'         => '',
                'tag__not_in'      => array('39'),  
                'orderby'          => 'post_date',
                'order'            => 'DESC',
               // 'year'             => $yr,
                'post_status'      => 'publish',
                'suppress_filters' => true );

                  $cisnewslist = get_posts( $args);?>
          <div class="col-lg-9 col-md-9 col-sm-9">
              <h2>Also See</h2>
                <?php global $post;
                foreach ($cisnewslist as $post) : setup_postdata( $post );   ?>
                <?php //vars 
                $title = $post->post_title;
                $link = get_permalink($post->ID);
                $snip = get_the_excerpt();
                ?>
                     <article <?php post_class(); ?>>
                        <header>
                        <h2 class="entry-title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                         <?php $postdate = mysql2date('j M Y', $post->post_date);?>
                            <span class="meta<?php if (is_archive()){echo " archive";} ?>"><?php echo $postdate; ?></span>
                        </header>
                        <div class="entry-summary">
                        <?php if (in_category(array('newsletter','security-bulletin'), $post->ID)) {the_content();} else {echo $snip;} ?>
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
<!-- post navigation jan 2014 -->
<?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>