<?php

// Set recipient email address (replace with your actual email)
$to = 'info@umaxautospares.com';

// Process form data
$name = $_POST['name'] . ' ' . (isset($_POST['lastName']) ? $_POST['lastName'] : '');
$email = $_POST['email'];
$mobileNumber = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message']; // Assuming the hidden message field

// Subject and body of the email
$subject = 'Contact from ' . $name;
$body = "*Name:* $name\n";
$body .= "*Email:* $email\n";
$body .= "*Mobile Number:* $mobileNumber\n";
$body .= "*Subject:* $subject\n";
$body .= "*Message:*\n$message";

// Set headers
$headers = array(
    'From' => $email, // Replace with your domain
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8'
);

// Send email only if message2 is empty

if (mail($to, $subject, $body, $headers)) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => 'There was an error sending the email.');
}

echo json_encode($response);

?>