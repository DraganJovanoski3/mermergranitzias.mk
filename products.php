<?php
// Start session for language switching
session_start();

// Include the products data and translations
require_once 'data/products.php';
require_once 'includes/translations.php';

// Get current language
$current_lang = getCurrentLang();

// Get category filter from URL and 301 redirect legacy query to friendly URL
$category = isset($_GET['category']) ? $_GET['category'] : 'all';
if (!empty($_GET['legacyCategory'])) {
    $cat = $_GET['legacyCategory'];
    $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $location = $host . '/proizvodi/' . $cat;
    header('Location: ' . $location, true, 301);
    exit();
}
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    // Calculate the correct base path
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script_name = $_SERVER['SCRIPT_NAME'];
    
    // If we're accessing via friendly URL, we need to determine the base path
    if (strpos($_SERVER['REQUEST_URI'], '/proizvodi/') !== false) {
        // We're on a friendly URL, so the base should be the root
        $base_path = $protocol . '://' . $host . '/ziasmermergranit/';
    } else {
        // We're on a regular PHP file
        $base_path = $protocol . '://' . $host . dirname($script_name) . '/';
    }
    ?>
    <base href="<?php echo $base_path; ?>">
    <title><?php echo t('page_products'); ?> - <?php echo t('hero_title'); ?> | Мермер, Гранит, Скулптури | Скопје, Македонија</title>
    <meta name="description" content="<?php echo t('products_subtitle'); ?> - <?php echo t('hero_description'); ?> Откријте ги нашите мермерни и гранитни материјали, скулптури и споменици. Професионална обработка во Скопје, Македонија.">
    <meta name="keywords" content="мермер, гранит, кујнски рабови, скулптури, споменици, материјали, мермерни плочи, гранитни плочи, кујнски работни плочи, бањски шкафчиња, облоги, подови, фасади, скали, декоративни површини, Скопје, Македонија, ZiasMermerGranit, обработка на камен">
    <meta name="author" content="ZiasMermerGranit">
    <meta name="robots" content="index, follow">
    <meta name="language" content="<?php echo $current_lang; ?>">
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="Скопје">
    <meta name="geo.position" content="41.9981;21.4254">
    <meta name="ICBM" content="41.9981, 21.4254">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo t('page_products'); ?> - <?php echo t('hero_title'); ?> | Мермер, Гранит, Скулптури">
    <meta property="og:description" content="<?php echo t('products_subtitle'); ?> - <?php echo t('hero_description'); ?> Откријте ги нашите мермерни и гранитни материјали, скулптури и споменици.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mermergranitzias.mk/products.php">
    <meta property="og:site_name" content="ZiasMermerGranit">
    <meta property="og:locale" content="mk_MK">
    <meta property="og:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="ZiasMermerGranit - <?php echo t('page_products'); ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo t('page_products'); ?> - <?php echo t('hero_title'); ?> | Мермер, Гранит, Скулптури">
    <meta name="twitter:description" content="<?php echo t('products_subtitle'); ?> - <?php echo t('hero_description'); ?> Откријте ги нашите мермерни и гранитни материјали, скулптури и споменици.">
    <meta name="twitter:image" content="https://mermergranitzias.mk/images/zias-logo.png">
    
    <!-- Canonical URL -->
    <?php 
        $canonicalCategory = isset($_GET['category']) && $_GET['category'] ? '/' . urlencode($_GET['category']) : '';
    ?>
    <link rel="canonical" href="https://mermergranitzias.mk/proizvodi<?php echo $canonicalCategory; ?>">
    
    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "<?php echo t('page_products'); ?> - <?php echo t('hero_title'); ?>",
        "description": "<?php echo t('products_subtitle'); ?> - <?php echo t('hero_description'); ?>",
        "url": "https://mermergranitzias.mk/products.php",
        "mainEntity": {
            "@type": "ItemList",
            "name": "<?php echo t('products_title'); ?>",
            "description": "<?php echo t('products_subtitle'); ?>",
            "itemListElement": [
                {
                    "@type": "Product",
                    "name": "Мермерни Материјали",
                    "description": "Висококвалитетни мермерни плочи и материјали за различни намени",
                    "category": "Мермер",
                    "brand": {
                        "@type": "Brand",
                        "name": "ZiasMermerGranit"
                    },
                    "offers": {
                        "@type": "Offer",
                        "availability": "https://schema.org/InStock",
                        "priceCurrency": "MKD"
                    }
                },
                {
                    "@type": "Product",
                    "name": "Гранитни Материјали",
                    "description": "Трајни гранитни плочи и материјали за кујнски рабови и облоги",
                    "category": "Гранит",
                    "brand": {
                        "@type": "Brand",
                        "name": "ZiasMermerGranit"
                    },
                    "offers": {
                        "@type": "Offer",
                        "availability": "https://schema.org/InStock",
                        "priceCurrency": "MKD"
                    }
                },
                {
                    "@type": "Product",
                    "name": "Кујнски Рабови",
                    "description": "Професионални кујнски работни плочи од мермер и гранит",
                    "category": "Кујнски рабови",
                    "brand": {
                        "@type": "Brand",
                        "name": "ZiasMermerGranit"
                    },
                    "offers": {
                        "@type": "Offer",
                        "availability": "https://schema.org/InStock",
                        "priceCurrency": "MKD"
                    }
                },
                {
                    "@type": "Product",
                    "name": "Скулптури и Споменици",
                    "description": "Уметнички скулптури и трајни споменици од мермер и гранит",
                    "category": "Скулптури и Споменици",
                    "brand": {
                        "@type": "Brand",
                        "name": "ZiasMermerGranit"
                    },
                    "offers": {
                        "@type": "Offer",
                        "availability": "https://schema.org/InStock",
                        "priceCurrency": "MKD"
                    }
                }
            ]
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
                    "name": "<?php echo t('page_products'); ?>",
                    "item": "https://mermergranitzias.mk/products.php"
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
            <h1><?php echo t('products_title'); ?></h1>
            <p><?php echo t('products_subtitle'); ?></p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-page">
        <div class="container">
            <div class="category-filters">
                <button class="category-btn <?php echo ($category == 'all') ? 'active' : ''; ?>" data-category="all">
                    <i class="fas fa-th-large"></i>
                    <?php echo t('products_all'); ?>
                </button>
                <button class="category-btn <?php echo ($category == 'marble') ? 'active' : ''; ?>" data-category="marble">
                    <i class="fas fa-gem"></i>
                    <?php echo t('products_marble'); ?>
                </button>
                <button class="category-btn <?php echo ($category == 'granite') ? 'active' : ''; ?>" data-category="granite">
                    <i class="fas fa-cube"></i>
                    <?php echo t('products_granite'); ?>
                </button>
                <button class="category-btn <?php echo ($category == 'kitchen') ? 'active' : ''; ?>" data-category="kitchen">
                    <i class="fas fa-utensils"></i>
                    <?php echo t('products_kitchen'); ?>
                </button>
                <button class="category-btn <?php echo ($category == 'sculpture-tombstones') ? 'active' : ''; ?>" data-category="sculpture-tombstones">
                    <i class="fas fa-palette"></i>
                    <?php echo t('products_sculpture'); ?>
                </button>
            </div>

            <!-- Special galleries removed; all items are shown as products below -->

            <!-- Regular Product Grid for all categories -->
            <div class="products-grid" style="display: grid;">
                <?php
                // Server-side initial filtering for better UX and SEO
                if ($category === 'all') {
                    $displayProducts = getAllProducts();
                } else {
                    $displayProducts = getProductsByCategory($category);
                }

                foreach ($displayProducts as $product):
                ?>
                <div class="product-item" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                    <div class="product-image">
                        <?php if (isset($product['main_image']) && $product['main_image']): ?>
                            <img src="images/<?php echo htmlspecialchars($product['main_image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <?php else: ?>
                            <div class="placeholder-image">
                                <i class="fas fa-gem"></i>
                                <p><?php echo htmlspecialchars($product['name']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <?php $slug = function_exists('getProductSlug') ? getProductSlug($product) : $product['id']; ?>
                        <a href="proizvod/<?php echo htmlspecialchars($slug); ?>" class="btn btn-primary"><?php echo t('view_product'); ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
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

    <!-- Fallback script to show products if JavaScript fails -->
    <script>
        // Fallback: Show all products if JavaScript doesn't work
        setTimeout(() => {
            const products = document.querySelectorAll('.product-item');
            if (products.length > 0) {
                console.log('Fallback: Showing all products');
                products.forEach(product => {
                    product.style.display = 'block';
                    product.style.opacity = '1';
                });
            }
        }, 500);
    </script>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js?v=<?php echo time(); ?>"></script>
</body>
</html> 