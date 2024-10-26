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
            /* Prevent content from being hidden behind the fixed navbar */
            padding-top: 70px;
            background-color: #f8f9fa;
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
                            
                            <li><a class="dropdown-item" href="Form_2.php">For Evaluation</a></li>
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
    <div class="container form-container">
        <div class="header">
            <h1 class="form-title mb-1">Examination Claim Form I</h1>
            <h3 class="form-title mb-1">Preparation of Question Paper</h3>
        </div>
        <br><br>


    <div class="container form-container">
        <form action="/submit-claim" method="post">            
            <!-- Staff Name -->
            <div class="mb-3">
                <label for="staff" class="form-label">Staff Name:</label>
                <select id="staff" name="staff" class="form-select" required>
                    <option selected disabled value="">Select Staff Name</option>
                    <option>Dr. S. Mahesan</option>
                    <option>Dr. E. Y. A. Charles</option>
                    <option>Dr. K. Thabotharan</option>
                    <option>Prof. A. Ramanan</option>
                    <option>Dr. (Mrs). B. Mayurathan</option>
                    <option>Mr. S. Suthakar</option>
                    <option>Prof. M. Siyamalan</option>
                    <option>Dr. S. Shriparen</option>
                    <option>Dr. K. Sarveswaran</option>
                    <option>Dr. T. Kokul</option>
                    <option>Ms. J. Samantha Tharani</option>
                    <option>Ms. R. Nirthika</option>
                    <option>Ms. M. Mayuravaani</option>
                </select>
            </div>
            
            
            
            <!-- Year and Semester -->
            <div class="mb-3">
                <label for="code" class="form-label">Course Code:</label>
                <input type="text" id="code" name="code" class="form-control" placeholder="Enter Course Code" required>
            </div>
                
            
            
            
            
            <!-- Exam Type -->
            <fieldset class="mb-3">
                <legend class="col-form-label pt-0">Exam Type:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="examType" id="theory" value="Theory" required>
                    <label class="form-check-label" for="theory">
                        Theory
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="examType" id="practical" value="Practical" required>
                    <label class="form-check-label" for="practical">
                        Practical
                    </label>
                </div>
            </fieldset>
            
            <!-- Setting or Moderating -->
            <fieldset class="mb-3">
                <legend class="col-form-label pt-0">Setting or Moderating:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="role" id="Setting" value="Setting" required>
                    <label class="form-check-label" for="Setting">
                        Setting
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="role" id="Moderating" value="Moderating" required>
                    <label class="form-check-label" for="Moderating">
                        Moderating
                    </label>
                </div>
            </fieldset>
            
            <!-- Essay Duration -->
            <div class="mb-3">
                <label for="essayDuration" class="form-label">Essay Duration:</label>
                <select id="essayDuration" name="essayDuration" class="form-select" required>
                    <option selected disabled value="">Select Duration</option>
                    <option>1 Hour</option>
                    <option>2 Hours</option>
                    <option>3 Hours</option>
                </select>
            </div>
            
            <!-- Amount for essay-->
            <div class="mb-3">
            <label for="amount1" class="form-label">Amount (Rs. 400 per hour):</label>
            <input type="text" id="amount1" name="amount1" class="form-control" readonly>
            </div>

            <!-- Number of MCQ Questions -->
            <div class="mb-3">
                <label for="mcqCount" class="form-label">Number of MCQ Questions:</label>
                <input type="number" id="mcqCount" name="mcqCount" class="form-control" min="0" placeholder="Number of Questions" required>
            </div>

            <div class="mb-3">
            <label for="amount2" class="form-label">Amount (Rs. 50 per question):</label>
            <input type="text" id="amount2" name="amount2" class="form-control" readonly>
            </div>
            
            <!-- Typing Pages -->
            <div class="mb-3">
                <label for="typingPages" class="form-label">Typing:</label>
                <select id="typingPages" name="typingPages" class="form-select" required>
                    <option selected disabled value="">Select Pages</option>
                    <option>1 Page</option>
                    <option>2 Pages</option>
                    <option>3 Pages</option>
                    <option>4 Pages</option>
                    <option>5 Pages</option>
                </select>
            </div>

            <div class="mb-3">
            <label for="amount3" class="form-label">Amount (Rs. 100 per page):</label>
            <input type="text" id="amount3" name="amount3" class="form-control" readonly>
            </div>

            <!-- Total Amount -->
            <div class="mb-3">
                <label for="totalAmount" class="form-label">Total Amount (Rs.):</label>
                <input type="text" id="totalAmount" name="totalAmount" class="form-control" readonly>
            </div>

            
            
            <!-- Submit and Reset Buttons -->
            <div class="row">
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary me-2 submit-btn">Submit</button>
                <button type="reset" class="btn btn-secondary btn-danger reset-btn">Reset</button>
                </div>
            </div>



            

<!-- JavaScript to calculate amount -->
    <script>

    function updateTotalAmount() {
        const amount1 = parseFloat(document.getElementById('amount1').value.replace('Rs. ', '')) || 0;
        const amount2 = parseFloat(document.getElementById('amount2').value.replace('Rs. ', '')) || 0;
        const amount3 = parseFloat(document.getElementById('amount3').value.replace('Rs. ', '')) || 0;
        
        const totalAmount = amount1 + amount2 + amount3;
        
        document.getElementById('totalAmount').value = totalAmount ? `Rs. ${totalAmount}` : '';
       
    }

    document.getElementById('essayDuration').addEventListener('change', function() {
        // Get the selected duration value
        const duration = parseInt(this.value);
        
        // Define the rate (400 Rs per hour)
        const ratePerHour = 400;
        
        // Calculate the amount
        const amount1 = duration * ratePerHour;
        
        // Display the amount in the amount input field
        document.getElementById('amount1').value = amount1 ? `Rs. ${amount1}` : '';
        updateTotalAmount();
    });

    //mcq amount
    document.getElementById('mcqCount').addEventListener('change', function() {
        
        const count = parseInt(this.value);
        
        // Define the rate (400 Rs per hour)
        const ratePerQs = 50;
        
        // Calculate the amount
        const amount2 = count * ratePerQs;
        
        // Display the amount in the amount input field
        document.getElementById('amount2').value = amount2 ? `Rs. ${amount2}` : '';
        updateTotalAmount();
    });

    //typing amount
    document.getElementById('typingPages').addEventListener('change', function() {
        
        const pages = parseInt(this.value);
        
        // Define the rate (400 Rs per hour)
        const ratePerPage = 100;
        
        // Calculate the amount
        const amount3 = pages * ratePerPage;
        
        // Display the amount in the amount input field
        document.getElementById('amount3').value = amount3 ? `Rs. ${amount3}` : '';
        updateTotalAmount();
    });





    </script>
    </form>
    </div>

    <!-- Bootstrap JS Bundle (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
