<?php

require "connect.php";

  $sdrn1= $_SESSION['username'];
  $student_rollno = $_SESSION['roll'];

    $query = "select * from student_academic_achievements where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result = mysqli_query($conn , $query) or die("query failed");
    $num = mysqli_num_rows($result);

    $query1 = "select * from student_extra_curricular_activities where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result1 = mysqli_query($conn , $query1) or die("query failed");
    $num1 = mysqli_num_rows($result1);

    $query2 = "select * from student_co_curricular_activities where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result2 = mysqli_query($conn , $query2) or die("query failed");
    $num2 = mysqli_num_rows($result2);

    $query3 = "select * from student_academic_achievements where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result3 = mysqli_query($conn , $query3) or die("query failed");
    $num3 = mysqli_num_rows($result3);
    $row3 = mysqli_fetch_assoc($result3);

    $query4 = "select * from student_extra_curricular_activities where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result4 = mysqli_query($conn , $query4) or die("query failed");
    $num4 = mysqli_num_rows($result4);
    $row4 = mysqli_fetch_assoc($result4);

    $query5 = "select * from student_co_curricular_activities where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result5 = mysqli_query($conn , $query5) or die("query failed");
    $num5 = mysqli_num_rows($result5);
    $row5 = mysqli_fetch_assoc($result5);

    $query6 = "select * from committee_details where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result6 = mysqli_query($conn , $query6) or die("query failed");
    $num6 = mysqli_num_rows($result6);

    $query7 = "select * from committee_details where stu_rollno = '$student_rollno' AND app_type ='new'";
    $result7 = mysqli_query($conn , $query7) or die("query failed");
    $num7 = mysqli_num_rows($result7);
    $row7 = mysqli_fetch_assoc($result7);


    if(isset($_POST['academic_save'])){
        $a_event = $_POST['academic_event'];

      mysqli_query($conn,"update student_academic_achievements set app_type= 'old' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'");
      //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");


//$a_event = $_POST['academic_event'];
    // Entries for table

    if( $_POST['verified_academic_won'] == "verified")
    {
      $status1 ="update student_academic_achievements set stu_prize_certi_status= 'verified',stu_prize_certi_comment='' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
      $result1 = mysqli_query($conn , $status1) or die ("query 11 failed");

    }
      elseif($_POST['verified_academic_won'] == "hold"){
      $prize_comment = $_POST['academic_won_comment'];
       $status1 ="update student_academic_achievements set stu_prize_certi_status= 'hold',stu_prize_certi_comment='$prize_comment' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
      $result1 = mysqli_query($conn , $status1) or die ("query 11 failed");

      }
   if( $_POST['verified_academic_part'] == "verified")
    {
      $status2 ="update student_academic_achievements set stu_participation_certi_status= 'verified',stu_participation_certi_comment='' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
      $result2 = mysqli_query($conn , $status2) or die ("query 1 2 failed");

    }
  elseif( $_POST['verified_academic_part'] ==  "hold")
    {
      $part_comment=$_POST['academic_part_comment'];
      $status2 ="update student_academic_achievements set stu_participation_certi_status= 'hold',stu_participation_certi_comment='$part_comment' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
      $result2 = mysqli_query($conn , $status2) or die ("query 1 2 failed");
      }


    $query_academic = "select * from student_academic_achievements where stu_rollno = '$student_rollno' and stu_event_name = '$a_event' ";
    $result_academic = mysqli_query($conn , $query_academic) or die("query failed");
    $row_academic = mysqli_fetch_assoc($result_academic);


      if($row_academic['stu_prize_won'] == 'Yes')
      {
             if($row_academic['stu_participation_certi_status'] == 'verified' && $row_academic['stu_prize_certi_status'] == 'verified')
         {
                  $academic_status ="update student_academic_achievements set verify_status = 'verified' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
                  $academic_result = mysqli_query($conn , $academic_status) or die ("query 1 2 failed");


         }elseif(
                  $row_academic['stu_participation_certi_status'] == 'hold' || $row_academic['stu_prize_certi_status'] == 'hold'){
                  $academic_status ="update student_academic_achievements set verify_status = 'unverified' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
                  $academic_result = mysqli_query($conn , $academic_status) or die ("query 1 2 failed");
         }


      }
      else{
             if($row_academic['stu_participation_certi_status'] == 'verified')
        {
                 $academic_status ="update student_academic_achievements set verify_status = 'verified' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
                 $academic_result = mysqli_query($conn , $academic_status) or die ("query 1 2 failed");
        }elseif(
                $row_academic['stu_participation_certi_status'] == 'hold'){
                $academic_status ="update student_academic_achievements set verify_status = 'unverified' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'";
                $academic_result = mysqli_query($conn , $academic_status) or die ("query 1 2 failed");
        }
      }


    $query_academic_new = "select * from student_academic_achievements where stu_rollno = '$student_rollno' and stu_event_name = '$a_event' ";
    $result_academic_new = mysqli_query($conn , $query_academic_new) or die("query failed");
    $row_academic_new = mysqli_fetch_assoc($result_academic_new);


if($row_academic_new['verify_status'] == 'verified')
{


 $dest="../student_document/student_verified_document";



      $cur1 = $row_academic_new['stu_participation_certi'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_academic_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_academic_achievements set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'") or die ("query 1 failed");
          }

        }
      }
      else{
 $tmp =explode('/',$row_academic_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_academic_achievements set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'") or die ("query 1 failed");


        }

      }

