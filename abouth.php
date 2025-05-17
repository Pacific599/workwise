<?php
session_start(); 

if (!isset($_SESSION['userid'])) {
    // User is not logged in, can show login options
} else {
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About - WorkWise AI</title>
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

  <div class="about-container">
    <h1>About WorkWise AI</h1>
    <p><strong>WorkWise AI</strong> is our Final Year BCA Project developed as part of our academic curriculum at <br>
      "Government First Grade College and Center for PG Studies, Thenkanidiyur, Udupi".</p>

    <h2>Project Overview</h2>
    <p>Our project, <strong>WorkWise AI - AI Job Contract Negotiator</strong>, helps professionals analyze job contracts efficiently.  
      Users can upload their job contracts, and our system provides AI-driven insights on salary fairness,  
      legal aspects, workload, NDAs, and other key factors to assist in making informed career decisions.</p>

    <h2>Team Members</h2>
    <ul class="team-list">
      <li>HARSHAL J AMIN U05GT22S0024</li>
      <li>ANISH U05GT22S0034</li>
      <li>DEERAJ U05GT22S0041</li>
      <li>HEGDE PRASHANT RAVI U05GT22S0042</li>
    </ul>
  </div>

  <footer>
    <p>&copy; 2025 WorkWise AI. All rights reserved.</p>
    <div class="socials">
      <a href="#">🌐</a>
      <a href="#">📘</a>
      <a href="#">🐦</a>
    </div>
  </footer>

</body>
</html>
