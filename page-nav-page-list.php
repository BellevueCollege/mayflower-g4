<?php
/**
 * Template Name: Navigation Page (List)
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

		<?php get_template_part( 'parts/page-nav-page-list' ); ?>

	</div>
<?php if ( has_active_sidebar() ) : ?>
	<?php
	get_sidebar();
endif;
?>

<?php get_footer(); ?>
