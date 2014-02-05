<?php 
  $args = array(
  'posts_per_page'   => '',
  'offset'           => 0,
  'category'         => '',
  'orderby'          => 'post_date',
  'order'            => 'DESC',
  'include'          => '',
  'exclude'          => '',
  'meta_key'         => '',
  'meta_value'       => '',
  'post_type'        => 'homeslides',
  'post_mime_type'   => '',
  'post_parent'      => '',
  'post_status'      => 'publish',
  'suppress_filters' => true
    );    
  $slides = get_posts( $args );
  $indicators = count($slides); //see carousel indicators below ?>
<!-- carousel -->
<div class="carouselcon">
      <div id="myCarousel" class="carousel slide">
                     
      <!-- Carousel items -->
      <div class="carousel-inner">
          <?php 
          $i = 0;
          foreach ($slides as $post ) : setup_postdata( $post ); 
           #get contents of home sliders and output
              $content = get_the_content();
              ?>

                  <div class="<?php if ($i == 0){echo "active ";}  ?>item">
                    <!--<div id="large_bg_img_overlay" class="hide-xs"></div>-->
                      <?php
                        if (has_post_thumbnail()){
                            the_post_thumbnail('full', array('class' => 'img-responsive hero'));
                            } else { ?>
                                <img src="<?php bloginfo('stylesheet_directory');?>/assets/img/background-hold.jpg" class="hero img-responsive">
                           <?php }  
                      ?>
                    <!--<span class="fade"></span>-->
                      <div class="carousel-caption"><h2><span><?php echo the_title(); ?></span></h2><p><em><?php echo $content; ?></em></p></div>
                 </div>

              <?php $i ++; 
          endforeach;
          
          wp_reset_postdata(); ?>
              


      </div><!-- end carousel-inner-->


        <!-- Carousel nav needs styling --> 
          <ol class="carousel-indicators hidden-xs">
            <?php for ($j=0; $j < $indicators ; $j++) { // indicators from above?>

              <li data-target="#myCarousel" data-slide-to="<?php echo $j;  ?>"<?php if ($j == 0){echo " class='active'";} ?>></li>
            
            <?php } ?>
              
             
           </ol>     
          
          <!-- nav controls here -->
        <!--<a class="carousel-control left hidden-xs" href="#myCarousel" data-slide="prev"><img src="<?php bloginfo('stylesheet_directory');?>/assets/img/left-arr.gif"></a>
           <a class="carousel-control right hidden-xs" href="#myCarousel" data-slide="next"><img src="<?php bloginfo('stylesheet_directory');?>/assets/img/right-arr.gif"></a>-->
         
     
        <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>-->
      </div> <!-- end #myCarousel -->
        
      <!-- DOWN ARROW <img src="<?php // bloginfo('stylesheet_directory');?>/assets/img/carousel-arr.png" class="arr" width="26px" height="14px">-->
      
</div><!-- end carouselcon -->

      <!-- /carousel -->
  