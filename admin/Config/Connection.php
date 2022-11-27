<?php

//$conn = new mysqli("mysql27j10.db.hostpoint.internal","owowogoh_star","31pZfhZo","owowogoh_fahweb");  
$conn = new mysqli("localhost","root","","mige");

if(mysqli_connect_error())
{
	die("Connection failed".mysqli_connect_error());
}

$config['URL_PROTOCOL'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
define('URL_PROTOCOL', $config['URL_PROTOCOL']);

$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
define('BASE_URL', $config['base_url']);

$config['folder_base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['folder_base_url'] .= "://".$_SERVER['HTTP_HOST'];
$config['folder_base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('DEEP_BASE_URL', $config['folder_base_url']);
define('Google_Key', 'AIzaSyCh_FdlLJX4num1NLSXFwaT-DknHM2TYs0'); //need to replace with this projects key

?>