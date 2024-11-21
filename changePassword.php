<?php
session_start();
include 'config.php'; // Database configuration file
include 'navbar-staff.php'; // Optional, includes the navigation bar

// Redirect to login page if the user is not authenticated
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Fetch the username from the session data
$username = $_SESSION['user']['username'];
$errors = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate input
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        $errors[] = "All fields are required.";
    } elseif ($newPassword !== $confirmPassword) {
        $errors[] = "New passwords do not match.";
    } else {
        // Query the database for the user's current password
        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($dbPassword);
        $stmt->fetch();
        $stmt->close();

        // Verify old password and hash new password if old password is correct
        if (password_verify($oldPassword, $dbPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the user's password in the database
            $update_sql = "UPDATE users SET password = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $hashedPassword, $username);

            // Check for successful update and redirect with success message
            if ($update_stmt->execute()) {
                session_destroy(); // Log out the user after password change
                header('Location: index.php?message=Password changed successfully. Please log in with your new password.');
                exit();
            } else {
                $errors[] = "Error updating password.";
            }
        } else {
            $errors[] = "Old password is incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Examination Claim System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="payment.php">Payment Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="summary.php">Summary</a></li>
                    <li class="nav-item"><a class="nav-link" href="approved.php">Approved</a></li>
                    <li class="nav-item"><a class="nav-link" href="Registerform.php">Add User</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['user']['usertype']." : ".$_SESSION['user']['name']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="container form-container">
        <h2 class="text-center">Change Password</h2>

        <!-- Display any error messages -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Password Change Form -->
        <form method="POST">
            <div class="mb-3">
                <input type="password" name="oldPassword" class="form-control" placeholder="Old Password" required>
            </div>
            
            <div class="mb-3">
                <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>
            </div>
            
            <div class="mb-3">
                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm New Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Change Password</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    echo "<br><br><br>"; 
    include 'footer.php'; 
?>
