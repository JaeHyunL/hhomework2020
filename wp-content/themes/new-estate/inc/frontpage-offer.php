<?php
/**
* Home page template - Offer
* @package New-Estate
*/

#####---=======================--- #####
#####---=== Offer settings ===--- #####
#####---=======================--- #####
$new_estate_offer_enable = get_theme_mod('new_estate_offer_enable');

if( $new_estate_offer_enable ){	
	$offer_title = esc_html(get_theme_mod('new_estate_offer_title', __('What we offer','new-estate')));
	?>
		<div class="frontpage-offer container">
			<h3><?php echo $offer_title; ?></h3>
			<div class="frontpage-offer-row clearfix">
				<?php 
         		$i=-1;
                global $post;
          		//Get Icons
				$offer_icon[0] = esc_attr(get_theme_mod('new_estate_offer_fontone','fa fa-bed'));
				$offer_icon[1] = esc_attr(get_theme_mod('new_estate_offer_fonttwo','fa fa-car'));
				$offer_icon[2] = esc_attr(get_theme_mod('new_estate_offer_fontthree','fa fa-map-marker'));
				//Get pages
				$offer_page[0] = absint(get_theme_mod('new_estate_offer_one'));
				$offer_page[1] = absint(get_theme_mod('new_estate_offer_two'));
				$offer_page[2] = absint(get_theme_mod('new_estate_offer_three'));
				//Get read more
				$offer_read[0] = esc_html(get_theme_mod('new_estate_offer_one_text', __('Read More','new-estate')));
				$offer_read[1] = esc_html(get_theme_mod('new_estate_offer_two_text', __('Read More','new-estate')));
				$offer_read[2] = esc_html(get_theme_mod('new_estate_offer_three_text', __('Read More','new-estate')));
                
				$args = array (
				  'post_type'		=> 'page',
				  'post__in'		=> $offer_page,
				  'orderby'			=>'post__in',
				);

				$offerloop = new WP_Query($args);
				if ($offerloop->have_posts()) :  while ($offerloop->have_posts()) : $offerloop->the_post();
				$i++;
				?>

            <div class="col-md-4 col-sm-6">
                <div class="frontpage-singleoffer">
                    <div class="icon">
                        <i class="<?php echo $offer_icon[$i]; ?>"></i>                        
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo wp_trim_words( strip_tags(get_the_content()), 19, '' ); ?></p>
                    <a href="<?php the_permalink(); ?>"><?php echo $offer_read[$i]; ?></a>
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
