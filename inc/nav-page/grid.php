<section class="nav-page">
	<?php
	$attributes['pageID'] = empty( $attributes['pageID'] ) ? get_the_ID() : $attributes['pageID'];
	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order title',
		'post_status'    => 'publish',
		'post_parent' => $attributes['pageID'],
	);

	$loop = new WP_Query( $args );

	//number of columns
	$columnNum = 3;
	$count = 0;

	while ( $loop->have_posts() ) : $loop->the_post();
		$count++;
		if ( $count == 1 ) {
			echo '<div class="row">';
		} ?>

		<div class="col-md-4">
			<article id="post-<?php the_ID(); ?>" <?php post_class('content-padding nav-page'); ?>>

				<?php if ( has_post_thumbnail() ) { ?>
					<a class="" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'home-small-ad', array( 'class' => 'img-fluid' ) ); ?>
					</a>
				<?php } else {} ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<?php
					the_excerpt();
					edit_post_link('edit', '<small>', '</small>');
				?>
			</article><!-- content-padding .nav-page -->
		</div><!-- col-md-4 -->
		<?php if ( $count == $columnNum ) { ?>
			</div> <!-- .row -->
			<?php $count = 0;
		} ?>

	<?php endwhile; ?>
	<?php if ($count > 0 ) { ?>
		</div> <!-- .row -->
	<?php } ?>

	<?php wp_reset_postdata(); ?>
</section>