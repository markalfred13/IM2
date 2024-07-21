<?php
// ... (Database connection code as before)
$conn = new mysqli('localhost', 'root', '', 'new_system');
$id = $_GET['id'];

$sql = "UPDATE appointments SET status='approved' WHERE id=$id";

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "UPDATE appointments SET status='approved' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Appointment approved successfully'); 
                    window.location.href='view_customers.php'; // Redirect back to the main page
            </script>";
  } else {
      echo "<script>alert('Error approving appointment: " . $conn->error . "'); 
                    window.location.href='view_customers.php'; 
            </script>";
  }
}
$conn->close();
?>
