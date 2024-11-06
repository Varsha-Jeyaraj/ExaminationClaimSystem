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
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            padding-top: 56px;
        }
        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
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
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
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

<!-- Edit Profile Section -->
<div class="container mt-5">
    <div class="card">
        <div class="profile-header text-center mb-5">
            <h3 class="text-center">Edit Profile</h3>
        </div>
        
        <form action="update_profile.php" method="POST" class="mt-4">
            <div class="row">
                <!-- Index Number -->
                <div class="col-md-6 mb-3">
                    <label for="index" class="form-label">Index Number</label>
                    <input type="text" class="form-control" id="index" name="index" 
                           value="<?php echo htmlspecialchars($user['index']); ?>" readonly>
                </div>
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>
            </div>
            <div class="row">
                <!-- Date of Birth -->
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" 
                           value="<?php echo htmlspecialchars($user['dob']); ?>" required>
                </div>
                <!-- NIC Number -->
                <div class="col-md-6 mb-3">
                    <label for="nic" class="form-label">NIC Number</label>
                    <input type="text" class="form-control" id="nic" name="nic" 
                           value="<?php echo htmlspecialchars($user['nic']); ?>" required>
                </div>
            </div>
            <div class="row">
                <!-- Gender -->
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
            </div>
            <div class="row">
                <!-- Phone -->
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" 
                           value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                </div>
                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" 
                           value="<?php echo htmlspecialchars($user['address']); ?>" required>
                </div>
            </div>
            <div class="row">
                <!-- Department -->
                <div class="col-md-12 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department" 
                           value="<?php echo htmlspecialchars($user['department']); ?>" readonly>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-custom">Save Changes</button>
                <a href="profile.php" class="btn btn-custom ms-3" style="background-color: #be0000; color: white; border-radius: 20px; padding: 10px 20px;">Cancel</a>

            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS Bundle (Includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
