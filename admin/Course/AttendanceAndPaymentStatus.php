<?php 
include('../Config/Connection.php');

// var_dump($_POST);
$course_id=$_POST['course_id'];
$user_id=$_POST['user_id'];
$return_arr = array();

$query = "SELECT * FROM `booked_course_history` where course_id='$course_id'and id='$user_id'";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
// while($row = mysqli_fetch_array($result)){
//     $id = $row['id'];
//     $username = $row['username'];
//     $name = $row['name'];
//     $email = $row['email'];

//     $return_arr[] = $row;
// }

// Encoding array in JSON format
echo json_encode($row);
// $detail=get_billing_details_by_id($course_id,$user_id);
// echo  json_encode($detail);
// function get_billing_details_by_id($course_id,$user_id)
// {
//     global $conn;
//     $q['query'] ="SELECT * FROM `booked_course_history` where course_id='$course_id'and user_id='$user_id' ";
//     // var_dump($q['query']);
//     $q['run'] = $conn->query($q['query']);
//     $q['result'] = array();
//     $i = 0;
//     while ($c=$q['run']->fetch_assoc()) 
//     {
//         $i = ++$i;
//         $c['s_num'] = $i;
//         array_push($q['result'], $c);
//     }
//     return $q['result'];
// }