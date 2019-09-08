<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
	);
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
  echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">';
}

?>
