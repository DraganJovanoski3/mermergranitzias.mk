<?php
// Comprehensive SMTP test
header('Content-Type: application/json');

// Disable error display but capture errors
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Try multiple SMTP configurations
$configs = [
    [
        'name' => 'Configuration 1 - Direct SMTP',
        'smtp' => 'mail.mermergranitzias.mk',
        'port' => '465'
    ],
    [
        'name' => 'Configuration 2 - Localhost with custom port',
        'smtp' => 'localhost',
        'port' => '465'
    ],
    [
        'name' => 'Configuration 3 - Standard SMTP port',
        'smtp' => 'mail.mermergranitzias.mk',
        'port' => '25'
    ]
];

$results = [];

foreach ($configs as $config) {
    // Configure SMTP settings
    ini_set('SMTP', $config['smtp']);
    ini_set('smtp_port', $config['port']);
    
    // Test email
    $to = 'info@mermergranitzias.mk';
    $subject = 'SMTP Test - ' . $config['name'];
    $message = 'Testing SMTP configuration: ' . $config['name'] . "\n" .
               'SMTP Server: ' . $config['smtp'] . "\n" .
               'Port: ' . $config['port'] . "\n" .
               'Time: ' . date('Y-m-d H:i:s');
    $headers = 'From: noreply@mermergranitzias.mk' . "\r\n" .
               'Content-Type: text/plain; charset=UTF-8' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    // Try to send email
    $mail_sent = mail($to, $subject, $message, $headers);
    
    $results[] = [
        'config_name' => $config['name'],
        'smtp_server' => $config['smtp'],
        'smtp_port' => $config['port'],
        'success' => $mail_sent,
        'error' => $mail_sent ? null : error_get_last(),
        'time' => date('Y-m-d H:i:s')
    ];
}

// Return results
echo json_encode([
    'success' => true,
    'message' => 'SMTP configuration test completed',
    'results' => $results,
    'summary' => [
        'total_tests' => count($configs),
        'successful_tests' => count(array_filter($results, function($r) { return $r['success']; })),
        'failed_tests' => count(array_filter($results, function($r) { return !$r['success']; }))
    ]
]);
?>








