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
		<div class="container-fluid">
			<nav class="navbar navbar-toggleable-md navbar-light fixed-top">
				<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand hidden-md-down" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/img/tint-logo-white.png" alt="<?php bloginfo( 'name' ); ?>" width="38" height="38" class="d-inline-block align-top" > <?php bloginfo( 'name' ); ?>
				</a>
				<a class="navbar-brand hidden-sm-up" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/img/tint-logo-text-white.png" alt="<?php bloginfo( 'name' ); ?>" width="100" height="38" class="align-top" >
				</a>
				<div class="custom-search hidden-sm-up">
					<input type="text" class="form-control" placeholder="Learn More About TINT" name="s" id="search" value="<?php the_search_query(); ?>">
					<button type="reset" class="reset"><i class="fa fa-times" aria-hidden="true"></i></button>
				</div>
				<div id="share" class="share hidden-sm-up">
					<div class="container">
						<div class="row">
							<div class="col-3">
								<a class="link-share" href="#">Share</a>
							</div>
							<div class="col-6 text-center">
								<a class="link-blog" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">TINT BLOG</a>
							</div>
							<div class="col-3 text-center">
								<img class="d-inline" style="margin-right: 17px;" src="<?php echo get_template_directory_uri(); ?>/img/comment-icon-white.png" width="15.8" height="auto">
								<img class="d-inline" src="<?php echo get_template_directory_uri(); ?>/img/icon-like-normal@3x.png" width="15.8" height="auto">
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(window).scroll(function(event) {
			            function content()
			            {
			                var scroll = $(window).scrollTop(); 
			                if(scroll > 50)
			                { 
			                    $(".share").fadeIn("slow").addClass("show");
			                }
			                else
			                {
			                    $(".share").fadeOut("slow").removeClass("show");
			                }
			                
			                clearTimeout($.data(this, 'scrollTimer'));
			                $.data(this, 'scrollTimer', setTimeout(function() {
			                    if ($('.share').is(':hover')) {
			                        footer();
			                    }
			                    else
			                    {
			                        $(".share").fadeOut("slow");
			                    }
			                }, 3000));
			            }
			            content();
			        });
				</script>
				
				<div class="collapse navbar-collapse" id="navbarToggler">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'navbar-nav mr-auto mt-2 mt-md-1' ) ); ?>
					
					<form class="form-inline ml-auto my-2 my-lg-0 hidden-sm-down" role="search" action="<?php echo site_url('/'); ?>" method="get" >
						<input type="text" class="form-control ml-sm-3" placeholder="Learn More About TINT" name="s" id="search" value="<?php the_search_query(); ?>">
						<img class="search-icon ml-sm-3" src="<?php echo get_template_directory_uri(); ?>/img/search-icon.png" width="16" height="16" >
						<button type="reset" class="reset"><i class="fa fa-times" aria-hidden="true"></i></button>
					</form>
					<script type="text/javascript">
						$('input[name=s]').on("click focus",function(){
						    $(this).attr("placeholder","I want to learn about...");
						    $(".search-icon").hide();
						    $(".reset").show();
						}).on("blur",function(){
						    $(this).attr("placeholder","Learn More About TINT");
						    $(".search-icon").show();
						    $(".reset").hide();
						});
					</script>
				</div>
			</nav>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
