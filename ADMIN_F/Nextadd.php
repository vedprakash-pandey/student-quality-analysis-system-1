<?php

require "connect.php";

    $roll = $_GET['roll'];
    $sdrn = $_SESSION['sdrn'];
    $s = "UPDATE sinfo SET sdrn='$sdrn' WHERE roll_no='$roll'";
    mysqli_query($conn,$s) or die("query failed");

    $demo1 = "update student_personal_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo1_run = mysqli_query($conn,$demo1);

    $demo2 = "update student_category_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo2_run = mysqli_query($conn,$demo2);

    $demo3 = "update student_address_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo3_run = mysqli_query($conn,$demo3);

    $demo4 = "update student_contact_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo4_run = mysqli_query($conn,$demo4);

    $demo5 = "update student_schlorship_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo5_run = mysqli_query($conn,$demo5);

    $demo6 = "update student_academic_achievements set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo6_run = mysqli_query($conn,$demo6);

    $demo7 = "update student_co_curricular_activities set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo7_run = mysqli_query($conn,$demo7);

    $demo8 = "update student_extra_curricular_activities set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo8_run = mysqli_query($conn,$demo8);

    $demo9 = "update student_higherstudies_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo9_run = mysqli_query($conn,$demo9);

    $demo10 = "update student_internship_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo10_run = mysqli_query($conn,$demo10);

    $demo11 = "update student_placement_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo11_run = mysqli_query($conn,$demo11);

    $demo12 = "update student_previous_academic set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo12_run = mysqli_query($conn,$demo12);

    $demo13 = "update student_progress_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo13_run = mysqli_query($conn,$demo13);

    $demo14 = "update student_internship_details1 set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo14_run = mysqli_query($conn,$demo14);

    $demo15 = "update student_copyright_details set mentor_sdrn = '$sdrn' where stu_rollno='$roll'";
    $demo15_run = mysqli_query($conn,$demo15);

    $demo16 = "update book_details set mentor_sdrn = '$sdrn' where roll_no='$roll'";
    $demo16_run = mysqli_query($conn,$demo16);

    $demo17 = "update conference_details set mentor_sdrn = '$sdrn' where roll_no='$roll'";
    $demo17_run = mysqli_query($conn,$demo17);

    $demo18 = "update journal_details set mentor_sdrn = '$sdrn' where roll_no='$roll'";
    $demo18_run = mysqli_query($conn,$demo18);

    $demo19 = "update patent_details set mentor_sdrn = '$sdrn' where roll_no='$roll'";
    $demo19_run = mysqli_query($conn,$demo19);

    header('location:Next.php');
?>