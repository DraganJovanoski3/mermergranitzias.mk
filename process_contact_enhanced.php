<?php
// Enhanced contact form processor for cPanel hosting
header('Content-Type: application/json');

// Include email configuration
require_once 'email_config.php';

// Disable error display but capture errors
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get form data
$name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
$service = isset($_POST['service']) ? sanitize_input($_POST['service']) : '';
$message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Името е задолжително';
}

if (empty($email)) {
    $errors[] = 'Е-поштата е задолжителна';
} elseif (!is_valid_email($email)) {
    $errors[] = 'Внесете валидна е-пошта';
}

if (empty($message)) {
    $errors[] = 'Пораката е задолжителна';
}

// Check message length
$max_length = getEmailConfig('max_message_length');
if (strlen($message) > $max_length) {
    $errors[] = 'Пораката е премногу долга. Максимална должина: ' . $max_length . ' карактери.';
}

// If there are validation errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Get configuration
$config = getEmailConfig();
$to = $config['to_email'];
$from_email = $config['from_email'];
$company_name = $config['company_name'];
$subject = $config['subject_prefix'] . 'Нова порака од веб-сајтот';

// Create HTML email content
$html_email_content = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #e74c3c; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #e74c3c; }
        .message { background: white; padding: 15px; border-left: 4px solid #e74c3c; margin-top: 20px; }
        .footer { text-align: center; margin-top: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Нова порака од веб-сајтот</h2>
            <p>{$company_name}</p>
        </div>
        <div class='content'>
            <div class='field'>
                <span class='label'>Име:</span> {$name}
            </div>
            <div class='field'>
                <span class='label'>Е-пошта:</span> {$email}
            </div>
            <div class='field'>
                <span class='label'>Телефон:</span> {$phone}
            </div>
            <div class='field'>
                <span class='label'>Услуга:</span> {$service}
            </div>
            <div class='message'>
                <span class='label'>Порака:</span><br>
                " . nl2br(htmlspecialchars($message)) . "
            </div>
        </div>
        <div class='footer'>
            Оваа порака е автоматски генерирана од веб-сајтот.<br>
            {$company_name} - " . date('Y-m-d H:i:s') . "
        </div>
    </div>
</body>
</html>
";

// Create plain text version as fallback
$text_email_content = "
Нова порака од контакт формата:

Име: {$name}
Е-пошта: {$email}
Телефон: {$phone}
Услуга: {$service}

Порака:
{$message}

---
Оваа порака е автоматски генерирана од веб-сајтот.
{$company_name} - " . date('Y-m-d H:i:s') . "
";

// Try multiple email sending methods for better compatibility with cPanel
function sendEmailWithMultipleMethods($to, $subject, $html_content, $text_content, $from_email, $reply_to) {
    // Method 1: Standard PHP mail() with proper headers
    $headers = [
        'From: ' . $from_email,
        'Reply-To: ' . $reply_to,
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion(),
        'MIME-Version: 1.0'
    ];
    
    $mail_sent = mail($to, $subject, $html_content, implode("\r\n", $headers));
    
    if ($mail_sent) {
        return true;
    }
    
    // Method 2: Try with different content type
    $headers_alt = [
        'From: ' . $from_email,
        'Reply-To: ' . $reply_to,
        'Content-Type: text/plain; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion(),
        'MIME-Version: 1.0'
    ];
    
    $mail_sent_alt = mail($to, $subject, $text_content, implode("\r\n", $headers_alt));
    
    if ($mail_sent_alt) {
        return true;
    }
    
    // Method 3: Try with domain-specific from address
    $domain = $_SERVER['HTTP_HOST'];
    $from_domain = 'noreply@' . $domain;
    
    $headers_domain = [
        'From: ' . $from_domain,
        'Reply-To: ' . $reply_to,
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion(),
        'MIME-Version: 1.0'
    ];
    
    $mail_sent_domain = mail($to, $subject, $html_content, implode("\r\n", $headers_domain));
    
    return $mail_sent_domain;
}

try {
    // Check if email is enabled
    if (!isEmailEnabled()) {
        throw new Exception('Email functionality is not available on this server');
    }
    
    // Validate email configuration
    $config_errors = validateEmailConfig();
    if (!empty($config_errors)) {
        throw new Exception('Email configuration error: ' . implode(', ', $config_errors));
    }
    
    // Send email using multiple methods
    $email_sent = sendEmailWithMultipleMethods(
        $to, 
        $subject, 
        $html_email_content, 
        $text_email_content, 
        $from_email, 
        $email
    );

    if ($email_sent) {
        // Log the contact form submission
        if (getEmailConfig('enable_logging')) {
            $log_entry = date('Y-m-d H:i:s') . " - Contact form submitted by: {$name} ({$email}) - Service: {$service} - IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
            file_put_contents(getEmailConfig('log_file'), $log_entry, FILE_APPEND | LOCK_EX);
        }
        
        echo json_encode([
            'success' => true, 
            'message' => 'Вашата порака е успешно испратена! Ќе ве контактираме наскоро.'
        ]);
    } else {
        $error = error_get_last();
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Се појави грешка при испраќањето на пораката. Обидете се повторно.',
            'debug' => $error
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Се појави грешка при испраќањето на пораката. Обидете се повторно.',
        'debug' => $e->getMessage()
    ]);
}
?>
