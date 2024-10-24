


<?php
include 'config.php';




// Retrieve form data
$name = $_POST['Name'] ?? '';
$email = $_POST['Email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$usertype = $_POST['usertype'] ?? '';

// Debug output
echo "<pre>";
var_dump($name, $email, $username, $password, $usertype);
echo "</pre>";

// Check for empty fields
if (empty($name) || empty($email) || empty($username) || empty($password) || empty($usertype)) {
    echo 'All fields are required!';
    exit;
}

// Prepare SQL query
$sql = "INSERT INTO users (name, useremail, username, password, usertype) VALUES (?, ?, ?, ?, ?)";
$statement = $conn->prepare($sql);

if (!$statement) {
    die("Statement preparation failed: " . $cons->error);
}

// Bind parameters
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$statement->bind_param("sssss", $name, $email, $username, $hashed_password, $usertype);

// Execute the statement
if ($statement->execute()) {
    echo 'Insert Data Success!';
} else {
    die("Insert Data Error: " . $statement->error);
}

// Close the statement
$statement->close();
?>