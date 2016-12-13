<!DOCTYPE html>
<?php
	//session_start();
?>
<html>
 <head>
    <title>LoginForm</title>
    <meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='LoginForm.css'>
  </head>
  <body>
	<?php if (isset($_SESSION['username']) && ($_SESSION['username']== "failed")) { $_SESSION['username'] = NULL; ?>
	<div id="login">
	<form action="login.php" method="post">
	<fieldset>
	<legend align="top">Log In</legend>
	<label>
     Username: <input type="text" name="username" placeholder="Username">
	</label>
	<label>
     Password: <input type="password" name="password" placeholder="Password">
	 </label>
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
	<legend align="top">Log In</legend>
	<label>
     Username: <input type="text" name="username" placeholder="Username">
	  </label>
     <label>
     Password: <input type="password" name="password" placeholder="Password">
	 </label>
     <input  type="submit" value= "Log In">
	 </fieldset>
	</form>
	</div>
	<?php } ?>
  </body>
  </html>