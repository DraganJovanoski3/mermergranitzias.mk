<?php
// Comprehensive email test for cPanel hosting
require_once 'email_config.php';

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>cPanel Email Test - ZiasMermerGranit</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .success { background: #d4edda; border-color: #c3e6cb; color: #155724; }
        .error { background: #f8d7da; border-color: #f5c6cb; color: #721c24; }
        .warning { background: #fff3cd; border-color: #ffeaa7; color: #856404; }
        .info { background: #d1ecf1; border-color: #bee5eb; color: #0c5460; }
        .test-form { background: #f8f9fa; padding: 15px; border-radius: 5px; }
        .test-form input, .test-form textarea { width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ddd; border-radius: 3px; }
        .test-form button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; }
        .test-form button:hover { background: #0056b3; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 3px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>cPanel Email Test - ZiasMermerGranit</h1>";

// Test 1: Server Information
echo "<div class='section info'>
    <h2>1. Server Information</h2>";
$server_info = getServerInfo();
foreach ($server_info as $key => $value) {
    $status = $value ? '✅' : '❌';
    echo "<p><strong>$key:</strong> $status $value</p>";
}
echo "</div>";

// Test 2: Email Configuration
echo "<div class='section info'>
    <h2>2. Email Configuration</h2>";
$config = getEmailConfig();
foreach ($config as $key => $value) {
    if ($key === 'smtp_password') {
        $value = $value ? '***SET***' : '***NOT SET***';
    }
    echo "<p><strong>$key:</strong> $value</p>";
}
echo "</div>";

// Test 3: Configuration Validation
echo "<div class='section " . (empty(validateEmailConfig()) ? 'success' : 'error') . "'>
    <h2>3. Configuration Validation</h2>";
$config_errors = validateEmailConfig();
if (empty($config_errors)) {
    echo "<p>✅ Email configuration is valid</p>";
} else {
    echo "<p>❌ Configuration errors found:</p><ul>";
    foreach ($config_errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}
echo "</div>";

// Test 4: Email Function Availability
echo "<div class='section " . (isEmailEnabled() ? 'success' : 'error') . "'>
    <h2>4. Email Function Availability</h2>";
if (isEmailEnabled()) {
    echo "<p>✅ Email functions are available</p>";
    echo "<p>✅ mail() function: " . (function_exists('mail') ? 'Available' : 'Not available') . "</p>";
    echo "<p>✅ fsockopen() function: " . (function_exists('fsockopen') ? 'Available' : 'Not available') . "</p>";
} else {
    echo "<p>❌ Email functions are not available</p>";
}
echo "</div>";

// Test 5: File Permissions
echo "<div class='section info'>
    <h2>5. File Permissions</h2>";
$log_file = getEmailConfig('log_file');
$log_writable = is_writable($log_file) || is_writable(dirname($log_file));
echo "<p><strong>Log file writable:</strong> " . ($log_writable ? '✅ Yes' : '❌ No') . " ($log_file)</p>";

$current_dir_writable = is_writable('.');
echo "<p><strong>Current directory writable:</strong> " . ($current_dir_writable ? '✅ Yes' : '❌ No') . "</p>";
echo "</div>";

// Test 6: Test Email Sending
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_email'])) {
    echo "<div class='section'>";
    echo "<h2>6. Test Email Results</h2>";
    
    $test_to = $_POST['test_to'];
    $test_subject = $_POST['test_subject'];
    $test_message = $_POST['test_message'];
    
    // Simple test email
    $headers = [
        'From: ' . getEmailConfig('from_email'),
        'Reply-To: ' . getEmailConfig('reply_to'),
        'Content-Type: text/plain; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    $mail_sent = mail($test_to, $test_subject, $test_message, implode("\r\n", $headers));
    
    if ($mail_sent) {
        echo "<div class='success'><p>✅ Test email sent successfully!</p></div>";
        
        // Log the test
        if (getEmailConfig('enable_logging')) {
            $log_entry = date('Y-m-d H:i:s') . " - TEST EMAIL sent to: {$test_to} - Subject: {$test_subject}\n";
            file_put_contents(getEmailConfig('log_file'), $log_entry, FILE_APPEND | LOCK_EX);
        }
    } else {
        echo "<div class='error'><p>❌ Test email failed to send</p></div>";
        $error = error_get_last();
        if ($error) {
            echo "<pre>Error: " . print_r($error, true) . "</pre>";
        }
    }
    echo "</div>";
}

// Test 7: Recent Log Entries
echo "<div class='section info'>
    <h2>7. Recent Contact Log Entries</h2>";
$log_file = getEmailConfig('log_file');
if (file_exists($log_file)) {
    $log_content = file_get_contents($log_file);
    $log_lines = explode("\n", $log_content);
    $recent_lines = array_slice($log_lines, -10); // Last 10 lines
    
    if (!empty(array_filter($recent_lines))) {
        echo "<pre>";
        foreach ($recent_lines as $line) {
            if (!empty(trim($line))) {
                echo htmlspecialchars($line) . "\n";
            }
        }
        echo "</pre>";
    } else {
        echo "<p>No log entries found.</p>";
    }
} else {
    echo "<p>Log file does not exist yet.</p>";
}
echo "</div>";

// Test Email Form
echo "<div class='section test-form'>
    <h2>8. Send Test Email</h2>
    <form method='POST'>
        <p><label>To Email:</label><br>
        <input type='email' name='test_to' value='" . getEmailConfig('to_email') . "' required></p>
        
        <p><label>Subject:</label><br>
        <input type='text' name='test_subject' value='Test Email from cPanel' required></p>
        
        <p><label>Message:</label><br>
        <textarea name='test_message' rows='4' required>This is a test email from the Zias Mermer & Granit website contact form test page.

Sent at: " . date('Y-m-d H:i:s') . "
Server: " . $_SERVER['HTTP_HOST'] . "</textarea></p>
        
        <button type='submit' name='test_email'>Send Test Email</button>
    </form>
</div>";

// Troubleshooting Tips
echo "<div class='section warning'>
    <h2>9. Troubleshooting Tips for cPanel</h2>
    <ul>
        <li><strong>Email Accounts:</strong> Make sure you have created email accounts in cPanel</li>
        <li><strong>From Address:</strong> Use an email address that exists on your domain</li>
        <li><strong>SMTP Settings:</strong> If mail() doesn't work, you may need to configure SMTP</li>
        <li><strong>Spam Filters:</strong> Check if emails are being marked as spam</li>
        <li><strong>PHP Mail:</strong> Ensure PHP mail function is enabled in cPanel</li>
        <li><strong>Domain Configuration:</strong> Verify your domain's DNS and mail settings</li>
    </ul>
</div>";

echo "<div class='section'>
    <h2>10. Quick Links</h2>
    <p><a href='contact.php'>Go to Contact Form</a></p>
    <p><a href='index.php'>Go to Homepage</a></p>
    <p><a href='email_config.php'>View Email Configuration</a></p>
</div>";

echo "</div></body></html>";
?>

