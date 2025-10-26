<?php
// Footer component for marble and granite website
// This file can be included in any page using: include 'includes/footer.php';

// Include translations
require_once 'includes/translations.php';
?>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <div class="footer-logo">
                <a href="home.php">
                    <img src="images/zias-logo.png" alt="ZiasMermerGranit Logo" class="footer-logo-image">
                </a>
            </div>
            <p><?php echo t('footer_description'); ?></p>
            <div class="social-links">
                <a href="#" aria-label="Facebook" class="social-link">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" aria-label="Instagram" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" aria-label="WhatsApp" class="social-link">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" aria-label="YouTube" class="social-link">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        
        <div class="footer-section">
            <h4><?php echo t('footer_services'); ?></h4>
            <ul class="footer-links">
                <li><a href="products.php?category=marble"><?php echo t('service_marble'); ?></a></li>
                <li><a href="products.php?category=granite"><?php echo t('service_granite'); ?></a></li>
                <li><a href="products.php?category=kitchen"><?php echo t('service_kitchen'); ?></a></li>
                <li><a href="products.php?category=sculpture-tombstones"><?php echo t('products_sculpture'); ?></a></li>
                <li><a href="products.php"><?php echo t('service_floor'); ?></a></li>
                <li><a href="products.php"><?php echo t('service_decorative'); ?></a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h4><?php echo t('footer_contact'); ?></h4>
            <div class="contact-list">
                <div class="contact-entry">
                    <i class="fas fa-phone"></i>
                    <a href="tel:+38978654050">078 654 050</a>
                </div>
                <div class="contact-entry">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@mermergranitzias.mk">info@mermergranitzias.mk</a>
                </div>
                <div class="contact-entry">
                    <i class="fas fa-map-marker-alt"></i>
                    <span><?php echo t('contact_address_full'); ?></span>
                </div>
                <div class="contact-entry">
                    <i class="fas fa-clock"></i>
                    <span><?php echo t('contact_monday_friday'); ?></span>
                </div>
                <div class="contact-entry">
                    <i class="fas fa-clock"></i>
                    <span><?php echo t('contact_saturday'); ?></span>
                </div>
            </div>
        </div>
        
        <div class="footer-section">
            <h4><?php echo t('footer_working_hours'); ?></h4>
            <div class="working-hours">
                <div class="hours-item">
                    <span><?php echo t('working_hours_monday_friday'); ?></span>
                    <span><?php echo t('working_hours_time_1'); ?></span>
                </div>
                <div class="hours-item">
                    <span><?php echo t('working_hours_saturday'); ?></span>
                    <span><?php echo t('working_hours_time_2'); ?></span>
                </div>
                <div class="hours-item">
                    <span><?php echo t('working_hours_sunday'); ?></span>
                    <span><?php echo t('contact_sunday'); ?></span>
                </div>
            </div>
            
            <div class="newsletter">
                <h5><?php echo t('footer_newsletter'); ?></h5>
                <form class="newsletter-form">
                    <input type="email" placeholder="<?php echo t('footer_newsletter_placeholder'); ?>" required>
                    <button type="submit">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; <?php echo date('Y'); ?> ZIAS Mermer & Granit. <?php echo t('footer_copyright'); ?></p>
            <div class="footer-bottom-links">
                <a href="privacy.php"><?php echo t('footer_privacy'); ?></a>
                <a href="terms.php"><?php echo t('footer_terms'); ?></a>
                <a href="sitemap.xml"><?php echo t('footer_sitemap'); ?></a>
            </div>
        </div>
    </div>
    
    <!-- New DDSolutions Credit Section -->
    <div class="footer-credit">
        <div class="footer-credit-content">
            <p>
                <span class="credit-year">2025</span> - 
                <span class="credit-company"><?php echo t('footer_credit_text'); ?></span> 
                <span class="credit-created"><?php echo t('footer_credit_created'); ?></span> 
                <a href="https://ddsolutions.com.mk/" target="_blank" rel="noopener" class="credit-link">DDSolutions</a>
            </p>
        </div>
    </div>
</footer> 

<!-- Floating Chat Buttons -->
<div class="floating-chat">
	<a href="https://wa.me/38978654050?text=<?php echo urlencode(t('whatsapp_message')); ?>" target="_blank" rel="noopener" class="float-btn whatsapp" aria-label="Chat on WhatsApp">
		<i class="fab fa-whatsapp"></i>
	</a>
	<a href="viber://chat?number=%2B38978654050" class="float-btn viber" aria-label="Chat on Viber" onclick="openViber()">
		<i class="fab fa-viber"></i>
	</a>
</div>

<script>
function openViber() {
    // Try to open Viber app, fallback to web if not available
    const viberUrl = 'viber://chat?number=%2B38978654050';
    const fallbackUrl = 'https://www.viber.com/';
    
    // Create a temporary link to test if Viber app is available
    const link = document.createElement('a');
    link.href = viberUrl;
    link.style.display = 'none';
    document.body.appendChild(link);
    
    // Try to open Viber app
    link.click();
    
    // Fallback after a short delay if Viber app doesn't open
    setTimeout(() => {
        if (document.hidden || document.webkitHidden) {
            // App opened successfully
            return;
        }
        // Fallback to Viber web
        window.open(fallbackUrl, '_blank');
    }, 1000);
    
    document.body.removeChild(link);
}
</script>