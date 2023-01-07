<?php

require "connect.php";

  $sdrn1= $_SESSION['username'];
  $student_rollno = $_SESSION['roll'];

  $query13 = "select * from student_copyright_details where stu_rollno = '$student_rollno' AND app_type ='new'";
  $result13 = mysqli_query($conn , $query13) or die("query failed 13");
$num13 = mysqli_num_rows($result13);
//$row13 = mysqli_fetch_array($result13);

$querya = "select * from student_copyright_details where stu_rollno = '$student_rollno' AND app_type ='new'";
$resulta = mysqli_query($conn , $querya) or die("query failed 13");
$numa = mysqli_num_rows($resulta);
$rowa = mysqli_fetch_array($resulta);

$query14 = "select * from book_details where roll_no = '$student_rollno' AND app_type ='new'";
  $result14 = mysqli_query($conn , $query14) or die("query failed 14");
$num14 = mysqli_num_rows($result14);
//$row14 = mysqli_fetch_array($result14);

$queryb = "select * from book_details where roll_no = '$student_rollno' AND app_type ='new'";
  $resultb = mysqli_query($conn , $queryb) or die("query failed 14");
$numb = mysqli_num_rows($resultb);
$rowb = mysqli_fetch_array($resultb);

$query15 = "select * from conference_details where roll_no = '$student_rollno' AND app_type ='new'";
$result15 = mysqli_query($conn , $query15) or die("query failed 15");
$num15 = mysqli_num_rows($result15);
//$row15 = mysqli_fetch_array($result15);

$queryc = "select * from conference_details where roll_no = '$student_rollno' AND app_type ='new'";
$resultc = mysqli_query($conn , $queryc) or die("query failed 15");
$numc = mysqli_num_rows($resultc);
$rowc = mysqli_fetch_array($resultc);

$query16 = "select * from journal_details where roll_no = '$student_rollno' AND app_type ='new'";
$result16 = mysqli_query($conn , $query16) or die("query failed 16");
$num16 = mysqli_num_rows($result16);
//$row16 = mysqli_fetch_array($result16);

$queryd = "select * from journal_details where roll_no = '$student_rollno' AND app_type ='new'";
$resultd = mysqli_query($conn , $queryd) or die("query failed 16");
$numd = mysqli_num_rows($resultd);
$rowd = mysqli_fetch_array($resultd);

$query17 = "select * from patent_details where roll_no = '$student_rollno' AND app_type ='new'";
$result17 = mysqli_query($conn , $query17) or die("query failed 17");
$num17 = mysqli_num_rows($result17);
//$row17 = mysqli_fetch_array($result17);

$querye = "select * from patent_details where roll_no = '$student_rollno' AND app_type ='new'";
$resulte = mysqli_query($conn , $querye) or die("query failed 17");
$nume = mysqli_num_rows($resulte);
$rowe = mysqli_fetch_array($resulte);

