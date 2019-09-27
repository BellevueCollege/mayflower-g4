<?php
/*
Template Name: Staff Page
*/
?>

<?php get_header(); ?>
<?php
/**
 * Load Variables
 *
 */
global $mayflower_brand;
$mayflower_options = mayflower_get_options();
$current_layout = $mayflower_options['default_layout'];
?>

<?php if ( has_active_sidebar() ) : ?>
	<div class="col-md-9 <?php  if ( $current_layout == 'sidebar-content' ) { ?>order-md-1<?php } ?>">
<?php else : // Full Width Container ?>
	<div class="col-md-12">
<?php endif; ?>
		<main role="main">
			<?php get_template_part( 'parts/page-staff' ); ?>
		</main>
	</div>
<?php if ( has_active_sidebar() ) : ?>
	<?php get_sidebar();
endif; ?>

<?php get_footer(); ?>
