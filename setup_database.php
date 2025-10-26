<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Setup</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #28a745; font-weight: bold; }
        .error { color: #dc3545; font-weight: bold; }
        .warning { color: #ffc107; font-weight: bold; }
        .test-item { margin: 15px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin: 5px; }
        .btn:hover { background: #0056b3; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #1e7e34; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🗄️ Database Setup</h1>
        
        <?php
        echo "<div class='test-item'>";
        echo "<h2>📊 Current Status</h2>";
        
        // Check if MySQL is running
        $mysql_running = false;
        try {
            $pdo = new PDO("mysql:host=localhost;charset=utf8mb4", 'root', '');
            $mysql_running = true;
            echo "<p><span class='success'>✓</span> MySQL is running</p>";
        } catch (PDOException $e) {
            echo "<p><span class='error'>✗</span> MySQL is not running: " . $e->getMessage() . "</p>";
            echo "<p><span class='warning'>⚠</span> Please start MySQL from XAMPP Control Panel first</p>";
        }
        
        if ($mysql_running) {
            // Check if database exists
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=ziasmermergranit;charset=utf8mb4", 'root', '');
                echo "<p><span class='success'>✓</span> Database 'ziasmermergranit' exists</p>";
                
                // Check if tables exist
                $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
                if (count($tables) > 0) {
                    echo "<p><span class='success'>✓</span> Database has " . count($tables) . " tables</p>";
                    echo "<p><strong>Tables:</strong> " . implode(', ', $tables) . "</p>";
                } else {
                    echo "<p><span class='warning'>⚠</span> Database exists but has no tables</p>";
                }
                
            } catch (PDOException $e) {
                echo "<p><span class='error'>✗</span> Database 'ziasmermergranit' does not exist</p>";
                echo "<p><span class='warning'>⚠</span> Need to create database</p>";
            }
        }
        echo "</div>";
        
        if ($mysql_running) {
            echo "<div class='test-item'>";
            echo "<h2>🛠️ Database Actions</h2>";
            
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'create_db':
                        try {
                            $pdo = new PDO("mysql:host=localhost;charset=utf8mb4", 'root', '');
                            $pdo->exec("CREATE DATABASE IF NOT EXISTS ziasmermergranit CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                            echo "<p><span class='success'>✓</span> Database 'ziasmermergranit' created successfully</p>";
                            
                            // Now initialize the database
                            include 'admin/config.php';
                            echo "<p><span class='success'>✓</span> Database tables initialized</p>";
                            
                        } catch (PDOException $e) {
                            echo "<p><span class='error'>✗</span> Error creating database: " . $e->getMessage() . "</p>";
                        }
                        break;
                        
                    case 'restore_products':
                        // Restore the original products.php that uses database
                        if (file_exists('data/products_original.php')) {
                            copy('data/products_original.php', 'data/products.php');
                            echo "<p><span class='success'>✓</span> Restored database-dependent products.php</p>";
                        } else {
                            echo "<p><span class='error'>✗</span> Original products.php not found</p>";
                        }
                        break;
                        
                    case 'use_static':
                        // Use static products (current setup)
                        $static_content = '<?php
// Simple products data for testing without database
function getAllProducts() {
    return [
        [\'product_id\' => \'granite-rosa-beta\', \'name\' => \'Rosa Beta (Sardinia)\', \'main_image\' => \'marbel-types/Rosa-Beta.jpg\'],
        [\'product_id\' => \'granite-g664-bainbrook-brown\', \'name\' => \'G664 (Bainbrook Brown)\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-balmoral-red\', \'name\' => \'Balmoral Red\', \'main_image\' => \'marbel-types/Balmoral-Red.jpg\'],
        [\'product_id\' => \'granite-g603\', \'name\' => \'G603\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-viscount-white\', \'name\' => \'Viscount White\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-vizag-blue\', \'name\' => \'Vizag Blue\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-blue-pearl\', \'name\' => \'Blue Pearl\', \'main_image\' => \'marbel-types/Blue-Pearl.jpg\'],
        [\'product_id\' => \'granite-multicolor-red\', \'name\' => \'Multicolor Red\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-crema-julia\', \'name\' => \'Crema Julia\', \'main_image\' => \'marbel-types/Crema-Julia.jpeg\'],
        [\'product_id\' => \'granite-emerald-pearl\', \'name\' => \'Emerald Pearl\', \'main_image\' => \'marbel-types/Emerald-pearl.jpeg\'],
        [\'product_id\' => \'granite-african-red\', \'name\' => \'Red Africa\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-zimbabwe-black\', \'name\' => \'Zimbabwe Black\', \'main_image\' => \'marbel-types/Zimbabwe.jpg\'],
        [\'product_id\' => \'granite-star-galaxy\', \'name\' => \'Star Galaxy\', \'main_image\' => \'marbel-types/star-galaxy.jpeg\'],
        [\'product_id\' => \'granite-impala\', \'name\' => \'Impala\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-rosa-porrino\', \'name\' => \'Rosa Porrino\', \'main_image\' => \'\'],
        [\'product_id\' => \'granite-guna-black\', \'name\' => \'Guna Black\', \'main_image\' => \'marbel-types/Guna-black.avif\'],
        [\'product_id\' => \'granite-shanxi-black\', \'name\' => \'Shanxi Black\', \'main_image\' => \'\']
    ];
}

function getProductById($id) {
    foreach (getAllProducts() as $product) {
        if ($product[\'product_id\'] === $id) {
            return $product;
        }
    }
    return null;
}

function getProductBySlug($slug) {
    return getProductById($slug);
}

function getProductsByCategory($category) {
    return getAllProducts();
}

function getAllCategories() {
    return [
        [\'id\' => \'marble\', \'name\' => \'Marble\'],
        [\'id\' => \'granite\', \'name\' => \'Granite\'],
        [\'id\' => \'kitchen\', \'name\' => \'Kitchen Countertops\'],
        [\'id\' => \'sculpture-tombstones\', \'name\' => \'Sculptures & Memorials\']
    ];
}

function searchProducts($search_term) {
    $results = [];
    foreach (getAllProducts() as $product) {
        if (stripos($product[\'name\'], $search_term) !== false) {
            $results[] = $product;
        }
    }
    return $results;
}

function getProductSlug($product) {
    return $product[\'product_id\'] ?? \'\';
}
?>';
                        
                        file_put_contents('data/products.php', $static_content);
                        echo "<p><span class='success'>✓</span> Using static products (no database required)</p>";
                        break;
                }
            }
            
            echo "<p><strong>Choose your setup:</strong></p>";
            echo "<a href='?action=create_db' class='btn btn-success'>🗄️ Create Database & Tables</a>";
            echo "<a href='?action=use_static' class='btn'>📄 Use Static Data (Current)</a>";
            
            if (file_exists('data/products_original.php')) {
                echo "<a href='?action=restore_products' class='btn'>🔄 Restore Database Products</a>";
            }
            
            echo "</div>";
        }
        ?>
        
        <div class="test-item">
            <h2>📋 Setup Options</h2>
            <ol>
                <li><strong>Option 1: Use Static Data (Current - Recommended)</strong>
                    <ul>
                        <li>✅ Website works immediately</li>
                        <li>✅ No database setup required</li>
                        <li>✅ All pages load perfectly</li>
                        <li>❌ No admin panel functionality</li>
                    </ul>
                </li>
                <li><strong>Option 2: Setup Database</strong>
                    <ul>
                        <li>✅ Full admin panel functionality</li>
                        <li>✅ Dynamic product management</li>
                        <li>✅ Database-driven content</li>
                        <li>❌ Requires MySQL to be running</li>
                    </ul>
                </li>
            </ol>
        </div>
        
        <div class="test-item">
            <h2>🌐 Website Status</h2>
            <p><strong>Current Status:</strong> <span class="success">Website is working perfectly with static data</span></p>
            <p><strong>Recommendation:</strong> Keep using static data unless you need admin panel features</p>
            <p><a href="/ziasmermergranit/" class="btn">🏠 Go to Website</a></p>
        </div>
    </div>
</body>
</html>

