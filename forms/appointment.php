<?php

// Set recipient email address (replace with your actual email)
$to = 'info@umaxautospares.com';

// Process form data
$name = $_POST['firstName'] . ' ' . (isset($_POST['lastName']) ? $_POST['lastName'] : '');
$email = $_POST['email'];
$mobileNumber = $_POST['mobileNumber'];
$date = $_POST['date'];
$time = $_POST['time']; // Assuming the visible time field
$message = $_POST['message'];

// Subject and body of the email
$subject = 'Appointment Request from ' . $name;
$body = "**Name:** $name\n";
$body .= "**Email:** $email\n";
$body .= "**Mobile Number:** $mobileNumber\n";
$body .= "**Date:** $date\n";
$body .= "**Time:** $time\n";
$body .= "**Message:**\n$message";

// Set headers
$headers = array(
    'From' => $email, // Replace with your domain
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8'
);


if (mail($to, $subject, $body, $headers)) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => 'There was an error sending the email.');
}
echo json_encode($response);

?>