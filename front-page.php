<?php
/**
 * The front page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINT_Blog
 */

get_header(); ?>
<div class="hidden-sm-down">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 menu--secondary">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'secondary-menu', 'menu_class' => 'mt-2 mt-md-1' ) ); ?>
			</div>
			<div class="col-md-4 menu--secondary menu--tertiary">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'tertiary-menu', 'menu_class' => 'mt-2 mt-md-1' ) ); ?>
			</div>
		</div>
	</div>
	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="jumbotron jumbotron-fluid" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; height: 521px">
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
			<p class="jumbotron__paragraph"><span class="user-icon-white"> <?php the_author_posts_link(); ?></span> <span class="date-icon-white"> <?php the_time('M j'); ?></span></p>
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
							<?php
							$category_id = 2; 
							$category_link = get_category_link( $category_id );
							$i = 0; 
							query_posts('cat=2&posts_per_page=4'); ?>
									<div class="col-12 strike-right">
										<h3 class="strike-right__heading-3"><a href="<?php echo esc_url( $category_link ); ?>" title="Category Name"><?php echo get_cat_name( $category_id ); ?></a></h3>
									</div>
								<div class="col-md-7">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++ ?>
									<?php if ($i == 1) { ?>
									<div class="col-md-12 cat-recent-post">
										<?php the_post_thumbnail('most-recent'); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('M j'); ?></span></p>
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
													<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('M j'); ?></span></p>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php endwhile; endif; ?>
									</div>
								</div>
							<div class="col-12 strike-left">
								<a class="strike-left__see-all" href="<?php echo esc_url( $category_link ); ?>" title="Category Name">See All Posts</a>
							</div>
							</div>
							<div class="row">
							<?php
							$category_id = 3; 
							$category_link = get_category_link( $category_id );
							$k = 0; 
							query_posts('cat=3&posts_per_page=4'); ?>
									<div class="col-12 strike-right">
										<h3 class="strike-right__heading-3"><a href="<?php echo esc_url( $category_link ); ?>" title="Category Name"><?php echo get_cat_name( $category_id ); ?></a></h3>
									</div>
								<div class="col-md-7">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $k++ ?>
									<?php if ($k == 1) { ?>
									<div class="col-md-12 cat-recent-post">
										<?php the_post_thumbnail('most-recent'); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('M j'); ?></span></p>
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
													<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('M j'); ?></span></p>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php endwhile; endif; ?>
									</div>
								</div>
							<div class="col-12 strike-left">
								<a class="strike-left__see-all" href="<?php echo esc_url( $category_link ); ?>" title="Category Name">See All Posts</a>
							</div>
							</div>
							<div class="row">
							<?php
							$category_id = 4; 
							$category_link = get_category_link( $category_id );
							$m = 0; 
							query_posts('cat=4&posts_per_page=4'); ?>
									<div class="col-12 strike-right">
										<h3 class="strike-right__heading-3"><a href="<?php echo esc_url( $category_link ); ?>" title="Category Name"><?php echo get_cat_name( $category_id ); ?></a></h3>
									</div>
								<div class="col-md-7">
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $m++ ?>
									<?php if ($m == 1) { ?>
									<div class="col-md-12 cat-recent-post">
										<?php the_post_thumbnail('most-recent'); ?>
										<h2 class="cat-recent-post__heading-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<p class="cat-recent-post__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('M j'); ?></span></p>
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
													<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('M j'); ?></span></p>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php endwhile; endif; ?>
									</div>
								</div>
							<div class="col-12 strike-left">
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
</div>
<div class="hidden-md-up">
	<div class="container-fluid">
		<div class="row">
			<div class="col menu--secondary menu--tertiary">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'tertiary-menu', 'menu_class' => 'mt-2 mt-md-1' ) ); ?>
			</div>
		</div>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 nopadding">
				<?php the_post_thumbnail('responsive-blog'); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-12 cat-posts">
			<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('F j'); ?></span> <span class="cat-icon-black"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?> </span></p>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>
<?php
get_footer();
