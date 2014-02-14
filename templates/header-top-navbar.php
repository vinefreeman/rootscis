<div class="navbar-fixed-top"><!-- VF added this class to make entire top nav sticky on scrolling see related css to make effect. -->
 <div class="topBanner navbar-fixed-top hidden-xs">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-4 col-xs-3">
                
                <ul id="menu-header-menu" class="nav nav-pills">
                  <!-- <li class="menu-location"><a href="<?php // echo get_option('home') ?>/contact/">Location</a></li> -->
                  <li class="menu-login"><a href="http://ez.cis-security.co.uk/Logon.aspx" onclick="_gaq.push(['_trackEvent','Staff EZ Login','ez.cis-security.co.uk'])" class="btn btn-sm login">Login</a></li>
                </ul>  
                <?php
                 //wp_nav_menu(array('menu' => 'Header Menu', 'menu_class' => 'nav nav-pills'));
                ?>
              </div>
              <div class="col-lg-3 col-md-3 col-xs-3 top10 pull-right ie7">
                <?php 
                  get_template_part('templates/searchform'); 
                ?>
              </div>
              <div class="col-lg-5 col-md-5 col-xs-5 top10 pull-right iesoc">
              
                           <?php 
                  get_template_part('templates/social'); 
                ?>
                <a data-toggle="modal" class="askaquestion" href="#myModal">Ask a question</a>
              </div>
          </div>
      </div>    
  </div>
<header class="banner navbar" role="banner"><!--  was navbar-static-top -->
    <div class="container">
      <a href="http://ez.cis-security.co.uk/Logon.aspx" onclick="_gaq.push(['_trackEvent','Staff EZ Login Mobile','ez.cis-security.co.uk'])" class="btn btn-sm login visible-xs" style="float: left; width: 46px; margin: 5px 0 0 40px; padding: 2px 0; color: #918F23; border: 1px solid #7E791D; ">Login</a>
      <a class="mob-contact visible-xs" href="#sch">Search</a>
      <a class="navbar-brand hidden-xs" href="<?php echo home_url(); ?>/"><?php bloginfo('description'); ?></a><!-- cis revison1 removed shadow class -->
      <span class="strapline hidden-xs">Passion. Determination. Leadership</span>
      <!--<img class="hidden-xs pull-right strap" src="<?php bloginfo('stylesheet_directory');?>/assets/img/strapline.gif" width="" height="" />-->
      <div class="navbar-header">  
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>
      <nav class="nav-main navbar-collapse collapse" role="navigation">
        <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
            endif;
        ?>
      </nav>

    </div>
  </header>
  <div class="container mobhead visible-xs">

            <a class="navbar-brand visible-xs" href="<?php echo home_url(); ?>/"><?php bloginfo('description'); ?></a>
            <div class="pull-right visible-xs"> 
                <img class="mob-social" src="<?php bloginfo('stylesheet_directory');?>/assets/img/mobile-passion.gif" width="" height="" />
                 <?php get_template_part('templates/social'); ?>
            </div>
     </div>
  </div>
  <?php if (is_front_page()) : get_template_part('templates/page', 'hero-slide'); endif; //VF hero placement?>