<?php

require "connect.php";


 $sdrn = $_GET['sdrn'];
if($sdrn=='')
{
}
else{
  $_SESSION['sdrn']= $sdrn; }
$sdrn1 = $_SESSION['sdrn'];
$query1="select * from minfo where sdrn=$sdrn1";
$result1= mysqli_query($conn,$query1) or die("$sdrn1");
$row1= mysqli_fetch_array($result1);
$query2="select * from sinfo where sdrn='Null'";
$result2= mysqli_query($conn,$query2) or die("query 2 failed");
$query3="select * from sinfo where sdrn=$sdrn1";
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
            <li class="breadcrumb-item"><a href="mapping.php">Mapping</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ul>

        <fieldset class="dashboard">
            <legend><span class="legend-design">&nbsp; Dashboard :&nbsp;</span> </legend>


            <br>
            <h3 style="text-align:center;"> Mentor Name : <?php echo $row1['name']; ?> </h3> <br>
            <input class="form-control" id="myInput" type="text" placeholder="Search Roll No..">
            <br><br>
            <table class='table table-secondary table-bordered table-hover'>

                <th colspan="4">
                    <h4>Allocate Full Batch </h4>
                </th>

                <tr>
                    <th>Batch</th>
                    <th>Number of students</th>
                    <th>Select</th>
                </tr>
                <tbody id="myTable">
                    <?php                while($row4=mysqli_fetch_assoc($result4))
                    {
                ?>
                    <tr>
                        <td><?php echo $row4['batch']; ?></td>
                        <td><?php echo $row4['count']; ?></td>
                        <td><button
                                class="btn"><?php echo "<a href='Nextbatch.php?batch=$row4[batch]'>Add batch</a>"; ?></button>
                        </td>
                    </tr>
                    <?php
                    }
                    mysqli_close($conn);
                ?>
                </tbody>
            </table>


            <table class='table table-secondary table-bordered table-hover'>
                <tr>
                    <th colspan="4">
                        <h4>Student with no mentor </h4>
                    </th>
                </tr>
                <tr>
                    <th>Batch</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Select</th>
                </tr>
                <tbody id="myTable">
                    <?php                while($row2=mysqli_fetch_assoc($result2))
                    {
                ?>
                    <tr>
                        <td><?php echo $row2['batch']; ?></td>
                        <td><?php echo $row2['roll_no']; ?></td>
                        <td><?php echo $row2['name']; ?></td>
                        <td><button
                                class="btn"><?php echo "<a href='Nextadd.php?roll=$row2[roll_no]'>Add</a>"; ?></button>
                        </td>
                    </tr>
                    <?php
                    }

                ?>
                </tbody>
            </table>
          <table class='table table-secondary table-bordered table-hover'>
                <tr>
                    <th colspan="4">
                        <h4>Added Students</h4>
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
                                class="btn"><?php echo "<a href='Nextremove.php?roll=$row3[roll_no]'>Remove</a>"; ?></button>
                        </td>
                    </tr>
                    <?php
                    }

                ?>
                </tbody>
            </table>
            <button><a href="mapping.php"> Back </a></button>
</fieldset>
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