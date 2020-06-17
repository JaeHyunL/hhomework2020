<?php
global $post;
if (!function_exists('xmas_biz_single_page_title')) :
    function xmas_biz_single_page_title()
    {
        if (is_front_page() && !is_home()) {
            return;
        }
        global $post;
        $global_banner_image = get_header_image();
        // Check if single.
            if (is_singular()) {
                if ( has_post_thumbnail( $post->ID ) ) {
                    $banner_image_single_post = get_post_meta( $post->ID, 'xmas-biz-meta-checkbox', true );
                    if ( 'yes' == $banner_image_single_post ) {
                        $banner_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'xmas-biz-header-image' );
                        $global_banner_image = $banner_image_array[0];
                    }
                }
            }
            ?>
        <div class="wrapper page-inner-title inner-banner data-bg" data-background="<?php echo esc_url($global_banner_image); ?>">
            <div class="table-align text-center">
                <div class="table-align-cell v-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 mb-30">
                                <?php if (is_singular()) { ?>
                                    <?php the_title('<h1 class="entry-title white-textcolor">', '</h1>'); ?>
                                    <?php if (!is_page()) { ?>
                                        <header class="entry-header">
                                            <div class="entry-meta entry-inner">
                                                <?php
                                                xmas_biz_posted_on(); ?>
                                            </div><!-- .entry-meta -->
                                        </header><!-- .entry-header -->
                                    <?php }
                                } elseif (is_404()) { ?>
                                    <h1 class="entry-title white-textcolor"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'xmas-biz'); ?></h1>
                                <?php } elseif (is_archive()) {
                                    the_archive_title('<h1 class="entry-title white-textcolor">', '</h1>');
                                    the_archive_description('<div class="taxonomy-description">', '</div>');
                                } elseif (is_search()) { ?>
                                    <h1 class="entry-title white-textcolor"><?php printf(esc_html__('Search Results for: %s', 'xmas-biz'), '<span>' . get_search_query() . '</span>'); ?></h1>
                                <?php } ?>

                                <?php
                                /**
                                 * Hook - xmas_biz_add_breadcrumb.
                                 */
                                do_action( 'xmas_biz_action_breadcrumb' );
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-header-overlay overlay-background">
            </div>
        </div>

        <?php
    }
endif;
add_action('xmas-biz-page-inner-title', 'xmas_biz_single_page_title', 15);
