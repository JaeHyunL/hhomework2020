(function (e) {
    "use strict";
    var n = window.TWP_JS || {};
    
    n.stickyMenu = function () {

        if( e(window).scrollTop() > 350 ){
            e("#masthead").addClass("nav-affix");
        }else{
            e("#masthead").removeClass("nav-affix");
        }
    };
    n.mobileMenu = {
        init: function () {
            this.toggleMenu();
            this.menuMobile();
            this.menuArrow();
        },
        toggleMenu: function () {
            e('#masthead').on('click', '.toggle-menu', function(event) {
                var ethis = e('.main-navigation .menu .menu-mobile');
                if (ethis.css('display') == 'block') {
                    ethis.slideUp('300');
                } else {
                    ethis.slideDown('300');
                }
                e('.ham').toggleClass('exit');
            });
            e('#masthead .main-navigation ').on('click', '.menu-mobile a i', function(event) {
                event.preventDefault();
                var ethis = e(this),
                    eparent = ethis.closest('li'),
                    esub_menu = eparent.find('> .sub-menu');
                if (esub_menu.css('display') == 'none') {
                    esub_menu.slideDown('300');
                    ethis.addClass('active');
                } else {
                    esub_menu.slideUp('300');
                    ethis.removeClass('active');
                }
                return false;
            });
        },
        menuMobile: function () {
            if (e('.main-navigation .menu > ul').length) {
                var ethis = e('.main-navigation .menu > ul'),
                    eparent = ethis.closest('.main-navigation'),
                    pointbreak = eparent.data('epointbreak'),
                    window_width = window.innerWidth;
                if (typeof pointbreak == 'undefined') {
                    pointbreak = 991;
                }
                if (pointbreak >= window_width) {
                    ethis.addClass('menu-mobile').removeClass('menu-desktop');
                    e('.main-navigation .toggle-menu').css('display', 'block');
                } else {
                    ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                    e('.main-navigation .toggle-menu').css('display', '');
                }
            }
        },
        menuArrow: function () {
            if (e('#masthead .main-navigation div.menu > ul').length) {
                e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="ion-ios-arrow-down">');
            }
        }
    };

    n.TwpSearch = function () {
        e('.icon-search').on('click', function(event) {
            e('body').toggleClass('reveal-search');
        });
        e('.close-popup').on('click', function(event) {
            e('body').removeClass('reveal-search reveal-social');
        });
    };

    n.DataBackground = function () {
        e('.bg-image').each(function () {
            var src = e(this).children('img').attr('src');
            e(this).css('background-image', 'url(' + src + ')').children('img').hide();
        });
    };

    n.InnerBanner = function () {
        var pageSection = e(".data-bg");
        pageSection.each(function (indx) {
            if (e(this).attr("data-background")) {
                e(this).css("background-image", "url(" + e(this).data("background") + ")");
            }
        });
    };

    n.TwpHeroSlider = function () {
        var ecarousel = e('.carousel');
        if (ecarousel.length) {
            ecarousel.each(function () {
                var items, singleItem, autoPlay, transition, drag, stopOnHover, navigation, pagination;
                items = e(this).data('items');
                singleItem = e(this).data('single-item') === undefined ? false : true;
                autoPlay = e(this).data('autoplay');
                transition = e(this).data('transition') === undefined ? false : e(this).data('transition');
                pagination = e(this).data('pagination') === undefined ? false : true;
                navigation = e(this).data('navigation') === undefined ? false : true;
                drag = transition == "fade" ? false : true;
                stopOnHover = transition === "fade" || pagination === false || navigation === false ? false : true;
                e(this).owlCarousel({
                    items: 1,
                    singleItem: singleItem,
                    autoPlay: autoPlay,
                    pagination: pagination,
                    navigation: navigation,
                    smartSpeed: 500,
                    stopOnHover: 1,
                    autoplayHoverPause: true,
                    transitionStyle: transition,
                    mouseDrag: drag,
                    touchDrag: drag,
                    lazyLoad: true,
                    nav: true,
                    navText: false,
                    loop: (e('.carousel').children().length) != 1,
                    navRewind: false,
                    autoplay: true,
                    autoplayTimeout: 8000,
                    animateOut: 'fadeOut'
                });
            });
        }
    };
    n.TwpSlider = function () {
        e(".blog-carousel").owlCarousel({
            loop: (e('.blog-carousel').children().length) != 1,
            margin: 20,
            nav: false,
            smartSpeed: 500,
            autoplay: 5000,
            navText: [''],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                990: {
                    items: 3
                }
            }
        });
        var setMinHeight = function setMinHeight() {
            var minheight = arguments.length <= 0 || arguments[0] === undefined ? 0 : arguments[0];

            e('.blog-carousel').each(function (i, e) {
                var oldminheight = minheight;
                e(e).find('.owl-item').each(function (i, e) {
                    minheight = e(e).height() > minheight ? e(e).height() : minheight;
                });
                e(e).find('.owl-item').css("min-height", minheight + "px");
                minheight = oldminheight;
            });
        };

        setMinHeight();
    };

    // SHOW/HIDE SCROLL UP //
    n.show_hide_scroll_top = function () {
        if (e(window).scrollTop() > e(window).height() / 2) {
            e("#scroll-up").fadeIn(300);
        } else {
            e("#scroll-up").fadeOut(300);
        }
    };

    // SCROLL UP //
    n.scroll_up = function () {
        e("#scroll-up").on("click", function () {
            e("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });

    };

    n.twp_animate = function () {
        if (e('.wow').length) {
            var wow = new WOW(
                {
                    boxClass: 'wow',
                    animateClass: 'animated',
                    offset: 0,
                    mobile: true,
                    live: true
                }
            );
            wow.init();
        }
    };

    n.twp_preloader = function () {
        e(window).load(function () {
            e("body").addClass("page-loaded");
        });
    };

    n.twp_matchheight = function () {
        e(function () {
            e('.blog-item').matchHeight();
        });
    };

    e(document).ready(function () {
        n.mobileMenu.init();
        n.TwpSearch();
        n.DataBackground();
        n.InnerBanner(); 
        n.TwpHeroSlider();
        n.TwpSlider();
        n.scroll_up();
        n.twp_animate();
        n.twp_preloader();
        n.twp_matchheight();
    });

    e(window).scroll(function () {
        n.stickyMenu();
        n.show_hide_scroll_top();
    });

    e(window).resize(function () {
        n.mobileMenu.menuMobile();
    });

})(jQuery);

jQuery(document).ready(function ($) {
    $('body').on('added_to_wishlist', function () {
            $('.top-wishlist .count').load(yith_wcwl_l10n.ajax_url + ' .top-wishlist span', {action: 'yith_wcwl_update_single_product_list'});
    });
});