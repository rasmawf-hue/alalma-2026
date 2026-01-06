<?php
/**
 * Custom Widgets
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Recent Posts Widget with Thumbnail
 */
class Alalama_Recent_Posts_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'alalama_recent_posts',
            __('أحدث المقالات (مع صورة)', 'alalama'),
            array('description' => __('عرض أحدث المقالات مع صور مصغرة', 'alalama'))
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        
        $recent_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'orderby' => 'date',
        ));
        
        if ($recent_posts->have_posts()) {
            echo '<ul class="recent-posts-widget">';
            
            while ($recent_posts->have_posts()) {
                $recent_posts->the_post();
                ?>
                <li>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="post-info">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                    </div>
                </li>
                <?php
            }
            
            echo '</ul>';
            wp_reset_postdata();
        }
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('أحدث المقالات', 'alalama');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('العنوان:', 'alalama'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('عدد المقالات:', 'alalama'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        return $instance;
    }
}

function alalama_register_widgets() {
    register_widget('Alalama_Recent_Posts_Widget');
}
add_action('widgets_init', 'alalama_register_widgets');