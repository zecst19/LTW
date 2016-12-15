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
  <?php if(isset($_SESSION['namefailed'] ) && ($_SESSION['namefailed'] != NULL)){ $_SESSION['namefailed'] = NULL;?>
	<form action="actionCName.php" method="post">
		<fieldset>
		<legend>Change Name:</legend>
		<label>
		One of the fields not filled!
		First Name: <input type="text" name="Fname" placeholder="First Name">
		Last Name:  <input type="text" name="Lname" placeholder="Last Name">
		</label>
		<input  type="submit" value= "Change Name">
		</fieldset>
	</form>
  <?php }else { ?>
  <form action="actionCName.php" method="post">
		<fieldset>
		<legend>Change Name:</legend>
		<label>
		First Name: <input type="text" name="Fname" placeholder="First Name">
		Last Name:  <input type="text" name="Lname" placeholder="Last Name">
		</label>
		<input  type="submit" value= "Change Name">
		</fieldset>
	</form>
  <?php } ?>
  </body>
</html>