<?php

require "connect.php";

$temp = $_GET['roll'];
if($temp=='')
{
}
else{
  $_SESSION['roll']= $temp;
}


$student_rollno = $_SESSION['roll'];
$query1 ="select * from sinfo where roll_no = '$student_rollno'";
$result = mysqli_query($conn,$query1) or die("query failed");
$row = mysqli_fetch_assoc($result);
$sdrn1= $row['sdrn'];
$query3="select * from sinfo where sdrn=$sdrn1";
$result3= mysqli_query($conn,$query3) or die("query 3 failed");
$row3 = mysqli_fetch_assoc($result3);

$query4="select * from sinfo where sdrn=$sdrn1 and roll_no='$student_rollno'";
$result4= mysqli_query($conn,$query4) or die("query 3 failed");
$row4 = mysqli_fetch_assoc($result4);

$table_query = " select stu_sem , sum(stu_pointer) as stu_pointer , sum(stu_no_of_kts) as stu_no_of_kts , sum(stu_live_kts) as stu_live_kts , sum(stu_dead_kts) as stu_dead_kts from student_progress_details where stu_rollno = '$student_rollno' AND mentor_sdrn = '$sdrn1' group by stu_sem ";

$table_result = mysqli_query($conn , $table_query) or die("table query failed");

     $dead1 = 0;
     $live1 = 0;
     $sem1 = 0;
     $dead2 = 0;
     $live2 = 0;
     $sem2 = 0;
     $dead3 = 0;
     $live3 = 0;
     $sem3 = 0;
     $dead4 = 0;
     $live4 = 0;
     $sem4 = 0;
     $dead5 = 0;
     $live5 = 0;
     $sem5 = 0;
     $dead6 = 0;
     $live6 = 0;
     $sem6 = 0;
     $dead7 = 0;
     $live7 = 0;
     $sem7 = 0;
     $dead8 = 0;
     $live8 = 0;
     $sem8 = 0;

$academic_count = 0;
$academic_won_count = 0;

$cocurricular_count = 0;
$cocurricular_won_count = 0;

$extracurricular_count = 0;
$extracurricular_won_count = 0;

$internship_count = 0;
$internship_won_count = 0;

$academic_query = "select count(*) as count from student_academic_achievements where stu_rollno = '$student_rollno'";

$academic_won_query = "select count(*) as count from student_academic_achievements where stu_prize_won = 'Yes' AND stu_rollno = '$student_rollno'";

$academic_query_result = mysqli_query($conn,$academic_query);
$academic_won_query_result = mysqli_query($conn,$academic_won_query);

$academic_row = mysqli_fetch_assoc($academic_query_result);
$academic_won_row = mysqli_fetch_assoc($academic_won_query_result);

$academic_count = $academic_row['count'];
$academic_won_count = $academic_won_row['count'];




$cocurricular_query = "select count(*) as count from student_co_curricular_activities where stu_rollno = '$student_rollno'";

$cocurricular_won_query = "select count(*) as count from student_co_curricular_activities where stu_prize_won = 'Yes' AND stu_rollno = '$student_rollno'";

$cocurricular_query_result = mysqli_query($conn,$cocurricular_query);
$cocurricular_won_query_result = mysqli_query($conn,$cocurricular_won_query);

$cocurricular_row = mysqli_fetch_assoc($cocurricular_query_result);
$cocurricular_won_row = mysqli_fetch_assoc($cocurricular_won_query_result);

$cocurricular_count = $cocurricular_row['count'];
$cocurricular_won_count = $cocurricular_won_row['count'];


$internship_query = "select count(*) as count from student_internship_details where stu_rollno = '$student_rollno'";

$internship_won_query = "select count(*) as count from student_internship_details where awards = 'Yes' AND stu_rollno = '$student_rollno'";

$internship_query_result = mysqli_query($conn,$internship_query);
$internship_won_query_result = mysqli_query($conn,$internship_won_query);

$internship_row = mysqli_fetch_assoc($internship_query_result);
$internship_won_row = mysqli_fetch_assoc($internship_won_query_result);

$internship_count = $internship_row['count'];
$internship_won_count = $internship_won_row['count'];



$extracurricular_query = "select count(*) as count from student_extra_curricular_activities where stu_rollno = '$student_rollno'";

$extracurricular_won_query = "select count(*) as count from student_extra_curricular_activities where stu_prize_won = 'Yes' AND stu_rollno = '$student_rollno'";

$extracurricular_query_result = mysqli_query($conn,$extracurricular_query);
$extracurricular_won_query_result = mysqli_query($conn,$extracurricular_won_query);

