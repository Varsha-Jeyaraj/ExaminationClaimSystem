<?php
// Start the session
session_start();

// Redirect to login page if the user is not authenticated
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Retrieve user information from the session
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>

        body {
            background-image: url('https://wallpaper-house.com/data/out/9/wallpaper2you_339572.jpg');
            background-size: cover; 
            background-repeat: no-repeat; 
            padding-top: 70px;
            background-color: #f8f9fa;
            color: #fff;
        }
        .header {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-left: -20px;
            margin-right: -20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        /* Optional: Custom styles for quick actions card */
        .card {
            margin-top: 20px;
        }
        .content{
            max-width: 1000px; /* Set max-width to 600px */
            margin: 0 auto;
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
                <ul class="navbar-nav me-auto mb-5 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php">Payment Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="summary.php">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="approved.php">Approved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Registerform.php">Add User</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($user['usertype']." : ".$user['name']); ?>
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

<div class="content">
    <div class="header">
        <h2>Approved Claims</h2>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Claim ID</th>
                <th scope="col">Staff Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Date Approved</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example approved claims data -->
            <tr>
                <td>001</td>
                <td>John Doe</td>
                <td>$500</td>
                <td>2024-01-05</td>
            </tr>
            <tr>
                <td>002</td>
                <td>Jane Smith</td>
                <td>$300</td>
                <td>2024-01-10</td>
            </tr>
            <!-- Additional rows can be added here -->
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
