<?php 

include 'Config/Connection.php';



$getAllTranctions = "SELECT * FROM `billing_details` WHERE payment_type='twint' AND twint_complete_history=1";

$tranctionDetails  = $conn->query($getAllTranctions);

if($tranctionDetails->num_rows > 0){
while($result = $tranctionDetails->fetch_assoc()){
$transaction_id=$result['transaction_id'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.datatrans.com/v1/transactions/'.$transaction_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic MzAwMDAyMTY0MzpVcVhlZGsxUFo0enpZOEpD',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response=json_decode($response);
$error=$response->error;
if (empty($error)) {
  $transactionId=$response->transactionId;
  $status=$response->status;
  $refno=$response->refno;
  $payment_method=1;
  $autoSettle=$response->history[0]->autoSettle;
  $amount=$response->history[0]->amount/100;
  $source=$response->history[0]->source;
  $date=$response->history[0]->date;
  $twint_complete_history=0;


    $q['query'] = "UPDATE billing_details set twint_status='$status', twint_refno='$refno',twint_autoSettle='$autoSettle',twint_source='$source',twint_date='$date',twint_complete_history='$twint_complete_history',twint_account='$amount' WHERE transaction_id='$transactionId'";
    $q['run'] = $conn->query($q['query']);

  
}


}
}

?>