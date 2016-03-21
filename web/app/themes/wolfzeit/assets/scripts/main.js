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
                        console.log(contentHeight);
                        return contentHeight;
                    });
                    $(".content, .main, #new-royalslider-1, .main > div").css("height", function() {
                        return $('.content-container').height();
                    });
                    $(".royalSlider").royalSlider('updateSliderSize', true);
                    $(".royalSlider").royalSlider('updateSliderSize', true);
                    $(".content").css("width", "100%");
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
                          color: '#000' // #rgb or #rrggbb or array of colors
                        }
                    });
                    if($(".royalSlider")) {
                        console.log("Yeah");
                    }
                    setContentContainerWithAndHeight();

                    $('.scroll-pane').jScrollPane({
                        autoReinitialise: true,
                        autoReinitialiseDelay: 500,
                        hideFocus: true
                    });

                    $(".jspDrag").css({
                        background: "#fff"
                    });

                });

                $(window).resize(function() {
                    setContentContainerWithAndHeight();
                });

                /* ------ Suchfeld ------ */
                $('.search-top').mouseenter(function() {
                    $(".search-top-field").focus();
                });

                $('.search-top').mouseleave(function() {
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
                $(document).ready(function () {
                  $("#element").introLoader({
                      animation: {
                          name: 'doubleLoader',
                          options: {
                              exitFx:'fadeOut',
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
