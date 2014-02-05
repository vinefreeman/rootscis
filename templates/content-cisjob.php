<article <?php post_class(); ?>>
<?php if ($round){echo "yes";} else {echo "no";} ?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php $round;?>">
      	<?php the_title() ?>
      </a>
    </div>
    <div id="collapse<?php $round; ?>" class="panel-collapse collapse in">
      <div class="panel-body">
         <div class="entry-summary">
         	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  			  <?php get_template_part('templates/entry-meta'); ?>
    		<?php the_excerpt(); ?>
  		</div>
      </div>
    </div>
  </div>
</div>
 
 <!-- 
  <header>
  	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> Archive?</h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
   <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
-->
 <!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">-->
</article>
<?php $round ++ ;?>