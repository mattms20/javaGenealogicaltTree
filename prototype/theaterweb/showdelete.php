<?php


require "show.php";
	$show1= new Show();
	$show1->showid= $_GET['showid'];
	$show1->delete_show();
	


?>