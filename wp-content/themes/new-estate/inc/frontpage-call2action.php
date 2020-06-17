<?php
/**
* Home page template - Slider image
* @package New-Estate
*/

#####---============================--- #####
#####---=== call2action settings ===--- #####
#####---============================--- #####
$new_estate_slider_enable = get_theme_mod('new_estate_call2action_enable');

if( $new_estate_slider_enable ){	
	$id = absint(get_theme_mod( 'new_estate_call2action_page', '' ));
	$post = get_post( $id );
	
	if ( is_a( $post, 'WP_Post' ) ) {		

		?>
		<div class="call2action container-fluid">
			<div class="container">
				<h3><?php echo esc_html(get_the_title()); ?></h3>
				<div class="frontpage-link"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod( 'new_estate_call2action_text', esc_html__('Read More','new-estate'))); ?></a></div>
			</div>
		</div>
	<?php }; ?>	
<?php }; ?>
