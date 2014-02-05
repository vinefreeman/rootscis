<div class="innerspace"><!-- white background container -->
	<div class="row">
		<?php 
				if(get_post_meta( $post->ID, '_nicetitle', true )){
					echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
				}
			?>
		<div class="col-sm-12 col-md-9 col-lg-9 show-grid">
			
			<?php while (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>
			<?php endwhile; ?>

			<?php get_template_part('templates/content', 'job-app'); ?>

		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 miniside">

			<!-- Form Requirements -->
			 <p>Please Note: all fields marked * are MANDATORY.</p><br />
                <p><em>Form Sections:</em><br />1. <strong>Personal Information</strong><br />
                2. <strong>Position / Availability</strong><br />
                3. <strong>Employment History</strong></p>
			
		</div>
	</div>
</div>