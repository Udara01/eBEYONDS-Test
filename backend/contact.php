<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$data = $_POST;

// Validate required fields in here
$requiredFields = ['firstName', 'lastName', 'email', 'message'];
foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        echo json_encode(["success" => false, "message" => "Missing field: $field"]);
        exit;
    }
}

$firstName = htmlspecialchars($data['firstName']);
$lastName = htmlspecialchars($data['lastName']);
$email = htmlspecialchars($data['email']);
$phone = htmlspecialchars($data['phone'] ?? '');
$message = htmlspecialchars($data['message']);

// Save submission to JSON
$submission = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'email' => $email,
    'phone' => $phone,
    'message' => $message,
    'timestamp' => date('Y-m-d H:i:s'),
];

file_put_contents(
    'submissions.json',
    json_encode(array_merge(json_decode(@file_get_contents('submissions.json'), true) ?: [], [$submission]),
    JSON_PRETTY_PRINT)
);

// Send Email via PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP config done here
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;

    // Email address to send from. this email usually I used for the send emails when application is running on localhost.
    //this is not my real email address(udaranilupul01@gmail.com). I used this email address for testing purpose only.
    $mail->Username = 'syncrosoftware1.0@gmail.com'; 
    $mail->Password = 'vihj rkqs edqy ajza';    // Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email content
    $mail->setFrom('syncrosoftware1.0@gmail.com', 'udaranilupul01@gmail.com');
    $mail->addAddress('dumidu.kodithuwakku@ebeyonds.com');
    $mail->addAddress('prabhath.senadheera@ebeyonds.com');

    $mail->Subject = "New Contact Form Submission from $firstName $lastName";
    $mail->Body = "Name: $firstName $lastName\nEmail: $email\nPhone: $phone\nMessage:\n$message";

    $mail->send();

    // This is the auto-reply
    $mail->clearAddresses();
    $mail->addAddress($email);
    $mail->Subject = "Thanks for contacting us!";
    $mail->Body = "Hi $firstName,\n\nThank you for reaching out. We've received your message and will get back to you shortly.\n\nBest regards,\neBEYONDS Team";

    $mail->send();

    echo json_encode(["success" => true, "message" => "Form submitted successfully!"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Email error: " . $mail->ErrorInfo]);
}
?>
