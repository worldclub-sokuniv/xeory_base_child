<!-- this file is not currently used -->
<div id="side" <?php bzb_layout_side(); ?> role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="side-inner">
			<div class="side-widget-area <?php echo 'side-2'?>">		
				<?php if( dynamic_sidebar( 'side-2') ){ dynamic_sidebar(); } ?>
			</div>
		<?php wp_reset_postdata(); ?> 
		</div><!-- //side-widget-area -->
	</div>
</div><!-- /side -->
  