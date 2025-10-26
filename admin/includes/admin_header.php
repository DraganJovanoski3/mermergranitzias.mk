<?php
// Admin Header Component
// Usage: include 'includes/admin_header.php';

// Get page title from variable or default
$page_title = isset($page_title) ? $page_title : 'Admin Panel';
?>
<!-- Main Content -->
<div class="admin-main">
    <div class="admin-header">
        <h1><?php echo htmlspecialchars($page_title); ?></h1>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?></span>
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

