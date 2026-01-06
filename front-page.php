<?php
/**
 * Front Page Template
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<main id="main" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo get_theme_mod('alalama_hero_title', 'نحقق رؤيتك التقنية'); ?></h1>
                <p><?php echo get_theme_mod('alalama_hero_description', 'حلول تقنية متكاملة لعملك'); ?></p>
                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary">خدماتنا</a>
                    <a href="#contact" class="btn btn-outline">تواصل معنا</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="section-title">خدماتنا</h2>
            <div class="services-grid">
                <?php
                $services = array(
                    array('icon' => 'fas fa-laptop-code', 'title' => 'تطوير المواقع', 'description' => 'تصميم وتطوير مواقع احترافية متجاوبة'),
                    array('icon' => 'fas fa-mobile-alt', 'title' => 'تطبيقات الجوال', 'description' => 'تطوير تطبيقات iOS و Android'),
                    array('icon' => 'fas fa-database', 'title' => 'قواعد البيانات', 'description' => 'تصميم وإدارة قواعد البيانات'),
                    array('icon' => 'fas fa-shield-alt', 'title' => 'الأمن السيبراني', 'description' => 'حماية بياناتك ومعلوماتك'),
                    array('icon' => 'fas fa-cloud', 'title' => 'الحوسبة السحابية', 'description' => 'حلول سحابية متكاملة'),
                    array('icon' => 'fas fa-headset', 'title' => 'الدعم الفني', 'description' => 'دعم فني على مدار الساعة'),
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
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section" style="background-color: var(--bg-light);">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>من نحن</h2>
                    <p>شركة العلامة للحاسبات والتقنية، رائدة في تقديم الحلول التقنية المتكاملة في ليبيا.</p>
                    <p>نقدم خدمات متنوعة تشمل تطوير المواقع والتطبيقات، أنظمة نقاط البيع، وحلول الأمن والمراقبة.</p>
                    <a href="<?php echo home_url('/about'); ?>" class="btn btn-primary">اعرف المزيد</a>
                </div>
                <div class="col-6">
                    <!-- يمكن إضافة صورة أو فيديو هنا -->
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <h2 class="section-title">تواصل معنا</h2>
            <div class="row">
                <div class="col-6">
                    <div class="contact-info">
                        <h3>معلومات الاتصال</h3>
                        <ul class="contact-list">
                            <li>
                                <i class="fas fa-phone"></i>
                                <span><?php echo get_theme_mod('alalama_phone_1', '091-1234567'); ?></span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span><?php echo get_theme_mod('alalama_email', 'info@alalama.ly'); ?></span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo get_theme_mod('alalama_address', 'طرابلس، ليبيا'); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <?php echo do_shortcode('[contact-form-7 id="1" title="نموذج الاتصال"]'); ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();