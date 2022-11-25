<?php 
$amount=$_POST['amount'];
$url=$_POST['url'];
$refno=time();
$amount=$amount*100;
$curl = curl_init();

	$url = "https://www.fahrschule-star.ch/paymentStatus/";
//}

/*
"redirect": {
		"successUrl": "https://www.fahrschulestar.ch/paymentStatus/",
		"cancelUrl": "https://www.fahrschulestar.ch/paymentStatus/",
		"errorUrl": "https://www.fahrschulestar.ch/paymentStatus/"
	},
*/
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.datatrans.com/v1/transactions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"currency": "CHF",
	"refno": "'.$refno.'",
	"amount": "'.$amount.'",
	"paymentMethods": ["TWI"],
	"autoSettle": true,
	"option": {
		"createAlias": false
	},
	
	"redirect": {
		"successUrl": "'.$url.'",
		"cancelUrl": "'.$url.'",
		"errorUrl": "'.$url.'"
	},
	"theme": {
		"name": "DT2015",
		"configuration": {
			"brandColor": "#FFFFFF",
			"logoBorderColor": "#A1A1A1",
			"brandButton": "#A1A1A1",
			"payButtonTextColor": "#FFFFFF",
			"logoSrc": "",
			"logoType": "circle",
			"initialView": "list"
		}
	}
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic MzAwMDAyMTY0MzpVcVhlZGsxUFo0enpZOEpD'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$response=json_decode($response);
$transactionId=$response->transactionId;
echo json_encode(array('status'=>1,'message'=>'get transaction id','transactionID'=>$transactionId));


?>