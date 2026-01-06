<?php
/**
 * Page Template
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<div class="page-wrapper">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <div class="page-header">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="page-content section">
            <div class="container">
                <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('الصفحات:', 'alalama'),
                        'after'  => '</div>',
                    ));
                    ?>
                </article>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</div>

<?php
get_footer();