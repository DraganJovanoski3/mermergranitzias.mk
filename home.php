<?php
// Set UTF-8 encoding
header('Content-Type: text/html; charset=UTF-8');

// Start session for language switching
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database functions and translations
require_once 'admin/database_functions.php';
require_once 'includes/translations.php';

// Get current language
$current_lang = getCurrentLang();

// Set current page for navigation highlighting
$current_page = 'home';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/ziasmermergranit/">
    <title><?php echo t('hero_title'); ?> - Професионална Обработка на Мермер и Гранит | Скопје, Македонија</title>
    <meta name="description" content="<?php echo t('hero_description'); ?> Професионална обработка на мермер и гранит за кујнски рабови, скулптури, споменици и облоги. Скопје, Македонија.">
    <meta name="keywords" content="мермер, гранит, кујнски рабови, скулптури, споменици, облоги, подови, обработка на камен, Скопје, Македонија, ZiasMermerGranit, мермерни плочи, гранитни плочи, кујнски работни плочи, бањски шкафчиња, фасади, скали, декоративни површини, мермерни плочи Скопје, гранитни плочи Македонија, кујнски рабови мермер, скулптури мермер, споменици гранит, обработка камен, мермерни работни плочи, гранитни работни плочи, мермерни подови, гранитни подови, мермерни облоги, гранитни облоги, мермерни фасади, гранитни фасади, мермерни скали, гранитни скали, мермерни бањски шкафчиња, гранитни бањски шкафчиња, мермерни декорации, гранитни декорации, мермерни споменици, гранитни споменици, мермерни надгробни плочи, гранитни надгробни плочи, мермерни фонтани, гранитни фонтани, мермерни бисти, гранитни бисти, мермерни вази, гранитни вази, мермерни столбови, гранитни столбови, мермерни камини, гранитни камини, мермерни маси, гранитни маси, мермерни полици, гранитни полици, мермерни первази, гранитни первази, мермерни рамки, гранитни рамки, мермерни плочки, гранитни плочки, мермерни плочи за кујна, гранитни плочи за кујна, мермерни плочи за бања, гранитни плочи за бања, мермерни плочи за под, гранитни плочи за под, мермерни плочи за фасада, гранитни плочи за фасада, мермерни плочи за скали, гранитни плочи за скали, мермерни плочи за облоги, гранитни плочи за облоги, мермерни плочи за декорации, гранитни плочи за декорации, мермерни плочи за споменици, гранитни плочи за споменици, мермерни плочи за надгробни плочи, гранитни плочи за надгробни плочи, мермерни плочи за фонтани, гранитни плочи за фонтани, мермерни плочи за бисти, гранитни плочи за бисти, мермерни плочи за вази, гранитни плочи за вази, мермерни плочи за столбови, гранитни плочи за столбови, мермерни плочи за камини, гранитни плочи за камини, мермерни плочи за маси, гранитни плочи за маси, мермерни плочи за полици, гранитни плочи за полици, мермерни плочи за первази, гранитни плочи за первази, мермерни плочи за рамки, гранитни плочи за рамки, мермерни плочи за плочки, гранитни плочи за плочки, обработка мермер, обработка гранит, обработка камен, обработка мермерни плочи, обработка гранитни плочи, обработка кујнски рабови, обработка скулптури, обработка споменици, обработка облоги, обработка подови, обработка фасади, обработка скали, обработка декорации, обработка бањски шкафчиња, обработка работни плочи, обработка подни плочи, обработка обложни плочи, обработка фасадни плочи, обработка скални плочи, обработка декоративни плочи, обработка спомен плочи, обработка надгробни плочи, обработка фонтани, обработка бисти, обработка вази, обработка столбови, обработка камини, обработка маси, обработка полици, обработка первази, обработка рамки, обработка плочки, обработка плочи за кујна, обработка плочи за бања, обработка плочи за под, обработка плочи за фасада, обработка плочи за скали, обработка плочи за облоги, обработка плочи за декорации, обработка плочи за споменици, обработка плочи за надгробни плочи, обработка плочи за фонтани, обработка плочи за бисти, обработка плочи за вази, обработка плочи за столбови, обработка плочи за камини, обработка плочи за маси, обработка плочи за полици, обработка плочи за первази, обработка плочи за рамки, обработка плочи за плочки, ZiasMermerGranit Скопје, ZiasMermerGranit Македонија, ZiasMermerGranit мермер, ZiasMermerGranit гранит, ZiasMermerGranit кујнски рабови, ZiasMermerGranit скулптури, ZiasMermerGranit споменици, ZiasMermerGranit облоги, ZiasMermerGranit подови, ZiasMermerGranit фасади, ZiasMermerGranit скали, ZiasMermerGranit декорации, ZiasMermerGranit бањски шкафчиња, ZiasMermerGranit работни плочи, ZiasMermerGranit подни плочи, ZiasMermerGranit обложни плочи, ZiasMermerGranit фасадни плочи, ZiasMermerGranit скални плочи, ZiasMermerGranit декоративни плочи, ZiasMermerGranit спомен плочи, ZiasMermerGranit надгробни плочи, ZiasMermerGranit фонтани, ZiasMermerGranit бисти, ZiasMermerGranit вази, ZiasMermerGranit столбови, ZiasMermerGranit камини, ZiasMermerGranit маси, ZiasMermerGranit полици, ZiasMermerGranit первази, ZiasMermerGranit рамки, ZiasMermerGranit плочки, ZiasMermerGranit плочи за кујна, ZiasMermerGranit плочи за бања, ZiasMermerGranit плочи за под, ZiasMermerGranit плочи за фасада, ZiasMermerGranit плочи за скали, ZiasMermerGranit плочи за облоги, ZiasMermerGranit плочи за декорации, ZiasMermerGranit плочи за споменици, ZiasMermerGranit плочи за надгробни плочи, ZiasMermerGranit плочи за фонтани, ZiasMermerGranit плочи за бисти, ZiasMermerGranit плочи за вази, ZiasMermerGranit плочи за столбови, ZiasMermerGranit плочи за камини, ZiasMermerGranit плочи за маси, ZiasMermerGranit плочи за полици, ZiasMermerGranit плочи за первази, ZiasMermerGranit плочи за рамки, ZiasMermerGranit плочи за плочки, ZiasMermerGranit обработка мермер, ZiasMermerGranit обработка гранит, ZiasMermerGranit обработка камен, ZiasMermerGranit обработка мермерни плочи, ZiasMermerGranit обработка гранитни плочи, ZiasMermerGranit обработка кујнски рабови, ZiasMermerGranit обработка скулптури, ZiasMermerGranit обработка споменици, ZiasMermerGranit обработка облоги, ZiasMermerGranit обработка подови, ZiasMermerGranit обработка фасади, ZiasMermerGranit обработка скали, ZiasMermerGranit обработка декорации, ZiasMermerGranit обработка бањски шкафчиња, ZiasMermerGranit обработка работни плочи, ZiasMermerGranit обработка подни плочи, ZiasMermerGranit обработка обложни плочи, ZiasMermerGranit обработка фасадни плочи, ZiasMermerGranit обработка скални плочи, ZiasMermerGranit обработка декоративни плочи, ZiasMermerGranit обработка спомен плочи, ZiasMermerGranit обработка надгробни плочи, ZiasMermerGranit обработка фонтани, ZiasMermerGranit обработка бисти, ZiasMermerGranit обработка вази, ZiasMermerGranit обработка столбови, ZiasMermerGranit обработка камини, ZiasMermerGranit обработка маси, ZiasMermerGranit обработка полици, ZiasMermerGranit обработка первази, ZiasMermerGranit обработка рамки, ZiasMermerGranit обработка плочки, ZiasMermerGranit плочи за кујна, ZiasMermerGranit плочи за бања, ZiasMermerGranit плочи за под, ZiasMermerGranit плочи за фасада, ZiasMermerGranit плочи за скали, ZiasMermerGranit плочи за облоги, ZiasMermerGranit плочи за декорации, ZiasMermerGranit плочи за споменици, ZiasMermerGranit плочи за надгробни плочи, ZiasMermerGranit плочи за фонтани, ZiasMermerGranit плочи за бисти, ZiasMermerGranit плочи за вази, ZiasMermerGranit плочи за столбови, ZiasMermerGranit плочи за камини, ZiasMermerGranit плочи за маси, ZiasMermerGranit плочи за полици, ZiasMermerGranit плочи за первази, ZiasMermerGranit плочи за рамки, ZiasMermerGranit плочи за плочки">
    <meta name="author" content="ZiasMermerGranit">
    <meta name="robots" content="index, follow">
    <meta name="language" content="<?php echo $current_lang; ?>">
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="Скопје">
    <meta name="geo.position" content="41.9981;21.4254">
    <meta name="ICBM" content="41.9981, 21.4254">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo t('hero_title'); ?> - Професионална Обработка на Мермер и Гранит">
    <meta property="og:description" content="<?php echo t('hero_description'); ?> Професионална обработка на мермер и гранит за кујнски рабови, скулптури, споменици и облоги.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mermergranitzias.mk">
    <meta property="og:site_name" content="ZiasMermerGranit">
    <meta property="og:locale" content="mk_MK">
    <meta property="og:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="ZiasMermerGranit - Професионална обработка на мермер и гранит">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo t('hero_title'); ?> - Професионална Обработка на Мермер и Гранит">
    <meta name="twitter:description" content="<?php echo t('hero_description'); ?> Професионална обработка на мермер и гранит за кујнски рабови, скулптури, споменици и облоги.">
    <meta name="twitter:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://mermergranitzias.mk/home.php">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    
    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
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
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "<?php echo t('services_title'); ?>",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "<?php echo t('service_kitchen'); ?>",
                        "description": "<?php echo t('service_kitchen_desc'); ?>",
                        "provider": {
                            "@type": "LocalBusiness",
                            "name": "ZiasMermerGranit"
                        }
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "<?php echo t('service_sculptures'); ?>",
                        "description": "<?php echo t('service_sculptures_desc'); ?>",
                        "provider": {
                            "@type": "LocalBusiness",
                            "name": "ZiasMermerGranit"
                        }
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "<?php echo t('service_tombstones'); ?>",
                        "description": "<?php echo t('service_tombstones_desc'); ?>",
                        "provider": {
                            "@type": "LocalBusiness",
                            "name": "ZiasMermerGranit"
                        }
                    }
                }
            ]
        },
        "sameAs": [
            "https://www.facebook.com/mermergranitzias",
            "https://www.instagram.com/mermergranitzias"
        ],
        "foundingDate": "2010",
        "numberOfEmployees": "5-10",
        "slogan": "<?php echo t('hero_title'); ?>"
    }
    </script>
    
    <!-- Stylesheets -->
     <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo t('hero_title'); ?></h1>
            <p class="hero-subtitle"><?php echo t('hero_subtitle'); ?></p>
            <div class="hero-buttons">
                <a href="#products" class="btn btn-primary">
                    <i class="fas fa-th-large"></i>
                    <?php echo t('products_title'); ?>
                </a>
                <a href="#contact" class="btn btn-secondary">
                    <i class="fas fa-phone"></i>
                    <?php echo t('nav_contact'); ?>
                </a>
            </div>
        </div>
        <div class="hero-overlay"></div>
    </section>

    <!-- Tombstones and Sculptures Section -->
    <section id="tombstones-sculptures" class="products">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('tombstones_title'); ?></h2>
                <p><?php echo t('tombstones_subtitle'); ?></p>
            </div>

            <?php 
            // List of sculpture images (limited to 8)
            $sculptureImages = [
                'sculptures/sculpture (1).jpg',
                'sculptures/sculpture (2).jpg',
                'sculptures/sculpture (3).jpg',
                'sculptures/sculpture (5).jpg',
                'sculptures/sculpture (6).jpg',
                'sculptures/sculpture (7).jpg',
                'sculptures/sculpture (8).jpg',
                'sculptures/sculpture (9).jpg'
            ];
            // Map sculpture images to product IDs
            $sculptureImageToProduct = [
                'sculptures/sculpture (1).jpg' => 'sculpture-marble-1',
                'sculptures/sculpture (2).jpg' => 'sculpture-granite-1',
                'sculptures/sculpture (3).jpg' => 'sculpture-marble-2',
                'sculptures/sculpture (5).jpg' => 'sculpture-marble-2',
                'sculptures/sculpture (6).jpg' => 'sculpture-granite-4',
                'sculptures/sculpture (7).jpg' => 'sculpture-granite-3',
                'sculptures/sculpture (8).jpg' => 'sculpture-marble-99',
                'sculptures/sculpture (9).jpg' => 'sculpture-granite-4'
            ];
            
            // List of tombstone images (limited to 8)
            $tombstoneImages = [
                'tombstones/tombstones (1).jpg',
                'tombstones/tombstones (2).jpg',
                'tombstones/tombstones (3).jpg',
                'tombstones/tombstones (4).jpg',
                'tombstones/tombstones (5).jpg',
                'tombstones/tombstones (6).jpg',
                'tombstones/tombstones (7).jpg',
                'tombstones/tombstones (8).jpg'
            ];
            // Map tombstone images to product IDs (multiple images can point to same product)
            $tombstoneImageToProduct = [
                'tombstones/tombstones (1).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (2).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (3).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (4).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (5).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (6).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (7).jpg' => 'sculpture-granite-2',
                'tombstones/tombstones (8).jpg' => 'sculpture-granite-2'
            ];
            ?>

            <!-- Sculptures Gallery -->
            <div class="gallery-section">
                <h3 style="text-align: center; margin-bottom: 2rem; color: #fff;"><?php echo t('products_sculpture'); ?></h3>
                <div class="image-gallery">
                    <?php foreach ($sculptureImages as $image): ?>
                    <?php $pid = isset($sculptureImageToProduct[$image]) ? $sculptureImageToProduct[$image] : 'sculpture-marble-99'; ?>
                    <?php $p = getProductByIdFromDB($pid, $current_lang); $slug = $p ? getProductSlug($p) : $pid; ?>
                    <a class="gallery-item" href="product.php?slug=<?php echo htmlspecialchars($slug); ?>" aria-label="<?php echo t('tombstones_sculpture'); ?>">
                        <img src="images/<?php echo $image; ?>" alt="<?php echo t('tombstones_sculpture'); ?>" loading="lazy">
                        <div class="gallery-overlay">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="gallery-footer">
                    <a href="products.php?category=sculpture-tombstones" class="btn btn-outline">
                        <i class="fas fa-palette"></i>
                        <?php echo t('see_more'); ?> <?php echo t('tombstones_sculpture'); ?>
                    </a>
                </div>
            </div>

            <!-- Tombstones Gallery -->
            <div class="gallery-section">
                <h3 style="text-align: center; margin-bottom: 2rem; color: #fff;"><?php echo t('tombstones_memorials'); ?></h3>
                <div class="image-gallery">
                    <?php foreach ($tombstoneImages as $image): ?>
                    <?php $pid = isset($tombstoneImageToProduct[$image]) ? $tombstoneImageToProduct[$image] : 'sculpture-granite-2'; ?>
                    <?php $p = getProductByIdFromDB($pid, $current_lang); $slug = $p ? getProductSlug($p) : $pid; ?>
                    <a class="gallery-item" href="product.php?slug=<?php echo htmlspecialchars($slug); ?>" aria-label="<?php echo t('tombstones_memorials'); ?>">
                        <img src="images/<?php echo $image; ?>" alt="<?php echo t('tombstones_memorials'); ?>" loading="lazy">
                        <div class="gallery-overlay">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="gallery-footer">
                    <a href="products.php?category=sculpture-tombstones" class="btn btn-outline">
                        <i class="fas fa-monument"></i>
                        <?php echo t('see_more'); ?> <?php echo t('tombstones_memorials'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stone Types Section -->
    <section id="stone-types" class="products">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('products_title'); ?></h2>
                <p><?php echo t('products_subtitle'); ?></p>
            </div>

            <?php 
            // Get featured granite products from database
            $featuredProducts = getProductsByCategoryFromDB('granite', $current_lang);
            // Limit to first 16 products for homepage
            $featuredProducts = array_slice($featuredProducts, 0, 16);
            ?>

            <div class="products-grid">
                <?php foreach ($featuredProducts as $product): ?>
                <div class="product-item" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                    <div class="product-image">
                        <?php if (isset($product['main_image']) && $product['main_image']): ?>
                            <img src="images/<?php echo htmlspecialchars($product['main_image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 100%; height: 250px; object-fit: cover;">
                        <?php else: ?>
                            <div class="placeholder-image" style="width: 100%; height: 250px; background: linear-gradient(135deg, #3a3a3a 0%, #2a2a2a 100%); display: flex; align-items: center; justify-content: center; color: #b0b0b0;">
                                <div style="text-align: center;">
                                    <i class="fas fa-gem" style="font-size: 2rem; color: #e74c3c; margin-bottom: 0.5rem; display: block;"></i>
                                    <p><?php echo htmlspecialchars($product['name']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <?php $slug = function_exists('getProductSlug') ? getProductSlug($product) : $product['product_id']; ?>
                        <a href="proizvod/<?php echo htmlspecialchars($slug); ?>" class="btn btn-primary"><?php echo t('view_product'); ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
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
    <section id="services1" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo t('services_title'); ?></h2>
                <p><?php echo t('services_subtitle'); ?></p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-card-inner">
                        <div class="service-image">
                            <img src="images/kitchen/kitchen-marble-countertops.jpeg" alt="<?php echo t('service_kitchen'); ?>" loading="lazy">
                        </div>
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
                        <div class="service-image">
                            <img src="images/sculptures/sculpture (1).jpg" alt="<?php echo t('service_sculptures'); ?>" loading="lazy">
                        </div>
                        <div class="service-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="service-content">
                            <h3><?php echo t('service_sculptures'); ?></h3>
                            <p><?php echo t('service_sculptures_desc'); ?></p>
                            <div class="service-features">
                                <span class="feature-tag"><?php echo t('feature_artistic'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_custom'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_precision'); ?></span>
                            </div>
                            <a href="products.php?category=sculpture-tombstones" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i>
                                <?php echo t('learn_more'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-card-inner">
                        <div class="service-image">
                            <img src="images/tombstones/tombstones (1).jpg" alt="<?php echo t('service_tombstones'); ?>" loading="lazy">
                        </div>
                        <div class="service-icon">
                            <i class="fas fa-monument"></i>
                        </div>
                        <div class="service-content">
                            <h3><?php echo t('service_tombstones'); ?></h3>
                            <p><?php echo t('service_tombstones_desc'); ?></p>
                            <div class="service-features">
                                <span class="feature-tag"><?php echo t('feature_durability'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_respectful'); ?></span>
                                <span class="feature-tag"><?php echo t('feature_eternal'); ?></span>
                            </div>
                            <a href="products.php?category=sculpture-tombstones" class="btn btn-primary">
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
                    <a href="#contact" class="btn btn-secondary">
                        <i class="fas fa-phone"></i>
                        <?php echo t('get_quote'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
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
                            <a style="color: #fff; text-decoration: none; text-transform: none;" href="tel:+389078654050">
                            078 654 050</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4><?php echo t('contact_email'); ?></h4>
                            <a style="color: #fff; text-decoration: none; text-transform: none;" href="mailto:info@mermergranitzias.mk">info@mermergranitzias.mk</a>
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

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <div class="lightbox-content" onclick="event.stopPropagation()">
            <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
            <img id="lightbox-image" src="" alt="">
            <div class="lightbox-caption" id="lightbox-caption"></div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js?v=<?php echo time(); ?>"></script>
</body>
</html> 