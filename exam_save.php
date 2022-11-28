<?php

include 'header.php';
global $conn;
//if($_POST['user_id'] !=null &&  $_POST['exam_id']!=null && $_POST['status']!=null && !empty($_POST['user_id']) &&  !empty($_POST['exam_id'] ) && !empty($_POST['status'])){
    $exam_s_user = $_POST['user_id']; 
    $exam_r_id = $_POST['exam_id']; 
    $exam_status = $_POST['status'];

    if(mysqli_query($conn,"INSERT INTO tbl_exam_report(exam_report_user, exam_report_paper, status) VALUES ('$exam_s_user','$exam_r_id',$exam_status)")){  
        return true;
    }else{
        return false;	
    }


?>