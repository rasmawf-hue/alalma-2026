<?php
/**
 * Template Name: About Page
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <section class="page-header">
            <h1><?php the_title(); ?></h1>
        </section>

        <section class="about-content">
            <div class="row">
                <div class="col-12">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="vision-mission">
            <div class="row">
                <div class="col-6">
                    <div class="vm-card">
                        <i class="fas fa-eye"></i>
                        <h3>رؤيتنا</h3>
                        <p><?php echo get_theme_mod('alalama_vision', 'أن نكون الرائد في مجال تقديم الحلول التقنية في ليبيا'); ?></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="vm-card">
                        <i class="fas fa-bullseye"></i>
                        <h3>رسالتنا</h3>
                        <p><?php echo get_theme_mod('alalama_mission', 'تقديم حلول تقنية مبتكرة وموثوقة لعملائنا'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values -->
        <section class="our-values">
            <h2 class="section-title">قيمنا</h2>
            <div class="values-grid">
                <div class="value-card">
                    <i class="fas fa-medal"></i>
                    <h4>الجودة</h4>
                    <p>نسعى دائمًا للتميز في كل ما نقدمه</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-handshake"></i>
                    <h4>النزاهة</h4>
                    <p>نلتزم بأعلى معايير النزاهة والشفافية</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-lightbulb"></i>
                    <h4>الابتكار</h4>
                    <p>نبتكر باستمرار لتلبية احتياجات عملائنا</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-users"></i>
                    <h4>التعاون</h4>
                    <p>نعمل معًا لتحقيق أفضل النتائج</p>
                </div>
            </div>
        </section>

        <!-- Team (optional) -->
        <section class="our-team">
            <h2 class="section-title">فريقنا</h2>
            <div class="team-grid">
                <!-- يمكن إضافة أعضاء الفريق هنا -->
            </div>
        </section>
    </div>
</main>

<?php
get_footer();