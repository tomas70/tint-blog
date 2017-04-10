<?php
/**
 * The author page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TINT_Blog
 */

get_header(); ?>

<header class="author-header">
	<div class="container">
		<div class="row align-items-center hidden-sm-down">
			<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
			<div class="col-1">
				<?php echo get_avatar( $curauth, 60 ); ?>
			</div>
			<div class="col-3 nopadding">
				<h2 class="author-header__heading-2"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?> <i class="fa fa-twitter" aria-hidden="true"></i></h2>
			</div>
			<div class="col-6 author-header__description">
				<?php echo $curauth->user_description; ?>
			</div>
			<div class="col-2">
				<a class="author-header__url" href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
			</div>
		</div>
		<div class="row hidden-sm-up">
			<div class="col-4">
				<?php echo get_avatar( $curauth, 100 ); ?>
			</div>
			<div class="col-8">
				<h2 class="author-header__heading-2"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?> <i class="fa fa-twitter" aria-hidden="true"></i></h2>
				<p class="author-header__description"><?php echo $curauth->user_description; ?></p>
				<a class="author-header__url" href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
			</div>

			<div class="col author-header__text">
				Posts By <?php echo $curauth->first_name; ?>:
			</div>
		
		</div>
	</div>
</header>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container hidden-sm-down">
			<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="col-md-4 cat-posts">
						<div class="row">
							<div class="col">
								<?php the_post_thumbnail(); ?>
							
								<h3 class="cat-posts__heading-3"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								<p class="cat-posts__paragraph"><span class="user-icon-black"> <?php the_author_posts_link(); ?></span> <span class="date-icon-black"> <?php the_time('jS F'); ?></span></p>
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
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
