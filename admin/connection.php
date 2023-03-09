<?php
session_start();
$con = mysqli_connect("localhost","root","","tailors");
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}

// display errors 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'].'/tailors/');
define('SITE_PATH','http://localhost/tailors/');

define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'media/product/');
define('PRODUCT_IMAGEI_SITE_PATH', SITE_PATH.'media/product/');  
?>