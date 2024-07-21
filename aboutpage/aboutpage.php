<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aboutpage.css">
    <link rel="stylesheet" href="about-navigation.css">
    <link rel="stylesheet" href="../landingpage/preloader.css">
    <link rel="icon" type="image/x-icon" href="../images/autodoc-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AutoDoc - Driven by your needs</title>
</head>
<body>
    <div class="bg">
        <div class="loader"></div>
      </div>
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
    

    <div class="main-container">
        <div class="left-container">
            <h1 class="header">Why us?</h1>
            <p class="description">Our team possesses decades of combined automotive expertise, offering you unparalleled knowledge and guidance. 
                We believe in honesty and integrity, building relationships the old-fashioned way. 
                Our commitment to quality means every vehicle is carefully selected to meet our rigorous standards. 
                 Our 20 years of dedication is a proof that we are a recognized brand trusted by the customers all over the world.</p>
        </div>
        <div class="right-container">
            <img src="../images/about-image.png" class="about-image" alt="">
        </div>
     </div>
     <script src="../landingpage/preloader.js"></script>
    <script src="../landingpage/landing.js"></script>
     <script src="aboutpage.js"></script>
            
</body>
</html>
