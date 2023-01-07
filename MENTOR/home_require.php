
<?php

$conn=mysqli_connect("localhost","root","","mini") or die("connection failed");

    $var = "select stu_rollno from student_personal_details where verify_status ='unverified' AND mentor_sdrn='$sdrn1' " ;
    $result1 = mysqli_query($conn , $var) or die ("query 1 failed");
   // $srn = mysqli_fetch_assoc($result1);
   $a=array();
    while($srn = mysqli_fetch_assoc($result1)){
      $x = $srn['stu_rollno'];
      array_push($a, $x);

    }

    $var_add = "select stu_rollno from student_address_details where verify_status ='unverified' AND mentor_sdrn='$sdrn1' " ;
    $result_add = mysqli_query($conn , $var_add) or die ("query 1 failed");
    // $srn = mysqli_fetch_assoc($result1);
    $m=array();
    while($srn_add = mysqli_fetch_assoc($result_add)){
      $x = $srn_add['stu_rollno'];
      array_push($a, $x);

    }

    $var_categ = "select stu_rollno from student_category_details where verify_status ='unverified' AND mentor_sdrn='$sdrn1' " ;
    $result_categ = mysqli_query($conn , $var_categ) or die ("query 1 failed");
    // $srn = mysqli_fetch_assoc($result1);
    $n=array();
    while($srn_categ = mysqli_fetch_assoc($result_categ)){
      $x = $srn_categ['stu_rollno'];
      array_push($a, $x);

    }

    $var_schlr = "select stu_rollno from student_schlorship_details where verify_status ='unverified' AND mentor_sdrn='$sdrn1' " ;
    $result_schlr = mysqli_query($conn , $var_schlr) or die ("query 1 failed");
    // $srn = mysqli_fetch_assoc($result1);
    $o=array();
    while($srn_schlr = mysqli_fetch_assoc($result_schlr)){
      $x = $srn_schlr['stu_rollno'];
      array_push($a, $x);

    }

    $var1 = "select stu_rollno from student_previous_academic where verify_status ='unverified' AND mentor_sdrn='$sdrn1' " ;
    $result2 = mysqli_query($conn , $var1) or die ("query 1 failed");
   // $srn1 = mysqli_fetch_assoc($result2);
   $b=array();
    while($srn1 = mysqli_fetch_assoc($result2)){

      $x = $srn1['stu_rollno'];
      array_push($a, $x);


    }

    $var2 = "select stu_rollno from student_progress_details where mentor_sdrn='$sdrn1' group by stu_rollno" ;
      $result3 = mysqli_query($conn , $var2) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $c=array();
      while($srn2 = mysqli_fetch_assoc($result3)){
        $s_rollno3 =$srn2['stu_rollno'];
        $verify_q3 = "select distinct verify_status from student_progress_details where stu_status = 'Pass' AND stu_rollno='$s_rollno3'";
        $verify_r3= mysqli_query($conn , $verify_q3) or die ("query 1 failed");
        $verify_n3 = mysqli_num_rows($verify_r3);
        $verify_f3 = mysqli_fetch_assoc($verify_r3);
        
        if( $verify_n3 == 1){
            if($verify_f3['verify_status'] == 'unverified'){

                $x = $srn2['stu_rollno'];
                array_push($a, $x);
        }

     }
     if($verify_n3 > 1){
      $x = $srn2['stu_rollno'];
      array_push($a, $x);
     }

      }

      $var3 = "select stu_rollno from student_academic_achievements where mentor_sdrn='$sdrn1' group by stu_rollno" ;
      $result4 = mysqli_query($conn , $var3) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $d=array();
      while($srn3 = mysqli_fetch_assoc($result4)){
        $s_rollno2 =$srn3['stu_rollno'];
        $verify_q2 = "select distinct verify_status from student_academic_achievements where stu_rollno='$s_rollno2'";
        $verify_r2= mysqli_query($conn , $verify_q2) or die ("query 1 failed");
        $verify_n2 = mysqli_num_rows($verify_r2);
        $verify_f2 = mysqli_fetch_assoc($verify_r2);
        
        if($verify_n2 == 1){
            if($verify_f2['verify_status'] == 'unverified'){

                $x = $srn3['stu_rollno'];
                array_push($a, $x);
        }

     }
     if($verify_n2 > 1){
      $x = $srn3['stu_rollno'];
                array_push($a, $x);
     }

      }

      $var4 = "select stu_rollno from student_extra_curricular_activities where mentor_sdrn='$sdrn1' group by stu_rollno " ;
      $result5= mysqli_query($conn , $var4) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $e=array();
      while($srn4 = mysqli_fetch_assoc($result5)){

         $s_rollno1 =$srn4['stu_rollno'];
        $verify_q1 = "select distinct verify_status from student_extra_curricular_activities where stu_rollno='$s_rollno1'";
        $verify_r1= mysqli_query($conn , $verify_q1) or die ("query 1 failed");
        $verify_n1 = mysqli_num_rows($verify_r1);
        $verify_f1 = mysqli_fetch_assoc($verify_r1);
        
        if($verify_n1 == 1){
            if($verify_f1['verify_status'] == 'unverified'){

                $x = $srn4['stu_rollno'];
                array_push($a, $x);
        }

     }
     if($verify_n1 > 1){
      $x = $srn4['stu_rollno'];
      array_push($a, $x);
     }

      }


      $var5 = "select stu_rollno from student_co_curricular_activities where mentor_sdrn='$sdrn1' group by stu_rollno " ;
      $result6= mysqli_query($conn , $var5) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $f=array();
     while($srn5 = mysqli_fetch_assoc($result6)){
       $s_rollno =$srn5['stu_rollno'];
        $verify_q = "select distinct verify_status from student_co_curricular_activities where stu_rollno='$s_rollno'";
        $verify_r= mysqli_query($conn , $verify_q) or die ("query 1 failed");
        $verify_n = mysqli_num_rows($verify_r);
        $verify_f = mysqli_fetch_assoc($verify_r);
        
        if($verify_n == 1){
            if($verify_f['verify_status'] == 'unverified'){

                $x = $srn5['stu_rollno'];
                array_push($a, $x);
        }

     }
     if($verify_n > 1){
      $x = $srn5['stu_rollno'];
      array_push($a, $x);
     }

      }

      $var6 = "select stu_rollno from student_internship_details where mentor_sdrn='$sdrn1' group by stu_rollno" ;
      $result7= mysqli_query($conn , $var6) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $g=array();
      while($srn6 = mysqli_fetch_assoc($result7)){
        $s_rollno4 =$srn6['stu_rollno'];
        $verify_q4 = "select distinct verify_status from student_internship_details where stu_rollno='$s_rollno4'";
        $verify_r4= mysqli_query($conn , $verify_q4) or die ("query 1 failed");
        $verify_n4 = mysqli_num_rows($verify_r4);
        $verify_f4 = mysqli_fetch_assoc($verify_r4);
        
        if($verify_n4 == 1){
            if($verify_f4['verify_status'] == 'unverified'){

                $x = $srn6['stu_rollno'];
                array_push($a, $x);
        }

     }
     if($verify_n4 > 1){
      $x = $srn6['stu_rollno'];
      array_push($a, $x);

     }

      }

     // -------------------------
      $var_co = "select stu_rollno from student_copyright_details where mentor_sdrn='$sdrn1' group by stu_rollno" ;
      $result_co = mysqli_query($conn , $var_co) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $h=array();
      while($srn_co = mysqli_fetch_assoc($result_co)){
        $s_rollno_co =$srn_co['stu_rollno'];
        $verify_q_co = "select distinct verify_status from student_copyright_details where stu_rollno='$s_rollno_co'";
        $verify_r_co= mysqli_query($conn , $verify_q_co) or die ("query 1 failed");
        $verify_n_co = mysqli_num_rows($verify_r_co);
        $verify_f_co = mysqli_fetch_assoc($verify_r_co);
        
        if($verify_n_co == 1){
            if($verify_f_co['verify_status'] == 'unverified'){

                $x = $srn_co['stu_rollno'];
                array_push($a, $x);
        }

     }
     if($verify_n_co > 1){
      $x = $srn_co['stu_rollno'];
                array_push($a, $x);
     }

      }

    //  ---------------------

