<?php

session_start();

if(isset($_SESSION['username']))
{
	require "user.php";
	$usr1= new User();
	$usr1->username = $_SESSION['username'];
	$usr1->uname = $_SESSION['uname'];
	$usr1->type = $_SESSION['utype'];
	$usr1->email = $_SESSION['email'];
	$type1= "Admin";

		//$type1= "Admin";
	if($usr1->type==1)
	{header("location:bookingShow.php");}
	 
}
else
{
	header("location:login.php");
}



$page = "account";
include "header.html";
include  "menu2.php";
 
?>

<!DOCTYPE html>
<!--Σελίδα διαχείρισής account υπαλλήλου-->

<head>
  <title>Account Admin</title>

</head>

<html>

<body>
<div class="container">
<h3>Account Info</h3>
<?php

	echo 'Name: '.$usr1->uname.'<br>'; 
	echo 'Username: '.$usr1->username.'<br>'; 
	echo 'Email: '.$usr1->email.'<br>'; 
	echo 'Type: '.$type1.'<br>'; 
?>

 <!--  <form method="post">
<input type="submit" name="delete" class="button" value="Delete" />

		
<br>
</form>-->

  

	
</div>
</body>
</html>
<?php
if(array_key_exists('delete', $_POST)) {
            $usr1->deleteAccount();
        }

?>