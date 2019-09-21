<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
	);
}

function randomId ($length = 8){
	return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
}

add_shortcode( 'mem', 'createMemberCard' );
function createMemberCard( $args ) {
	extract(shortcode_atts(array(
		'img_url' => '../wp-content/themes/xeory_base_child/libs/img/no_image.png',
		'name' => '入力してください',
		'countries' => '入力してください',
		'career' => '入力してください',
		'shift' => '入力してください',
		'contact' => '入力してください',
	), $args ));

	$id = randomId();

	$contents = <<< eof
	<dialog id="d-{$id}" class="dialog member-dialog">
		<div class="d-wrapper">
			<h2>$name</h2>
			<div class="d-img-wrapper">
				<div style="background-image:url({$img_url});" title="{$name}" class="post-thumbnail member-img"></div>
			</div>
			<div class="d-content-wrapper">
				<ul>
					<li>留学先<br><p>{$countries}</p></li>
					<li>経歴<br><p>{$career}</p></li>
					<li>シフト<br><p>{$shift}</p></li>
					<li>連絡先<br><p>{$contact}</p></li>
				</ul>
			</div>
			<p class="close">close</p>
		</div>
	</dialog>
	<div itemscope itemtype="http://schema.org/ImageObject" class="member-container card-wrapper" id={$id}>
		<div class="card">
			<article class="card-content-wrapper scale-change">
				<div style="background-image:url({$img_url});" title="{$name}" class="post-thumbnail member-img"></div>
				<h2 class="card-title">$name</h2>
				<p>留学先： {$countries}</p>
			</article>
		</div>
	</div>
eof;
	echo $contents;
}

add_filter( 'excerpt_mblength', 'my_excerpt_length');
function my_excerpt_length ( $lenght ) {
	return 200;
}

add_action( 'widgets_init', 'widgets_sidebar_init');
function widgets_sidebar_init () {
	register_sidebar(array(
		'name'          => 'Sidebar 1',
		'id'            => 'side-1',
		'description'   => 'expected for search bar',
		'class'         => 'side-1',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle side-1-title side-title">',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name'          => 'Sidebar 2',
		'id'            => 'side-2',
		'description'   => 'expected for category',
		'class'         => 'side-2',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle side-2-title side-title">',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name'          => 'Sidebar 3',
		'id'            => 'side-3',
		'description'   => 'expected for twitter',
		'class'         => 'side-3',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle side-3-title side-title">',
		'after_title'   => '</h2>'
	));

	register_sidebar(array(
		'name'          => 'Sidebar 4',
		'id'            => 'side-4',
		'description'   => 'expected for facebook',
		'class'         => 'side-4',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle side-4-title side-title">',
		'after_title'   => '</h2>'
	));
}

add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' <span>$1</span></a>',$output);
  return $output;
}

add_action( 'wp_head', 'add_meta_to_head' );
function add_meta_to_head() {
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
	echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">';
	echo '<link rel="stylesheet" href="'. get_template_directory_uri() . '_child/libs/styles/dialog-pollyfill.css">';
}

add_action( 'wp_enqueue_scripts', 'twpp_enqueue_scripts' );
function twpp_enqueue_scripts() {
	wp_enqueue_script( 
		'dialog-script', 
		get_template_directory_uri() . '_child/libs/js/dialog.js',
		array(),
		false,
		true
	);
}
?>
