<?php
// update_profile.php

require 'backend.php'; // Ensure this file contains your database connection setup

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['customerID'])) {
    echo 'You need to log in first.';
    exit();
}

// Get the customer ID from the session
$customerID = $_SESSION['customerID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validate the inputs (you can add more validation here)
    if (!empty($firstName) && !empty($lastName) && !empty($phoneNumber) && !empty($address) && !empty($email)) {
        // Update the user's information in the database
        $sql = "UPDATE verification SET firstName = ?, lastName = ?, phoneNumber = ?, address = ?, emailAddress = ? WHERE customerID = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$firstName, $lastName, $phoneNumber, $address, $email, $customerID])) {
            echo 'Profile updated successfully!';
        } else {
            echo 'Error: Could not update profile.';
        }
    } else {
        echo 'All fields are required.';
    }
}
?>
