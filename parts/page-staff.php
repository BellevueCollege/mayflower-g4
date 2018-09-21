<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php if($post->post_content=="") : ?>
	<!-- Don't display empty the_content or surround divs -->
		<div class="page-content">
			<div class="content-padding">
			<h1><?php the_title(); ?></h1>
			</div><!-- content-padding -->
		</div><!-- page-content -->
	<?php else : ?>
	<!-- Do stuff when the_content has content -->
		<div class="page-content">
			<div class="content-padding">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			</div><!-- content-padding -->
		</div><!-- page-content -->

	<?php endif; ?>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, these aren\'t the bytes you are looking for.'); ?></p>
<?php endif; ?>

<?php
// Ensure Mayflower Options are available to loaded file
$mayflower_options = mayflower_get_options();

require_once get_template_directory() . '/inc/mayflower-staff/output.php';