<!DOCTYPE html>
<?php
global $post,
	   $mayflower_options,
	   $mayflower_brand,
	   $mayflower_brand_css,
	   $mayflower_theme_version;


if ( ! ( is_array( $mayflower_options ) ) ) {
	$mayflower_options = mayflower_get_options();
}

$mayflower_theme_version = wp_get_theme();
$post_meta_data = get_post_custom( $post->ID ?? null );
?>

<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php if ( isset( $post_meta_data['_seo_meta_description'][0] ) ) { ?>
		<meta property="og:title" content="<?php echo esc_html( $post_meta_data['_seo_custom_page_title'][0] ); ?>" />
	<?php } else { ?>
		<meta property="og:title" content="<?php echo get_the_title() . ' :: ' . get_bloginfo( 'name', 'display' ) . ' @ Bellevue College' ?>" />
	<?php } ?>

	<?php if ( isset( $post_meta_data['_seo_meta_description'][0] ) ) { ?>
		<meta name="description" content="<?php echo esc_html( $post_meta_data['_seo_meta_description'][0] ); ?>" />
		<meta property="og:description" content="<?php echo esc_html( $post_meta_data['_seo_meta_description'][0] ); ?>" />
	<?php } ?>
	<?php if ( isset( $post_meta_data['_seo_meta_keywords'][0] ) ) { ?>
		<meta name="keywords" content="<?php echo esc_html( $post_meta_data['_seo_meta_keywords'][0] ); ?>" />
	<?php } ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/bellevue.ico" />

	<!-- Swiftype meta tags -->
	<meta class='swiftype' name='popularity' data-type='integer' content='<?php echo is_front_page( $post->ID ?? null ) ? 5 : 1 ?>' />
	<meta class="swiftype" name="published_at" data-type="date" content="<?php the_modified_date( 'Y-m-d' ) ?>" />
	<meta class="swiftype" name="site_home_url" data-type="string" content="<?php echo esc_textarea( mayflower_trimmed_url() ) ?>" />

	<?php if ( is_archive( $post->ID ?? null ) ) { ?>
		<meta name="robots" content="noindex, follow">
	<?php } ?>
	<!-- / Swiftype meta tags -->

	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<!--- Open Graph Tags -->
	<?php if ( 'post' === get_post_type( ) ) : ?>
		<meta property="og:type" content="article" />
		<meta property="article:published_time" content="<?php echo get_the_date('c') ?>" />
		<meta property="article:modified_time" content="<?php echo get_the_modified_date('c') ?>" />
	<?php else : ?>
		<meta property="og:type" content="website" />
	<?php endif; ?>

	<?php if ( get_the_post_thumbnail_url( get_the_ID(),'medium') ) : ?>
		<meta property="og:image" content="<?php echo get_the_post_thumbnail_url( get_the_ID(),'medium') ?>" />
	<?php else: ?>
		<meta property="og:image" content="https://s.bellevuecollege.edu/bc-og-default.jpg" />
	<?php endif; ?>

	<meta property="og:url" content="<?php echo get_permalink() ?>" />
	<meta property="og:site_name" content="Bellevue College" />
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}

	##############################################
	### Branded or Lite versions of the header
	##############################################

	if ( 'branded' === $mayflower_brand ) :
		###############################
		### --- Branded version --- ###
		###############################
		$globals = new Globals();
		$globals->tophead_big();

		//display site title on branded version
		if ( is_404() ) { ?>
			<div id="main-wrap" class="<?php echo esc_attr( $mayflower_brand_css ); ?>">
				<div id="main" class="container <?php echo esc_attr( $mayflower_brand_css ); ?>">
		<?php } else { ?>

			<div id="site-header" class="container <?php echo esc_attr( $mayflower_brand_css ); ?>">
				<p class="site-title">
					<a title="Return to Home Page" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</p>
			</div>

		<?php }
	else :
		############################
		### --- Lite version --- ###
		############################
		get_template_part( 'parts/light-header' );
		
		

	endif; // End if()
?>
	<div id="main" class="<?php echo esc_attr( $mayflower_brand_css ); ?> container shadow">
		<div class="row pt-4">