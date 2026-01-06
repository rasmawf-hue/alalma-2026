<?php
/**
 * Search Form Template
 * 
 * @package Alalama_Tech
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field">
        <span class="screen-reader-text"><?php _e('البحث عن:', 'alalama'); ?></span>
    </label>
    
    <div class="search-form-wrapper">
        <input type="search" 
               id="search-field" 
               class="search-field" 
               placeholder="<?php _e('ابحث هنا...', 'alalama'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" 
               required>
        
        <button type="submit" class="search-submit" aria-label="<?php _e('بحث', 'alalama'); ?>">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>