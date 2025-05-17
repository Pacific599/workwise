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
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="pagestyle.css" />
  <title>FAQ - WorkWise AI</title>
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

  <div class="main-content">
    <div class="faq-container">
      <h1>Frequently Asked Questions (FAQ)</h1>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What is CTC (Cost to Company)?</h3>
        <p>CTC is the total amount a company spends on an employee in a year. It includes salary, bonuses, PF, gratuity, and other benefits. The in-hand salary is usually lower than CTC as deductions apply.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What is an NDA (Non-Disclosure Agreement)?</h3>
        <p>An NDA is a legal contract between an employee and employer that restricts sharing confidential company information with outsiders.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">Can a company keep my original documents?</h3>
        <p>No, as per Indian labor laws, an employer cannot keep an employee's original certificates or documents. If a company asks for them, you can refuse and report it to labor authorities.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What is a bond agreement? Is it legal?</h3>
        <p>Some companies require employees to sign a bond to stay for a specific period, failing which they must pay a penalty. Such agreements are enforceable only if they are reasonable, not exploitative, and if training costs are involved. Forced employment is illegal.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What is the legal working hour limit in India?</h3>
        <p>According to Indian labor laws, an employee should not work more than 48 hours per week, with a maximum of 9 hours per day.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">Can my employer terminate me without notice?</h3>
        <p>No, as per the Industrial Disputes Act, an employer must provide a notice period or compensation before terminating an employee unless it's due to serious misconduct.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">Is Provident Fund (PF) mandatory?</h3>
        <p>Yes, PF is mandatory for companies with over 20 employees. A portion of your salary is contributed to the EPF scheme, which can be withdrawn upon resignation or retirement.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What is gratuity, and when can I claim it?</h3>
        <p>Gratuity is a lump sum amount paid to employees who have worked for more than 5 years in a company. It is regulated under the Payment of Gratuity Act, 1972.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What is a probation period?</h3>
        <p>Probation is a trial period during which an employee's performance is evaluated before confirming permanent employment. It usually lasts 3 to 6 months.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">Is an offer letter legally binding?</h3>
        <p>An offer letter is not legally binding unless it is signed and accepted. However, once a formal employment contract is signed, it becomes enforceable by law.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">Can an employer refuse to give an experience letter?</h3>
        <p>No, an employer cannot deny an experience letter if you have served your notice period. You can take legal action if they refuse to provide it.</p>
      </div>

      <div class="faq-item">
        <h3 onclick="toggleFAQ(this)">What should I check before signing an employment contract?</h3>
        <p>Before signing, check the salary structure, notice period, bond clauses, NDA, working hours, and termination policies. Seek legal advice if any clause seems unfair.</p>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 WorkWise AI. All rights reserved.</p>
    <div class="socials">
      <a href="#">🌐</a>
      <a href="#">📘</a>
      <a href="#">🐦</a>
    </div>
  </footer>

  <script>
    function toggleFAQ(element) {
      const answer = element.nextElementSibling;
      answer.style.display = answer.style.display === "block" ? "none" : "block";
    }
  </script>

</body>
</html>
