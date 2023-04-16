<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CiyaShop
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="eu90gURXJQPJORvjv9Z3jcwUoSh7sv1yXxYM62JGN1c" />	
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
<!--<meta name="viewport" content="width=device-width, initial-scale=1"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>	
<meta name="format-detection" content="telephone=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php wp_head(); ?>
<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0103/5284.js" async="async" ></script>
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/4b69261c8d013ac3704b06974/3ea25a2382ceadfbdfbffd4f7.js");</script>
</head>

<body <?php body_class(); ?>>

<!-- MailerLite Universal -->
<script>
(function(m,a,i,l,e,r){ m['MailerLiteObject']=e;function f(){
var c={ a:arguments,q:[]};var r=this.push(c);return "number"!=typeof r?r:f.bind(c.q);}
f.q=f.q||[];m[e]=m[e]||f.bind(f.q);m[e].q=m[e].q||f.q;r=a.createElement(i);
var _=a.getElementsByTagName(i)[0];r.async=1;r.src=l+'?v'+(~~(new Date().getTime()/1000000));
_.parentNode.insertBefore(r,_);})(window, document, 'script', 'https://static.mailerlite.com/js/universal.js', 'ml');

var ml_account = ml('accounts', '3566354', 'e2f8x7b9i8', 'load');
</script>
<!-- End MailerLite Universal -->

	


<?php

if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}

/**
 * Fires before page wrapper.
 *
 * @visible true
 */
do_action( 'ciyashop_before_page_wrapper' );
?>

<div id="page" class="<?php ciyashop_page_classes(); ?>">

	<?php
	/**
	 * Fires before header wrapper.
	 *
	 * @Functions hooked in to ciyashop_before_header_wrapper hook.
	 * @hooked ciyashop_preloader - 10
	 *
	 * @visible true
	 */
	do_action( 'ciyashop_before_header_wrapper' );
	?>

	<!--header -->
	<header id="masthead" class="<?php ciyashop_header_classes(); ?>">
		<div id="masthead-inner">

			<?php
			/**
			 * Fires before header.
			 *
			 * @visible true
			 */
			do_action( 'ciyashop_before_header' );
			?>

			<?php get_template_part( 'template-parts/header/header_type/' . ciyashop_header_type() ); ?>

			<?php
			/**
			 * Fires after header.
			 *
			 * @visible true
			 */
			do_action( 'ciyashop_after_header' );
			?>

		</div><!-- #masthead-inner -->
	</header><!-- #masthead -->

	<?php
	/**
	 * Fires after header wrapper.
	 *
	 * @visible true
	 */
	do_action( 'ciyashop_after_header_wrapper' );
	?>

	<?php
	/**
	 * Fires before site content.
	 *
	 * @visible true
	 */
	do_action( 'ciyashop_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">

		<?php
		/**
		 * Hook: ciyashop_content_top.
		 *
		 * @Functions hooked in to ciyashop_content_top hook.
		 * @hooked ciyashop_page_header - 20
		 * @hooked ciyashop_shop_category_carousel - 30
		 *
		 * @visible true
		 */
		do_action( 'ciyashop_content_top' );
		?>

		<div class="<?php ciyashop_content_wrapper_classes( 'content-wrapper' ); ?>"><!-- .content-wrapper -->
			<div class="<?php ciyashop_content_container_classes( 'container' ); ?>"><!-- .container -->
