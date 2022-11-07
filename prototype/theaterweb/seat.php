<?php

//κλάση Seat
class Seat{

public $booking_id;
public $number;
public $username;
public $showid;
public $bookdate;





function book_seat()
{
	require "config.php";
	//if($username == "user1" && $password=="user1")
	//code to search in db	
	/*$servername = "localhost";
	$userdb = "theatro";
	$passdb = "theatro";
	$dbname = "theatro";*/

// Create connection
	/*$theatro = new mysqli($servername, $userdb, $passdb, $dbname);*/
// Check connection
	/*if ($theatro->connect_error) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}*/
	

		
		$registerquery = "SELECT *  FROM booking WHERE seat='$this->number' and showid='$this->showid' and bookdate = '$this->bookdate'";
		$result = $conn->query( $registerquery);
		if ($result->num_rows > 0) {
			
			$conn->close();
			return (1);
			
		}
		else
		{
			
			$registerquery = "INSERT INTO booking (username, seat,showid,bookdate)
			VALUES ('$this->username', '$this->number','$this->showid','$this->bookdate')";

			if ($conn->query($registerquery)) 
				return(0);
		
			else
				return(1);
		$conn->close();
	
}
}
function delete_booking()
{
	require "config.php";
	$showquery = "SELECT *  FROM booking WHERE booking_id='$this->booking_id'";
		$result = $conn->query( $showquery);
		if ($result->num_rows > 0) {
		$deletebookingquery ="DELETE   FROM booking WHERE booking_id ='$this->booking_id'";
		$conn->query( $deletebookingquery);
		$conn->close();
		   echo '<script type="text/javascript"> window.location="settings.php";</script>';}
		else
		echo 'Error Occured, please try again';
}

function delete_rest_seats_bookings()
{
	require "config.php";

	$th1 = new Theater();
	$th1->seats = $th1->how_many_seats();
	
	$showquery = "SELECT *  FROM booking WHERE seat>'$th1->seats'";
		$result = $conn->query( $showquery);
		if ($result->num_rows > 0) {
		$deletebookingquery ="DELETE   FROM booking WHERE seat>'$th1->seats'";
		$conn->query( $deletebookingquery);
		$conn->close();
		//header("location:settings.php");
		   echo '<script type="text/javascript"> window.location="settings.php";</script>';
		}
		
}

}


?>