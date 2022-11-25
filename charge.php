<?php
include_once 'Config/Connection.php';
include('Functions.php');
session_start();
\Stripe\Stripe::setApiKey($stripe['secret_key']);
$user_id = $_REQUEST['user_id'];
$token = $_POST['stripeToken'];
$amount1 = $_REQUEST['amount'];
$billing_id=$_REQUEST['id'];
$amount = $amount1*100;
$now = time();
$user_detail= get_user_detail($user_id);
// var_dump($user_detail);
$email=$user_detail['email'];
// $c_query = "SELECT * FROM tbl_user where user_id= '$user_id'";
// $c_run = $conn->query($c_query);
// $c_result = $c_run->fetch_assoc();

$customer_id = $user_detail['customer_id'];
// var_dump($customer_id);
if($customer_id==null)
{
	try
	{

	$Customer=\Stripe\Customer::create([
	  "description" => "Customer for ".$email,
	  "source"=>$token,
	  "email"=>$email,
	]);
	}

	catch (\Stripe\Error\Base $e) {
	  // Code to do something with the $e exception object when an error occurs
	  echo $e->getMessage();
	  exit;
	} catch (Exception $e) {
	  // Catch any other non-Stripe exceptions
	}

	$customer_id=$Customer['id'];
	// echo $customer_id;
    $upadete_customer=update_customer_id($user_id,$customer_id);
    if($upadete_customer){
	try{
      $charge = \Stripe\Charge::create([
       'amount' => $amount,
       'currency' => 'usd',
       'customer'=>$customer_id,
   ]);
    }

    catch (\Stripe\Error\Base $e) {
	  // Code to do something with the $e exception object when an error occurs
	  echo json_encode(array('status'=>0,'message'=>$e->getMessage()));
	  exit;
	} catch (Exception $e) {
	  // Catch any other non-Stripe exceptions
	}
	// var_dump($charge);
	// echo $charge;
	if($charge){
		 $json = array('status'=>200,
	   'success' => 'ok',
	   'message'=>"Payment succeeded",
	   'token'=>$token,
	   'user_id'=>$user_id
	   
	);

	$charge_id=$charge['id'];
	$object=$charge['object'];
	$amount=$charge['amount'];
	$created=$charge['created'];
	$currency=$charge['currency'];
	$description=$charge['description'];
	$payment_method=$charge['payment_method'];
	$payment_method_type=$charge['payment_method_details']['type'];
	$receipt_url=$charge['receipt_url'];
	$status=$charge['status'];
	$balance_transaction=$charge['balance_transaction'];
	

$stripe_detail=add_edit_stripe_detail($charge_id,$customer_id,$object,$amount,$created,$currency,$description,$payment_method,$payment_method_type,$receipt_url,$status,$user_id,$token,$balance_transaction);
// header("Location: booking-page-form.php?tx_id=".$balance_transaction);
$update_billing=update_billing_detail($charge_id,$billing_id);
$billing_detail=get_billing_details($billing_id);
    $booking_course_ids=$billing_detail['booked_course_ids'];
 $booked_id=explode(',', $booking_course_ids);
  foreach ($booked_id as $key => $value) {
    	 update_billing_history_by_id($value,1);
    }
    // update_billing_history_by_id($id,$payment_status)
// var_dump($booked_id);die("ok");
// var_dump($billing_detail);die("ok");
	  $_SESSION['user_id'] = $user_id;
			$billing_id = $_REQUEST['id'];
			echo "<script type='text/javascript'>
			var billing_id = '" . $billing_id ."';
			var user_id = '" . $user_id ."';
			sessionStorage.setItem('billing_id', billing_id);
			sessionStorage.setItem('user_id', user_id);
			window.location.href='thankyou.php';</script>";
	        exit();
}else{
 $json = array('status'=>200,
   'success' => 'error',
   'message'=>$mess,
   'token'=>$token);
echo json_encode($json);
}
}
}
else{
	try{
      $charge = \Stripe\Charge::create([
       'amount' => $amount,
       'currency' => 'usd',
       'customer'=>$customer_id,
   ]);
    }

    catch (\Stripe\Error\Base $e) {
	  // Code to do something with the $e exception object when an error occurs
	  echo json_encode(array('status'=>0,'message'=>$e->getMessage()));
	  exit;
	} catch (Exception $e) {
	  // Catch any other non-Stripe exceptions
	}
	// var_dump($charge);
	// echo $charge;
	if($charge){
		 $json = array('status'=>200,
	   'success' => 'ok',
	   'message'=>"Payment succeeded",
	   'token'=>$token,
	   'user_id'=>$user_id
	   
	);

	$charge_id= $charge['id'];
	$object= $charge['object'];
	$amount= $charge['amount'];
	$created= $charge['created'];
	$currency= $charge['currency'];
	$description= $charge['description'];
	$payment_method= $charge['payment_method'];
	$payment_method_type= $charge['payment_method_details']['type'];
	$receipt_url = $charge['receipt_url'];
	$status = $charge['status'];
	$balance_transaction = $charge['balance_transaction'];



$stripe_detail=add_edit_stripe_detail($charge_id,$customer_id,$object,$amount,$created,$currency,$description,$payment_method,$payment_method_type,$receipt_url,$status,$user_id,$token,$balance_transaction);
    $update_billing=update_billing_detail($charge_id,$billing_id);
    $billing_detail=get_billing_details($billing_id);
    $booking_course_ids=$billing_detail['booked_course_ids'];
    $booked_id=explode(',', $booking_course_ids);
    foreach ($booked_id as $key => $value) {
    	 update_billing_history_by_id($value,1);
    }
    // update_billing_history_by_id($id,$payment_status)
// var_dump($booked_id);die("ok");
// header("Location: booking-page-form.php?tx_id=".$balance_transaction);

$_SESSION['user_id'] = $user_id;
			$billing_id = $_REQUEST['id'];
echo "<script type='text/javascript'>
			var billing_id = '" . $billing_id ."';
			var user_id = '" . $user_id ."';
			sessionStorage.setItem('billing_id', billing_id);
			sessionStorage.setItem('user_id', user_id);
			window.location.href='thankyou.php';</script>";
	        exit();
}else{
 $json = array('status'=>200,
   'success' => 'error',
   'message'=>$mess,
   'token'=>$token
   
   
   );
echo json_encode($json);
}
}
?>