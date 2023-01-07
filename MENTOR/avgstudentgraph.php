<?php

require "connect.php";


$query1 ="select * from minfo";
$result = mysqli_query($conn,$query1) or die("query failed");
$sdrn1= $_SESSION['username'];
$query3="select * from sinfo where sdrn=$sdrn1";
$result3= mysqli_query($conn,$query3) or die("query 3 failed");



$avg1 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem1' and mentor_sdrn = '$sdrn1'";
$avg1_r = mysqli_query($conn , $avg1) or die ("query 1 failed");


$avg2 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem2' and mentor_sdrn = '$sdrn1'";
$avg2_r = mysqli_query($conn , $avg2) or die ("query 1 failed");


$avg3 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem3' and mentor_sdrn = '$sdrn1'";
$avg3_r = mysqli_query($conn , $avg3) or die ("query 1 failed");


$avg4 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem4' and mentor_sdrn = '$sdrn1'";
$avg4_r = mysqli_query($conn , $avg4) or die ("query 1 failed");


$avg5 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem5' and mentor_sdrn = '$sdrn1'";
$avg5_r = mysqli_query($conn , $avg5) or die ("query 1 failed");


$avg6 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem6' and mentor_sdrn = '$sdrn1'";
$avg6_r = mysqli_query($conn , $avg6) or die ("query 1 failed");


$avg7 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem7' and mentor_sdrn = '$sdrn1'";
$avg7_r = mysqli_query($conn , $avg7) or die ("query 1 failed");


$avg8 = "SELECT stu_pointer, stu_status, stu_live_kts FROM student_progress_details where stu_sem = 'sem8' and mentor_sdrn = '$sdrn1'";
$avg8_r = mysqli_query($conn , $avg8) or die ("query 1 failed");

$academic_ach = "select distinct stu_rollno from student_academic_achievements where mentor_sdrn = '$sdrn1'";
$aca_r = mysqli_query($conn , $academic_ach) or die ("query 1 failed");
$aca_num = mysqli_num_rows($aca_r);

$co_curricular_ach = "select distinct stu_rollno from student_co_curricular_activities where mentor_sdrn = '$sdrn1'";
$co_r = mysqli_query($conn , $co_curricular_ach) or die ("query 1 failed");
$co_num = mysqli_num_rows($co_r);

$extra_curricular_ach = "select distinct stu_rollno from student_extra_curricular_activities where mentor_sdrn = '$sdrn1'";
$ext_r = mysqli_query($conn , $extra_curricular_ach) or die ("query 1 failed");
$ext_num = mysqli_num_rows($ext_r);

$internship_ach = "select distinct stu_rollno from student_internship_details where mentor_sdrn = '$sdrn1'";
$int_r = mysqli_query($conn , $internship_ach) or die ("query 1 failed");
$int_num = mysqli_num_rows($int_r);

$below_avg1 = 0;
$average1 = 0;
$above_avg1 = 0;
$kt_avg1 = 0;

while($avg1_f = mysqli_fetch_assoc($avg1_r)){
  if($avg1_f['stu_status'] == "Pass"){
    if($avg1_f['stu_pointer'] <= 5){
      $below_avg1++ ;
    }elseif($avg1_f['stu_pointer'] <= 7){
      $average1++ ;
    }else{
      $above_avg1++;
    }

  }elseif($avg1_f['stu_live_kts'] > 0){
    $kt_avg1++;
  }

}

$below_avg2 = 0;
$average2 = 0;
$above_avg2 = 0;
$kt_avg2 = 0;

while($avg2_f = mysqli_fetch_assoc($avg2_r)){
  if($avg2_f['stu_status'] == "Pass"){
    if($avg2_f['stu_pointer'] <= 5){
      $below_avg2++ ;
    }elseif($avg2_f['stu_pointer'] <= 7){
      $average2++ ;
    }else{
      $above_avg2++;
    }

  }elseif($avg2_f['stu_live_kts'] > 0){
    $kt_avg2++;
  }

}