if(isset($_POST['student_copyright_save'])){
    $c_title = $_POST['copyright_title'];

  mysqli_query($conn,"update student_copyright_details set app_type= 'old' where stu_rollno= '$student_rollno' and title='$c_title'");
  //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
  //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");


//$a_event = $_POST['copyright_event'];
// Entries for table

if( $_POST['verified_student_copyright'] == "verified")
{
  $status1 ="update student_copyright_details set copyright_status= 'verified', copyright_comment='' where stu_rollno= '$student_rollno' and title='$c_title'";
  $result1 = mysqli_query($conn , $status1) or die ("query 11 failed");

}
  elseif($_POST['verified_student_copyright'] == "hold"){
  $copyright_comment = $_POST['student_copyright_comment'];
   $status1 ="update student_copyright_details set copyright_status= 'hold',copyright_comment='$copyright_comment' where stu_rollno= '$student_rollno' and title='$c_title'";
  $result1 = mysqli_query($conn , $status1) or die ("query 11 failed");

  }


$query_copyright = "select * from student_copyright_details where stu_rollno = '$student_rollno' and title='$c_title'";
$result_copyright = mysqli_query($conn , $query_copyright) or die("query failed");
$row_copyright = mysqli_fetch_assoc($result_copyright);

if($row_copyright['copyright_status'] == 'verified')
     {
              $copyright_status ="update student_copyright_details set verify_status = 'verified' where stu_rollno= '$student_rollno' and title='$c_title'";
              $copyright_result = mysqli_query($conn , $copyright_status) or die ("query 1 2 failed");


     }elseif($row_copyright['copyright_status'] == 'hold'){
              $copyright_status ="update student_copyright_details set verify_status = 'unverified' where stu_rollno= '$student_rollno' and title='$c_title'";
              $copyright_result = mysqli_query($conn , $copyright_status) or die ("query 1 2 failed");
     }

$query_copyright_new = "select * from student_copyright_details where stu_rollno = '$student_rollno' and title='$c_title' ";
$result_copyright_new = mysqli_query($conn , $query_copyright_new) or die("query failed");
$row_copyright_new = mysqli_fetch_assoc($result_copyright_new);


if($row_copyright_new['verify_status'] == 'verified')
{


$dest="../student_document/student_verified_document";



  $cur1 = $row_copyright_new['copyright_doc'];

  if(!(file_exists($dest."/".$student_rollno))){
    if(mkdir($dest."/".$student_rollno, 0777)){
      $tmp =explode('/',$row_copyright_new["copyright_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update student_copyright_details set copyright_doc = '$updated_dest' where stu_rollno= '$student_rollno' and title='$c_title'") or die ("query 1 failed");
      }

    }
  }
  else{
$tmp =explode('/',$row_copyright_new["copyright_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update student_copyright_details set copyright_doc = '$updated_dest' where stu_rollno= '$student_rollno' and title='$c_title' ") or die ("query 1 failed");


    }

  }

}
else{  //for unverified

$dest1="../student_document/student_unverified_document";
$cur1 = $row_copyright_new['copyright_doc'];
$tmp =explode('/',$row_copyright_new["copyright_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update student_copyright_details set copyright_doc = '$updated_dest' where stu_rollno= '$student_rollno' and title='$c_title' ") or die ("query 1 failed");
      }

}
header("location:doc_verify5.php");
}


/////////////////***************************************************book chapter***************************************************** */

if(isset($_POST['student_bookchapter_save'])){
    $b_title = $_POST['book_title'];

  mysqli_query($conn,"update book_details set app_type= 'old' where roll_no= '$student_rollno' and title='$b_title'");
  //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
  //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");


//$a_event = $_POST['copyright_event'];
// Entries for table

if( $_POST['verified_student_bookchapter'] == "verified")
{
  $status2 ="update book_details set proof_status= 'verified', proof_comment='' where roll_no= '$student_rollno' and title='$b_title'";
  $result2 = mysqli_query($conn , $status2) or die ("query 11 failed");

}
  elseif($_POST['verified_student_bookchapter'] == "hold"){
  $book_comment = $_POST['student_bookchapter_comment'];
   $status2 ="update book_details set proof_status= 'hold',proof_comment='$book_comment' where roll_no= '$student_rollno' and title='$b_title'";
  $result2 = mysqli_query($conn , $status2) or die ("query 11 failed");

  }


$query_book = "select * from book_details where roll_no = '$student_rollno' and title='$b_title'";
$result_book = mysqli_query($conn , $query_book) or die("query failed");
$row_book = mysqli_fetch_assoc($result_book);

if($row_book['proof_status'] == 'verified')
     {
              $book_status ="update book_details set verify_status = 'verified' where roll_no= '$student_rollno' and title='$b_title'";
              $book_result = mysqli_query($conn , $book_status) or die ("query 1 2 failed");


     }elseif($row_book['proof_status'] == 'hold'){
              $book_status ="update book_details set verify_status = 'unverified' where roll_no= '$student_rollno' and title='$b_title'";
              $book_result = mysqli_query($conn , $book_status) or die ("query 1 2 failed");
     }

$query_book_new = "select * from book_details where roll_no = '$student_rollno' and title='$b_title' ";
$result_book_new = mysqli_query($conn , $query_book_new) or die("query failed");
$row_book_new = mysqli_fetch_assoc($result_book_new);


if($row_book_new['verify_status'] == 'verified')
{


$dest="../student_document/student_verified_document";



  $cur1 = $row_book_new['proof_doc'];

  if(!(file_exists($dest."/".$student_rollno))){
    if(mkdir($dest."/".$student_rollno, 0777)){
      $tmp =explode('/',$row_book_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update book_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$b_title'") or die ("query 1 failed");
      }

    }
  }
  else{
$tmp =explode('/',$row_book_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update book_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$b_title' ") or die ("query 1 failed");


    }

  }

}
else{  //for unverified

$dest1="../student_document/student_unverified_document";
$cur1 = $row_book_new['proof_doc'];
$tmp =explode('/',$row_book_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update book_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$b_title' ") or die ("query 1 failed");
      }

}
header("location:doc_verify5.php");
}


