<?php
session_start();
include 'config.php';

// Assume a simple database query for user validation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
    } else {
        echo "Invalid login details";
    }
}
?>
