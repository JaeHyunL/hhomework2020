<?php
/**
* Home page template - Slider image
* @package New-Estate
*/

#####---=======================--- #####
#####---=== Slider settings ===--- #####
#####---=======================--- #####
$new_estate_slider_enable = get_theme_mod('new_estate_slider_enable');

if( $new_estate_slider_enable ){	
	$id = absint(get_theme_mod( 'new_estate_slider_page', '' ));
	$post = get_post( $id );
	
	if ( is_a( $post, 'WP_Post' ) ) {
		$thumb = get_the_post_thumbnail();
		$thumb_url = get_the_post_thumbnail_url();

		?>
		<div class="container-fluid">
			<div class="frontpage-slider row <?php if(!$thumb) echo 'frontpage-noimg'; ?>" style="background: url('<?php if($thumb_url) echo esc_url(get_the_post_thumbnail_url());?>') no-repeat fixed 100%; background-size: cover;" >
				<div class="frontpage-slide-content">
					<div class="frontpage-slide-texts">
						<h3><?php echo esc_html(get_the_title()); ?></h3>
						<?php the_excerpt(); ?>
						<div class="frontpage-link"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod( 'new_estate_slider_text', esc_html__('Read More','new-estate'))); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	<?php }; ?>	
<?php }; ?>