//////////////////////////////////////////*********************************** Conference Details ************************************ */


if(isset($_POST['student_conference_save'])){
    $co_title = $_POST['Conf_title'];

  mysqli_query($conn,"update conference_details set app_type= 'old' where roll_no= '$student_rollno' and title='$co_title'");
  //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
  //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");


//$a_event = $_POST['copyright_event'];
// Entries for table

if( $_POST['verified_student_conference'] == "verified")
{
  $status3 ="update conference_details set proof_status= 'verified', proof_comment='' where roll_no= '$student_rollno' and title='$co_title'";
  $result3 = mysqli_query($conn , $status3) or die ("query 11 failed");

}
  elseif($_POST['verified_student_conference'] == "hold"){
  $conference_comment = $_POST['student_conference_comment'];
   $status3 ="update conference_details set proof_status= 'hold',proof_comment='$conference_comment' where roll_no= '$student_rollno' and title='$co_title'";
  $result3 = mysqli_query($conn , $status3) or die ("query 11 failed");

  }


$query_conference = "select * from conference_details where roll_no = '$student_rollno' and title='$co_title'";
$result_conference = mysqli_query($conn , $query_conference) or die("query failed");
$row_conference = mysqli_fetch_assoc($result_conference);

if($row_conference['proof_status'] == 'verified')
     {
              $conference_status ="update conference_details set verify_status = 'verified' where roll_no= '$student_rollno' and title='$co_title'";
              $conference_result = mysqli_query($conn , $conference_status) or die ("query 1 2 failed");


     }elseif($row_conference['proof_status'] == 'hold'){
              $conference_status ="update conference_details set verify_status = 'unverified' where roll_no= '$student_rollno' and title='$co_title'";
              $conference_result = mysqli_query($conn , $conference_status) or die ("query 1 2 failed");
     }

$query_conference_new = "select * from conference_details where roll_no = '$student_rollno' and title='$co_title' ";
$result_conference_new = mysqli_query($conn , $query_conference_new) or die("query failed");
$row_conference_new = mysqli_fetch_assoc($result_conference_new);


if($row_conference_new['verify_status'] == 'verified')
{


$dest="../student_document/student_verified_document";



  $cur1 = $row_conference_new['proof_doc'];

  if(!(file_exists($dest."/".$student_rollno))){
    if(mkdir($dest."/".$student_rollno, 0777)){
      $tmp =explode('/',$row_conference_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update conference_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$co_title'") or die ("query 1 failed");
      }

    }
  }
  else{
$tmp =explode('/',$row_conference_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update conference_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$co_title' ") or die ("query 1 failed");


    }

  }

}
else{  //for unverified

$dest1="../student_document/student_unverified_document";
$cur1 = $row_conference_new['proof_doc'];
$tmp =explode('/',$row_conference_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update conference_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$co_title' ") or die ("query 1 failed");
      }

}
header("location:doc_verify5.php");
}

////////////////////******************************Journal Details ********************************** */



