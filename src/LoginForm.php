<!DOCTYPE html>
<html>
 <head>
    <title>LoginForm</title>
    <meta charset="utf-8">
  </head>
  <body>
	<?php if (isset($_SESSION['username'])) { ?>
	<p class="Logged IN!">LOGGED IN!</p>
	<?php } else { ?>
	<form action="login.php" method="post">
	<fieldset>
	<legend>Log In:</legend>
     Username: <input type="text" name="Username" placeholder="Username">
     Password: <input type="password" name="Password" placeholder="Password">
     <input  type="submit" value= "Log In">
	 </fieldset>
	</form>
	<?php } ?>
  </body>