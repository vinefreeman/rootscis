<div class="innerspace"><!-- white background container -->
	<div class="row">
		<?php 
			if (!is_home()) { 

				if(get_post_meta( $post->ID, '_nicetitle', true )){

						echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
					}
			}
		?>
		<div class="col-lg-12">
			<?php while (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>
			  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
			<?php endwhile; ?>
			<?php
				if (is_page('3738')){
					echo "<div class='col-lg-6 col-md-6'>" ;
					get_template_part('templates/content', 'feedbackform');
					echo "</div>";
				}
			 ?>
		</div>
	</div>
</div>