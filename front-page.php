<?php
/**
 * The front page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINT_Blog
 */

get_header(); ?>


	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="jumbotron jumbotron-fluid" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: 100% auto;">
		<div class="container-fluid">
		<h3 class="jumbotron__heading-3">Most Recent</h3>
		<?php
			$args = array('numberposts' => '1', );
			$recent_posts = wp_get_recent_posts( $args );
			foreach ($recent_posts as $recent ) {
				echo '<h1 class="jumbotron__heading-1"><a href="'. get_permalink($recent["ID"]) .'">' .  $recent["post_title"].' </a></h1>';
			}
			wp_reset_query();
		?>
			<p class="jumbotron__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
		</div>
	</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<?php $i = 0; query_posts('cat=1&posts_per_page=4'); ?>
									<div class="col-12 strike-right">
										<h3 class="strike-right__heading-3"><?php the_category(); ?></h3>
									</div>
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++ ?>
									<?php if ($i == 1) { ?>
									<div class="col-6 cat-recent-post">
										<?php the_post_thumbnail(); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
									</div>
									<?php } else { ?>
									<div class="col-6 cat-posts">
										<div class="row align-items-center">
											<div class="col">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="col nopadding">
												<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
												<p class="cat-posts__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
											</div>
										</div>
									</div>
									<?php } ?>
								<?php endwhile; endif; ?>
								<div class="col-12 strike-left">
									<?php
									    $category_id = 1;
									    $category_link = get_category_link( $category_id );
									?>
									<a class="strike-left__see-all" href="<?php echo esc_url( $category_link ); ?>" title="Category Name">See All Posts</a>
								</div>
							</div>
						</div>
						<div class="col-md-4 sidebar">
							<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
									<?php dynamic_sidebar( 'home-sidebar' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
