<?php
// Simple email test
header('Content-Type: application/json');

// Disable error display but capture errors
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Configure SMTP settings
ini_set('SMTP', 'mail.mermergranitzias.mk');
ini_set('smtp_port', '465');

try {
    // Basic email test
    $to = 'info@mermergranitzias.mk';
    $subject = 'Simple Test Email';
    $message = 'This is a simple test email from the website.';
    $headers = 'From: noreply@mermergranitzias.mk' . "\r\n" .
               'Content-Type: text/plain; charset=UTF-8' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    // Try to send email
    $mail_sent = mail($to, $subject, $message, $headers);
    
    if ($mail_sent) {
        echo json_encode([
            'success' => true,
            'message' => 'Simple test email sent successfully',
            'details' => [
                'to' => $to,
                'subject' => $subject,
                'time' => date('Y-m-d H:i:s'),
                'smtp_server' => ini_get('SMTP'),
                'smtp_port' => ini_get('smtp_port')
            ]
        ]);
    } else {
        $error = error_get_last();
        echo json_encode([
            'success' => false,
            'message' => 'Failed to send simple test email',
            'error' => $error,
            'details' => [
                'to' => $to,
                'subject' => $subject,
                'time' => date('Y-m-d H:i:s'),
                'smtp_server' => ini_get('SMTP'),
                'smtp_port' => ini_get('smtp_port')
            ]
        ]);
    }
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Exception occurred: ' . $e->getMessage(),
        'error' => $e->getTraceAsString()
    ]);
}
?>
