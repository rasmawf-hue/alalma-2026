<?php
/**
 * Archive Template
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<div class="page-header archive-header">
    <div class="container">
        <h1 class="page-title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                printf(__('المقالات بواسطة: %s', 'alalama'), get_the_author());
            } else {
                _e('الأرشيف', 'alalama');
            }
            ?>
        </h1>
    </div>
</div>

<section class="section archive-content">
    <div class="container">
        <div class="row">
            <div class="col col-8">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', get_post_type());
                        endwhile;
                        ?>
                    </div>
                    
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '<i class="fas fa-arrow-right"></i> ' . __('السابق', 'alalama'),
                            'next_text' => __('التالي', 'alalama') . ' <i class="fas fa-arrow-left"></i>',
                            'type'      => 'list',
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <div class="no-posts">
                        <h3><?php _e('لا توجد مقالات', 'alalama'); ?></h3>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col col-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();