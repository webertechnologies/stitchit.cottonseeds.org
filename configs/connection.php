<?php
// Start the session
session_start();

// display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$con = mysqli_connect("localhost","root","","tailors");
if (!$con) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}