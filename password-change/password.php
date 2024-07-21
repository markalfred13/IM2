<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../landingpage/navigation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="../images/autodoc-icon.png">
    <link rel="stylesheet" href="password.css">
    <title>AutoDoc - Driven by your needs</title>
</head>
<body>
    <div class="bg">
        <div class="loader"></div>
      </div>
    <div class="nav-bar">
        
        <a href="../landingpage/landingpage.php"><img class="nav-logo" src="../images/nav-logo.png" alt="navigation-logo"></a>
            
        <div class="nav-links">
            <a href="../landingpage/landingpage.php">Home</a>
            <a href="../aboutpage/aboutpage.php">About us</a>
            <a href="../servicepage/servicespage.php">Services</a>
            
        </div>
        <div class="profile">
            <div id="glass-div" class="glass">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="user user-icon">
                <i class="fa-solid fa-circle-user"></i>
                <div class="user-dropdown-content">
                    <a href="../view-profile/catcher.php"><div class="dropdown-item" id="viewProfileBtn">View Profile</div></a>
                    <a href="../password-change/password.php"><div class="dropdown-item" data-action="settings">Change Password</div></a>
                    <a href="../logout/logout_Script.php"><div class="dropdown-item" data-action="logout">Logout</div></a>
                </div>
            
            </div>
                </div>
    </div>
                <h1>Change Password</h1>
                <form action="change_password.php" method="POST">
                <label for="oldPassword">Old Password</label>
                <input type="password" id="oldPassword" name="oldPassword" required>
                <label for="newPassword">New Password</label>
                <input type="password" id="newPassword" name="newPassword" required>
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <input type="submit" value="Submit">
                </form>
              </div>
              <script src="password.js"></script>
</body>
</html>
