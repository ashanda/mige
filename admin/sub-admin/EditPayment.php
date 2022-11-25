<?php 
include '../Config/Connection.php';
include '../includes/Functions.php';

$type=$_POST['type'];

// echo $type;

if($type==1){
	$booked_id=$_POST['booked_id'];
	$student_id=$_POST['student_id'];
	$course_id=$_POST['course_id'];
    $payment_status=$_POST['payment_status'];
    $query="update billing_details set payment_status='$payment_status' where id='$booked_id'";
    $row=mysqli_query($conn,$query);

    $queryupdate="update booked_course_history set payment_status='$payment_status' where course_id='$course_id' and user_id='$student_id'";
	$rowupdate=mysqli_query($conn,$queryupdate);


	if($row){
			// echo 1;
				echo json_encode(array('status'=>1));
			exit();
		}
		else{
				echo json_encode(array('status'=>0));
			exit();
		}
}
elseif($type==2){
	$attendance_status=$_POST['attendance_status'];
	$student_id=$_POST['student_id'];
	$course_id=$_POST['course_id'];
    $query="update booked_course_history set attendance_status='$attendance_status' where course_id='$course_id' and user_id='$student_id'";
	$row=mysqli_query($conn,$query);
	if($row){
			// echo 1;
				echo json_encode(array('status'=>1));
			exit();
		}
		else{
				echo json_encode(array('status'=>0));
			exit();
		}
}
elseif($type==3){
	$payment_status=$_POST['payment_status'];
	// $user_id=$_POST['user_id'];
	$id=$_POST['id'];
	$course_id=$_POST['course_id'];
	$booked_course_id=get_billing_detail_by_booked_id($id);
	// var_dump($id);var_dump($booked_course_id);
	$booked_course_ids=$booked_course_id[0]['course_id'];
	// var_dump(count($booked_course_ids));
	$booked_user_id=$booked_course_id[0]['user_id'];
	
	$booked_course_history=get_booked_detail_by_id($id);
	$user_id=$booked_course_history[0]['user_id'];

$query="update booked_course_history set payment_status='$payment_status' where course_id='$course_id' and id='$id'";
$row=mysqli_query($conn,$query);
if($row){
	echo 1;
	$course_ids=explode(',', $booked_course_ids);
	// var_dump($course_ids);
	// var_dump(count($course_ids));
	foreach ($course_ids as $key => $value) {
		$data=get_payment_staus_by_course_id($booked_user_id,$value);
		if($data){
			$a[]=$data;
		}
		
	}
	if(count($course_ids)==count($a)){
		update_billing_payment_status($id);
	}
	
}
else{
	echo 0;
}
}
elseif($type==4){
	// var_dump($_POST);
	$attendance_status=$_POST['attendance_status'];
	$id=$_POST['id'];
	$course_id=$_POST['course_id'];
$query="update booked_course_history set attendance_status='$attendance_status' where course_id='$course_id' and id='$id'";
$row=mysqli_query($conn,$query);
if($row){
	echo 1;
}
else{
	echo 0;
}
}
// var_dump($query);
// $row=mysqli_query($conn,$query);
// if($row){
// 	echo 1;
// }
// else{
// 	echo 0;
// }