var lastScrollTop = 0;
jQuery(document).ready(function (jQuery) {
    "use strict";

    jQuery(window).on("scroll", function () {
        var st = jQuery(this).scrollTop();
        st > lastScrollTop ? jQuery(".floating-nav").addClass("is-hidden") : jQuery(window).scrollTop() > 200 ? (jQuery(".floating-nav").removeClass("is-hidden"), setTimeout(function () {}, 200)) : jQuery(".floating-nav").addClass("is-hidden"), lastScrollTop = st, 0 == jQuery(this).scrollTop() && jQuery(".floating-nav").addClass("is-hidden");
    });

    jQuery('.cart_item .qty').attr('disabled', 'disabled');

    jQuery('#course_selection').multiselect({
        buttonWidth: '100%',
        buttonText: function(options, select) {
            return admin_url.button_text;
        },
        buttonTitle: function(options, select) {
            var labels = [];
            var contador = 0;
            options.each(function () {
                labels.push('<span>' + $(this).text() + '</span>');
                contador = contador + 1;
            });
            jQuery('.qty').val(contador);
            jQuery('.course-selections-wrapper').html(labels.join(''));
        }
    });

    var bottomSpace = jQuery('.the-footer').outerHeight() + 300;

    //    jQuery('.single-event-meta-wrapper').sticky({
    //        topSpacing: 20,
    //        bottomSpacing: bottomSpace
    //    });


    jQuery('form#login').on('submit', function (e) {
        jQuery.ajax({
            type: 'POST',
            url: admin_url.ajax_url,
            data: {
                'action': 'sombras_ajax_login',
                'username': jQuery('form#login #user_login').val(),
                'password': jQuery('form#login #user_pass').val(),
                'security': jQuery('form#login #security').val()
            },
            beforeSend: function () {
                jQuery('form#login .login-response').show().html('<span class="loader"></span>' + admin_url.loading_message);
            },
            success: function (data) {
                if (data.loggedin == true) {
                    jQuery('form#login .login-response').show().html('<i class="fa fa-check-circle custom-login-checked" aria-hidden="true"></i>' + data.message);
                    document.location.href = admin_url.redirecturl;
                } else {
                    jQuery('form#login .login-response').show().html('<i class="fa fa-exclamation-circle custom-login-error" aria-hidden="true"></i>' + data.message);
                }
            },
            error: function (request, status, error) {
                console.log(error);
            }
        });
        e.preventDefault();
    });

});
