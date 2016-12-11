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
	<form action="actionRegister.php" method="post">
	<fieldset>
	<legend>Register:</legend>
     First Name: <input type="text" name="First" placeholder="Username">
	 Last Name: <input type="text" name="Last" placeholder="Username">
	 Email: <input type="text" name="email" placeholder="Username">
     Password: <input type="password" name="password" placeholder="Password">
     <input  type="submit" value= "Register">
	 </fieldset>
	</form>
  </body>
  </html>