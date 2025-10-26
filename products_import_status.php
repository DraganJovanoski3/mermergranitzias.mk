<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'admin/config.php';
require_once 'admin/database_functions.php';

try {
    $pdo = getDBConnection();
    
    // Get product counts
    $total_products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
    $total_translations = $pdo->query("SELECT COUNT(*) FROM product_translations")->fetchColumn();
    
    // Get products by category
    $categories = $pdo->query("SELECT category, COUNT(*) as count FROM products GROUP BY category ORDER BY count DESC")->fetchAll(PDO::FETCH_ASSOC);
    
    // Get translations by language
    $languages = $pdo->query("SELECT language, COUNT(*) as count FROM product_translations GROUP BY language ORDER BY count DESC")->fetchAll(PDO::FETCH_ASSOC);
    
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products Database Status</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .container { max-width: 1000px; margin: 0 auto; background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px; backdrop-filter: blur(10px); }
        .success { color: #4CAF50; font-weight: bold; font-size: 1.2em; }
        .status-card { margin: 20px 0; padding: 20px; border: 2px solid rgba(255,255,255,0.3); border-radius: 10px; background: rgba(255,255,255,0.1); }
        .links { display: flex; flex-wrap: wrap; gap: 15px; margin: 20px 0; }
        .links a { display: inline-block; padding: 15px 25px; background: #4CAF50; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; transition: all 0.3s; }
        .links a:hover { background: #45a049; transform: translateY(-2px); }
        .admin-link { background: #FF9800; }
        .admin-link:hover { background: #F57C00; }
        h1 { text-align: center; margin-bottom: 30px; }
        .emoji { font-size: 1.5em; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.3); }
        th { background: rgba(255,255,255,0.2); font-weight: bold; }
        .number { font-weight: bold; color: #4CAF50; }
    </style>
</head>
<body>
    <div class="container">
        <h1><span class="emoji">📊</span> Products Database Status</h1>
        
        <?php if (isset($error)): ?>
        <div class="status-card">
            <h2><span class="emoji">❌</span> Database Error</h2>
            <p>Error: <?php echo htmlspecialchars($error); ?></p>
        </div>
        <?php else: ?>
        
        <div class="status-card">
            <h2><span class="emoji">✅</span> Database Status</h2>
            <p><strong>Total Products:</strong> <span class="number"><?php echo $total_products; ?></span></p>
            <p><strong>Total Translations:</strong> <span class="number"><?php echo $total_translations; ?></span></p>
            <p><strong>Languages Supported:</strong> Macedonian, English, Albanian</p>
        </div>
        
        <div class="status-card">
            <h2><span class="emoji">📂</span> Products by Category</h2>
            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Count</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars(ucfirst($category['category'])); ?></td>
                        <td class="number"><?php echo $category['count']; ?></td>
                        <td>
                            <?php
                            $descriptions = [
                                'marble' => 'Мермерни производи',
                                'granite' => 'Гранитни производи', 
                                'kitchen' => 'Кујнски производи',
                                'bathroom' => 'Бањски производи',
                                'floor' => 'Подни плочи',
                                'sculpture-tombstones' => 'Скулптури и споменици'
                            ];
                            echo $descriptions[$category['category']] ?? 'Други производи';
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="status-card">
            <h2><span class="emoji">🌐</span> Translations by Language</h2>
            <table>
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Count</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($languages as $lang): ?>
                    <tr>
                        <td><?php echo strtoupper($lang['language']); ?></td>
                        <td class="number"><?php echo $lang['count']; ?></td>
                        <td>
                            <?php
                            $lang_names = [
                                'mk' => 'Македонски',
                                'en' => 'English',
                                'sq' => 'Shqip'
                            ];
                            echo $lang_names[$lang['language']] ?? 'Unknown';
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="status-card">
            <h2><span class="emoji">🎯</span> Product Categories Available</h2>
            <ul>
                <li><strong>Marble Products:</strong> Carrara White, Statuario, Calacatta Gold, Emperador Dark, Botticino, Rosso Levanto</li>
                <li><strong>Granite Products:</strong> Rosa Beta, G664, Balmoral Red, G603, Viscon White, Vizag Blue, Blue Pearl, Multicolor, Crema Julia, Emerald Pearl, Red Africa, Zimbabwe Black, Star Galaxy, Impala, Rosa Porrino, Guna Black, Shanxi Black</li>
                <li><strong>Kitchen Products:</strong> Marble and Granite Countertops</li>
                <li><strong>Bathroom Products:</strong> Marble and Granite Vanities</li>
                <li><strong>Floor Products:</strong> Marble and Granite Floor Tiles</li>
                <li><strong>Sculptures & Tombstones:</strong> Various marble sculptures and tombstones</li>
            </ul>
        </div>
        
        <div class="status-card">
            <h2><span class="emoji">🚀</span> Next Steps</h2>
            <div class="links">
                <a href="admin/index.php" class="admin-link">🔧 Admin Panel</a>
                <a href="admin/products.php" class="admin-link">📦 Manage Products</a>
                <a href="products.php" class="admin-link">🛍️ View Products</a>
                <a href="index.php" class="admin-link">🏠 Home Page</a>
            </div>
        </div>
        
        <?php endif; ?>
        
        <div class="status-card">
            <h2><span class="emoji">✨</span> Features Available</h2>
            <ul>
                <li>✅ <strong>Multi-language Support:</strong> Macedonian, English, Albanian</li>
                <li>✅ <strong>Product Management:</strong> Add, edit, delete products</li>
                <li>✅ <strong>Category Filtering:</strong> Filter by marble, granite, kitchen, bathroom, etc.</li>
                <li>✅ <strong>Image Gallery:</strong> Multiple images per product</li>
                <li>✅ <strong>Product Features:</strong> Detailed features and applications</li>
                <li>✅ <strong>Admin Panel:</strong> Full administrative interface</li>
                <li>✅ <strong>Database Integration:</strong> All products stored in MySQL database</li>
            </ul>
        </div>
    </div>
</body>
</html>

