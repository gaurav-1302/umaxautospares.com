<?php

$to = 'info@umaxautospares.com';

// Process form data
$name = $_POST['firstName'] . ' ' . (isset($_POST['shopName']) ? $_POST['shopName'] : '');
$email = $_POST['email'];
$mobile = $_POST['mobileNumber'];
$gender = $_POST['gender'];
$shopEst = isset($_POST['shopEst']) ? $_POST['shopEst'] : '';
$noOfShops = $_POST['noOfShops'];
$startDate = $_POST['startDate'];
$model = $_POST['model'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$state = $_POST['state'];
$country = $_POST['country'];
$message = $_POST['message'];

// Subject and body of the email
$subject = 'Franchise Inquiry from ' . $name;
$body = "**Name:** $name\n";
$body .= "**Email:** $email\n";
$body .= "**Mobile Number:** $mobile\n";
$body .= "**Gender:** $gender\n";
$body .= (isset($_POST['shopName'])) ? "**Shop Name:** " . $_POST['shopName'] . "\n" : '';
$body .= (isset($_POST['shopEst'])) ? "**Shop Establishment:** $shopEst\n" : '';
$body .= "**Number of Shops:** $noOfShops\n";
$body .= "**From when do you want to start?:** $startDate\n";
$body .= "**Franchise for?:** $model\n";
$body .= "**Address/Location:** $address\n";
$body .= "**Pincode:** $pincode\n";
$body .= "**State:** $state\n";
$body .= "**Country:** $country\n";
$body .= "\n**Message:**\n$message";

// Set headers
$headers = array(
    'From' => $email, // Replace with your domain
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8'
);

// Send email
if (mail($to, $subject, $body, $headers)) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'error' => 'There was an error sending the email.');
}

echo json_encode($response);

?>