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
  <title>Register - WorkWise AI</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="pagestyle"/>
  <style>
    
     .login-box {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      padding: 30px 25px;
      border-radius: 12px;
      width: 100%;
      max-width: 350px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(15px);
      color: black;
    }

    .login-box h2 {
      margin-bottom: 20px;
      text-align: center;
      font-size: 24px;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      background-color: #f5f5f5;
      color: #333;
      text-align: center;
    }

    .login-box input::placeholder {
      text-align: center;
    }

    .login-box input:focus {
      outline: none;
      border: 1px solid #4ca1af;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background-color: #4ca1af;
      color: white;
      font-size: 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-box button:hover {
      background-color: #3b8c99;
    }

    .links {
      margin-top: 10px;
      text-align: center;
    }

    .links a {
      color: black;
      font-size: 13px;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    } 

    </style>
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

  <div class="main">
    <div class="login-box">
      <h2>Create Account</h2>
      <form action="register.php" method="POST" onsubmit="return validateForm()">
        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <button type="submit">Register</button>
        <div class="links">
          <a href="login.html">Already have an account? Login</a>
        </div>
      </form>
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

  <script>
    function validateForm() {
      const password = document.querySelector('input[name="password"]').value;
      const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
