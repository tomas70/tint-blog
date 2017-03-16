<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TINT_Blog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tint-blog' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-toggleable-md navbar-light">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"">
				<img src="<?php echo get_template_directory_uri(); ?>/img/menu-items-copy-29.png" alt="<?php bloginfo( 'name' ); ?>">
			</a>
			<div class="collapse navbar-collapse" id="navbarToggler">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'navbar-nav mr-auto mt-2 mt-md-1' ) ); ?>
				<form class="form-inline ml-auto my-2 my-lg-0">
					<button class="btn btn-sm align-middle btn-outline-secondary my-2 my-sm-0" type="button">Learn More About TINT</button>
				</form>
				<form class="form-inline my-2 my-lg-0" role="search" action="<?php echo site_url('/'); ?>" method="get" >
					<input type="text" class="form-control ml-sm-3" placeholder="Search" name="s" id="search" value="<?php the_search_query(); ?>">
            		<input type="submit" class="search-submit ml-sm-3" value="Search">
				</form>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
