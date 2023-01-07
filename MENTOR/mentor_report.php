<?php

require "connect.php";
date_default_timezone_set("Asia/Kolkata");
$sdrn = $_SESSION['username'];

$report_sel = "select * from mentor_report where mentor_sdrn = '$sdrn' and status = 'Not Viewed'";
$report_sel_res  = mysqli_query($conn,$report_sel);
$report_num =  mysqli_num_rows($report_sel_res);

$report_selv = "select * from mentor_report where mentor_sdrn = '$sdrn' and status = 'Viewed'";
$report_selv_res  = mysqli_query($conn,$report_selv);
$report_numv =  mysqli_num_rows($report_selv_res);

$d1 = date("d");
$m1 = date("m");
$y1 = date("Y");
$date1 = $d1."-".$m1."-".$y1;

$a =array(1);
$report_sel2 = "select report_id from mentor_report where mentor_sdrn = '$sdrn' and date='$date1'";
$report_sel2_res  = mysqli_query($conn,$report_sel2);
while($report_sel2_row = mysqli_fetch_assoc($report_sel2_res)){
  $x = $report_sel2_row['report_id'];
  array_push($a, $x);

}
$max_a = max($a);

$report_sel1 = "select * from mentor_report where mentor_sdrn = '$sdrn' and report_id = '$max_a'";
$report_sel1_res  = mysqli_query($conn,$report_sel1);
$report_sel1_row = mysqli_fetch_assoc($report_sel1_res);
$report_num1 =  mysqli_num_rows($report_sel1_res);

if(isset($_POST['upload'])){
$d = date("d");
$m = date("m");
$y = date("Y");
$date = $d."-".$m."-".$y;


$description = $_POST['description'];
$report_file  = $_FILES['report'];
$date_t = $report_sel1_row['date'];
if($date == $date_t){
  $count = $report_sel1_row['report_id'];
  $report_id = $count +1;

}else{
  $report_id = 1;
}

  //Document Temporary location

  $report_loc = $_FILES['report']['tmp_name'];


    //Document name to be stored in database folder

    $report_name = $_FILES['report']['name'];

    //file storing

    $report_store = $_FILES['report']['name'];


  $file_path = "../mentor_document/$sdrn/";
  $path = "../mentor_document/";


  if($_FILES["report"]["name"] != '') // check file selected of not
  {
    $allowed_ext = array("pdf","doc","docx"); // allowed file types
    $tmp =explode('.',$_FILES["report"]["name"]);
    $ext = end($tmp); // get uploaded file extension

    if(in_array($ext,$allowed_ext))
    {
      //if($_FILES["student_photo"]["size"]< 100000){
        //$_FILES["student_photo"]["name"] = "Student_Photo";
        $time = time();
        $old_report_name = $report_name;
       // $new_report_name = "$sdrn"."_"."$date"."_"."$time.$ext";
       $new_report_name = "$sdrn"."_"."$date"."_report"."$report_id.$ext";
      //  $rename = rename($old_name,$new_name);
      //  $rename = rename($file_path.$old_name,$file_path.$new_name);


     // }
          if(!(file_exists($path."/".$sdrn))){
    if(mkdir($path."/".$sdrn, 0777)){
      $updated_path = $path."/".$sdrn;
      $report_documents = $updated_path."/".$report_store;
      $report_documents_new = $updated_path."/".$new_report_name;
      move_uploaded_file($report_loc,$report_documents);
      $rename = rename($file_path."/".$old_report_name,$file_path."/".$new_report_name);
    }}

    else{
      $updated_path = $path."/".$sdrn;
      $report_documents = $updated_path."/".$report_store;
      $report_documents_new = $updated_path."/".$new_report_name;
      move_uploaded_file($report_loc,$report_documents);
      $rename = rename($file_path."/".$old_report_name,$file_path."/".$new_report_name);

    }

    }
    else{
      echo '<script>alert("Invalid File Type (extension)")</script>';
    }
  }
  else{
    echo '<script>alert("Please select File")</script>';
  }

  $insert_report = "insert into mentor_report(mentor_sdrn,date,report_id,report,description) values('$sdrn','$date','$report_id','$report_documents_new','$description')";
  $res_report = mysqli_query($conn, $insert_report);


  header("location:mentor_report.php");
}
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

