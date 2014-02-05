 <?php 
 	$args = array(
 		'posts_per_page'   => 3,
	'offset'           => 0,
	'category'         => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'homebox',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true
 		);		
 	$posts_array = get_posts( $args ); ?>
 	<div class="row dark feature show-grid">
 	 	<?php foreach ( $posts_array as $post ): setup_postdata( $post );?>
 		<?php $boxlink = get_post_meta(  $post->ID, 'box_url', true ); //is url set on home box ?>
 		
 		<div class="col-lg-4 col-md-4 col-sm-4 clearfix">
 			<?php //first see if link and place around the image - if there is one else just image, else fallback image
 			if ( ! empty( $boxlink ) && has_post_thumbnail()){
				
					echo "<a href='http://"  .  $boxlink .  "' title='CIS Security'>";
					the_post_thumbnail('full', array('class' => 'img-responsive link'));
					echo '</a>';
				 
			} elseif (empty( $boxlink ) && has_post_thumbnail()) { // image no link
					the_post_thumbnail('full', array('class' => 'img-responsive hold'));
			}  elseif ((! empty( $boxlink )) &&  (has_post_thumbnail() == false) ){ // image no link
					
				echo "<a href='http://"  .  $boxlink .  "' title='CIS Security'>"; ?>
				<img src="<?php bloginfo('stylesheet_directory');?>/assets/img/feature-hold-img.jpg" class="img-responsive booyah">
				<?php echo '</a>';

			} else { // display holding image ?>
					<img src="<?php bloginfo('stylesheet_directory');?>/assets/img/feature-hold-img.jpg" class="img-responsive neither">

			<?php } ?>

			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>

			<?php //show link from home box page
				
     	    	 if ( ! empty( $boxlink )){ echo "<a href='http://" . $boxlink . "' class='btn btn-dark'>read more</a>" ;}
			?>     	   
		</div>

 	<?php endforeach; 
 	wp_reset_postdata(); ?>
 	</div>

 	<div class="row dark show-grid">
 			<?php while (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>
			<?php endwhile; ?>
 	</div>