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
	$type1= "Customer";

		//$type1= "Admin";
	
	if($usr1->type==2)
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
<!--Σελίδα διαχείρισής account πελάτη-->

<head>
  <title>Account</title>

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

   <form method="post">
<input type="submit" name="delete" class="button" value="Delete" />

		
<br>
</form>

  

	<h2>Bookings</h2>
	<form method="post">
	<table id="myTable">
	<tr>
	<th style="width:20%;">Booking ID</th>
	<th style="width:20%;">Seat</th>
	<th style="width:20%;">Showtime</th>
	<th style="width:20%;">Bookdate</th>
	<th style="width:20%;"></th>

	</tr>
	<?php
		require "config.php";
	
	$bookingquery = "SELECT *  FROM booking WHERE username='$usr1->username'";
	$result = $conn->query( $bookingquery);
	
	if ($result->num_rows == 0) {
		echo "No  bookings! ";
		//$conn->close();
	
	}
	else
	{

		while($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo '<td>'.$row['booking_id'].'</td>';
			echo '<td>'.$row['seat'].'</td>';
			
			$showquery = "SELECT *  FROM shows";
			$result1 = $conn->query( $showquery);
			
			if ($result1->num_rows == 0) {
				echo "Error in shows! ";
				$conn->close();
			}

			else
			{
				$tempshowid=$row['showid'];
				$showquery = "SELECT showtime FROM shows WHERE showid='$tempshowid'";
				$result1 = $conn->query( $showquery);
				$tempshowtime = $result1->fetch_assoc();
				echo     '<td>'.$tempshowtime['showtime'].'</td>';
			}
			echo     '<td>'.$row['bookdate'].'</td>';
			echo     '<td><a href="bookingdelete.php?booking_id='.$row['booking_id'].'">Delete</a></td>';
			echo '</tr>';
		}
		
	}
	
	$conn->close();
?>
		</div>
</body>
</html>
<?php
if(array_key_exists('delete', $_POST)) {
            $usr1->deleteAccount();
        }

?>