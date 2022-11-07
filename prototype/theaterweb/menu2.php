<!DOCTYPE html>
<html>

<head>
<style>
.right
{
	float: right;
}
</style>
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="menu.php">Theatro</a>
    </div>
    <ul class="nav navbar-nav">
<?php
switch ($page) {
    case "menu":
		echo  '<li class="active"> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="nonactive"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="nonactive"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="nonactive"> <a href="page3.php">Page 3</a></li>';

		if ($usr1->type == 2)
			echo 	 '<li class="nonactive"> <a href="settings.php">Settings</a></li>';
		
		if ($usr1->type == 2)
		echo 	 '<li class="nonactive"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
		else
		echo 	 '<li class="nonactive"> <a href="account.php">'.$usr1->username.'</a></li>';
        break;
		
    case "bookadmin":
		echo  '<li class=""> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="active"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="nonactive"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="nonactive"> <a href="page3.php">Page 3</a></li>';

		
			echo 	 '<li class="nonactive"> <a href="settings.php">Settings</a></li>';
		
		echo 	 '<li class="nonactive"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
		
        break;
		
    case "book":
		echo  '<li class="nonactive"> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="nonactive"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="active"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="nonactive"> <a href="page3.php">Page 3</a></li>';

		if ($usr1->type == 2)
			echo 	 '<li class="nonactive"> <a href="settings.php">Settings</a></li>';
		if ($usr1->type == 2)
		echo 	 '<li class="nonactive"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
		else
		echo 	 '<li class="nonactive"> <a href="account.php">'.$usr1->username.'</a></li>';
		break;
		
	case "page3":
		echo  '<li class="nonactive"> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="nonactive"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="nonactive"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="active"> <a href="page3.php">Page 3</a></li>';

		if ($usr1->type == 2)
			echo 	 '<li class="nonactive"> <a href="settings.php">Settings</a></li>';
		if ($usr1->type == 2)
		echo 	 '<li class="nonactive"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
		else
		echo 	 '<li class="nonactive"> <a href="account.php">'.$usr1->username.'</a></li>';
		break;
		
    case "settings":
		echo  '<li class="nonactive"> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="nonactive"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="nonactive"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="nonactive"> <a href="page3.php">Page 3</a></li>';

		if ($usr1->type == 2)
			echo 	 '<li class="active"> <a href="settings.php">Settings</a></li>';
		echo 	 '<li class="nonactive"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
        break;
		
		case "account":
		echo  '<li class="nonactive"> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="nonactive"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="nonactive"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="nonactive"> <a href="page3.php">Page 3</a></li>';

		if ($usr1->type == 2)
			echo 	 '<li class="nonactive"> <a href="settings.php">Settings</a></li>';
		if ($usr1->type == 2)
		echo 	 '<li class="active"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
		else
		echo 	 '<li class="active"> <a href="account.php">'.$usr1->username.'</a></li>';
        break;
		
	default:
		echo  '<li class="nonactive"> <a href="menu.php">Home</a></li>';
		echo  '<li><a href="logout.php">Logout</a></li>';

		if ($usr1->type == 2)
			echo '<li class="nonactive"> <a href="bookingShowAdmin.php">Book a Seat Admin</a></li>';
		else
			echo '<li class="nonactive"> <a href="bookingShow.php">Book a Seat</a></li>';
	
		echo	'<li class="nonactive"> <a href="page3.php">Page 3</a></li>';

		if ($usr1->type == 2)
			echo 	 '<li class="nonactive"> <a href="settings.php">Settings</a></li>';
		if ($usr1->type == 2)
		echo 	 '<li class="nonactive"> <a href="accountAdmin.php">'.$usr1->username.'</a></li>';
		else
		echo 	 '<li class="nonactive"> <a href="account.php">'.$usr1->username.'</a></li>';
        break;
		
		
	
}




?>
    </ul>
  </div>
</nav>