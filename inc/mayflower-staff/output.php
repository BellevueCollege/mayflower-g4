<?php
	/* $mayflower_options needs to be defined before including this file */
	//global $mayflower_options;

// Start showing staff list
$loop = new WP_Query( array(
	'post_type' => 'staff',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC'
) );



if ( $mayflower_options['staff_layout'] == 'list-view' ) {
	if ( $mayflower_options['staff_picture_toggle'] == true ) { ?>
		<div class="top-spacing15 staff-details">
	<?php } else { ?>
		<div class="top-spacing15 staff-details">
	<?php }

	while ( $loop->have_posts() ) : $loop->the_post();
		// Load Post Metatadata
		$post_meta_data = get_post_custom(get_the_ID() );
		?>
		
		<div class="staff-details-card">
			<a class="pull-left" href="<?php the_permalink(); ?>">
				<?php if ( $mayflower_options['staff_picture_toggle'] == true ) {
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumbnail', array('class' => 'media-object img-responsive img-thumbnail', 'alt' => the_title_attribute( array( 'after' => ' Picture', 'echo' => false ) ) ) );
					} else {
						echo '<img class="media-object img-responsive img-thumbnail" alt="" src="' . get_stylesheet_directory_uri() . '/img/thumbnail-default.png" />';
					}
				} ?>
			</a>

			<div class="media-body">
				<div class="caption staff-details content-padding staff-details-top">
					<div class="staff-details-header">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php if (isset($post_meta_data['_staff_position'][0])) { ?>
							<h3><?php echo $post_meta_data['_staff_position'][0]; ?></h3>
						<?php } ?>
					</div>

					<ul>
						<?php if (isset($post_meta_data['_staff_email'][0])) { ?>
							<li>
								<strong>Email: </strong>
								<a href="mailto:<?php echo $post_meta_data['_staff_email'][0];  ?>"><?php echo $post_meta_data['_staff_email'][0]; ?></a>
							</li>
						<?php } ?>

						<?php 
						if ( $mayflower_options['staff_phone_toggle'] == true ) {
							if (isset($post_meta_data['_staff_phone'][0])) { ?>
								<li>
									<strong>Phone: </strong>
									<?php echo $post_meta_data['_staff_phone'][0];  ?>
								</li>
						<?php } } ?>

						<?php 
						if ( $mayflower_options['staff_location_toggle'] == true ) {
							if (isset($post_meta_data['_staff_office_location'][0])) { ?>
								<li>
									<strong>Office Location: </strong>
									<?php echo $post_meta_data['_staff_office_location'][0];  ?>
								</li>
						<?php } } ?>
						
						<?php 
						if ( $mayflower_options['staff_hours_toggle'] == true ) {
							if (isset($post_meta_data['_staff_office_hours'][0])) { ?>
							<li>
								<strong>Office Hours: </strong>
								<?php echo $post_meta_data['_staff_office_hours'][0];  ?>
							</li>
						<?php } } ?>

					</ul>
					<?php if ( $mayflower_options['staff_bio_toggle'] == true ) {
						if ( '' === get_post()->post_content ) {
							if ( $mayflower_options['staff_more_toggle'] == true ) { ?>
								<p>
									<a href="<?php the_permalink(); ?>">...more about <?php the_title(); ?></a>
								</p>
							<?php }
						} else { //post content not empty ?>
							<h3 class="staff-biography">Biography:</h3>
							<?php $content_array = explode(' ', get_the_content());
							$content_count = count($content_array);
							if ( $content_count >= 55 ) { //echo excerpt if content is greater/equal to 55 words
								echo the_excerpt();
							} else { //echo excerpt and 'more' link if content is less than 55 words
								echo the_excerpt();
								if ( $mayflower_options['staff_more_toggle'] == true ) { ?>
									<p>
										<a href="<?php the_permalink(); ?>">...more about <?php the_title(); ?></a>
									</p>
								<?php }
							}
							
						}
					} else { //staff_bio_toggle == false
						if ( $mayflower_options['staff_more_toggle'] == true ) { ?>
							<p>
								<a href="<?php the_permalink(); ?>">...more about <?php the_title(); ?></a>
							</p>
						<?php } 
					} ?>
				</div><!-- caption -->
			</div><!-- media-body -->
		</div> <!-- staff-details-card -->
	
		<div class="clearfix"></div>
		<hr />
		<?php endwhile; ?>
	</div><!-- padding -->
	
<?php } elseif ( $mayflower_options['staff_layout'] == 'grid-view' ) { ?>
	<?php
	// ########################
	// Start showing staff grid
	// ########################

	$columnNum = 3;
	$count = 0;
	while ( $loop->have_posts() ) : $loop->the_post();
		// Load Post Metatadata
		$post_meta_data = get_post_custom(get_the_ID() );
		$count++;
		if ($count == 1) {
			if ( $mayflower_options['staff_picture_toggle'] == true ) {
				echo '<div class="row top-spacing15">';
			} else {
				echo '<div class="row top-spacing15 staff-details-grid-top">';
			}
		} ?>

		<div class="col-md-4 staff-details-col">
			<div class="content-padding">
				<div class="staff-details-card-grid">
					<?php if ( $mayflower_options['staff_picture_toggle'] == true ) {
						if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>">
								<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array( 'class' => 'media-object img-responsive img-thumbnail', 'alt' => the_title_attribute( array('after' => ' Picture', 'echo' => false) ) ) ); ?>
							</a>
						<?php } else {
							echo '<img class="media-object img-responsive img-thumbnail" alt="" src="' . get_stylesheet_directory_uri() . '/img/thumbnail-default.png" />';
						}
					} ?>

					<div class="caption staff-details staff-details-grid-top">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php if (isset($post_meta_data['_staff_position'][0])) { ?>
							<p>
								<?php echo $post_meta_data['_staff_position'][0]; ?>
							</p>
						<?php } 
						if ( $mayflower_options['staff_more_toggle'] == true ) { ?>
							<p>
								<a href="<?php the_permalink(); ?>">... more about <?php the_title(); ?></a>
							</p>
						<?php } ?>
					</div><!-- caption staff-details staff-details-grid-top-->
				</div> <!-- staff-details-card-grid-->
			</div><!-- content-padding -->
		</div> <!-- end of col-md-4 -->
		<?php if ($count == $columnNum) {
			echo '</div> <!-- .row -->';
			$count = 0;
		}
		endwhile;
		if ($count > 0 ) {
			echo '</div> <!-- .row -->';
		} ?>

<?php } // end elseif

 wp_reset_postdata();