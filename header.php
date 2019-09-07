<!DOCTYPE HTML>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="UTF-8">
	<title><?php bzb_title(); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<?php wp_head(); ?>

<?php echo get_option('analytics_tracking_code');?>
<?php echo get_option('webmaster_tool');?>

</head>

<body id="#top" <?php body_class();?> itemschope="itemscope" itemtype="http://schema.org/WebPage">

<?php bzb_show_facebook_block(); ?>

<?php if( is_singular('lp') ) { ?>

<div class="lp-wrap">

<header id="lp-header">
  <h1 class="lp-title"><?php wp_title(''); ?></h1>
</header>

<?php }else{ ?>

<header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
  <div class="wrap">
    <?php
      $logo_image = get_option('logo_image');
      $logo_text = get_option('logo_text');
      if( !empty($logo_image) && get_option('toppage_logo_type') == 'logo_image') :
        $logo_inner = '<img src="'. get_option('logo_image') .'" alt="'.get_bloginfo('name').'" />';
      else:
        if (!empty($logo_text) && get_option('toppage_logo_type') == 'logo_text') :
          $logo_inner = get_option('logo_text');
        else:
          $logo_inner = get_bloginfo('name');
        endif;
      endif;
      $logo_wrap = ( is_front_page() || is_home() ) ? 'h1' : 'p' ;
    ?>
      <<?php echo $logo_wrap; ?> id="logo" itemprop="headline">
        <a href="<?php echo home_url(); ?>"><?php echo $logo_inner; ?></a>
      </<?php echo $logo_wrap; ?>>

<?php if( has_nav_menu( 'global_nav' ) ){ ?>
        <div id="header-menu-tog"> <a href="#"><i class="fa fa-align-justify"></i></a></div>
<?php }?>
  </div>
</header>

<!-- start global nav  -->
<!---->
<?php if( has_nav_menu( 'global_nav' ) ){ ?>
<nav id="gnav" role="navigation" itemscope="itemscope" itemtype="http://scheme.org/SiteNavigationElement">
  <div class="wrap">
  <?php
    wp_nav_menu(
      array(
        'theme_location'  => 'global_nav',
        'menu_class'      => 'clearfix',
        'menu_id'         => 'gnav-ul',
        'container'       => 'div',
        'container_id'    => 'gnav-container',
        'container_class' => 'gnav-container'
      )
    );?>
    </div>
</nav>
<?php } ?>

<?php } // if is_singular('lp') ?>