$below_avg3 = 0;
$average3 = 0;
$above_avg3 = 0;
$kt_avg3 = 0;

while($avg3_f = mysqli_fetch_assoc($avg3_r)){
  if($avg3_f['stu_status'] == "Pass"){
    if($avg3_f['stu_pointer'] <= 5){
      $below_avg3++ ;
    }elseif($avg3_f['stu_pointer'] <= 7){
      $average3++ ;
    }else{
      $above_avg3++;
    }

  }elseif($avg3_f['stu_live_kts'] > 0){
    $kt_avg3++;
  }

}

$below_avg4 = 0;
$average4 = 0;
$above_avg4 = 0;
$kt_avg4 = 0;

while($avg4_f = mysqli_fetch_assoc($avg4_r)){
  if($avg4_f['stu_status'] == "Pass"){
    if($avg4_f['stu_pointer'] <= 5){
      $below_avg4++ ;
    }elseif($avg4_f['stu_pointer'] <= 7){
      $average4++ ;
    }else{
      $above_avg4++;
    }

  }elseif($avg4_f['stu_live_kts'] > 0){
    $kt_avg4++;
  }

}

$below_avg5 = 0;
$average5 = 0;
$above_avg5 = 0;
$kt_avg5 = 0;

while($avg5_f = mysqli_fetch_assoc($avg5_r)){
  if($avg5_f['stu_status'] == "Pass"){
    if($avg5_f['stu_pointer'] <= 5){
      $below_avg5++ ;
    }elseif($avg5_f['stu_pointer'] <= 7){
      $average5++ ;
    }else{
      $above_avg5++;
    }

  }elseif($avg5_f['stu_live_kts'] > 0){
    $kt_avg5++;
  }

}

$below_avg6 = 0;
$average6 = 0;
$above_avg6 = 0;
$kt_avg6 = 0;

while($avg6_f = mysqli_fetch_assoc($avg6_r)){
  if($avg6_f['stu_status'] == "Pass"){
    if($avg6_f['stu_pointer'] <= 5){
      $below_avg6++ ;
    }elseif($avg6_f['stu_pointer'] <= 7){
      $average6++ ;
    }else{
      $above_avg6++;
    }

  }elseif($avg6_f['stu_live_kts'] > 0){
    $kt_avg6++;
  }

}


$below_avg7 = 0;
$average7 = 0;
$above_avg7 = 0;
$kt_avg7 = 0;

while($avg7_f = mysqli_fetch_assoc($avg7_r)){
  if($avg7_f['stu_status'] == "Pass"){
    if($avg7_f['stu_pointer'] <= 5){
      $below_avg7++ ;
    }elseif($avg7_f['stu_pointer'] <= 7){
      $average7++ ;
    }else{
      $above_avg7++;
    }

  }elseif($avg7_f['stu_live_kts'] > 0){
    $kt_avg7++;
  }

}

$below_avg8 = 0;
$average8 = 0;
$above_avg8 = 0;
$kt_avg8 = 0;

