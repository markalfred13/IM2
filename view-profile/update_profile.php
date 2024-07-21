<?php
require 'backend.php'; // Ensure this file contains your database connection setup

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    echo 'You need to log in first.';
    exit();
}

// Get user ID from the session
$userID = $_SESSION['userID'];
$customerID = $_SESSION['customerID'] ?? null; // Get customerID if available

// Check if form data is set
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$phoneNumber = $_POST['phoneNumber'] ?? '';
$address = $_POST['address'] ?? '';
$email = $_POST['email'] ?? '';

if (empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($address) || empty($email)) {
    echo 'All fields are required.';
    exit();
}

// Check if customerID exists
if ($customerID) {
    // Update customer details
    $sql = "UPDATE customers SET firstName = ?, lastName = ?, emailAddress = ?, phoneNumber = ?, address = ? WHERE customerID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstName, $lastName, $email, $phoneNumber, $address, $customerID]);

    if ($stmt->rowCount()) {
        echo 'Profile updated successfully.';
        // Update session variables
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['phoneNumber'] = $phoneNumber;
        $_SESSION['address'] = $address;
        $_SESSION['displayEmail'] = $email;
    } else {
        echo 'Error updating profile.';
    }
} else {
    // Insert new verification record
    $sql = "INSERT INTO verification (userID, firstName, lastName, emailAddress, phoneNumber, address, username, usertype, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID, $firstName, $lastName, $email, $phoneNumber, $address, $_SESSION['displayName'], $_SESSION['type'], $_SESSION['password']]);

    if ($stmt->rowCount()) {
        // Update session variables
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['phoneNumber'] = $phoneNumber;
        $_SESSION['address'] = $address;
        $_SESSION['displayEmail'] = $email;

        echo 'Verification submitted successfully.';
        // Automatically log in the user
        header('Location: profile.php');
        exit();
    } else {
        echo 'Error submitting verification.';
    }
}
?>
