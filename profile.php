<?php

include 'config.php';

// Start the session
session_start();

// Redirect to login page if the user is not authenticated
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Retrieve user information from the session
$user = $_SESSION['user'];
$username = $user['username']; 
$usertype = $user['usertype'];

// Query to retrieve user details for the logged-in user
$sql = "SELECT name, username, nic, designation FROM userdetails WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user details were found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $username = $row["username"];
    $nic = $row["nic"];
    $designation = $row["designation"];
    
    
} else {
    echo "User details not found.";
}


// Close the statement and connection
$stmt->close();
$conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            padding-top: 56px;
        }
        .profile-header {
            background-color: white;
            color: black;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<!-- Top Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">U O J | D C S</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="<?php echo ($usertype == 'Management Assistant') ? 'dashboardMA.php' : (($usertype == 'Head') ? 'summary.php' : 'staffView.php'); ?>">Dashboard</a>

                </li>
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

<!-- Profile Section -->
<!-- Profile Section -->
<div class="container mt-5">
    <p>Welcome, <?php echo htmlspecialchars($name); ?>!</p>

    <div class="profile-header text-center mb-5">
        <div class="profile-image me-4">
            <img src="sampleProfile.jpg" alt="User Image" class="rounded-circle" width="150" height="150" style="border: 4px solid #007bff;">
        </div>

        <h3 class="card-title"><?php echo htmlspecialchars($user['name']); ?></h3>
        <p class="text-muted"><?php echo htmlspecialchars($designation); ?></p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- User Profile Card -->
            <div class="card p-4" style="border-radius: 15px;">
                <div class="card-body d-flex align-items-center">
                    <!-- Profile Image -->
                    

                    <!-- User Info Section -->
                    <div class="flex-grow-1">
                        

                        <!-- User Details Table -->
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    
                                    <tr>
                                        <th scope="row" class="text">Full Name:</th>
                                        <td class="text"><?php echo htmlspecialchars($name); ?></td>
                                    </tr>
                                   
                                    <tr>
                                        <th scope="row" class="text">NIC No:</th>
                                        <td class="text"><?php echo htmlspecialchars($nic); ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row" class="text">Email:</th>
                                        <td class="text"><?php echo htmlspecialchars($username); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text">Designation:</th>
                                        <td class="text"><?php echo htmlspecialchars($designation); ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>


                        <!-- Action Buttons -->
                        <div class="text-start mt-4">
                            <a href="edit_profile.php" class="btn btn-custom me-2">Edit Profile</a>
                            <a href="settings.php" class="btn btn-custom">Account Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle (Includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>>
</body>
</html>
