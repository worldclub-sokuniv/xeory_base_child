<?php
	global $post;
	$a_id = $post->post_author;
	$original_avatar = get_user_meta($a_id, 'original_avatar', true);
	$author_meta_name = get_the_author_meta('display_name');
	$googleplus = get_the_author_meta('googleplus');
	$disp_author_description = wpautop(get_the_author_meta('user_description'));
?>

<aside class="post-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
<div class="clearfix">
	<div class="post-author-img">
	<div class="inner">
		<?php if( isset($original_avatar) && $original_avatar !== ''){ ?>
			<img src="<?=$original_avatar?>" alt="アバター">
		<?php }else{ ?>
			<img src="<?php get_template_directory_uri().'/lib/images/masman.png'?>" alt="masman" width="100" height="100">
		<?php }	?>
	</div>
	</div>
	<div class="post-author-meta">
	<h4 itemprop="name"><?=$author_meta_name?></h4>
	<p itemprop="discription"><?=$disp_author_description?></p>
	</div>
</div>
</aside>
