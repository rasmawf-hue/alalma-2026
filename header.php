<?php
/**
 * Header Template
 * 
 * @package Alalama_Tech
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-top">
        <div class="container">
            <div class="header-contact">
                <span class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:+218911234567">091-1234567</a>
                </span>
                <span class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@alalama.ly">info@alalama.ly</a>
                </span>
            </div>
            <div class="header-social">
                <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                }
                ?>
            </div>
            
            <button class="navbar-toggle" aria-label="فتح القائمة">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'div',
                'container_class' => 'navbar-menu',
                'menu_class' => 'navbar-nav',
                'fallback_cb' => false,
            ));
            ?>
        </div>
    </nav>
</header>