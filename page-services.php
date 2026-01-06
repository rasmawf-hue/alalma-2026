<?php
/**
 * Template Name: Services Page
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <header class="page-header">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <?php if (has_excerpt()) : ?>
                    <div class="page-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <section class="section">
            <div class="container">
                <div class="services-grid">
                    <?php
                    $services = array(
                        array(
                            'icon' => 'fas fa-laptop-code',
                            'title' => 'تطوير المواقع',
                            'description' => 'تصميم وتطوير مواقع احترافية متجاوبة باستخدام أحدث التقنيات'
                        ),
                        array(
                            'icon' => 'fas fa-mobile-alt',
                            'title' => 'تطبيقات الجوال',
                            'description' => 'تطوير تطبيقات محمولة لنظامي iOS و Android'
                        ),
                        array(
                            'icon' => 'fas fa-database',
                            'title' => 'قواعد البيانات',
                            'description' => 'تصميم وإدارة قواعد البيانات بكفاءة وأمان'
                        ),
                        array(
                            'icon' => 'fas fa-shield-alt',
                            'title' => 'الأمن السيبراني',
                            'description' => 'حماية بياناتك ومعلوماتك من التهديدات'
                        ),
                        array(
                            'icon' => 'fas fa-cloud',
                            'title' => 'الحوسبة السحابية',
                            'description' => 'حلول سحابية متكاملة وموثوقة'
                        ),
                        array(
                            'icon' => 'fas fa-headset',
                            'title' => 'الدعم الفني',
                            'description' => 'دعم فني متواصل على مدار الساعة'
                        ),
                        array(
                            'icon' => 'fas fa-shopping-cart',
                            'title' => 'المتاجر الإلكترونية',
                            'description' => 'بناء متاجر إلكترونية متكاملة'
                        ),
                        array(
                            'icon' => 'fas fa-chart-line',
                            'title' => 'التسويق الرقمي',
                            'description' => 'حملات تسويقية فعالة عبر الإنترنت'
                        ),
                        array(
                            'icon' => 'fas fa-code',
                            'title' => 'البرمجة الخاصة',
                            'description' => 'حلول برمجية مخصصة لاحتياجاتك'
                        ),
                    );
                    
                    foreach ($services as $service) :
                    ?>
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="<?php echo $service['icon']; ?>"></i>
                            </div>
                            <h3><?php echo $service['title']; ?></h3>
                            <p><?php echo $service['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="entry-content mt-5">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

    <?php
    endwhile;
    ?>
</main>

<?php
get_footer();