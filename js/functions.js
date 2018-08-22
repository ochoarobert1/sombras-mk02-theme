var lastScrollTop = 0;
jQuery(document).ready(function ($) {
    "use strict";

    jQuery(window).on("scroll", function () {
        var st = $(this).scrollTop();
        st > lastScrollTop ? $(".floating-nav").addClass("is-hidden") : $(window).scrollTop() > 200 ? ($(".floating-nav").removeClass("is-hidden"), setTimeout(function () {}, 200)) : $(".floating-nav").addClass("is-hidden"), lastScrollTop = st, 0 == $(this).scrollTop() && $(".floating-nav").addClass("is-hidden");
    });

    //jQuery("body").niceScroll();
}); /* end of as page load scripts */