if(isset($_POST['student_journal_proof_save'])){
    $j_title = $_POST['jou_title'];

  mysqli_query($conn,"update journal_details set app_type= 'old' where roll_no= '$student_rollno' and title='$j_title'");
  //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
  //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");


//$a_event = $_POST['copyright_event'];
// Entries for table

if( $_POST['verified_s_journal_proof'] == "verified")
{
  $status4 ="update journal_details set proof_status= 'verified', proof_comment='' where roll_no= '$student_rollno' and title='$j_title'";
  $result4 = mysqli_query($conn , $status4) or die ("query 11 failed");

}
  elseif($_POST['verified_s_journal_proof'] == "hold"){
  $journal_comment = $_POST['s_journal_proof_comment'];
   $status4 ="update journal_details set proof_status= 'hold',proof_comment='$journal_comment' where roll_no= '$student_rollno' and title='$j_title'";
  $result4 = mysqli_query($conn , $status4) or die ("query 11 failed");

  }


$query_journal = "select * from journal_details where roll_no = '$student_rollno' and title='$j_title'";
$result_journal = mysqli_query($conn , $query_journal) or die("query failed");
$row_journal = mysqli_fetch_assoc($result_journal);

if($row_journal['proof_status'] == 'verified')
     {
              $journal_status ="update journal_details set verify_status = 'verified' where roll_no= '$student_rollno' and title='$j_title'";
              $journal_result = mysqli_query($conn , $journal_status) or die ("query 1 2 failed");


     }elseif($row_journal['proof_status'] == 'hold'){
              $journal_status ="update journal_details set verify_status = 'unverified' where roll_no= '$student_rollno' and title='$j_title'";
              $journal_result = mysqli_query($conn , $journal_status) or die ("query 1 2 failed");
     }

$query_journal_new = "select * from journal_details where roll_no = '$student_rollno' and title='$j_title' ";
$result_journal_new = mysqli_query($conn , $query_journal_new) or die("query failed");
$row_journal_new = mysqli_fetch_assoc($result_journal_new);


if($row_journal_new['verify_status'] == 'verified')
{


$dest="../student_document/student_verified_document";



  $cur1 = $row_journal_new['proof_doc'];

  if(!(file_exists($dest."/".$student_rollno))){
    if(mkdir($dest."/".$student_rollno, 0777)){
      $tmp =explode('/',$row_journal_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update journal_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$j_title'") or die ("query 1 failed");
      }

    }
  }
  else{
$tmp =explode('/',$row_journal_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update journal_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$j_title' ") or die ("query 1 failed");


    }

  }

}
else{  //for unverified

$dest1="../student_document/student_unverified_document";
$cur1 = $row_journal_new['proof_doc'];
$tmp =explode('/',$row_journal_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update journal_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$j_title' ") or die ("query 1 failed");
      }

}
header("location:doc_verify5.php");
}

//////////////////************************************Patent Errors ************************* */