while($avg8_f = mysqli_fetch_assoc($avg8_r)){
  if($avg8_f['stu_status'] == "Pass"){
    if($avg8_f['stu_pointer'] <= 5){
      $below_avg8++ ;
    }elseif($avg8_f['stu_pointer'] <= 7){
      $average8++ ;
    }else{
      $above_avg8++;
    }

  }elseif($avg8_f['stu_live_kts'] > 0){
    $kt_avg8++;
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
    <link rel="stylesheet" type="text/css" href="css/mentorhome.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

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


    <style>
    .avg-progress {
        margin: 0 auto;
    }

    .title {
        font-family: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
        color: gray;
        font-size: 42px;
    }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
            ['Semester', 'KT', 'Below Avg', 'Average', 'Above Avg'],
            ['Sem 1', <?php echo $kt_avg1; ?>, <?php echo $below_avg1; ?>, <?php echo $average1; ?>,
                <?php echo $above_avg1; ?>
            ],
            ['Sem 2', <?php echo $kt_avg2; ?>, <?php echo $below_avg2; ?>, <?php echo $average2; ?>,
                <?php echo $above_avg2; ?>
            ],
            ['Sem 3', <?php echo $kt_avg3; ?>, <?php echo $below_avg3; ?>, <?php echo $average3; ?>,
                <?php echo $above_avg3; ?>
            ],
            ['Sem 4', <?php echo $kt_avg4; ?>, <?php echo $below_avg4; ?>, <?php echo $average4; ?>,
                <?php echo $above_avg4; ?>
            ],
            ['Sem 5', <?php echo $kt_avg5; ?>, <?php echo $below_avg5; ?>, <?php echo $average5; ?>,
                <?php echo $above_avg5; ?>
            ],
            ['Sem 6', <?php echo $kt_avg6; ?>, <?php echo $below_avg6; ?>, <?php echo $average6; ?>,
                <?php echo $above_avg6; ?>
            ],
            ['Sem 7', <?php echo $kt_avg7; ?>, <?php echo $below_avg7; ?>, <?php echo $average7; ?>,
                <?php echo $above_avg7; ?>
            ],
            ['Sem 8', <?php echo $kt_avg8; ?>, <?php echo $below_avg8; ?>, <?php echo $average8; ?>,
                <?php echo $above_avg8; ?>
            ],
        ]);

        var options = {
            // title : 'Average Student Progress',
            // titleTextStyle: {
            //       color: 'gray',
            //       fontName: 'Times New Roman',
            //       fontSize: 50,
            //       bold: true,
            //       italic: true
            //   },
            vAxis: {
                title: 'Percentage'
            },
            hAxis: {
                title: 'Semester'
            },
            seriesType: 'bars',
            isStacked: true,
            colors: ['#DC3912', '#3366CC', '#109618', '#FF9900'],
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
    </head>

    <body>

        <div class="container-fluid"> <br>
            <span class="title">
                <b><i>
                        <p class="text-center"> Average progress of batch</p>
                </b></i>
            </span>

            <div id="chart_div" class="avg-progress" style="width: 1000px; height: 600px;"></div>
            <form action="#" method="post" enctype="multipart/form-data">

                <div class="container">
                    <label for="progress"> Category :</label>
                    <select class="form-control" name="stu_sem" id="semester" required>
                        <option value="sem1">Semester 1 </option>
                        <option value="sem2">Semester 2</option>
                        <option value="sem3">Semester 3</option>
                        <option value="sem4">Semester 4</option>
                        <option value="sem5">Semester 5</option>
                        <option value="sem6">Semester 6</option>
                        <option value="sem7">Semester 7</option>
                        <option value="sem8">Semester 8</option>
                    </select>
                    <br>
                    <select class="form-control" name="stu_pro" id="progress" required>
                        <option value="ab_avg">Above Average</option>
                        <option value="avg">Average</option>
                        <option value="bel_avg">Below Average</option>
                        <option value="KT">KT</option>

                    </select>

                    <button type="submit" class="btn btn-primary" name="view_stu">View Students</button>
                    <br>
                    <br>
                </div>


            </form>

            <?php
if(isset($_POST['view_stu'])){
$semester = $_POST['stu_sem'];
$type = $_POST['stu_pro'];

     //query for table
$abv_avg=array();
$avg=array();
$bel_avg=array();
$kt_avg=array();

if($type == "ab_avg"){
$varf = "select stu_rollno from student_progress_details where stu_pointer > 7 and stu_sem= '$semester' AND mentor_sdrn = '$sdrn1'";
$resultf = mysqli_query($conn,$varf) or die ("query 1 failed");
//$srnf = mysqli_fetch_assoc($resultf);

while($srnf = mysqli_fetch_assoc($resultf)){
  $x = $srnf['stu_rollno'];
  array_push($abv_avg , $x);

}

?>
            <div class="container">
                <h2>List of Above Average Student for <?php echo $semester;?></h2>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th>Rollno</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th> Pointer</th>
                        </tr>
                    </thead>
                    <?php
foreach ($abv_avg as $value){
  $abv_student = "SELECT student_progress_details.stu_rollno, sinfo.name, sinfo.batch,student_progress_details.stu_pointer
  FROM student_progress_details
  INNER JOIN sinfo ON student_progress_details.stu_rollno=sinfo.roll_no where student_progress_details.stu_pointer > 7 and student_progress_details.stu_sem= '$semester' and student_progress_details.stu_rollno = '$value'";
  $abv_stu_r = mysqli_query($conn,$abv_student) or die ("query 1 failed");
  $abv_stu_f = mysqli_fetch_assoc($abv_stu_r);
?>
                    <tr>
                        <td><?php echo $abv_stu_f['stu_rollno'];?></td>
                        <td><?php echo $abv_stu_f['name'];?></td>
                        <td><?php echo $abv_stu_f['batch'];?></td>
                        <td><?php echo $abv_stu_f['stu_pointer'];?></td>
                    </tr>

                    <?php } ?>
                </table>
            </div>
            <?php }//if of abv_avg
elseif($type == "avg"){

$varg = "select stu_rollno from student_progress_details where stu_pointer > 5 and stu_pointer <= 7 and stu_sem= '$semester' AND mentor_sdrn = '$sdrn1'";
$resultg = mysqli_query($conn,$varg) or die ("query 1 failed");
//$srnf = mysqli_fetch_assoc($resultf);

while($srng = mysqli_fetch_assoc($resultg)){
  $y = $srng['stu_rollno'];
  array_push($avg , $y);

}

?>
            <div class="container">
                <h2>List of Average Student for <?php echo $semester;?></h2>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th>Rollno</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th> Pointer</th>
                        </tr>
                    </thead>
                    <?php
foreach ($avg as $value){
  $avg_student = "SELECT student_progress_details.stu_rollno, sinfo.name, sinfo.batch,student_progress_details.stu_pointer
  FROM student_progress_details
  INNER JOIN sinfo ON student_progress_details.stu_rollno=sinfo.roll_no where student_progress_details.stu_pointer > 5 and student_progress_details.stu_pointer <= 7 and student_progress_details.stu_sem= '$semester' and student_progress_details.stu_rollno = '$value'";
  $avg_stu_r = mysqli_query($conn,$avg_student) or die ("query 1 failed");
  $avg_stu_f = mysqli_fetch_assoc($avg_stu_r);
?>
                    <tr>
                        <td><?php echo $avg_stu_f['stu_rollno'];?></td>
                        <td><?php echo $avg_stu_f['name'];?></td>
                        <td><?php echo $avg_stu_f['batch'];?></td>
                        <td><?php echo $avg_stu_f['stu_pointer'];?></td>
                    </tr>

                    <?php } ?>
                </table>
            </div>

            <?php
} // elseif of avg
elseif($type == "bel_avg"){
$varf = "select stu_rollno from student_progress_details where stu_pointer <=5 and stu_pointer >0  and stu_sem= '$semester' AND mentor_sdrn = '$sdrn1'";
$resultf = mysqli_query($conn,$varf) or die ("query 1 failed");
//$srnf = mysqli_fetch_assoc($resultf);

while($srnf = mysqli_fetch_assoc($resultf)){
  $x = $srnf['stu_rollno'];
  array_push($bel_avg , $x);

}

?>
            <div class="container">
                <h2>List of Below Average Student for <?php echo $semester;?></h2>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th>Rollno</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th> Pointer</th>
                        </tr>
                    </thead>
                    <?php
foreach ($bel_avg as $value){
  $bel_student = "SELECT student_progress_details.stu_rollno, sinfo.name, sinfo.batch,student_progress_details.stu_pointer
  FROM student_progress_details
  INNER JOIN sinfo ON student_progress_details.stu_rollno=sinfo.roll_no where student_progress_details.stu_pointer <=5 and student_progress_details.stu_pointer > 0 and student_progress_details.stu_sem= '$semester' and student_progress_details.stu_rollno = '$value'";
  $bel_stu_r = mysqli_query($conn,$bel_student) or die ("query 1 failed");
  $bel_stu_f = mysqli_fetch_assoc($bel_stu_r);
?>
                    <tr>
                        <td><?php echo $bel_stu_f['stu_rollno'];?></td>
                        <td><?php echo $bel_stu_f['name'];?></td>
                        <td><?php echo $bel_stu_f['batch'];?></td>
                        <td><?php echo $bel_stu_f['stu_pointer'];?></td>
                    </tr>

                    <?php } ?>
                </table>
            </div>
            <?php
} // elseif of bel_avg
else{
$varf = "select stu_rollno from student_progress_details where stu_live_kts > 0 and stu_sem= '$semester' AND mentor_sdrn = '$sdrn1'";
$resultf = mysqli_query($conn,$varf) or die ("query 1 failed");
//$srnf = mysqli_fetch_assoc($resultf);

while($srnf = mysqli_fetch_assoc($resultf)){
  $x = $srnf['stu_rollno'];
  array_push($kt_avg , $x);

}

?>
            <div class="container">
                <h2>List of KT Student for <?php echo $semester;?></h2>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th>Rollno</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th> No. of KTs</th>
                        </tr>
                    </thead>
                    <?php
foreach ($kt_avg as $value){
  $kt_student = "SELECT student_progress_details.stu_rollno, sinfo.name, sinfo.batch,student_progress_details.stu_live_kts
  FROM student_progress_details
  INNER JOIN sinfo ON student_progress_details.stu_rollno=sinfo.roll_no where student_progress_details.stu_live_kts > 0 and student_progress_details.stu_sem= '$semester' and student_progress_details.stu_rollno = '$value'";
  $kt_stu_r = mysqli_query($conn,$kt_student) or die ("query 1 failed");
  $kt_stu_f = mysqli_fetch_assoc($kt_stu_r);
?>
                    <tr>
                        <td><?php echo $kt_stu_f['stu_rollno'];?></td>
                        <td><?php echo $kt_stu_f['name'];?></td>
                        <td><?php echo $kt_stu_f['batch'];?></td>
                        <td><?php echo $kt_stu_f['stu_live_kts'];?></td>
                    </tr>

                    <?php } ?>
                </table>
            </div>

            <?php
}// else of kt
} //isset view_stu ?>





            <style>
            .avg-activities {
                margin: 0 auto;
            }
            </style>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Activities', 'Average Number'],
                    ['Academic Achivements', <?php echo $aca_num; ?>],
                    ['Co-curricular Activities', <?php echo $co_num; ?>],
                    ['Extra-Curricular Activities', <?php echo $ext_num; ?>],
                    ['Internships', <?php echo $int_num; ?>]
                ]);

                var options = {
                    // title: 'Average Activities of Batch',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
            </script>

            <div class="container-fluid">
                <span class="title">
                    <b><i>
                            <p class="text-center"> Average Activities of Batch </p>
                    </b></i> </span>
                <div id="piechart_3d" class="avg-activities" style="width: 1200px; height: 600px;"></div>
                <form action="#" method="post" enctype="multipart/form-data">

                    <div class="container">
                        <label for="achievement"> Category :</label>
                        <select class="form-control" name="stu_ach" id="achievement" required>
                            <option value="aca">Academic Achievements</option>
                            <option value="co">Co-Curricular Achievements</option>
                            <option value="ext">Extra-Curricular Achievements</option>
                            <option value="intern">Internship</option>
                        </select>

                        <button type="submit" class="btn btn-primary" name="view_stu_ach">View Students</button>
                        <br>
                        <br>
                    </div>

                </form>
                <?php

if(isset($_POST['view_stu_ach'])){
  $ach_type = $_POST['stu_ach'];

  if($ach_type == "aca"){
?>
                <div class="container">
                    <h2>List of Academic Achievement Students</h2>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th>Rollno</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>No. of Achievements</th>
                                <th>No. of Prize Won</th>
                            </tr>
                        </thead>
                        <?php
  while($aca_row = mysqli_fetch_assoc($aca_r)){
    $roll_no = $aca_row['stu_rollno'];
    $academic_count = 0;
$academic_won_count = 0;

$academic_query = "select count(*) as count from student_academic_achievements where stu_rollno = '$roll_no'";

$academic_won_query = "select count(*) as count from student_academic_achievements where stu_prize_won = 'Yes' AND stu_rollno = '$roll_no'";

$academic_query_result = mysqli_query($conn,$academic_query);
$academic_won_query_result = mysqli_query($conn,$academic_won_query);

$academic_row = mysqli_fetch_assoc($academic_query_result);
$academic_won_row = mysqli_fetch_assoc($academic_won_query_result);

$academic_count = $academic_row['count'];
$academic_won_count = $academic_won_row['count'];


    $aca_student = "SELECT student_academic_achievements.stu_rollno, sinfo.name, sinfo.batch
    FROM student_academic_achievements
    INNER JOIN sinfo ON student_academic_achievements.stu_rollno=sinfo.roll_no where student_academic_achievements.stu_rollno = '$roll_no'";
    $aca_stu_r = mysqli_query($conn,$aca_student) or die ("query 1 failed");
    $aca_stu_f = mysqli_fetch_assoc($aca_stu_r);
  ?>
                        <tr>
                            <td><?php echo $aca_stu_f['stu_rollno'];?></td>
                            <td><?php echo $aca_stu_f['name'];?></td>
                            <td><?php echo $aca_stu_f['batch'];?></td>
                            <td><?php echo $academic_count;?></td>
                            <td><?php echo $academic_won_count;?></td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
                <?php } //if of aca
    elseif($ach_type == "co"){
      ?>
                <div class="container">
                    <h2>List of Co-Curricular Achievement Students</h2>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th>Rollno</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>No. of Achievements</th>
                                <th>No. of Prize Won</th>
                            </tr>
                        </thead>
                        <?php
  while($co_row = mysqli_fetch_assoc($co_r)){
    $roll_no = $co_row['stu_rollno'];
    $cocurricular_count = 0;
$cocurricular_won_count = 0;


$cocurricular_query = "select count(*) as count from student_co_curricular_activities where stu_rollno = '$roll_no'";

$cocurricular_won_query = "select count(*) as count from student_co_curricular_activities where stu_prize_won = 'Yes' AND stu_rollno = '$roll_no'";

$cocurricular_query_result = mysqli_query($conn,$cocurricular_query);
$cocurricular_won_query_result = mysqli_query($conn,$cocurricular_won_query);

$cocurricular_row = mysqli_fetch_assoc($cocurricular_query_result);
$cocurricular_won_row = mysqli_fetch_assoc($cocurricular_won_query_result);

$cocurricular_count = $cocurricular_row['count'];
$cocurricular_won_count = $cocurricular_won_row['count'];


    $co_student = "SELECT student_co_curricular_activities.stu_rollno, sinfo.name, sinfo.batch
    FROM student_co_curricular_activities
    INNER JOIN sinfo ON student_co_curricular_activities.stu_rollno=sinfo.roll_no where student_co_curricular_activities.stu_rollno = '$roll_no'";
    $co_stu_r = mysqli_query($conn,$co_student) or die ("query 1 failed");
    $co_stu_f = mysqli_fetch_assoc($co_stu_r);
  ?>
                        <tr>
                            <td><?php echo $co_stu_f['stu_rollno'];?></td>
                            <td><?php echo $co_stu_f['name'];?></td>
                            <td><?php echo $co_stu_f['batch'];?></td>
                            <td><?php echo $cocurricular_count;?></td>
                            <td><?php echo $cocurricular_won_count;?></td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
                <?php
    } //elseif of co
    elseif($ach_type == "ext"){
      ?>
                <div class="container">
                    <h2>List of Extra-Curricular Achievement Students</h2>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th>Rollno</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>No. of Achievements</th>
                                <th>No. of Prize Won</th>
                            </tr>
                        </thead>
                        <?php
      while($ext_row = mysqli_fetch_assoc($ext_r)){
        $roll_no = $ext_row['stu_rollno'];
        $extracurricular_count = 0;
$extracurricular_won_count = 0;




$extracurricular_query = "select count(*) as count from student_extra_curricular_activities where stu_rollno = '$roll_no'";

$extracurricular_won_query = "select count(*) as count from student_extra_curricular_activities where stu_prize_won = 'Yes' AND stu_rollno = '$roll_no'";

$extracurricular_query_result = mysqli_query($conn,$extracurricular_query);
$extracurricular_won_query_result = mysqli_query($conn,$extracurricular_won_query);

$extracurricular_row = mysqli_fetch_assoc($extracurricular_query_result);
$extracurricular_won_row = mysqli_fetch_assoc($extracurricular_won_query_result);

$extracurricular_count = $extracurricular_row['count'];
$extracurricular_won_count = $extracurricular_won_row['count'];


        $ext_student = "SELECT student_extra_curricular_activities.stu_rollno, sinfo.name, sinfo.batch
        FROM student_extra_curricular_activities
        INNER JOIN sinfo ON student_extra_curricular_activities.stu_rollno=sinfo.roll_no where student_extra_curricular_activities.stu_rollno = '$roll_no'";
        $ext_stu_r = mysqli_query($conn,$ext_student) or die ("query 1 failed");
        $ext_stu_f = mysqli_fetch_assoc($ext_stu_r);
      ?>
                        <tr>
                            <td><?php echo $ext_stu_f['stu_rollno'];?></td>
                            <td><?php echo $ext_stu_f['name'];?></td>
                            <td><?php echo $ext_stu_f['batch'];?></td>
                            <td><?php echo $extracurricular_count;?></td>
                            <td><?php echo $extracurricular_won_count;?></td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
                <?php
    } //elseif of ext
    else{
      ?>
                <div class="container">
                    <h2>List of Internship of Students</h2>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th>Rollno</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>No. of Internships</th>
                                <th>No. of Prize Won</th>
                            </tr>
                        </thead>
                        <?php
      while($int_row = mysqli_fetch_assoc($int_r)){
        $roll_no = $int_row['stu_rollno'];
        $internship_count = 0;
$internship_won_count = 0;



$internship_query = "select count(*) as count from student_internship_details where stu_rollno = '$roll_no'";

$internship_won_query = "select count(*) as count from student_internship_details where awards = 'Yes' AND stu_rollno = '$roll_no'";

$internship_query_result = mysqli_query($conn,$internship_query);
$internship_won_query_result = mysqli_query($conn,$internship_won_query);

$internship_row = mysqli_fetch_assoc($internship_query_result);
$internship_won_row = mysqli_fetch_assoc($internship_won_query_result);

$internship_count = $internship_row['count'];
$internship_won_count = $internship_won_row['count'];


        $int_student = "SELECT student_internship_details.stu_rollno, sinfo.name, sinfo.batch
        FROM student_internship_details
        INNER JOIN sinfo ON student_internship_details.stu_rollno=sinfo.roll_no where student_internship_details.stu_rollno = '$roll_no'";
        $int_stu_r = mysqli_query($conn,$int_student) or die ("query 1 failed");
        $int_stu_f = mysqli_fetch_assoc($int_stu_r);
      ?>
                        <tr>
                            <td><?php echo $int_stu_f['stu_rollno'];?></td>
                            <td><?php echo $int_stu_f['name'];?></td>
                            <td><?php echo $int_stu_f['batch'];?></td>
                            <td><?php echo $internship_count;?></td>
                            <td><?php echo $internship_won_count;?></td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
                <?php
    }
    ?>

                <?php
}
?>




                <div class="container">
                    <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                    <script>
                    function goBack() {
                        window.history.back();
                    }
                    </script>
                    <button style="float: right;" class="btn btn-danger" onclick="window.print()">Print</button>
                    </br>
                    </br>
                </div>

    </body>

</html>