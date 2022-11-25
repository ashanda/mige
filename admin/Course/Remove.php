<?php

// include '../includes/Functions.php';
include('../Config/Connection.php');
$user_id=$_POST['user_id'];
$course_id=$_POST['course_id'];
$id=$_POST['id'];

// var_dump($_POST);
$billing_detail=get_billing_details_by_id($course_id,$user_id,$id);
// var_dump($billing_detail);
    $course_details = get_course_detail_by_couse_id($course_id);
	$remove_course_ids=$billing_detail[0]['remove_course_ids'];
	// var_dump($remove_course_ids);
	if($remove_course_ids==""){
	$removed_ids=$course_id;
	}else{
	$removed_ids=$remove_course_ids.','.$course_id;
    }
    // var_dump($remove_course_ids);
     $updatebookingquery="update booked_course_history set isRemoved='1' where  user_id='$user_id' and course_id='$course_id'";
     $updatebookingrun=mysqli_query($conn,$updatebookingquery);


    $query="update billing_details set remove_course_ids='$removed_ids' where FINd_IN_SET('$course_id',course_id) and user_id='$user_id' and id='$id'";
    $row=mysqli_query($conn,$query);
    if($row){
	echo 1;
	/*$user_id=$value['user_id'];
    $user_detail=get_user_detail_by_id($user_id);
    // var_dump($user_detail);
    $email=$user_detail[0]['email'];
    // var_dump($email);
    $email_message = "Admin has removed you from ". $course_details[0]['course_title_ger']." course, please contact admin if any query.";
    $to = $email;
   
    $subject = "You have been removed from ". $course_details[0]['course_title_ger']." course.";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    $headers .= "From: info@fahrschule-star.ch";

    $success = mail($to,$subject,$email_message,$headers);*/
}
else{
	echo 0;
}  



function get_billing_details_by_id($course_id,$user_id,$id)
{
    global $conn;
    $q['query'] ="SELECT * FROM `billing_details` where id='$id' and FINd_IN_SET('$course_id',course_id) and user_id='$user_id' or  id='$id' and FINd_IN_SET('$course_id',deleted_course_id) and user_id='$user_id' ";
     //var_dump($q['query']);die;
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    while ($c=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $c['s_num'] = $i;
        array_push($q['result'], $c);
    }
    return $q['result'];
}

function get_user_detail_by_id($user_id)
{
    global $conn;
    $q['query'] = "SELECT * FROM user WHERE user_id='$user_id'";
    $q['run'] = $conn->query($q['query']);
    $q['result'] = array();
    $i = 0;
    while ($c=$q['run']->fetch_assoc()) 
    {
        $i = ++$i;
        $c['s_num'] = $i;
        array_push($q['result'], $c);
    }
    return $q['result'];
}

function get_course_detail_by_couse_id($course_id)
{

     global $conn;
    $q['query'] = "SELECT * FROM `tbl_course` where course_id='$course_id'"; 
    // var_dump($q['query']);
    $q['run'] = $conn->query($q['query']);
     $all_details =array();
    if ($q['run']->num_rows > 0)
    {
    	$i = 0;
        while ($q['result'] = $q['run']->fetch_assoc())
        {  
    
    	$i = ++$i;
    	$q['result']['s_num'] = $i;
           
            array_push($all_details, $q['result']);
        }
    }
    return $all_details;

}