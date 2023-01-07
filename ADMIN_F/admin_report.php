<?php

require "connect.php";
date_default_timezone_set("Asia/Kolkata");

$query1 ="select * from minfo";
$result = mysqli_query($conn,$query1) or die("query failed");


$report_sel = "select * from mentor_report where status='Not Viewed'";
$report_sel_res  = mysqli_query($conn,$report_sel);
$report_num =  mysqli_num_rows($report_sel_res);

$report_sel1 = "select * from mentor_report where status='Viewed'";
$report_sel_res1  = mysqli_query($conn,$report_sel1);
$report_num1 =  mysqli_num_rows($report_sel_res1);


if(isset($_POST['save']))
{

  $remark = $_POST['remark'];
  $id = $_POST['id'];
  $sdrn = $_POST['sdrn'];

  $save_query = "update mentor_report set remark='$remark', status = 'Viewed' where id='$id' AND mentor_sdrn ='$sdrn' ";
  mysqli_query($conn , $save_query) or die("save query failed");

  header("location:admin_report.php");
}

if(isset($_POST['rollback']))
{

  $remark1 = "";
  $id1 = $_POST['id'];
  $sdrn1 = $_POST['sdrn'];

  $save_query1 = "update mentor_report set remark='$remark1', status = 'Not Viewed' where id='$id1' AND mentor_sdrn ='$sdrn1' ";
  mysqli_query($conn , $save_query1) or die("save query failed");

  header("location:admin_report.php");
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
    <style>
    .table-bordered>tbody>tr>th {
        border: 1px solid black;
        text-align: center;
    }

    .table-bordered>tbody>tr>td {
        border: 1px solid black;
        text-align: center;
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


    <div class="container-fluid">
    <br>
        <?php if($report_num > 0){ ?>
            <legend><span class="legend-saveddesign">&nbsp; Recent Reports : &nbsp;</span> </legend>

        <table class="table table-bordered table-hover">
            <tr>
                <th>Date</th>
                <th>SDRN</th>
                <th>Name</th>
                <th>Batch</th>
                <th>Description</th>
                <th>File</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>

            <?php while($report_row=mysqli_fetch_assoc($report_sel_res)) {
                    $sdrn_f = $report_row['mentor_sdrn'];
                    $mentor_name = "select name from minfo where sdrn='$sdrn_f'";
                    $mentor_name_r = mysqli_query($conn , $mentor_name);
                    $mentor_name_row = mysqli_fetch_assoc($mentor_name_r);

                    $mentor_batch = "select batch from sinfo where sdrn='$sdrn_f' group by batch";
                    $mentor_batch_r = mysqli_query($conn , $mentor_batch);
                    $mentor_batch_row = mysqli_fetch_assoc($mentor_batch_r);
                    ?>

            <form action="#" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $report_row['id'];?>">
                <input type="hidden" name="sdrn" value="<?php echo $report_row['mentor_sdrn'];?>">
                <tr>

                    <td><?php echo $report_row['date'];?></td>
                    <td><?php echo $report_row['mentor_sdrn'];?></td>
                    <td><?php echo $mentor_name_row['name'];?></td>
                    <td><?php echo $mentor_batch_row['batch'];?></td>
                    <td><textarea style="min-width:100%;" readonly><?php echo $report_row['description'];?></textarea></td>
                    <td><?php
                    $report_view = $report_row['report'];
                    echo "<a href=$report_view target='_blank' class='btn btn-primary'>View Document</a>";?>
                    </td>

                    <td><textarea style="min-width:100%;" name="remark"> </textarea></td>
                    <td> <button type="submit" name="save" class="btn btn-success"> <span style="color:white">
                                Save</span>
                        </button>
                    </td>
                </tr>
            </form>
            <?php  }?>
        </table>


        <?php  }?>
        <hr>
    </div>

    <div class="container-fluid">
        <?php if($report_num1 > 0){ ?>
            <legend><span class="legend-saveddesign">&nbsp; Viewed Reports : &nbsp;</span> </legend>

        <table class='table table-bordered table-hover'>
            <tr>
                <th>Date</th>
                <th>SDRN</th>
                <th>Name</th>
                <th>Batch</th>
                <th>Description</th>
                <th>File</th>
                <th>Remark</th>
                <th>Action</th>
                <th>Rollback</th>
            </tr>

            <?php while($report_row1=mysqli_fetch_assoc($report_sel_res1)) {
                    $sdrn_f1 = $report_row1['mentor_sdrn'];
                    $mentor_name1 = "select name from minfo where sdrn='$sdrn_f1'";
                    $mentor_name_r1 = mysqli_query($conn , $mentor_name1);
                    $mentor_name_row1 = mysqli_fetch_assoc($mentor_name_r1);

                    $mentor_batch1 = "select batch from sinfo where sdrn='$sdrn_f1' group by batch";
                    $mentor_batch_r1 = mysqli_query($conn , $mentor_batch1);
                    $mentor_batch_row1 = mysqli_fetch_assoc($mentor_batch_r1);
                    ?>

            <form action="#" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $report_row1['id'];?>">
                <input type="hidden" name="sdrn" value="<?php echo $report_row1['mentor_sdrn'];?>">
                <tr>

                    <td><?php echo $report_row1['date'];?></td>
                    <td><?php echo $report_row1['mentor_sdrn'];?></td>
                    <td><?php echo $mentor_name_row1['name'];?></td>
                    <td><?php echo $mentor_batch_row1['batch'];?></td>
                    <td><textarea style="min-width:100%;" readonly><?php echo $report_row1['description'];?></textarea></td>
                    <td><?php
                    $report_view1 = $report_row1['report'];
                    echo "<a href='$report_view1' target='_blank' class='btn btn-primary'>View Document</a>";?>
                    </td>

                    <td><textarea style="min-width:100%;" name="remark" ><?php if($report_row1['remark'] != ""){ echo $report_row1['remark'];} ?> 
                        </textarea>
                    </td>
                    <td> <button type="submit" name="save" class="btn btn-success"> <span style="color:white">
                                Update</span>
                        </button>
                    </td>
                    <td> <button type="submit" name="rollback" class="btn btn-danger"> <span style="color:white">
                                Rollback</span>
                        </button>
                    </td>
                </tr>
            </form>
            <?php  }?>
        </table>


        <?php  }?>

    </div>

    <!--footer-->
    <?php
        include "footer.php";
    ?>

</body>

</html>