<?php
/**
 * The template for displaying home page.
 * @package Xmas Biz
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
else{
	/*main widget for footer section*/	
	if( is_active_sidebar( 'home-page-mian' ) ){
		echo "<div class='homepage-widgets'>";
 		dynamic_sidebar( 'home-page-mian' );
		echo "</div>";
	}
		if (xmas_biz_get_option('home_page_content_status') == 1) {
			?>
			<section class="section-block recent-blog">
					<div id="primary" class="content-area">
					<?php
					while ( have_posts() ) : the_post();
						the_title('<h2 class="entry-title">', '</h2>');
						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>
					</div><!-- #primary -->
				    <?php get_sidebar(); ?>
				    <!-- #sidebar -->
			</section>
		<?php }
}
get_footer();