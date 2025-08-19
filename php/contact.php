<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer classes (update the paths as needed)
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email address. Please try again."); window.location.href = "../contact.html";</script>';
        exit();
    }

    // PHPMailer object
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'mail.mmabreu.pt'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'contact_me@mmabreu.pt'; // Your SMTP email address
        $mail->Password = 'Ge@IBW[k2W4&'; // Your SMTP email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name); // Sender's email
        $mail->addAddress('contact_me@mmabreu.pt'); // Add your recipient email

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = "New message from $name via Contact Form";
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send email
        $mail->send();
        echo '<script>alert("Message sent successfully!"); window.location.href = "../contact.html";</script>';
        exit();
    } catch (Exception $e) {
        echo '<script>alert("Failed to send message. Please try again later."); window.location.href = "../contact.html";</script>';
        exit();
    }
} else {
    echo '<script>alert("Invalid request. Please try again."); window.location.href = "../contact.html";</script>';
    exit();
}