if($row_academic_new['stu_prize_won'] == 'Yes')
{
   $cur2 = $row_academic_new['stu_prize_certi'];

        if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_academic_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_academic_achievements set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'") or die ("query 1 failed");
          }

        }
      }
      else{
 $tmp =explode('/',$row_academic_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_academic_achievements set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'") or die ("query 1 failed");


        }

      }
}

}
else{  //for unverified
    
 $dest1="../student_document/student_unverified_document";
 $cur1 = $row_academic_new['stu_participation_certi'];
 $tmp =explode('/',$row_academic_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_academic_achievements set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'") or die ("query 1 failed");
          }

          if($row_academic_new['stu_prize_won'] == 'Yes')
            {
             $cur2 = $row_academic_new['stu_prize_certi'];
      
          $tmp =explode('/',$row_academic_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_academic_achievements set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$a_event'") or die ("query 1 failed");
          }

            }
      

}
header("location:doc_verify3.php");
    }

if(isset($_POST['Cocurricular_save']))
{
    $c_event = $_POST['Cocurricular_event'];
    mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno' and stu_event_name = '$c_event'");
      //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'")
//$c_event = $_POST['Cocurricular_event'];

   if( $_POST['verified_CoCurricular_won'] == "verified")
    {
      $status3 ="update student_co_curricular_activities set stu_prize_certi_status= 'verified',stu_prize_certi_comment='' where stu_rollno= '$student_rollno' and stu_event_name = '$c_event' ";
      $result3 = mysqli_query($conn , $status3) or die ("query 31 failed");

    }
  else if( $_POST['verified_CoCurricular_won'] == "hold")
    {
      $co_comment=$_POST['CoCurricular_won_comment'];
      $status3 ="update student_co_curricular_activities set stu_prize_certi_status= 'hold',stu_prize_certi_comment='$co_comment' where stu_rollno= '$student_rollno' and stu_event_name = '$c_event' ";
      $result3 = mysqli_query($conn , $status3) or die ("query 31 failed");

    }

     if( $_POST['verified_CoCurricular_part'] == "verified")
    {
      $status4 ="update student_co_curricular_activities set stu_participation_certi_status= 'verified',stu_participation_certi_comment='' where stu_rollno= '$student_rollno' and stu_event_name = '$c_event' ";
      $result4 = mysqli_query($conn , $status4) or die ("query 41 failed");

    }
  else if( $_POST['verified_CoCurricular_part'] == "hold")
    {
      $cop_comment=$_POST['CoCurricular_part_comment'];
      $status4 ="update student_co_curricular_activities set stu_participation_certi_status= 'hold',stu_participation_certi_comment='$cop_comment' where stu_rollno= '$student_rollno' and stu_event_name = '$c_event' ";
      $result4 = mysqli_query($conn , $status4) or die ("query 41 failed");

    }


   $query_cocur = "select * from student_co_curricular_activities where stu_rollno = '$student_rollno' and stu_event_name = '$c_event' ";
    $result_cocur = mysqli_query($conn , $query_cocur) or die("query failed");
    $row_cocur = mysqli_fetch_assoc($result_cocur);


      if($row_cocur['stu_prize_won'] == 'Yes')
      {
             if($row_cocur['stu_participation_certi_status'] == 'verified' && $row_cocur['stu_prize_certi_status'] == 'verified')
         {
       $cocur_status ="update student_co_curricular_activities set verify_status = 'verified' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'";
      $cocur_result = mysqli_query($conn , $cocur_status) or die ("query 1 2 failed");


         }elseif($row_cocur['stu_participation_certi_status'] == 'hold' || $row_cocur['stu_prize_certi_status'] == 'hold'){
          $cocur_status ="update student_co_curricular_activities set verify_status = 'unverified' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'";
          $cocur_result = mysqli_query($conn , $cocur_status) or die ("query 1 2 failed");
         }


      }
      else{
             if($row_cocur['stu_participation_certi_status'] == 'verified')
        {
                 $cocur_status ="update student_co_curricular_activities set verify_status = 'verified' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'";
      $cocur_result = mysqli_query($conn , $cocur_status) or die ("query 1 2 failed");
        }elseif($row_cocur['stu_participation_certi_status'] == 'hold'){
          $cocur_status ="update student_co_curricular_activities set verify_status = 'unverified' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'";
          $cocur_result = mysqli_query($conn , $cocur_status) or die ("query 1 2 failed");
        }
      }

   $query_cocur_new = "select * from student_co_curricular_activities where stu_rollno = '$student_rollno' and stu_event_name = '$c_event' ";
    $result_cocur_new = mysqli_query($conn , $query_cocur_new) or die("query failed");
    $row_cocur_new = mysqli_fetch_assoc($result_cocur_new);


if($row_cocur_new['verify_status'] == 'verified')
{


 $dest="../student_document/student_verified_document";
 




      $cur1 = $row_cocur_new['stu_participation_certi'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_cocur_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_co_curricular_activities set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'") or die ("query 1 failed");
          }

        }
      }
      else{
 $tmp =explode('/',$row_cocur_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_co_curricular_activities set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'") or die ("query 1 failed");


        }

      }

