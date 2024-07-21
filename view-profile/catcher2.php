<?php
require 'backend.php'; // Ensure this file contains your database connection setup

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    echo 'You need to log in first.';
    exit();
}

// Get the user ID from the session
$userID = $_SESSION['userID'];

// Fetch user details to get customerID
$sql = "SELECT Username, email, customerID FROM signup WHERE userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$user = $stmt->fetch();

if ($user) {
    if ($user['customerID']) {
        // Fetch customer details using customerID
        $sql = "SELECT firstName, lastName, emailAddress FROM customers WHERE customerID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user['customerID']]);
        $customer = $stmt->fetch();
        
        if ($customer) {
            $_SESSION['displayName'] = $customer['firstName'] . ' ' . $customer['lastName'];
            $_SESSION['displayEmail'] = $customer['emailAddress'];
            $_SESSION['firstName'] = $customer['firstName'];
            $_SESSION['lastName'] = $customer['lastName'];
            $_SESSION['customerID'] = $user['customerID'];
        } else {
            echo 'Customer details not found.';
            exit();
        }
    } else {
        // For non-verified users, use the username and email from signup
        $_SESSION['displayName'] = $user['Username'];
        $_SESSION['displayEmail'] = $user['email'];
    }
} else {
    echo 'User not found in the database.';
    exit();
}

// Debugging: Check if session variables are set
if (isset($_SESSION['displayName']) && isset($_SESSION['displayEmail'])) {
    echo 'Session variables are set.';
} else {
    echo 'Failed to set session variables.';
    exit();
}

// Redirect to the profile template page
header('Location: profile.php');
exit();
?>
