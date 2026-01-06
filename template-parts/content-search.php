<?php
/**
 * Template part for displaying search results
 * 
 * @package Alalama_Tech
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="blog-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large'); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="blog-content">
        <div class="blog-meta">
            <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
            <span><i class="far fa-user"></i> <?php the_author(); ?></span>
        </div>
        
        <h2 class="blog-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        
        <div class="blog-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php _e('قراءة المزيد', 'alalama'); ?>
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
</article>