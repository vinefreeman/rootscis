<?php if (is_front_page() ): else: ;?>
<div class="page-header">
	<?php // show job count
	#if (is_post_type_archive( 'cisjob' )){
	#	$count_posts = wp_count_posts('cisjob'); 
	#	$jobs = $count_posts->publish;
	#	$showme = true;
	#}
	?>
	
  	<h1><?php echo roots_title(); ?><?php // badge for number of jobs removed in rev1 -- if ($showme){echo "<span class='badge'>".$jobs."</span>";} ?></h1> 
	<?php if (is_home()){
				
			if(get_post_meta( 16, '_nicetitle', true )){
				echo "<span class='nicetitle'>" . get_post_meta( 16, '_nicetitle', true) . "</span>";
			} 
			
		
		} ?>
	<?php if (is_page('106')){
				
			if(get_post_meta( 106, '_nicetitle', true )){
				echo "<span class='nicetitle'>" . get_post_meta( 106, '_nicetitle', true) . "</span>";
			} 
			
		
		} ?>


	 <?php
	 if (is_category()){
	  $current_category = single_cat_title("", false);  $category_id = get_cat_ID($current_category); 
	  echo "<span class='nicetitle cat'>";
	  echo category_description( $category_id ); 
	  echo "</span>";
	 }?> 	
	<?php if ( is_search() || is_404() ) : else : ?>	
	<?php if ((is_single()) && (! is_singular('manteam')) && (! is_singular('cisjob')) ){  
	global $post;
	$thispost = $post->ID;
	get_template_part('templates/entry-meta'); 
	

	} // display date over single post:  helps clear sidebar called here?>	
	<?php
		if (is_singular('manteam')){
			$jtitle = get_post_meta( $post->ID, 'job_title', true );?>
      <span class='nicetitle'><?php echo $jtitle ;?></span>
	<?php }	?>
	
	<?php // check if top level page then show children. don't show top level if two levels down
	$grandad = $post->post_parent;
	// echo "Grandad: " . $grandad . "<br />";
	$greatgrandad = get_post_ancestors( $grandad );
	//if (empty($greatgrandad)){echo "top level";}
	 if (empty($greatgrandad)) {	$children = get_pages(array(
				'child_of' => $post->ID,
				'parent' => $post->ID,
				'sort_order' => 'ASC',
				'sort_column' => 'menu_order'
				));	
	} else { $children = get_pages(array(
				'child_of' => $post->post_parent,
				'parent' => $post->post_parent,
				'sort_order' => 'ASC',
				'sort_column' => 'menu_order'
				));	
	 }
			$thispage = $post->ID;
			// echo "this: " . $thispage;
			if ($children){
				//echo "<ul>";
				foreach ($children as $child) {
					$subpage = $child->ID;
					$childlink = get_page_link( $child->ID );
					if ($thispage == $subpage){ $active = " current";} else {$active = "";}
					$alttitle = get_post_meta($child->ID, 'alt_title', true);
					if ($alttitle) { $title = $alttitle ;} else {$title = $child->post_title;}
					echo "<a href='". $childlink ."' class='btn btn-dark btn-xs" . $active . "'> " . $title .  "</a> &nbsp; ";
					}
			//echo "</ul>";
			}
	
	endif; //is search or 404 ?>
</div>
<?php endif; ?>