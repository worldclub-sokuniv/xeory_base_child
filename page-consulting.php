<?php get_header(); ?>
<div id="content">
	<div class="wrap">
		<?php bzb_breadcrumb(); ?>
		<div id="main" <?php bzb_layout_main(); ?>>
			<div class="main-inner">

				<section class="cat-content">
					<header class="cat-header">
						<h1 class="post-title">留学相談</h1>
					</header>
					<p>このページは皆さんに最適なメンバーと留学相談を効率的に行っていただくためのページです。</p>
					<p>まだ、どこに留学しようか、どんな留学にしようか迷っている人はまずは<a href="../category/experience/">留学体験記</a>を確認してみよう！</p>
				</section>

				<div class="post-loop-wrap members-wrapper">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							the_content(); 
						endwhile;
					else :?>
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

	</*?php get_sidebar(); ?*/>

	</div><!-- /wrap -->

</div><!-- /content -->

<?php get_footer(); ?>
