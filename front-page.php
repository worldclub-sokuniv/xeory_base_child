<?php get_header(); ?>

<div id="content" class="front-page">
	<div class="front-page wrap">
		<div id="front-page main" <?php bzb_layout_main(); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="sections">
				<div class="latests">
					<?php
					$json = file_get_contents(__DIR__ . '/libs/json/front_page0.json');
					if ($json === false) {
						throw new \RuntimeException('file not found.');
					}
					$data = json_decode($json, true);
					foreach ( $data as $arg ) :
						$cat_title = $arg["cat_title"]; 	
						$posts = get_posts( $arg );
						if( $posts ): ?>
							<!-- <div class="new-entry"><span class="fp-category-title"><?php echo $cat_title; ?></span></div> -->
							<div class="post-loop-wrap cards-section-wrapper">
								<div class="latest-link">
									<a href="http://worldclubsokalocal.local/category/article/" class="card">
									<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/happy_1567685308-768x512.jpg" width="585px" height="365px"> 
									<div class="image"></div>
									<div class="titleset">
										<h2 class="card-title">最新記事一覧</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /latest-link -->
								<?php
								foreach ( $posts as $post ) :
									setup_postdata( $post );
							?>
								<div class="card-wrapper  front-page-card">
								<a href="http://worldclubsokalocal.local/category/article/interview/" class="label">NEW</a>
								<a href="<?php the_permalink(); ?>" class="card">
									<article class="card-content-wrapper">
										<?php if ( get_the_post_thumbnail() ) { ?>
												<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
										<?php } ?>
										<div class ="titleset">
											<h2 class="card-title"><?php the_title(); ?></h2>
											<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
										</div><!-- titleset -->
									</article>
								</a>
								<h2 class="tags"><?php the_tags( '', ' / ' ); ?></h2>
								</div><!-- card-warapper -->
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
				</div><!-- /latests -->
				<div class="populars">
					<?php
					$json = file_get_contents(__DIR__ . '/libs/json/front_page1.json');
					if ($json === false) {
						throw new \RuntimeException('file not found.');
					}
					$data = json_decode($json, true);
					foreach ( $data as $arg ) :
						$cat_title = $arg["cat_title"]; 	
						$posts = get_posts( $arg );
						if( $posts ): ?>
							<!-- <div class="new-entry"><span class="fp-category-title"><?php echo $cat_title; ?></span></div> -->
							<div class="post-loop-wrap cards-section-wrapper">
								<div class="popular-link">
									<a href="http://worldclubsokalocal.local/category/article/" class="card">
									<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/happy_1567685324-1024x682.jpg" width="292.5px" height="235px"> 
									<div class="image"></div>
									<div class="titleset">
										<h2 class="card-title">人気記事一覧</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /popular-link -->
								<div class="hoge-link">
									<a href="http://worldclubsokalocal.local/category/article/" class="card">
									<!-- <img src="libs/img/ssa_logo.png" width="585px" height="365px">  -->
									<div class="image"></div>
									<div class="titleset">
										<h2 class="card-title">??????</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /hoge-link -->
								<?php
								foreach ( $posts as $post ) :
									setup_postdata( $post );
							?>
								<div class="card-wrapper  front-page-card">
								<a href="http://worldclubsokalocal.local/category/article/" class="label">POPS</a>
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
													<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
											<?php } ?>
											<div class ="titleset">
												<h2 class="card-title"><?php the_title(); ?></h2>
												<span>
													<i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?>
												</span>
											</div><!-- titleset -->
										</article>
									</a>
									<h2 class="tags"><?php the_tags( '', ' / ' ); ?></h2>
								</div><!-- card-warapper -->
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
				</div><!-- /populars -->
				<div class="experiences">
					<?php
					$json = file_get_contents(__DIR__ . '/libs/json/front_page2.json');
					if ($json === false) {
						throw new \RuntimeException('file not found.');
					}
					$data = json_decode($json, true);
					foreach ( $data as $arg ) :
						$cat_title = $arg["cat_title"]; 	
						$posts = get_posts( $arg );
						if( $posts ): ?>
							<!-- <div class="new-entry"><span class="fp-category-title"><?php echo $cat_title; ?></span></div> -->
							<div class="post-loop-wrap cards-section-wrapper">
								<?php
								foreach ( $posts as $post ) :
									setup_postdata( $post );
									?>
								<div class="card-wrapper  front-page-card">
									<a href="http://worldclubsokalocal.local/category/experience/" class="label">留学体験記</a>
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
													<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
													<?php } ?>
													<div class ="titleset">
														<h2 class="card-title"><?php the_title(); ?></h2>
														<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
													</div><!-- titleset -->
												</article>
											</a>
											<h2 class="tags"><?php the_tags( '', ' / ' ); ?></h2>
										</div><!-- card-warapper -->
										<?php endforeach; ?>
										<?php
								endif;
								wp_reset_postdata();
								?>
							<?php if (function_exists("pagination")) {
								pagination($wp_query->max_num_pages);
							} ?>
								<div class="experience-link">
									<a href="http://worldclubsokalocal.local/category/experience/" class="card">
									<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/soccer_1567685338-1024x587.jpg" width="585px" height="365px"> 
									<div class="image"></div>
									<div class="titleset">
										<h2 class="card-title">留学体験記一覧</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /experience-link -->
							</div><!-- /post-loop-wrap -->
					<?php endforeach; ?>
				</div><!-- /ecperiences -->
				<div class="useful-infos">
					<?php
					$json = file_get_contents(__DIR__ . '/libs/json/front_page3.json');
					if ($json === false) {
						throw new \RuntimeException('file not found.');
					}
					$data = json_decode($json, true);
					foreach ( $data as $arg ) :
						$cat_title = $arg["cat_title"]; 	
						$posts = get_posts( $arg );
						if( $posts ): ?>
							<!-- <div class="new-entry"><span class="fp-category-title"><?php echo $cat_title; ?></span></div> -->
							<div class="post-loop-wrap cards-section-wrapper">
								<?php
								foreach ( $posts as $post ) :
									setup_postdata( $post );
									?>
								<div class="card-wrapper  front-page-card">
									<a href="http://worldclubsokalocal.local/category/useful-info/" class="label">お役立ち情報</a>
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
													<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
													<?php } ?>
													<div class ="titleset">
														<h2 class="card-title"><?php the_title(); ?></h2>
														<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
													</div><!-- titleset -->
												</article>
											</a>
											<h2 class="tags"><?php the_tags( '', ' / ' ); ?></h2>
										</div><!-- card-warapper -->
										<?php endforeach; ?>
										<?php
								endif;
								wp_reset_postdata();
								?>
							<?php if (function_exists("pagination")) {
								pagination($wp_query->max_num_pages);
							} ?>
								<div class="useful-info-link">
									<a href="http://worldclubsokalocal.local/category/useful-info/" class="card">
									<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/question_1567857425-768x512.jpg" width="292.5px" height="235px"> 
									<div class="image"></div>
									<div class="titleset">
										<h2 class="card-title">お役立ち情報一覧</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /usuful-info-link -->
								<div class="hoge-link">
									<a href="http://worldclubsokalocal.local/category/article/" class="card">
									<!-- <img src="libs/img/ssa_logo.png" width="585px" height="365px">  -->
									<div class="image"></div>
									<div class="titleset">
									<h2 class="card-title">??????</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /hoge-link -->
							</div><!-- /post-loop-wrap -->
					<?php endforeach; ?>
				</div><!-- /useful-infos -->
			</div><!-- /sections -->
		</div><!-- /main -->
		
		<?php get_sidebar(); ?>

	</div><!-- /wrap -->
  
</div><!-- /content -->

<?php get_footer(); ?>
