<?php get_header(); ?>
<?php $url = home_url();?>

<div id="content" class="front-page">
	<div class="front-page wrap">
		<div id="front-page main" <?php bzb_layout_main(); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<div class="sections">
				<div class="section1">
					<?php
						$data = ["posts_per_page" => 4, 
						"orderby" => "date",
						"order" => "DESC",
						"cat_title" => "最新記事"
						];
						$cat_title = $data["cat_title"];
						$posts = get_posts( $data );
						if( $posts ): ?>
							<div class="post-loop-wrap cards-section-wrapper">
								<div class="section1-link">
									<a href="<?php echo $url."/category/article"; ?>" class="card">
										<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/happy_1567685308-768x512.jpg" class="image"> 
										<div class="titleset">
											<h2 class="card-title">最新記事一覧</h2>
										</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /section1-link -->
								<?php
									foreach ( $posts as $post ) :
										setup_postdata( $post );
								?>
								<div class="card-wrapper  front-page-card">
									<a href="<?php echo $url."/category/article"; ?>" class="label">NEW</a>
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
												<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
											<?php } else { ?>
												<div class="card-thumbnail" style="background-image: url(https://worldclub-soka.com/wp-content/uploads/2020/10/wp-header-logo-21-300x225-1.png)"></div>
											<?php } ?>
											<div class ="titleset">
												<h2 class="card-title"><?php the_title(); ?></h2>
												<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
											</div><!-- titleset -->
										</article>
									</a>
									<!-- <h2 class="tags"><?php the_tags( '#', ' #' ); ?></h2> -->
								</div><!-- card-warapper -->
							<?php endforeach; ?>
							<?php
								endif;
								wp_reset_postdata();
								?>
							</div><!-- /post-loop-wrap -->
				</div><!-- /section1 -->
				<div class="section2">
					<?php
						$data = ["posts_per_page" => 4, 
						"orderby" => "date",
						"order" => "DESC",
						"category_name" => "interview",
						"cat_title" => "interview"
						];
						$cat_title = $data["cat_title"];
						$posts = get_posts( $data );
						if( $posts ): ?>
						<div class="post-loop">
							<div class="post-loop-wrap cards-section-wrapper">
								<div class="section2-link">
									<a href="<?php echo $url."/category/interview/"; ?>" class="card">
										<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/happy_1567685324-1024x682.jpg" class="image"> 
										<div class="titleset">
											<h2 class="card-title">インタビュー記事一覧</h2>
										</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /section2-link -->
								<?php
									foreach ( $posts as $post ) :
										setup_postdata( $post );
								?>
								<div class="card-wrapper  front-page-card">
								<a href="<?php echo $url."/category/interview/"; ?>" class="label">Interview</a>
								<a href="<?php the_permalink(); ?>" class="card">
									<article class="card-content-wrapper">
										<?php if ( get_the_post_thumbnail() ) { ?>
											<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
										<?php } else { ?>
											<div class="card-thumbnail" style="background-image: url(https://worldclub-soka.com/wp-content/uploads/2020/10/wp-header-logo-21-300x225-1.png)"></div>
										<?php } ?>
										<div class ="titleset">
											<h2 class="card-title"><?php the_title(); ?></h2>
											<span>
												<i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?>
											</span>
										</div><!-- titleset -->
									</article>
								</a>
								<!-- <h2 class="tags"><?php the_tags( '#', ' #' ); ?></h2> -->
								</div><!-- card-warapper -->
							<?php endforeach; ?>
							<?php
								endif;
								wp_reset_postdata();
								?>
							</div><!-- /post-loop-wrap -->
						</div><!-- /post-loop -->
						<div class="sub-section">
							<?php
								$data = ['name'		=> 'howto-20200630',
								'post_type'				=> 'post',
								'post_status'			=> 'publish',
								'posts_per_page'	=> 1,
								];
								$posts = get_posts( $data );
								foreach ( $posts as $post ) :
									setup_postdata( $post );
							?>
							<a href="<?php echo $url."/howto-20200630 "; ?>" class="card">
							<div class="image" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
							<div class="titleset">
								<h2 class="card-title"><?php the_title(); ?></h2>
							</div><!-- /titleset -->
							</a><!-- /card -->
							<?php endforeach; ?>
						</div><!-- /sub-section -->
				</div><!-- /section2 -->
				<div class="section3"> 
					<?php
						$data = ["posts_per_page" => 3, 
						"orderby" => "date",
						"order" => "DESC",
						"category_name" => "how to",
						"cat_title" => "How to"
						];
						$cat_title = $data["cat_title"]; 	
						$posts = get_posts( $data );
						if( $posts ): ?>
						<div class="post-loop">
							<div class="post-loop-wrap cards-section-wrapper">
								<?php
									foreach ( $posts as $post ) :
										setup_postdata( $post );
								?>
								<div class="card-wrapper  front-page-card">
									<a href="<?php echo $url."/category/how-to/"; ?>" class="label">How to</a>
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
												<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
											<?php } else { ?>
												<div class="card-thumbnail" style="background-image: url(https://worldclub-soka.com/wp-content/uploads/2020/10/wp-header-logo-21-300x225-1.png)"></div>
											<?php } ?>
												<div class ="titleset">
													<h2 class="card-title"><?php the_title(); ?></h2>
													<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
												</div><!-- titleset -->
										</article>
									</a>
									<!-- <h2 class="tags"><?php the_tags( '#', ' #' ); ?></h2> -->
								</div><!-- card-warapper -->
								<?php endforeach; ?>
								<?php
								endif;
								wp_reset_postdata();
								?>
							</div><!-- /post-loop-wrap -->
						</div><!-- /post-loop -->
						<div class="section3-link">
							<a href="<?php echo $url."/category/how-to/"; ?>" class="card">
								<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/soccer_1567685338-1024x587.jpg" class="image">
								<div class="titleset">
									<h2 class="card-title">How to記事一覧</h2>
								</div><!-- /titleset -->
							</a><!-- /card -->
						</div><!-- /section3-link -->
				</div><!-- /section3 -->
				<div class="section4">
					<?php
						$data = ["meta_key" => "views",
						"posts_per_page" => 4, 
						"orderby" => "meta_value_num",
						"order" => "DESC",
						"cat_title" => "人気記事"
						];
						$cat_title = $data["cat_title"];
						$posts = get_posts( $data );
						if( $posts ): ?>
						<div class="post-loop">
							<div class="post-loop-wrap cards-section-wrapper">
								<div class="section4-link">
									<a href="<?php echo $url."/category/article/"; ?>" class="card">
									<img src="https://worldclub-soka.com/wp-content/uploads/2019/09/question_1567857425-768x512.jpg" class="image"> 
									<div class="titleset">
										<h2 class="card-title">人気記事一覧</h2>
									</div><!-- /titleset -->
									</a><!-- /card -->
								</div><!-- /section4-link -->
								<?php
									foreach ( $posts as $post ) :
										setup_postdata( $post );
								?>
								<div class="card-wrapper  front-page-card">
									<a href="<?php echo $url."/category/article/"; ?>" class="label">POPS</a>
									<a href="<?php the_permalink(); ?>" class="card">
										<article class="card-content-wrapper">
											<?php if ( get_the_post_thumbnail() ) { ?>
												<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
											<?php } else { ?>
												<div class="card-thumbnail" style="background-image: url(https://worldclub-soka.com/wp-content/uploads/2020/10/wp-header-logo-21-300x225-1.png)"></div>
											<?php } ?>
												<div class ="titleset">
													<h2 class="card-title"><?php the_title(); ?></h2>
													<span><i class="fa fa-clock-o"></i><?php the_time( 'Y.m.d' ); ?></span>
												</div><!-- titleset -->
										</article>
									</a>
									<!-- <h2 class="tags"><?php the_tags( '#', ' #' ); ?></h2> -->
								</div><!-- card-warapper -->
								<?php endforeach; ?>
								<?php
								endif;
								wp_reset_postdata();
								?>
							</div><!-- /post-loop-wrap -->
						</div><!-- /post-loop -->
						<!-- <div class="sub-section"> -->
						<!-- </div>/sub-section -->
				</div><!-- /section4 -->
			</div><!-- /sections -->
		</div><!-- /main -->
		
		</*?php get_sidebar(); ?*/>

	</div><!-- /wrap -->
  
</div><!-- /content -->

<?php get_footer(); ?>
