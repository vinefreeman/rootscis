<?php
// alternate home page from CIS revision1 - removed home boxes. see content-home.php home with 3 boxes.
// below just hsows home page content if any - i.e. an alert box
?> 
 	<?php if (have_posts()){ //show div if content?> 
 	<div class="row dark show-grid">
 	<?php } ?>
 			<?php while (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>
			<?php endwhile; ?>

	<?php if (have_posts()){ ?> 		
 	</div>
 	<?php } ?>
