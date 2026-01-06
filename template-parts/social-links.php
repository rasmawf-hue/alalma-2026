<?php
/**
 * Social Media Links
 * 
 * @package Alalama_Tech
 */

$social_networks = array(
    'facebook' => array('icon' => 'fab fa-facebook-f', 'label' => 'Facebook'),
    'twitter' => array('icon' => 'fab fa-twitter', 'label' => 'Twitter'),
    'instagram' => array('icon' => 'fab fa-instagram', 'label' => 'Instagram'),
    'linkedin' => array('icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'),
    'youtube' => array('icon' => 'fab fa-youtube', 'label' => 'YouTube'),
);
?>

<div class="social-links">
    <?php
    foreach ($social_networks as $key => $network) :
        $url = get_theme_mod('alalama_' . $key);
        if ($url) :
    ?>
        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($network['label']); ?>">
            <i class="<?php echo esc_attr($network['icon']); ?>"></i>
        </a>
    <?php
        endif;
    endforeach;
    ?>
</div>