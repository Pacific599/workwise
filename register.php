<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "workwise";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

// Check if passwords match
if ($password !== $confirmPassword) {
  echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
  exit();
}

// Check if username already exists
$check = $conn->prepare("SELECT * FROM users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
  echo "<script>alert('Username already taken!'); window.history.back();</script>";
  exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if ($stmt->execute()) {
  echo "<script>alert('Registered successfully! Please login.'); window.location.href='index.php';</script>";
} else {
  echo "Error: " . $stmt->error;
}

$conn->close();
?>
