<?php

//$conn = new mysqli("localhost","owowogoh_fahweb","mige@fahrschule-star.ch","owowogoh_fahweb");
$conn = new mysqli("mysql27j10.db.hostpoint.internal","owowogoh_star","31pZfhZo","owowogoh_fahweb");  

if(mysqli_connect_error())
{
    die("Connection failed".mysqli_connect_error());
}

$config['URL_PROTOCOL'] = ((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on" || $_SERVER['HTTPS'] == "1"  )) ? "https" : "http");
define('URL_PROTOCOL', $config['URL_PROTOCOL']);

$config['base_url'] = ((isset($_SERVER['HTTPS']) &&  ($_SERVER['HTTPS'] == "on" || $_SERVER['HTTPS'] == "1"  )) ? "https" : "http");
$config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
define('BASE_URL', $config['base_url']);

$config['folder_base_url'] = ((isset($_SERVER['HTTPS']) &&  ($_SERVER['HTTPS'] == "on" || $_SERVER['HTTPS'] == "1"  )) ? "https" : "http");
$config['folder_base_url'] .= "://".$_SERVER['HTTP_HOST'];
$config['folder_base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('DEEP_BASE_URL', $config['folder_base_url']);
define('Google_Key', 'AIzaSyCh_FdlLJX4num1NLSXFwaT-DknHM2TYs0'); //need to replace with this projects key
require_once('vendor/autoload.php');

$stripe = array(
 "secret_key" =>"sk_test_51I58CwFORjbsJ6PpOr720XhWPM5GQ6x6A0mJKaEQP8vkhirs2pQOsZvMp9DijxjLzBVZR0sJgNCwjBihD9WyWvPV00ViglGAcR",
 "publishable_key"=>"pk_test_51I58CwFORjbsJ6PpCwDYG2ck4UTBcy65Xm0p0zKKn4K8jJPL4w2HYPHk4nNRUVM3GLVmBTheatcwGntD5TMEXjMl00PYvmZBfd"
);
?>