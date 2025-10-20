<?php
// Email configuration for cPanel hosting
// Update these settings according to your cPanel email configuration

// Email addresses
$config = [
    'to_email' => 'info@mermergranitzias.mk',           // Where to send contact form submissions
    'from_email' => 'noreply@mermergranitzias.mk',      // From email address
    'reply_to' => 'info@mermergranitzias.mk',           // Reply-to email address
    
    // SMTP settings (if needed for advanced configuration)
    'smtp_host' => 'mail.mermergranitzias.mk',          // SMTP server hostname
    'smtp_port' => 587,                                 // SMTP port (587 for TLS, 465 for SSL)
    'smtp_username' => 'info@mermergranitzias.mk',      // SMTP username
    'smtp_password' => '',                              // SMTP password (set in cPanel)
    'smtp_secure' => 'tls',                             // Security: 'tls' or 'ssl'
    
    // Email subject and branding
    'subject_prefix' => 'ZiasMermerGranit - ',          // Subject line prefix
    'company_name' => 'ZiasMermerGranit',               // Company name for emails
    'company_phone' => '+389 45 274-250',               // Company phone
    'company_email' => 'info@mermergranitzias.mk',      // Company email
    
    // Logging
    'log_file' => 'contact_log.txt',                    // Contact form log file
    'enable_logging' => true,                           // Enable/disable logging
    
    // Security
    'max_message_length' => 2000,                       // Maximum message length
    'rate_limit_minutes' => 5,                          // Rate limiting in minutes
    'rate_limit_attempts' => 3,                         // Max attempts per time period
];

// Function to get configuration
function getEmailConfig($key = null) {
    global $config;
    if ($key === null) {
        return $config;
    }
    return isset($config[$key]) ? $config[$key] : null;
}

// Function to validate email configuration
function validateEmailConfig() {
    $config = getEmailConfig();
    $errors = [];
    
    if (empty($config['to_email']) || !filter_var($config['to_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid recipient email address';
    }
    
    if (empty($config['from_email']) || !filter_var($config['from_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid from email address';
    }
    
    return $errors;
}

// Function to check if email sending is enabled
function isEmailEnabled() {
    return function_exists('mail') || function_exists('fsockopen');
}

// Function to get server information for debugging
function getServerInfo() {
    return [
        'php_version' => phpversion(),
        'mail_function' => function_exists('mail'),
        'fsockopen_function' => function_exists('fsockopen'),
        'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
        'host' => $_SERVER['HTTP_HOST'] ?? 'Unknown',
        'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'
    ];
}
?>

