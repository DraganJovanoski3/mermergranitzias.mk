<?php
// Start session for language switching
session_start();

// Include the products data and translations
require_once 'data/products.php';
require_once 'includes/translations.php';

// Accept either id or slug
$product_id = isset($_GET['id']) ? $_GET['id'] : '';
$product_slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Get product data
$product = null;
if ($product_slug) {
    $product = getProductBySlug($product_slug);
}
if (!$product && $product_id) {
    $product = getProductById($product_id);
}

// If product found and accessed via id (not slug), redirect permanently to canonical friendly URL
if ($product && !$product_slug && $product_id) {
    $slug = getProductSlug($product);
    $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    $location = $host . '/proizvod/' . $slug;
    header('Location: ' . $location, true, 301);
    exit();
}

// If product not found, redirect to products page
if (!$product) {
    header('Location: products.php');
    exit();
}

// Set page title and meta description
// Helper to map category to human-readable label
function getCategoryLabel($category) {
    switch ($category) {
        case 'marble':
            return 'Мермер';
        case 'granite':
            return 'Гранит';
        case 'kitchen':
            return 'Кујнски рабови';
        case 'bathroom':
            return 'Бања';
        case 'floor':
            return 'Подови';
        case 'sculpture-tombstones':
            return 'Скулптури и Споменици';
        default:
            return 'Производ';
    }
}

