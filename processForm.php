<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Set your email address where you want to receive the messages
    $toEmail = "PlateSpottingNL@gmail.com";

    // Get form data
    $message = $_POST["message"];
    $email = $_POST["email"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email
        echo "Invalid email address";
        exit;
    }

    // Compose the email message
    $subject = "New Contact Form Submission";
    $body = "Message: $message\n\nFrom: $email";

    // Send email
    if (mail($toEmail, $subject, $body)) {
        // Email sent successfully
        echo "Message sent successfully!";
    } else {
        // Error sending email
        echo "Error sending message. Please try again later.";
    }

} else {
    // Redirect users who access this script directly
    header("Location: index.html");
    exit;
}
?>
