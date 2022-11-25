<?php
include('Config/Connection.php');

$id = $_POST['id'];
$password = $_POST['password'];
$q['query'] = "UPDATE tbl_instructor set `password`='$password',password_generate='1' WHERE instructor_id ='$id'";
// var_dump($q['query']);
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