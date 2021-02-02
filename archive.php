<?php
/**
 * The Archive Template File
 *
 * This displays all archives (tags, categories, etc.)
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
			<div data-swiftype-index='true' class="col-md-9
			<?php
			if ( 'sidebar-content' === $current_layout ) {
				?>
				order-1<?php } ?>">
		<?php else : // Full Width Container. ?>
			<div data-swiftype-index='true' class="col-md-12">
		<?php endif; ?>
				<main role="main">
					<?php
					/**
					 * Get Archive Template Part
					 *
					 * Check for post type. Look within 'parts/' directory.
					 */
					get_template_part( 'parts/archive', get_post_type() );
					?>
				</main>
			</div>
		<?php if ( has_active_sidebar() ) : ?>
			<?php
			get_sidebar();
		endif;
		?>

<?php get_footer(); ?>
