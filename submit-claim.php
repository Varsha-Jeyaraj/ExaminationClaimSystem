<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "examination_claim_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data with checks for undefined keys
    $staffName = isset($_POST['staffName']) ? $_POST['staffName'] : '';
    $courseCode = isset($_POST['courseCode']) ? $_POST['courseCode'] : '';
    $examType = isset($_POST['examType']) ? $_POST['examType'] : '';
    $preparationType = isset($_POST['preparationType']) ? $_POST['preparationType'] : '';
    $essayDuration = isset($_POST['essayDuration']) ? (double)$_POST['essayDuration'] : 0.0;
    $essayAmount = isset($_POST['essayAmount']) ? (double)str_replace('Rs. ', '', $_POST['essayAmount']) : 0.0;
    $mcqCount = isset($_POST['mcqCount']) ? (int)$_POST['mcqCount'] : 0;
    $mcqAmount = isset($_POST['mcqAmount']) ? (double)str_replace('Rs. ', '', $_POST['mcqAmount']) : 0.0;
    $pageCount = isset($_POST['pageCount']) ? (int)$_POST['pageCount'] : 0;
    $typingAmount = isset($_POST['typingAmount']) ? (double)str_replace('Rs. ', '', $_POST['typingAmount']) : 0.0;
    $totalAmount = isset($_POST['totalAmount']) ? (double)str_replace('Rs. ', '', $_POST['totalAmount']) : 0.0;

    if (empty($staffName) || empty($courseCode)) {
        die("Staff Name and Course Code are required fields.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO form1 (staffName, courseCode, examType, preparationType, essayDuration, essayAmount, mcqCount, mcqAmount, pageCount, typingAmount, totalAmount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssidididd", $staffName, $courseCode, $examType, $preparationType, $essayDuration, $essayAmount, $mcqCount, $mcqAmount, $pageCount, $typingAmount, $totalAmount);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Claim submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
