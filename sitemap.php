<?php
// Dynamic sitemap generator
// Suppress any output before XML declaration
ob_start();
header('Content-Type: application/xml; charset=UTF-8');

require_once __DIR__ . '/data/products.php';

$baseUrl = 'https://mermergranitzias.mk';
$now = date('Y-m-d');

function xmlEscape($str) {
    return htmlspecialchars($str, ENT_QUOTES | ENT_XML1, 'UTF-8');
}

$urls = [];

// Core pages
$urls[] = [ 'loc' => "$baseUrl/", 'changefreq' => 'weekly', 'priority' => '1.0' ];
$urls[] = [ 'loc' => "$baseUrl/home.php", 'changefreq' => 'weekly', 'priority' => '1.0' ];
$urls[] = [ 'loc' => "$baseUrl/proizvodi", 'changefreq' => 'weekly', 'priority' => '0.9' ];
$urls[] = [ 'loc' => "$baseUrl/contact.php", 'changefreq' => 'monthly', 'priority' => '0.8' ];
$urls[] = [ 'loc' => "$baseUrl/about.php", 'changefreq' => 'monthly', 'priority' => '0.7' ];
$urls[] = [ 'loc' => "$baseUrl/privacy.php", 'changefreq' => 'yearly', 'priority' => '0.5' ];
$urls[] = [ 'loc' => "$baseUrl/terms.php", 'changefreq' => 'yearly', 'priority' => '0.5' ];

// Categories present in data
$categories = getAllCategories();
foreach ($categories as $cat) {
    $urls[] = [
        'loc' => "$baseUrl/proizvodi/" . rawurlencode($cat),
        'changefreq' => 'weekly',
        'priority' => '0.8'
    ];
}

// Individual products via slug
require_once 'admin/database_functions.php';
$allProducts = getAllProductsFromDB('mk'); // Use Macedonian as default for sitemap
foreach ($allProducts as $product) {
    $slug = getProductSlug($product);
    $urls[] = [
        'loc' => "$baseUrl/proizvod/" . rawurlencode($slug),
        'changefreq' => 'monthly',
        'priority' => '0.7'
    ];
}

// Clean any output before XML declaration
ob_clean();
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $u): ?>
    <url>
        <loc><?php echo xmlEscape($u['loc']); ?></loc>
        <lastmod><?php echo $now; ?></lastmod>
        <changefreq><?php echo $u['changefreq']; ?></changefreq>
        <priority><?php echo $u['priority']; ?></priority>
    </url>
<?php endforeach; ?>
</urlset>
