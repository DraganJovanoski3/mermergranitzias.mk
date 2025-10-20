<?php
// Start session for language switching
session_start();

// Include translations
require_once 'includes/translations.php';

// Get current language
$current_lang = getCurrentLang();

// Set current page for navigation highlighting
$current_page = 'contact';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('page_contact'); ?> - <?php echo t('hero_title'); ?> | Контакт Информации | Скопје, Македонија</title>
    <meta name="description" content="<?php echo t('contact_subtitle'); ?> - Контактирајте не за професионална обработка на мермер и гранит. Телефон: 078 654 050, Скопје, Македонија.">
    <meta name="keywords" content="контакт, мермер, гранит, Скопје, Македонија, телефон, адреса, ZiasMermerGranit, обработка на камен, кујнски рабови, скулптури, споменици, контакт форма, локација, работилница">
    <meta name="author" content="ZiasMermerGranit">
    <meta name="robots" content="index, follow">
    <meta name="language" content="<?php echo $current_lang; ?>">
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="Скопје">
    <meta name="geo.position" content="41.9981;21.4254">
    <meta name="ICBM" content="41.9981, 21.4254">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo t('page_contact'); ?> - <?php echo t('hero_title'); ?> | Контакт Информации">
    <meta property="og:description" content="<?php echo t('contact_subtitle'); ?> - Контактирајте не за професионална обработка на мермер и гранит.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mermergranitzias.mk/contact.php">
    <meta property="og:site_name" content="ZiasMermerGranit">
    <meta property="og:locale" content="mk_MK">
    <meta property="og:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="ZiasMermerGranit - <?php echo t('page_contact'); ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo t('page_contact'); ?> - <?php echo t('hero_title'); ?> | Контакт Информации">
    <meta name="twitter:description" content="<?php echo t('contact_subtitle'); ?> - Контактирајте не за професионална обработка на мермер и гранит.">
    <meta name="twitter:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://mermergranitzias.mk/contact.php">
    
    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "<?php echo t('page_contact'); ?> - <?php echo t('hero_title'); ?>",
        "description": "<?php echo t('contact_subtitle'); ?> - Контактирајте не за професионална обработка на мермер и гранит.",
        "url": "https://mermergranitzias.mk/contact.php",
        "mainEntity": {
            "@type": "LocalBusiness",
            "name": "ZiasMermerGranit",
            "alternateName": "Zias Мермер Гранит",
            "description": "<?php echo t('hero_description'); ?> Професионална обработка на мермер и гранит за кујнски рабови, скулптури, споменици и облоги.",
            "url": "https://mermergranitzias.mk",
            "telephone": "+38978654050",
            "email": "info@mermergranitzias.mk",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Скопје",
                "addressLocality": "Скопје",
                "addressRegion": "Скопје",
                "addressCountry": "MK"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "41.9981",
                "longitude": "21.4254"
            },
            "openingHours": "Mo-Fr 08:00-17:00",
            "priceRange": "$$",
            "paymentAccepted": "Cash, Bank Transfer",
            "currenciesAccepted": "MKD",
            "serviceArea": {
                "@type": "GeoCircle",
                "geoMidpoint": {
                    "@type": "GeoCoordinates",
                    "latitude": "41.9981",
                    "longitude": "21.4254"
                },
                "geoRadius": "50000"
            }
        },
        "breadcrumb": {
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Почетна",
                    "item": "https://mermergranitzias.mk"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo t('page_contact'); ?>",
                    "item": "https://mermergranitzias.mk/contact.php"
                }
            ]
        }
    }
    </script>
    
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><?php echo t('contact_title'); ?></h1>
            <p><?php echo t('contact_subtitle'); ?></p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-page">
        <div class="container">
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
                            <p><?php echo t('contact_address_full'); ?></p>
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

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('contact_address'); ?></h2>
                <p><?php echo t('contact_find_us'); ?></p>
            </div>
            <div class="map-container">
                <iframe 
                    width="100%" 
                    height="400" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    id="gmap_canvas" 
                    src="https://maps.google.com/maps?width=1000&amp;height=400&amp;hl=en&amp;q=41.505837,%2021.224663%20Makedonski%20bord+(Zias)&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html> 