<?php

require "connect.php";


$sdrn = $_SESSION['username'];
$report = $_GET['report'];


$query2 = "Delete from mentor_report where report = '$report' AND mentor_sdrn = '$sdrn'";
mysqli_query($conn,$query2) or die("query 2 failed");

unlink($report);

echo "<script> window.location='mentor_report.php'; </script>";
?>