if($row_cocur_new['stu_prize_won'] == 'Yes')
{
   $cur2 = $row_cocur_new['stu_prize_certi'];

        if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_cocur["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_co_curricular_activities set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'") or die ("query 1 failed");
          }

        }
      }
      else{
 $tmp =explode('/',$row_cocur_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_co_curricular_activities set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'") or die ("query 1 failed");


        }

      }
}

}else{ //for verified
    $dest1="../student_document/student_unverified_document";

    $cur1 = $row_cocur_new['stu_participation_certi'];
    $tmp =explode('/',$row_cocur_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_co_curricular_activities set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'") or die ("query 1 failed");


            if($row_cocur_new['stu_prize_won'] == 'Yes'){
                $cur2 = $row_cocur_new['stu_prize_certi'];

          $tmp =explode('/',$row_cocur["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_co_curricular_activities set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$c_event'") or die ("query 1 failed");
          }    
    }

        }

}
header("location:doc_verify3.php");
    }


if(isset($_POST['Extracurricular_save']))
{
   // mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
   $e_event = $_POST['Extracurricular_event'];
    mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno' and stu_event_name = '$e_event'");
//$e_event = $_POST['Extracurricular_event'];

if( $_POST['verified_ExtraCurricular_won'] == "verified")
    {
      $status5 ="update student_extra_curricular_activities set stu_prize_certi_status= 'verified',stu_prize_certi_comment='' where stu_rollno= '$student_rollno' and stu_event_name = '$e_event' ";
      $result5 = mysqli_query($conn , $status5) or die ("query 51 failed");

    }
  elseif( $_POST['verified_ExtraCurricular_won'] == "hold")
    {
      $ext_comment =$_POST['ExtraCurricular_won_comment'];
      $status5 ="update student_extra_curricular_activities set stu_prize_certi_status= 'hold',stu_prize_certi_comment='$ext_comment' where stu_rollno= '$student_rollno' and stu_event_name = '$e_event' ";
      $result5 = mysqli_query($conn , $status5) or die ("query 51 failed");

    }


    if( $_POST['verified_ExtraCurricular_part'] == "verified")
    {
      $status6 ="update student_extra_curricular_activities set stu_participation_certi_status= 'verified',stu_participation_certi_comment='' where stu_rollno= '$student_rollno' and stu_event_name = '$e_event' ";
      $result6 = mysqli_query($conn , $status6) or die ("query 61 failed");

    }
elseif( $_POST['verified_ExtraCurricular_part'] == "hold")
    {
      $extp_comment =$_POST['ExtraCurricular_part_comment'];
      $status6 ="update student_extra_curricular_activities set stu_participation_certi_status= 'hold',stu_participation_certi_comment='$extp_comment' where stu_rollno= '$student_rollno' and stu_event_name = '$e_event' ";
      $result6 = mysqli_query($conn , $status6) or die ("query 61 failed");

    }


   $query_extracur = "select * from student_extra_curricular_activities where stu_rollno = '$student_rollno' and stu_event_name = '$e_event' ";
    $result_extracur = mysqli_query($conn , $query_extracur) or die("query failed");
    $row_extracur = mysqli_fetch_assoc($result_extracur);


      if($row_extracur['stu_prize_won'] == 'Yes')
      {
             if($row_extracur['stu_participation_certi_status'] == 'verified' && $row_extracur['stu_prize_certi_status'] == 'verified')
         {
       $extracur_status ="update student_extra_curricular_activities set verify_status = 'verified' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'";
      $extracur_result = mysqli_query($conn , $extracur_status) or die ("query 1 2 failed");


         }elseif($row_extracur['stu_participation_certi_status'] == 'hold' || $row_extracur['stu_prize_certi_status'] == 'hold'){
          $extracur_status ="update student_extra_curricular_activities set verify_status = 'unverified' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'";
          $extracur_result = mysqli_query($conn , $extracur_status) or die ("query 1 2 failed");
         }


      }
      else{
             if($row_extracur['stu_participation_certi_status'] == 'verified')
        {
                 $extracur_status ="update student_extra_curricular_activities set verify_status = 'verified' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'";
      $extracur_result = mysqli_query($conn , $extracur_status) or die ("query 1 2 failed");
        }elseif($row_extracur['stu_participation_certi_status'] == 'hold'){
          $extracur_status ="update student_extra_curricular_activities set verify_status = 'unverified' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'";
      $extracur_result = mysqli_query($conn , $extracur_status) or die ("query 1 2 failed");
        }
      }


     $query_extracur_new = "select * from student_extra_curricular_activities where stu_rollno = '$student_rollno' and stu_event_name = '$e_event' ";
    $result_extracur_new = mysqli_query($conn , $query_extracur_new) or die("query failed");
    $row_extracur_new = mysqli_fetch_assoc($result_extracur_new);



if($row_extracur_new['verify_status'] == 'verified')
{


 $dest="../student_document/student_verified_document";




      $cur1 = $row_extracur_new['stu_participation_certi'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_extracur_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_extra_curricular_activities set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'") or die ("query 1 failed");
          }

        }
      }
      else{
 $tmp =explode('/',$row_extracur_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_extra_curricular_activities set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'") or die ("query 1 failed");


        }

      }

