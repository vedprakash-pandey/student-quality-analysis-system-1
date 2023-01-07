<?php

require "connect.php";

  $sdrn1= $_SESSION['username'];
  $student_rollno = $_SESSION['roll'];


 $query3 = "select * from student_internship_details where stu_rollno = '$student_rollno' AND app_type ='new'";
 $result3 = mysqli_query($conn , $query3) or die("query failed");
 $num3 = mysqli_num_rows($result3);

 $querya = "select * from student_internship_details where stu_rollno = '$student_rollno' AND app_type ='new'";
 $resulta = mysqli_query($conn , $querya) or die("query failed");
 $numa = mysqli_num_rows($resulta);
 $rowa = mysqli_fetch_array($resulta);

 $query = "select * from student_placement_details where stu_rollno = '$student_rollno'";
 $result = mysqli_query($conn , $query) or die("query failed");
 $num = mysqli_num_rows($result);
 $row = mysqli_fetch_array($result);

 $query1 = "select * from student_higherstudies_details where stu_rollno = '$student_rollno'";
 $result1 = mysqli_query($conn , $query1) or die("query failed");
 $num1 = mysqli_num_rows($result1);
 $row1 = mysqli_fetch_array($result1);


if(isset($_POST['internship_save']))
{
    $project_title = $_POST['project_title'];
  mysqli_query($conn,"update student_internship_details set app_type= 'old' where stu_rollno= '$student_rollno' and title = '$project_title'");

  //$project_title = $_POST['project_title'];

  if($_POST['verified_internship_certi'] == 'verified')
  {

    $query_internship = " update student_internship_details set
    internship_certi_status = 'verified' , verify_status ='verified',
    internship_certi_comment = ''
    where stu_rollno = '$student_rollno' and title = '$project_title'";

    mysqli_query($conn,$query_internship) or die("update query failed");

  }
  elseif($_POST['verified_internship_certi'] == "hold"){

    $comment = $_POST['internship_certi_comment'];
   $query_internship = " update student_internship_details set
    internship_certi_status = 'hold',
    internship_certi_comment = '$comment', verify_status ='unverified'
    where stu_rollno = '$student_rollno' and title = '$project_title'";

    mysqli_query($conn,$query_internship) or die("update query failed");


  }
  header("location:doc_verify4.php");
  //header("location:doc_verify4.php");
}
$query4 = "select * from student_internship_details where stu_rollno = '$student_rollno' AND app_type ='new'";
 $result4 = mysqli_query($conn , $query4) or die("query failed");
//$result4 = mysqli_query($conn , $query4) or die("query failed");

$dest="../student_document/student_verified_document";
$dest1="../student_document/student_unverified_document";



