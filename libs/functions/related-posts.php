<div class="relatedposts">

<!-- <div class="new-entry"><span class="relatedposts-title">関連記事</span></div> -->

<?php
	// echo $post->ID;
	// echo "\n";
	$orig_post = $post;
	global $post;
	// echo $post->ID;
	$tags = wp_get_post_tags($post->ID);
	// var_dump($tags);
	if ($tags) {
		$tag_ids = array();

		foreach($tags as $individual_tag)
			$tag_ids[] = $individual_tag->term_id;
			$args = array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>4, // 表示する関連記事の数
			'caller_get_posts'=>1,
			'orderby' => 'rand', // 過去記事に内部リンクできるので割と重要
		);

		$my_query = new wp_query( $args );
		?>

		<div class="relatedposts-wrapper">

		<?php
		while( $my_query->have_posts() ) {
			$my_query->the_post();

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
			if ( !empty($thumb['0']) ) {
				$url = $thumb['0'];
			} else {
				$url = '../wp-content/themes/xeory_base_child/libs/img/no_image.png';
		} ?>

		<div itemscope itemtype='http://schema.org/ImageObject' class="relatedpost-container card-wrapper up">
			<div class="card">
				<article class="card-content-wrapper scale-change">
					<a style="background-image:url(<?=$url?>);" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" class="post-thumbnail"></a>
					<h2 class="card-title">
						<a style=""href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php if (strlen($post->post_title) > 50) {
						echo mb_substr(the_title($before = '', $after = '', FALSE), 0, 50,  'UTF-8') . '...'; } else {
						the_title();
						} ?>
						</a>
					</h2>
					<div class="tag-wrapper tag-cat">
					<?php
						$cat = get_the_category(); $cat = $cat[0]; echo '<a href="' . get_bloginfo('url') . '/category/' . $cat->category_nicename . '" class="tag">';
						echo $cat->cat_name;
						echo  '</a>';
					?>
					</div>
				</article>
			</div>
			
		</div>

		<?php } // while文ここまで ?>
		</div>

	<?php
	} // IF文ここまで

	$post = $orig_post;
	wp_reset_query(); ?>
</div>