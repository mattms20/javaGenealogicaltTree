<?php

session_start();
?>


<!DOCTYPE html>
<!--Σελίδα για Registration-->
<html>

<head>
<style> p {text-align: center;}</style>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php
$page = "register";
include  "header.html";
include  "menu1.php"
?>


<div class="container">
  <h2>Register form</h2>
  <form method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
	 <div class="form-group">
      <label for="uname">Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter name" name="uname">
    </div>
	 <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
    <button type="submit" class="btn btn-default">Register</button>
  </form>
</div>

</body>
</html>
<?php


//if post username	
if(isset($_POST['username']))
{

	require "user.php";
	$usr1= new User();
	$usr1->username= $_POST['username'];
	$usr1->password=$_POST['password'];
	$usr1->uname= $_POST['uname'];
	$usr1->email=$_POST['email'];
	$usr1->type = 1;
	$usr1->register_user();}
	

?>