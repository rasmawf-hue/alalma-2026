/**
 * Main JavaScript File
 * @package Alalama_Tech
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Mobile Menu Toggle
        $('.navbar-toggle').on('click', function() {
            $('.navbar-menu').toggleClass('active');
            $(this).toggleClass('active');
        });

        // Smooth Scroll
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if(target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        });

        // Sticky Header
        var header = $('.site-header');
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                header.addClass('sticky');
            } else {
                header.removeClass('sticky');
            }
        });

        // Back to Top Button
        var backToTop = $('<button class="back-to-top"><i class="fas fa-arrow-up"></i></button>');
        $('body').append(backToTop);

        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });

        backToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 800);
        });

        // Portfolio Filters
        $('.filter-btn').on('click', function() {
            var filterValue = $(this).attr('data-filter');
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');
            
            if(filterValue === 'all') {
                $('.portfolio-item').fadeIn();
            } else {
                $('.portfolio-item').hide();
                $('.portfolio-item[data-category="' + filterValue + '"]').fadeIn();
            }
        });

        // Contact Form Handler
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var submitBtn = form.find('button[type="submit"]');
            var formData = form.serialize();
            
            formData += '&action=contact_form&nonce=' + alalamaAjax.nonce;
            $('.form-alert').remove();
            submitBtn.prop('disabled', true).text('جاري الإرسال...');
            
            $.ajax({
                url: alalamaAjax.ajaxurl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if(response.success) {
                        form.before('<div class="form-alert success">' + response.data.message + '</div>');
                        form[0].reset();
                    } else {
                        form.before('<div class="form-alert error">' + response.data.message + '</div>');
                    }
                    submitBtn.prop('disabled', false).text('إرسال الرسالة');
                },
                error: function() {
                    form.before('<div class="form-alert error">حدث خطأ. الرجاء المحاولة لاحقاً.</div>');
                    submitBtn.prop('disabled', false).text('إرسال الرسالة');
                }
            });
        });

        // Animation on Scroll
        function animateOnScroll() {
            $('.animate-on-scroll').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                
                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animated');
                }
            });
        }

        $(window).on('scroll', animateOnScroll);
        animateOnScroll();

    });

})(jQuery);