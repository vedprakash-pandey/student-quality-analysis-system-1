<?php

require "connect.php";


$query1 ="select * from minfo";
$result = mysqli_query($conn,$query1) or die("query failed");
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
            <li class="breadcrumb-item active">Batch Performance</li>
        </ul>

        <fieldset class="Academic-details">
            <legend><span class="legend-design">&nbsp; Batch Performance &nbsp;</span> </legend>
            <h3 style="text-align:center"> View Batch Performance </h3>
            <form action="Next.php" method="POST">
                <br>
                <h5> Select a mentor </h5> <br> <input class="form-control" id="myInput" type="text"
                    placeholder="Search Sdrn..">
                <br>
                <table class='table table-secondary table-bordered table-hover'>
                    <tr>
                        <th>Sdrn </th>
                        <th>Name </th>
                        <th>Department</th>
                        <th>Select </th>
                    </tr>
                    <tbody id="myTable">
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['sdrn'];?> </td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td> <button
                                    class="btn "><?php echo "<a href='admin_batch.php?sdrn=$row[sdrn]'>View</a>"; ?></button>
                            </td>
                        </tr> <?php } ?>
                    </tbody>
                </table>
            </form>

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