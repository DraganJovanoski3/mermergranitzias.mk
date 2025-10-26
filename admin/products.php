<?php
// Start session for admin authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Include database functions and translations
require_once 'database_functions.php';
if (file_exists('../includes/translations.php')) {
    require_once '../includes/translations.php';
}

// Get current language
$current_lang = function_exists('getCurrentLang') ? getCurrentLang() : 'mk';

// Helper function to get correct image path
function getImagePath($image_path) {
    if (empty($image_path)) {
        return 'images/placeholder.jpg';
    }
    
    if (strpos($image_path, 'uploads/') === 0 || strpos($image_path, 'images/') === 0) {
        return $image_path;
    }
    
    return 'images/' . $image_path;
}

// Handle product deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $product_id = $_GET['id'];
    try {
        $pdo = getDBConnection();
        
        // Delete product translations first
        $stmt = $pdo->prepare("DELETE FROM product_translations WHERE product_id = ?");
        $stmt->execute([$product_id]);
        
        // Delete product
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        
        $success_message = "Product deleted successfully!";
    } catch (Exception $e) {
        $error_message = "Error deleting product: " . $e->getMessage();
    }
}

// Handle search and filter parameters
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';

// Get all products from database
$all_products = getAllProductsFromDB($current_lang);

// Filter products based on search and category
$products = $all_products;

// Apply search filter
if (!empty($search_query)) {
    $products = array_filter($products, function($product) use ($search_query) {
        return stripos($product['name'], $search_query) !== false || 
               stripos($product['description'], $search_query) !== false ||
               stripos($product['product_id'], $search_query) !== false;
    });
}

// Apply category filter
if (!empty($category_filter)) {
    $products = array_filter($products, function($product) use ($category_filter) {
        return $product['category'] === $category_filter;
    });
}

