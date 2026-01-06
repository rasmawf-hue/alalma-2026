/**
 * Navigation JavaScript
 * Handles mobile menu and navigation interactions
 */

(function() {
    'use strict';

    // Mobile Menu Toggle
    var menuToggle = document.querySelector('.menu-toggle');
    var navigation = document.querySelector('.main-navigation');

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            navigation.classList.toggle('active');
            this.classList.toggle('active');
            
            // Update ARIA attributes
            var expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
        });
    }

    // Submenu Toggle for Mobile
    var menuItems = document.querySelectorAll('.menu-item-has-children > a');
    
    menuItems.forEach(function(item) {
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                var parent = this.parentElement;
                parent.classList.toggle('open');
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.main-navigation') && !e.target.closest('.menu-toggle')) {
            if (navigation) {
                navigation.classList.remove('active');
            }
            if (menuToggle) {
                menuToggle.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        }
    });

    // Handle window resize
    var resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth > 768) {
                if (navigation) {
                    navigation.classList.remove('active');
                }
                if (menuToggle) {
                    menuToggle.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            }
        }, 250);
    });

})();