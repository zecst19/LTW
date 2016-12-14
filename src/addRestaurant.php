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
	<?php if(isset($_SESSION['username'])&& $_SESSION['username']!= NULL){?>
	<form action="actionRestaurant.php" method="post">
	<fieldset>
	<legend>Register a new restaurant:</legend>
     Name: <input type="text" name="Name">
	 Description: <input type="text" name="Desc">
	 Rate: <input type="number" name="rating" value="0" min="0" max="10" step="1">
     <input  type="submit" value= "Add">
	 </fieldset>
	</form>
	<?php } else{ ?>
	<p> Not Logged In </p>
	<?php } ?>
  </body>
  </html>