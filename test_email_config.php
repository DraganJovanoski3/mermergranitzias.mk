<?php
// Test email configuration for info@mermergranitzias.mk
header('Content-Type: application/json');

// Disable error display but capture errors
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Configure SMTP settings
ini_set('SMTP', 'mail.mermergranitzias.mk');
ini_set('smtp_port', '465');

// Email server configuration based on provided settings
$email_config = [
    'to' => 'info@mermergranitzias.mk',
    'from' => 'noreply@mermergranitzias.mk',
    'smtp_server' => 'mail.mermergranitzias.mk',
    'smtp_port' => 465,
    'username' => 'info@mermergranitzias.mk',
    'secure' => 'ssl'
];

// Test email content
$subject = 'Тест порака - Email Configuration Test';
$test_message = "
Ова е тест порака за проверка на е-пошта конфигурацијата.

Детали за тест:
- Време на испраќање: " . date('Y-m-d H:i:s') . "
- Сервер: {$email_config['smtp_server']}
- Порт: {$email_config['smtp_port']}
- Безбедност: {$email_config['secure']}

Ако ја добивате оваа порака, е-пошта конфигурацијата работи правилно!

Поздрави,
Zias Mermer & Granit Team
";

// HTML version
$html_message = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #e74c3c; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .test-info { background: white; padding: 15px; border-left: 4px solid #e74c3c; margin-top: 20px; }
        .footer { text-align: center; margin-top: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Тест порака - Email Configuration</h2>
            <p>ZiasMermerGranit</p>
        </div>
        <div class='content'>
            <p>Ова е тест порака за проверка на е-пошта конфигурацијата.</p>
            
            <div class='test-info'>
                <h3>Детали за тест:</h3>
                <ul>
                    <li><strong>Време на испраќање:</strong> " . date('Y-m-d H:i:s') . "</li>
                    <li><strong>Сервер:</strong> {$email_config['smtp_server']}</li>
                    <li><strong>Порт:</strong> {$email_config['smtp_port']}</li>
                    <li><strong>Безбедност:</strong> {$email_config['secure']}</li>
                </ul>
            </div>
            
            <p>Ако ја добивате оваа порака, е-пошта конфигурацијата работи правилно!</p>
        </div>
        <div class='footer'>
            Поздрави,<br>
            Zias Mermer & Granit Team
        </div>
    </div>
</body>
</html>
";

// Headers for HTML email
$headers = [
    'From: ' . $email_config['from'],
    'Reply-To: ' . $email_config['from'],
    'Content-Type: text/html; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion(),
    'X-Test: Email Configuration Test'
];

try {
    // Try to send email using PHP mail() function
    $mail_sent = mail($email_config['to'], $subject, $html_message, implode("\r\n", $headers));

    if ($mail_sent) {
        echo json_encode([
            'success' => true,
            'message' => 'Тест пораката е успешно испратена!',
            'details' => [
                'to' => $email_config['to'],
                'from' => $email_config['from'],
                'server' => $email_config['smtp_server'],
                'port' => $email_config['smtp_port'],
                'secure' => $email_config['secure'],
                'time' => date('Y-m-d H:i:s')
            ]
        ]);
    } else {
        $error = error_get_last();
        echo json_encode([
            'success' => false,
            'message' => 'Грешка при испраќање на тест пораката.',
            'error' => $error,
            'details' => [
                'to' => $email_config['to'],
                'from' => $email_config['from'],
                'server' => $email_config['smtp_server'],
                'port' => $email_config['smtp_port'],
                'secure' => $email_config['secure'],
                'time' => date('Y-m-d H:i:s')
            ]
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Exception occurred: ' . $e->getMessage(),
        'error' => $e->getTraceAsString(),
        'details' => [
            'to' => $email_config['to'],
            'from' => $email_config['from'],
            'server' => $email_config['smtp_server'],
            'port' => $email_config['smtp_port'],
            'secure' => $email_config['secure'],
            'time' => date('Y-m-d H:i:s')
        ]
    ]);
}
?>
