<!DOCTYPE html>
<?php
	session_start();
?>
<html>
 <head>
    <title>LoginForm</title>
    <meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='LoginForm.css'>;
  </head>
  <body>
  <?php if (isset($_SESSION['passfailed'] ) && ($_SESSION['passfailed'] != NULL)){ $_SESSION['passfailed'] = NULL; ?>
	<form action="actionCPassword.php" method="post">
		<fieldset>
		<legend>Log In:</legend>
		<label>
		Passwords didn't match!
		Password: <input type="password" name="password" placeholder="Password">
		Write the Password again:  <input type="password" name="repassword" placeholder="Password">
		</label>
		<input  type="submit" value= "Change Password">
		</fieldset>
	</form>
  <?php } else{ ?>
	<form action="actionCPassword.php" method="post">
		<fieldset>
		<legend>Log In:</legend>
		<label>
		Password: <input type="password" name="password" placeholder="Password">
		Write the Password again:  <input type="password" name="repassword" placeholder="Password">
		</label>
		<input  type="submit" value= "Change Password">
		</fieldset>
	</form>
  <?php } ?>
  </body>
</html>	
	