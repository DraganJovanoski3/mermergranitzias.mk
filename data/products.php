<?php
// Products data file - now uses database
// This file will be included in other pages to access product data

$products = [];

// Marble Products
$products = array_merge($products, [
    // Empty array for now - products are in database
]);

// Function to get product by ID
function getProductById($id) {
    global $products;
    foreach ($products as $product) {
        if ($product['id'] === $id) {
            return $product;
        }
    }
    return null;
}

// Transliterate Macedonian Cyrillic to Macedonian Latin (basic approximation)
function mkTransliterateToLatin($text) {
    $map = [
        'А'=>'A','а'=>'a','Б'=>'B','б'=>'b','В'=>'V','в'=>'v','Г'=>'G','г'=>'g','Д'=>'D','д'=>'d',
        'Ѓ'=>'Gj','ѓ'=>'gj','Е'=>'E','е'=>'e','Ж'=>'Zh','ж'=>'zh','З'=>'Z','з'=>'z','Ѕ'=>'Dz','ѕ'=>'dz',
        'И'=>'I','и'=>'i','Ј'=>'J','ј'=>'j','К'=>'K','к'=>'k','Л'=>'L','л'=>'l','Љ'=>'Lj','љ'=>'lj',
        'М'=>'M','м'=>'m','Н'=>'N','н'=>'n','Њ'=>'Nj','њ'=>'nj','О'=>'O','о'=>'o','П'=>'P','п'=>'p',
        'Р'=>'R','р'=>'r','С'=>'S','с'=>'s','Т'=>'T','т'=>'t','Ќ'=>'Kj','ќ'=>'kj','У'=>'U','у'=>'u',
        'Ф'=>'F','ф'=>'f','Х'=>'H','х'=>'h','Ц'=>'C','ц'=>'c','Ч'=>'Ch','ч'=>'ch','Џ'=>'Dj','џ'=>'dj',
        'Ш'=>'Sh','ш'=>'sh'
    ];
    return strtr($text, $map);
}

// Build a slug for a product using Macedonian Latin
function getProductSlug($product) {
    $baseName = isset($product['name']) ? $product['name'] : $product['id'];
    $latin = mkTransliterateToLatin($baseName);
    $latin = strtolower($latin);
    // Replace specific terms to be consistent
    $latin = str_replace(['мермер', 'granit', 'granite', 'marble'], ['mermer', 'granit', 'granit', 'mermer'], $latin);
    // Normalize
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $latin);
    $slug = trim($slug, '-');
    // Ensure uniqueness by appending short id suffix
    if (!empty($product['id'])) {
        $suffix = substr(md5($product['id']), 0, 6);
        $slug .= '-' . $suffix;
    }
    return $slug;
}

// Resolve product by slug
function getProductBySlug($slug) {
    global $products;
    foreach ($products as $product) {
        if (getProductSlug($product) === $slug) {
            return $product;
        }
    }
    return null;
}

// Function to get products by category
function getProductsByCategory($category) {
    global $products;
    $filtered = [];
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $filtered[] = $product;
        }
    }
    return $filtered;
}

// Function to get all products
function getAllProducts() {
    global $products;
    return $products;
}

// Function to get all categories
function getAllCategories() {
    global $products;
    $categories = [];
    foreach ($products as $product) {
        if (!in_array($product['category'], $categories)) {
            $categories[] = $product['category'];
        }
    }
    return $categories;
}
?> 
