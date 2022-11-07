<?php
session_start();

if(isset($_SESSION['username']))
{
	if(isset($_SESSION['showid']))
	{
		require "user.php";
		$usr1= new User();
		$usr1->username = $_SESSION['username'];
		$usr1->type = $_SESSION['utype'];
		//$usr1->theseats = $_SESSION['theseats'];
		$usr1->showid = $_SESSION['showid'];	
		$usr1->bookdate = $_SESSION['bookdate'];
		
			 	require "config.php";
			$registerquery = "SELECT *  FROM settings";
			$result = $conn->query( $registerquery);
			if ($result->num_rows > 0) {
			//update
			
				$row = $result->fetch_assoc();
				$usr1->theseats= $row['seats'];
			
			}
			else
			{
				$usr1->theseats= 0;
			}
			$_SESSION['theseats']=$usr1->theseats;
			$conn->close();
	
		$usr1->find_free_seats();	

		
	}
	else
	{
		if ($usr1->type==2)
		header("location:bookingShowAdmin.php");
	else
		header("location:bookingShow.php");
	}
}
else
{
	header("location:login.php");
}
?>


<!DOCTYPE html>
<!--Σελίδα για επιλογή θέσης-->
<html>

<head>
  <title>Book A Seat</title>

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
      <label for="seat">Seat:</label>
     <select name="seat" id="seat">
	 <?php


	foreach ($usr1->free_seats as $value) {
		//echo "<option value=".$value['showid'].">".$value['showtime']."</option>";
		echo '<option value='.$value.'>'.$value.'</option>';
	}
	 
	 ?>
		
  </select>  </div>   
    
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>






</body>
</html>
<?php

if(isset($_POST['seat']))
{
	
	require "seat.php";
	$seat1= new Seat();
	$seat1->number= $_POST['seat'];
	if ($usr1->type == 2)
	{
		$seat1->username= 	$_SESSION['client'];
	}
	else{
		$seat1->username= $usr1->username;
	}
	$seat1->showid= $_SESSION['showid'];
	$seat1->bookdate= $_SESSION['bookdate'];
	if($seat1->book_seat() == 0)
	{
	header("location:bookingSeat.php");}
	
	else
	{
		$usr1->find_free_seats();
		echo "This seat is already booked! Pick a different one!";
	}
}
?>