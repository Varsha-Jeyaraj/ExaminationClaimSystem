<?php
session_start();
include 'config.php';

// Initialize error variable
$error_message = '';

// Assume a simple database query for user validation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to fetch username, password, usertype, and name
    $stmt = $conn->prepare("
        SELECT users.username, users.password, users.usertype, userdetails.name 
        FROM users
        LEFT JOIN userdetails ON users.username = userdetails.username 
        WHERE users.username = ?
    ");

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the username exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        
        if ($password == $user['password']) {
            $_SESSION['user'] = $user;

            // Redirect based on usertype
            if ($user['usertype'] == "Management Assistant") {
                header('Location: dashboard.php');
                exit; // Stop script execution after redirection
            }
            if ($user['usertype'] == "DCS Staff") {
                header('Location: dashboardDCSStaff.php');
                exit;
            }
            if ($user['usertype'] == "DCS Head") {
                header('Location: dashboardDCSHead.php');
                exit;
            }
        } else {
            // Password is incorrect
            $_SESSION['error_message'] = 'Incorrect password. Please try again.';
            header('Location: index.php');
            exit;
        }
    } else {
        // Username not found
        $_SESSION['error_message'] = 'Username not found. Please check your username.';
        header('Location: index.php');
        exit;
    }
}
?>
