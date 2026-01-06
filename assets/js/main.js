/**
 * Main JavaScript File
 * Alalama Tech Theme
 */

(function($) {
    'use strict';

    // Mobile Menu Toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('active');
    });

    // Smooth Scroll for Anchor Links
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    // Sticky Header on Scroll
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // Back to Top Button
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    $('.back-to-top').on('click', function() {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    // Service Card Hover Effect
    $('.service-card').hover(
        function() {
            $(this).find('.service-icon').addClass('animated bounce');
        },
        function() {
            $(this).find('.service-icon').removeClass('animated bounce');
        }
    );

    // Initialize AOS (Animate on Scroll) if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true
        });
    }

    // Contact Form Validation
    $('form').on('submit', function(e) {
        var isValid = true;
        $(this).find('input[required], textarea[required]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('الرجاء ملء جميع الحقول المطلوبة');
        }
    });

})(jQuery);