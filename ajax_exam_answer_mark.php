<?php
include 'header.php';
global $conn;
$user_id = $_SESSION['user_id'];


$check_qury=mysqli_query($conn,"SELECT * FROM lms_answer a
WHERE a.lms_answer_user='$user_id' AND a.lms_answer_paper='$_GET[paper]' AND a.lms_answer_q='$_GET[q]'");
if(mysqli_num_rows($check_qury)>0){
mysqli_query($conn,"UPDATE lms_answer a SET a.lms_answer_a='$_GET[a]' WHERE a.lms_answer_user='$user_id' AND a.lms_answer_paper='$_GET[paper]' AND a.lms_answer_q='$_GET[q]'");
}
else{
mysqli_query($conn,"INSERT INTO
lms_answer (lms_answer_id, lms_answer_user, lms_answer_paper, lms_answer_q, lms_answer_a)
VALUES (NULL, '$user_id', '$_GET[paper]', '$_GET[q]', '$_GET[a]')");
}


?>


