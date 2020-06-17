<?php 

/**
 * Template Name: Front Page
 * @package New-Estate
 */

get_header(); ?>

<div class="homepage-widget-area">
	<?php 
		###Get sidebar
		dynamic_sidebar( 'home-sidebar' ); 
	?>
</div>


<?php 

#####---=== Get Home Slider ===--- #####
get_template_part('inc/frontpage','slider');

#####---=== Get offer area ===--- #####
get_template_part('inc/frontpage','offer');

#####---=== Get call2action area ===--- #####
get_template_part('inc/frontpage','call2action');

#####---=== Get content area ===--- #####
get_template_part('inc/frontpage','content');

#####---=== Get latest posts ===--- #####
get_template_part('inc/frontpage','latestpost');		
					
get_footer(); 
?>