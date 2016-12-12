<!DOCTYPE html>
<?php
	session_start();
	
?>
<html>
 <head>
    <title>ChangeRestaurant</title>
    <meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='LoginForm.css'>;
  </head>
  <body>
	<form action="actionCRestaurant.php" method="post">
		<fieldset>
		<legend>Change Restaurant:</legend>
		<label>
		Name: <input type="text" name="Name" placeholder="Name">
		Description:  <input type="text" name="Desc" placeholder="Description">
		Contact: <input type="text" name="Cont" placeholder="Contact">
		</label>
		<button  type="submit" name= "restId" value= "<?= $_POST['restId'] ?>">Send</button>
		</fieldset>
	</form>
   </body>
</html>