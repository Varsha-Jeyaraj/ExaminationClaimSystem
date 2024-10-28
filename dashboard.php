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
        }
        .header {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        /* Optional: Custom styles for quick actions card */
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Examination Claim System</a>
            <!-- Toggler/collapsible Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-5 mb-lg-0">
                    
                    <!-- nav Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                    <!-- Fill Form Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="fillFormDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Fill Form
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="fillFormDropdown">
                            <li><a class="dropdown-item" href="Form_1.php">Form 1</a></li>
                            <li><a class="dropdown-item" href="Form_2.php">Form 2</a></li>
                            <li><a class="dropdown-item" href="Form_3.php">Form 3</a></li>
                        </ul>
                    </li>
                    <!-- Other Navigation Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php">View Payment Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="summary.php">View Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="approved.php">Check Approved Sheet</a>
                    </li>
                </ul>
                <!-- User Dropdown -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($user['role']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <!-- Optional: Add Profile and Settings links if available -->
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

    <!-- Main Content Area -->
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1 class="text-center mb-2">Administration Registrar Branch</h1>
        </div>
        <!-- Welcome Message -->
         <br>
        <h2 class="text-center mb-2">ABOUT</h2>
        <p class="text-center">The general administration of the university comes under the purview of the Registrar and the Office of the Registrar functions as the central administration office of the entire university.

The Office of the Registrar is the Liaison Office in the central administration of the university system. It liaises with other Departments/Divisions in the university in organizing various meetings of the standing committees. As for administrative functions, he makes appointments with various individuals/experts from institutes outside the university and performs other routine functions. There are administrative ne Divisions in the General Administration and Service Divisions which come under the direct purview of the Registrar. The University of Jaffna with as many as ten faculties with a Campus in Vavuniya nad a vast complex in Kilinochchi with three faculties system of the planning, development and maintenance of services provided by all these Divisions are extremely complex. These activities are monitored by the Office of the Registrar.

Office of the Registrar co-ordinates with all these Divisions – via communication with relevant Heads of Divisions- by providing various instructions and guidance from time to time to ensure the smooth functioning of the entire university. In addition, it also works in close collaboration with the Office of the Vice-Chancellor as the Registrar functions under the direction and control of the Vice-Chancellor. The directions given by the Vice-Chancellor with regard to general administration are usually channeled through the Registrar. With regard to the implementation of activities on the directions of the Vice Chancellor, the Office of the Registrar liaises with the administrative and service divisions communicating relevant information and directions to them.</p>
        <!-- Quick Actions Card -->

    </div>

    <!-- Bootstrap JS Bundle (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
