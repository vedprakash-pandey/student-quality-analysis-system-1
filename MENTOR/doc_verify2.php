<?php

 require "connect.php";

  $sdrn1= $_SESSION['username'];
//$que="select * from sinfo where sdrn=$sdrn1";
//$res= mysqli_query($conn,$que) or die("query 3 failed");

$student_rollno = $_SESSION['roll'];

//$student_rollno = '107';
//$student_rollno = $_GET['roll'];
    $conn = mysqli_connect('localhost', 'root','', 'mini') or die("Connection Failed");


    $query5 = "select * from student_previous_academic where stu_rollno = '$student_rollno'";
    $result5 = mysqli_query($conn , $query5) or die("query failed");
    $row5 = mysqli_fetch_assoc($result5);


   


    //$query7 = "select * from student_progress_details where stu_rollno = '$student_rollno'";
    //$result7 = mysqli_query($conn , $query7) or die("query failed");
    //$row9 = mysqli_fetch_assoc($result7);

    $query9 = "select * from student_progress_details where app_type ='new' AND mentor_sdrn = '$sdrn1' AND stu_rollno = '$student_rollno' AND stu_status='Pass' ";
    $result9 = mysqli_query($conn , $query9) or die ("query 1 failed");
    //$srnf = mysqli_fetch_assoc($resultf);

 

    $query8 = "select * from student_progress_details where stu_rollno = '$student_rollno' AND app_type ='new' AND stu_status='Pass' ";
    $result8 = mysqli_query($conn , $query8) or die("query failed");
    $row8 = mysqli_fetch_assoc($result8);
