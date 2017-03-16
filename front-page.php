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
	<div class="jumbotron jumbotron-fluid" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;">
		<div class="container">
		<h3>Most Recent</h3>
		<?php
			$args = array('numberposts' => '1', );
			$recent_posts = wp_get_recent_posts( $args );
			foreach ($recent_posts as $recent ) {
				echo '<h1><a href="'. get_permalink($recent["ID"]) .'">' .  $recent["post_title"].' </a></h1>';
			}
			wp_reset_query();
		?>
			<p><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author(); ?> <i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></p>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php query_posts('cat=1&posts_per_page=1'); ?>
				<div class="col">
					<h3><?php the_category(); ?></h3>
				</div>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_post_thumbnail( array(415, 277) ); ?>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p><i class="fa fa-user-o" aria-hidden="true"></i> <?php the_author(); ?> <i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('jS F'); ?></p>
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
<?php
get_sidebar();
get_footer();
