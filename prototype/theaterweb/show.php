<?php

//κλάσση για show
class Show{

public $showid;
public $showtime;

     


function set_show()
{
	require "config.php";

	
	
		
			
		$showquery = "SELECT *  FROM shows WHERE showtime='$this->showtime' ";
		$result = $conn->query( $showquery);
		
		if (empty($this->showtime)){
		
		die("<p>Please fill all required fields!</p>");
		}
			
		else if ($result->num_rows > 0) {
			echo "<p>This showtime is already in use! Pick a different one!</p>";
			$conn->close();
			
		}
			
		else
		{
			
			$showquery = "INSERT INTO shows (showtime)
			VALUES ('$this->showtime')";

			if ($conn->query($showquery)) 
			{
				$conn->close();

				//header("location:settings.php");
				echo '<script type="text/javascript"> window.location="settings.php";</script>';
								
			}
	
		}
}

function delete_show()
{
	
	require "config.php";
	$showquery = "SELECT *  FROM shows WHERE showid='$this->showid'";
		$result = $conn->query( $showquery);
		if ($result->num_rows > 0) {
		$deleteshowquery = "DELETE  FROM shows WHERE showid= '$this->showid' ";
		$deletebookingquery ="DELETE   FROM booking WHERE showid ='$this->showid'";
		$conn->query( $deleteshowquery);
		$conn->query( $deletebookingquery);
		$conn->close();
		echo '<script type="text/javascript"> window.location="settings.php";</script>';}
		else
		echo 'Error Occured, please try again';
}
}
?>