<?php
// Start session for language switching
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include translations
require_once 'includes/translations.php';

// Get current language
$current_lang = getCurrentLang();
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/ziasmermergranit/">
    <title><?php echo t('page_about'); ?> - <?php echo t('hero_title'); ?> | За Нас | Скопје, Македонија</title>
    <meta name="description" content="<?php echo t('about_description'); ?> - Дознајте повеќе за ZiasMermerGranit, нашата историја, искуство и професионална обработка на мермер и гранит во Скопје, Македонија.">
    <meta name="keywords" content="за нас, ZiasMermerGranit, историја, искуство, мермер, гранит, обработка на камен, Скопје, Македонија, професионални услуги, кујнски рабови, скулптури, споменици, тим, квалитет">
    <meta name="author" content="ZiasMermerGranit">
    <meta name="robots" content="index, follow">
    <meta name="language" content="<?php echo $current_lang; ?>">
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="Скопје">
    <meta name="geo.position" content="41.9981;21.4254">
    <meta name="ICBM" content="41.9981, 21.4254">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo t('page_about'); ?> - <?php echo t('hero_title'); ?> | За Нас">
    <meta property="og:description" content="<?php echo t('about_description'); ?> - Дознајте повеќе за ZiasMermerGranit, нашата историја и искуство.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mermergranitzias.mk/about.php">
    <meta property="og:site_name" content="ZiasMermerGranit">
    <meta property="og:locale" content="mk_MK">
    <meta property="og:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="ZiasMermerGranit - <?php echo t('page_about'); ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo t('page_about'); ?> - <?php echo t('hero_title'); ?> | За Нас">
    <meta name="twitter:description" content="<?php echo t('about_description'); ?> - Дознајте повеќе за ZiasMermerGranit, нашата историја и искуство.">
    <meta name="twitter:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://mermergranitzias.mk/about.php">
    
    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "name": "<?php echo t('page_about'); ?> - <?php echo t('hero_title'); ?>",
        "description": "<?php echo t('about_description'); ?> - Дознајте повеќе за ZiasMermerGranit, нашата историја и искуство.",
        "url": "https://mermergranitzias.mk/about.php",
        "mainEntity": {
            "@type": "LocalBusiness",
            "name": "ZiasMermerGranit",
            "alternateName": "Zias Мермер Гранит",
            "description": "<?php echo t('about_description'); ?>",
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
            "foundingDate": "2010",
            "numberOfEmployees": "5-10",
            "priceRange": "$$",
            "paymentAccepted": "Cash, Bank Transfer",
            "currenciesAccepted": "MKD"
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
                    "name": "<?php echo t('page_about'); ?>",
                    "item": "https://mermergranitzias.mk/about.php"
                }
            ]
        }
    }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><?php echo t('about_title'); ?></h1>
            <p><?php echo t('about_subtitle'); ?></p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-page">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2><?php echo t('about_title'); ?></h2>
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
                    <img src="images/about-us-img.jpg" alt="<?php echo t('about_title'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('services_title'); ?></h2>
                <p><?php echo t('services_subtitle'); ?></p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-card-inner">
                        <div class="service-icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <div class="service-content">
                            <h3><?php echo t('service_marble'); ?></h3>
                            <p><?php echo t('service_marble_desc'); ?></p>
                            <div class="service-features">
                                <span class="feature-tag"><?php echo t('feature_quality'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_durability'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_design'); ?></span>
                            </div>
                            <a href="products.php?category=marble" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i>
                                <?php echo t('learn_more'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-card-inner">
                        <div class="service-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <div class="service-content">
                            <h3><?php echo t('service_granite'); ?></h3>
                            <p><?php echo t('service_granite_desc'); ?></p>
                            <div class="service-features">
                                <span class="feature-tag"><?php echo t('feature_durability'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_quality'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_style'); ?></span>
                            </div>
                            <a href="products.php?category=granite" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i>
                                <?php echo t('learn_more'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-card-inner">
                        <div class="service-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="service-content">
                            <h3><?php echo t('service_kitchen'); ?></h3>
                            <p><?php echo t('service_kitchen_desc'); ?></p>
                            <div class="service-features">
                                <span class="feature-tag"><?php echo t('feature_personalized'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_practical'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_elegan'); ?></span>
                            </div>
                            <a href="products.php?category=kitchen" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i>
                                <?php echo t('learn_more'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-card-inner">
                        <div class="service-icon">
                            <i class="fas fa-monument"></i>
                        </div>
                        <div class="service-content">
                            <h3><?php echo t('service_sculptures'); ?></h3>
                            <p><?php echo t('service_sculptures_desc'); ?></p>
                            <div class="service-features">
                                <span class="feature-tag"><?php echo t('feature_artistic'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_durable'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_unique'); ?></span>
                            </div>
                            <a href="proizvodi/sculpture-tombstones" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i>
                                <?php echo t('learn_more'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="services-cta">
                <div class="cta-content">
                    <h3><?php echo t('services_cta_title'); ?></h3>
                    <p><?php echo t('services_cta_desc'); ?></p>
                    <a href="contact.php" class="btn btn-secondary">
                        <i class="fas fa-phone"></i>
                        <?php echo t('get_quote'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html> 