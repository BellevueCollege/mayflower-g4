<?php
/**
 * Page Template File
 *
 * Output page content.
 *
 * @package Mayflower
 */

get_header();
?>
<?php if ( has_active_sidebar() ) : ?>
	<div class="col-md-9 <?php echo 'sidebar-content' === mayflower_get_option( 'default_layout' ) ? 'order-1 ' : ''; ?>">
<?php else : // Full Width Container. ?>
	<div class="col-md-12">
<?php endif; ?>
		<?php if ( have_posts() ) : ?>
			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
				?>
				<main id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="main">
					<?php get_template_part( 'parts/page' ); ?>
				</main>
				<?php
			endwhile;
			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'parts/content', 'none' );

		endif;
		?>
	</div>
<?php
if ( has_active_sidebar() ) {
	get_sidebar();
}

get_footer();
?>
