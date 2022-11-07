<?php
//για να προσθεθεί show


require "show.php";
	$show1= new Show();
	$show1->showtime= $_GET['showtime'];
	$show1->set_show();
	

?>