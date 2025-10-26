<?php
// Admin CSS Component
// Usage: include 'includes/admin_css.php';
?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
<style>
    /* Backup CSS for admin sidebar */
    .admin-sidebar {
        width: 250px !important;
        background: #2c3e50 !important;
        color: white !important;
        padding: 20px 0 !important;
        position: fixed !important;
        height: 100vh !important;
        overflow-y: auto !important;
        left: 0 !important;
        top: 0 !important;
        z-index: 1000 !important;
    }
    
    .admin-sidebar .logo {
        text-align: center !important;
        padding: 20px !important;
        border-bottom: 1px solid #34495e !important;
        margin-bottom: 20px !important;
    }
    
    .admin-sidebar .logo h2 {
        color: white !important;
        font-size: 1.5rem !important;
        margin: 0 !important;
    }
    
    .admin-sidebar .logo h2 i {
        color: #3498db !important;
        margin-right: 10px !important;
    }
    
    .admin-nav {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    
    .admin-nav li {
        margin-bottom: 5px !important;
    }
    
    .admin-nav a {
        display: block !important;
        padding: 15px 20px !important;
        color: #bdc3c7 !important;
        text-decoration: none !important;
        transition: all 0.3s !important;
        border-left: 3px solid transparent !important;
    }
    
    .admin-nav a:hover,
    .admin-nav a.active {
        background: #34495e !important;
        color: white !important;
        border-left-color: #3498db !important;
    }
    
    .admin-nav a i {
        margin-right: 10px !important;
        width: 20px !important;
    }
    
    .admin-main {
        margin-left: 250px !important;
        padding: 20px !important;
        min-height: 100vh !important;
        background: #f5f5f5 !important;
    }
    
    .admin-header {
        background: white !important;
        padding: 20px !important;
        border-radius: 10px !important;
        margin-bottom: 20px !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }
    
    .user-info {
        display: flex !important;
        align-items: center !important;
        gap: 15px !important;
    }
    
    .logout-btn {
        background: #dc3545 !important;
        color: white !important;
        padding: 8px 16px !important;
        border-radius: 5px !important;
        text-decoration: none !important;
        transition: background 0.3s !important;
    }
    
    .logout-btn:hover {
        background: #c82333 !important;
    }
    
    .content-card {
        background: white !important;
        border-radius: 10px !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
        padding: 20px !important;
    }
    
    .form-group {
        margin-bottom: 20px !important;
    }
    
    .form-group label {
        display: block !important;
        margin-bottom: 5px !important;
        font-weight: 500 !important;
        color: #333 !important;
    }
    
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100% !important;
        padding: 10px !important;
        border: 1px solid #ddd !important;
        border-radius: 5px !important;
        font-size: 14px !important;
    }
    
    .form-group textarea {
        height: 100px !important;
        resize: vertical !important;
    }
    
    .btn {
        padding: 10px 20px !important;
        border: none !important;
        border-radius: 5px !important;
        cursor: pointer !important;
        text-decoration: none !important;
        display: inline-block !important;
        transition: all 0.3s !important;
    }
    
    .btn-primary {
        background: #667eea !important;
        color: white !important;
    }
    
    .btn-primary:hover {
        background: #5a6fd8 !important;
    }
    
    .btn-secondary {
        background: #6c757d !important;
        color: white !important;
    }
    
    .btn-secondary:hover {
        background: #5a6268 !important;
    }
    
    .btn-danger {
        background: #dc3545 !important;
        color: white !important;
    }
    
    .btn-danger:hover {
        background: #c82333 !important;
    }
    
    .btn-success {
        background: #28a745 !important;
        color: white !important;
    }
    
    .btn-success:hover {
        background: #218838 !important;
    }
</style>

