<?php
session_start();

// Ensure session variables are set
if (!isset($_SESSION['displayName']) || !isset($_SESSION['displayEmail'])) {
    echo 'User information is not available.';
    exit();
}

$isCustomer = isset($_SESSION['customerID']); // Check if customerID is set
$buttonLabel = $isCustomer ? 'Save Profile' : 'Verify';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../images/autodoc-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="preloader.css">
    <title>AutoDoc - Driven by your needs</title>
</head>
<body>
<div class="nav-bar">
        <a href="../landingpage/landingpage.php"> <img class="nav-logo" src="../images/nav-logo.png" alt="navigation-logo"></a>
           
        <div class="nav-links">
            <a href="../landingpage/landingpage.php">Home</a>
            <a class="about-link" href="../aboutpage/aboutpage.php">About us</a>
            <a class="service-link" href="../servicepage/servicespage.php">Services</a>
            
        </div>
        <div class="profile">
            <div id="glass-div" class="glass">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="cart">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="user user-icon">
                <i class="fa-solid fa-circle-user"></i>
                <div class="user-dropdown-content">
                <a href="../view-profile/catcher.php"><div class="dropdown-item" id="viewProfileBtn">View Profile</div></a> 
              <a href="../password-change/password.php"><div class="dropdown-item" data-action="settings">Change Password</div></a> 
                  <div class="dropdown-item" data-action="logout">Logout</div>
                </div>
            </div>
                </div>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold"><?php echo htmlspecialchars($_SESSION['displayName']); ?></span>
                    <span class="text-black-50"><?php echo htmlspecialchars($_SESSION['displayEmail']); ?></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="verify.php" method="POST">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control" name="firstName" placeholder="First name" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" name="phoneNumber" placeholder="Enter phone number" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter address" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Verify Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email" value="">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit"><?php echo htmlspecialchars($buttonLabel); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="landing.js"></script>

</html>
