<?php
// Start the session
session_start();

// Connect to the database
$con = mysqli_connect("localhost","root","","tailors");
if (!$con) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}