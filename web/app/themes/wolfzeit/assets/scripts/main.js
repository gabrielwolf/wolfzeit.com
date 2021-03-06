/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function() {
                // JavaScript to be fired on all pages

                // Google Fonts
                WebFontConfig = {
                    google: { families: ['Quicksand::latin', 'Asap::latin'] }
                };

                (function() {
                    var wf = document.createElement('script');
                    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                    wf.type = 'text/javascript';
                    wf.async = 'true';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(wf, s);
                })();

                function setContentContainerWithAndHeight() {
                    $(".content-container").css("height", function() {
                        var h = $(window).height();
                        var nav1 = $(".primary_navigation").height();
                        var nav2 = $(".secondary_navigation").height();
                        var nav1border = parseInt($(".primary_navigation").css("borderBottomWidth"), 10);
                        var contentHeight = h - nav1 - nav2 - nav1border - 0 + "px";
                        return contentHeight;
                    });
                    $(".content, .main, #new-royalslider-1, .main > div").css("height", function() {
                        return $('.content-container').height();
                    });
                    $(".royalSlider").royalSlider('updateSliderSize', true);
                    $(".royalSlider").royalSlider('updateSliderSize', true);
                    $(".content").css("width", "100%");
                }

                function setHeightWebdesign() {
                    var h = $(window).height();
                    var navbar_height = $(".banner").css("height").replace('px', '');
                    var secondary_navigation_height = $(".secondary_navigation").css("height").replace('px', '');
                    var full_height = h - navbar_height - secondary_navigation_height;
                    $(".post-webdesign-info, .full-height, .col-sm-9").css("min-height", full_height);
                    $(".royalSlider").royalSlider('updateSliderSize', true);
                    $(".royalSlider").royalSlider('updateSliderSize', true);
                }

                function setHeightVideo() {
                    var h = $(window).height();
                    var w = $(window).width();
                    var navbar_height = $(".banner").css("height").replace('px', '');
                    var secondary_navigation_height = $(".secondary_navigation").css("height").replace('px', '');
                    var full_height = h - navbar_height - secondary_navigation_height - 6;
                    var full_width = w;
                    // $(".content, .main, .main > div").css("height", full_height);
                    $(".my-vimeo-container").attr({
                        width: full_width,
                        height: full_height
                    });
                }

                $(document).ready(function() {

                    $("#element").introLoader({
                        animation: {
                            name: 'simpleLoader',
                            options: {
                                exitFx: 'fadeOut',
                                ease: "linear",
                                style: 'dark',
                                delayBefore: 500, //delay time in milliseconds
                                exitTime: 300
                            }
                        },
                        spinJs: {
                            color: '#fff' // #rgb or #rrggbb or array of colors
                        }
                    });

                    setContentContainerWithAndHeight();
                    setHeightWebdesign();
                    setHeightVideo();

                    $(".scroll-pane").jScrollPane({
                        autoReinitialise: true,
                        autoReinitialiseDelay: 500,
                        hideFocus: true
                    });

                    $(".jspDrag").css({
                        background: "#fff"
                    });

                    setHeightWebdesign();
                    setHeightVideo();

                });

                $(window).resize(function() {
                    setContentContainerWithAndHeight();
                    setHeightWebdesign();
                    setHeightVideo();
                });

                /* ------ Suchfeld ------ */
                $(".search-top").mouseenter(function() {
                    $(".search-top-field").focus();
                });

                $(".search-top").mouseleave(function() {
                    $(".search-top-field").blur();
                });

            },
            finalize: function() {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function() {
                // JavaScript to be fired on the home page
                $(document).ready(function() {

                    $("#element").introLoader({
                        animation: {
                            name: 'doubleLoader',
                            options: {
                                exitFx: 'fadeOut',
                                ease: "easeInOutCirc",
                                style: 'light',
                                delayBefore: 0,
                                exitTime: 500,
                                progbarTime: 700,
                                progbarDelayAfter: 400,
                                preventScroll: true,
                            }
                        }
                    });

                    $("h1, .logo-wolfzeit-knopf").click(function() {
                        $(".logo-wolfzeit-knopf").animate({
                            "width": "100%"
                        }, 1000, function() {
                            $(".front-page--icon-container").
                            css("visibility", "visible").
                            animate({
                                opacity: 1
                            }, 500);
                        });
                    });

                });
            },
            finalize: function() {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function() {
                // JavaScript to be fired on the about us page
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function(func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function() {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
