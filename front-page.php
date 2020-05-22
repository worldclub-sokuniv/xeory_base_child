<?php get_header(); ?>

<div id="content" class="front-page">
	<div class="wrap">
		<div id="main" <?php bzb_layout_main(); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="main-inner">
				<?php
					$json = file_get_contents(__DIR__ . '/libs/json/front_page.json');
					if ($json === false) {
						throw new \RuntimeException('file not found.');
					}
					$data = json_decode($json, true);
					foreach ( $data as $arg ) :
						$posts = get_posts( $arg );
						$cat_title = $arg["cat_title"]; 	
						if( $posts ): ?>
							<div class="new-entry"><span class="fp-category-title"><?php echo $cat_title; ?></span></div>
							<div class="post-loop-wrap cards-section-wrapper">
							<?php
								foreach ( $posts as $post ) :
									setup_postdata( $post );
							?>
								<div class="card-wrapper  front-page-card">
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
												<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
											<?php } ?>
											<h2 class="card-title"><?php the_title(); ?></h2>
											<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
										</article>
									</a>
								</div>
							<?php endforeach; ?>
							<?php
								endif;
								wp_reset_postdata();
								?>
							<?php if (function_exists("pagination")) {
								pagination($wp_query->max_num_pages);
							} ?>

						</div><!-- /post-loop-wrap -->
					<?php endforeach; ?>
				</div><!-- /main-inner -->
		</div><!-- /main -->
		
		<!-- <?php get_sidebar(); ?> -->

	</div><!-- /wrap -->
  
</div><!-- /content -->

<?php get_footer(); ?>
