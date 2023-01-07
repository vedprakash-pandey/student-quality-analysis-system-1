<?php

require "connect.php";


$query1 ="select * from minfo";
$result = mysqli_query($conn,$query1) or die("query failed");
$sdrn1= $_SESSION['username'];
$query3="select * from sinfo where sdrn=$sdrn1";
$result3= mysqli_query($conn,$query3) or die("query 3 failed");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Quality Analysis System</title>
    <!-- external css file  -->
    <link rel="stylesheet" type="text/css" href="css/mentor.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

    <!-- link for icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Header Icons-->
    <?php
        include "Mheader.php";
  ?>

    <!-- navigation bar -->
    <?php
        include "Mnav.php";
  ?>

    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Batch Info</li>
        </ul>

        <fieldset class="batch-info">
            <legend><span class="legend-design">&nbsp; Batch Information&nbsp;</span> </legend>
            <h3 style="text-align:center">Students Under Your Mentorship</h3>
            <form action="" method="POST">
                <!-- <h1 style="font-family:monospace; text-align:center"> Welcome <?php echo $_SESSION['role']; ?> </h1>
   <br> -->
                <br> <input class="form-control" id="myInput" type="text" placeholder="Search Roll No">
                <br>
                <table class='table table-striped table-hover'>
                    <!-- <tr>
                    <th colspan="4"><h2> Students Under Your Mentorship </h2></th>
                </tr> -->
                    <tr>
                        <th>Batch</th>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Application</th>
                        <th> Progress</th>
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
                                    class="btn"><?php echo "<a href='view_student.php?roll=$row3[roll_no]'>view</a>"; ?></button>
                            </td>
                            <td><button
                                    class="btn"><?php echo "<a href='studentgraph.php?roll=$row3[roll_no]'>view</a>"; ?></button>
                            </td>
                        </tr>
                        <?php
                    }

                ?>
                    </tbody>
                </table>
            </form>
        </fieldset>
    </div>
    </div>
    </div>


    <!--footer-->
    <?php
        include "footer.php";
  ?>



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
</body>

</html>