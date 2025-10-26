<?php
require_once 'config.php';

// Product CRUD functions
function getAllProductsFromDB($language = 'mk') {
    $pdo = getDBConnection();
    
    $sql = "SELECT p.*, pt.name, pt.description, pt.long_description, pt.features, pt.applications, pt.images
            FROM products p
            LEFT JOIN product_translations pt ON p.id = pt.product_id AND pt.language = ?
            ORDER BY p.created_at DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$language]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Decode JSON fields
    foreach ($products as &$product) {
        $product['features'] = json_decode($product['features'] ?? '[]', true);
        $product['applications'] = json_decode($product['applications'] ?? '[]', true);
        $product['images'] = json_decode($product['images'] ?? '[]', true);
    }
    
    return $products;
}

function getProductByIdFromDB($id, $language = 'mk') {
    $pdo = getDBConnection();
    
    $sql = "SELECT p.*, pt.name, pt.description, pt.long_description, pt.features, pt.applications, pt.images
            FROM products p
            LEFT JOIN product_translations pt ON p.id = pt.product_id AND pt.language = ?
            WHERE p.product_id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$language, $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        $product['features'] = json_decode($product['features'] ?? '[]', true);
        $product['applications'] = json_decode($product['applications'] ?? '[]', true);
        $product['images'] = json_decode($product['images'] ?? '[]', true);
    }
    
    return $product;
}

function getProductBySlugFromDB($slug, $language = 'mk') {
    $pdo = getDBConnection();
    
    $sql = "SELECT p.*, pt.name, pt.description, pt.long_description, pt.features, pt.applications, pt.images
            FROM products p
            LEFT JOIN product_translations pt ON p.id = pt.product_id AND pt.language = ?
            WHERE p.product_id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$language, $slug]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        $product['features'] = json_decode($product['features'] ?? '[]', true);
        $product['applications'] = json_decode($product['applications'] ?? '[]', true);
        $product['images'] = json_decode($product['images'] ?? '[]', true);
    }
    
    return $product;
}

function getProductsByCategoryFromDB($category, $language = 'mk') {
    $pdo = getDBConnection();
    
    $sql = "SELECT p.*, pt.name, pt.description, pt.long_description, pt.features, pt.applications, pt.images
            FROM products p
            LEFT JOIN product_translations pt ON p.id = pt.product_id AND pt.language = ?
            WHERE p.category = ?
            ORDER BY p.created_at DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$language, $category]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Decode JSON fields
    foreach ($products as &$product) {
        $product['features'] = json_decode($product['features'] ?? '[]', true);
        $product['applications'] = json_decode($product['applications'] ?? '[]', true);
        $product['images'] = json_decode($product['images'] ?? '[]', true);
    }
    
    return $products;
}

function getAllCategoriesFromDB($language = 'mk') {
    $pdo = getDBConnection();
    
    $sql = "SELECT c.category_key, ct.name, ct.description
            FROM categories c
            LEFT JOIN category_translations ct ON c.id = ct.category_id AND ct.language = ?
            ORDER BY c.category_key";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$language]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addProduct($product_data) {
    $pdo = getDBConnection();
    
    try {
        $pdo->beginTransaction();
        
        // Insert main product
        $sql = "INSERT INTO products (product_id, category, main_image, availability, thickness, finish) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $product_data['product_id'],
            $product_data['category'],
            $product_data['main_image'],
            $product_data['availability'],
            $product_data['thickness'],
            $product_data['finish']
        ]);
        
        $product_id = $pdo->lastInsertId();
        
        // Insert translations for each language
        foreach (SUPPORTED_LANGUAGES as $lang) {
            if (isset($product_data['translations'][$lang])) {
                $translation = $product_data['translations'][$lang];
                $sql = "INSERT INTO product_translations 
                        (product_id, language, name, description, long_description, features, applications, images) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $product_id,
                    $lang,
                    $translation['name'],
                    $translation['description'],
                    $translation['long_description'],
                    json_encode($translation['features']),
                    json_encode($translation['applications']),
                    json_encode($translation['images'])
                ]);
            }
        }
        
        $pdo->commit();
        return $product_id;
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function updateProduct($product_id, $product_data) {
    $pdo = getDBConnection();
    
    try {
        $pdo->beginTransaction();
        
        // Update main product
        $sql = "UPDATE products SET category = ?, main_image = ?, availability = ?, thickness = ?, finish = ? 
                WHERE product_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $product_data['category'],
            $product_data['main_image'],
            $product_data['availability'],
            $product_data['thickness'],
            $product_data['finish'],
            $product_id
        ]);
        
        // Get the internal product ID
        $stmt = $pdo->prepare("SELECT id FROM products WHERE product_id = ?");
        $stmt->execute([$product_id]);
        $internal_id = $stmt->fetchColumn();
        
        // Update translations for each language
        foreach (SUPPORTED_LANGUAGES as $lang) {
            if (isset($product_data['translations'][$lang])) {
                $translation = $product_data['translations'][$lang];
                $sql = "INSERT INTO product_translations 
                        (product_id, language, name, description, long_description, features, applications, images) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                        ON DUPLICATE KEY UPDATE 
                        name = VALUES(name),
                        description = VALUES(description),
                        long_description = VALUES(long_description),
                        features = VALUES(features),
                        applications = VALUES(applications),
                        images = VALUES(images)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $internal_id,
                    $lang,
                    $translation['name'],
                    $translation['description'],
                    $translation['long_description'],
                    json_encode($translation['features']),
                    json_encode($translation['applications']),
                    json_encode($translation['images'])
                ]);
            }
        }
        
        $pdo->commit();
        return true;
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
}

function deleteProduct($product_id) {
    $pdo = getDBConnection();
    
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$product_id]);
}

function searchProductsFromDB($search_term, $language = 'mk') {
    $pdo = getDBConnection();
    
    $sql = "SELECT p.*, pt.name, pt.description, pt.long_description, pt.features, pt.applications, pt.images
            FROM products p
            LEFT JOIN product_translations pt ON p.id = pt.product_id AND pt.language = ?
            WHERE pt.name LIKE ? OR pt.description LIKE ? OR pt.long_description LIKE ?
            ORDER BY p.created_at DESC";
    
    $stmt = $pdo->prepare($sql);
    $search = "%$search_term%";
    $stmt->execute([$language, $search, $search, $search]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Decode JSON fields
    foreach ($products as &$product) {
        $product['features'] = json_decode($product['features'] ?? '[]', true);
        $product['applications'] = json_decode($product['applications'] ?? '[]', true);
        $product['images'] = json_decode($product['images'] ?? '[]', true);
    }
    
    return $products;
}

// Additional helper functions for compatibility
function getProductSlugFromDB($product) {
    // Generate slug from product ID or name
    if (isset($product['product_id'])) {
        return $product['product_id'];
    }
    if (isset($product['name'])) {
        return strtolower(str_replace([' ', 'š', 'č', 'ć', 'đ', 'ž'], ['-', 's', 'c', 'c', 'd', 'z'], $product['name']));
    }
    return '';
}

function isAdminLoggedInFromDB() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Helper function to generate product slug
function getProductSlug($product) {
    // Generate slug from product ID or name
    if (isset($product['product_id'])) {
        return $product['product_id'];
    }
    if (isset($product['name'])) {
        return strtolower(str_replace([' ', 'š', 'č', 'ć', 'đ', 'ž'], ['-', 's', 'c', 'c', 'd', 'z'], $product['name']));
    }
    return '';
}
