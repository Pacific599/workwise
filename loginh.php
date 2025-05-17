<?php
session_start(); // Start the session at the top of the page

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['userid'])) {
    // User is not logged in, can show login options
} else {
    // User is logged in, you can use session data like $_SESSION['username']
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - WorkWise AI</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="pagestyle.css" />
</head>
<body>
<nav>
    <div class="nav-logo">WorkWise AI</div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="abouth.php">About</a></li>
      <li><a href="faqh.php">FAQ</a></li>
      <?php if (isset($_SESSION['userid'])): ?>
        <!-- Show Logout button if user is logged in -->
        <li><button class="login-btn" onclick="location.href='logout.php'">Logout</button></li>
      <?php else: ?>
        <!-- Show Login button if user is not logged in -->
        <li><button class="login-btn" onclick="location.href='loginh.php'">Login</button></li>
      <?php endif; ?>
    </ul>
  </nav>

  <div class="login-main-wrapper">
    <div class="login-box-unique">
      <h2>Welcome Back</h2>
      <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>

      <div class="login-links">
        <a href="#">Forgot Password?</a> | <a href="registerh.php">Sign Up</a>
      </form>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 WorkWise AI. All rights reserved.</p>
    <div>
      <a href="#">🌐</a>
      <a href="#">📘</a>
      <a href="#">🐦</a>
    </div>
  </footer>
</body>
</html>
