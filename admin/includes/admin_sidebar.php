<?php
// Admin Sidebar Component
// Usage: include 'includes/admin_sidebar.php';

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!-- Sidebar -->
<div class="admin-sidebar">
    <div class="logo">
        <img src="../images/zias-logo.png" alt="Zias Logo" class="logo-img">
        <h2>Admin Panel</h2>
    </div>
    <ul class="admin-nav">
        <li><a href="index.php" class="<?php echo ($current_page == 'index') ? 'active' : ''; ?>">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a></li>
        <li><a href="products.php" class="<?php echo ($current_page == 'products') ? 'active' : ''; ?>">
            <i class="fas fa-box"></i> Products
        </a></li>
        <li><a href="add-product.php" class="<?php echo ($current_page == 'add-product') ? 'active' : ''; ?>">
            <i class="fas fa-plus"></i> Add Product
        </a></li>
        <li><a href="categories.php" class="<?php echo ($current_page == 'categories') ? 'active' : ''; ?>">
            <i class="fas fa-tags"></i> Categories
        </a></li>
        <li><a href="settings.php" class="<?php echo ($current_page == 'settings') ? 'active' : ''; ?>">
            <i class="fas fa-cog"></i> Settings
        </a></li>
        <li><a href="../index.php">
            <i class="fas fa-globe"></i> View Site
        </a></li>
        <li><a href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a></li>
    </ul>
</div>

