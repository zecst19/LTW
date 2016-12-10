<!DOCTYPE html>
<?php
	session_start();
	
?>
<html>
 <head>
    <title>FindRestaurant</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="findRestaurant.php" method="post">
		Search: <input type="text" name="variable" placeholder="Search">
		<input  type="submit" name= "Action" value= "Search">
	</form>
 </body>
 
