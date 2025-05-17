<?php
session_start();
if (!isset($_SESSION['userid'])) {
    die("You must be logged in to upload a file.");
}

$targetDir = "uploads/";
$userid = $_SESSION['userid'];

if (isset($_FILES['contractFile'])) {
    $fileName = basename($_FILES['contractFile']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Extract file extension
    $fileExtension = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    echo "File extension: " . $fileExtension;  // This will show the file extension
    
    $allowedTypes = array('pdf', 'doc', 'docx');
    if (in_array(strtolower($fileExtension), $allowedTypes)) {
        if (move_uploaded_file($_FILES['contractFile']['tmp_name'], $targetFilePath)) {
            // Save record to database
            $conn = new mysqli('localhost', 'root', '', 'workwise');
            if ($conn->connect_error) {
                die("Database connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO uploads (user_id, filename, original_name, upload_time) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("iss", $userid, $fileName, $_FILES['contractFile']['name']);

            if ($stmt->execute()) {
                echo "File uploaded and saved!";
            } else {
                echo "Database error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
    }
} else {
    echo "No file uploaded.";
}
?>
