<?php
/**
 * The Blog Home File
 *
 * This displays posts on the 'Blog Home' page
 *
 * @package Mayflower
 */

get_header();
?>
<?php if ( has_active_sidebar() ) : ?>
	<div class="col-md-9 order-1 <?php echo 'sidebar-content' === mayflower_get_option( 'default_layout' ) ? '' : 'order-md-0'; ?>">
<?php else : // Full Width Container. ?>
	<div class="col-md-12">
<?php endif; ?>
		<main role="main">
			<?php
			/**
			 * Get Archive Template Part
			 *
			 * Check for post type. Look within 'parts/' directory.
			 */
			get_template_part( 'parts/content', 'blog-home' );
			?>
		</main>
	</div>
<?php if ( has_active_sidebar() ) : ?>
	<?php
	get_sidebar();
endif;
?>

<?php get_footer(); ?>
