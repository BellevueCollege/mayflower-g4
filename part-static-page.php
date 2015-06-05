<?php
	 if (is_active_sidebar('top-global-widget-area') || is_active_sidebar('page-widget-area') || is_active_sidebar('global-widget-area')) 
{ ?>

<?php
	$mayflower_options = mayflower_get_options();
	if( $mayflower_options['slider_toggle'] == 'true' ) { 
		if ( $mayflower_options['slider_layout'] == 'featured-full' ) { 
	        get_template_part('part-featured-full'); 
	    }
	}
?>
	<div class="row row-padding">  
		    <div class="col-md-9 <?php
				$mayflower_options = mayflower_get_options();
				$current_layout = $mayflower_options['default_layout'];
					if ( $current_layout == 'sidebar-content' ) { 
						?>col-md-push-3<?php
					} else {}; ?>">

		    <?php 
		    if( $mayflower_options['slider_toggle'] == 'true' ) { 
		       if ( $mayflower_options['slider_layout'] == 'featured-in-content' ) { 
		            get_template_part('part-featured-in-content'); 
		        } 
		    }  
		    if ( is_home() ) {
		        // If we are loading the Blog home page (home.php)
		        get_template_part('part-home');
		    } else if ( is_page_template() ) {
                /* Load template part based on template name. 
                   Template name 'page-(name).php' loads template part 'part-single-page-(name).php' */
                $template_name = str_replace('.php', '', get_page_template_slug());
                get_template_part( 'part-single', $template_name );
            } else if ( is_single() ) {
		        // Load single template. If custom post type, load template for that type.
		        get_template_part('part-single', get_post_type());
		    } else {
				
		        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					?>
		        
		            <div class="content-padding <?php 
		                //display slider in content if option is selected
		                if ( ($mayflower_options['slider_toggle'] == 'true') && ($mayflower_options['slider_layout'] == 'featured-in-content') && is_front_page()){ 
		                    echo "top-spacing30";
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
		        <?php 
		        endif; 
		    } ?>
		    </div><!-- col-md-9 -->
					
			    <?php
				    //if ( $current_layout == 'content-sidebar' || $current_layout == 'sidebar-content' ) {
				        get_sidebar();
				    //} else {};
			    ?>
		</div><!-- .row .row-padding -->	
<?php
} //END IF SIDEBAR HAS CONTENT

else {
//SIDEBAR IS EMPTY
?>
		<?php
			$mayflower_options = mayflower_get_options();
			if( $mayflower_options['slider_toggle'] == 'true' ) { 
		        get_template_part('part-featured-full'); 
			}
		?>
	    <div class="row row-padding">
	    <?php
		if ( is_home() ) {
			// If we are loading the Blog home page (home.php)
			get_template_part('part-home');
		} else if ( is_page_template() ) {
            /* Load template part based on template name. 
               Template name 'page-(name).php' loads template part 'part-single-page-(name).php' */
            $template_name = str_replace('.php', '', get_page_template_slug());
            get_template_part( 'part-single', $template_name );
        } else if ( is_single() ) {
            // Load single template. If custom post type, load template for that type.
            get_template_part('part-single', get_post_type());
        } else  { 
		
			if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	?>

	            <div class="content-padding">
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

	<?php
	} //END SIDEBAR IS EMPTY
