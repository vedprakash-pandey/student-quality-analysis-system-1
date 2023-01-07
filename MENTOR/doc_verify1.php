<?php

require "connect.php";

$temp = $_GET['roll'];
if($temp=='')
{
}
else{
  $_SESSION['roll']= $temp;
}



  $sdrn1= $_SESSION['username'];

  $student_rollno = $_SESSION['roll'];

    $conn = mysqli_connect('localhost', 'root','', 'mini') or die("Connection Failed");
    $query = "select * from student_personal_details where stu_rollno = '$student_rollno'";
    $result = mysqli_query($conn , $query) or die("query failed");
    $row = mysqli_fetch_assoc($result);

    $query1 = "select * from student_category_details where stu_rollno = '$student_rollno'";
    $result1 = mysqli_query($conn , $query1) or die("query failed");
    $row1 = mysqli_fetch_assoc($result1);

    $query2 = "select * from student_address_details where stu_rollno = '$student_rollno'";
    $result2 = mysqli_query($conn , $query2) or die("query failed");
    $row2 = mysqli_fetch_assoc($result2);

    $query3 = "select * from student_contact_details where stu_rollno = '$student_rollno'";
    $result3 = mysqli_query($conn , $query3) or die("query failed");
    $row3 = mysqli_fetch_assoc($result3);

    $query4 = "select * from student_schlorship_details where stu_rollno = '$student_rollno'";
    $result4 = mysqli_query($conn , $query4) or die("query failed");
    $row4 = mysqli_fetch_assoc($result4);

    $query5 = "select * from student_previous_academic where stu_rollno = '$student_rollno'";
    $result5 = mysqli_query($conn , $query5) or die("query failed");
    $row5 = mysqli_fetch_assoc($result5);

    $query6 = "select * from student_progress_details where stu_rollno = '$student_rollno'";
    $result6 = mysqli_query($conn , $query6) or die("query failed");
