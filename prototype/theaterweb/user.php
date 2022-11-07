<?php
//κλαση για τον user που έκανε log
class User{

public $username;

public $password;
public $uname;
public $email;
public $type=1;
public $showid;
public $bookdate;

public $theseats;

public $userclient;

public $all_shows=array();
public $booked_seats=array();
public $free_seats=array();
public $clients=array();


function login_user()
{
	require "config.php";

	$loginquery = "SELECT *  FROM user WHERE username='$this->username' and userpassword='$this->password'";
	$result = $conn->query( $loginquery);
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		$this->type= $row['type'];
		$this->email= $row['email'];
		$this->uname= $row['surname'];
		
		$_SESSION['username']=$this->username;
		$_SESSION['utype']=$this->type;
		$_SESSION['uname']=$this->uname;
		$_SESSION['email']=$this->email;
		
		
		$registerquery = "SELECT *  FROM settings";
		$result = $conn->query( $registerquery);
		if ($result->num_rows > 0) {
		//update
		
			$row = $result->fetch_assoc();
			$this->theseats= $row['seats'];
		
		}
		else
		{
			$this->theseats= 0;
		}
		$_SESSION['theseats']=$this->theseats;
		$conn->close();
		
		header("location:menu.php");
	}
	else
	{
		$conn->close();
		echo "<p>Wrong credentials :( </p> <p>Please try again! :)</p>";
	}
	
}

function register_user()
{
	
	require "config.php";

	$registerquery = "SELECT *  FROM user WHERE username='$this->username' ";
	$result = $conn->query( $registerquery);
	
	if (empty($this->username) ||
	empty($this->password) ||
	empty($this->email) ||
	empty($this->uname)) 
	{
	
		die("<p>Please fill all required fields!</p>");
	}
			
	else if ($result->num_rows > 0) 
	{
		echo "<p>This username is already in use! Pick a different one!</p>";
		$conn->close();
		
	}
	
	else
	{
			
		$registerquery = "INSERT INTO user (username, userpassword,surname,email,type)
		VALUES ('$this->username', '$this->password','$this->uname','$this->email',1)";

		if ($conn->query($registerquery)) 
		{
		
			$_SESSION['username']=$this->username;
			$_SESSION['utype']=$this->type;
			$_SESSION['uname']=$this->uname;
			$_SESSION['email']=$this->email;
			
			$registerquery = "SELECT *  FROM settings";
			$result = $conn->query( $registerquery);
			if ($result->num_rows > 0) {
			//update
			
				$row = $result->fetch_assoc();
				$this->theseats= $row['seats'];
			
			}
			else
			{
				$this->theseats= 0;
			}
			$_SESSION['theseats']=$this->theseats;
			$conn->close();
			
			header("location:menu.php");
		}
		else
		{
			$conn->close();
			echo "<p>Something went wrong :( </p> <p>Please try again! :)</p>";
		}		
	}
}



function find_shows()
{
	require "config.php";
		
	$registerquery = "SELECT *  FROM shows";
	$result = $conn->query( $registerquery);
	if ($result->num_rows == 0) 
	{
		echo "No shows available! Pls try later";
		$conn->close();
	
	}
	else
	{	
		
		while($row = $result->fetch_assoc()) 
		{
			array_push($this->all_shows,$row); 
			
			//echo "id: " . $row["showid"]. " - Name: " . $row["showtime"].  "<br>";
		}
	
		$conn->close();
	}
}



function find_free_seats()
{
	require "config.php";

	
	$registerquery = "SELECT seat  FROM booking where  showid='$this->showid' and bookdate = '$this->bookdate'";
	$result = $conn->query( $registerquery);
	if ($result->num_rows == $this->theseats) {
		echo "No  available seats! ";
		$conn->close();
	
	}
	else
	{
		
		while($row = $result->fetch_assoc()) {
			array_push($this->booked_seats,$row['seat']); 
			//echo "id: " . $row["showid"]. " - Name: " . $row["showtime"].  "<br>";
		}

		for($i=1; $i <=$this->theseats;$i++)
		{
				if (!in_array($i, $this->booked_seats))
				array_push($this->free_seats,$i);
					//var_dump($this->free_seats);
		}

	$conn->close();
	}
}


function get_clients()
{
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
			array_push($this->clients,$row['username']); 
		}
			//echo "id: " . $row["showid"]. " - Name: " . $row["showtime"].  "<br>";

	$conn->close();
	}
}


function deleteAccount()
{
	require "config.php";
	$loginquery = "SELECT *  FROM user WHERE username='$this->username'";
	$result = $conn->query( $loginquery);
	if ($result->num_rows > 0) {
	$deleteuserquery = "DELETE FROM user WHERE username= '$this->username' ";
	$deletebookingquery ="DELETE   FROM booking WHERE username ='$this->username'";
	$conn->query( $deleteuserquery);
	$conn->query( $deletebookingquery);
	$conn->close();
	session_destroy();
	header("location:login.php");}
	
	else
		echo 'Error Occured, please try again';
		
}


function deleteClientAccount()
{
	require "config.php";
	$loginquery = "SELECT *  FROM user WHERE username='$this->userclient'";
	$result = $conn->query( $loginquery);
	if ($result->num_rows > 0) 
	{
		$deleteuserquery = "DELETE FROM user WHERE username= '$this->userclient' ";
		$deletebookingquery ="DELETE FROM booking WHERE username ='$this->userclient'";
		$conn->query( $deleteuserquery);
		$conn->query( $deletebookingquery);
		$conn->close();
		header("location:settings.php");
	}
		
	else
		echo 'Error Occured, please try again';
		
}
}
?>