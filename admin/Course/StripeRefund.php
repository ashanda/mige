<?php
include_once '../../Config/Connection.php';
include('../includes/Functions.php');
session_start();
\Stripe\Stripe::setApiKey($stripe['secret_key']);
// var_dump($_REQUEST);
$transaction_id = $_REQUEST['transaction_id'];
$Amount = $_POST['Amount'];
$amount1 = $Amount*100 ;
$user_id=$_REQUEST['user_id'];
$course_id=$_REQUEST['course_id'];
// var_dump($_REQUEST);die("ok");
  $refund_detail=get_refund_detail_by_id($user_id,$course_id);
  // var_dump($refund_detail);
  if($refund_detail){
  	echo "Payment already send to this user.";
  	exit();
  }
  else{
try
	{

	$refund = \Stripe\Refund::create(array(
    "charge" => $transaction_id,
     // 'currency' => 'usd',
    "amount"=>$amount1
    ));
	}

	catch (\Stripe\Error\Base $e) {
	  // Code to do something with the $e exception object when an error occurs
	  echo $e->getMessage();
	  exit;
	} catch (Exception $e) {
	  // Catch any other non-Stripe exceptions
	}

	// var_dump($refund);

$refund_id=$refund['id'];
$object=$refund['object'];
$amount=$refund['amount'];
$balance_transaction=$refund['balance_transaction'];
$charge=$refund['charge'];
$created=$refund['created'];
$currency=$refund['currency'];
$status=$refund['status'];
$creation_at=time();

$refund_detail=add_refund_detail($user_id,$course_id,$refund_id,$object,$amount,$balance_transaction,$charge,$created,$currency,$status,$creation_at);
if($refund_detail){
	$history_detail=get_student_attendance_detail_by_course_id($course_id,$user_id);
	$booking_id=$history_detail[0]['id'];
	update_booking_history($booking_id);
	$billing_detail=get_billing_details($course_id,$user_id);
	// var_dump($billing_detail);
	$deleted_course_id=$billing_detail[0]['deleted_course_id'];
	// var_dump($deleted_course_id);
	if($deleted_course_id==""){
	$deletd_ids=$course_id;
	}else{
	$deletd_ids=$deleted_course_id.','.$course_id;
    }
// var_dump($deletd_ids);
	$a=delete_course_id_in_billing_detail($course_id,$booking_id,$deletd_ids,$user_id);
	// var_dump($a);
	$insert_id=$conn->insert_id;
	echo "Payment send successfully.";
	exit();
}

}