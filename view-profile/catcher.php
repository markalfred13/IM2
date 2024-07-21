<?php
require 'backend.php'; // Ensure this file contains your database connection setup

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    echo 'You need to log in first.';
    exit();
}

$userID = $_SESSION['userID'];

// Fetch customerID from the verification table based on userID
$sql = "SELECT customerID FROM verification WHERE userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$verification = $stmt->fetch();

if ($verification) {
    $customerID = $verification['customerID'];

    // Fetch user details from the verification table using customerID
    $sql = "SELECT firstName, lastName, emailAddress FROM verification WHERE customerID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customerID]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['displayName'] = $user['firstName'] . ' ' . $user['lastName'];
        $_SESSION['displayEmail'] = $user['emailAddress'];
        $_SESSION['customerID'] = $customerID;
    } else {
        echo 'User details not found in the verification table.';
        exit();
    }
} else {
    // If customerID is not found in the verification table, fetch Username and Email from signup table
    $sql = "SELECT Username, Email FROM signup WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['displayName'] = $user['Username'];
        $_SESSION['displayEmail'] = $user['Email'];
    } else {
        echo 'User details not found in the signup table.';
        exit();
    }
}

// Redirect to the profile template page
header('Location: profile.php');
exit();
?>
