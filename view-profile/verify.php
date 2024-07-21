<?php
require 'backend.php'; // Ensure this file contains your database connection setup

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    echo 'You need to log in first.';
    exit();
}

// Get the user ID and customerID from the session
$userID = $_SESSION['userID'];
$customerID = $_SESSION['customerID'] ?? null;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!empty($firstName) && !empty($lastName) && !empty($phoneNumber) && !empty($address) && !empty($email)) {
        try {
            // Begin a transaction to ensure data integrity
            $pdo->beginTransaction();

            // Check if email exists in signup table
            $sql = "SELECT Username FROM signup WHERE Email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $username = $stmt->fetchColumn();

            if (!$username) {
                throw new Exception('Email address does not exist in the signup table.');
            }

            if ($customerID) {
                // Update existing record in the verification table
                $sql = "UPDATE verification 
                        SET firstName = ?, lastName = ?, emailAddress = ?, phoneNumber = ?, address = ? 
                        WHERE customerID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$firstName, $lastName, $email, $phoneNumber, $address, $customerID]);

                // Commit the transaction
                $pdo->commit();

                // Redirect to the profile page
                header('Location: ../landingpage/landingpage.php');
                exit();
            } else {
                // Insert new record into the verification table
                $sql = "INSERT INTO verification (userID, firstName, lastName, phoneNumber, emailAddress, address, username, usertype, password) 
                        SELECT userID, ?, ?, ?, ?, ?, Username, type, Password
                        FROM signup 
                        WHERE userID = ?";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$firstName, $lastName, $phoneNumber, $email, $address, $userID])) {
                    // Commit the transaction
                    $pdo->commit();

                    // Update session to mark as verified
                    $_SESSION['verified'] = true;

                    // Redirect to the landing page
                    header('Location: ../landingpage/landingpage.php');
                    exit();
                } else {
                    // Roll back the transaction on failure
                    $pdo->rollBack();
                    echo 'Error: Could not verify account.';
                    // Print PDO error info for debugging
                    print_r($stmt->errorInfo());
                }
            }
        } catch (Exception $e) {
            // Roll back the transaction on exception
            $pdo->rollBack();
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo 'All fields are required.';
    }
} else {
    echo 'Invalid request method.';
}
?>
