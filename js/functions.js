var lastScrollTop = 0;
jQuery(document).ready(function ($) {
    "use strict";

    jQuery(window).on("scroll", function () {
        var st = $(this).scrollTop();
        st > lastScrollTop ? $(".floating-nav").addClass("is-hidden") : $(window).scrollTop() > 200 ? ($(".floating-nav").removeClass("is-hidden"), setTimeout(function () {}, 200)) : $(".floating-nav").addClass("is-hidden"), lastScrollTop = st, 0 == $(this).scrollTop() && $(".floating-nav").addClass("is-hidden");
    });

    //jQuery("body").niceScroll();

    var bottomSpace = jQuery('.the-footer').outerHeight() + 300;

    jQuery('.single-event-meta-wrapper').sticky({topSpacing: 20, bottomSpacing: bottomSpace});
}); /* end of as page load scripts */
