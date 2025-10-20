<?php
// Simple test file to verify contact form functionality
echo "<h1>Contact Form Test</h1>";

// Test if we can detect local environment
$is_local = in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1']) || 
            strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
            strpos($_SERVER['HTTP_HOST'], '.local') !== false;

echo "<p><strong>Environment:</strong> " . ($is_local ? 'Local Development' : 'Production') . "</p>";
echo "<p><strong>Host:</strong> " . $_SERVER['HTTP_HOST'] . "</p>";

// Test if we can write to log file
$test_log = "Test log entry - " . date('Y-m-d H:i:s') . "\n";
$log_result = file_put_contents('contact_log.txt', $test_log, FILE_APPEND | LOCK_EX);

echo "<p><strong>Log file writable:</strong> " . ($log_result !== false ? 'Yes' : 'No') . "</p>";

// Test mail function
if (function_exists('mail')) {
    echo "<p><strong>Mail function:</strong> Available</p>";
} else {
    echo "<p><strong>Mail function:</strong> Not available</p>";
}

// Show recent log entries
if (file_exists('contact_log.txt')) {
    echo "<h2>Recent Contact Log Entries:</h2>";
    $log_content = file_get_contents('contact_log.txt');
    $log_lines = explode("\n", $log_content);
    $recent_lines = array_slice($log_lines, -10); // Last 10 lines
    
    echo "<pre>";
    foreach ($recent_lines as $line) {
        if (!empty(trim($line))) {
            echo htmlspecialchars($line) . "\n";
        }
    }
    echo "</pre>";
} else {
    echo "<p>No contact log file found.</p>";
}

echo "<p><a href='contact.php'>Go to Contact Form</a></p>";
?>

