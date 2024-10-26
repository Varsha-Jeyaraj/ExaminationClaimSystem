<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

include 'config.php'; // Your database configuration

// Retrieve user information from the session
$user = $_SESSION['user'];

// Handle staff selection
$selected_staff = $_POST['staff'] ?? 'all';
$sql = ($selected_staff == 'all') ? 
    "SELECT staffName, courseCode, examType, preparationType, essayDuration, essayAmount, mcqCount, mcqAmount, pageCount,typingAmount, totalAmount FROM form1" :
    "SELECT staffName,courseCode,examType,preparationType, essayDuration, essayAmount, mcqCount, mcqAmount, pageCount,typingAmount, totalAmount FROM form1 WHERE StaffName = ?";

// Prepare and execute the query
$stmt = $conn->prepare($sql);
if ($selected_staff != 'all') {
    $stmt->bind_param("s", $selected_staff); // Bind selected staff name if specific staff is chosen
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
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
        .content {
            max-width: 1000px;
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
                    <li class="nav-item"><a class="nav-link" href="dashboardMA.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="payment.php">Payment Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="summary.php">Summary</a></li>
                    <li class="nav-item"><a class="nav-link" href="approved.php">Approved</a></li>
                    <li class="nav-item"><a class="nav-link" href="Registerform.php">Add User</a></li>
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
        <h2>Payment Details for Staff</h2>
    </div>
    
    <!-- Form to Select Staff Member -->
    <form method="POST" action="payment.php" class="mb-4">
        <div class="mb-3">
            <label for="staff" class="form-label">Select Staff:</label>
            <select id="staff" name="staff" class="form-select" onchange="this.form.submit()">
                <option value="all" <?php echo ($selected_staff == 'all') ? 'selected' : ''; ?>>All</option>
                <option value="Dr. S. Mahesan" <?php echo ($selected_staff == 'Dr. S. Mahesan') ? 'selected' : ''; ?>>Dr. S. Mahesan</option>
                <option value="Dr. E. Y. A. Charles" <?php echo ($selected_staff == 'Dr. E. Y. A. Charles') ? 'selected' : ''; ?>>Dr. E. Y. A. Charles</option>
                <option value="Dr. K. Thabotharan" <?php echo ($selected_staff == 'Dr. K. Thabotharan') ? 'selected' : ''; ?>>Dr. K. Thabotharan</option>
                <option value="Prof. A. Ramanan" <?php echo ($selected_staff == 'Prof. A. Ramanan') ? 'selected' : ''; ?>>Prof. A. Ramanan</option>
                <option value="Mr. S. Suthakar" <?php echo ($selected_staff == 'Mr. S. Suthakar') ? 'selected' : ''; ?>>Mr. S. Suthakar</option>
                <option value="Dr. (Mrs.) B. Mayurathan" <?php echo ($selected_staff == 'Dr. (Mrs.) B. Mayurathan') ? 'selected' : ''; ?>>Dr. (Mrs.) B. Mayurathan</option>
                <option value="Prof. M. Siyamalan" <?php echo ($selected_staff == 'Prof. M. Siyamalan') ? 'selected' : ''; ?>>Prof. M. Siyamalan</option>
                <option value="Dr. K. Sarveswaran" <?php echo ($selected_staff == 'Dr. K. Sarveswaran') ? 'selected' : ''; ?>>Dr. K. Sarveswaran</option>
                <option value="Dr. S. Shriparen" <?php echo ($selected_staff == 'Dr. S. Shriparen') ? 'selected' : ''; ?>>Dr. S. Shriparen</option>
                <option value="Dr. T. Kokul" <?php echo ($selected_staff == 'Dr. T. Kokul') ? 'selected' : ''; ?>>Dr. T. Kokul</option>
                <option value="Dr. (Ms.) J. Samantha Tharani" <?php echo ($selected_staff == 'Dr. (Ms.) J. Samantha Tharani') ? 'selected' : ''; ?>>Dr. (Ms.) J. Samantha Tharani</option>
                <option value="Dr. (Ms.) R. Nirthika" <?php echo ($selected_staff == 'Dr. (Ms.) R. Nirthika') ? 'selected' : ''; ?>>Dr. (Ms.) R. Nirthika</option>
                <option value="Ms. M. Mayuravaani" <?php echo ($selected_staff == 'Ms. M. Mayuravaani') ? 'selected' : ''; ?>>Ms. M. Mayuravaani</option>
            </select>
        </div>
    </form>

    <!-- Payment Details Table -->
    <table class="table table-striped">
        <thead>
            <tr>
            <th colspan="10">
                        <?php
                        if ($selected_staff && $selected_staff !== "All") {
                            // Fetch the specific staff's information
                            $staff_details_sql = "SELECT name, nic, designation FROM userdetails WHERE name = ?";
                            $staff_stmt = $conn->prepare($staff_details_sql);
                            $staff_stmt->bind_param("s", $selected_staff);
                            $staff_stmt->execute();
                            $staff_details_result = $staff_stmt->get_result();
                            $staff_details = $staff_details_result->fetch_assoc();

                            // Display selected staff information if found
                            if ($staff_details) {
                                echo htmlspecialchars($staff_details['name']) . " | NIC: " . htmlspecialchars($staff_details['nic']) . " | Designation: " . htmlspecialchars($staff_details['designation']);
                            } else {
                                echo "Staff details not available";
                            }
                            $staff_stmt->close();
                        } elseif($selected_staff == "All") {
                            echo "All Staff Payment Details";
                        }
                        ?>
                    </th>
            </tr>
            <tr>
                <th scope="col">Course Code</th>
                <th scope="col">Exam Type</th>
                <th scope="col">Preparation Type</th>
                <th scope="col">Essay Duration</th>
                <th scope="col">Amount for Essay</th>
                <th scope="col">MCQ Count</th>
                <th scope="col">Amount for MCQ</th>
                <th scope="col">Pages Count</th>
                <th scope="col">Amount for Typing</th>
                <th scope="col">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display fetched data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>{$row['courseCode']}</td>
                            <td>{$row['examType']}</td>
                            <td>{$row['preparationType']}</td>
                            <td>{$row['essayDuration']}</td>
                            <td>{$row['essayAmount']}</td>
                            <td>{$row['mcqCount']}</td>
                            <td>{$row['mcqAmount']}</td>
                            <td>{$row['pageCount']}</td>
                            <td>{$row['typingAmount']}</td>
                            <td>{$row['totalAmount']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close database connection and statement
$stmt->close();
$conn->close();
?>
