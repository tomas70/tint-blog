<?php
/**
 * The author page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINT_Blog
 */

get_header(); ?>

<header class="category-header">
	<div class="container">
		<div class="row">
			<div class="col category-header__text">
				Posts Tagged ‘<?php single_cat_title(); ?>’:
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
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="col-md-4 cat-posts">
								<div class="row">
									<div class="col">
										<?php the_post_thumbnail('archive-results'); ?>
									
										<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
										<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('jS F'); ?></span></p>
									</div>
								</div>
							</div>
						<?php endwhile; endif; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
				<div class="col-md-4 sidebar">
	 				<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
	 						<?php dynamic_sidebar( 'home-sidebar' ); ?>
	 				<?php endif; ?>
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
	</main>
</div>

<?php
get_sidebar();
get_footer();
