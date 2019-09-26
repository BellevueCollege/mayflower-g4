<?php
bc_tophead();

global $post,
	   $mayflower_options,
	   $globals_version,
	   $globals_url,
	   $globals_path,
	   $mayflower_brand,
	   $mayflower_brand_css,
	   $mayflower_theme_version;

?>
<header id="secondary-header" class="lite container shadow">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div id="site-branding">
				<?php
					$header_image = get_header_image();
					if ( ! empty( $header_image ) ) :
				?>
						<div class="header-image">
							<a title="Return to Home Page" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" class="header-image"  alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> : <?php bloginfo( 'description' ); ?>" />
							</a>
						</div><!-- header-image -->
				<?php 
					else : // no header image
				?>
						<p class="site-title">
							<a title="Return to Home Page" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
						<p class="site-description <?php if ( get_bloginfo( 'description' ) ){ echo 'site-description-margin'; } ?>">
							<?php bloginfo( 'description' ); ?>
						</p>
				<?php
					endif; // end no header image
				?>
			</div><!-- #site-branding -->
		</div>
		<div id="header-actions-container" class="col-md-4 <?php
												if ( get_bloginfo( 'description' ) ) {
													echo 'header-search-w-description ';
												}
												if ( '' === get_bloginfo( 'description' ) ) {
													echo 'header-social-links-no-margin ';
												} ?>">
			<div class="d-flex justify-content-end social-media <?php 
										if( empty( $mayflower_options['facebook'] ) && empty( $mayflower_options['twitter'] ) && empty( $mayflower_options['youtube'] ) && empty( $mayflower_options['instagram'] ) && empty( $mayflower_options['linkedin'] ) ){
											echo 'social-media-no-margin'; 
										} ?>">
				<?php if ( ! empty( $mayflower_options['facebook'] ) ) { ?>
					<a class="px-2 py-1" href="<?php echo esc_url( $mayflower_options['facebook'] ); ?>" title="Facebook"><img src="<?php echo esc_url( $globals_url ); ?>i/facebook.png" alt="facebook" /></a>
				<?php } ?>

				<?php if ( ! empty( $mayflower_options['twitter'] ) ) { ?>
					<a class="px-2 py-1" href="<?php echo esc_url( $mayflower_options['twitter'] ); ?>" title="Twitter"><img src="<?php echo esc_url( $globals_url ); ?>i/twitter.png" alt="twitter" /></a>
				<?php } ?>

				<?php if ( ! empty( $mayflower_options['youtube'] ) ) { ?>
					<a class="px-2 py-1" href="<?php echo esc_url( $mayflower_options['youtube'] ); ?>" title="YouTube"><img src="<?php echo esc_url( $globals_url ); ?>i/youtube.png" alt="youtube" /></a>
				<?php } ?>

				<?php if ( ! empty( $mayflower_options['instagram'] ) ) { ?>
					<a class="px-2 py-1" href="<?php echo esc_url( $mayflower_options['instagram'] ); ?>" title="Instagram"><img src="<?php echo esc_url( $globals_url ); ?>i/instagram.png" alt="instagram" /></a>
				<?php } ?>

				<?php if ( ! empty( $mayflower_options['linkedin'] ) ) { ?>
					<a class="px-2 py-1" href="<?php echo esc_url( $mayflower_options['linkedin'] ); ?>" title="LinkedIn"><img src="<?php echo esc_url( $globals_url ); ?>i/linkedin.png" alt="linkedin" /></a>
				<?php } ?>
			</div><!-- social-media -->

			<?php 
				if ( ! ( $mayflower_options['hide_searchform'] ) ) : ?>
					<div id="header-actions-bar" class="row searchform-show">
						<div id="main-nav-link" class="col-4 col-md-12">
							<a href="#college-navbar" title="Navigation Menu" class="btn btn-light btn-block" aria-expanded="false" aria-controls="main-nav-wrap"><i class="fas fa-bars" aria-hidden="true"></i> Menu</a>
						</div><!-- main-nav-link -->
						<div id="bc-search-container-lite" class="col-8 col-md-12">
							<a tabindex="-1" id="tools-close-icon" class="lite">
								<i class="fas fa-chevron-left" aria-hidden="true"></i><span class="sr-only">Close Search</span>
							</a>
							<?php get_search_form(); ?>
						</div>
					</div><!-- row -->
			<?php
				else :
			?>
					<div id="header-actions-bar" class="row searchform-hide">
						<div id="main-nav-link" class="col-12">
							<a href="#college-navbar" title="Navigation Menu" class="btn btn-light btn-block" aria-expanded="false" aria-controls="main-nav-wrap"> <i class="fas fa-bars" aria-hidden="true"></i> Menu</a>
						</div><!-- main-nav-link -->
					</div><!-- row -->

			<?php
				endif;
			?>

		</div><!-- header actions container -->

	</div>
	
	
	<?php
		get_template_part( 'parts/flexnav' );
	?>
</header>