while($row4 = mysqli_fetch_assoc($result4))
{
   if($row4['internship_certi_status'] == 'verified')
   {


   $cur = $row4['internship_certi'];
   $title = $row4['title'];

        if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row4["internship_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_internship_details set internship_certi = '$updated_dest' where stu_rollno= '$student_rollno' and title='$title'") or die ("query 1 failed");
          }

        }
      }
      else{
          $tmp =explode('/',$row4["internship_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_internship_details set internship_certi = '$updated_dest' where stu_rollno= '$student_rollno' and title='$title'") or die ("query 1 failed");


        }

      }
   }else{ //for unverified

    $cur = $row4['internship_certi'];
   $title = $row4['title'];
   $tmp =explode('/',$row4["internship_certi"]);
   $ext = end($tmp);
   $updated_dest = $dest1."/".$student_rollno."/".$ext;
   if(!(file_exists($updated_dest))){
     copy($cur,$updated_dest);
     unlink($cur);
     mysqli_query($conn ,"update student_internship_details set internship_certi = '$updated_dest' where stu_rollno= '$student_rollno' and title='$title'") or die ("query 1 failed");
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
    <link rel="stylesheet" href="css/mentor.css">

    <!-- link for icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    fieldset {
        opacity: 1;
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


    <div class="container">
        <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="studentdetailsM.php">Student Details</a></li>
            <li class="breadcrumb-item active">Document Verification 4 &nbsp; <?php echo"<b>($student_rollno)</b>" ?></li>
        </ul>


        <fieldset class="internship-details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Internship Details &nbsp;</span>
            <?php  
                if($rowa['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        
        </legend>


            <?php if($num3==0){ ?>
            <div class="card">
                <div class="card-header">
                    <a class="card-link">
                        Not done any internship
                    </a>
                </div>
            </div>
            <?php } else{
                $letter = 'A';
                $count = 0;
            
  while($row3 = mysqli_fetch_assoc($result3))
        { 
            $letterAscii = ord($letter);
                 // $letterAscii++;
                  $count++;
                  $letter = chr($letterAscii).$count;
            ?>
            <div id="accordion">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter; ?>'>

                                <?php echo $row3['title'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <div class="container">
                                        <input name="project_title" type="hidden" value="<?php echo $row3['title'];?>">
                                        <label for="project_title">Project title:</label>
                                        <?php echo $row3['title'];?>
                                    </div>

                                    <div class="container">
                                        <label for="domain"> Domain</label> <?php echo $row3['domain'];?>
                                    </div>

                                    <div class="container">
                                        <label for="duration-of-internship"> Duration :</label>
                                        <?php echo $row3['duration'];?>
                                    </div>

                                    <div class="container">
                                        <label for="type-of-internship"> type :</label> <?php echo $row3['type'];?>
                                    </div>

                                    <div class="container">
                                        <label for="organization"> Organization :</label>
                                        <?php echo $row3['organization'];?>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label>Certificate:</label>
                                                <button type="button" class="viewbtn " name=" e_event_prize_won"
                                                    id="prize" required><?php  $path = $row3['internship_certi'];
               echo "<a href='$path' >View Internship certi</a>"; ?></button>

                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input class="form-check-input" type="radio" value="hold"
                                                        name="verified_internship_certi"
                                                        <?php   if($row3['internship_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="" type="textbox" placeholder="comments"
                                                    name="internship_certi_comment"
                                                    <?php   if($row3['internship_certi_status'] == "hold") echo "value=".$row3['internship_certi_comment']; ?>>
                                            </div>

                                            <label for="verifyckbox">
                                                <input class="form-check-input" type="radio"
                                                    name="verified_internship_certi" value="verified"
                                                    <?php   if($row3['internship_certi_status'] == "verified") echo "checked"; ?>>Verify
                                            </label>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <label for="award"> Awards :</label> <?php echo $row3['awards'];?>
                                    </div>



                                    <button name="internship_save" type="submit" class="btn btn-primary"> Save </button>
                            </div>
                        </div>
                    </div>

            </div>


            </form>
            <?php }
                    } ?>
        </fieldset>

    </div>

    <div class="container">
        <fieldset class="placement-details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Placement Details &nbsp;</span> </legend>
            <!-- backend php  -->
            <?php  if(mysqli_num_rows($result)>=1) { if($row['placement_status'] == 'placed') { ?>
            <div class="container">
                <label> Placement Status : </label> <?php echo $row['placement_status']; ?>
            </div>

            <div class="container">
                <label> Company Name :</label> <?php echo $row['company_name']; ?>
            </div>

            <div class="container">
                <label> City :</label> <?php echo $row['city']; ?>
            </div>

            <div class="container">
                <label> State :</label> <?php echo $row['state']; ?>
            </div>

            <div class="container">
                <label>Package :</label> <?php echo $row['package']." INR"; ?>
            </div>

            <?php } else { ?>

            <div class="container">
                <label> Placement Status : </label> <?php echo $row['placement_status']; ?>
            </div>

            <?php }
                                           }?>

        </fieldset>
    </div>

    <div class="container">
        <fieldset class="higher-study-details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Higher Study Details &nbsp;</span> </legend>

            <?php  if(mysqli_num_rows($result1)>=1) { if($row1['higher_study_plan'] == 'Yes') { ?>
            <div class="container">
                <label> Higher study plan : </label> <?php echo $row1['higher_study_plan']; ?>
            </div>

            <div class="container">
                <label> Course :</label> <?php echo $row1['course']; ?>
            </div>

            <div class="container">
                <label> City :</label> <?php echo $row1['city']; ?>
            </div>

            <div class="container">
                <label> State :</label> <?php echo $row1['state']; ?>
            </div>



            <?php } else { ?>

            <div class="container">
                <label> Higher study plans : </label> <?php echo $row1['higher_study_plan']; ?>
            </div>

            <?php }
                                           }?>



        </fieldset>

    </div>


    <div class="container">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="doc_verify3.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="doc_verify1.php">1</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify3.php">3</a></li>
            <li class="page-item active"><a class="page-link" href="doc_verify4.php">4</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify5.php">5</a></li>
            <li class="page-item">
                <a class="page-link" href="doc_verify5.php" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>


    </ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!--footer-->
    <?php
        include "footer.php";
  ?>
</body>

</html>