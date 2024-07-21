<?php
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'new_system');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement (update table name and columns if needed)
$sql = "INSERT INTO appointments (appointment_date, appointment_time, first_name, last_name, email, phone, address, message)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters (modify data types if necessary)
$stmt->bind_param("ssssssss", $appointment_date, $appointment_time, $first_name, $last_name, $email, $phone, $address, $message);

if ($stmt->execute()) {
  echo "Appointment request submitted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
