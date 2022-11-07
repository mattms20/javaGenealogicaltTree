<?php
session_start();

if(isset($_SESSION['username']))
{
	require "user.php";
	$usr1= new User();
	$usr1->username = $_SESSION['username'];
	$usr1->type = $_SESSION['utype'];
	$usr1->theseats = $_SESSION['theseats'];
	$usr1->find_shows();	
	
	if($usr1->type==2)
	{header("location:bookingShowAdmin.php");}
	
}
else
{
	header("location:login.php");
}
?>


<!DOCTYPE html>
<!--Σελίδα για κράτηση θέσης απο πελάτη-->
<html>

<head>
  <title>Book Show</title>

</head>

<body>

<?php
$page = "book";
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
		
		//echo "<option value=".$value['showid'].">".$value['showtime']."</option>";
		//echo "<option value=".$value.">".$value1."</option>";
				//echo "<option value=".$value.">".$value."</option>";
						echo "<option value=".$value['showid'].">".$value['showtime']."</option>";

	
	}

	 
	 ?>
		
  </select>  </div>   
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>






</body>
</html>
<?php

if(isset($_POST['showid']))
{

		$_SESSION['showid']=$_POST['showid'] ;
		//$_SESSION['showtime']=$_POST['showtime'] ;
		$_SESSION['bookdate']=$_POST['bookdate'] ;
		header("location:bookingSeat.php");

	
}
?>