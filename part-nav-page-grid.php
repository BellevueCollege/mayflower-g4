<?php while ( have_posts() ) : the_post(); ?>

	<div class="content-padding">
    <?php 
	if ( is_main_site()) {
		if(intval($post->post_parent)>0){
			?><h1><?php the_title(); ?></h1><?php
		}
	} else {
		?><h1><?php the_title(); ?></h1><?php
	}
	?>
                        
	

	<?php if($post->post_content=="") : ?>
	<!-- Don't display empty the_content or surround divs -->

	<?php else : ?>
	<!-- Do stuff when the_content has content -->
	<div class="lead">
			<?php the_content(); ?>
	</div>

	<?php endif; ?>


		<?php
			endwhile;
			wp_reset_postdata();

		?>
	</div><!-- content-padding -->

	<?php
		$args = array(
			'post_type' => 'page',
			'posts_per_page' => -1,
			'orderby' => 'menu_order title',
			'post_status' => 'publish',
			'post_parent' => $post->ID
		);
		$loop = new WP_Query( $args );
		
		//number of columns
		$columnNum = 3;
		$count = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
			$count++;
			if ($count == 1) {
					echo '<div class="row">';
			}  ?>
            
			<div class="span4 top-spacing15">
				<div class="content-padding nav-page">

						    <a class="" href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('home-small-ad', array('class' => ''));

								}
								else {

								}
							?>

							    </a>
					<h2>
						<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
					</h2>

					<?php
						the_excerpt();
						edit_post_link('edit', '<small>', '</small>');
					?>
				</div><!-- content-padding .nav-page -->
			</div><!-- span4 -->  <?php 
			
            if ($count == $columnNum) {
                echo '</div> <!-- .row -->';
                $count = 0;
            }
			
		endwhile; 
		
		if ($count > 0 ) {
					echo '</div> <!-- .row -->';
		}
		
		
		?>