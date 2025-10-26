<?php
require_once 'config.php';
require_once 'database_functions.php';

requireAdminLogin();

// Get current language
$current_lang = $_GET['lang'] ?? 'mk';

// Get all products
$products = getAllProductsFromDB($current_lang);
$categories = getAllCategoriesFromDB($current_lang);

// Handle search and filter
$search = $_GET['search'] ?? '';
$category_filter = $_GET['category'] ?? 'all';

// Filter products
$filtered_products = $products;
if ($search) {
    $filtered_products = searchProductsFromDB($search, $current_lang);
}

if ($category_filter !== 'all') {
    $filtered_products = array_filter($filtered_products, function($product) use ($category_filter) {
        return $product['category'] === $category_filter;
    });
}

// Pagination
$per_page = 10;
$current_page = $_GET['page'] ?? 1;
$total_products = count($filtered_products);
$total_pages = ceil($total_products / $per_page);
$offset = ($current_page - 1) * $per_page;
$paginated_products = array_slice($filtered_products, $offset, $per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ZiasMermerGranit</title>
    <?php include 'includes/admin_css.php'; ?>
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/admin_sidebar.php'; ?>

        <?php 
        $page_title = 'Product Management Dashboard';
        include 'includes/admin_header.php'; 
        ?>

            <!-- Statistics Cards -->
            <div class="content-card">
                <div class="content-header">
                    <h2>Statistics</h2>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                    <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 10px;">
                        <h3 style="color: #667eea; font-size: 2rem; margin-bottom: 10px;"><?php echo count($products); ?></h3>
                        <p>Total Products</p>
                    </div>
                    <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 10px;">
                        <h3 style="color: #28a745; font-size: 2rem; margin-bottom: 10px;"><?php echo count($categories); ?></h3>
                        <p>Categories</p>
                    </div>
                    <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 10px;">
                        <h3 style="color: #ffc107; font-size: 2rem; margin-bottom: 10px;"><?php echo count(array_filter($products, function($p) { return $p['category'] === 'marble'; })); ?></h3>
                        <p>Marble Products</p>
                    </div>
                    <div style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 10px;">
                        <h3 style="color: #dc3545; font-size: 2rem; margin-bottom: 10px;"><?php echo count(array_filter($products, function($p) { return $p['category'] === 'granite'; })); ?></h3>
                        <p>Granite Products</p>
                    </div>
                </div>
            </div>

            <!-- Products List -->
            <div class="content-card">
                <div class="content-header">
                    <h2>Products Management</h2>
                    <a href="add-product.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>

                <!-- Search and Filter -->
                <form method="GET" class="search-filter">
                    <input type="text" name="search" placeholder="Search products..." 
                           value="<?php echo htmlspecialchars($search); ?>">
                    <select name="category">
                        <option value="all">All Categories</option>
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat); ?>" 
                                <?php echo $category_filter === $cat ? 'selected' : ''; ?>>
                            <?php echo ucfirst(htmlspecialchars($cat)); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </form>

                <!-- Products Table -->
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Availability</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($paginated_products)): ?>
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px; color: #666;">
                                    <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
                                    No products found
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($paginated_products as $product): ?>
                            <tr>
                                <td>
                                    <?php if (isset($product['main_image']) && $product['main_image']): ?>
                                    <img src="../images/<?php echo htmlspecialchars($product['main_image']); ?>" 
                                         alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-image" style="color: #ccc;"></i>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                    <br><small style="color: #666;">ID: <?php echo htmlspecialchars($product['id']); ?></small>
                                </td>
                                <td>
                                    <span style="background: #e9ecef; padding: 4px 8px; border-radius: 15px; font-size: 12px;">
                                        <?php echo ucfirst(htmlspecialchars($product['category'])); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars(substr($product['description'], 0, 100)); ?>
                                    <?php if (strlen($product['description']) > 100): ?>...<?php endif; ?>
                                </td>
                                <td>
                                    <span style="color: <?php echo $product['availability'] === 'Достапен' ? '#28a745' : '#ffc107'; ?>;">
                                        <?php echo htmlspecialchars($product['availability']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 5px;">
                                        <a href="edit-product.php?id=<?php echo htmlspecialchars($product['id']); ?>" 
                                           class="btn btn-small btn-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="../product.php?id=<?php echo htmlspecialchars($product['id']); ?>" 
                                           class="btn btn-small btn-secondary" title="View" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="delete-product.php?id=<?php echo htmlspecialchars($product['id']); ?>" 
                                           class="btn btn-small btn-danger" title="Delete" 
                                           onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <div class="pagination">
                    <?php if ($current_page > 1): ?>
                    <a href="?page=<?php echo $current_page - 1; ?>&search=<?php echo urlencode($search); ?>&category=<?php echo urlencode($category_filter); ?>">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php if ($i == $current_page): ?>
                    <span class="current"><?php echo $i; ?></span>
                    <?php else: ?>
                    <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&category=<?php echo urlencode($category_filter); ?>">
                        <?php echo $i; ?>
                    </a>
                    <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?php echo $current_page + 1; ?>&search=<?php echo urlencode($search); ?>&category=<?php echo urlencode($category_filter); ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
