<?php
// login.php

require 'backend.php'; // Your database connection setup

session_start(); // Start the session at the beginning

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Prepared statement to prevent SQL injection
        $sql = "SELECT userID, Password, type, Email FROM signup WHERE Username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['Password'])) {
            // Session fixation prevention
            session_regenerate_id(true); 

            // Store user data in session
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $username;
            $_SESSION['type'] = $user['type'];
            $_SESSION['email'] = $user['Email'];

            // Redirect based on user type
            if ($user['type'] === 'admin') {
                header("Location: ../appointmentpage/database/index.php");
            } else {
                header("Location: ../landingpage/landingpage.php");
            }
            exit; // Stop further execution after the redirect
        } else {
            echo 'Invalid username or password.';
        }
    } else {
        echo 'Username and password are required.';
    }
}
?>