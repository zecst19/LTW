<!DOCTYPE html>
<?php
	session_start();
?>
<html>
 <head>
    <title>LoginForm</title>
    <meta charset="utf-8">
  </head>
  <body>
	<?php if (isset($_SESSION['username']) && ($_SESSION['username']== "failed")) { ?>
	<form action="login.php" method="post">
	<fieldset>
	<legend>Log In:</legend>
     Username: <input type="text" name="username" placeholder="Username">
     Password: <input type="password" name="password" placeholder="Password">
     <input  type="submit" value= "Log In">
	 </fieldset>
	 <p>Try Again</p>
	</form>
	<?php }else if (isset($_SESSION['username']) && ($_SESSION['username']!= NULL)) { ?>
	<form action="logout.php" method="post">
	<p class="Logged IN!">LOGGED IN!</p>
	<input  type="submit" value= "Log Out">
	</form>
	<?php } else { ?>
	<form action="login.php" method="post">
	<fieldset>
	<legend>Log In:</legend>
     Username: <input type="text" name="username" placeholder="Username">
     Password: <input type="password" name="password" placeholder="Password">
     <input  type="submit" value= "Log In">
	 </fieldset>
	</form>
	<?php } ?>
  </body>
  </html>