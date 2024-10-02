var CRUMINA = {};
!(function (e) {
    "use strict";
    var i = e(window),
        t = e(document),
        o = e("body"),
        n = {},
        a = e("#site-header"),
        r = e(".counter"),
        s = e(".skills-item"),
        l = e(".pie-chart"),
        c = e(".js-animate-icon"),
        d = e(".right-menu"),
        u = e(".primary-menu"),
        g = e("#site-footer"),
        m = e("#hellopreloader");
    (CRUMINA.headerSpacer = {
        $spacer: null,
        $header: null,
        init: function () {
            (this.$header = jQuery(a)), (this.$spacer = jQuery('<div class="header--spacer"></div>').insertAfter(this.$header));
        },
        resize: function () {
            var e = this;
            e.$spacer &&
            setTimeout(function () {
                var i = e.$header.outerHeight(),
                    t = e.$header.css("background-color");
                e.$spacer.css({ height: i + "px", "background-color": t });
            }, 100);
        },
    }),
        (CRUMINA.updateResponsiveInit = function () {
            var i = null,
                t = function () {
                    (i = null), CRUMINA.headerSpacer.resize();
                };
            e(window)
                .on("resize", function () {
                    null === i &&
                    (i = window.setTimeout(function () {
                        t();
                    }, 200));
                })
                .resize();
        }),
        (CRUMINA.preloader = function () {
            return (
                i.scrollTop(0),
                    setTimeout(function () {
                        m.fadeOut(800);
                    }, 800),
                    !1
            );
        });
    var p = jQuery(".popup-search"),
        f = jQuery(".cart-popup-wrap");
    (CRUMINA.fixedHeader = function () {
        a.headroom({ offset: 20, tolerance: 5, classes: { initial: "animated", pinned: "swingInX", unpinned: "swingOutX" } });
    }),
        (CRUMINA.parallaxFooter = function () {
            g.length && g.hasClass("js-fixed-footer") && (g.before('<div class="block-footer-height"></div>'), e(".block-footer-height").matchHeight({ target: g }));
        }),
        (CRUMINA.counters = function () {
            r.length &&
            r.each(function () {
                jQuery(this).waypoint(
                    function () {
                        e(this.element).find("span").countTo(), this.destroy();
                    },
                    { offset: "95%" }
                );
            });
        }),
        (CRUMINA.progresBars = function () {
            s.length &&
            s.each(function () {
                jQuery(this).waypoint(
                    function () {
                        e(this.element).find(".count-animate").countTo(), e(this.element).find(".skills-item-meter-active").fadeTo(300, 1).addClass("skills-animate"), this.destroy();
                    },
                    { offset: "90%" }
                );
            });
        }),
        (CRUMINA.pieCharts = function () {
            l.length &&
            l.each(function () {
                jQuery(this).waypoint(
                    function () {
                        var i = e(this.element),
                            t = i.data("start-color"),
                            o = i.data("end-color"),
                            n = 100 * i.data("value");
                        i
                            .circleProgress({ thickness: 16, size: 320, startAngle: (-Math.PI / 4) * 2, emptyFill: "#fff", lineCap: "round", fill: { gradient: [t, o], gradientAngle: Math.PI / 4 } })
                            .on("circle-animation-progress", function (e, t) {
                                i.find(".content").html(parseInt(n * t, 10) + "<span>%</span>");
                            })
                            .on("circle-animation-end", function () {}),
                            this.destroy();
                    },
                    { offset: "90%" }
                );
            });
        }),
        (CRUMINA.animateSvg = function () {
            c.length &&
            c.each(function () {
                jQuery(this).waypoint(
                    function () {
                        e(this.element).find("> svg").drawsvg().drawsvg("animate"), this.destroy();
                    },
                    { offset: "95%" }
                );
            });
        }),

        (CRUMINA.togglePanel = function () {
            d.length && (d.toggleClass("opened"), o.toggleClass("overlay-enable"));
        }),

        jQuery(".js-popup-close").on("click", function () {
            return e(".window-popup").removeClass("open"), o.removeClass("body-overflow"), !1;
        }),
        jQuery(".js-close-aside").on("click", function () {
            return d.hasClass("opened") && CRUMINA.togglePanel(), !1;
        }),
        jQuery(".js-open-aside").on("click", function () {
            return d.hasClass("opened") || CRUMINA.togglePanel(), !1;
        }),
        jQuery(".js-open-search").on("click", function () {
            return CRUMINA.toggleSearch(), !1;
        }),
        jQuery(".overlay_search-close").on("click", function () {
            return o.removeClass("open"), !1;
        }),
        jQuery(".js-open-p-search").on("click", function () {
            p.fadeToggle();
        }),
        jQuery("#top-bar-js").on("click", function () {
            return e(".top-bar").addClass("open"), o.toggleClass("overlay-enable"), !1;
        }),
        jQuery("#top-bar-close-js").on("click", function () {
            return e(".top-bar").removeClass("open"), o.removeClass("overlay-enable"), !1;
        });

})(jQuery);