$extracurricular_row = mysqli_fetch_assoc($extracurricular_query_result);
$extracurricular_won_row = mysqli_fetch_assoc($extracurricular_won_query_result);

$extracurricular_count = $extracurricular_row['count'];
$extracurricular_won_count = $extracurricular_won_row['count'];




   $sem_g = "select * from student_progress_details where stu_rollno = '$student_rollno' AND mentor_sdrn = '$sdrn1'";
   $sem_r = mysqli_query($conn , $sem_g) or die ("query 1 failed");
  // $sem_f = mysqli_fetch_assoc($sem_r);

  $sem_c = "select * from student_progress_details where stu_rollno = '$student_rollno' AND mentor_sdrn = '$sdrn1'";
   $sem_b = mysqli_query($conn , $sem_c) or die ("query 1 failed");



   while($sem_f = mysqli_fetch_assoc($sem_r)){
   if($sem_f['stu_sem'] == 'sem1'){

     if($sem_f['stu_status'] == 'Pass'){
     $sem1 = $sem_f['stu_pointer'];
     }else{
     $dead1 = $sem_f['stu_dead_kts'];
     $live1 = $sem_f['stu_live_kts'];
     }
   }
   if($sem_f['stu_sem'] == 'sem2'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem2 = $sem_f['stu_pointer'];
      }else{
      $dead2 = $sem_f['stu_dead_kts'];
      $live2 = $sem_f['stu_live_kts'];
      }
  }
  if($sem_f['stu_sem'] == 'sem3'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem3 = $sem_f['stu_pointer'];
      }else{
      $dead3 = $sem_f['stu_dead_kts'];
      $live3 = $sem_f['stu_live_kts'];
      }
  }
  if($sem_f['stu_sem'] == 'sem4'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem4 = $sem_f['stu_pointer'];
      }else{
      $dead4 = $sem_f['stu_dead_kts'];
      $live4 = $sem_f['stu_live_kts'];
      }
  }
  if($sem_f['stu_sem'] == 'sem5'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem5 = $sem_f['stu_pointer'];
      }else{
      $dead5 = $sem_f['stu_dead_kts'];
      $live5 = $sem_f['stu_live_kts'];
      }
  }
  if($sem_f['stu_sem'] == 'sem6'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem6 = $sem_f['stu_pointer'];
      }else{
      $dead6 = $sem_f['stu_dead_kts'];
      $live6 = $sem_f['stu_live_kts'];
      }
  }
  if($sem_f['stu_sem'] == 'sem7'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem7 = $sem_f['stu_pointer'];
      }else{
      $dead7 = $sem_f['stu_dead_kts'];
      $live7 = $sem_f['stu_live_kts'];
      }
  }
  if($sem_f['stu_sem'] == 'sem8'){

    if($sem_f['stu_status'] == 'Pass'){
      $sem8 = $sem_f['stu_pointer'];
      }else{
      $dead8 = $sem_f['stu_dead_kts'];
      $live8 = $sem_f['stu_live_kts'];
      }
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
    <link rel="stylesheet" type="text/css" href="css/adminhome.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

    <!-- link for icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    .student-progress {
        margin: 0 auto;
    }

    .title {
        font-family: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
        color: gray;
        font-size: 42px;
    }

    .graphheading {
        font-family: sans-serif;
        color: black;
        font-size: 20px;
        font-weight: 700;
        text-align: center;
    }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'semister');
        data.addColumn('number', 'LiveKts');
        data.addColumn('number', 'DeadKts');
        data.addColumn('number', 'Pointer');
        data.addRow(['sem1', <?php echo $live1;?>, <?php echo $dead1;?>, <?php echo $sem1;?>]);
        data.addRow(['sem2', <?php echo $live2;?>, <?php echo $dead2;?>, <?php echo $sem2;?>]);
        data.addRow(['sem3', <?php echo $live3;?>, <?php echo $dead3;?>, <?php echo $sem3;?>]);
        data.addRow(['sem4', <?php echo $live4;?>, <?php echo $dead4;?>, <?php echo $sem4;?>]);
        data.addRow(['sem5', <?php echo $live5;?>, <?php echo $dead5;?>, <?php echo $sem5;?>]);
        data.addRow(['sem6', <?php echo $live6;?>, <?php echo $dead6;?>, <?php echo $sem6;?>]);
        data.addRow(['sem7', <?php echo $live7;?>, <?php echo $dead7;?>, <?php echo $sem7;?>]);
        data.addRow(['sem8', <?php echo $live8;?>, <?php echo $dead8;?>, <?php echo $sem8;?>]);




        var options = {
            // title : 'Individual Student Progress',
            vAxis: {
                title: 'No of KTs'
            },
            hAxis: {
                title: 'Semester'
            },
            seriesType: 'bars',
            isStacked: true,
            colors: ['#3366CC', '#DC3912', '#109618'],
            series: {
                2: {
                    type: 'line'
                }
            }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>


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
        <div class="row graphheading">
            <div class="col-sm-4">Name : <?php echo $row4['name'];?></div>
            <div class="col-sm-4">Roll No : <?php echo $row4['roll_no'];?></div>
            <div class="col-sm-4">Batch : <?php echo $row4['batch'];?></div>
            </b>
        </div>
    </div>
    <br>


    <div class="container-fluid">
        <span class="title">
            <b><i>
                    <p class="text-center"> Individual Student Performance </p>
            </b></i>
        </span>

        <div id="chart_div" class="student-progress" style="width: 1100px; height: 650px;"></div>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-primary">
                    <th> Semester</th>
                    <th> Status </th>
                    <th> Pointer</th>
                    <th> Live KTs</th>
                    <th> Dead KTs</th>
                    <th> Total No. of KTs</th>
                </tr>
            </thead>
            <?php
while($sem_a = mysqli_fetch_assoc($table_result)){
  ?>
            <tr class="table-success">
                <td><?php echo $sem_a['stu_sem']; ?></td>
                <td><?php if($sem_a['stu_live_kts'] == 0){ echo "Pass"; } else { echo "KT"; } ?></td>
                <td> <?php echo round($sem_a['stu_pointer'],3); ?> </td>
                <td> <?php echo $sem_a['stu_live_kts']; ?> </td>
                <td> <?php echo $sem_a['stu_dead_kts']; ?> </td>
                <td> <?php echo  $sem_a['stu_no_of_kts']; ?> </td>

            </tr>

            <?php
}
?>

        </table>
    </div>



    <style>
    .student-activities {
        margin: 0 auto;
    }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.load('visualization', '1', {
        packages: ['corechart', 'bar'],
        callback: drawBarChart
    });

    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ['Field', 'No of Prize Won', 'Total Number'],
            ['Academic Achivement', <?php echo $academic_won_count; ?>, <?php echo $academic_count; ?>],
            ['Extra- curricular Activities', <?php echo $extracurricular_won_count; ?>,
                <?php echo $extracurricular_count; ?>
            ],
            ['Co-curricular Activities', <?php echo $cocurricular_won_count; ?>,
                <?php echo $cocurricular_count; ?>
            ],
            ['Internship', <?php echo $internship_won_count; ?>, <?php echo $internship_count; ?>],
        ]);

        var options = {
            chart: {
                // title : 'Individual Student Activities',
            },
            vAxis: {
                ticks: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                title: 'Total Number',
            },
            hAxis: {
                title: 'Activities',
            }
        };


        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_hours'));
        chart.draw(data, options);

        var chart2 = new google.charts.Bar(document.getElementById('columnchart_hours2'));
        chart2.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
    </head>

    <body>



        <div class="container-fluid">
            <span class="title">
                <b><i>
                        <p class="text-center"> Individual Student Activities </p>
                </b></i> </span>
            <script src="https://www.google.com/jsapi"></script>
            <div id="columnchart_hours" class="student-activities" style="width: 1100px; height: 650px;"></div>

            <div class="container">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th> Achievements</th>
                            <th> Total no of Achievements</th>
                            <th> Total Prize won</th>
                        </tr>
                    </thead>

                    <tr class="table-success">
                        <td>Academic Achivement</td>
                        <td><?php echo $academic_count; ?></td>
                        <td><?php echo $academic_won_count; ?></td>
                    </tr>


                    <tr class="table-success">
                        <td>Extra- curricular Activities</td>
                        <td><?php echo $extracurricular_count; ?></td>
                        <td><?php echo $extracurricular_won_count; ?></td>
                    </tr>

                    <tr class="table-success">
                        <td>Co- curricular Activities</td>
                        <td><?php echo $cocurricular_count; ?></td>
                        <td><?php echo $cocurricular_won_count; ?></td>
                    </tr>

                    <tr class="table-success">
                        <td>Internship</td>
                        <td><?php echo $internship_count; ?></td>
                        <td><?php echo $internship_won_count; ?></td>
                    </tr>


                </table>
            </div>

            <div class="container">
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                <script>
                function goBack() {
                    window.history.back();
                }
                </script>
                <button style="float: right;" class="btn btn-danger" onclick="window.print()">Print</button>
            </div>
    </body>

</html>