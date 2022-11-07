<?php


	require "user.php";
	$user1= new User();
	$user1->userclient= $_GET['username'];
	$user1->deleteClientAccount();

	

?>