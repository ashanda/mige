<?php
include('Connection.php');

$id = $_POST['id'];
$password = $_POST['password'];
$q['query'] = "UPDATE admin_login set `password`='$password' WHERE id ='$id'";
$q['run'] = $conn->query($q['query']);

if($q['run']) 
{   
	echo json_encode(array("status"=>1,"message"=>"Your password changed successfully"));
	exit();
    
}
else 
{
	echo json_encode(array("status"=>0,"message"=>"Failed to change the password"));
    exit();
}
?>