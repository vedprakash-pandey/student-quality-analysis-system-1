<?php

require "connect.php";

$query3="select * from sinfo";
$result3= mysqli_query($conn,$query3) or die("query 3 failed");
$query4="select batch,count(roll_no) as count from sinfo where sdrn='Null' group by batch";
$result4= mysqli_query($conn,$query4) or die("query 4 failed");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Quality Analysis System</title>
    <!-- external css file  -->
    <link rel="stylesheet" type="text/css"  href="css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

    <!-- link for icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    html {
        height: 150%;
    }
    </style>
</head>

<body>

    <!-- Header Icons-->
    <?php
        include "AdminHeader.php";
    ?>

    <!-- navigation bar -->
    <?php
        include "AdminNav.php";
    ?>



    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="AdminHome.php">Home</a></li>
            <li class="breadcrumb-item active">Student Performance</li>
        </ul>

        <fieldset class="dashboard">
            <legend><span class="legend-design">&nbsp; Student Performnace :&nbsp;</span> </legend>


            <br>
            <h3 style="text-align:center;"> View Student Performnace </h3> <br>
            <input class="form-control" id="myInput" type="text" placeholder="Search Roll No..">
            <br><br>

            <table class='table table-secondary table-bordered table-hover'>
                <tr>
                    <th colspan="4">
                        <h4>Student List</h4>
                    </th>
                </tr>
                <tr>
                    <th>Batch</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Select</th>
                </tr>
                <tbody id="myTable">
                    <?php                while($row3=mysqli_fetch_assoc($result3))
                    {
                ?>
                    <tr>
                        <td><?php echo $row3['batch']; ?></td>
                        <td><?php echo $row3['roll_no']; ?></td>
                        <td><?php echo $row3['name']; ?></td>
                        <td><button
                                class="btn"><?php echo "<a href='admin_student.php?roll=$row3[roll_no]'>View</a>"; ?></button>
                        </td>
                    </tr>
                    <?php
                    }

                ?>
                </tbody>
            </table>

    </div>

    </div>

    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

    <!--footer-->
    <?php
        include "footer.php";
  ?>
</body>

</html>