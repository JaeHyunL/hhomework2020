<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xmas Biz
 */

?>
	<div class="entry-content">
		<?php
			$image_values = get_post_meta( $post->ID, 'xmas-biz-meta-image-layout', true );
			if ( empty( $image_values ) ) {
				$values = esc_attr( xmas_biz_get_option('single_post_image_layout') );
			} else{
				$values = esc_attr($image_values);
			}
			if( 'no-image' != $values ){
				if( 'left' == $values ){
					echo "<div class='image-left'>";
					the_post_thumbnail('medium');
				}
				elseif( 'right' == $values ){
					echo "<div class='image-right'>";
					the_post_thumbnail('medium');
				}
				else{
					echo "<div class='image-full'>";
					the_post_thumbnail('full');
				}
				echo "</div>";/*div end */
			}
		?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xmas-biz' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
<?php if (is_singular()) { ?>
	<footer class="entry-footer">
		<?php xmas_biz_entry_footer(); ?>
	</footer><!-- .entry-footer -->
<?php } ?>

</article><!-- #post-## -->

