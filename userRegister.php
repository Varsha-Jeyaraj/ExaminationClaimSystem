<?php
include 'config.php';

// Retrieve form data
$name = $_POST['Name'] ?? '';
$nic = $_POST['nic'] ?? '';
$designation = $_POST['designation'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$usertype = $_POST['usertype'] ?? '';

// Debug output
echo "<pre>";
var_dump($name, $nic, $designation, $username, $password, $usertype);
echo "</pre>";

// Check for empty fields
if (empty($name) || empty($nic) || empty($designation) || empty($username) || empty($password) || empty($usertype)) {
    echo 'All fields are required!';
    exit;
}

// Check if the username already exists
$checkQuery = "SELECT COUNT(*) FROM userdetails WHERE username = ? UNION SELECT COUNT(*) FROM users WHERE username = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bind_param("ss", $username, $username);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();

if ($count > 0) {
    echo "Username already exists!";
    $checkStmt->close();
    exit;
}
$checkStmt->close();

// Prepare and execute the first SQL query
$sql1 = "INSERT INTO userdetails (username, name, nic, designation) VALUES (?, ?, ?, ?)";
$statement1 = $conn->prepare($sql1);

if (!$statement1) {
    die("Statement preparation failed: " . $conn->error);
}

$statement1->bind_param("ssss", $username, $name, $nic, $designation);

if ($statement1->execute()) {
    echo 'Insert Data user details Success!';
} else {
    die("Insert Data Error: " . $statement1->error);
}

// Prepare and execute the second SQL query
$sql2 = "INSERT INTO users (username, password, usertype) VALUES (?, ?, ?)";
$statement2 = $conn->prepare($sql2);

if (!$statement2) {
    die("Statement preparation failed: " . $conn->error);
}

$statement2->bind_param("sss", $username, $password, $usertype);

if ($statement2->execute()) {
    echo 'Insert Data user Success!';
} else {
    die("Insert Data Error: " . $statement2->error);
}

// Close the statements
$statement1->close();
$statement2->close();
?>
