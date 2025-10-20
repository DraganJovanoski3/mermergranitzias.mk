<?php
// Start session for language switching
session_start();

// Include translations
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
    <title><?php echo t('hero_title'); ?> - Професионална Обработка на Мермер и Гранит | Скопје, Македонија</title>
    <meta name="description" content="<?php echo t('hero_description'); ?> Професионална обработка на мермер и гранит за кујнски рабови, скулптури, споменици и облоги. Скопје, Македонија.">
    <meta name="keywords" content="мермер, гранит, кујнски рабови, скулптури, споменици, облоги, подови, обработка на камен, Скопје, Македонија, ZiasMermerGranit, мермерни плочи, гранитни плочи, кујнски работни плочи, бањски шкафчиња, фасади, скали, декоративни површини, мермерни плочи Скопје, гранитни плочи Македонија, кујнски рабови мермер, скулптури мермер, споменици гранит, обработка камен, мермерни работни плочи, гранитни работни плочи, мермерни подови, гранитни подови, мермерни облоги, гранитни облоги, мермерни фасади, гранитни фасади, мермерни скали, гранитни скали, мермерни бањски шкафчиња, гранитни бањски шкафчиња, мермерни декорации, гранитни декорации, мермерни споменици, гранитни споменици, мермерни надгробни плочи, гранитни надгробни плочи, мермерни фонтани, гранитни фонтани, мермерни бисти, гранитни бисти, мермерни вази, гранитни вази, мермерни столбови, гранитни столбови, мермерни камини, гранитни камини, мермерни маси, гранитни маси, мермерни полици, гранитни полици, мермерни первази, гранитни первази, мермерни рамки, гранитни рамки, мермерни плочки, гранитни плочки, обработка мермер, обработка гранит, обработка камен, обработка мермерни плочи, обработка гранитни плочи, обработка кујнски рабови, обработка скулптури, обработка споменици, обработка облоги, обработка подови, обработка фасади, обработка скали, обработка декорации, обработка бањски шкафчиња, обработка работни плочи, обработка подни плочи, обработка обложни плочи, обработка фасадни плочи, обработка скални плочи, обработка декоративни плочи, обработка спомен плочи, обработка надгробни плочи, обработка фонтани, обработка бисти, обработка вази, обработка столбови, обработка камини, обработка маси, обработка полици, обработка первази, обработка рамки, обработка плочки, ZiasMermerGranit Скопје, ZiasMermerGranit Македонија, ZiasMermerGranit мермер, ZiasMermerGranit гранит, ZiasMermerGranit кујнски рабови, ZiasMermerGranit скулптури, ZiasMermerGranit споменици, ZiasMermerGranit облоги, ZiasMermerGranit подови, ZiasMermerGranit фасади, ZiasMermerGranit скали, ZiasMermerGranit декорации, ZiasMermerGranit бањски шкафчиња, ZiasMermerGranit работни плочи, ZiasMermerGranit подни плочи, ZiasMermerGranit обложни плочи, ZiasMermerGranit фасадни плочи, ZiasMermerGranit скални плочи, ZiasMermerGranit декоративни плочи, ZiasMermerGranit спомен плочи, ZiasMermerGranit надгробни плочи, ZiasMermerGranit фонтани, ZiasMermerGranit бисти, ZiasMermerGranit вази, ZiasMermerGranit столбови, ZiasMermerGranit камини, ZiasMermerGranit маси, ZiasMermerGranit полици, ZiasMermerGranit первази, ZiasMermerGranit рамки, ZiasMermerGranit плочки, ZiasMermerGranit обработка мермер, ZiasMermerGranit обработка гранит, ZiasMermerGranit обработка камен, ZiasMermerGranit обработка мермерни плочи, ZiasMermerGranit обработка гранитни плочи, ZiasMermerGranit обработка кујнски рабови, ZiasMermerGranit обработка скулптури, ZiasMermerGranit обработка споменици, ZiasMermerGranit обработка облоги, ZiasMermerGranit обработка подови, ZiasMermerGranit обработка фасади, ZiasMermerGranit обработка скали, ZiasMermerGranit обработка декорации, ZiasMermerGranit обработка бањски шкафчиња, ZiasMermerGranit обработка работни плочи, ZiasMermerGranit обработка подни плочи, ZiasMermerGranit обработка обложни плочи, ZiasMermerGranit обработка фасадни плочи, ZiasMermerGranit обработка скални плочи, ZiasMermerGranit обработка декоративни плочи, ZiasMermerGranit обработка спомен плочи, ZiasMermerGranit обработка надгробни плочи, ZiasMermerGranit обработка фонтани, ZiasMermerGranit обработка бисти, ZiasMermerGranit обработка вази, ZiasMermerGranit обработка столбови, ZiasMermerGranit обработка камини, ZiasMermerGranit обработка маси, ZiasMermerGranit обработка полици, ZiasMermerGranit обработка первази, ZiasMermerGranit обработка рамки, ZiasMermerGranit обработка плочки">
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
    <link rel="canonical" href="https://mermergranitzias.mk">
    
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
    <!-- Redirect to home.php with JavaScript for better SEO -->
    <script>
        // Immediate redirect to home.php
        window.location.replace('home.php');
    </script>
    
    <!-- Fallback redirect for users with JavaScript disabled -->
    <noscript>
        <meta http-equiv="refresh" content="0; url=home.php">
    </noscript>
    
    <!-- Content for search engines this is not visible to the user-->
    <div style="display: none;">
        <h1><?php echo t('hero_title'); ?> - Професионална Обработка на Мермер и Гранит</h1>
        <p><?php echo t('hero_description'); ?> Професионална обработка на мермер и гранит за кујнски рабови, скулптури, споменици и облоги во Скопје, Македонија.</p>
        <p>ZiasMermerGranit е водечка компанија за обработка на мермер и гранит во Македонија. Нашите услуги вклучуваат кујнски рабови, скулптури, споменици, облоги, подови, фасади и декоративни елементи.</p>
        <p>Контакт: 078 654 050 | Скопје, Македонија</p>
    </div>
</body>
</html>
