<?php
// Simple test file to verify email functionality
// This file should be removed in production

// Set content type to JSON
header('Content-Type: application/json');

// Test email configuration
$to = 'info@mermergranitzias.mk';
$subject = 'Тест порака од веб-сајтот';
$message = "Ова е тест порака за проверка на е-пошта функционалноста.\n\nВреме на испраќање: " . date('Y-m-d H:i:s');

$headers = [
    'From: noreply@mermergranitzias.mk',
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion()
];

// Try to send test email
$mail_sent = mail($to, $subject, $message, implode("\r\n", $headers));

if ($mail_sent) {
    echo json_encode([
        'success' => true,
        'message' => 'Тест пораката е успешно испратена!',
        'to' => $to,
        'time' => date('Y-m-d H:i:s')
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Грешка при испраќање на тест пораката.',
        'error' => error_get_last()
    ]);
}
?>

