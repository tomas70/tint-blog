<?php
/**
 * The front page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINT_Blog
 */

get_header(); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 menu--secondary hidden-md-down">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'secondary-menu', 'menu_class' => 'mt-2 mt-md-1' ) ); ?>
			</div>
			<div class="col-md-4 menu--secondary menu--tertiary">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'tertiary-menu', 'menu_class' => 'mt-2 mt-md-1' ) ); ?>
			</div>
		</div>
	</div>
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="jumbotron jumbotron-fluid hidden-md-down" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; height: 521px">
		<div class="container-fluid valign">
		<h3 class="jumbotron__heading-3">Most Recent</h3>
		<?php
			$args = array('numberposts' => '1', );
			$recent_posts = wp_get_recent_posts( $args );
			foreach ($recent_posts as $recent ) {
				echo '<h1 class="jumbotron__heading-1"><a href="'. get_permalink($recent["ID"]) .'">' .  $recent["post_title"].' </a></h1>';
			}
			wp_reset_query();
		?>
			<p class="jumbotron__paragraph"><span class="user-icon-white"> <?php the_author_posts_link(); ?></span> <span class="date-icon-white"> <?php the_time('jS F'); ?></span></p>
		</div>
	</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
							<?php $i = 0; query_posts('cat=1&posts_per_page=4&offset=1'); ?>
									<div class="col-12 strike-right hidden-md-down">
										<h3 class="strike-right__heading-3"><?php the_category(); ?></h3>
									</div>
								<div class="col-md-7">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++ ?>
									<?php if ($i == 1) { ?>
									<div class="col-md-12 cat-recent-post">
										<?php the_post_thumbnail('most-recent'); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
									</div>
								</div>
								<div class="col-md-5">
									<div class="row">
										<?php } else { ?>
										<div class="col-md-12 cat-posts">
											<div class="row align-items-center">
												<div class="col-md-5">
													<?php the_post_thumbnail('recent-posts'); ?>
												</div>
												<div class="col-md-7 nopadding">
													<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
													<p class="cat-posts__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php endwhile; endif; ?>
									</div>
								</div>
							<div class="col-12 strike-left hidden-md-down">
								<?php
								    $category_id = 1;
								    $category_link = get_category_link( $category_id );
								?>
								<a class="strike-left__see-all" href="<?php echo esc_url( $category_link ); ?>" title="Category Name">See All Posts</a>
							</div>
							</div>
							<div class="row">
							<?php $i = 0; query_posts('cat=1&posts_per_page=4&offset=1'); ?>
									<div class="col-12 strike-right hidden-md-down">
										<h3 class="strike-right__heading-3"><?php the_category(); ?></h3>
									</div>
								<div class="col-md-7">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++ ?>
									<?php if ($i == 1) { ?>
									<div class="col-md-12 cat-recent-post">
										<?php the_post_thumbnail('most-recent'); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
									</div>
								</div>
								<div class="col-md-5">
									<div class="row">
										<?php } else { ?>
										<div class="col-md-12 cat-posts">
											<div class="row align-items-center">
												<div class="col-md-5">
													<?php the_post_thumbnail('recent-posts'); ?>
												</div>
												<div class="col nopadding">
													<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
													<p class="cat-posts__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php endwhile; endif; ?>
									</div>
								</div>
							<div class="col-12 strike-left hidden-md-down">
								<?php
								    $category_id = 1;
								    $category_link = get_category_link( $category_id );
								?>
								<a class="strike-left__see-all" href="<?php echo esc_url( $category_link ); ?>" title="Category Name">See All Posts</a>
							</div>
							</div>
							<div class="row">
							<?php $i = 0; query_posts('cat=1&posts_per_page=4&offset=1'); ?>
									<div class="col-12 strike-right hidden-md-down">
										<h3 class="strike-right__heading-3"><?php the_category(); ?></h3>
									</div>
								<div class="col-md-7">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++ ?>
									<?php if ($i == 1) { ?>
									<div class="col-md-12 cat-recent-post">
										<?php the_post_thumbnail('most-recent'); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
									</div>
								</div>
								<div class="col-md-5">
									<div class="row">
										<?php } else { ?>
										<div class="col-md-12 cat-posts">
											<div class="row align-items-center">
												<div class="col-md-5">
													<?php the_post_thumbnail('recent-posts'); ?>
												</div>
												<div class="col nopadding">
													<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
													<p class="cat-posts__paragraph"><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span> <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></span></p>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php endwhile; endif; ?>
									</div>
								</div>
							<div class="col-12 strike-left hidden-md-down">
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
get_footer();