$page_title = $product['name'] . ' - ' . getCategoryLabel($product['category']);
$meta_description = $product['description'];
?>
<!DOCTYPE html>
<html lang="<?php echo getCurrentLang(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?> | ZiasMermerGranit</title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?> - <?php echo t('nav_products'); ?>: <?php echo getCategoryLabel($product['category']); ?>.">
    <meta name="keywords" content="<?php echo htmlspecialchars($product['name']); ?>, <?php echo getCategoryLabel($product['category']); ?>, <?php echo t('nav_products'); ?>, Zias Mermer Granit">
    <meta name="author" content="ZiasMermerGranit">
    <meta name="robots" content="index, follow">
    <meta name="language" content="mk">
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="Скопје">
    <meta name="geo.position" content="41.9981;21.4254">
    <meta name="ICBM" content="41.9981, 21.4254">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?> | ZiasMermerGranit">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_description); ?> - <?php echo t('nav_products'); ?>: <?php echo getCategoryLabel($product['category']); ?>.">
    <meta property="og:type" content="product">
    <meta property="og:url" content="https://mermergranitzias.mk/product.php?id=<?php echo $product['id']; ?>">
    <meta property="og:site_name" content="ZiasMermerGranit">
    <meta property="og:locale" content="mk_MK">
    <meta property="og:image" content="https://mermergranitzias.mk/images/<?php echo $product['main_image']; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($product['name']); ?> - ZiasMermerGranit">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?> | ZiasMermerGranit">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta_description); ?> - Професионална обработка на <?php echo $product['category'] === 'marble' ? 'мермер' : 'гранит'; ?>.">
    <meta name="twitter:image" content="https://mermergranitzias.mk/images/<?php echo $product['main_image']; ?>">
    
    <!-- Canonical URL -->
    <?php $canonicalSlug = getProductSlug($product); ?>
    <link rel="canonical" href="https://mermergranitzias.mk/proizvod/<?php echo htmlspecialchars($canonicalSlug); ?>">
    <!-- Hreflang alternates -->
    <link rel="alternate" hreflang="mk" href="https://mermergranitzias.mk/proizvod/<?php echo htmlspecialchars($canonicalSlug); ?>?lang=mk" />
    <link rel="alternate" hreflang="en" href="https://mermergranitzias.mk/proizvod/<?php echo htmlspecialchars($canonicalSlug); ?>?lang=en" />
    <link rel="alternate" hreflang="sq" href="https://mermergranitzias.mk/proizvod/<?php echo htmlspecialchars($canonicalSlug); ?>?lang=sq" />
    
    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "<?php echo htmlspecialchars($product['name']); ?>",
        "description": "<?php echo htmlspecialchars($product['long_description']); ?>",
        "image": "https://mermergranitzias.mk/images/<?php echo $product['main_image']; ?>",
        "brand": {
            "@type": "Brand",
            "name": "ZiasMermerGranit"
        },
        "category": "<?php echo getCategoryLabel($product['category']); ?>",
        "offers": {
            "@type": "Offer",
            "availability": "https://schema.org/InStock",
            "priceCurrency": "MKD",
            "seller": {
                "@type": "LocalBusiness",
                "name": "ZiasMermerGranit",
                "url": "https://mermergranitzias.mk",
                "telephone": "+38978654050",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Скопје",
                    "addressCountry": "MK"
                }
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
                    "name": "Производи",
                    "item": "https://mermergranitzias.mk/products.php"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo htmlspecialchars($product['name']); ?>",
                    "item": "https://mermergranitzias.mk/product.php?id=<?php echo $product['id']; ?>"
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

    <!-- Product Header -->
    <section class="product-header">
        <div class="container">
            <nav class="breadcrumb">
                <a href="index.php">Почетна</a>
                <span class="separator">/</span>
                <a href="proizvodi">Производи</a>
                <span class="separator">/</span>
                <span class="current"><?php echo htmlspecialchars($product['name']); ?></span>
            </nav>
            <div class="product-title">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="product-category">
                    <?php echo getCategoryLabel($product['category']); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Product Content -->
    <section class="product-content">
        <div class="container">
            <div class="product-grid">
                <!-- Product Images -->
                <div class="product-images">
                    <div class="main-image">
                        <img src="images/<?php echo htmlspecialchars($product['main_image']); ?>" 
                             alt="<?php echo htmlspecialchars($product['name']); ?>"
                             id="main-product-image">
                    </div>
                    <?php $images = isset($product['images']) && is_array($product['images']) ? $product['images'] : []; ?>
                    <?php if (count($images) > 1): ?>
                    <div class="image-gallery">
                        <?php foreach ($images as $image): ?>
                        <div class="gallery-thumbnail">
                            <img src="images/<?php echo htmlspecialchars($image); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                                 onclick="changeMainImage(this.src)">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    <div class="product-description">
                        <h2>Опис</h2>
                        <p><?php echo htmlspecialchars($product['long_description']); ?></p>
                    </div>

                    <div class="product-specs">
                        <h2>Спецификации</h2>
                        <div class="specs-grid">
                            <?php if ($product['category'] === 'sculpture-tombstones'): ?>
                            <div class="spec-item">
                                <span class="spec-label">Материјал:</span>
                                <span class="spec-value">Мермер</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Достапност:</span>
                                <span class="spec-value">По нарачка</span>
                            </div>
                            <?php endif; ?>
                            <?php if ($product['category'] !== 'sculpture-tombstones'): ?>
                            <div class="spec-item">
                                <span class="spec-label">Достапност:</span>
                                <span class="spec-value"><?php echo htmlspecialchars($product['availability']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Дебелина:</span>
                                <span class="spec-value"><?php echo htmlspecialchars($product['thickness']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Завршна обработка:</span>
                                <span class="spec-value"><?php echo htmlspecialchars($product['finish']); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="product-features">
                        <h2>Карактеристики</h2>
                        <ul class="features-list">
                            <?php if ($product['category'] === 'sculpture-tombstones'): ?>
                            <li><i class="fas fa-check"></i> Изработено од природен мермер</li>
                            <?php endif; ?>
                            <?php foreach ($product['features'] as $feature): ?>
                            <li><i class="fas fa-check"></i> <?php echo htmlspecialchars($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="product-applications">
                        <h2>Примени</h2>
                        <ul class="applications-list">
                            <?php foreach ($product['applications'] as $application): ?>
                            <li><i class="fas fa-arrow-right"></i> <?php echo htmlspecialchars($application); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="product-actions">
                        <a href="contact.php" class="btn btn-primary">
                            <i class="fas fa-phone"></i> Побарај понуда
                        </a>
                        <a href="products.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Назад кон производите
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="related-products">
        <div class="container">
            <h2>Слични производи</h2>
            <div class="related-grid">
                <?php
                $related_products = getProductsByCategory($product['category']);
                $count = 0;
                foreach ($related_products as $related):
                    if ($related['id'] !== $product['id'] && $count < 3):
                        $count++;
                ?>
                <div class="related-item">
                    <div class="related-image">
                        <img src="images/<?php echo htmlspecialchars($related['main_image']); ?>" 
                             alt="<?php echo htmlspecialchars($related['name']); ?>">
                    </div>
                    <div class="related-info">
                        <h3><?php echo htmlspecialchars($related['name']); ?></h3>
                        <p><?php echo htmlspecialchars($related['description']); ?></p>
                        <a href="product.php?id=<?php echo htmlspecialchars($related['id']); ?>" class="btn btn-small">
                            Види детали
                        </a>
                    </div>
                </div>
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
    <script>
        // Function to change main product image
        function changeMainImage(src) {
            document.getElementById('main-product-image').src = src;
        }

        // Add click event to gallery thumbnails
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.gallery-thumbnail img');
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    // Remove active class from all thumbnails
                    thumbnails.forEach(t => t.parentElement.classList.remove('active'));
                    // Add active class to clicked thumbnail
                    this.parentElement.classList.add('active');
                });
            });
        });
    </script>
</body>
</html> 