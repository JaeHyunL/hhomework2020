<?php
/**
 * Theme widgets.
 *
 * @package Xmas Biz
 */

// Load widget base.
require_once get_template_directory() . '/inc/widgets/widget-base-class.php';

if (!function_exists('xmas_biz_load_widgets')) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function xmas_biz_load_widgets()
    {
        // Xmas_Biz_Intro_section widget.
        register_widget('Xmas_Biz_Intro_section');

        // Xmas_Biz_Blog_Widget widget.
        register_widget('Xmas_Biz_Blog_Widget');

        // Xmas_Biz_Featured_widget.
        register_widget('Xmas_Biz_Featured_widget');

        // Xmas_Biz_Callback.
        register_widget('Xmas_Biz_Callback');


        // Xmas_Biz_Contact.
        register_widget('Xmas_Biz_Contact');

    }
endif;
add_action('widgets_init', 'xmas_biz_load_widgets');

/*the xmas biz intro section*/
if (!class_exists('Xmas_Biz_Intro_section')) :

    /**
     * Xmas Biz Widget
     *
     * @since 1.0.0
     */
    class Xmas_Biz_Intro_section extends Xmas_Biz_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'xmas_biz_intro_widget',
                'description' => __('Displays the content on the basis of page selected', 'xmas-biz'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'xmas-biz'),
                    'type'  => 'text',
                    'class' => 'widefat',
                ),
                'intro_page_icon_1' => array(
                    'label' => __('Icon For Page (http://ionicons.com/)1:', 'xmas-biz'),
                    'type'  => 'text',
                    'class' => 'widefat',
                    'placeholder' =>'ion-load-b',
                ),
                'intro_page_1' => array(
                    'label'            => __( 'Select Page 1:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'intro_page_icon_2' => array(
                    'label' => __('Icon For Page 2:', 'xmas-biz'),
                    'type'  => 'text',
                    'placeholder' =>'ion-load-b',
                    'class' => 'widefat',
                ),
                'intro_page_2' => array(
                    'label'            => __( 'Select Page 2:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'intro_page_icon_3' => array(
                    'label' => __('Icon For Page 3:', 'xmas-biz'),
                    'type'  => 'text',
                    'placeholder' =>'ion-load-b',
                    'class' => 'widefat',
                ),
                'intro_page_3' => array(
                    'label'            => __( 'Select Page 3:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'intro_page_icon_4' => array(
                    'label' => __('Icon For Page 4:', 'xmas-biz'),
                    'type'  => 'text',
                    'placeholder' =>'ion-load-b',
                    'class' => 'widefat',
                ),
                'intro_page_4' => array(
                    'label'            => __( 'Select Page 4:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'intro_page_icon_5' => array(
                    'label' => __('Icon For Page 5:', 'xmas-biz'),
                    'type'  => 'text',
                    'placeholder' =>'ion-load-b',
                    'class' => 'widefat',
                ),
                'intro_page_5' => array(
                    'label'            => __( 'Select Page 5:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'intro_page_icon_6' => array(
                    'label' => __('Icon For Page 6:', 'xmas-biz'),
                    'type'  => 'text',
                    'placeholder' =>'ion-load-b',
                    'class' => 'widefat',
                ),
                'intro_page_6' => array(
                    'label'            => __( 'Select Page 6:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
            );

            parent::__construct('xmas-biz-intro-widget', __('XB: About Widget', 'xmas-biz'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {
            $params = $this->get_params($instance);
            echo $args['before_widget'];
            if ( ! empty( $params['title'] ) ) {
                $xmas_biz_intro_page_title =  $params['title'];
            }
            ?>
            <!-- about Section -->
            <div class="about-section about-upper pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="section-title-block text-left mb-30">
                                <h2 class="section-title">
                                    <span>
                                        <?php echo esc_html($xmas_biz_intro_page_title ); ?>
                                    </span>
                                </h2>
                            </div>
                        </div>
                        <div class="list-item-wrapper clearfix">
                            <?php
                            // ID validation.
                            $intro_sub_page_id = '';
                            $data_delay = 0.5;
                            for ($i=1; $i <= 6 ; $i++) {
                                if ( absint( $params['intro_page_'.$i] ) > 0 ) {
                                    $intro_sub_page_id = absint( $params['intro_page_'.$i] );
                                }
                                if ( absint( $intro_sub_page_id ) > 0 ) {
                                    $qargs = array(
                                        'p'             => absint( $intro_sub_page_id ),
                                        'post_type'     => 'any',
                                        'no_found_rows' => true,
                                    );
                                    $the_query = new WP_Query( $qargs );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) {
                                            $the_query->the_post();
                                            ?>
                                            <div class="item col-sm-4 mb-20 mt-20 wow fadeIn" data-wow-delay="<?php echo esc_attr($data_delay); ?>s">
                                                <div class="item-iconbox section-bg-1" data-mh="col-group-about">
                                                    <div class="icon-image">
                                                        <span class='<?php echo esc_attr( $params['intro_page_icon_'.$i] ); ?> secondary-textcolor'></span>
                                                        <h3 class="block-title mt-10 mb-20"><?php the_title(); ?></h3>
                                                    </div>

                                                    <div class="content">
                                                        <p><?php
                                                            $word_count_intros = 25;
                                                            $xmas_biz_sub_content = xmas_biz_words_count(absint($word_count_intros), get_the_content());
                                                            echo esc_html($xmas_biz_sub_content); ?></p>
                                                        <a href="<?php the_permalink();?>" class="learn-more"><?php _e('Learn More','xmas-biz' ); ?><i class="ion-ios-arrow-thin-right"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        $data_delay = $data_delay + 0.5;
                                        $intro_sub_page_id = '';
                                        wp_reset_postdata();
                                    }
                                }
                            } ?>
                        </div>

                    </div>
                </div>
            </div>
            <!-- made main page of intro section compulsory -->
            <?php echo $args['after_widget'];
        }
    }
endif;

/*Xmas_Biz_Blog_Widget widget*/
if (!class_exists('Xmas_Biz_Blog_Widget')) :

    /**
     * Xmas Biz Widget
     *
     * @since 1.0.0
     */
    class Xmas_Biz_Blog_Widget extends Xmas_Biz_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'xmas_biz_blog_widgets',
                'description' => __('Displays post form selected category As Blog Post', 'xmas-biz'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'xmas-biz'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'short_discription' => array(
                    'label' => __('Short Discription:', 'xmas-biz'),
                    'type'  => 'text',
                    'class' => 'widget-content widefat'
                ),
                'post_category' => array(
                    'label' => __('Select Category:', 'xmas-biz'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => __('All Categories', 'xmas-biz'),
                ),
                'post_number' => array(
                    'label' => __('Number of Posts:', 'xmas-biz'),
                    'type' => 'number',
                    'default' => 4,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 8,
                ),
                'excerpt_length' => array(
                    'label' => __('Excerpt Length:', 'xmas-biz'),
                    'description' => __('Number of words', 'xmas-biz'),
                    'type' => 'number',
                    'css' => 'max-width:60px;',
                    'default' => 20,
                    'min' => 0,
                    'max' => 200,
                ),
            );

            parent::__construct('xmas-biz-blog-layout', __('XB: Blog Widget', 'xmas-biz'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            $qargs = array(
                'posts_per_page' => esc_attr($params['post_number']),
                'no_found_rows' => true,
            );
            if (absint($params['post_category']) > 0) {
                $qargs['category'] = absint($params['post_category']);
            }
            global $post;
            $all_posts = get_posts($qargs);
            ?>
            <?php if (!empty($all_posts)) : ?>
            <div class="blog-section pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="section-title-block text-center mb-30 pb-40">
                                <?php if (!empty($params['title'])) {
                                    echo '<h2 class="section-title  wow fadeIn"><span>'.esc_html($params['title']).'</span></h2>';
                                }?>
                                <?php if ( ! empty( $params['short_discription'] ) ) { ?>
                                    <p class="wow fadeInUp" data-wow-delay=".7s"><?php echo wp_kses_post( $params['short_discription']); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="blog-carousel">
                                <?php foreach ($all_posts as $key => $post) : ?>
                                    <?php setup_postdata($post); ?>
                                    <div class="blog-item section-bg-1">
                                        <div class="inner-box wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                                            <figure class="image-box">
                                                <?php if (has_post_thumbnail()) {
                                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'xmas-biz-700-465' );
                                                    $url = $thumb['0'];
                                                } else {
                                                    $url = get_template_directory_uri() . '/images/no-image-medium.jpg';
                                                }
                                                ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url($url); ?>" alt="<?php the_title_attribute(); ?>">
                                                    <div class="image-box-hover">
                                                        <div class="hover-wrapper">
                                                            <span class="ion-paper-airplane alt-textcolor"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </figure>
                                            <div class="block-content">
                                                <h3 class="block-title"><?php the_title(); ?></h3>
                                                <div class="title-seperator secondary-bgcolor wow fadeInRight" data-wow-delay=".7s"></div>
                                                <div class="block-detail mb-20">
                                                    <?php if (absint($params['excerpt_length']) > 0) : ?>
                                                        <?php
                                                        $excerpt = xmas_biz_words_count(absint($params['excerpt_length']), get_the_content());
                                                        echo wp_kses_post(wpautop($excerpt));
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-block twp-btn twp-btn-secondary"><?php esc_html_e('Learn More', 'xmas-biz'); ?><span
                                                        class="icon flaticon-arrows-1"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;


/*Xmas_Biz_Featured_widget widget*/
if (!class_exists('Xmas_Biz_Featured_widget')) :

    /**
     * Xmas Biz Widget
     *
     * @since 1.0.0
     */
    class Xmas_Biz_Featured_widget extends Xmas_Biz_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'xmas_biz_featured_widget',
                'description' => __('Displays post form selected pages as featured page', 'xmas-biz'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'xmas-biz'),
                    'type'  => 'text',
                    'class' => 'widefat',
                ),
                'featured_page_1' => array(
                    'label'            => __( 'Select Page 1:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'featured_page_2' => array(
                    'label'            => __( 'Select Page 2:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'featured_page_3' => array(
                    'label'            => __( 'Select Page 3:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
            );

            parent::__construct('xmas-biz-featured-layout', __('XB: Featured Widget', 'xmas-biz'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];
            ?>
            <div class="about-section about-lower section-bg-1 pt-80 pb-40">
                <div class="container">
                    <div class="section-title-block text-center mb-30 pb-40">
                        <?php if (!empty($params['title'])) {
                            echo '<h2 class="section-title  wow fadeIn"><span>'.esc_html($params['title']).'</span></h2>';
                        } ?>
                    </div>
                    <div class="row pt-20 twp-equal">

                        <?php
                        // ID validation.
                        $featured_page_ids = '';
                        for ($i=1; $i <= 3 ; $i++) {
                            if ( absint( $params['featured_page_'.$i] ) > 0 ) {
                                $featured_page_ids = absint( $params['featured_page_'.$i] );
                            }
                            if ( absint( $featured_page_ids ) > 0 ) {
                                $qargs = array(
                                    'p'             => absint( $featured_page_ids ),
                                    'post_type'     => 'any',
                                    'no_found_rows' => true,
                                );

                                $the_query = new WP_Query( $qargs );
                                if ( $the_query->have_posts() ) {
                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post();
                                        ?>
                                        <div class="col-sm-4 mb-20 twp-equal-child">
                                            <div class="about-us-box light-bgcolor">
                                                <figure class="image-box">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php if(has_post_thumbnail()){
                                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'xmas-biz-700-465' );
                                                            $image_url = $thumb['0'];
                                                        }
                                                        else{
                                                            $image_url = get_template_directory_uri().'/images/no-image-medium.jpg';
                                                        } ?>
                                                        <img src="<?php echo esc_url($image_url); ?>">
                                                        <div class="image-box-hover">
                                                            <div class="hover-wrapper">
                                                                <span class="ion-paper-airplane alt-textcolor"></span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>
                                                <div class="image-box-detail">
                                                    <h3 class="block-title">
                                                        <?php the_title(); ?>
                                                    </h3>
                                                    <p class="mb-10">
                                                        <?php
                                                        $word_count_featured = 25;
                                                        $xmas_biz_feature_content = xmas_biz_words_count(absint($word_count_featured), get_the_content());
                                                        echo esc_html($xmas_biz_feature_content);
                                                        ?>
                                                    </p>
                                                    <a href="<?php the_permalink(); ?>" class="learn-more twp-btn twp-btn-secondary no-radius"> <?php _e('Learn More','xmas-biz'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $featured_page_ids = '';
                                    wp_reset_postdata();
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;


/*Xmas_Biz_Callback widget*/
if (!class_exists('Xmas_Biz_Callback')) :

    /**
     * Xmas Biz Widget
     *
     * @since 1.0.0
     */
    class Xmas_Biz_Callback extends Xmas_Biz_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'xmas_biz_callback_widget',
                'description' => __('Displays callback section on the basis of information listed here', 'xmas-biz'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'xmas-biz'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'discription' => array(
                    'label' => __('Discription:', 'xmas-biz'),
                    'type'  => 'text',
                    'class' => 'widget-content widefat'
                ),
                'image_urls' => array(
                    'label' => __('Background Image:', 'xmas-biz'),
                    'type'  => 'image',
                ),
                'button_text' => array(
                    'label' => __('Button Text:', 'xmas-biz'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'button_url' => array(
                    'label' => __('Button URL:', 'xmas-biz'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
            );

            parent::__construct('xmas-biz-callback-widget', __('XB: Call to Action Widget', 'xmas-biz'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];
            if (! empty( $params['image_urls'] )) {
                $image_url = esc_url( $params['image_urls'] );
            } else{
                $image_url = get_template_directory_uri() . '/images/cta-bg.jpg';
            }
            ?>
            <div class="section-cta section-block text-center data-bg" data-background="<?php echo esc_url( $params['image_urls'] ) ?>">
                <div class="cta-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="cta-title mt-40 mb-30">
                                <?php if ( ! empty( $params['title'] ) ) { ?>
                                    <div class="section-title-block text-center mb-30 pb-40">
                                        <h2 class="section-title wow fadeIn" data-wow-duration="0.5s">
                                            <span><?php echo esc_html($params['title']); ?></span>
                                        </h2>
                                    </div>

                                <?php } ?>
                                <p class="wow fadeInLeft" data-wow-duration="1s"><?php echo wp_kses_post( $params['discription']); ?></p>
                                <?php if (( ! empty( $params['button_url'] ) ) || ( ! empty( $params['button_text'] ) )) { ?>
                                    <div class="cta-btns-group wow fadeInRight" data-wow-duration="1.5s">
                                        <a href="<?php echo esc_url($params['button_url']); ?>" class="read-more button-fancy -red">
                                            <span class="btn-arrow"></span>
                                            <span class="twp-read-more text"><?php echo esc_html($params['button_text'] );?></span>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;


/*Xmas_Biz_Contact widget*/
if (!class_exists('Xmas_Biz_Contact')) :

    /**
     * The xmas biz Widget
     *
     * @since 1.0.0
     */
    class Xmas_Biz_Contact extends Xmas_Biz_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'xmas_biz_Contact_widgets',
                'description' => __('Displays post form selected category As Project', 'xmas-biz'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => __('Title:', 'xmas-biz'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'use_page_title' => array(
                    'label'   => __( 'Use Main Page Title as Widget Title', 'xmas-biz' ),
                    'type'    => 'checkbox',
                    'default' => true,
                ),
                'featured_page' => array(
                    'label'            => __( 'Select Contact Page:', 'xmas-biz' ),
                    'type'             => 'dropdown-pages',
                    'class'            => 'widefat',
                    'show_option_none' => __( '&mdash; Select &mdash;', 'xmas-biz' ),
                ),
                'excerpt_length_contact_page' => array(
                    'label' => __('Contact Page Excerpt Length:', 'xmas-biz'),
                    'description' => __('Number of words', 'xmas-biz'),
                    'type' => 'number',
                    'css' => 'max-width:60px;',
                    'default' => 70,
                    'min' => 0,
                    'max' => 200,
                ),
                'contact_form_shortcode' => array(
                    'label'            => __( 'Contact Form Shortcodes:', 'xmas-biz' ),
                    'type'             => 'text',
                    'class'            => 'widefat',
                ),
                'contact_top_detail' => array(
                    'label'   => __( 'Show Contact Details form customizer with icon', 'xmas-biz' ),
                    'type'    => 'checkbox',
                    'default' => true,
                ),
                'enable_social_share' => array(
                    'label'   => __( 'Show social Share Options', 'xmas-biz' ),
                    'type'    => 'checkbox',
                    'default' => true,
                ),
            );

            parent::__construct('xmas-biz-contact-layout', __('XB: Contact Widget', 'xmas-biz'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            if ( absint( $params['featured_page'] ) > 0 ) {
                $contact_page_id = absint( $params['featured_page'] );
            }
            if ( absint( $contact_page_id ) > 0 ) {
                $qargs = array(
                    'p'             => absint( $contact_page_id ),
                    'post_type'     => 'any',
                    'no_found_rows' => true,
                );
                $the_query = new WP_Query( $qargs );
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        if ( true === $params['use_page_title'] ) {
                            $xmas_biz_contact_page_title = esc_html(get_the_title());
                        }
                        else {
                            if ( ! empty( $params['title'] ) ) {
                                $xmas_biz_contact_page_title =  $params['title'];
                            }
                        }
                        if(has_post_thumbnail()){
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                            $xmas_biz_contact_image = $thumb['0'];
                        }
                        else{
                            $xmas_biz_contact_image = get_template_directory_uri().'/images/no-image-medium.jpg';
                        }

                        $xmas_biz_permalinks = esc_url(get_permalink());
                            $xmas_biz_main_contact_content = get_the_content();
                        ?>
                        <?php
                    }

                    wp_reset_postdata();
                }
                ?>
                <section class="contact-section section-cta section-block data-bg pt-80 pb-40" data-background="<?php echo esc_url($xmas_biz_contact_image); ?>">
                    <div class="cta-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="contact-detail-wrapper">
                                    <div class="section-head">
                                        <div class="section-title-block text-left mb-30 pb-40">
                                            <h2 class="section-title wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.6s">
                                                <span><?php echo esc_html($xmas_biz_contact_page_title); ?></span>
                                            </h2>
                                        </div>
                                        <p>
                                            <?php echo wp_kses_post($xmas_biz_main_contact_content); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="contact-form-wrapper pt-sm-60 pt-20 pb-sm-50 pb-20">
                                    <?php
                                    if ( ! empty( $params['contact_form_shortcode'] ) ) {
                                        echo do_shortcode(wp_kses_post($params['contact_form_shortcode']));
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 pt-60">
                                <?php if (true === $params['contact_top_detail']) { ?>
                                    <div class="contact-infos">
                                        <ul class="twp-equal">
                                            <?php
                                            $xmas_biz_top_header_location = esc_html(xmas_biz_get_option('top_header_location'));
                                            if (!empty($xmas_biz_top_header_location)) { ?>
                                                <li class="col-sm-4 twp-equal-child">
                                                    <div class="grid-box icon-box-content">
                                                        <i class="icon twp-icon ion-ios-location"></i>
                                                        <h4 class="icon-box-title">
                                                            <?php esc_html_e( 'Location', 'xmas-biz' ); ?>
                                                        </h4>
                                                        <?php echo esc_html(xmas_biz_get_option('top_header_location')); ?>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                            <?php
                                            $xmas_biz_top_header_telephone = esc_attr(xmas_biz_get_option('top_header_telephone'));
                                            if (!empty($xmas_biz_top_header_telephone)) { ?>
                                                <li class="col-sm-4 twp-equal-child">
                                                    <div class="grid-box icon-box-content">
                                                        <i class="icon twp-icon ion-ios-telephone"></i>
                                                        <h4 class="icon-box-title">
                                                            <?php esc_html_e( 'Telephone', 'xmas-biz' ); ?>
                                                        </h4>
                                                        <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( xmas_biz_get_option('top_header_telephone') ) ); ?>" class="text-white">
                                                            <?php echo esc_attr( xmas_biz_get_option('top_header_telephone') ); ?>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                            <?php
                                            $xmas_biz_top_header_email = xmas_biz_get_option('top_header_email');
                                            if (!empty($xmas_biz_top_header_email)) { ?>
                                                <li class="col-sm-4 twp-equal-child">
                                                    <div class="grid-box icon-box-content">
                                                        <i class="icon twp-icon ion-ios-email"></i>
                                                        <h4 class="icon-box-title">
                                                            <?php esc_html_e( 'Email', 'xmas-biz' ); ?>
                                                        </h4>
                                                        <a href="mailto:<?php echo esc_attr( xmas_biz_get_option('top_header_email') ); ?>" class="text-white">
                                                            <?php echo esc_attr( antispambot(xmas_biz_get_option('top_header_email'))); ?>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if (true === $params['enable_social_share']) {
                                    if (xmas_biz_get_option('social_icon_style') == 'circle') {
                                        $xmas_biz_social_icon = 'bordered-radius';
                                    } else {
                                        $xmas_biz_social_icon = '';
                                    } ?>
                                    <div class="social-icons mt-50 social-icons-section <?php echo esc_attr($xmas_biz_social_icon); ?>">
                                        <?php
                                        wp_nav_menu(
                                            array('theme_location' => 'social',
                                                'link_before' => '<span>',
                                                'link_after' => '</span>',
                                                'menu_id' => 'social-menu',
                                                'fallback_cb' => false,
                                                'menu_class'=> false
                                            )); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php echo $args['after_widget'];
            }
        }
    }
endif;