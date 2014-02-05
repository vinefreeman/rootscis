<h3 class="innov">Innovative Leadership</h3>
<?php //while (have_posts()) : the_post();
      		$largs = array(
				'posts_per_page'   => 1,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'rand',
				'order'            => 'ASC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'manteam',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

      		$leaders = get_posts( $largs);?>
      		
      		<ul class="leaders">
      		<?php foreach ($leaders as $team) : setup_postdata( $team );
			 //$content = $staff->post_content;
      		$title = get_post_meta( $team->ID, 'job_title', true );
          $person = $team->post_title;
         $link = get_permalink($team->ID);
				echo "<li>";?>
        <a href="<?php echo $link; ?>" title="<?php echo $person; ?>">
        <span class="golink">&rarr;</span>  
        <?php $attr = array(
            'class' => "img-responsive",
            'alt' => trim(strip_tags( $attachment->post_excerpt )),
            'title' => trim(strip_tags( $attachment->post_title )),
    );
        echo "<div class='leader-img'>";
		       	if (has_post_thumbnail($team->ID)){

		            echo get_the_post_thumbnail( $team->ID, 'staff-list', $attr) . "<br />"; 
		          } else { ?>
		            <img src="<?php bloginfo('template_url'); ?>/assets/img/newstaff-150.jpg" class="img-responsive" /><br /></a>
		        <?php } 
		echo "</div>";?>
        <div class="mteam-info">
        <a href="<?php echo $link; ?>" title="<?php echo $person; ?>">
				<?php echo "<span class='jperson'>" . $team->post_title . "</span>"; ?>
        <?php if ($title) {echo "<br /><span class='jtitle'>" . $title . "</span>";} ?>
				<?php echo "</a></div></li>"; ?>
			  <?php// $round ++ ;?>
 		    <?php //endwhile; 
     		endforeach; ?> 
     		</ul>
      
