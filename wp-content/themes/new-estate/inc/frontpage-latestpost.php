<?php
/**
* Home page template - Offer
* @package New-Estate
*/

#####---=======================--- #####
#####---=== Offer settings ===--- #####
#####---=======================--- #####
$new_estate_latestposts_enable = get_theme_mod('new_estate_latestposts_enable');

if( $new_estate_latestposts_enable ){	
	$offer_title = esc_html(get_theme_mod('new_estate_latestposts_title', __('Latest Posts','new-estate')));
	?>
		<div class="frontpage-latestposts container">
			<h3><?php echo esc_html($offer_title); ?></h3>
			<div class="frontpage-offer-row clearfix">
				<?php 
                     		             
				$args = array (
				  'post_type'	=> 'post',
				  'showposts'	=> 3
				);

				$latestloop = new WP_Query($args);
				if ($latestloop->have_posts()) :  while ($latestloop->have_posts()) : $latestloop->the_post();
				?>

	            <div class="col-md-4 col-sm-4">
	                <div class="frontpage-gridposts">
	                    <?php if ( has_post_thumbnail() ) the_post_thumbnail('new-estate-grid');?>
	                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                    <div class="frontpage-gridposts-icons"><i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></div>
	                    <p><?php echo wp_trim_words( strip_tags(get_the_content()), 19, '' ); ?></p>
	                    <a class="frontpage-gridposts-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('new_estate_latestposts_more', esc_html__('Read more','new-estate'))); ?></a>
	                </div>
	            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        endif;
        ?>
		</div>
		</div>
<?php }; ?>
