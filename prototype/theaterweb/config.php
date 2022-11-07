<?php

//connection to db

$host = "localhost";
$user_name = "root";
$user_password = "";
$db_name = "theaterweb";
//establishes a conection to db
//creating a new connection object using mysqli 
$conn = mysqli_connect ($host,$user_name,$user_password,$db_name);

//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}
?>