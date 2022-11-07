<?php
session_start();

if(isset($_SESSION['username']))
{
	require "user.php";
	$usr1= new User();
	$usr1->username = $_SESSION['username'];
	$usr1->type = $_SESSION['utype'];
	if(	$usr1->type == 1)
	{
		header("location:menu.php");
	}
}
else
{
	header("location:login.php");
}

?>


<!DOCTYPE html>
<!--Σελίδα για διαχερίρηση για υπάλληλο-->
<html>

<head>
  <title>Settings</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php
$page = "settings";
include "header.html";
include  "menu2.php";

require "theater.php";
$th1= new Theater();

$th1->seats=$th1->how_many_seats();
?>


<div class="container">
  <h2>Number of Seats</h2>
  <form method="post">
    <div class="form-group">
      <label for="theseats">Number of seats: <?php echo $th1->seats; ?></label>
      <input type="number" class="form-control" id="theseats" placeholder="Enter how many seats" name="theseats" min="1" max ="100">
    </div>
    
    
    <button type="submit" class="btn btn-default">Submit</button>
	
  </form>
  </div>
  <br>
  
  <div class="container">
  <h2>Shows</h2>
  <form method="post">
<table id="myTable">
  <tr>
    <th style="width:25%;">Id</th>
    <th style="width:25%;">Showtime</th>
  </tr>
<?php
  			require "config.php";
		
		$sqlquery = "SELECT *  FROM shows";
		$result = $conn->query( $sqlquery);
		if ($result->num_rows == 0) {
			echo "No  Shows! ";
				echo '<tr>';
				echo     '<td>Auto</td>';
				echo     '<td ><input type="time" id="showtime" name="showtime"></td>';
				echo '<td>  <input type="submit" value="Add"></td>';
				echo '</tr>';
			//$conn->close();
		
		}
		else
		{

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo     '<td for="showid">'.$row['showid'].'</td>';
				echo     '<td>'.$row['showtime'].'</td>';
				
				echo '<td><a href="showdelete.php?showid='.$row['showid'].'">Delete</a></td>';
				
				echo '</tr>';
			}
			echo '<tr>';
				echo     '<td>Auto</td>';
				echo     '<td ><input type="time" id="showtime" name="showtime"></td>';
				echo '<td>  <input type="submit" value="Add"></td>';
				echo '</tr>';
		}
		
		$conn->close();
?>

</table>
</form>
    </div>
  <br>
  
  <div class="container">
  <h2>Bookings</h2>
    <form method="post">
<table id="myTable">
  <tr>
      <th style="width:15%;">Booking ID</th>
    <th style="width:15%;">Username</th>
    <th style="width:15%;">Seat</th>
	<th style="width:15%;">Showtime</th>
	<th style="width:15%;">Bookdate</th>
	<th style="width:15%;"></th>

  </tr>
<?php
  			require "config.php";
		
		$bookingquery = "SELECT *  FROM booking";
		$result = $conn->query( $bookingquery);
		if ($result->num_rows == 0) {
			echo "No  bookings! ";
			//$conn->close();
		
		}
		else
		{

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo     '<td>'.$row['booking_id'].'</td>';
				echo     '<td>'.$row['username'].'</td>';
				echo     '<td>'.$row['seat'].'</td>';
				
						$showquery = "SELECT *  FROM shows";
						$result1 = $conn->query( $showquery);
						if ($result1->num_rows == 0) {
						echo "Error in shows! ";
						//$conn->close();
						}

						else
						{
						$tempshowid=$row['showid'];
						$showquery = "SELECT showtime FROM shows WHERE showid='$tempshowid'";
						$result1 = $conn->query( $showquery);
						$tempshowtime = $result1->fetch_assoc();
						echo     '<td>'.$tempshowtime['showtime'].'</td>';
						}
				echo '<td>'.$row['bookdate'].'</td>';
				echo '<td><a href="bookingdelete.php?booking_id='.$row['booking_id'].'">Delete</a></td>';
				echo '</tr>';
			}
		}
		$conn->close();
?>

</table>
</form>
    </div>
  <br>

<div class="container">
  <h2>Accounts</h2>
    <form method="post">
<table id="myTable">
  <tr>
    <th style="width:25%;">Name</th>
    <th style="width:25%;">Username</th>
	<th style="width:25%;">Email</th>
	<th style="width:25%;"></th>
  </tr>
<?php
  			require "config.php";
		
		$registerquery = "SELECT *  FROM user where  type=1";
		$result = $conn->query( $registerquery);
		if ($result->num_rows == 0) {
			echo "No  clients! ";
			$conn->close();
		
		}
		else
		{

			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo     '<td>'.$row['surname'].'</td>';
				echo     '<td>'.$row['username'].'</td>';
				echo     '<td>'.$row['email'].'</td>';
				echo     '<td><a href="clientdelete.php?username='.$row['username'].'">Delete</a></td>';
				echo '</tr>';
			}
			
		}
		
		$conn->close();
?>

</table>
</form>
    </div>

<?php
if(isset($_POST['theseats']))
{

	$th1->theseats= $_POST['theseats'];
	$th1->set_seats();
	require "seat.php";
	$seat1 =new Seat();
	$seat1->delete_rest_seats_bookings();

}

if(isset($_POST['username']))
{
	
	require "user.php";
	$user1= new Theater();
	$user1->userclient= $_POST['username'];
	$user1->deleteClientAccount();

}
if(isset($_POST['showtime']))
{
	
	require "show.php";
	$show1= new Show();
	$show1->showtime= $_POST['showtime'];
	$show1->set_show();

}



?>