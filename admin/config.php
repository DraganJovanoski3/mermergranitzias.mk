<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'ziasmermergranit');
define('DB_USER', 'root');
define('DB_PASS', '');

// Admin credentials
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin123');

// Supported languages
define('SUPPORTED_LANGUAGES', ['mk', 'en', 'sq']);

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection
function getDBConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Admin authentication
function requireAdminLogin() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: login.php');
        exit();
    }
}

// Login function
function adminLogin($username, $password) {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();
        
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            $_SESSION['last_login'] = time();
            return true;
        }
        
        // Fallback to hardcoded credentials for backward compatibility
        if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            $_SESSION['last_login'] = time();
            return true;
        }
        
        return false;
    } catch (Exception $e) {
        // Fallback to hardcoded credentials if database fails
        if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            $_SESSION['last_login'] = time();
            return true;
        }
        return false;
    }
}

// Logout function
function adminLogout() {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Initialize database tables
function initializeDatabase() {
    $pdo = getDBConnection();
    
    // Create products table
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_id VARCHAR(100) UNIQUE NOT NULL,
        category VARCHAR(50) NOT NULL,
        main_image VARCHAR(255),
        availability VARCHAR(100),
        thickness VARCHAR(100),
        finish VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    
    // Create product_translations table
    $sql = "CREATE TABLE IF NOT EXISTS product_translations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_id INT NOT NULL,
        language VARCHAR(5) NOT NULL,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        long_description TEXT,
        features JSON,
        applications JSON,
        images JSON,
        FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
        UNIQUE KEY unique_product_language (product_id, language)
    )";
    $pdo->exec($sql);
    
    // Create categories table
    $sql = "CREATE TABLE IF NOT EXISTS categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        category_key VARCHAR(50) UNIQUE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    
    // Create category_translations table
    $sql = "CREATE TABLE IF NOT EXISTS category_translations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        category_id INT NOT NULL,
        language VARCHAR(5) NOT NULL,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
        UNIQUE KEY unique_category_language (category_id, language)
    )";
    $pdo->exec($sql);
    
    // Create admin_users table
    $sql = "CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    
    // Create default admin user if it doesn't exist
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ?");
    $stmt->execute([ADMIN_USERNAME]);
    if ($stmt->fetchColumn() == 0) {
        $hashed_password = password_hash(ADMIN_PASSWORD, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([ADMIN_USERNAME, $hashed_password, 'admin@zias.com']);
    }
    
    // Insert default categories
    $categories = [
        'marble' => [
            'mk' => ['name' => 'Мермер', 'description' => 'Луксузен мермер за ентериер и екстериер'],
            'en' => ['name' => 'Marble', 'description' => 'Luxury marble for interior and exterior'],
            'sq' => ['name' => 'Mermer', 'description' => 'Mermer luksoz për brendësi dhe jashtësi']
        ],
        'granite' => [
            'mk' => ['name' => 'Гранит', 'description' => 'Издржлив гранит за екстериер и интериер'],
            'en' => ['name' => 'Granite', 'description' => 'Durable granite for exterior and interior'],
            'sq' => ['name' => 'Granit', 'description' => 'Granit i qëndrueshëm për jashtë dhe brendë']
        ]
    ];
    
    foreach ($categories as $category_key => $translations) {
        // Insert category
        $stmt = $pdo->prepare("INSERT IGNORE INTO categories (category_key) VALUES (?)");
        $stmt->execute([$category_key]);
        
        $category_id = $pdo->lastInsertId();
        if (!$category_id) {
            $stmt = $pdo->prepare("SELECT id FROM categories WHERE category_key = ?");
            $stmt->execute([$category_key]);
            $category_id = $stmt->fetchColumn();
        }
        
        // Insert translations
        foreach ($translations as $lang => $data) {
            $stmt = $pdo->prepare("INSERT IGNORE INTO category_translations (category_id, language, name, description) VALUES (?, ?, ?, ?)");
            $stmt->execute([$category_id, $lang, $data['name'], $data['description']]);
        }
    }
}

// Initialize database on first run
initializeDatabase();
?>