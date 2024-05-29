<?php

// Set recipient email address (replace with your actual email)
$to = 'info@umaxautospares.com';

// Process form data
$name = $_POST['firstName'] . ' ' . $_POST['lastName'];
$email = $_POST['email'];
$mobileNumber = $_POST['mobileNumber'];
$dob = $_POST['mobileNumber']; // Assuming the DOB field uses the same name as mobileNumber
$gender = $_POST['brand'];
$experience = $_POST['year'];
$role = $_POST['model'];
$message = $_POST['message'];

// Subject and body of the email
$subject = 'Job Application from ' . $name;
$body = "**Name:** $name\n";
$body .= "**Email:** $email\n";
$body .= "**Mobile Number:** $mobileNumber\n";
$body .= "**DOB:** $dob\n";
$body .= "**Gender:** $gender\n";
$body .= "**Experience:** $experience\n";
$body .= "**Role:** $role\n";
$body .= "**Cover letter:**\n$message";

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