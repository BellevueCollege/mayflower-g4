<?php while ( have_posts() ) : the_post(); ?>
	<main id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="main">
		<div class="content-padding post-heading">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php if ( function_exists( 'post_and_page_asides_return_title' ) ) :
			get_template_part( 'parts/aside' );
		endif; ?>
		<?php if ( $post-> post_content=="" ) : /* Don't display empty the_content or surround divs */
		else : /* Do stuff when the_content has content */ ?>
			<article class="content-padding" data-swiftype-name="body" data-swiftype-type="text">
				<?php the_content(); ?>
			</article>
		<?php endif; ?>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
	<div class="clearfix"></div>
	<div class="content-padding">
		<section id="child-pages" class="fluid-grid">
			<div class="grid-sizer"></div>
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'        => 'menu_order title',
				'post_status'    => 'publish',
				'post_parent'    => $post->ID
			);

			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) : $loop->the_post(); 
				$image_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium_large' );
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="max-width: <?php echo $image_data[1]; ?>px">

					<?php if ( has_post_thumbnail() ) { ?>
						<a class="" href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium_large', array( 'class' => 'img-responsive' ) ); ?>
						</a>
						<div class="hasimage">
					<?php } else { ?>
						<div>
					<?php } ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php
							the_excerpt();
							edit_post_link( 'edit', '<small>', '</small>' );
						?>
					</div>
				</article><!-- content-padding .nav-page -->

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
		</section>
	</div>
</main>
