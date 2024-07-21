<?php
// update_password.php

require 'backend.php'; // Ensure this file contains your database connection setup

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    echo 'You need to log in first.';
    exit();
}

// Get the user ID from the session
$userID = $_SESSION['userID'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['oldPassword'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmPassword)) {
        if ($newPassword === $confirmPassword) {
            try {
                // Check if the old password matches
                $sql = "SELECT Password FROM signup WHERE userID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$userID]);
                $result = $stmt->fetch();

                if ($result && password_verify($oldPassword, $result['Password'])) {
                    // Update the password
                    $sql = "UPDATE signup SET Password = ? WHERE userID = ?";
                    $stmt = $pdo->prepare($sql);
                    if ($stmt->execute([password_hash($newPassword, PASSWORD_BCRYPT), $userID])) {
                        echo 'Password updated successfully.';
                        // Optionally, you can redirect or update session information
                        header('Location: ../landingpage/landingpage.php');
                        exit();
                    } else {
                        echo 'Error: Could not update password.';
                    }
                } else {
                    echo 'Old password is incorrect.';
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            echo 'New password and confirmation do not match.';
        }
    } else {
        echo 'All fields are required.';
    }
} else {
    echo 'Invalid request method.';
}
?>
