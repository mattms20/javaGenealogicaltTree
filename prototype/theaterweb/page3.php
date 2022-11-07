<?php
//page 3


session_start();

if(isset($_SESSION['username']))
{
	require "user.php";
	$usr1= new User();
	$usr1->username = $_SESSION['username'];
	$usr1->type = $_SESSION['utype'];	
}
else
{
	header("location:login.php");
}
//

?>
<!DOCTYPE html>
<html>
<head>
  <title>Page3</title>
  <!--<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

</head>
<body>

<?php
//$helloUser=$usr1->username;
$page = "page3";
include "header2.html";
include "menu2.php";

?>
<h2>This is the infamous Page 3.</h2>
<p>There is a skeleton in this page</p>
<div align="center">
<a href="https://www.youtube.com/watch?v=3bYRCTS7eBU"><img src="images/spooky-dance.gif"  alt="skeletons"></a>

  <br>
 <p1>He is really happy :)</p1>
    </div>

</body>
</html>
