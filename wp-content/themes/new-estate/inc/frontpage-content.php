<?php
/**
* Home page template - content area 
* @package New-Estate
*/

#####---=============================--- #####
#####---=== Content area settings ===--- #####
#####---=============================--- #####
$new_estate_slider_enable = get_theme_mod('new_estate_content_enable');

if( $new_estate_slider_enable ){	
	$id = absint(get_theme_mod( 'new_estate_content_page', '' ));
	$post = get_post( $id );
	$content = $post->post_content;

	
	if ( is_a( $post, 'WP_Post' ) ) {
		$thumb = get_the_post_thumbnail();
		$thumb_url = get_the_post_thumbnail_url();
		$title = get_the_title();

		?>
		<div class="frontpage-content container-fluid">
			<div class="frontpage-content-area container clearfix">
				<div class="content-left <?php if($thumb) echo 'col-md-6'; ?>">
					<h3><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_html( $title ); ?></a></h3>
					<p><?php echo wp_trim_words( strip_tags($content), 100, '' ); ?></p>
				</div>
				<?php if($thumb) : ?>
				<div class="content-right col-md-6">
					<?php echo $thumb; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php }; ?>	
<?php }; ?>
