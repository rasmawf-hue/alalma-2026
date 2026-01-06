<?php
/**
 * Single Post Template
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<div class="single-post-wrapper">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="post-header">
            <div class="container">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span class="post-date">
                        <i class="fas fa-calendar"></i>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="post-author">
                        <i class="fas fa-user"></i>
                        <?php the_author(); ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="post-content section">
            <div class="container">
                <div class="row">
                    <div class="col col-8">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-content'); ?>>
                            <?php
                            the_content();
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('الصفحات:', 'alalama'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </article>
                        
                        <?php
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>

                    <div class="col col-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</div>

<?php
get_footer();