// Get unique categories for filter dropdown
$categories = array_unique(array_column($all_products, 'category'));
sort($categories);
?>
<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management - Admin Panel</title>
    <?php include 'includes/admin_css.php'; ?>
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/admin_sidebar.php'; ?>

        <?php
        $page_title = 'Products Management';
        include 'includes/admin_header.php';
        ?>

        <div class="admin-content">
            <!-- Success/Error Messages -->
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>

            <!-- Products Management Header -->
            <div class="admin-section-header">
                <div class="section-title">
                    <h2><i class="fas fa-box"></i> Products Management</h2>
                    <p>Manage all products in your database</p>
                </div>
                <div class="section-actions">
                    <a href="add-product.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>
            </div>

            <!-- Products Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo count($products); ?></h3>
                        <p>Total Products</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo count(array_filter($products, function($p) { return $p['category'] === 'marble'; })); ?></h3>
                        <p>Marble Products</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo count(array_filter($products, function($p) { return $p['category'] === 'granite'; })); ?></h3>
                        <p>Granite Products</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo count(array_filter($products, function($p) { return $p['category'] === 'sculpture-tombstones'; })); ?></h3>
                        <p>Sculptures & Tombstones</p>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="admin-table-container">
                <div class="table-header">
                    <h3>All Products 
                        <?php if (!empty($search_query) || !empty($category_filter)): ?>
                            <span class="filter-indicator">
                                (<?php echo count($products); ?> of <?php echo count($all_products); ?>)
                            </span>
                        <?php endif; ?>
                    </h3>
                    <div class="table-actions">
                        <button class="btn btn-secondary" onclick="refreshTable()">
                            <i class="fas fa-sync"></i> Refresh
                        </button>
                    </div>
                </div>

                <!-- Search and Filter Controls -->
                <div class="search-filter-container">
                    <form method="GET" class="search-filter-form">
                        <div class="search-group">
                            <div class="search-input-group">
                                <i class="fas fa-search"></i>
                                <input type="text" 
                                       name="search" 
                                       placeholder="Search by name, description, or ID..." 
                                       value="<?php echo htmlspecialchars($search_query); ?>"
                                       class="search-input">
                            </div>
                        </div>
                        
                        <div class="filter-group">
                            <select name="category" class="filter-select">
                                <option value="">All Categories</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo htmlspecialchars($category); ?>" 
                                            <?php echo $category_filter === $category ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars(ucfirst(str_replace('-', ' ', $category))); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="filter-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Search
                            </button>
                            <?php if (!empty($search_query) || !empty($category_filter)): ?>
                                <a href="products.php" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Clear Filters
                                </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>

                <!-- Active Filters Display -->
                <?php if (!empty($search_query) || !empty($category_filter)): ?>
                    <div class="active-filters">
                        <span class="active-filters-label">Active Filters:</span>
                        <?php if (!empty($search_query)): ?>
                            <span class="filter-tag">
                                <i class="fas fa-search"></i>
                                Search: "<?php echo htmlspecialchars($search_query); ?>"
                                <a href="?<?php echo http_build_query(array_filter(['category' => $category_filter])); ?>" class="remove-filter">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($category_filter)): ?>
                            <span class="filter-tag">
                                <i class="fas fa-tag"></i>
                                Category: <?php echo htmlspecialchars(ucfirst(str_replace('-', ' ', $category_filter))); ?>
                                <a href="?<?php echo http_build_query(array_filter(['search' => $search_query])); ?>" class="remove-filter">
                                    <i class="fas fa-times"></i>
                                </a>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (empty($products)): ?>
                    <div class="empty-state">
                        <i class="fas fa-box-open"></i>
                        <?php if (!empty($search_query) || !empty($category_filter)): ?>
                            <h3>No Products Found</h3>
                            <p>No products match your search criteria. Try adjusting your filters.</p>
                            <a href="products.php" class="btn btn-primary">
                                <i class="fas fa-times"></i> Clear Filters
                            </a>
                        <?php else: ?>
                            <h3>No Products Found</h3>
                            <p>You haven't added any products yet. Start by adding your first product.</p>
                            <a href="add-product.php" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add First Product
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <?php if (isset($product['main_image']) && $product['main_image']): ?>
                                            <img src="../<?php echo getImagePath($product['main_image']); ?>" 
                                                 alt="<?php echo htmlspecialchars($product['name']); ?>"
                                                 class="product-thumbnail">
                                        <?php else: ?>
                                            <div class="no-image">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="product-name">
                                            <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                            <small>ID: <?php echo htmlspecialchars($product['product_id']); ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="category-badge category-<?php echo htmlspecialchars($product['category']); ?>">
                                            <?php echo htmlspecialchars(ucfirst($product['category'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="product-description">
                                            <?php echo htmlspecialchars(substr($product['description'], 0, 100)); ?>
                                            <?php if (strlen($product['description']) > 100): ?>...<?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <?php echo date('M j, Y', strtotime($product['created_at'])); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="edit-product.php?id=<?php echo htmlspecialchars($product['product_id']); ?>" 
                                               class="btn btn-sm btn-primary" title="Edit Product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="../proizvod/<?php echo getProductSlug($product); ?>" 
                                               class="btn btn-sm btn-secondary" title="View Product" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="?action=delete&id=<?php echo $product['id']; ?>" 
                                               class="btn btn-sm btn-danger" 
                                               title="Delete Product"
                                               onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function refreshTable() {
            location.reload();
        }

        // Auto-submit form on category change
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.querySelector('.filter-select');
            if (categorySelect) {
                categorySelect.addEventListener('change', function() {
                    this.form.submit();
                });
            }

            // Add enter key support for search
            const searchInput = document.querySelector('.search-input');
            if (searchInput) {
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        this.form.submit();
                    }
                });
            }

            // Clear search on escape key
            if (searchInput) {
                searchInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        this.value = '';
                        this.form.submit();
                    }
                });
            }
        });
    </script>
</body>
</html>