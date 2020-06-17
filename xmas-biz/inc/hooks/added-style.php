<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Xmas Biz
 */

if (!function_exists('xmas_biz_trigger_custom_css_action')) :

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function xmas_biz_trigger_custom_css_action()
    {
        $xmas_biz_enable_banner_overlay = xmas_biz_get_option('enable_overlay_option');
        ?>
        <style type="text/css">
            <?php
            /* Banner Image */
            if ( $xmas_biz_enable_banner_overlay == 1 ){
                ?>
                body .hero-slider.overlay .slide-item .bg-image:before,
                body .inner-header-overlay,
                body .footer-overlay,
                body .section-cta,
                body .cta-overlay{
                    filter: alpha(opacity=80);
                    opacity: .80;
                }
            <?php
        } ?>
        </style>

    <?php }

endif;