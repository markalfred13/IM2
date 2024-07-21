<?php
// register.php



require 'backend.php';
session_start();

$registrationSuccess = false;
$registrationError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form fields are set
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $userType = $_POST['userType'] ?? 'customer'; // Get user type from form, default to 'customer'

    // Validate the inputs (including user type)
    if (!empty($username) && !empty($email) && !empty($password) && in_array($userType, ['customer', 'admin'])) {
        try {
            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the data into the database (now with userType)
            $sql = "INSERT INTO signup (Username, Email, Password, type) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$username, $email, $hashedPassword, $userType])) {
                $registrationSuccess = true;
                
                // Get the user ID of the newly registered user
                $userId = $pdo->lastInsertId();
                
                // Fetch the newly registered user's details for login
                $sql = "SELECT userID, Username, Password, type, Email FROM signup WHERE userID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$userId]);
                $user = $stmt->fetch();
                
                // Session fixation prevention
                session_regenerate_id(true); 

                // Store user data in session
                $_SESSION['userID'] = $user['userID'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['userType'] = $user['type'];
                $_SESSION['email'] = $user['Email'];

                // Redirect to the landing page after successful registration and login
                header('Location: ../landingpage/landingpage.php');
                exit();
            } else {
                $registrationError = 'Error: Could not register.';
                // Print PDO error info for debugging
                print_r($stmt->errorInfo());
            }
        } catch (PDOException $e) {
            $registrationError = 'Error: ' . $e->getMessage();
        }
    } else {
        $registrationError = 'All fields are required and user type must be valid.';
    }
}
?>


