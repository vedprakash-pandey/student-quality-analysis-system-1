<?php

require "connect.php";
include "xlsx.php";

$query1 ="select * from minfo";
$result = mysqli_query($conn,$query1) or die("query failed");
if(isset($_FILES["file"]["name"])){
	$excel = SimpleXLSX::parse($_FILES["file"]["tmp_name"]);
	$i=0;
	foreach ($excel->rows(0) as $key => $row) {
		if($i==0){
			$i++;
			continue;
		}
		$query2 = "insert into sinfo values('$row[0]','$row[1]','$row[2]','Null')";
		mysqli_query($conn,$query2);
        $query3 = "insert into login values('','$row[1]','123','student')";
		mysqli_query($conn,$query3);
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Quality Analysis System</title>
    <!-- external css file  -->
    <link rel="stylesheet" type="text/css" href="css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

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
            <li class="breadcrumb-item active">Mapping Mentors</li>
        </ul>

        <fieldset class="Academic-details">
            <legend><span class="legend-design">&nbsp; Mentor Mapping &nbsp;</span> </legend>
            <h3 style="text-align:center"> Assign Students to Mentor </h3>
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
                        <th> Select </th>
                    </tr>
                    <tbody id="myTable">
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['sdrn'];?> </td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td> <button
                                    class="btn "><?php echo "<a href='next.php?sdrn=$row[sdrn]'>Select</a>"; ?></button>
                            </td>
                        </tr> <?php } ?>
                    </tbody>
                </table>

            </form>
          </fieldset>

    </div>

    <div class="container">
        <fieldset class="Academic-details">
            <legend><span class="legend-design">&nbsp; Add new students &nbsp;</span> </legend>
            <div class="container">
	<h1>Excel Upload</h1>
	<form method="POST" action="#" enctype="multipart/form-data">
		<div class="form-group">
			<label>Upload Excel File</label>
			<input type="file" name="file" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" name="Submit" class="btn btn-success">Upload</button>
		</div>
		<p>Download Demo File from here : <a href="sample.xlsx"><strong>sample.xlsx</strong></a></p>
	</form>
</div>
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