<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$title = 'Fill Form';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
    <style>
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
        <h2><?php echo $title; ?></h2>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div class='alert alert-success' role='alert'>Form submitted successfully!</div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="details" class="form-label">Form Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
