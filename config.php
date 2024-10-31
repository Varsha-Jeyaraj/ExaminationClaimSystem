<?php
$conn = mysqli_connect('localhost', 'root', '', 'examination_claim_system');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
