<?php
/**
 * The Single Post Template File
 *
 * This displays all single posts.
 *
 * @package Mayflower
 */

get_header(); ?>
<?php
/**
 * Load Variables
 */
global $mayflower_brand;
$mayflower_options = mayflower_get_options();
$current_layout    = $mayflower_options['default_layout'];
?>

<?php if ( has_active_sidebar() ) : ?>
	<div class="col-md-9
	<?php
	if ( 'sidebar-content' === $current_layout ) {
		?>
		order-1 <?php } ?>">
<?php else : // Full Width Container. ?>
	<div class="col-md-12">
<?php endif; ?>

		<?php
		/*
		 * Get Single Template Part
		 *
		 * Check for post type. Look within 'parts/' directory.
		 */
		$format = get_post_format();
		if ( $format ) {
			get_template_part( 'parts/single', $format );
		} else {
			get_template_part( 'parts/single', get_post_type() );
		}
		?>
	</div>
<?php if ( has_active_sidebar() ) : ?>
	<?php
	get_sidebar();
endif;
?>


<?php get_footer(); ?>
