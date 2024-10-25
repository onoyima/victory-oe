<?php
session_start();

if (isset($_POST['btn-send'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        $to = "clintonfaze@gmail.com"; // Replace with your email address
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $emailSubject = "Contact Form Query: " . $subject;
        $emailBody = "<h2>Contact Form Submission</h2>
                      <p><strong>Name:</strong> {$name}</p>
                      <p><strong>Email:</strong> {$email}</p>
                      <p><strong>Subject:</strong> {$subject}</p>
                      <p><strong>Message:</strong><br>{$message}</p>";

        if (mail($to, $emailSubject, $emailBody, $headers)) {
            $_SESSION['message'] = "<div class='alert alert-success'>Message sent successfully!</div>";
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>Failed to send the message. Please try again.</div>";
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-warning'>All fields are required!</div>";
    }
    header("Location: index.php"); // Redirect back to index.php
    exit;
} else {
    header("Location: index.php"); // Redirect back to index.php
    exit;
}
