<?php
// Include database functions first
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Get admin username from session or use default
$admin_username = $_SESSION['admin_username'] ?? ADMIN_USERNAME;

// Handle password change
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validate inputs
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = 'All fields are required.';
    } elseif ($new_password !== $confirm_password) {
        $error_message = 'New passwords do not match.';
    } elseif (strlen($new_password) < 6) {
        $error_message = 'New password must be at least 6 characters long.';
    } else {
        try {
            $pdo = getDBConnection();
            
            // Get current admin user
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
            $stmt->execute([$admin_username]);
            $admin = $stmt->fetch();
            
            if (!$admin) {
                // If admin doesn't exist in database, create it with new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
                $stmt->execute([$admin_username, $hashed_password, 'admin@zias.com']);
                
                $success_message = 'Password set successfully!';
            } elseif (!password_verify($current_password, $admin['password'])) {
                $error_message = 'Current password is incorrect.';
            } else {
                // Update password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE admin_users SET password = ? WHERE username = ?");
                $stmt->execute([$hashed_password, $admin_username]);
                
                $success_message = 'Password changed successfully!';
            }
        } catch (Exception $e) {
            $error_message = 'Error changing password: ' . $e->getMessage();
        }
    }
}

// Get admin user info
$admin_info = null;
try {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT username, created_at FROM admin_users WHERE username = ?");
    $stmt->execute([$admin_username]);
    $admin_info = $stmt->fetch();
    
    // If admin not found in database, create a fallback info
    if (!$admin_info) {
        $admin_info = [
            'username' => $admin_username,
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
} catch (Exception $e) {
    // Create fallback admin info if database fails
    $admin_info = [
        'username' => $admin_username,
        'created_at' => date('Y-m-d H:i:s')
    ];
    if (empty($error_message)) {
        $error_message = 'Error loading admin information from database.';
    }
}
?>
<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Admin Panel</title>
    <?php include 'includes/admin_css.php'; ?>
</head>
<body>
    <div class="admin-container">
        <?php include 'includes/admin_sidebar.php'; ?>

        <?php
        $page_title = 'Settings';
        include 'includes/admin_header.php';
        ?>

        <div class="admin-content">
            <!-- Success/Error Messages -->
            <?php if ($success_message): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>

            <!-- Settings Header -->
            <div class="admin-section-header">
                <div class="section-title">
                    <h2><i class="fas fa-cog"></i> Settings</h2>
                    <p>Manage your admin account settings</p>
                </div>
            </div>

            <!-- Settings Cards -->
            <div class="settings-grid">
                <!-- Account Information -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3><i class="fas fa-user"></i> Account Information</h3>
                    </div>
                    <div class="card-content">
                        <div class="info-item">
                            <label>Username:</label>
                            <span><?php echo htmlspecialchars($admin_info['username'] ?? $admin_username); ?></span>
                        </div>
                        <div class="info-item">
                            <label>Account Created:</label>
                            <span><?php echo $admin_info ? date('M j, Y', strtotime($admin_info['created_at'])) : 'N/A'; ?></span>
                        </div>
                        <div class="info-item">
                            <label>Last Login:</label>
                            <span><?php echo isset($_SESSION['last_login']) ? date('M j, Y g:i A', $_SESSION['last_login']) : 'N/A'; ?></span>
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3><i class="fas fa-key"></i> Change Password</h3>
                    </div>
                    <div class="card-content">
                        <form method="POST" class="settings-form">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <div class="password-input-group">
                                    <input type="password" 
                                           id="current_password" 
                                           name="current_password" 
                                           class="form-control"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('current_password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <div class="password-input-group">
                                    <input type="password" 
                                           id="new_password" 
                                           name="new_password" 
                                           class="form-control"
                                           minlength="6"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('new_password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength-container">
                                    <div class="password-strength-bar">
                                        <div class="password-strength-fill" id="password-strength"></div>
                                    </div>
                                    <div class="password-strength-text" id="password-strength-text">Enter a password</div>
                                </div>
                                <small class="form-help">Password must be at least 6 characters long</small>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <div class="password-input-group">
                                    <input type="password" 
                                           id="confirm_password" 
                                           name="confirm_password" 
                                           class="form-control"
                                           minlength="6"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="change_password" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Change Password
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="clearForm()">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- System Information -->
                <div class="settings-card">
                    <div class="card-header">
                        <h3><i class="fas fa-info-circle"></i> System Information</h3>
                    </div>
                    <div class="card-content">
                        <div class="info-item">
                            <label>PHP Version:</label>
                            <span><?php echo PHP_VERSION; ?></span>
                        </div>
                        <div class="info-item">
                            <label>Server:</label>
                            <span><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></span>
                        </div>
                        <div class="info-item">
                            <label>Database:</label>
                            <span>MySQL/MariaDB</span>
                        </div>
                        <div class="info-item">
                            <label>Admin Panel Version:</label>
                            <span>1.0.0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function clearForm() {
            document.getElementById('current_password').value = '';
            document.getElementById('new_password').value = '';
            document.getElementById('confirm_password').value = '';
        }

        // Password strength indicator
        document.getElementById('new_password').addEventListener('input', function() {
            const password = this.value;
            const strength = getPasswordStrength(password);
            updatePasswordStrength(strength);
        });

        function getPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 6) strength++;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }

        function updatePasswordStrength(strength) {
            const strengthBar = document.getElementById('password-strength');
            const strengthText = document.getElementById('password-strength-text');
            
            if (!strengthBar || !strengthText) return;
            
            const strengthTexts = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
            const strengthColors = ['#e74c3c', '#e67e22', '#f39c12', '#f1c40f', '#2ecc71', '#27ae60'];
            
            strengthBar.style.width = (strength / 6 * 100) + '%';
            strengthBar.style.backgroundColor = strengthColors[strength - 1] || '#e74c3c';
            strengthText.textContent = strengthTexts[strength - 1] || 'Very Weak';
        }
    </script>
</body>
</html>
