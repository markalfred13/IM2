<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landingpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="../images/autodoc-icon.png">
    <link rel="stylesheet" href="loginpage.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="preloader.css">
    <script defer src="preloader.js"></script>
    <title>AutoDoc - Driven by your needs</title>
</head>
<body>
    <div class="bg">
        <div class="loader"></div>
    </div>
    <div class="nav-bar">
        <a href="../landingpage.php"><img class="nav-logo" src="../images/nav-logo.png" alt="navigation-logo"></a>
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

    <div class="main-content">
        <div class="left-container">
            <div class="h1-main">
                <h1 class="span-one">
                    There Will Always
                </h1>
                <h1 class="span-two">Be <span class="span-two-one">Storm in</span></h1>
                <h1 class="span-three">Our Journey</h1>
            </div>
            <div class="automotive">
                <div class="service-logo">
                    <div class="auto-logo">
                        <img class="autodoc-logo" src="../images/autodoc-logo.png" alt="autodoc-logo">
                    </div>
                    <div class="automotive-span">
                        <span class="auto-span-one"> Professional Automotive
                        </span>
                        <span class="auto-span-two">Tools and Services</span>
                    </div>
                </div>
                <span class="description">
                    Why settle for routine service,
                    when extra ordinary is available.
                    Call (639) 123445624 or click the 
                    Schedule Service button below to
                     schedule service at <span class="autodoc">AutoDoc</span> services. 
                </span>
            </div>
            <div class="enable">
                <a href="../loginpage/loginpage.php"><button class="sign-in">Sign in</button></a>
            </div>
        </div>
        <div class="right-container">
            <img class="landing-image" src="../images/landing-image.png" alt="landing-image">
        </div>        
    </div>

    <div class="second-section">
        <div class="top-container"></div>
        <div class="bottom-container">
            <div class="first-description">
                <div class="description-content">
                    <div class="image-content">
                        <img src="../images/img1.png" alt="">
                    </div>
                    <div class="first-content">
                        <h2>Multiple</h2>
                        <h2> 
                        Achievements
                        </h2>
                    </div>  
                    <div class="paragraph-content">
                        <p>An automotive brand that focus on giving the customer the best industrial and professional tools</p>
                    </div>
                </div>
            </div>
            <div class="second-description">
                <div class="description-content">
                    <div class="image-content">
                        <img src="../images/img2.png" alt="">
                    </div>
                    <div class="first-content">
                        <h2>High Quality</h2>
                        <h2>Affordable Products</h2>
                    </div>  
                    <div class="paragraph-content">
                        <p>An automotive brand that focus on giving the customer the best industrial and professional tools</p>
                    </div>
                </div>
            </div>
            <div class="third-description">
                <div class="description-content">
                    <div class="image-content">
                        <img src="../images/img3.png" alt="">
                    </div>
                    <div class="first-content">
                        <h2>Excellent Service</h2>
                        <h2>Trustworthy Tools</h2>
                    </div>  
                    <div class="paragraph-content">
                        <p>An automotive brand that focus on giving the customer the best industrial and professional tools</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <footer>
   </footer>
   <script src="landing.js"></script>
</body>
</html>
