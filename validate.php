<?php

require "connect.php";

$username= $_POST['user'];
$password= $_POST['pass'];

$query = " SELECT * FROM login WHERE username= '$username' && password = '$password'" ;
$row = mysqli_query($conn,$query) or die("query failed");
$row1= mysqli_fetch_assoc($row);
if(mysqli_num_rows($row)==1)
{

  $_SESSION['username']=$row1['username'];
  $_SESSION['role']=$row1['role'];
  if($_SESSION['role']=='mentor')
  {

     header('location:MENTOR/Mhome.php');

  }
 elseif($_SESSION['role']=='student'){
  
      header('location:STUDENT/Home.php');
 }
  elseif($_SESSION['role']=='admin'){
     header('location:ADMIN_F/AdminHome.php');
  }
  elseif($_SESSION['role']=='principal'){
   header('location:PRINCIPAL/principal_home.php');
  }
 }
else{
  echo "<script> alert('Wrong username or Password');
 window.location='index.php'; </script>";
    }
mysql_close($conn);
?>