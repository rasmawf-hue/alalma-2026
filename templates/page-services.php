<?php
/**
 * Template Name: Services Page
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

        <section class="services-section">
            <div class="services-grid">
                <?php
                $services = array(
                    array(
                        'icon' => 'fas fa-laptop-code',
                        'title' => 'تطوير المواقع الإلكترونية',
                        'description' => 'تصميم وتطوير مواقع احترافية متجاوبة وسريعة',
                        'features' => array('تصميم عصري', 'متجاوب مع الأجهزة', 'محسن لمحركات البحث')
                    ),
                    array(
                        'icon' => 'fas fa-mobile-alt',
                        'title' => 'تطبيقات الجوال',
                        'description' => 'تطوير تطبيقات iOS و Android عالية الجودة',
                        'features' => array('تطبيقات أصلية', 'واجهة مستخدم مميزة', 'أداء عالي')
                    ),
                    array(
                        'icon' => 'fas fa-cash-register',
                        'title' => 'أنظمة نقاط البيع',
                        'description' => 'حلول POS متكاملة لإدارة عمليات البيع',
                        'features' => array('إدارة المخزون', 'التقارير المالية', 'طرق دفع متعددة')
                    ),
                    array(
                        'icon' => 'fas fa-video',
                        'title' => 'أنظمة المراقبة',
                        'description' => 'حلول كاميرات المراقبة والأمن المتقدمة',
                        'features' => array('مراقبة عن بعد', 'تسجيل عالي الجودة', 'إنذارات فورية')
                    ),
                    array(
                        'icon' => 'fas fa-network-wired',
                        'title' => 'الشبكات والأمن',
                        'description' => 'حلول الشبكات والأمن السيبراني',
                        'features' => array('تصميم الشبكات', 'جدران الحماية', 'فحص الأمن')
                    ),
                    array(
                        'icon' => 'fas fa-headset',
                        'title' => 'الدعم الفني',
                        'description' => 'دعم فني متواصل على مدار 24/7',
                        'features' => array('استجابة سريعة', 'فنيين مؤهلين', 'صيانة دورية')
                    )
                );

                foreach ($services as $service) :
                ?>
                    <div class="service-detailed-card">
                        <div class="service-icon-large">
                            <i class="<?php echo $service['icon']; ?>"></i>
                        </div>
                        <h3><?php echo $service['title']; ?></h3>
                        <p><?php echo $service['description']; ?></p>
                        <ul class="service-features">
                            <?php foreach ($service['features'] as $feature) : ?>
                                <li><i class="fas fa-check"></i> <?php echo $feature; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="#contact" class="btn btn-primary">اطلب عرض سعر</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();