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

// here is sample data for claims

$claims = [
    [
        'staff' => 'Dr. S. Mahesan',
        'NIC' => '123456789V',
        'year' => '2023',
        'semester' => 'Semester 1',
        'examName' => 'General Degree Examination in Science, Level 1G',
        'examType' => 'Theory',
        'role' => 'Setting',
        'essayDuration' => '3 Hours',
        'mcqCount' => 30,
        'typingPages' => '3 Pages'
    ],
	 [
        'staff' => 'Dr. K. Thabotharan',
        'NIC' => '627665445V',
        'year' => '2024',
        'semester' => 'Semester 1',
        'examName' => 'BSc Degree Examination in Computer Science, Level 3S',
        'examType' => 'Theory',
        'role' => 'Setting',
        'essayDuration' => '3 Hours',
        'mcqCount' => 40,
        'typingPages' => '4 Pages'
    ],
    [
        'staff' => 'Prof. A. Ramanan',
        'NIC' => '787654321V',
        'year' => '2023',
        'semester' => 'Semester 2',
        'examName' => 'BSc Degree Examination in Computer Science, Level 1S',
        'examType' => 'Practical',
        'role' => 'Moderating',
        'essayDuration' => '2 Hours',
        'mcqCount' => 25,
        'typingPages' => '2 Pages'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-left: -20px;
            margin-right: -20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .summary-container {
            max-width: 900px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
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
                        <a class="nav-link active" href="summary.php">Summary</a>
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

    <!-- Main Content Area -->
    <div class="container summary-container">
        <div class="header">
            <h1><center>Summary</center></h1>
        </div>

        <!-- Summary Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Staff Name</th>
                    <th>NIC Number</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Exam Name</th>
                    <th>Exam Type</th>
                    <th>Role</th>
                    <th>Essay Duration</th>
                    <th>MCQs</th>
                    <th>Typing Pages</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($claims as $claim): ?>
                <tr>
                    <td><?php echo htmlspecialchars($claim['staff']); ?></td>
                    <td><?php echo htmlspecialchars($claim['NIC']); ?></td>
                    <td><?php echo htmlspecialchars($claim['year']); ?></td>
                    <td><?php echo htmlspecialchars($claim['semester']); ?></td>
                    <td><?php echo htmlspecialchars($claim['examName']); ?></td>
                    <td><?php echo htmlspecialchars($claim['examType']); ?></td>
                    <td><?php echo htmlspecialchars($claim['role']); ?></td>
                    <td><?php echo htmlspecialchars($claim['essayDuration']); ?></td>
                    <td><?php echo htmlspecialchars($claim['mcqCount']); ?></td>
                    <td><?php echo htmlspecialchars($claim['typingPages']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
