<?php
// κλάση για τις θέσεις του θεάτρου
class Theater{

public $theseats;
public $prevseats;
public $seats;



function set_seats()
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
	
	
		
		$seatsquery = "SELECT *  FROM settings";
		$result = $conn->query( $seatsquery);
		if ($result->num_rows > 0) {
			//update
			
		$row = $result->fetch_assoc();
		$this->prevseats= $row['seats'];	
			
			$seatsquery = "UPDATE  settings SET seats='$this->theseats' WHERE seats = '$this->prevseats'";
			

			if ($conn->query($seatsquery)) {
				$conn->close();
		    echo '<script type="text/javascript"> window.location="settings.php";</script>';
			}
		}
		else
		{
			//insert
			$seatsquery = "INSERT INTO settings (seats)
			VALUES ($this->theseats)";

			if ($conn->query($seatsquery)) {
				$conn->close();
			echo '<script type="text/javascript"> window.location="settings.php";</script>';

			
			}
		}
		
}

function how_many_seats()
{
	require "config.php";
	$registerquery = "SELECT *  FROM settings";
		$result = $conn->query( $registerquery);
		if ($result->num_rows > 0) {
			//update
			
		$row = $result->fetch_assoc();
		return  $row['seats'];	
		$conn->close();
}
}


}
?>