 <div class="topBanner hidden-xs">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                <?php
                  wp_nav_menu(array('menu' => 'Header Menu', 'menu_class' => 'nav nav-pills'));
                ?>
              </div>
              <div class="col-md-3 top10">
                <?php 
                  get_template_part('templates/searchform'); 
                ?>
              </div>
              <div class="col-md-2 top10">
                <p>Social</p>

              </div>
          </div>
      </div>    
  </div>
<header class="banner navbar navbar-static-top" role="banner">
   <div class="container">
     <p>Contact us</p>
          <!--<a class="mob-contact visible-xs" href="#" width="150px" >Contact Us</a>-->
      
      <a class="navbar-brand hidden-xs" href="<?php echo home_url(); ?>/"> 
      <?php bloginfo('description'); ?>
     </a>
     <button data-target=".nav-main" data-toggle="collapse" type="button" class="navbar-toggle">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
     <img class="hidden-xs pull-right strap img-responsive" src="<?php bloginfo('stylesheet_directory');?>/assets/img/strapline.gif" width="" height="" />
    <nav class="nav-main nav-collapse collapse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>-->
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
  </header>
  <div class="container mobhead">

            <a class="navbar-brand visible-xs" href="<?php echo home_url(); ?>/">
            <?php bloginfo('description'); ?>
           </a>
            <div class="pull-right"> 
                <img class="visible-xs mob-social" src="<?php bloginfo('stylesheet_directory');?>/assets/img/mobile-passion.gif" width="" height="" />
                <ul class="social-icons visible-xs">
                  <li class="in"><a href="#in">Linkedin</a></li>
                  <li class="fb"><a href="#fb">Facebook</a></li>
                  <li class="tweet"><a href="#tw">Twitter</a></li>
                  <li class="mail"><a href="#e">eMail</a></li>
                  <li class="rss"><a href="#rss">Feed</a></li>
                </ul> 
            </div>
     </div>
  
  <?php if (is_front_page()) : get_template_part('templates/page', 'hero'); endif; //VF hero placement?>
