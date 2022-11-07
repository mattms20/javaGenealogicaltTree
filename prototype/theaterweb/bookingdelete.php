<?php


	require "Seat.php";
	$seat1= new Seat();
	$seat1->booking_id= $_GET['booking_id'];
	$seat1->delete_booking();
	
	


?>