?>
<?php


    // ************************** Verification Process ***************************


    if(isset($_POST['save'])){

      //mysqli_query($conn,"update student_personal_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_address_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_category_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_schlorship_details set app_type= 'old' where stu_rollno= '$student_rollno'");


    if($_POST['verified_photo'] == 'verified')
    {
      $com1 ="update student_personal_details set photo_comment= '' where stu_rollno= '$student_rollno' ";
      $com_a = mysqli_query($conn , $com1) or die ("query 1 failed");

      if($_POST['verified_dob'] == 'verified')
      {
        $com1 ="update student_personal_details set dob_comment= '' where stu_rollno= '$student_rollno' ";
        $com_a = mysqli_query($conn , $com1) or die ("query 1 failed");

        if($_POST['verified_PanCard'] == 'verified')
        {
          $com1 ="update student_personal_details set stupan_comment= '' where stu_rollno= '$student_rollno' ";
          $com_a = mysqli_query($conn , $com1) or die ("query 1 failed");

          if($_POST['verified_Aadhar'] == 'verified')
          {
            $com1 ="update student_personal_details set stuadhar_comment= '' where stu_rollno= '$student_rollno' ";
           $com_a = mysqli_query($conn , $com1) or die ("query 1 failed");

            if($_POST['verified_passport'] == 'verified')
            {
              $com1 ="update student_personal_details set stupass_comment= '' where stu_rollno= '$student_rollno' ";
              $com_a = mysqli_query($conn , $com1) or die ("query 1 failed");

              if($_POST['verified_parent_pan'] == 'verified')
              {

                $com1 ="update student_personal_details set parentpan_comment= '' where stu_rollno= '$student_rollno' ";
                $com_a = mysqli_query($conn , $com1) or die ("query 1 failed");

                $status ="update student_personal_details set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
                $resulta = mysqli_query($conn , $status) or die ("query 1 failed");
                
      mysqli_query($conn,"update student_personal_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_address_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_category_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_schlorship_details set app_type= 'old' where stu_rollno= '$student_rollno'");

//parent_pan-----------------------------------------
              }elseif($_POST['verified_parent_pan'] == 'unverified' || $_POST['verified_parent_pan'] == 'hold'){
                $status ="update student_personal_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
                $resulta = mysqli_query($conn , $status) or die ("query 1 failed");

              }
// stu_pass----------------------------------------
            }elseif($_POST['verified_passport'] == 'unverified' || $_POST['verified_passport'] == 'hold'){
              $status ="update student_personal_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
              $resulta = mysqli_query($conn , $status) or die ("query 1 failed");

            }
// stu_aadhar--------------------------------
          }elseif($_POST['verified_Aadhar'] == 'unverified' || $_POST['verified_Aadhar'] == 'hold'){
            $status ="update student_personal_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
            $resulta = mysqli_query($conn , $status) or die ("query 1 failed");

          }
// stu_pan----------------------
        }elseif($_POST['verified_PanCard'] == 'unverified' || $_POST['verified_PanCard'] == 'hold'){
          $status ="update student_personal_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
          $resulta = mysqli_query($conn , $status) or die ("query 1 failed");

        }
// dob--------------------------
      }elseif($_POST['verified_dob'] == 'unverified' || $_POST['verified_dob'] == 'hold'){
        $status ="update student_personal_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
        $resulta = mysqli_query($conn , $status) or die ("query 1 failed");

      }
 // photo---------------------------------
    }elseif($_POST['verified_photo'] == 'unverified' || $_POST['verified_photo'] == 'hold'){
      $status ="update student_personal_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
      $resulta = mysqli_query($conn , $status) or die ("query 1 failed");

    }

// category status----------------------------------------------------------------------------------------------------
if($_POST['verified_Caste'] == 'verified')
{
  $com2 ="update student_category_details set caste_comment= '' where stu_rollno= '$student_rollno' ";
  $com_b = mysqli_query($conn , $com2) or die ("query 1 failed");

  $status2 ="update student_category_details set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
  $resultb = mysqli_query($conn , $status2) or die ("query 1 failed");

  
  //mysqli_query($conn,"update student_personal_details set app_type= 'old' where stu_rollno= '$student_rollno'");
 // mysqli_query($conn,"update student_address_details set app_type= 'old' where stu_rollno= '$student_rollno'");
  mysqli_query($conn,"update student_category_details set app_type= 'old' where stu_rollno= '$student_rollno'");
  //mysqli_query($conn,"update student_schlorship_details set app_type= 'old' where stu_rollno= '$student_rollno'");
// caste_certi-----------------------------
}elseif($_POST['verified_Caste'] == 'unverified' || $_POST['verified_Caste'] == 'hold'){
  $status2 ="update student_category_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
  $resultb = mysqli_query($conn , $status2) or die ("query 1 failed");
}

//address status----------------------------------------------------------------------------------------------------------
if($_POST['verified_PerAdd'] == 'verified')
  {
    $com3 ="update student_address_details set permanent_comment= '' where stu_rollno= '$student_rollno' ";
    $com_c = mysqli_query($conn , $com3) or die ("query 1 failed");

    if($_POST['verified_Domicile'] == 'verified')
    {
      $com3 ="update student_address_details set domicile_comment= '' where stu_rollno= '$student_rollno' ";
      $com_c = mysqli_query($conn , $com3) or die ("query 1 failed");

      if($_POST['verified_PreAdd'] == 'verified')
      {
        $com3 ="update student_address_details set present_comment= '' where stu_rollno= '$student_rollno' ";
        $com_c = mysqli_query($conn , $com3) or die ("query 1 failed");

        $status3 ="update student_address_details set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
        $resultc = mysqli_query($conn , $status3) or die ("query 1 failed");

        $status4 ="update student_contact_details set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
        $resultd = mysqli_query($conn , $status4) or die ("query 1 failed");

        
     // mysqli_query($conn,"update student_personal_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      mysqli_query($conn,"update student_address_details set app_type= 'old' where stu_rollno= '$student_rollno'");
     // mysqli_query($conn,"update student_category_details set app_type= 'old' where stu_rollno= '$student_rollno'");
     // mysqli_query($conn,"update student_schlorship_details set app_type= 'old' where stu_rollno= '$student_rollno'");


//Pre_Add------------------------------------------------
      }elseif($_POST['verified_PreAdd'] == 'unverified' || $_POST['verified_PreAdd'] == 'hold'){
        $status3 ="update student_address_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
        $resultc = mysqli_query($conn , $status3) or die ("query 1 failed");
      }
// domicile------------------------------------------
    }elseif($_POST['verified_Domicile'] == 'unverified' || $_POST['verified_Domicile'] == 'hold'){
      $status3 ="update student_address_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
      $resultc = mysqli_query($conn , $status3) or die ("query 1 failed");
    }
// Per_Add----------------------------------------
  }elseif($_POST['verified_PerAdd'] == 'unverified' || $_POST['verified_PerAdd'] == 'hold'){
    $status3 ="update student_address_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
    $resultc = mysqli_query($conn , $status3) or die ("query 1 failed");
  }

  //schlrship status-----------------------------------------------------------------------------------------------
  if($_POST['verified_AgencyName'] == 'verified')
        {
          $com4 ="update student_schlorship_details set letter_comment= '' where stu_rollno= '$student_rollno' ";
          $com_d = mysqli_query($conn , $com4) or die ("query 1 failed");

          if($_POST['verified_schlrAmount'] == 'verified')
          {

            $com4 ="update student_schlorship_details set passbook_comment= '' where stu_rollno= '$student_rollno' ";
            $com_d = mysqli_query($conn , $com4) or die ("query 1 failed");


                    $status5 ="update student_schlorship_details set verify_status= 'verified' where stu_rollno= '$student_rollno' ";
                    $resulte = mysqli_query($conn , $status5) or die ("query 1 failed");

                    
     // mysqli_query($conn,"update student_personal_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_address_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      //mysqli_query($conn,"update student_category_details set app_type= 'old' where stu_rollno= '$student_rollno'");
      mysqli_query($conn,"update student_schlorship_details set app_type= 'old' where stu_rollno= '$student_rollno'");

// schlr_amount-----------------------------------------------
          }elseif($_POST['verified_schlrAmount'] == 'unverified' || $_POST['verified_schlrAmount'] == 'hold'){
            $status5 ="update student_schlorship_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
            $resulte = mysqli_query($conn , $status5) or die ("query 1 failed");
          }
// Agency_name------------------------------------------------
        }elseif($_POST['verified_AgencyName'] == 'unverified' || $_POST['verified_AgencyName'] == 'hold'){
          $status5 ="update student_schlorship_details set verify_status= 'unverified' where stu_rollno= '$student_rollno' ";
          $resulte = mysqli_query($conn , $status5) or die ("query 1 failed");
        }

    // Entries for table

    //if(!empty($_POST['verified_photo']))
    if($_POST['verified_photo'] == 'verified')
    {
      $photo_status ="update student_personal_details set photo_status= 'verified' where stu_rollno= '$student_rollno' ";
      $photo_result = mysqli_query($conn , $photo_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_photo'] == 'hold'){
      $photo_c = $_POST['photocomment'];
      $photo_comment ="update student_personal_details set photo_comment= '$photo_c', photo_status= 'hold' where stu_rollno= '$student_rollno' ";
      $photo_cexe = mysqli_query($conn , $photo_comment) or die ("query 1 failed");

    }
//----------------------------------------------------------------
    if($_POST['verified_dob'] == 'verified')
    {
      $dob_status ="update student_personal_details set dob_status= 'verified' where stu_rollno= '$student_rollno' ";
      $dob_result = mysqli_query($conn , $dob_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_dob'] == 'hold'){
      $dob_c = $_POST['dobcomment'];
      $dob_comment ="update student_personal_details set dob_comment= '$dob_c', dob_status= 'hold' where stu_rollno= '$student_rollno' ";
      $dob_cexe = mysqli_query($conn , $dob_comment) or die ("query 1 failed");

    }
//----------------------------------------------------------------------
    if($_POST['verified_PanCard'] == 'verified')
    {
      $stupan_status ="update student_personal_details set stupan_status= 'verified' where stu_rollno= '$student_rollno' ";
      $stupan_result = mysqli_query($conn , $stupan_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_PanCard'] == 'hold'){
      $stupan_c = $_POST['pancomment'];
      $stupan_comment ="update student_personal_details set stupan_comment= '$stupan_c', stupan_status= 'hold' where stu_rollno= '$student_rollno' ";
      $stupan_cexe = mysqli_query($conn , $stupan_comment) or die ("query 1 failed");

    }
//--------------------------------------------------------------------------

    if($_POST['verified_Aadhar'] == 'verified')
    {
      $stuadhar_status ="update student_personal_details set stuadhar_status= 'verified' where stu_rollno= '$student_rollno' ";
      $stuadhar_result = mysqli_query($conn , $stuadhar_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_Aadhar'] == 'hold'){
      $stuadhar_c = $_POST['aadharcomment'];
      $stuadhar_comment ="update student_personal_details set stuadhar_comment= '$stuadhar_c', stuadhar_status= 'hold' where stu_rollno= '$student_rollno' ";
      $stuadhar_cexe = mysqli_query($conn , $stuadhar_comment) or die ("query 1 failed");

    }
//----------------------------------------------------------------------------------------

    if($_POST['verified_passport'] == 'verified')
    {
      $stupass_status ="update student_personal_details set stupass_status= 'verified' where stu_rollno= '$student_rollno' ";
      $stupass_result = mysqli_query($conn , $stupass_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_passport'] == 'hold'){
      $stupass_c = $_POST['passportcomment'];
      $stupass_comment ="update student_personal_details set stupass_comment= '$stupass_c', stupass_status= 'hold' where stu_rollno= '$student_rollno' ";
      $stupass_cexe = mysqli_query($conn , $stupass_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_parent_pan'] == 'verified')
    {
      $parentpan_status ="update student_personal_details set parentpan_status= 'verified' where stu_rollno= '$student_rollno' ";
      $parentpan_result = mysqli_query($conn , $parentpan_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_parent_pan'] == 'hold'){
      $parentpan_c = $_POST['parentpancomment'];
      $parentpan_comment ="update student_personal_details set parentpan_comment= '$parentpan_c', parentpan_status= 'hold' where stu_rollno= '$student_rollno' ";
      $parentpan_cexe = mysqli_query($conn , $parentpan_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_Caste'] == 'verified')
    {
      $caste_status ="update student_category_details set caste_status= 'verified' where stu_rollno= '$student_rollno' ";
      $caste_result = mysqli_query($conn , $caste_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_Caste'] == 'hold'){
      $caste_c = $_POST['castecomment'];
      $caste_comment ="update student_category_details set caste_comment= '$caste_c', caste_status= 'hold' where stu_rollno= '$student_rollno' ";
      $caste_cexe = mysqli_query($conn , $caste_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_PerAdd'] == 'verified')
    {
      $permanent_status ="update student_address_details set permanent_status= 'verified' where stu_rollno= '$student_rollno' ";
      $permanent_result = mysqli_query($conn , $permanent_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_PerAdd'] == 'hold'){
      $permanent_c = $_POST['PerAddcomment'];
      $permanent_comment ="update student_address_details set permanent_comment= '$permanent_c', permanent_status= 'hold' where stu_rollno= '$student_rollno' ";
      $permanent_cexe = mysqli_query($conn , $permanent_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_Domicile'] == 'verified')
    {
      $domicile_status ="update student_address_details set domicile_status= 'verified' where stu_rollno= '$student_rollno' ";
      $domicile_result = mysqli_query($conn , $domicile_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_Domicile'] == 'hold'){
      $domicile_c = $_POST['domicilecomment'];
      $domicile_comment ="update student_address_details set domicile_comment= '$domicile_c', domicile_status= 'hold' where stu_rollno= '$student_rollno' ";
      $domicile_cexe = mysqli_query($conn , $domicile_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_PreAdd'] == 'verified')
    {
      $present_status ="update student_address_details set present_status= 'verified' where stu_rollno= '$student_rollno' ";
      $present_result = mysqli_query($conn , $present_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_PreAdd'] == 'hold'){
      $present_c = $_POST['PreAddcomment'];
      $present_comment ="update student_address_details set present_comment= '$present_c', present_status= 'hold' where stu_rollno= '$student_rollno' ";
      $present_cexe = mysqli_query($conn , $present_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_AgencyName'] == 'verified')
    {
      $letter_status ="update student_schlorship_details set letter_status= 'verified' where stu_rollno= '$student_rollno' ";
      $letter_result = mysqli_query($conn , $letter_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_AgencyName'] == 'hold'){
      $letter_c = $_POST['Agencycomment'];
      $letter_comment ="update student_schlorship_details set letter_comment= '$letter_c', letter_status= 'hold' where stu_rollno= '$student_rollno' ";
      $letter_cexe = mysqli_query($conn , $letter_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------

    if($_POST['verified_schlrAmount'] == 'verified')
    {
      $passbook_status ="update student_schlorship_details set passbook_status= 'verified' where stu_rollno= '$student_rollno' ";
      $passbook_result = mysqli_query($conn , $passbook_status) or die ("query 1 failed");

    }
    elseif($_POST['verified_schlrAmount'] == 'hold'){
      $passbook_c = $_POST['schlrAmountcomment'];
      $passbook_comment ="update student_schlorship_details set passbook_comment= '$passbook_c', passbook_status= 'hold' where stu_rollno= '$student_rollno' ";
      $passbook_cexe = mysqli_query($conn , $passbook_comment) or die ("query 1 failed");

    }
//------------------------------------------------------------------------------------------------
    header("location:student_infoM.php");
    } // close for isset save button

    // move documents

    //$cur = "C:\\xampp\htdocs\demo\student_document\student_unverified_document\\";
    $dest="../student_document/student_verified_document";
    $dest1="../student_document/student_unverified_document";


    if($row['photo_status'] == "verified"){
      $cur = $row['photo'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row["photo"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set photo= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");
          }

        }
      }
      else{

        $tmp =explode('/',$row["photo"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set photo= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }
    else{ //for unverified
      $cur = $row['photo'];

          $tmp =explode('/',$row["photo"]);
          $ext = end($tmp);
          $updated_dest = $dest1."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set photo= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");
          }
    }


    if($row['dob_status'] == "verified"){

      $cur = $row['dob_certi'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row["dob_certi"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set dob_certi= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row["dob_certi"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set dob_certi= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }



    }else{  //for unverified
      
      $cur = $row['dob_certi'];

      $tmp =explode('/',$row["dob_certi"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set dob_certi= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }

    if($row['stupan_status'] == "verified"){


      $cur = $row['stu_pancard_doc'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row["stu_pancard_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set stu_pancard_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row["stu_pancard_doc"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set stu_pancard_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row['stu_pancard_doc'];
      $tmp =explode('/',$row["stu_pancard_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur,$updated_dest);
        unlink($cur);
        mysqli_query($conn ,"update student_personal_details set stu_pancard_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


      }

    }
    if($row['parentpan_status'] == "verified"){


      $cur = $row['parent_pancard_doc'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row["parent_pancard_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set parent_pancard_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row["parent_pancard_doc"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set parent_pancard_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }
    else{ //for unverified
      $cur = $row['parent_pancard_doc'];
      $tmp =explode('/',$row["parent_pancard_doc"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur,$updated_dest);
        unlink($cur);
        mysqli_query($conn ,"update student_personal_details set parent_pancard_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


      }
    }


    if($row['stuadhar_status'] == "verified"){


      $cur = $row['stu_adhar_doc'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row["stu_adhar_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set stu_adhar_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row["stu_adhar_doc"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set stu_adhar_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }
    else{ //for unverified
      $cur = $row['stu_adhar_doc'];
      $tmp =explode('/',$row["stu_adhar_doc"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set stu_adhar_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }
    if($row['stupass_status'] == "verified"){


      $cur = $row['stu_passport_doc'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row["stu_passport_doc"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_personal_details set stu_passport_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row["stu_passport_doc"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set stu_passport_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row['stu_passport_doc'];
      $tmp =explode('/',$row["stu_passport_doc"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_personal_details set stu_passport_doc= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }

    if($row1['caste_status'] == "verified"){


      $cur = $row1['stu_caste_proof'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row1["stu_caste_proof"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_category_details set stu_caste_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row1["stu_caste_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_category_details set stu_caste_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row1['stu_caste_proof'];
      $tmp =explode('/',$row1["stu_caste_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_category_details set stu_caste_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }



    if($row2['permanent_status'] == "verified"){


      $cur = $row2['stu_permanent_address_proof'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row2["stu_permanent_address_proof"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_address_details set stu_permanent_address_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row2["stu_permanent_address_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_address_details set stu_permanent_address_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{  //for unverified
      $cur = $row2['stu_permanent_address_proof'];
      $tmp =explode('/',$row2["stu_permanent_address_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_address_details set stu_permanent_address_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }


    if($row2['domicile_status'] == "verified"){


      $cur = $row2['stu_domicile_proof'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row2["stu_domicile_proof"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_address_details set stu_domicile_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row2["stu_domicile_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_address_details set stu_domicile_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{  //for unverified
      $cur = $row2['stu_domicile_proof'];
      $tmp =explode('/',$row2["stu_domicile_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_address_details set stu_domicile_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }



    if($row2['present_status'] == "verified"){


      $cur = $row2['stu_present_address_proof'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row2["stu_present_address_proof"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_address_details set stu_present_address_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row2["stu_present_address_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_address_details set stu_present_address_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row2['stu_present_address_proof'];
      $tmp =explode('/',$row2["stu_present_address_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest1."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_address_details set stu_present_address_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }
    }

    if($row4['letter_status'] == "verified"){


      $cur = $row4['stu_sanction_letter'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row4["stu_sanction_letter"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_schlorship_details set stu_sanction_letter= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row4["stu_sanction_letter"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_schlorship_details set stu_sanction_letter= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{
      $cur = $row4['stu_sanction_letter'];
      $tmp =explode('/',$row4["stu_sanction_letter"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur,$updated_dest);
        unlink($cur);
        mysqli_query($conn ,"update student_schlorship_details set stu_sanction_letter= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


      }
    }



    if($row4['passbook_status'] == "verified"){


      $cur = $row4['stu_passbook_proof'];

      if(!(file_exists($dest."/".$student_rollno))){
        if(mkdir($dest."/".$student_rollno, 0777)){
          $tmp =explode('/',$row4["stu_passbook_proof"]);
          $ext = end($tmp);
          $updated_dest = $dest."/".$student_rollno."/".$ext;
          if(!(file_exists($updated_dest))){
            copy($cur,$updated_dest);
            unlink($cur);
            mysqli_query($conn ,"update student_schlorship_details set stu_passbook_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");

          }
        }
      }
      else{

        $tmp =explode('/',$row4["stu_passbook_proof"]);
        $ext = end($tmp);
        $updated_dest = $dest."/".$student_rollno."/".$ext;
        if(!(file_exists($updated_dest))){
          copy($cur,$updated_dest);
          unlink($cur);
          mysqli_query($conn ,"update student_schlorship_details set stu_passbook_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


        }

      }

    }else{ //for unverified
      $cur = $row4['stu_passbook_proof'];
      $tmp =explode('/',$row4["stu_passbook_proof"]);
      $ext = end($tmp);
      $updated_dest = $dest1."/".$student_rollno."/".$ext;
      if(!(file_exists($updated_dest))){
        copy($cur,$updated_dest);
        unlink($cur);
        mysqli_query($conn ,"update student_schlorship_details set stu_passbook_proof= '$updated_dest' where stu_rollno= '$student_rollno'") or die ("query 1 failed");


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
            <li class="breadcrumb-item active">Document Verification 1 &nbsp; <?php echo"<b>($student_rollno)</b>" ?></li>
        </ul>


        <fieldset class="Personal-details-unverified">
            <legend><span class="legend-saveddesign">&nbsp; Demographic Details &nbsp;</span> 
            <?php  
                if($row['app_type'] == "new" || $row1['app_type'] == "new" || $row2['app_type'] == "new" || $row3['app_type'] == "new" || $row4['app_type'] == "new"){ ?>
                    <span class="doc-text"><span class="blink blink-one">Document Verification Needed</span></span>
               <?php }           
            ?> </legend>

            <legend class="legend-design"> &nbsp; Personal : </legend>
            <form action="#" method="post" enctype="multipart/form-data">
                <!-- backend php  -->
                <?php  if(mysqli_num_rows($result)>=1) {?>
                <div class="container">
                    <label for="Name">Name :</label> <?php echo $row['name']; ?> <br>
                </div>

                <div class="container">
                    <label for="rgn">Registration number :</label> <?php echo $row['registration_no']; ?> <br>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg">
                            <label for="Photo">Photo :</label>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="viewbtn" id="photo" name="Photo_proof" required><?php  $path = $row['photo'];
               echo "<a href='$path' >View Photo</a>"; ?></button>
                        </div>
                        <div class="col-sm">
                            <label for="holdckbox">
                                <input id="photoH" class="form-check-input" type="radio" value="hold"
                                    name="verified_photo"
                                    <?php if($row['photo_status'] == "hold") echo "checked"; ?>>Hold
                                <input id="photoR" type="textbox" placeholder="comments" name="photocomment"
                                    value="<?php echo $row['photo_comment'];?>">
                            </label>


                        </div>
                        <div class="col-sm">
                            <label for="verifyckbox">
                                <input id="photoV" class="form-check-input" type="radio" name="verified_photo"
                                    value="verified"
                                    <?php if($row['photo_status'] == "verified") echo "checked"; ?>>Verify
                            </label>


                        </div>



                        <div>
                        </div>


                        <div class="container">
                            <label for="fname">First Name:</label> <?php echo $row['first_name']; ?> <br>
                        </div>

                        <div class="container">
                            <label for="mname">Middle Name:</label> <?php echo $row['middle_name']; ?> <br>
                        </div>

                        <div class="container">
                            <label for="lname">Last Name:</label> <?php echo $row['last_name']; ?> <br>
                        </div>

                        <div class="container">
                            <label for="fathername">Father's Name:</label> <?php echo $row['father_name']; ?> <br>
                        </div>

                        <div class="container">
                            <label for="mothername">Mother's Name :</label> <?php echo $row['mother_name']; ?> <br>
                        </div>

                        <div class="container">
                            <label for="gender"> Gender:</label> <?php echo $row['gender']; ?> <br>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="dob"> Date of Birth:</label> <?php echo $row['dob']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="dob" name="dob_proof"
                                        required><?php $path=$row['dob_certi']; echo "<a href='view.php?path= $path' >View DOB</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox" class="form-check-label">
                                        <input class="form-check-input" id="dobh" type="radio" value="hold"
                                            name="verified_dob"
                                            <?php if($row['dob_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="dobr" type="textbox" placeholder="comments" name="dobcomment"
                                            value="<?php echo $row['dob_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox" class="form-check-label">
                                        <input id="dobv" class="form-check-input" type="radio" name="verified_dob"
                                            value="verified"
                                            <?php if($row['dob_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <label for="birthplace"> Birthplace:</label> <?php echo $row['birth_place']; ?>
                        </div>

                        <div class="container">
                            <label for="bloodgroup"> Blood Group :</label> <?php echo $row['blood_group']; ?>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="pan-no"> PAN Card Number:</label> <?php echo $row['stu_pancard_no']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="pan-no" name="pan_proof"
                                        required><?php $path=$row['stu_pancard_doc']; echo "<a href='view.php?path= $path' >View Pancard</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox" class="form-check-label">
                                        <input id="panh" class="form-check-input" type="radio" name="verified_PanCard"
                                            value="hold"
                                            <?php if($row['stupan_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="panr" type="textbox" placeholder="comments" name="pancomment"
                                            value="<?php echo $row['stupan_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox" class="form-check-label">
                                        <input id="panv" class="form-check-input" type="radio" value="verified"
                                            name="verified_PanCard"
                                            <?php if($row['stupan_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="aadhar-no">Aadhar Card Number:</label>
                                    <?php echo $row['stu_adhar_no']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="aadhar-no" name="aadhar_proof"
                                        required><?php $path=$row['stu_adhar_doc']; echo "<a href='view.php?path= $path' >View Adharcard</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox" class="form-check-label">
                                        <input id="aadharh" class="form-check-input" type="radio" value="hold"
                                            name="verified_Aadhar"
                                            <?php if($row['stuadhar_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="aadharr" type="textbox" placeholder="comments" name="aadharcomment"
                                            value="<?php echo $row['stuadhar_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox" class="form-check-label">
                                        <input id="aadharv" class="form-check-input" type="radio" name="verified_Aadhar"
                                            value="verified"
                                            <?php if($row['stuadhar_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="passport-no"> Passport Number : </label>
                                    <?php echo $row['stu_passport_no']; ?>
                                </div>

                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="passport-no" name="passport_proof"
                                        required><?php $path=$row['stu_passport_doc']; echo "<a href='view.php?path= $path' >View Passport</a>"; ?></button>
                                </div>

                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="passporth" class="form-check-input" type="radio" value="hold"
                                            name="verified_passport"
                                            <?php if($row['stupass_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="passportr" type="textbox" placeholder="comments"
                                            name="passportcomment" value="<?php echo $row['stupass_comment'];?>">
                                    </label>
                                </div>

                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="passportv" class="form-check-input" type="radio"
                                            name="verified_passport" value="verified"
                                            <?php if($row['stupass_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="parent-pan-no">Parent PAN Card Number :</label>
                                    <?php echo $row['parent_pancard_no']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="parent-pan-no" name="parent_pan_proof"
                                        required><?php $path=$row['parent_pancard_doc']; echo "<a href='view.php?path= $path' >View Parent Pancard</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="ppanh" class="form-check-input" type="radio" value="hold"
                                            name="verified_parent_pan"
                                            <?php if($row['parentpan_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="ppanr" type="textbox" placeholder="comments" name="parentpancomment"
                                            value="<?php echo $row['parentpan_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="ppanv" type="radio" class="form-check-input" value="verified"
                                            name="verified_parent_pan" value="verified"
                                            <?php if($row['parentpan_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <br>
                        <legend class="legend-design"> &nbsp; Category : </legend>
                        <!-- backend php  -->
                        <?php  if(mysqli_num_rows($result1)>=1) {?>
                        <div class="container">
                            <label for="religion"> Religion :</label> <?php echo $row1['stu_religion']; ?>
                        </div>

                        <div class="container">
                            <label for="caste"> Caste :</label> <?php echo $row1['stu_caste']; ?>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="reservation">Reservation :</label>
                                    <?php echo $row1['stu_reservation']; ?> </br>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="CasteCertificate" name="CasteCertificate"
                                        required><?php $path=$row1['stu_caste_proof']; echo "<a href='view.php?path= $path' >View Document</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="casth" class="form-check-input" type="radio" value="hold"
                                            name="verified_Caste"
                                            <?php if($row1['caste_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="castr" type="textbox" placeholder="comments" name="castecomment"
                                            value="<?php echo $row1['caste_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="castv" class="form-check-input" type="radio" name="verified_Caste"
                                            value="verified"
                                            <?php if($row1['caste_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <label for="category">Category:</label> <?php echo $row1['stu_category']; ?>
                        </div>
                        <?php } ?>
                        <!-- 1.3 address-details -->


                        <legend class="legend-design"> &nbsp; Address : </legend>
                        <!-- backend php  -->
                        <?php  if(mysqli_num_rows($result2)>=1) {?>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="permanent-address1"> Permanent Residential Address :</label>
                                    <?php echo $row2['stu_permanent_address']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="PerAddress1" name="PerAddress1"
                                        required><?php $path=$row2['stu_permanent_address_proof']; echo "<a href='view.php?path= $path' >View Address proof</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox" class="form-check-label">
                                        <input id="paddh" class="form-check-input" type="radio" value="hold"
                                            name="verified_PerAdd"
                                            <?php if($row2['permanent_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="paddr" type="textbox" placeholder="comments" name="PerAddcomment"
                                            value="<?php echo $row2['permanent_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox" class="form-check-label">
                                        <input id="paddv" class="form-check-input" type="radio" name="verified_PerAdd"
                                            value="verified"
                                            <?php if($row2['permanent_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="domicile"> Domicile :</label> <?php echo $row2['stu_domicile']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="Domicile" name="Domicile"
                                        required><?php $path=$row2['stu_domicile_proof']; echo "<a href='view.php?path= $path' >View Domicile</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="domicileh" class="form-check-input" type="radio" value="hold"
                                            name="verified_Domicile"
                                            <?php if($row2['domicile_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="domiciler" type="textbox" placeholder="comments"
                                            name="domicilecomment" value="<?php echo $row2['domicile_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="domicilev" class="form-check-input" type="radio"
                                            name="verified_Domicile" value="verified"
                                            <?php if($row2['domicile_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="permanent-address2"> Present Residential Address :</label>
                                    <?php echo $row2['stu_present_address']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="PerAddress2" name="PerAddress2"
                                        required><?php $path=$row2['stu_present_address_proof']; echo "<a href='view.php?path= $path' >View Address proof</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="raddh" class="form-check-input" type="radio" value="hold"
                                            name="verified_PreAdd"
                                            <?php if($row2['present_status'] == "hold") echo "checked"; ?>>Hold
                                    </label>
                                    <input id="raddr" type="textbox" placeholder="comments" name="PreAddcomment"
                                        value="<?php echo $row2['present_comment'];?>">
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="raddv" class="form-check-input" type="radio" name="verified_PreAdd"
                                            value="verified"
                                            <?php if($row2['present_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- 1.4 contact-details -->

                        <legend class="legend-design"> &nbsp;Contact : </legend>
                        <!-- backend php  -->
                        <?php  if(mysqli_num_rows($result3)>=1) {?>
                        <div class="container">
                            <label for="student-contact-no"> Student Contact Number :</label>
                            <?php echo $row3['stu_contact_no']; ?>
                        </div>

                        <div class="container">
                            <label for="student-email"> Student Email ID :</label> <?php echo $row3['stu_email']; ?>
                        </div>

                        <div class="container">
                            <label for="father-contact-no"> Guardian Contact Number (Father) :</label>
                            <?php echo $row3['father_contact_no']; ?>
                        </div>

                        <div class="container">
                            <label for="father-email"> Guardian Email ID (Father) :</label>
                            <?php echo $row3['father_email']; ?>
                        </div>

                        <div class="container">
                            <label for="mother-contact-no">Guardian Contact Number (Mother):</label>
                            <?php echo $row3['mother_contact_no']; ?>
                        </div>

                        <div class="container">
                            <label for="mother-email"> Guardian Email ID (Mother) :</label>
                            <?php echo $row3['mother_email']; ?>
                        </div>
                        <?php } ?>

                        <!-- 1.5 scholarship-details -->

                        <legend class="legend-design"> &nbsp;Scholarship: </legend>
                        <!-- backend php  -->
                        <?php  if(mysqli_num_rows($result4)>=1) {?>
                        <div class="container">
                            <label for="scholarship"> Scholarship :</label> <?php echo $row4['stu_scholarship']; ?>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="agency"> Agency Name :</label> <?php echo $row4['stu_agency_name']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" id="AgencyName"
                                        name="scholarship_sanction_letter"
                                        required><?php $path=$row4['stu_sanction_letter']; echo "<a href='view.php?path= $path' >View Agency Doc</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="agencyh" class="form-check-input" type="radio" value="hold"
                                            name="verified_AgencyName"
                                            <?php if($row4['letter_status'] == "hold") echo "checked"; ?>>Hold
                                    </label>
                                    <input id="agencyr" type="textbox" placeholder="comments" name="Agencycomment"
                                        value="<?php echo $row4['letter_comment'];?>">
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="agencyv" type="radio" class="form-check-input"
                                            name="verified_AgencyName" value="verified"
                                            <?php if($row4['letter_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="scholarship-amount"> Scholarship Amount : </label>
                                    <?php echo $row4['stu_scholarship_amount']; ?>
                                </div>
                                <div class="col-sm">
                                    <button type="button" class="viewbtn" name="scholarship_amount"
                                        id="scholarship-amount"
                                        required><?php $path=$row4['stu_passbook_proof']; echo "<a href='view.php?path= $path' >View Payment slip</a>"; ?></button>
                                </div>
                                <div class="col-sm">
                                    <label for="holdckbox">
                                        <input id="scholarshiph" class="form-check-input" type="radio" value="hold"
                                            name="verified_schlrAmount"
                                            <?php if($row4['passbook_status'] == "hold") echo "checked"; ?>>Hold
                                        <input id="scholarshipr" type="textbox" placeholder="comments"
                                            name="schlrAmountcomment" value="<?php echo $row4['passbook_comment'];?>">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="verifyckbox">
                                        <input id="scholarshipv" class="form-check-input" type="radio"
                                            name="verified_schlrAmount" value="verified"
                                            <?php if($row4['passbook_status'] == "verified") echo "checked"; ?>>Verify
                                    </label>

                                </div>
                            </div>
                        </div><br>
                        <?php } ?>
                        <br><br>


                        <div class="container">
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>

            </form>
        </fieldset>
    </div>


    <div class="container">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="doc_verify1.php">1</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify3.php">3</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify4.php">4</a></li>
            <li class="page-item"><a class="page-link" href="doc_verify5.php">5</a></li>
            <li class="page-item">
                <a class="page-link" href="doc_verify2.php" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>


    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/js" href="js/mentor.js?<?php echo date('l jS \of F Y h:i:s A'); ?>" />

    <!--footer-->
    <?php
        include "footer.php";
  ?>
</body>

</html>