if(isset($_POST['student_patent_save'])){
    $p_title = $_POST['pat_title'];

  mysqli_query($conn,"update patent_details set app_type= 'old' where roll_no= '$student_rollno' and title='$p_title'");
  //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
  //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");


//$a_event = $_POST['copyright_event'];
// Entries for table

if( $_POST['verified_student_patent'] == "verified")
{
  $status5 ="update patent_details set proof_status= 'verified', proof_comment='' where roll_no= '$student_rollno' and title='$p_title'";
  $result5 = mysqli_query($conn , $status5) or die ("query 11 failed");

}
  elseif($_POST['verified_student_patent'] == "hold"){
  $patent_comment = $_POST['student_patent_comment'];
   $status5 ="update patent_details set proof_status= 'hold',proof_comment='$patent_comment' where roll_no= '$student_rollno' and title='$p_title'";
  $result5 = mysqli_query($conn , $status5) or die ("query 11 failed");

  }


$query_patent = "select * from patent_details where roll_no = '$student_rollno' and title='$p_title'";
$result_patent = mysqli_query($conn , $query_patent) or die("query failed");
$row_patent = mysqli_fetch_assoc($result_patent);

if($row_patent['proof_status'] == 'verified')
     {
              $patent_status ="update patent_details set verify_status = 'verified' where roll_no= '$student_rollno' and title='$p_title'";
              $patent_result = mysqli_query($conn , $patent_status) or die ("query 1 2 failed");


     }elseif($row_patent['proof_status'] == 'hold'){
              $patent_status ="update patent_details set verify_status = 'unverified' where roll_no= '$student_rollno' and title='$p_title'";
              $patent_result = mysqli_query($conn , $patent_status) or die ("query 1 2 failed");
     }

$query_patent_new = "select * from patent_details where roll_no = '$student_rollno' and title='$p_title' ";
$result_patent_new = mysqli_query($conn , $query_patent_new) or die("query failed");
$row_patent_new = mysqli_fetch_assoc($result_patent_new);


if($row_patent_new['verify_status'] == 'verified')
{


$dest="../student_document/student_verified_document";



  $cur1 = $row_patent_new['proof_doc'];

  if(!(file_exists($dest."/".$student_rollno))){
    if(mkdir($dest."/".$student_rollno, 0777)){
      $tmp =explode('/',$row_patent_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update patent_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$p_title'") or die ("query 1 failed");
      }

    }
  }
  else{
$tmp =explode('/',$row_patent_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update patent_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$p_title' ") or die ("query 1 failed");


    }

  }

}
else{  //for unverified

$dest1="../student_document/student_unverified_document";
$cur1 = $row_patent_new['proof_doc'];
$tmp =explode('/',$row_patent_new["proof_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur1,$updated_dest);
        unlink($cur1);
        mysqli_query($conn ,"update patent_details set proof_doc = '$updated_dest' where roll_no= '$student_rollno' and title='$p_title' ") or die ("query 1 failed");
      }

}
header("location:doc_verify5.php");
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

    <!-- 1.1 Student-Journal-details -->

    <div class="container">
        <ul class="breadcrumb">
             <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="studentdetailsM.php">Student Details</a></li>
            <li class="breadcrumb-item active">Document Verification 5 &nbsp; <?php echo"<b>($student_rollno)</b>" ?></li>
          </ul>
        <br>
        <fieldset class="student-journal-verified">
            <legend><span class="legend-saveddesign">&nbsp; Journal Details &nbsp;</span> 
            <?php  
                if($rowd['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        </legend>


            <div id="accordion">
                <?php if($num16==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Journals Details
                        </a>
                    </div>
                </div>
                <?php } else{
                     $letter16 = 'E';
                     $count16 = 0;
  while($row16 = mysqli_fetch_assoc($result16))
        { 
            $letterAscii16 = ord($letter16);
                  //$letterAscii++;
                  $count16++;
                  $letter16 = chr($letterAscii16).$count16;
                
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter16; ?>'>
                                <?php echo $row16['title'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter16;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <div class="container">
                                        <label for="s_journal_type">Journal Type :</label> <?php echo $row16['type'];?>
                                    </div>

                                    <div class="container">
                                        <label for="s_journal_name"> Journal Name : :</label> <?php echo $row16['name'];?>
                                    </div>

                                     <div class="container">
                                     <input name="jou_title" type="hidden"
                                            value="<?php echo $row16['title'];?>">
                                        <label for="s_journal_papertitle"> Paper Title :</label> <?php echo $row16['title'];?>
                                    </div>

                                    <div class="container">
                                        <label for="s_journal_proceedingno"> Proceeding Number :</label> <?php echo $row16['number'];?>
                                    </div>

                                    <div class="container">
                                        <label for="s_journal_authors"> Authors :</label> <?php echo $row16['author'];?>
                                    </div>

                                    <div class="container">
                                        <label for="s_journal_impactfactor"> Impact Factor :</label> <?php echo $row16['factor'];?>
                                    </div>

                                    <div class="container">
                                        <label for="s_journal_impactfactor"> Month-Year :</label> <?php echo $row16['year'];?>
                                    </div>

                                  
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="s_journal_proof"> Journal Document:</label>
                                                
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name="student_journal_proof" id="student_journal_proof"
                                                    required><?php $path = $row16['proof_doc']; echo "<a href='$path' >View Journal Document </a>"; ?></button>
                                                    
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="journalpoofh" class="form-check-input" type="radio"
                                                        value="hold" name="verified_s_journal_proof" <?php
         if($row16['proof_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="journalproofr" type="textbox" placeholder="comments"
                                                    name="s_journal_proof_comment"
                                                    value="<?php echo $row16['proof_comment'];?>">
                                            </div>
                                            <label for="verifyckbox">
                                                <input id="journalproofv" class="form-check-input" type="radio"
                                                    name="verified_s_journal_proof" value="verified" <?php
         if($row16['proof_status'] == "verified") echo "checked"; ?>>Verify  
                                            </label>

                                        </div>


                                    </div>

                                    <div class="container">
                                     
                                        <div>
                                            <button name="student_journal_proof_save" type="submit" class="btn btn-primary"> Save
                                            </button>
                                        </div>

                                    </div>
                            </div>

                        </div>

                    </div>
                </form>
                <?php }
                   } ?>
        </fieldset>

    </div>

<!-- 1.2 Student-Conference-details -->

    <div class="container">
        <fieldset class="Conference-Details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Conference Details &nbsp;</span> 
            <?php  
                if($rowc['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        </legend>

            <div id="accordion">
                <?php if($num15==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Conference Details
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter15 = 'D';
                    $count15 =0;
  while($row15 = mysqli_fetch_assoc($result15))
        { 
            $letterAscii15 = ord($letter15);
                  //$letterAscii1++;
                  $count15++;
                  $letter15 = chr($letterAscii15).$count15;
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter15; ?>'>
                                <?php echo $row15['title'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter15;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <!-- backend php  -->
                                    <div class="container">
                                        <label for="student_conference_type"> Conference Type :</label> 
                                        <?php echo $row15['type'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_conference_name">  Conference Name :</label> 
                                        <?php echo $row15['name'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_conference_location">  Conference Location :</label>
                                        <?php echo $row15['location'];?>
                                    </div>

                                       <div class="container">
                                       <input name="Conf_title" type="hidden"
                                            value="<?php echo $row15['title'];?>">
                                        <label for="student_conference_papertitle"> Paper Title :</label> 
                                        <?php echo $row15['title'];?>
                                    </div>

                                       <div class="container">
                                        <label for="student_conference_author1">  Authors :</label> <?php echo $row15['author'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_conference_number"> Proceeding Number :</label> 
                                        <?php echo $row15['number'];?>
                                    </div>

                                       <div class="container">
                                        <label for="student_conference_date">  Date :</label> <?php echo $row15['date'];?>
                                    </div>


                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="student_conference_proof">Conference Documents :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name="student_conference_proof" id="student_conference_proof"
                                                    required><?php $path = $row15['proof_doc']; echo "<a href='$path' >View Conference Document </a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="student_conferenceh" class="form-check-input"
                                                        type="radio" value="hold" name="verified_student_conference"
                                                        <?php  if($row15['proof_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="student_conferencer" type="textbox" placeholder="comments"
                                                    name="student_conference_comment"
                                                    value="<?php echo $row15['proof_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="student_conferencev" class="form-check-input"
                                                        type="radio" name="verified_student_conference"
                                                        value="verified"
                                                        <?php  if($row15['proof_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>

                                        </div>


                              
                                   
                                                    
                                        <div>
                                            <button name="student_conference_save" type="submit" class="btn btn-primary">
                                                Save </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php }
                    } ?>

            </div>
        </fieldset>
    </div>
    
    <!-- 1.3 Student-Copyright-details -->


        <div class="container">
        <fieldset class="Copyright-Details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Copyright Details &nbsp;</span> 
            <?php  
                if($rowa['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 

        </legend>

            <div id="accordion">
                <?php if($num13==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Copyright Details
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter13 = 'B';
                    $count13 =0;
  while($row13 = mysqli_fetch_assoc($result13))
        { 
            $letterAscii13 = ord($letter13);
                  //$letterAscii1++;
                  $count13++;
                  $letter13 = chr($letterAscii13).$count13;
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter13; ?>'>
                                <?php echo $row13['title'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter13;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <!-- backend php  -->
                                    <div class="container">
                                    <input name="copyright_title" type="hidden"
                                            value="<?php echo $row13['title'];?>">
                                        <label for="student_copyright_title"> Copyright Title :</label> <?php echo $row13['title'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_copyright_author">  Copyright Authors :</label> <?php echo $row13['author'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_copyright_regno">  Registaration Number:</label><?php echo $row13['reg_no'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_copyright_date"> Date of Registration:</label> 
                                        <?php echo $row13['date'];?>
                                    </div>

              
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="student_copyrightproof">Copyright Proof :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name="student_copyright" id="student_copyright"
                                                    required><?php $path = $row13['copyright_doc']; echo "<a href='$path' >View Copyright Document</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="student_copyrighth" class="form-check-input"
                                                        type="radio" value="hold" name="verified_student_copyright"
                                                        <?php  if($row13['copyright_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="student_copyrightr" type="textbox" placeholder="comments"
                                                    name="student_copyright_comment"
                                                    value="<?php echo $row13['copyright_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="student_copyrightv" class="form-check-input"
                                                        type="radio" name="verified_student_copyright"
                                                        value="verified"
                                                        <?php  if($row13['copyright_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>

                                        </div>


                              
                                   
                                                    
                                        <div>
                                            <button name="student_copyright_save" type="submit" class="btn btn-primary">
                                                Save </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php }
                    } ?>

            </div>
        </fieldset>
    </div>
    
<!-- 1.4 Student-Bookchapter-details -->


        <div class="container">
        <fieldset class="bookchapter-details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Book Chapter Details &nbsp;</span> 
        
            <?php  
                if($rowb['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?>
        </legend>

            <div id="accordion">
                <?php if($num14==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Book Chapter Details
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter14 = 'C';
                    $count14 =0;
  while($row14 = mysqli_fetch_assoc($result14))
        { 
            $letterAscii14 = ord($letter14);
                  //$letterAscii1++;
                  $count14++;
                  $letter14 = chr($letterAscii14).$count14;
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter14; ?>'>
                                <?php echo $row14['title'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter14;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <!-- backend php  -->
                                    <div class="container">
                                    <input name="book_title" type="hidden"
                                            value="<?php echo $row14['title'];?>">
                                        <label for="student_book_name"> Book Title:</label> <?php echo $row14['title'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_book_chapter">  Book Chapter Name :</label> <?php echo $row14['chapter'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_book_authors">  Authors :</label><?php echo $row14['author'];?>
                                    </div>

                                       <div class="container">
                                        <label for="student_book_publishers"> Publishers :</label> <?php echo $row14['publisher'];?>
                                    </div>

                                       <div class="container">
                                        <label for="student_book_date">  Date :</label> <?php echo $row14['year'];?>
                                    </div>


                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="student-bookchapter">Book Chapter Document :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name="student-bookchapter" id="student-bookchapter"
                                                    required><?php $path = $row14['proof_doc']; echo "<a href='$path' >View Book Chapter Document</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="student-bookchapterh" class="form-check-input"
                                                        type="radio" value="hold" name="verified_student_bookchapter"
                                                        <?php  if($row14['proof_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="student-bookchapterr" type="textbox" placeholder="comments"
                                                    name="student_bookchapter_comment"
                                                    value="<?php echo $row14['proof_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="student-bookchapterv" class="form-check-input"
                                                        type="radio" name="verified_student_bookchapter"
                                                        value="verified"
                                                        <?php  if($row14['proof_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>

                                        </div>


                              
                                   
                                                    
                                        <div>
                                            <button name="student_bookchapter_save" type="submit" class="btn btn-primary">
                                                Save </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php }
                    } ?>

            </div>
        </fieldset>
    </div>
    

    <!-- 1.5 Student-Patent-details -->

     

        <div class="container">
        <fieldset class="Patent-Details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Patent Details &nbsp;</span> 
            <?php  
                if($rowe['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?>
        </legend>

            <div id="accordion">
                <?php if($num17==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Patent Details
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter17 = 'F';
                    $count17 =0;
  while($row17 = mysqli_fetch_assoc($result17))
        { 
            $letterAscii17 = ord($letter17);
                  //$letterAscii1++;
                  $count17++;
                  $letter17 = chr($letterAscii17).$count17;
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter17; ?>'>
                                <?php echo $row17['title'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter17;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <!-- backend php  -->
                                    <div class="container">
                                    <input name="pat_title" type="hidden"
                                            value="<?php echo $row17['title'];?>">
                                        <label for="student-patent-title"> Patent Title :</label> <?php echo $row17['title'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student-patent-authors">  Patent Inventors :</label> <?php echo $row17['inventors'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student-patent-regno"> Application Number:</label><?php echo $row17['number'];?>
                                    </div>

                                       <div class="container">
                                        <label for="student-patent-date"> Date of Filling:</label> <?php echo $row17['date'];?>
                                    </div>

              
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="student_patent">Patent Proof :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name="student_patent" id="student_patent"
                                                    required><?php $path = $row17['proof_doc']; echo "<a href='$path' >View Patent Proof</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="student_patenth" class="form-check-input"
                                                        type="radio" value="hold" name="verified_student_patent"
                                                        <?php  if($row17['proof_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="student_patentr" type="textbox" placeholder="comments"
                                                    name="student_patent_comment"
                                                    value="<?php echo $row17['proof_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="student_patentv" class="form-check-input"
                                                        type="radio" name="verified_student_patent"
                                                        value="verified"
                                                        <?php  if($row17['proof_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>

                                        </div>


                              
                                   
                                                    
                                        <div>
                                            <button name="student_patent_save" type="submit" class="btn btn-primary">
                                                Save </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php }
                    } ?>

            </div>
        </fieldset>
    </div>
    
                              
                                   
                                                    
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php 
                      ?>

            </div>
        </fieldset>
    </div>





    <div class="container">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="doc_verify4.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="doc_verify1.php">1</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify3.php">3</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify4.php">4</a></li>
            <li class="page-item active"><a class="page-link" href="doc_verify5.php">5</a></li>
                <a class="page-link disabled" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/js" href="js/mentor.js?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

    <!--footer-->
    <?php
        include "footer.php";
    ?>

</body>
</html>