<?php
session_start();

if(isset($_SESSION['username']))
{
	require "user.php";
	$usr1= new User();
	$usr1->username = $_SESSION['username'];
	$usr1->type = $_SESSION['utype'];
	$usr1->get_clients();
	$usr1->find_shows();
		
	if($usr1->type==1)
	{header("location:bookingShow.php");}
}
else
{
	header("location:login.php");
}
?>


<!DOCTYPE html>
<!--Σελίδα για κράτηση θέσης απο υπάλληλο-->
<html>
<head>
  <title>Book Show Admin</title>

</head>

<body>

<?php
$page = "bookadmin";
include "header.html";
include  "menu2.php";

 
?>


<div class="container">
  <h2>Booking form</h2>
  <form method="post">
      <div class="form-group">
      <label for="bookdate">Date:</label>
      <input type="date" class="form-control" id="bookdate" placeholder="Enter date" name="bookdate" >
    </div>
    
    <div class="form-group">
      <label for="showid">Show:</label>
     <select name="showid" id="showid">
	 <?php
	
	foreach ($usr1->all_shows as $value) {
		echo "<option value=".$value['showid'].">".$value['showtime']."</option>";
		//echo "<option value=".$value.">".$value."</option>";

	
	}
	 
	 ?>
		
  </select> 

<label for="client">Client:</label>
     <select name="client" id="client">
	 <?php
	
	foreach ($usr1->clients as $value) {
		//echo "<option value=".$value['showid'].">".$value['showtime']."</option>";
		echo "<option value=".$value.">".$value."</option>";

	
	}
	 
	 ?>
		
  </select>

  </div>   
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>






</body>
</html>
<?php

if(isset($_POST['showid']))
{

	$_SESSION['showid']=$_POST['showid'] ;
	$_SESSION['bookdate']=$_POST['bookdate'] ;
	$_SESSION['client']=$_POST['client'] ;
	header("location:bookingSeat.php");

	
}
?>