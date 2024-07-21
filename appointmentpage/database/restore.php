<?php
// ... (Database connection code as before) ...
$conn = new mysqli('localhost', 'root', '', 'new_system');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE appointments SET deleted=FALSE WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment restored successfully'); 
                      window.location.href='view_customers.php'; // Redirect back to the main page
              </script>";
    } else {
        echo "<script>alert('Error restoring appointment: " . $conn->error . "'); 
                      window.location.href='view_customers.php'; 
              </script>";
    }
}

$conn->close();
?>