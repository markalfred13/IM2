<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoDoc Admin</title>
    <link href="https://fonts.cdnfonts.com/css/tt-autonomous-trl" rel="stylesheet">           
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: 'TT Autonomous Mono Trl', sans-serif;
            display: flex; /* Enable Flexbox */
            flex-direction: column; /* Stack items vertically */
            align-items: center;   /* Center items horizontally */
            justify-content: center; /* Center items vertically */
            min-height: 100vh;     /* Ensure full viewport height */
            margin: 0;
            position: relative; /* Enable positioning for the footer */
        }
        .logo {
            position: absolute;
            top: 20px; /* Adjust distance from the top */
            left: 20px; /* Adjust distance from the left */
            width: 100px; /* Adjust the width as needed */
        }

        h1 {
            color: #fff;
            background-color: black;
            padding: 15px;
            border-radius: 8px;
            text-shadow: 1px 1px 2px #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center; /* Center the links in the list */
        }

        li {
            display: inline-block;
            margin: 10px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: red;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        footer {
            position: absolute; /* Position the footer at the bottom */
            bottom: 0;
            left: 0;
            width: 100%; /* Full width */
            background-color: #000; /* Background color for the footer */
            color: #fff; /* Text color */
            text-align: center; /* Center align text */
            padding: 10px 0; /* Padding for spacing */
            font-size: 0.9em; /* Slightly smaller text */
        }
    </style>
</head>

<body>
    <img src="autodoc-logo.png" alt="Logo" class="logo"> <!-- Replace 'logo.png' with the path to your logo -->
    <h1>Appointment Management System</h1>
    <ul>
        <li>
            <a href="view_customers.php">View Customer Appointments</a>
        </li>
    </ul>
    <footer>
        AutoDoc 2024 All Rights Reserved
    </footer>
</body>

</html>
