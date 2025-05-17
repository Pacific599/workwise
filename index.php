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
  <title>WorkWise AI</title>
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
  

  <header class="header-section">
    <h1><b>Make Smarter Career Decisions</b></h1>
    <p><b>Upload your job contract and get AI-driven insights to evaluate your offer.</b></p>
  </header>


  <section class="features-section">
    <h2>Why Use WorkWise AI?</h2>
    <ul class="features-list">
      <li><b>📄 Analyze your job contract for hidden clauses.</b></li>
      <li><b>💰 Get insights on salary fairness and benefits.</b></li>
      <li><b>⚖️ Identify potential legal issues before signing.</b></li>
      <li><b>📊 Compare your offer with industry standards.</b></li>
      <li><b>🛡️ Ensure job security and understand NDAs.</b></li>
    </ul>
  </section>

  <main class="upload-section">
    <div class="upload-box">
      <h3 style="margin-bottom: 15px;">Upload Your Contract</h3>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="contractFile" accept=".pdf,.doc,.docx" required>
            <br />
            <button type="submit">Analyze Contract</button>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 WorkWise AI. All rights reserved.</p>
    <div class="footer-socials">
      <a href="#">🌐</a>
      <a href="#">📘</a>
      <a href="#">🐦</a>
    </div>
  </footer>

</body>
</html>
