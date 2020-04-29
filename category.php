<?php get_header(); ?>
<div id="content">
	<div class="wrap">
		<?php bzb_breadcrumb(); ?>
		<div id="main" <?php bzb_layout_main(); ?>>
			<div class="main-inner">

				<section class="cat-content">
					<header class="cat-header">
						<h1 class="post-title"><?php bzb_title(); ?></h1>
					</header>
					<?php if ( is_category() ) { ?>
						<?php bzb_category_description(); ?>
					<?php } ?>
				</section>

				<div class="post-loop-wrap">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>

						<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
							<header class="post-header">
								<ul class="post-meta list-inline">
									<li class="date updated" itemprop="datePublished" datetime="<?php the_time( 'c' ); ?>"><i class="fa fa-clock-o"></i> <?php the_time( 'Y.m.d' ); ?></li>
								</ul>
								<h2 class="post-title" itemprop="headline"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
							</header>

							<section class="post-content" itemprop="text">
							<?php if ( get_the_post_thumbnail() ) { ?>
								<div class="card-thumbnail" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
							<?php } ?>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="hover-btn read_more">続きを読む</a>
							</section>
						</article>
							<?php

					endwhile;

					else :
						?>

				<article id="post-404"class="cotent-none post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
					<section class="post-content" itemprop="text">
						<?php echo get_template_part( 'content', 'none' ); ?>
					</section>
				</article>

						<?php
					endif;
					?>
				<?php
				if ( function_exists( 'pagination' ) ) {
					pagination( $wp_query->max_num_pages );
				}
				?>
				</div><!-- /post-loop-wrap -->
			</div><!-- /main-inner -->
		</div><!-- /main -->

	<?php get_sidebar(); ?>

	</div><!-- /wrap -->

</div><!-- /content -->

<?php get_footer(); ?>
