<div id="side" <?php bzb_layout_side(); ?> role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="side-inner">
		<?php for( $i=1; $i<=4; $i++) { ?>
			<div class="side-widget-area <?php echo 'side-'.(string)$i; ?>">		
				<?php if( dynamic_sidebar( 'side-'.(string)$i) ){ dynamic_sidebar(); } ?>
			</div>
		<?php } ?>
		<?php wp_reset_postdata(); ?>
		</div><!-- //side-widget-area -->
	</div>
</div><!-- /side -->
  