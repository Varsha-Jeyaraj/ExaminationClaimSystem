
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .content {
            max-width: 1000px;
            margin: 0 auto;
        }
        .staff-details {
            background-color: #e9ecef;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            font-weight: bold;
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

    <!-- Main Content Area -->
    <div class="container form-container">
        <div class="header">
            <h1 class="form-title mb-1">Examination Claim Form I</h1>
            <h3 class="form-title mb-1">Preparation of Question Paper</h3>
        </div>
        <br><br>


    <div class="container form-container">
        <form action="submit-claim.php" method="post">           
            <!-- Staff Name -->
            <div class="mb-3">
                <label for="StaffName" class="form-label">Staff Name:</label>
                <select id="StaffName" name="StaffName" class="form-select" required>
                    <option selected disabled value="">Select Staff Name</option>
                    <option>Dr. S. Mahesan</option>
                    <option>Dr. E. Y. A. Charles</option>
                    <option>Dr. K. Thabotharan</option>
                    <option>Prof. A. Ramanan</option>
                    <option>Dr. (Mrs.) B. Mayurathan</option>
                    <option>Mr. S. Suthakar</option>
                    <option>Prof. M. Siyamalan</option>
                    <option>Dr. S. Shriparen</option>
                    <option>Dr. K. Sarveswaran</option>
                    <option>Dr. T. Kokul</option>
                    <option>Dr. (Ms.) J. Samantha Tharani</option>
                    <option>Dr. (Ms.) R. Nirthika</option>
                    <option>Ms. M. Mayuravaani</option>
                </select>
            </div>
            
            
            
            <!-- Year and Semester -->
            <div class="mb-3">
                <label for="CourseCode" class="form-label">Course Code:</label>
                <input type="text" id="CourseCode" name="CourseCode" class="form-control" placeholder="Enter Course Code" required>
            </div>
                
            
            
            
            
            <!-- Exam Type -->
            <fieldset class="mb-3">
                <legend class="col-form-label pt-0">Exam Type:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ExamType" id="theory" value="Theory">
                    <label class="form-check-label" for="theory">
                        Theory
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ExamType" id="practical" value="Practical">
                    <label class="form-check-label" for="practical">
                        Practical
                    </label>
                </div>
            </fieldset>

            <!-- Setting or Moderating -->
            <fieldset class="mb-3">
                <legend class="col-form-label pt-0">Setting or Moderating:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="PreparationType" id="Setting" value="Setting">
                    <label class="form-check-label" for="Setting">
                        Setting
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="PreparationType" id="Moderating" value="Moderating">
                    <label class="form-check-label" for="Moderating">
                        Moderating
                    </label>
                </div>
            </fieldset>
            
            <!-- Essay Duration -->
            <div class="mb-3">
                <label for="EssayDuration" class="form-label">Essay Duration:</label>
                <select id="EssayDuration" name="EssayDuration" class="form-select" required>
                    <option selected disabled value="">Select Duration</option>
                    <option>1 Hour</option>
                    <option>2 Hours</option>
                    <option>3 Hours</option>
                </select>
            </div>
            
            <!-- Amount for essay-->
            <div class="mb-3">
            <label for="EssayPayment" class="form-label">Essay Amount :</label>
            <input type="text" id="EssayPayment" name="EssayPayment" class="form-control" readonly>
            </div>

            <!-- Number of MCQ Questions -->
            <div class="mb-3">
                <label for="MCQcount" class="form-label">Number of MCQ Questions:</label>
                <input type="number" id="MCQcount" name="MCQcount" class="form-control" min="0" placeholder="Number of Questions" required>
            </div>

            <div class="mb-3">
            <label for="MCQpayment" class="form-label"> MCQ Amount :</label>
            <input type="text" id="MCQpayment" name="MCQpayment" class="form-control" readonly>
            </div>
            
            <!-- Typing Pages -->
            <div class="mb-3">
                <label for="PageCount" class="form-label">Typing:</label>
                <select id="PageCount" name="PageCount" class="form-select" required>
                    <option selected disabled value="">Select Pages</option>
                    <option>1 Page</option>
                    <option>2 Pages</option>
                    <option>3 Pages</option>
                    <option>4 Pages</option>
                    <option>5 Pages</option>
                </select>
            </div>

            <div class="mb-3">
            <label for="TypingPayment" class="form-label">Typing Amount :</label>
            <input type="text" id="TypingPayment" name="TypingPayment" class="form-control" readonly>
            </div>
            <!-- Packeting Supervision -->
            <div class="mb-3">
                <label for="supervisionAmount" class="form-label">Packeting Supervision:</label>
                <input type="text" id="supervisionAmount" name="supervisionAmount" class="form-control" value="Rs. 0" readonly>
            </div>


            <!-- Total Amount -->
            <div class="mb-3">
                <label for="TotalAmount" class="form-label">Total Amount (Rs.):</label>
                <input type="text" id="TotalAmount" name="TotalAmount" class="form-control" readonly>
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
        const EssayPayment = parseFloat(document.getElementById('EssayPayment').value.replace('Rs. ', '')) || 0;
        const MCQpayment = parseFloat(document.getElementById('MCQpayment').value.replace('Rs. ', '')) || 0;
        
        const isSettingSelected = document.getElementById('Setting').checked;
        const isModeratingSelected = document.getElementById('Moderating').checked;

        // Set supervisionAmount and TypingPayment based on preparation type selection
        const supervisionAmount = isSettingSelected ? 100 : 0;
        const TypingPayment = isSettingSelected ? parseFloat(document.getElementById('TypingPayment').value.replace('Rs. ', '')) || 0 : 0;

        // Update TypingPayment field to reflect zero for moderating
        if (isModeratingSelected) {
            document.getElementById('TypingPayment').value = "Rs. 0";
        }

        // Calculate total amount based on preparation type
        let TotalAmount = EssayPayment + MCQpayment + supervisionAmount;
        if (isSettingSelected) {
            TotalAmount += TypingPayment;
        }

        // Display calculated total amount and supervision amount
        document.getElementById('TotalAmount').value = `Rs. ${TotalAmount}`;
        document.getElementById('supervisionAmount').value = `Rs. ${supervisionAmount}`;
    }

    
    document.getElementById('Setting').addEventListener('change', updateTotalAmount);
    document.getElementById('Moderating').addEventListener('change', updateTotalAmount);

    document.getElementById('EssayDuration').addEventListener('change', function() {
        const duration = parseInt(this.value);
        const ratePerHour = 400;
        const EssayPayment = duration * ratePerHour;
        document.getElementById('EssayPayment').value = EssayPayment ? `Rs. ${EssayPayment}` : '';
        updateTotalAmount();
    });

    document.getElementById('MCQcount').addEventListener('change', function() {
        const count = parseInt(this.value);
        const ratePerQs = 50;
        const MCQpayment = count * ratePerQs;
        document.getElementById('MCQpayment').value = MCQpayment ? `Rs. ${MCQpayment}` : '';
        updateTotalAmount();
    });

    document.getElementById('PageCount').addEventListener('change', function() {
        const pages = parseInt(this.value);
        const ratePerPage = 100;
        const TypingPayment = pages * ratePerPage;
        document.getElementById('TypingPayment').value = TypingPayment ? `Rs. ${TypingPayment}` : '';
        updateTotalAmount();
    });

    updateTotalAmount();
</script>


    </form>
    </div>

    <!-- Bootstrap JS Bundle (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
