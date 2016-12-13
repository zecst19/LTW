<!DOCTYPE html>
<?php
	//session_start();
?>
<html>
 <head>
    <title>LoginForm</title>
    <meta charset="utf-8">
  </head>
  <body>
  <h1>Sublime</h1>
  <div id="register">
	<form action="actionRegister.php" method="post">
	<fieldset>
	<legend align="bottom">Register</legend>
	<label>
     First Name: <input type="text" name="First" placeholder="Username">
	</label>
	<label>
	 Last Name: <input type="text" name="Last" placeholder="Username">
	 </label>
	 <label>
	 Email: <input type="text" name="email" placeholder="Username">
	 </label>
	  <label>
     Password: <input type="password" name="password" placeholder="Password">
	 <label>
     <input  type="submit" value= "Register">
	 </label>
	 </fieldset>
	</form>
	</div>
  </body>
  </html>