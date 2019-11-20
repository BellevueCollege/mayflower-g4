<?php
/**
 * Nav Page List Template Part
 *
 * @package Mayflower
 */

?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<h1><?php the_title(); ?></h1>
		<?php
		if ( function_exists( 'post_and_page_asides_return_title' ) ) :
			get_template_part( 'parts/aside' );
	endif;
		?>
		<?php if ( '' !== $post->post_content ) : ?>
		<article data-swiftype-name="body" data-swiftype-type="text">
			<?php the_content(); ?>
		</article>
	<?php endif; ?>
		<?php
			endwhile;
			wp_reset_postdata();
	?>
	<?php require get_template_directory() . '/inc/nav-page/list.php'; ?>
</main>
