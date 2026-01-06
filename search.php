<?php
/**
 * The template for displaying search results
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('نتائج البحث عن: %s', 'alalama'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <div class="row">
            <div class="col-8">
                <?php if (have_posts()) : ?>
                    <div class="blog-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', get_post_type());
                        endwhile;
                        ?>
                    </div>

                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('السابق', 'alalama'),
                        'next_text' => __('التالي', 'alalama'),
                    ));
                    ?>
                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </div>

            <div class="col-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();