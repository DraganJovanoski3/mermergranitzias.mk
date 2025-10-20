<?php
// Debug file to check products loading
require_once 'data/products.php';

echo "<h2>All Products:</h2>";
echo "<p>Total products: " . count($products) . "</p>";

echo "<h3>Marble Products:</h3>";
$marbleProducts = array_filter($products, function($product) {
    return $product['category'] === 'marble';
});

echo "<p>Marble products count: " . count($marbleProducts) . "</p>";

foreach ($marbleProducts as $product) {
    echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>";
    echo "<strong>ID:</strong> " . $product['id'] . "<br>";
    echo "<strong>Name:</strong> " . $product['name'] . "<br>";
    echo "<strong>Category:</strong> " . $product['category'] . "<br>";
    echo "<strong>Description:</strong> " . $product['description'] . "<br>";
    echo "</div>";
}

echo "<h3>Granite Products:</h3>";
$graniteProducts = array_filter($products, function($product) {
    return $product['category'] === 'granite';
});

echo "<p>Granite products count: " . count($graniteProducts) . "</p>";

echo "<h3>All Categories:</h3>";
$categories = [];
foreach ($products as $product) {
    if (!in_array($product['category'], $categories)) {
        $categories[] = $product['category'];
    }
}

echo "<p>Available categories: " . implode(', ', $categories) . "</p>";
?>

