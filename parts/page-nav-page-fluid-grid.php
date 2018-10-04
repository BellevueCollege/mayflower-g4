<?php while ( have_posts() ) : the_post(); ?>
	<main id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">
		<div class="content-padding post-heading">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php if ( function_exists( 'post_and_page_asides_return_title' ) ) :
			get_template_part( 'parts/aside' );
		endif; ?>
		<?php if ( $post-> post_content=="" ) : /* Don't display empty the_content or surround divs */
		else : /* Do stuff when the_content has content */ ?>
			<article class="content-padding" data-swiftype-name="body" data-swiftype-type="text">
				<?php the_content(); ?>
			</article>
		<?php endif; ?>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
	<div class="clearfix"></div>
	<div class="content-padding">
		<?php require get_template_directory() . '/inc/nav-page/fluid-grid.php'; ?>
	</div>
</main>
