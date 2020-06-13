<?php get_header(); ?>

<div id="content">

<?php do_action( 'xeory_prepend_content' ); ?>

<div class="wrap interview-wrapper">
	<?php do_action( 'xeory_prepend_wrap' ); ?>
	<?php bzb_breadcrumb(); ?>

	<div id="main" <?php bzb_layout_main(); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<?php do_action( 'xeory_prepend_main' ); ?>
		
		<div class="main-inner">
		<?php do_action( 'xeory_prepend_main-inner' ); ?>
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
		?>
		<?php 
			global $post;
			$cf = get_post_meta( $post->ID );
		?>
		<article id="post-<?php the_id(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
			<header class="post-header">
				<ul class="post-meta list-inline">
					<li class="date updated" itemprop="datePublished" datetime="<?php the_time('c');?>"><i class="fa fa-clock-o"></i><?php the_time('Y.m.d');?></li>
				</ul>
				<h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
			</header>
			<section class="post-content" itemprop="text">
        
				<?php
					the_content(); 
					$args = array(
					'before' => '<div class="pagination">',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>'
					);
					wp_link_pages($args);
				?>
			</section>

			<footer class="post-footer">
      <?php // include dirname(__FILE__)."/../libs/components/sns.php"?>
			</footer>
			
			<?php echo bzb_get_cta($post->ID); ?>
		</article>
		<?php
			endwhile;
			else :
		?>
		
		<p>投稿が見つかりません。</p>
			
		<?php
			endif;
		?>

		<?php do_action( 'xeory_append_main-inner' ); ?>

		</div><!-- /main-inner -->

		<?php do_action( 'xeory_append_main' ); ?>
	
	</div><!-- /main -->
	
	<!-- <?php get_sidebar(); ?> -->

		<?php do_action( 'xeory_append_wrap' ); ?>

</div><!-- /wrap -->

<?php do_action( 'xeory_append_content' ); ?>

</div><!-- /content -->

<?php get_footer(); ?>


