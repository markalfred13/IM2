<?php
// ... (Database connection code as before)
$conn = new mysqli('localhost', 'root', '', 'new_system');
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM appointments WHERE id=$id";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql = "UPDATE appointments SET deleted=TRUE WHERE id=$id";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Appointment removed successfully'); 
                          window.location.href='view_customers.php'; 
                  </script>";
        } else {
            echo "<script>alert('Error removing appointment: " . $conn->error . "'); 
                          window.location.href='view_customers.php'; 
                  </script>";
        }
    }
}

$conn->close();
?>