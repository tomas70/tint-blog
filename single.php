<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TINT_Blog
 */

get_header(); ?>

	<?php 
		$args = array('numberposts' => '1', );
			$recent_posts = wp_get_recent_posts( $args );
			foreach ($recent_posts as $recent ) {
		$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]), 'full' );
		}
	?>
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
			<p class="jumbotron__paragraph"><span class="user-icon-white"> <?php the_author_posts_link(); ?></span> <span class="date-icon-white"> <?php the_time('jS F'); ?></span></p>
		</div>
	</div>
	<div class="container-fluid nopadding">
		<div class="row align-items-center single-post-header">
			<div class="col-md-9">
				<p>Need help creating content quickly? Download our latest marketing guide!</p>
			</div>
			<div class="col-md-3">
				<a href="" class="btn btn-download-ebook" role="button">Download eBook</a>
			</div>
		</div>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col-md-9">
								<div class="row">
									<div class="col">
									<?php
									while ( have_posts() ) : the_post();

										get_template_part( 'template-parts/content', get_post_format() );

										the_post_navigation();

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

									endwhile; // End of the loop.
									?>
									</div>
								</div>
							<div class="col-md-3 sidebar">
				 				<?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>
				 						<?php dynamic_sidebar( 'post-sidebar' ); ?>
				 				<?php endif; ?>
				 			</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
