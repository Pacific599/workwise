<?php
session_start();
if (!isset($_SESSION['userid'])) {
    die("You must be logged in.");
}

$conn = new mysqli('localhost', 'root', '', 'workwise');
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$userid = $_SESSION['userid'];

// Get the latest uploaded file by this user
$result = $conn->query("SELECT * FROM uploads WHERE user_id = $userid ORDER BY upload_time DESC LIMIT 1");
if ($result->num_rows === 0) {
    die("No uploaded files found.");
}
$row = $result->fetch_assoc();
$filepath = 'uploads/' . $row['filename'];

// Detect file extension
$ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

$content = '';

if ($ext === 'pdf') {
    require_once('vendor/autoload.php'); // If using composer for PDF parser
    $parser = new \Smalot\PdfParser\Parser();
    $pdf = $parser->parseFile($filepath);
    $content = $pdf->getText();
} elseif ($ext === 'doc' || $ext === 'docx') {
    $content = shell_exec("antiword " . escapeshellarg($filepath)); // Linux-based DOC reader
    if (!$content) {
        $content = "Error reading DOC/DOCX file.";
    }
} else {
    die("Unsupported file type.");
}

// Keyword detection
$keywords = [
    'bond', 'service agreement', 'minimum commitment', 'notice period', '3 months notice',
    'non-disclosure', 'confidentiality', 'NDA', 'non-compete', 'cannot join competitors',
    'extra hours', 'beyond working hours', 'weekend work', 'no overtime pay'
];

$found = [];

foreach ($keywords as $keyword) {
    if (stripos($content, $keyword) !== false) {
        $found[] = $keyword;
    }
}

echo "<h2>Analysis Result:</h2>";
if (empty($found)) {
    echo "<p>✅ No suspicious clauses found.</p>";
} else {
    echo "<p>⚠️ Potential clauses detected:</p><ul>";
    foreach ($found as $clause) {
        echo "<li><b>$clause</b></li>";
    }
    echo "</ul>";
}

$conn->close();
?>
