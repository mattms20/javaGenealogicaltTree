<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Kourelas.com</a>
    </div>
    <ul class="nav navbar-nav">
	<?php
		if ($page=="register")
		{
		    echo 	'<li><a href="index.html">Home</a></li>';
			echo	'<li><a href="login.php">Login</a></li>';
		    echo	'<li class="active"><a href="register.php">Register</a></li>';
		}
		if($page=="index")
		{
		    echo 	'<li class="active"><a href="index.html">Home</a></li>';
			echo	'<li><a href="login.php">Login</a></li>';
		    echo	'<li><a href="register.php">Register</a></li>';
		}
		if	($page=="login")
		{
		    echo 	'<li><a href="index.html">Home</a></li>';
			echo	'<li class="active"><a href="login.php">Login</a></li>';
		    echo	'<li><a href="register.php">Register</a></li>';
		}
			
	?>
    </ul>
  </div>
</nav>