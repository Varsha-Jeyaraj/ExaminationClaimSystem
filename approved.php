<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://wallpaper-house.com/data/out/9/wallpaper2you_339572.jpg');
            background-size: cover; 
            background-repeat: no-repeat; 
            padding-top: 10px;
            background-color: #f8f9fa;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .header {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

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
