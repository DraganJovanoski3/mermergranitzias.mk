<?php
require_once 'config.php';
require_once '../data/products.php';

requireAdminLogin();

$product_id = $_GET['id'] ?? '';

if (!$product_id) {
    header('Location: index.php');
    exit();
}

$product = getProductById($product_id);

if (!$product) {
    header('Location: index.php');
    exit();
}

$message = '';
$message_type = '';

if ($_POST && isset($_POST['confirm_delete'])) {
    try {
        // Read current products file
        $products_file = '../data/products.php';
        $content = file_get_contents($products_file);
        
        // Find and remove the product
        $pattern = '/\[\s*\'id\'\s*=>\s*\'' . preg_quote($product_id, '/') . '\'.*?\],?\s*/s';
        
        $new_content = preg_replace($pattern, '', $content);
        
        if ($new_content === $content) {
            throw new Exception('Could not find product to delete.');
        }
        
        // Write back to file
        if (file_put_contents($products_file, $new_content)) {
            $message = 'Product deleted successfully!';
            $message_type = 'success';
            
            // Redirect to dashboard after 2 seconds
            header("refresh:2;url=index.php");
        } else {
            throw new Exception('Failed to delete product from file.');
        }
        
    } catch (Exception $e) {
        $message = $e->getMessage();
        $message_type = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product - Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="admin-sidebar">
            <div class="logo">
                <h2><i class="fas fa-gem"></i> Admin Panel</h2>
            </div>
            <ul class="admin-nav">
                <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="products.php"><i class="fas fa-box"></i> Products</a></li>
                <li><a href="add-product.php"><i class="fas fa-plus"></i> Add Product</a></li>
                <li><a href="categories.php"><i class="fas fa-tags"></i> Categories</a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="admin-main">
            <div class="admin-header">
                <h1>Delete Product</h1>
                <div class="user-info">
                    <span>Welcome, Admin</span>
                    <a href="logout.php" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>

            <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>">
                <i class="fas fa-<?php echo $message_type === 'success' ? 'check-circle' : 'exclamation-triangle'; ?>"></i>
                <?php echo htmlspecialchars($message); ?>
            </div>
            <?php endif; ?>

            <div class="content-card">
                <div class="content-header">
                    <h2>Confirm Product Deletion</h2>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>

                <?php if (!$message): ?>
                <div style="text-align: center; padding: 40px;">
                    <div style="color: #dc3545; font-size: 4rem; margin-bottom: 20px;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 style="color: #dc3545; margin-bottom: 20px;">Are you sure you want to delete this product?</h3>
                    
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin: 30px 0; text-align: left; max-width: 500px; margin-left: auto; margin-right: auto;">
                        <h4><?php echo htmlspecialchars($product['name']); ?></h4>
                        <p><strong>ID:</strong> <?php echo htmlspecialchars($product['id']); ?></p>
                        <p><strong>Category:</strong> <?php echo ucfirst(htmlspecialchars($product['category'])); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars(substr($product['description'], 0, 100)); ?><?php if (strlen($product['description']) > 100): ?>...<?php endif; ?></p>
                        
                        <?php if (isset($product['main_image']) && $product['main_image']): ?>
                        <div style="margin-top: 15px;">
                            <img src="../images/<?php echo htmlspecialchars($product['main_image']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div style="color: #dc3545; font-weight: bold; margin-bottom: 30px;">
                        <i class="fas fa-warning"></i> This action cannot be undone!
                    </div>
                    
                    <form method="POST" style="display: inline;">
                        <button type="submit" name="confirm_delete" class="btn btn-danger" style="margin-right: 10px;">
                            <i class="fas fa-trash"></i> Yes, Delete Product
                        </button>
                    </form>
                    
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
                <?php else: ?>
                <div style="text-align: center; padding: 40px;">
                    <div style="color: #28a745; font-size: 4rem; margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 style="color: #28a745;">Product deleted successfully!</h3>
                    <p>Redirecting to dashboard...</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>

