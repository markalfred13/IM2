<?php
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['userID']) || $_SESSION['type'] !== 'admin') {
    echo "<!DOCTYPE html>
          <html lang='en'>
          <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Access Denied</title>
              <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap' rel='stylesheet'>
              <style>
                  body {
                      background-color: #fff;
                      color: #000;
                      font-family: 'Poppins', sans-serif;
                      text-align: center;
                      margin: 20px;
                  }
                  .error-message {
                      background-color: #000;
                      color: #fff;
                      padding: 20px;
                      border-radius: 8px;
                      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                      margin: 50px auto;
                      width: 50%;
                  }
                  .back-button {
                      margin-top: 20px;
                      background-color: #000;
                      color: white;
                      padding: 10px 15px;
                      border: none;
                      border-radius: 4px;
                      cursor: pointer;
                      text-decoration: none;
                  }
              </style>
          </head>
          <body>
              <div class='error-message'>
                  <h2>Access Denied</h2>
                  <p>You do not have permission to access this page.</p>
              </div>
          </body>
          </html>";
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'new_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initial query - fetch all appointments if no search term is provided
$sql = "SELECT * FROM appointments";

// Handle search if a search term is provided
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']); 
    $sql = "SELECT * FROM appointments WHERE first_name LIKE '%$searchTerm%' OR last_name LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Appointments</title>
    <link href="https://fonts.cdnfonts.com/css/tt-autonomous-trl" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin: 20px;
        }
        .logo {
            position: absolute;
            top: 20px; /* Adjust distance from the top */
            left: 20px; /* Adjust distance from the left */
            width: 100px; /* Adjust the width as needed */
        }


       
        h2 {
            font-family: 'TT Autonomous Mono Trl', sans-serif;
    color: #fff;
    background-color: #000;
    padding: 10px 25px; /* Adjust padding to cover text only */
    border-radius: 4px; /* Slightly reduced border-radius */
    text-shadow: 1px 1px 2px #333;
    display: inline-block; /* Ensure background covers only the text */
}
        table {
            width: 90%;
            margin: 20px auto; 
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 9px;
            text-align: left;
            
        }

        th {
            font-family: 'TT Autonomous Mono Trl', sans-serif;
            background-color: #000; 
            color: white;
            text-align: center;  /* Center the content horizontally */
        }

        th:last-child { /* Target the last <th> element (Actions) */
            width: 300px; /* Adjust the width value as needed */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; 
        }

        a {
            color: #000; 
            text-decoration: none;
        }

        .search-container {
            
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            font-family: 'TT Autonomous Mono Trl', sans-serif;
            padding: 8px;
            border: 1px solid #000;
            border-radius: 4px;
        }

        .search-container button[type="submit"] {
            font-family: 'TT Autonomous Mono Trl', sans-serif;
            padding: 8px 12px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .deleted { 
            color: #888; /* Gray to indicate deleted status */
            text-decoration: line-through; /* Visual cue for deleted items */
        }
        .action-buttons {
            text-align: center;  /* Center the content horizontally */
        }

        .approve-btn, .deny-btn, .remove-btn, .restore-btn {
            font-family: 'TT Autonomous Mono Trl', sans-serif;
            display: inline-flex;        /* Use inline-flex instead of inline-block */
            padding: 6px 10px;
            margin: 2px;
            border-radius: 4px;
            cursor: pointer;
            width: auto; 
            color: #fff; /* White text for all buttons */
        }
        .back-button {
            font-family: 'TT Autonomous Mono Trl', sans-serif;
            position: fixed;  /* Position fixed to stay in place on scroll */
            bottom: 20px;   
            left: 20px;     
            background-color: #000;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Remove default link underline */
        }

        .approve-btn { background-color: #28a745; } /* Green */
        .deny-btn { background-color: #dc3545; }    /* Red */
        .remove-btn { background-color: #6c757d; }  /* Gray */
        .restore-btn { background-color: #28a745; } /* Green */
    </style>
</head>

<body>
<img src="autodoc-logo.png" alt="Logo" class="logo"> <!-- Replace 'logo.png' with the path to your logo -->
    <h2>Manage Appointments</h2>
    <div class="search-container">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by Name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Message</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $status = $row['status'] ?? 'pending';
            $deleted = $row['deleted'] ?? false;

            $statusClass = $deleted ? 'deleted' : '';

            echo "<tr>
                    <td>$id</td>
                    <td>{$row['appointment_date']}</td>
                    <td>{$row['appointment_time']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['message']}</td>
                    <td class='$statusClass'>$status</td> 
                    <td class='action-buttons'>";

            // Conditional actions
            if (!$deleted) { 
                if ($status === 'pending') {
                    echo "<a href='approve.php?id=$id' class='approve-btn' onclick='return confirm(\"Are you sure you want to approve this appointment?\")'>Approve</a>  
                          <a href='deny.php?id=$id' class='deny-btn' onclick='return confirm(\"Are you sure you want to deny this appointment?\")'>Deny</a>";
                }
                echo "<a href='remove.php?id=$id' class='remove-btn' onclick='return confirm(\"Are you sure you want to remove this appointment?\")'>Remove</a>";
            } else {
                echo "<a href='restore.php?id=$id' class='restore-btn' onclick='return confirm(\"Are you sure you want to restore this appointment?\")'>Restore</a>";
            }

            echo "</td>
                  </tr>";
        }
        ?>
    </table>
    <a href="index.php" class="back-button">Home</a>
</body>
</html>