?>
<?php


          $ssc = "select * from student_previous_academic where stu_rollno = '$student_rollno'";
          $ssc_result = mysqli_query($conn , $ssc) or die("query failed");
          $ssc_row = mysqli_fetch_assoc($ssc_result);


                            if($ssc_row['ssc_status'] == 'verified'){
                              if($ssc_row['stu_hsc_institute'] != ""){
                                if($ssc_row['hsc_status'] == 'verified'){
                                  $status ="update student_previous_academic set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
                                    $result1 = mysqli_query($conn , $status) or die ("query 1 failed");
                                }elseif($ssc_row['hsc_status'] == 'unverified' || $ssc_row['hsc_status'] == 'hold'){
                                  $status ="update student_previous_academic set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
                                    $result1 = mysqli_query($conn , $status) or die ("query 1 failed");
                                }
                              }else{ // else of checking whether it hsc or diploma
                                if($ssc_row['stu_diploma_institute'] != ""){
                                if($ssc_row['diploma_status'] == 'verified'){
                                  $status ="update student_previous_academic set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
                                    $result1 = mysqli_query($conn , $status) or die ("query 1 failed");
                              }elseif($ssc_row['diploma_status'] == 'unverified' || $ssc_row['diploma_status'] == 'hold'){
                                $status ="update student_previous_academic set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
                                    $result1 = mysqli_query($conn , $status) or die ("query 1 failed");
                              }
                            }
                              }


                            }elseif($ssc_row['ssc_status'] == 'unverified' || $ssc_row['ssc_status'] == 'hold'){
                              $status ="update student_previous_academic set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
                                    $result1 = mysqli_query($conn , $status) or die ("query 1 failed");
                            }//end of if and elseif os ssc




    // ************************** Verification Process ***************************

    if(isset($_POST['save'])){


      mysqli_query($conn,"update student_previous_academic set app_type= 'old' where stu_rollno= '$student_rollno'");

    // Entries for table

    if($_POST['verified_ssc'] == 'verified')
    {
      $ssc_status ="update student_previous_academic set ssc_status= 'verified' ,
 ssc_comment = ''  where stu_rollno= '$student_rollno' ";
      $ssc_result = mysqli_query($conn , $ssc_status) or die ("query 1 failed");
    }
    elseif($_POST['verified_ssc'] == 'hold'){
      $ssc_c = $_POST['ssccomment'];
      $ssc_comment ="update student_previous_academic set ssc_comment= '$ssc_c', ssc_status= 'hold' where stu_rollno= '$student_rollno' ";
      $ssc_cexe = mysqli_query($conn , $ssc_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_hsc'] == 'verified')
    {
      $hsc_status ="update student_previous_academic set hsc_status= 'verified' , hsc_comment = '' where stu_rollno= '$student_rollno' ";
      $hsc_result = mysqli_query($conn , $hsc_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_hsc'] == 'hold'){
      $hsc_c = $_POST['hsccomment'];
      $hsc_comment ="update student_previous_academic set hsc_comment= '$hsc_c', hsc_status= 'hold' where stu_rollno= '$student_rollno' ";
      $hsc_cexe = mysqli_query($conn , $hsc_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_diploma'] == 'verified')
    {
      $diploma_status ="update student_previous_academic set diploma_status= 'verified' , diploma_comment = '' where stu_rollno= '$student_rollno' ";
      $diploma_result = mysqli_query($conn , $diploma_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_diploma'] == 'hold'){
      $diploma_c = $_POST['diplomacomment'];
      $diploma_comment ="update student_previous_academic set diploma_comment= '$diploma_c', diploma_status= 'hold' where stu_rollno= '$student_rollno' ";
      $diploma_cexe = mysqli_query($conn , $diploma_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    $query6 = "select * from student_previous_academic where stu_rollno = '$student_rollno'";
    $result6 = mysqli_query($conn , $query5) or die("query failed");
    $row6 = mysqli_fetch_assoc($result6);

  $dest="../student_document/student_verified_document";
  $dest1="../student_document/student_unverified_document";


    if($row6['ssc_status'] == "verified"){
      $cur = $row6['stu_ssc_marksheet'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row6["stu_ssc_marksheet"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_previous_academic set stu_ssc_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");
          }

        }
      }
      else{

        $tmp =explode('/',$row6["stu_ssc_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_previous_academic set stu_ssc_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row6['stu_ssc_marksheet'];
      $tmp =explode('/',$row6["stu_ssc_marksheet"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur,$updated_dest);
        unlink($cur);
        mysqli_query($conn ,"update student_previous_academic set stu_ssc_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


      }
    }

    if($row6['hsc_status'] == "verified"){
      $cur = $row6['stu_hsc_marksheet'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row6["stu_hsc_marksheet"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_previous_academic set stu_hsc_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");
          }

        }
      }
      else{

        $tmp =explode('/',$row6["stu_hsc_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_previous_academic set stu_hsc_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row6['stu_hsc_marksheet'];
      $tmp =explode('/',$row6["stu_hsc_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_previous_academic set stu_hsc_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }

    if($row6['diploma_status'] == "verified"){
      $cur = $row6['stu_diploma_marksheet'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row6["stu_diploma_marksheet"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_previous_academic set stu_diploma_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");
          }

        }
      }
      else{

        $tmp =explode('/',$row6["stu_diploma_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_previous_academic set stu_diploma_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{  //for unverified
      $cur = $row6['stu_diploma_marksheet'];
      $tmp =explode('/',$row6["stu_diploma_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_previous_academic set stu_diploma_marksheet= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }

    header("location:doc_verify2.php");
    //header("location:doc_verify2.php");
    } // close for isset save button

if(isset($_POST['sem_save'])){

   //mysqli_query($conn,"update student_progress_details set app_type= 'old' where stu_rollno= '$student_rollno'");

$sem_status = $_POST['verified_sem'];
$stu_sem = $_POST['stu_sem'];
$sem_comment = $_POST['marksheet_comment'];

mysqli_query($conn,"update student_progress_details set app_type= 'old' where stu_rollno= '$student_rollno' and stu_sem='$stu_sem'");


if($sem_status == "verified")
{
 $sem_query = "update student_progress_details set
 marksheet_status = 'verified',
 marksheet_comment = '',
 verify_status = 'verified' where stu_rollno = '$student_rollno'
 and stu_sem = '$stu_sem'";
 mysqli_query($conn,$sem_query) or die("sem query failed");

}
  elseif($sem_status == "hold")
  {

 $sem_query = "update student_progress_details set
 marksheet_status = 'hold',
 marksheet_comment = '$sem_comment',
 verify_status = 'unverified' where stu_rollno = '$student_rollno'
 and stu_sem = '$stu_sem'";
 mysqli_query($conn,$sem_query) or die("sem query failed");


  }

    $query6_sem = "select * from student_progress_details where stu_rollno = '$student_rollno' and stu_sem = '$stu_sem' and stu_status ='Pass'";
    $result6_sem = mysqli_query($conn , $query6_sem) or die("query failed");
    $row6_sem = mysqli_fetch_assoc($result6_sem);

  $dest="../student_document/student_verified_document";
  
  $dest1="../student_document/student_unverified_document";


  if($row6_sem['verify_status'] == "verified"){
      $cur = $row6_sem['stu_marksheet'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row6_sem["stu_marksheet"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_progress_details set stu_marksheet= '$updated_dest' where stu_rollno= '$student_rollno' and stu_sem = '$stu_sem'") or die ("query 1 failed");
          }

        }
      }
      else{

        $tmp =explode('/',$row6_sem["stu_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_progress_details set stu_marksheet= '$updated_dest' where stu_rollno= '$student_rollno' and stu_sem = '$stu_sem'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row6_sem['stu_marksheet'];
      $tmp =explode('/',$row6_sem["stu_marksheet"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_progress_details set stu_marksheet= '$updated_dest' where stu_rollno= '$student_rollno' and stu_sem = '$stu_sem'") or die ("query 1 failed");


        }
    }

header("location:doc_verify2.php");
}



  /*
*/
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

    <!-- 1.1 personal-details -->

    <div class="container">
        <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="studentdetailsM.php">Student Details</a></li>
            <li class="breadcrumb-item active">Document Verification 2 &nbsp; <?php echo"<b>($student_rollno)</b>" ?></li>
        </ul>


        <fieldset class="Personal-details-unverified">
            <legend><span class="legend-saveddesign">&nbsp; Academic Details &nbsp;</span> 
            <?php  
                if($row5['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        </legend>

            <?php  if(mysqli_num_rows($result5)>=1) {?>
            <form action="#" method="post" enctype="multipart/form-data">
                <!-- backend php  -->
                <table class="table table-secondary table-stripped table-hover">
                    <tr>
                        <th>Examination </th>
                        <th>Name of Institute/College </th>
                        <th>Name of Board/University</th>
                        <th>Year of Passing</th>
                        <th>Percentage</th>
                        <th>Marksheet</th>
                        <th>Hold/Verify</th>
                    </tr>

                    <tr>
                        <th class="ssc"> SSC - 10th </th>
                        <td> <?php echo $row5['stu_ssc_institute']; ?> </td>
                        <td> <?php echo $row5['stu_ssc_board']; ?> </td>
                        <td> <?php echo $row5['stu_ssc_year']; ?> </td>
                        <td> <?php echo $row5['ssc_percent']; ?> </td>
                        <td><button type="button" class="viewbtn" name="ssc_marksheet"
                                id="ssc"><?php $path=$row5['stu_ssc_marksheet']; echo "<a href='view.php?path= $path' >SSC Marksheet</a>"; ?></button>
                        </td>
                        <td>
                            <div class="col-sm">
                                <label for="holdckbox">
                                    <input id="ssch" class="form-check-input" type="radio" value="hold"
                                        name="verified_ssc"
                                        <?php if($row5['ssc_status'] == "hold") echo "checked"; ?>>Hold
                                    <input id="sscr" type="textbox" placeholder="comments" name="ssccomment"
                                        value="<?php echo $row5['ssc_comment'];?>">
                                </label>
                            </div>
                            <div class="col-sm">
                                <label for="verifyckbox">
                                    <input id="sscv" class="form-check-input" type="radio" name="verified_ssc"
                                        value="verified"
                                        <?php if($row5['ssc_status'] == "verified") echo "checked"; ?>>Verify

                                </label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <?php if($row5['stu_hsc_institute'] != ""){ ?>
                        <th class="hsc"> HSC- 12th</th>
                        <td> <?php echo $row5['stu_hsc_institute']; ?> </td>
                        <td> <?php echo $row5['stu_hsc_board']; ?> </td>
                        <td> <?php echo $row5['stu_hsc_year']; ?> </td>
                        <td> <?php echo $row5['hsc_percent']; ?> </td>
                        <td><button type="button" class="viewbtn" name="hsc_marksheet"
                                id="hsc"><?php $path=$row5['stu_hsc_marksheet']; echo "<a href='view.php?path= $path' >HSC Marksheet</a>"; ?></button>
                        </td>
                        <td>
                            <div class="col-sm">
                                <label for="holdckbox">
                                    <input id="hsch" class="form-check-input" type="radio" value="hold"
                                        name="verified_hsc"
                                        <?php if($row5['hsc_status'] == "hold") echo "checked"; ?>>Hold
                                    <input id="hscr" type="textbox" placeholder="comments" name="hsccomment"
                                        value="<?php echo $row5['hsc_comment'];?>">
                                </label>
                            </div>
                            <div class="col-sm">
                                <label for="verifyckbox">
                                    <input id="hscv" class="form-check-input" type="radio" name="verified_hsc"
                                        value="verified"
                                        <?php if($row5['hsc_status'] == "verified") echo "checked"; ?>>Verify
                                </label>

                            </div>
                        </td>
                        <?php } ?>
                    </tr>

                    <tr>
                        <?php if($row5['stu_diploma_institute'] != ""){ ?>
                        <th class="diploma"> Diploma </th>
                        <td> <?php echo $row5['stu_diploma_institute']; ?> </td>
                        <td> <?php echo $row5['stu_diploma_board']; ?> </td>
                        <td> <?php echo $row5['stu_diploma_year']; ?> </td>
                        <td> <?php echo $row5['diploma_percent']; ?> </td>
                        <td><button type="button" class="viewbtn" name="diploma_marksheet"
                                id="diploma"><?php $path=$row5['stu_diploma_marksheet']; echo "<a href='view.php?path= $path' >Diploma Marksheet</a>"; ?></button>
                        </td>
                        <td>
                            <div class="col-sm">
                                <label for="holdckbox">
                                    <input id="diplomah" class="form-check-input" type="radio" value="hold"
                                        name="verified_diploma"
                                        <?php if($row5['diploma_status'] == "hold") echo "checked"; ?>>Hold
                                    <input id="diplomar" type="textbox" placeholder="comments" name="diplomacomment"
                                        value="<?php echo $row5['diploma_comment'];?>">
                                </label>
                            </div>
                            <div class="col-sm">
                                <label for="verifyckbox">
                                    <input id="diplomav" class="form-check-input" type="radio" name="verified_diploma"
                                        value="verified"
                                        <?php if($row5['diploma_status'] == "verified") echo "checked"; ?>>Verify
                                </label>

                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                </table>

    </div>
    <div class="container">
        <button type="submit" class="btn btn-primary" name="save">Save</button>
    </div>
    <?php  } ?>


    </form>
    <br><br>
    <div class="container">
        <fieldset class="academic-details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Progress of Student &nbsp;</span> 
            <?php  
                if($row8['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        
        </legend>


            <div id="accordion">


                <?php
                 $letter = 'A';
                while($row9 = mysqli_fetch_assoc($result9)){ 
                  $letterAscii = ord($letter);
                  $letterAscii++;
                  $letter = chr($letterAscii);
                  ?>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">

                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter; ?>'>
                            <?php
                      $current_sem = $row9['stu_sem'];
                      echo $current_sem."-".$row9['stu_status'];?>
                            </a>
                        </div>

                        <div id="<?php echo $letter;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="year"> Year :</label> <?php echo $row9['stu_year']; ?>
                                </div>
                                <input name="stu_sem" type="hidden" value="<?php echo $row9['stu_sem'];?>">
                                <div class="form-group">
                                    <label for="semester"> Semester :</label> <?php echo $row9['stu_sem']; ?>
                                </div>
                                <?php if($row9['stu_status'] == 'Pass'){ ?>
                                <div class="form-group">
                                    <label for="status"> Status :</label> <?php echo $row9['stu_status']; ?>
                                </div>
                                <div class="form-group">
                                    <label for="pointer"> Pointer :</label> <?php echo $row9['stu_pointer']; ?>
                                </div>
                                <div class="form-group">
                                    <label for="attempt"> No. of Attempts :</label> <?php echo $row9['stu_attempts']; ?>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg">
                                            <label for="marksheet"> Marksheet :</label>
                                        </div>
                                        <div class="col-sm">
                                            <button type="button" class="viewbtn" name="progress_marksheet"
                                                id="marksheet"><?php $path=$row9['stu_marksheet']; echo "<a href='view.php?path= $path' >View Marksheet</a>"; ?></button>
                                        </div>
                                        <div class="col-sm">
                                            <label for="holdckbox">
                                                <input id="marksheeth" type="radio" value="hold" name="verified_sem" <?php
         if($row9['marksheet_status'] == "hold") echo "checked"; ?>>Hold
                                                <input id="marksheetr" type="textbox" placeholder="comments"
                                                    name="marksheet_comment"
                                                    value="<?php echo $row9['marksheet_comment'];?>">
                                            </label>
                                        </div>
                                        <div class="col-sm">
                                            <label for="verifyckbox">
                                                <input id="marksheetv" type="radio" value="verified" name="verified_sem" <?php
         if($row9['marksheet_status'] == "verified") echo "checked"; ?>>Verify
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="sem_save">Save</button>
                                    <?php
                  }//end of if
                  elseif($row9['stu_status'] == 'KT'){ ?>
                                    <div class="form-group">
                                        <label for="n_kts"> No. of KTs :</label> <?php echo $row9['stu_no_of_kts']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="live_kt"> Live KTs :</label> <?php echo $row9['stu_live_kts']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="dead_kt"> Dead KTs :</label> <?php echo $row9['stu_dead_kts']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject"> KT Subjects :</label>
                                        <?php echo $row9['stu_kt_subject']; ?>
                                    </div>

                                    <?php } // end of elseif ?>

                                </div>


                </form>
            </div>
    </div>


    <?php } //end of while?>
    </div>

    </fieldset>
    </div>
    </div>



    </div>
    </div>


    </fieldset>



    <div class="container">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="doc_verify1.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="doc_verify1.php">1</a></li>
            <li class="page-item active"><a class="page-link" href="doc_verify2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify3.php">3</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify4.php">4</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify5.php">5</a></li>
            <li class="page-item">
                <a class="page-link" href="doc_verify3.php" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>


    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
    <link rel="stylesheet" type="text/js" href="js/mentor.js?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    </script>

    <!--footer-->
    <?php
        include "footer.php";
  ?>
</body>

</html>