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
  <div id="register">
	<form action="actionRegister.php" method="post">
	<fieldset>
	<legend align="bottom">Register</legend>
	<label>
     First Name: <input type="text" name="First" placeholder="Name">
	</label>
	<label>
	 Last Name: <input type="text" name="Last" placeholder="Name">
	 </label>
	 <label>
	 Email: <input type="text" name="email" placeholder="Email">
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