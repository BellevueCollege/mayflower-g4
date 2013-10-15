<?php 
global $mayflower_brand; 
?>

<div id="content" <?php if( $mayflower_brand == 'branded' )  {?> class="box-shadow"<?php }?>>
<?php
	get_template_part('part-featured-full'); 
	?>
    <div class="row-padding">
    <?php
	if ( is_home() ) {
		// If we are loading the Blog home page (home.php)
		get_template_part('part-home');
	} else if ( is_page_template('page-staff.php') ) {
		// If we are loading the staff page template
		get_template_part('part-staff');
	} else if ( is_singular('staff') ) {
		// If we are loading the single-staff 
		get_template_part('part-single-staff');
	} else if ( is_page_template('page-nav-page.php') ) {
		// If we are loading the navigation-page page template
		get_template_part('part-nav-page');
	} else if ( is_single() ) {
		// If we are loading the navigation-page page template
		get_template_part('part-single');
	} else { 
	
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
        
            <div class="content-padding <?php 
                //display slider in content if option is selected
                if ( ($mayflower_options['slider_toggle'] == 'true') && ($mayflower_options['slider_layout'] == 'featured-in-content')){ 
                    echo "row-padding";
                } 
            ?>">
            <?php
                
            if (is_front_page() ) {
                //don't show the title on the home page
            } else { 
                if ( is_main_site()) {
                    //if main site, only show title here if page is not top-most ancestor
                    if(intval($post->post_parent)>0){
                        ?><h1><?php the_title(); ?></h1><?php
                    }
                } else {
                    ?><h1><?php the_title(); ?></h1><?php
                }
            }; ?>
            
            </div><!--.content-padding-->
            
            <?php
            if($post->post_content=="") : ?>
                <!-- Don't display empty the_content or surround divs -->
                <?php
            else : ?>	
                <div class="content-padding">
                <?php 
                the_content(); ?>
                </div> <!--.content-padding-->
                <?php 
            endif; 
                        
            get_template_part('part-blogroll'); ?>
            
		<?php
		endwhile; else: ?>
		<p><?php _e('Sorry, these aren\'t the bytes you are looking for.'); ?></p>
		<?php endif; 
	} ?>
    </div><!--.row-padding-->
</div><!-- #content -->