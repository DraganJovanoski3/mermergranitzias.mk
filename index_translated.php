<?php
// Include translations and language switcher
require_once 'includes/translations.php';
require_once 'includes/language_switcher.php';

// Get current language
$current_lang = getCurrentLang();
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('hero_title'); ?> - ZiasMermerGranit</title>
    <meta name="description" content="<?php echo t('hero_description'); ?>">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="container">
                <h1 class="hero-title"><?php echo t('hero_title'); ?></h1>
                <p class="hero-subtitle"><?php echo t('hero_subtitle'); ?></p>
                <p class="hero-description"><?php echo t('hero_description'); ?></p>
                <a href="#contact" class="btn btn-primary hero-cta">
                    <?php echo t('hero_cta'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('about_title'); ?></h2>
                <p><?php echo t('about_subtitle'); ?></p>
            </div>
            
            <div class="about-content">
                <div class="about-text">
                    <p><?php echo t('about_description'); ?></p>
                    
                    <div class="stats">
                        <div class="stat-item">
                            <div class="stat-number">15+</div>
                            <div class="stat-label"><?php echo t('about_experience'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label"><?php echo t('about_projects'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">300+</div>
                            <div class="stat-label"><?php echo t('about_clients'); ?></div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label"><?php echo t('about_quality'); ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="about-image">
                    <img src="images/about-us-img.jpg" alt="About Us">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('services_title'); ?></h2>
                <p><?php echo t('services_subtitle'); ?></p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <h3><?php echo t('service_marble'); ?></h3>
                    <p>Професионална обработка на мермерни плочи за сите ваши проекти.</p>
                    <a href="products.php?category=marble" class="btn btn-secondary"><?php echo t('learn_more'); ?></a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3><?php echo t('service_granite'); ?></h3>
                    <p>Квалитетни гранитни плочи со модерен дизајн и трајност.</p>
                    <a href="products.php?category=granite" class="btn btn-secondary"><?php echo t('learn_more'); ?></a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3><?php echo t('service_kitchen'); ?></h3>
                    <p>Кујнски рабови од мермер и гранит со персонализиран дизајн.</p>
                    <a href="products.php?category=kitchen" class="btn btn-secondary"><?php echo t('learn_more'); ?></a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-bath"></i>
                    </div>
                    <h3><?php echo t('service_bathroom'); ?></h3>
                    <p>Комплетни решенија за бањи и тоалети од мермер и гранит.</p>
                    <a href="products.php?category=bathroom" class="btn btn-secondary"><?php echo t('learn_more'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('products_title'); ?></h2>
                <p><?php echo t('products_subtitle'); ?></p>
            </div>
            
            <div class="category-buttons">
                <button class="category-btn active" data-category="all"><?php echo t('products_all'); ?></button>
                <button class="category-btn" data-category="marble"><?php echo t('products_marble'); ?></button>
                <button class="category-btn" data-category="granite"><?php echo t('products_granite'); ?></button>
                <button class="category-btn" data-category="kitchen"><?php echo t('products_kitchen'); ?></button>
                <button class="category-btn" data-category="bathroom"><?php echo t('products_bathroom'); ?></button>
            </div>
            
            <div class="products-grid">
                <!-- Sample products - you can add more -->
                <div class="product-item" data-category="marble">
                    <div class="product-image">
                        <img src="images/marbel-types/Blue-Pearl.jpg" alt="Blue Pearl Marble">
                    </div>
                    <div class="product-info">
                        <h3>Blue Pearl Marble</h3>
                        <p>Елегантен мермер со сини нјанси</p>
                        <a href="product.php?id=1" class="btn btn-primary"><?php echo t('view_product'); ?></a>
                    </div>
                </div>
                
                <div class="product-item" data-category="granite">
                    <div class="product-image">
                        <img src="images/stock-granite.jpg" alt="Granite Slab">
                    </div>
                    <div class="product-info">
                        <h3>Granite Slab</h3>
                        <p>Трајни гранитни плочи</p>
                        <a href="product.php?id=2" class="btn btn-primary"><?php echo t('view_product'); ?></a>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <a href="products.php" class="btn btn-secondary"><?php echo t('view_all'); ?></a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('contact_title'); ?></h2>
                <p><?php echo t('contact_subtitle'); ?></p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4><?php echo t('contact_phone'); ?></h4>
                            <a href="tel:+38978654050">078 654 050</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4><?php echo t('contact_email'); ?></h4>
                            <a href="mailto:info@mermergranitzias.mk">info@mermergranitzias.mk</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4><?php echo t('contact_address'); ?></h4>
                            <p>Кузман Јосифовски - Питу 8, 6530 Македонски Брод</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4><?php echo t('contact_working_hours'); ?></h4>
                            <p><?php echo t('contact_monday_friday'); ?></p>
                            <p><?php echo t('contact_saturday'); ?></p>
                            <p><?php echo t('contact_sunday'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3><?php echo t('contact_send'); ?></h3>
                    <form id="contactForm" action="process_contact_enhanced.php" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name"><?php echo t('contact_name'); ?> *</label>
                                <input type="text" id="name" name="name" placeholder="<?php echo t('contact_name'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><?php echo t('contact_email'); ?> *</label>
                                <input type="email" id="email" name="email" placeholder="<?php echo t('contact_email'); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone"><?php echo t('contact_phone'); ?></label>
                                <input type="tel" id="phone" name="phone" placeholder="<?php echo t('contact_phone'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="service"><?php echo t('contact_service'); ?></label>
                                <select id="service" name="service">
                                    <option value=""><?php echo t('contact_service'); ?></option>
                                    <option value="kitchen"><?php echo t('service_kitchen'); ?></option>
                                    <option value="bathroom"><?php echo t('service_bathroom'); ?></option>
                                    <option value="floor"><?php echo t('service_floor'); ?></option>
                                    <option value="other"><?php echo t('optional'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message"><?php echo t('contact_message'); ?> *</label>
                            <textarea id="message" name="message" placeholder="<?php echo t('contact_message'); ?>" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            <?php echo t('contact_send'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>

