<?php
// Simple test to debug PHP errors
header('Content-Type: application/json');

// Test 1: Basic PHP functionality
try {
    $test_data = [
        'php_version' => phpversion(),
        'time' => date('Y-m-d H:i:s'),
        'server' => $_SERVER['SERVER_NAME'] ?? 'unknown',
        'method' => $_SERVER['REQUEST_METHOD'] ?? 'unknown'
    ];
    
    echo json_encode([
        'success' => true,
        'message' => 'PHP is working correctly',
        'data' => $test_data
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'PHP Error: ' . $e->getMessage(),
        'error' => $e->getTraceAsString()
    ]);
}
?>