if($row_extracur_new['stu_prize_won'] == 'Yes')
{
   $cur2 = $row_extracur_new['stu_prize_certi'];

        if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_extracur_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_extra_curricular_activities set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'") or die ("query 1 failed");
          }

        }
      }
      else{
 $tmp =explode('/',$row_extracur_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_extra_curricular_activities set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'") or die ("query 1 failed");


        }

      }
}

}
else{ //for unverified
    $dest1="../student_document/student_unverified_document";
    $cur1 = $row_extracur_new['stu_participation_certi'];

          $tmp =explode('/',$row_extracur_new["stu_participation_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update student_extra_curricular_activities set stu_participation_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'") or die ("query 1 failed");
          }

          
if($row_extracur_new['stu_prize_won'] == 'Yes')
{
   $cur2 = $row_extracur_new['stu_prize_certi'];
        
          $tmp =explode('/',$row_extracur_new["stu_prize_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur2,$updated_dest);
            unlink($cur2);
            mysqli_query($conn ,"update student_extra_curricular_activities set stu_prize_certi = '$updated_dest' where stu_rollno= '$student_rollno' and stu_event_name='$e_event'") or die ("query 1 failed");
          }

        
      

        }
    }
header("location:doc_verify3.php");
    }

    // ------------------------------------------------Committee Details---------------------------------------------

    if(isset($_POST['student_com_save'])){
        $title = $_POST['com_role'];
        $ac= explode("-",$title);
$stu_role = $ac[1];
$comm_name = $ac[0];
    
      mysqli_query($conn,"update committee_details set app_type= 'old' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'"); 
      //mysqli_query($conn,"update student_co_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_extra_curricular_activities set app_type= 'old' where stu_rollno= '$student_rollno'");
    
    
    //$a_event = $_POST['committee_event'];
    // Entries for table
    
    if( $_POST['verified_student_com'] == "verified")
    {
      $status1 ="update committee_details set proof_status= 'verified', proof_comment='' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'";
      $result1 = mysqli_query($conn , $status1) or die ("query 11 failed");
    
    }
      elseif($_POST['verified_student_com'] == "hold"){
      $com_comment = $_POST['student_com_comment'];
       $status1 ="update committee_details set proof_status= 'hold',proof_comment='$com_comment' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'";
      $result1 = mysqli_query($conn , $status1) or die ("query 11 failed");
    
      }
    
    
    $query_committee = "select * from committee_details where stu_rollno = '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'";
    $result_committee = mysqli_query($conn , $query_committee) or die("query failed");
    $row_committee = mysqli_fetch_assoc($result_committee);
    
    if($row_committee['proof_status'] == 'verified')
         {
                  $committee_status ="update committee_details set verify_status = 'verified' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'";
                  $committee_result = mysqli_query($conn , $committee_status) or die ("query 1 2 failed");
    
    
         }elseif($row_committee['proof_status'] == 'hold'){
                  $committee_status ="update committee_details set verify_status = 'unverified' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'";
                  $committee_result = mysqli_query($conn , $committee_status) or die ("query 1 2 failed");
         }
    
    $query_committee_new = "select * from committee_details where stu_rollno = '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name' ";
    $result_committee_new = mysqli_query($conn , $query_committee_new) or die("query failed");
    $row_committee_new = mysqli_fetch_assoc($result_committee_new);
    
    
    if($row_committee_new['verify_status'] == 'verified')
    {
    
    
    $dest="../student_document/student_verified_document";
    
    
    
      $cur1 = $row_committee_new['proof_doc'];
    
      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row_committee_new["proof_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update committee_details set proof_doc = '$updated_dest' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name'") or die ("query 1 failed");
          }
    
        }
      }
      else{
    $tmp =explode('/',$row_committee_new["proof_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update committee_details set proof_doc = '$updated_dest' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name' ") or die ("query 1 failed");
    
    
        }
    
      }
    
    }
    else{  //for unverified
    
    $dest1="../student_document/student_unverified_document";
    $cur1 = $row_committee_new['proof_doc'];
    $tmp =explode('/',$row_committee_new["proof_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur1,$updated_dest);
            unlink($cur1);
            mysqli_query($conn ,"update committee_details set proof_doc = '$updated_dest' where stu_rollno= '$student_rollno' and student_role = '$stu_role' and committee_name='$comm_name' ") or die ("query 1 failed");
          }
    
    }
    header("location:doc_verify3.php");
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

    <!-- 1.1 personal-details -->

    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="studentdetailsM.php">Student Details</a></li>
            <li class="breadcrumb-item active">Document Verification 3 &nbsp; <?php echo"<b>($student_rollno)</b>" ?></li>
        </ul>
        <fieldset class="Academic-Achievements-verified">
            <legend><span class="legend-saveddesign">&nbsp; Academic Achievements &nbsp;</span> 
            <?php  
                if($row3['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        </legend>


            <div id="accordion">
                <?php if($num==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Academic Achievements
                        </a>
                    </div>
                </div>
                <?php } else{
                     $letter = 'A';
                     $count = 0;
  while($row = mysqli_fetch_assoc($result))
        { 
            $letterAscii = ord($letter);
                  //$letterAscii++;
                  $count++;
                  $letter = chr($letterAscii).$count;
                
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter; ?>'>
                                <?php echo $row['stu_event_name'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <div class="container">
                                        <input name="academic_event" type="hidden"
                                            value="<?php echo $row['stu_event_name'];?>">
                                        <label for="eventname">Event Name:</label> <?php echo $row['stu_event_name'];?>
                                    </div>

                                    <div class="container">
                                        <label for="level"> Level :</label> <?php echo $row['stu_level'];?>
                                    </div>

                                    <div class="container">
                                        <label for="event-type"> Presentation Type :</label>
                                        <?php echo $row['stu_event_type'];?>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="prize"> Prize Won :</label>
                                                <?php echo $row['stu_prize_won'];?>
                                            </div>
                                            <div class="col-sm">
                                                <?php  if($row['stu_prize_won']=='Yes'){ ?> <button type="button"
                                                    class="viewbtn" name="e_event_prize_won" id="prize" required><?php  $path = $row['stu_prize_certi'];
               echo "<a href='$path' >View Prize certi</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="academicprizeh" class="form-check-input" type="radio"
                                                        value="hold" name="verified_academic_won" <?php
         if($row['stu_prize_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="academicprizer" type="textbox" placeholder="comments"
                                                    name="academic_won_comment"
                                                    value="<?php echo $row['stu_prize_certi_comment'];?>">
                                            </div>
                                            <label for="verifyckbox">
                                                <input id="academicprizev" class="form-check-input" type="radio"
                                                    name="verified_academic_won" value="verified" <?php
         if($row['stu_prize_certi_status'] == "verified") echo "checked"; ?>>Verify <?php } ?>
                                            </label>

                                        </div>


                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="Certificate of Participation">Certificate of Participation
                                                    :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name=" e_participation_certificate" id="Participation" required>
                                                    <?php $path = $row['stu_participation_certi']; echo "<a href='$path' >View Participation certi</a>"; ?></button>
                                            </div>

                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="academiccoph" class="form-check-input" type="radio"
                                                        value="hold" name="verified_academic_part"
                                                        <?php   if($row['stu_participation_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="academiccopr" type="textbox" placeholder="comments"
                                                    name="academic_part_comment"
                                                    value="<?php echo $row['stu_participation_certi_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="academiccopv" class="form-check-input" type="radio"
                                                        name="verified_academic_part" value="verified"
                                                        <?php   if($row['stu_participation_certi_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <button name="academic_save" type="submit" class="btn btn-primary"> Save
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


    <div class="container">
        <fieldset class="Extra-curricular-verified">
            <legend><span class="legend-saveddesign">&nbsp; Extra-curricular Achievements &nbsp;</span>
            <?php  
                if($row4['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        
        </legend>

            <div id="accordion">
                <?php if($num1==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Extra-Curricular Achievements
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter1 = 'B';
                    $count1 =0;
  while($row1 = mysqli_fetch_assoc($result1))
        { 
            $letterAscii1 = ord($letter1);
                  //$letterAscii1++;
                  $count1++;
                  $letter1 = chr($letterAscii1).$count1;
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter1; ?>'>
                                <?php echo $row1['stu_event_name'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter1;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <!-- backend php  -->
                                    <div class="container">
                                        <input name="Extracurricular_event" type="hidden"
                                            value="<?php echo $row1['stu_event_name'];?>">
                                        <label for="eventname">Event Name:</label> <?php echo $row1['stu_event_name'];?>
                                    </div>

                                    <div class="container">
                                        <label for="level"> Level :</label> <?php echo $row1['stu_level'];?>
                                    </div>

                                    <div class="container">
                                        <label for="event-type"> Event Type :</label>
                                        <?php echo $row1['stu_event_type'];?>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="prize"> Prize Won :</label>
                                                <?php echo $row1['stu_prize_won'];?>
                                            </div>
                                            <div class="col-sm">
                                                <?php  if($row1['stu_prize_won']=='Yes'){ ?>
                                                <button type="button" class="viewbtn " name=" e_event_prize_won"
                                                    id="prize" required><?php  $path = $row1['stu_prize_certi'];
               echo "<a href='$path' >View Prize certi</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="extracurricularh" class="form-check-input" type="radio"
                                                        value="hold" name="verified_ExtraCurricular_won"
                                                        <?php   if($row1['stu_prize_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="extracurricularr" type="textbox" placeholder="comments"
                                                    name="ExtraCurricular_won_comment"
                                                    value="<?php echo $row1['stu_prize_certi_comment'];?>">
                                            </div>
                                            <label for="verifyckbox">
                                                <input id="extracurricularv" class="form-check-input" type="radio"
                                                    name="verified_ExtraCurricular_won" value="verified"
                                                    <?php   if($row1['stu_prize_certi_status'] == "verified") echo "checked"; ?>>Verify
                                            </label><?php } ?>

                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="Certificate of Participation">Certificate of Participation
                                                    :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name=" e_participation_certificate" id="Participation"
                                                    required><?php $path = $row1['stu_participation_certi']; echo "<a href='$path' >View Participation certi</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="extracurricularcoph" class="form-check-input"
                                                        type="radio" value="hold" name="verified_ExtraCurricular_part"
                                                        <?php  if($row1['stu_participation_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="extracurricularcopr" type="textbox" placeholder="comments"
                                                    name="ExtraCurricular_part_comment"
                                                    value="<?php echo $row1['stu_participation_certi_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="extracurricularcopv" class="form-check-input"
                                                        type="radio" name="verified_ExtraCurricular_part"
                                                        value="verified"
                                                        <?php  if($row1['stu_participation_certi_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>

                                        </div>
                                        <div>
                                            <button name="Extracurricular_save" type="submit" class="btn btn-primary">
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


    <div class="container">
        <fieldset class="Co-curricular-verified">
            <legend><span class="legend-saveddesign">&nbsp; Co-curricular Achievements &nbsp;</span> 
            <?php  
                if($row5['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 
        </legend>


            <div id="accordion">
                <?php if($num2==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Co-curricular Achievements
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter2 = 'C';
                    $count2 =0;
  while($row2 = mysqli_fetch_assoc($result2))
        { 
            $letterAscii2 = ord($letter2);
                  //$letterAscii2++;
                  $count2++;
                  $letter2 = chr($letterAscii2).$count2;
                 
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter2; ?>'>

                                <?php echo $row2['stu_event_name'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter2;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <div class="container">
                                        <input name="Cocurricular_event" type="hidden"
                                            value="<?php echo $row2['stu_event_name'];?>">
                                        <label for="eventname">Event Name:</label>
                                        <?php echo $row2['stu_event_name'];?>
                                    </div>

                                    <div class="container">
                                        <label for="level"> Level :</label> <?php echo $row2['stu_level'];?>
                                    </div>

                                    <div class="container">
                                        <label for="event-type"> Event Type :</label>
                                        <?php echo $row2['stu_event_type'];?>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="prize"> Prize Won :</label>
                                                <?php echo $row2['stu_prize_won'];?>
                                            </div>
                                            <div class="col-sm">
                                                <?php if($row2['stu_prize_won']=='Yes'){ ?>
                                                <button type="button" class="viewbtn " name=" e_event_prize_won"
                                                    id="prize" required><?php  $path = $row2['stu_prize_certi'];
               echo "<a href='$path' >View Prize certi</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="cocurricularh" class="form-check-input" type="radio"
                                                        value="hold" name="verified_CoCurricular_won"
                                                        <?php   if($row2['stu_prize_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="cocurricularr" type="textbox" placeholder="comments"
                                                    name="CoCurricular_won_comment"
                                                    value="<?php echo $row2['stu_prize_certi_comment'];?>">
                                            </div>
                                            <label for="verifyckbox">
                                                <input id="cocurricularv" class="form-check-input" type="radio"
                                                    name="verified_CoCurricular_won" value="verified"
                                                    <?php   if($row2['stu_prize_certi_status'] == "verified") echo "checked"; ?>>Verify
                                            </label><?php } ?>


                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="Certificate of Participation">Certificate of Participation
                                                    :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn"
                                                    name=" e_participation_certificate" id="Participation"
                                                    required><?php $path = $row2['stu_participation_certi']; echo "<a href='$path' >View Participation certi</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="cocurricularcoph" class="form-check-input" type="radio"
                                                        value="hold" name="verified_CoCurricular_part"
                                                        <?php   if($row2['stu_participation_certi_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="cocurricularcopr" type="textbox" placeholder="comments"
                                                    name="CoCurricular_part_comment"
                                                    value="<?php echo $row2['stu_participation_certi_comment'];?>">
                                            </div>
                                            <label for="verifyckbox">
                                                <input id="cocurricularcopv" class="form-check-input" type="radio"
                                                    name="verified_CoCurricular_part" value="verified"
                                                    <?php   if($row2['stu_participation_certi_status'] == "verified") echo "checked"; ?>>Verify
                                            </label>
                                        </div>
                                    </div>
                                    <button name="Cocurricular_save" type="submit" class="btn btn-primary"> Save
                                    </button>

                            </div>
                        </div>
                    </div>
                </form>
                <?php }
                    } ?>

            </div>


        </fieldset>

    </div>

     <!-- 1.3 Student-Committee-details -->


     <div class="container">
        <fieldset class="Committee-Details-verified">
            <legend><span class="legend-saveddesign">&nbsp; Committee Details &nbsp;</span> 
            <?php  
                if($row7['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> 

        </legend>

            <div id="accordion">
                <?php if($num6==0){ ?>
                <div class="card">
                    <div class="card-header">
                        <a class="card-link">
                            No Committee Roles
                        </a>
                    </div>
                </div>
                <?php } else{
                    $letter3 = 'D';
                    $count3 =0;
  while($row6 = mysqli_fetch_assoc($result6))
        { 
            $letterAscii3 = ord($letter3);
                  //$letterAscii1++;
                  $count3++;
                  $letter3 = chr($letterAscii3).$count3;
            ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href='<?php echo "#".$letter3; ?>'>
                                <?php echo $row6['committee_name']."-".$row6['student_role'];?>
                            </a>
                        </div>
                        <div id="<?php echo $letter3;?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="#">
                                    <!-- backend php  -->
                                    <div class="container">
                                    <input name="com_role" type="hidden"
                                            value="<?php echo $row6['committee_name']."-".$row6['student_role'];?>">
                                        <label for="student_com_role"> Student Role :</label> <?php echo $row6['student_role'];?>
                                    </div>

                                    <div class="container">
                                        <label for="student_com_name">  Committee Name :</label> <?php echo $row6['committee_name'];?>
                                    </div>

                                    <div class="container">
                                        <label for="sdate">  Start Date :</label><?php echo $row6['s_date'];?>
                                    </div>

                                    <div class="container">
                                        <label for="edate"> End Date :</label> 
                                        <?php echo $row6['e_date'];?>
                                    </div>

              
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg">
                                                <label for="com_proof">Committee Document :</label>
                                            </div>
                                            <div class="col-sm">
                                                <button type="button" class="viewbtn "
                                                    name="student_com" id="student_com"
                                                    required><?php $path = $row6['proof_doc']; echo "<a href='$path' >View Committee Document</a>"; ?></button>
                                            </div>
                                            <div class="col-sm">
                                                <label for="holdckbox">
                                                    <input id="student_comh" class="form-check-input"
                                                        type="radio" value="hold" name="verified_student_com"
                                                        <?php  if($row6['proof_status'] == "hold") echo "checked"; ?>>Hold
                                                </label>
                                                <input id="student_comr" type="textbox" placeholder="comments"
                                                    name="student_com_comment"
                                                    value="<?php echo $row6['proof_comment'];?>">
                                            </div>
                                            <div>
                                                <label for="verifyckbox">
                                                    <input id="student_comv" class="form-check-input"
                                                        type="radio" name="verified_student_com"
                                                        value="verified"
                                                        <?php  if($row6['proof_status'] == "verified") echo "checked"; ?>>Verify
                                                </label>
                                            </div>

                                        </div>


                              
                                   
                                                    
                                        <div>
                                            <button name="student_com_save" type="submit" class="btn btn-primary">
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



    <div class="container">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="doc_verify2.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="doc_verify1.php">1</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify2.php">2</a></li>
            <li class="page-item active"><a class="page-link" href="doc_verify3.php">3</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify4.php">4</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify5.php">5</a></li>
            <li class="page-item">
                <a class="page-link" href="doc_verify4.php" aria-label="Next">
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