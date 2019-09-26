<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="media">
		<div class="staff-details-card">
			<a class="pull-left" href="<?php the_permalink(); ?>">
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('medium', array('class' => 'media-object img-fluid img-thumbnail', 'alt' => the_title_attribute( array('after' => ' Picture', 'echo' => false) ) ) );
				}
				else {
					echo '<img class="media-object img-fluid img-thumbnail" alt="" src="' . get_stylesheet_directory_uri() . '/img/thumbnail-default.png" />';
				}
			?>
			</a>

			<div class="media-body">
				<div class="caption staff-details staff-details-top">
					<?php $post_meta_data = get_post_custom($post->ID); ?>
						<div class="staff-details-header">
							<h2><?php the_title(); ?></h2>

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

							<?php if (isset($post_meta_data['_staff_phone'][0])) { ?>
								<li>
									<strong>Phone: </strong>
									<?php echo $post_meta_data['_staff_phone'][0];  ?>
								</li>
							<?php } ?>

							<?php if (isset($post_meta_data['_staff_office_location'][0])) { ?>
								<li>
									<strong>Office Location: </strong>
									<?php echo $post_meta_data['_staff_office_location'][0];  ?>
								</li>
							<?php } ?>

							<?php if (isset($post_meta_data['_staff_office_hours'][0])) { ?>
								<li>
									<strong>Office Hours: </strong>
									<?php echo $post_meta_data['_staff_office_hours'][0];  ?>
								</li>
							<?php } ?>

						</ul>
						
				</div><!-- caption -->
			</div><!-- media-body -->
			<div class="row">
				<div class="col-12 staff-details">
					<div class="staff-biography-single">
						<?php if(empty($post->post_content)) {  } else { ?>
							<h3 class="staff-biography">Biography:</h3>
							<?php the_content();  ?>
						<?php } ?>
					</div>
				</div> <!-- col-sm-12 -->
			</div> <!-- row -->
		</div> <!-- staff-details-card -->
	</div><!-- media -->

	<?php endwhile; ?>

<?php wp_reset_query(); endif; ?>
