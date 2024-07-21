<?php
// fetch_user_info.php
session_start();
require 'backend.php'; 

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID']; // Get userID from session

    // Prepare and execute the SQL query
    $sql = "SELECT Username, Email FROM signup WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);

    // Fetch the user data
    $user = $stmt->fetch();
    if ($user) {
        // Return the user data as JSON
        echo json_encode([
            'username' => $user['Username'],
            'email' => $user['Email']
        ]);
    } else {
        // User not found in the database
        echo json_encode(['error' => 'User not found']); 
    }
} else {
    // User not logged in
    echo json_encode(['error' => 'Not logged in']); 
}
// In landingpage.php, profile.php, etc.
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../loginpage/loginpage.php"); 
    exit;
}

$userID = $_SESSION['userID'];
// Fetch user data based on $userID from database (using prepared statements!)

