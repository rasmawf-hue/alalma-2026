<?php
/**
 * Footer Template
 * 
 * @package Alalama_Tech
 */
?>

<footer class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col col-4">
                    <div class="footer-widget">
                        <h4>عن العلامة</h4>
                        <p>شركة رائدة في مجال تقنية المعلومات في ليبيا، نقدم حلولاً متكاملة للشركات والمؤسسات.</p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col col-2">
                    <div class="footer-widget">
                        <h4>روابط سريعة</h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'menu_class' => 'footer-menu',
                            'fallback_cb' => false,
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="col col-3">
                    <div class="footer-widget">
                        <h4>معلومات الاتصال</h4>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>طرابلس، ليبيا</span>
                            </li>
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:+218911234567">091-1234567</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:info@alalama.ly">info@alalama.ly</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col col-3">
                    <div class="footer-widget">
                        <h4>ساعات العمل</h4>
                        <ul class="footer-hours">
                            <li>السبت - الخميس: 9:00 ص - 5:00 م</li>
                            <li>الجمعة: مغلق</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>