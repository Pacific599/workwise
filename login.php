<?php
include 'db.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Query the database for the user
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $row = $result->fetch_assoc();

  // Verify the password
  if (password_verify($password, $row['password'])) {
    // Set session variables after login
    session_start();
    $_SESSION['userid'] = $row['id']; // Store user id in session
    $_SESSION['username'] = $row['username']; // Store username in session
    echo "<script>window.location.href='index.php';</script>"; // Redirect to home page
  } else {
    echo "<script>alert('Incorrect password'); window.history.back();</script>";
  }
} else {
  echo "<script>alert('User not found'); window.history.back();</script>";
}

$conn->close();
?>
