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
            background-color: rgba(0, 123, 255, 0.8); /* Semi-transparent primary color */
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* White background for cards */
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .card-title {
            font-size: 1rem;
            margin-bottom: 15px;
            color: black;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .text-center{

            
        }
        .custom-col {
    width: 150px;  /* Fixed width */
    height: 250px; /* Fixed height */
    }

    .card {
    height: 100%; /* Ensure card takes full height of column */
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



    <!-- Main Content Area -->
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="header">
            <h1 class="text-center mb-2">Examination Claim System</h1>
        </div>

        <!-- Welcome Message -->
        <h2 class="text-center  text-black mb-4">ABOUT</h2>
        <p class="text-center  text-black">The Examination Payment System for staff at the University of Jaffna's Faculty of Science, Department of Computer Science, facilitates seamless and secure processing of exam-related payments. This system ensures timely transactions and effective management of financial responsibilities related to academic evaluations</p>
                
        <div class="row text-center mt-4">
           
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.charles.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 100%; height: auto; max-width: 150px; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Dr.E.Y.A.Charles</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mis.Barathy.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height:150px; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Dr.(Mrs).B.Mayurathan</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.mahesen.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Dr.S.Mahesan</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.Thabodaran.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Dr.K.Thabotharan</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.ramanan.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Prof.A.Ramanan</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.sudakran.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Mr.S.Suthakar</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.shamalan.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Prof.M.Siyamalan</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.sarves.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Mr.K.Sarveswaran</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mr.Kokul.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Dr.T.Kokul</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mis.Nirthika.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Ms.R.Nirthika</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="./staffpic/Mis.samantha.jpg" class="card-img-top" alt="Dr. E. Y. A. Charles" style="width: 150px; height: auto; margin: auto;">
                     <div class="card-body">
                         <h5 class="card-title">Ms.J.S.Tharani</h5>
                        <a href="payment.php" class="btn btn-custom">View</a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <!-- Bootstrap JS Bundle (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
