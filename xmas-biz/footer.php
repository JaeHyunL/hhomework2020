<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xmas Biz
 */

?>
</div><!-- #content -->
<!-- mailchimp -->
<?php if (xmas_biz_get_option('enable_mailchimp') == 1) { ?>
    <section class="section-mailchimp maichimp-bgcolor pt-50 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-block text-center mb-10">
                        <h2 class="section-title wow fadeIn">
                            <span> <?php echo esc_html(xmas_biz_get_option('mailchimp_title')); ?></span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 mt-10">
                    <?php
                    $xmas_biz_mailchimp_code = wp_kses_post(xmas_biz_get_option('mailchimp_shortcode'));
                    if (!empty($xmas_biz_mailchimp_code)) {
                        echo do_shortcode($xmas_biz_mailchimp_code);
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<footer id="colophon" class="site-footer data-bg" data-background="<?php echo esc_url(xmas_biz_get_option('footer_section_background_image')); ?>" role="contentinfo" >
    <div class="container-fluid">
        <!-- end col-12 -->
        <div class="row">
            <?php $xmas_biz_footer_widgets_number = xmas_biz_get_option('number_of_footer_widget');
            if( 1 == $xmas_biz_footer_widgets_number ){
                $col = 'col-md-12';
            }
            elseif( 2 == $xmas_biz_footer_widgets_number ){
                $col = 'col-md-6';
            }
            elseif( 3 == $xmas_biz_footer_widgets_number ){
                $col = 'col-md-4';
            }
            elseif( 4 == $xmas_biz_footer_widgets_number ){
                $col = 'col-md-3';
            }
            else{
                $col = 'col-md-3';
            }
            if(is_active_sidebar( 'footer-col-one' ) || is_active_sidebar( 'footer-col-two' ) || is_active_sidebar( 'footer-col-three' ) || is_active_sidebar( 'footer-col-four' )){ ?>
                <section class="wrapper block-section footer-widget pt-40 pb-40">
                    <div class="container overhidden">
                        <div class="contact-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <?php if( is_active_sidebar( 'footer-col-one' ) && $xmas_biz_footer_widgets_number > 0 ) : ?>
                                            <div class="contact-list <?php echo esc_attr( $col );?>">
                                                <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( is_active_sidebar( 'footer-col-two' ) && $xmas_biz_footer_widgets_number > 1 ) : ?>
                                            <div class="contact-list <?php echo esc_attr( $col );?>">
                                                <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( is_active_sidebar( 'footer-col-three' ) && $xmas_biz_footer_widgets_number > 2 ) : ?>
                                            <div class="contact-list <?php echo esc_attr( $col );?>">
                                                <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( is_active_sidebar( 'footer-col-four' ) && $xmas_biz_footer_widgets_number > 3 ) : ?>
                                            <div class="contact-list <?php echo esc_attr( $col );?>">
                                                <?php dynamic_sidebar( 'footer-col-four' ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php }?>

            <div class="copyright-area">
                <div class="site-info">
                    <h4 class="site-copyright white-textcolor">
                        <?php
                        $xmas_biz_copyright_text = wp_kses_post(xmas_biz_get_option('copyright_text'));
                        if(!empty ($xmas_biz_copyright_text)){
                            echo wp_kses_post(xmas_biz_get_option('copyright_text') );
                        }
                        ?>
                        <span class="sep"> | </span>
                        <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'xmas-biz' ), 'Xmas Biz', '<a href="http://themeinwp.com/" target = "_blank" rel="designer">Themeinwp </a>' ); ?>
                    </h4>
                </div><!-- .site-info -->
            </div>
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end container -->
    <div class="footer-overlay overlay-background"></div>
</footer>
</div><!-- #page -->
<a id="scroll-up" class="secondary-bgcolor"><i class="ion-ios-arrow-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>
