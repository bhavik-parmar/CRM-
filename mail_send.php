<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to']; // comma-separated
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Split email list
    $emails = explode(',', $to);
    $emails = array_map('trim', $emails);

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: bhavikp12102@gmail.com" . "\r\n"; // Change to your domain email

    $successCount = 0;
    foreach ($emails as $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (mail($email, $subject, $message, $headers)) {
                $successCount++;
            }
        }
    }

    echo "<script>alert('Email sent to {$successCount} recipients.');</script>";
}
?>