$var_bo = "select roll_no from book_details where mentor_sdrn='$sdrn1' group by roll_no" ;
      $result_bo = mysqli_query($conn , $var_bo) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $i=array();
      while($srn_bo = mysqli_fetch_assoc($result_bo)){
        $s_rollno_bo =$srn_bo['roll_no'];
        $verify_q_bo = "select distinct verify_status from book_details where roll_no='$s_rollno_bo'";
        $verify_r_bo= mysqli_query($conn , $verify_q_bo) or die ("query 1 failed");
        $verify_n_bo = mysqli_num_rows($verify_r_bo);
        $verify_f_bo = mysqli_fetch_assoc($verify_r_bo);
        
        if($verify_n_bo == 1){
            if($verify_f_bo['verify_status'] == 'unverified'){

                $x = $srn_bo['roll_no'];
                array_push($a, $x);
        }

     }
     if($verify_n_bo > 1){
      $x = $srn_bo['roll_no'];
                array_push($a, $x);
     }

      }

    //  ---------------------

    $var_conf = "select roll_no from conference_details where mentor_sdrn='$sdrn1' group by roll_no" ;
      $result_conf = mysqli_query($conn , $var_conf) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $j=array();
      while($srn_conf = mysqli_fetch_assoc($result_conf)){
        $s_rollno_conf =$srn_conf['roll_no'];
        $verify_q_conf = "select distinct verify_status from conference_details where roll_no='$s_rollno_conf'";
        $verify_r_conf= mysqli_query($conn , $verify_q_conf) or die ("query 1 failed");
        $verify_n_conf = mysqli_num_rows($verify_r_conf);
        $verify_f_conf = mysqli_fetch_assoc($verify_r_conf);
        
        if($verify_n_conf == 1){
            if($verify_f_conf['verify_status'] == 'unverified'){

                $x = $srn_conf['roll_no'];
                array_push($a, $x);
        }

     }
     if($verify_n_conf > 1){
      $x = $srn_conf['roll_no'];
                array_push($a, $x);
     }

      }

    //  ---------------------

    $var_jour = "select roll_no from journal_details where mentor_sdrn='$sdrn1' group by roll_no" ;
      $result_jour = mysqli_query($conn , $var_jour) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $k=array();
      while($srn_jour = mysqli_fetch_assoc($result_jour)){
        $s_rollno_jour =$srn_jour['roll_no'];
        $verify_q_jour = "select distinct verify_status from journal_details where roll_no='$s_rollno_jour'";
        $verify_r_jour= mysqli_query($conn , $verify_q_jour) or die ("query 1 failed");
        $verify_n_jour = mysqli_num_rows($verify_r_jour);
        $verify_f_jour = mysqli_fetch_assoc($verify_r_jour);
        
        if($verify_n_jour == 1){
            if($verify_f_jour['verify_status'] == 'unverified'){

                $x = $srn_jour['roll_no'];
                array_push($a, $x);
        }

     }
     if($verify_n_jour > 1){
      $x = $srn_jour['roll_no'];
                array_push($a, $x);
     }

      }

    //  ---------------------

    $var_pat = "select roll_no from patent_details where mentor_sdrn='$sdrn1' group by roll_no" ;
      $result_pat = mysqli_query($conn , $var_pat) or die ("query 1 failed");
     // $srn2 = mysqli_fetch_assoc($result3);
     $l=array();
      while($srn_pat = mysqli_fetch_assoc($result_pat)){
        $s_rollno_pat =$srn_pat['roll_no'];
        $verify_q_pat = "select distinct verify_status from patent_details where roll_no='$s_rollno_pat'";
        $verify_r_pat= mysqli_query($conn , $verify_q_pat) or die ("query 1 failed");
        $verify_n_pat = mysqli_num_rows($verify_r_pat);
        $verify_f_pat = mysqli_fetch_assoc($verify_r_pat);
        
        if($verify_n_pat == 1){
            if($verify_f_pat['verify_status'] == 'unverified'){

                $x = $srn_pat['roll_no'];
                array_push($a, $x);
        }

     }
     if($verify_n_pat > 1){
      $x = $srn_pat['roll_no'];
                array_push($a, $x);
     }

      }

    //  ---------------------
    //  ---------------------

$var_comi = "select stu_rollno from committee_details where mentor_sdrn='$sdrn1' group by stu_rollno" ;
$result_comi = mysqli_query($conn , $var_comi) or die ("query 1 failed");
// $srn2 = mysqli_fetch_assoc($result3);
$l=array();
while($srn_comi = mysqli_fetch_assoc($result_comi)){
  $s_rollno_comi =$srn_comi['stu_rollno'];
  $verify_q_comi = "select distinct verify_status from committee_details where stu_rollno='$s_rollno_comi'";
  $verify_r_comi= mysqli_query($conn , $verify_q_comi) or die ("query 1 failed");
  $verify_n_comi = mysqli_num_rows($verify_r_comi);
  $verify_f_comi = mysqli_fetch_assoc($verify_r_comi);
  
  if($verify_n_comi == 1){
      if($verify_f_comi['verify_status'] == 'unverified'){

          $x = $srn_comi['stu_rollno'];
          array_push($a, $x);
  }

}
if($verify_n_comi > 1){
$x = $srn_comi['stu_rollno'];
          array_push($a, $x);
}

}

//  ---------------------



    $arr_p = array_unique($a);
    $_SESSION['arr_verify'] = $arr_p;

    ?>