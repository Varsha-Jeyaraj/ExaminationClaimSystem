<?php
session_start();

// Redirect to login page if the user is not authenticated
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Retrieve user information from the session
$user = $_SESSION['user'];
?>

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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="fillFormDropdown" role="button" 
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Fill Form
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="fillFormDropdown">
                        <li><a class="dropdown-item" href="Form_2.php">For Evaluation</a></li>
                        <li><a class="dropdown-item" href="Form_3.php">Form 3</a></li>
                    </ul>
                </li>
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
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo htmlspecialchars($user['usertype'] . " : " . $user['name']); ?>
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
