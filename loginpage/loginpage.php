<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AutoDoc - Driven by your needs</title>
    <link rel="stylesheet" type="text/css" href="loginpage.css" />
    <link rel="stylesheet" href="../landingpage/preloader.css">
    <link rel="icon" type="image/x-icon" href="../images/autodoc-icon.png">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="login.php" method="POST" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <a class="social-text" href="../forgotpassword/forgotpage.html">Forgot Password?</a> 
            <input type="submit" value="Login" class="btn solid"/>

          
            <div class="social-media">
              <a href="https://www.facebook.com/" class="social-icon"> 
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://x.com/home" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://gmail.com/" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://www.linkedin.com/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>


          <form action="register.php" method="POST" class="sign-up-form">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="radio">
  <p>Please select user type:</p>
  <div class="radio-button">
    <label for="customer">
      <input type="radio" id="customer" name="userType" value="customer" required checked> Customer
    </label>
    <label for="admin">
      <input type="radio" id="admin" name="userType" value="admin"> Admin
    </label>
  </div>
</div>
            <input type="submit" value="Sign Up" class="btn solid" />



         
            <div class="social-media">
              <a href="https://www.facebook.com/" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://x.com/home" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://gmail.com/" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://www.linkedin.com/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h3>Create Account</h3>
                <p>Looking for affordable and high in quality products? Create a free account now! With an account, you can buy online on your own time.</p>
                <button class="btn transparent" id="sign-up-btn">Sign Up</button>
            </div>
            <img src="" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>Keep your car running smoothly.</h3>
                <p>Your car's personal assistant awaits. Sign in for a one-stop shop to view detailed service records, and access exclusive discounts, keeping you on the road and in budget.</p>
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <img src="" class="image" alt="">
        </div>
      </div>
    </div>
    <script src="loginpage.js"></script>
  </body>
</html>
