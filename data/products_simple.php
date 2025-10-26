<?php
// Simple products data file without database dependency
// This provides basic product data for the website to function

// Simple product data array
$products_data = [
    'granite-rosa-beta' => [
        'id' => 'granite-rosa-beta',
        'name' => 'Rosa Beta (Sardinia)',
        'description' => 'High-quality granite with beautiful pink tones',
        'category' => 'granite',
        'main_image' => 'marbel-types/rosobeta.jpg',
        'images' => ['marbel-types/rosobeta.jpg'],
        'features' => ['Durable', 'Beautiful color', 'High quality'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Flooring']
    ],
    'granite-g664-bainbrook-brown' => [
        'id' => 'granite-g664-bainbrook-brown',
        'name' => 'G664 (Bainbrook Brown)',
        'description' => 'Classic brown granite perfect for any application',
        'category' => 'granite',
        'main_image' => 'marbel-types/g603-.jpeg',
        'images' => ['marbel-types/g603-.jpeg'],
        'features' => ['Classic design', 'Versatile', 'Durable'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Flooring']
    ],
    'granite-blue-pearl' => [
        'id' => 'granite-blue-pearl',
        'name' => 'Blue Pearl',
        'description' => 'Stunning blue granite with pearl-like finish',
        'category' => 'granite',
        'main_image' => 'marbel-types/Blue-Pearl.jpg',
        'images' => ['marbel-types/Blue-Pearl.jpg'],
        'features' => ['Unique color', 'Pearl finish', 'Luxury appearance'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Decorative elements']
    ],
    'granite-crema-julia' => [
        'id' => 'granite-crema-julia',
        'name' => 'Crema Julia',
        'description' => 'Elegant cream-colored granite',
        'category' => 'granite',
        'main_image' => 'marbel-types/Crema-Julia.jpeg',
        'images' => ['marbel-types/Crema-Julia.jpeg'],
        'features' => ['Elegant', 'Cream color', 'Versatile'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Flooring']
    ],
    'granite-emerald-pearl' => [
        'id' => 'granite-emerald-pearl',
        'name' => 'Emerald Pearl',
        'description' => 'Beautiful green granite with pearl finish',
        'category' => 'granite',
        'main_image' => 'marbel-types/Emerald-pearl.jpeg',
        'images' => ['marbel-types/Emerald-pearl.jpeg'],
        'features' => ['Green color', 'Pearl finish', 'Unique'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Decorative elements']
    ],
    'granite-star-galaxy' => [
        'id' => 'granite-star-galaxy',
        'name' => 'Star Galaxy',
        'description' => 'Dark granite with star-like patterns',
        'category' => 'granite',
        'main_image' => 'marbel-types/star-galaxy.jpeg',
        'images' => ['marbel-types/star-galaxy.jpeg'],
        'features' => ['Dark color', 'Star patterns', 'Luxury appearance'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Decorative elements']
    ],
    'granite-zimbabwe-black' => [
        'id' => 'granite-zimbabwe-black',
        'name' => 'Zimbabwe Black',
        'description' => 'Premium black granite from Zimbabwe',
        'category' => 'granite',
        'main_image' => 'marbel-types/Zimbabwe.jpg',
        'images' => ['marbel-types/Zimbabwe.jpg'],
        'features' => ['Premium quality', 'Black color', 'Luxury'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Monuments']
    ],
    'granite-guna-black' => [
        'id' => 'granite-guna-black',
        'name' => 'Guna Black',
        'description' => 'Classic black granite',
        'category' => 'granite',
        'main_image' => 'marbel-types/Guna-black.avif',
        'images' => ['marbel-types/Guna-black.avif'],
        'features' => ['Classic black', 'Versatile', 'Durable'],
        'applications' => ['Kitchen countertops', 'Bathroom vanities', 'Monuments']
    ]
];

// Simple functions that work without database
function getAllProducts() {
    global $products_data;
    return array_values($products_data);
}

function getProductById($id) {
    global $products_data;
    return isset($products_data[$id]) ? $products_data[$id] : null;
}

function getProductBySlug($slug) {
    return getProductById($slug);
}

function getProductsByCategory($category) {
    global $products_data;
    $filtered = [];
    foreach ($products_data as $product) {
        if ($product['category'] === $category) {
            $filtered[] = $product;
        }
    }
    return $filtered;
}

function getAllCategories() {
    return ['granite', 'marble', 'kitchen', 'sculpture-tombstones'];
}

function searchProducts($search_term) {
    global $products_data;
    $results = [];
    $search_lower = strtolower($search_term);
    
    foreach ($products_data as $product) {
        if (strpos(strtolower($product['name']), $search_lower) !== false ||
            strpos(strtolower($product['description']), $search_lower) !== false) {
            $results[] = $product;
        }
    }
    return $results;
}

function getProductSlug($product) {
    if (isset($product['id'])) {
        return $product['id'];
    }
    if (isset($product['name'])) {
        return strtolower(str_replace([' ', 'š', 'č', 'ć', 'đ', 'ž'], ['-', 's', 'c', 'c', 'd', 'z'], $product['name']));
    }
    return 'unknown';
}

function getProductMainImage($product) {
    if (isset($product['main_image'])) {
        return $product['main_image'];
    }
    if (isset($product['images']) && is_array($product['images']) && !empty($product['images'])) {
        return $product['images'][0];
    }
    return 'stock-granite.jpg';
}

function getProductImages($product) {
    if (isset($product['images']) && is_array($product['images'])) {
        return $product['images'];
    }
    if (isset($product['main_image'])) {
        return [$product['main_image']];
    }
    return ['stock-granite.jpg'];
}
?>