<style>
.table-bordered > tbody >tr>th{
  border : 1px solid black;
  text-align:center;
}

.table-bordered > tbody >tr>td{
  border : 1px solid black;
  text-align:center;
}

</style>
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

<div class='container'>
<br>
<fieldset> 
           
            <legend><span class="legend-saveddesign">&nbsp; Send Report &nbsp;</span> </legend>
            <form action="" method="post" enctype="multipart/form-data">
            <br>
            <div class="form-group">
                    <label for="File"> File :</label>
                    <input type="file" class="form-control" name="report" placeholder="File"/>
            </div>
            <div class="form-group">
                    <label for="description"> Description :</label>
                    <textarea id="description" class="form-control" name="description" placeholder="Enter Description..." rows="5"> </textarea>
            </div>
                <button type="submit" class="btn btn-success" name="upload" value="upload">Upload</button>
            </form>
         


  <?php if($report_num > 0){ ?>    
  <hr/>
    <legend><span class="legend-design">&nbsp; Recent Reports : &nbsp;</span> </legend>
    <table class="table-responsive">
        <table class="table table-bordered table-hover ">
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Status</th>
                    <!-- <th>Remark</th> -->
                    <th>Action</th>
                </tr>

                <?php while($report_row=mysqli_fetch_assoc($report_sel_res)) {?>

                    <tr>
                    <td><?php echo $report_row['date'];?></td>
                    <td><textarea style="min-width:100%;" readonly><?php echo $report_row['description'];?></textarea></td>
                    <td><?php
                    $report_view = $report_row['report'];
                    $rep_c =$report_row['report_id'];


                    echo "<a href='$report_view' target='_blank'><button class='btn btn-primary'>View Report</button></a>";?></td>
                    <td> <?php echo $report_row['status'];?> </td>
                    <!-- <td> -->
                    <?php// echo $report_row['remark'];?>
                    <!-- </td> -->
                    <td><?php $mark_status = $report_row['status'];
                    ?>  <?php if($mark_status == "Viewed"){ echo "disabled"; } ?> 
                                             <?php echo "<a href='delete.php?report=$report_row[report]'>";
                                                  echo "<a href='delete.php?report=$report_row[report]'><button class='btn btn-danger'>Delete</button></a>";  ?>
                                                 </a>
                                         
                                         </td>
                </tr>
                <?php  }?>
        </table>
        </table>

<?php  }


if($report_numv > 0){ ?>
<hr/>
  <legend><span class="legend-design">&nbsp; Remarked Reports : &nbsp;</span> </legend>

        <table class="table table-bordered table-hover">
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Remark</th>
                </tr>

                <?php while($report_rowv=mysqli_fetch_assoc($report_selv_res)) {?>

                    <tr>
                    <td><?php echo $report_rowv['date'];?></td>
                    <td><textarea style="min-width:100%" readonly><?php echo $report_rowv['description'];?></textarea></td>
                    <td><?php
                    $report_viewv = $report_rowv['report'];
                    $rep_cv =$report_rowv['report_id'];


                    echo "<a href='$report_viewv' target='_blank'><button class='btn btn-primary'>View Report</button></a>";?></td>
                    <td> <?php echo $report_rowv['status'];?> </td>
                    <td><textarea readonly style="min-width:100%"><?php echo $report_rowv['remark'];?>
                      </textarea>
                    </td>
                    <!-- <td> -->
                    <?//php $mark_statusv = $report_rowv['status'];?> 
                    <!-- </td> -->
                </tr>
                <?php  }?>
        </table>


<?php 
}

?>
</fieldset>
</div>

</br>
    <!--footer-->
  <?php
        include "footer.php";
  ?>

</body>

</html>