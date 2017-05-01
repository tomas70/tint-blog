<?php
/**
 * The template for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TINT_Blog
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<header class="category-header">
		<div class="container">
			<div class="row">
				<div class="col category-header__text">
					Search Results:
				</div>
			</div>
		</div>
	</header>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="container hidden-sm-down">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-md-4 cat-posts">
								<div class="row">
									<div class="col">
										<?php the_post_thumbnail('archive-results'); ?>
									
										<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
										<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('jS F'); ?></span></p>
									</div>
								</div>
							</div>
	 				</div>
	 			</div>
	 			<div class="col-md-4 sidebar">
	 				<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
	 						<?php dynamic_sidebar( 'home-sidebar' ); ?>
	 				<?php endif; ?>
	 			</div>
						<?php endwhile; else : ?>
						<header class="category-header">
							<div class="container">
								<div class="row">
									<div class="col-12 category-header__text">
										<img src="<?php echo get_template_directory_uri(); ?>/img/empty-state-emoji.png" width="60" height="60">
										<p>Oh no! We couldn’t find anything. Have a suggestion? We’d <span style="color: #fc3d3b;">love to hear from you</span>!</p>
										Recommended For You:
									</div>
								</div>
							</div>
						</header>
						<div class="container">
							<div class="row">
								<div class="col-md-8">
									<?php
									query_posts('posts_per_page=9'); ?>
									<div class="row">
										<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
										<div class="col-md-4 cat-posts">
													<?php the_post_thumbnail('archive-results'); ?>
													<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
													<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('jS F'); ?></span></p>
											</div>
										<?php endwhile; endif; ?>
									</div>
								</div>
								<div class="col-md-4 sidebar">
					 				<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
					 						<?php dynamic_sidebar( 'home-sidebar' ); ?>
					 				<?php endif; ?>
					 			</div>
				 			</div>
			 			</div>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>
			<div class="container hidden-sm-up">
				<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="col-12 cat-posts padding-zero">
						<div class="row align-items-center">
							<div class="col-4">
								<?php the_post_thumbnail(array(100, 100)); ?>
							</div>
							<div class="col-8">
								<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
