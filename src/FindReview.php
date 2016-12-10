<!DOCTYPE html>
<?php
	session_start();
	$db = new PDO('sqlite:Tables.db');
	$stmt = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
	$stmt = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
	$stmt = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
	
?>
<html>
 <head>
    <title>findRestaurant</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="restaurantDisplay.php" method="post">
		 Search: <input type="text" name="username" placeholder="Search">
		
	</form>
 
 </body>