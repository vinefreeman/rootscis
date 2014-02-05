<footer class="content-info foot" role="contentinfo">
	<div class="container footclear">	
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<h3 class="ontwitter yellow">CIS Security on Twitter</h3>
				<?php get_template_part('templates/foottweet'); ?>
			</div>	
		    <div class="col-lg-4 col-md-4 col-sm-4">
		    	<!--<h3 class="lblue intouch clearfix">Stay in touch</h3>
		    	<div class="socialMiddle">
		    	<?php // get_template_part('templates/social'); ?>-->
		    	<a href="http://www.sia.homeoffice.gov.uk/Pages/acs-roac.aspx?all" target="_blank" class="siahome" title="SIA - More...">SIA</a>
		    </div>
		    	<div id="sch" class="clearfix"></div>
		      <?php dynamic_sidebar('sidebar-footer'); ?>
		    </div>
		</div>
		<div class="row visible-xs">
			<div class="col-xs-12 footsearch">
				<?php get_template_part('templates/searchform'); ?>
			</div>
		</div>	
	</div>
	<div class="footcontact">
		<div class="container clearfix">
			<div class="row">
				<div class="col-lg-12">
					<?php dynamic_sidebar('sidebar-footer2'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footmenu">
		<div class="container clearfix">
			<div class="row">	
				<div class="col-lg-12">
					<p class="pull-left">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>&nbsp;|&nbsp;<a href="http://www.redheadmedia.co.uk" target="_blank" style="color: #486b84; text-decoration: none">Website: Redhead Media &rarr;</a></p>
					 <?php
	                  wp_nav_menu(array('menu' => 'Footer Links', 'menu_class' => 'footlinks'));
	                ?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">We'd love to hear from you...</h4>
				      </div>
				      <div class="modal-body">

				      Email: <a href="mailto:general@cis-security.co.uk" title="email us">general@cis-security.co.uk</a><br />
				      Tel: 020 8690 1903<br />
				      Alternatively, complete the form below and ask a question:
				      <br /><br />	
				      <?php echo do_shortcode( '[contact-form-7 id="3342" title="Contact CIS"]' ); ?>



				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				       </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
</footer>
<?php wp_footer(); ?>