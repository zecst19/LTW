<!DOCTYPE html>
<?php
	session_start();
	
	$db = new PDO('sqlite:Tables.db');
	
	$stmtlength = $stmt = $db->prepare('SELECT * FROM restaurant');
	$stmtlength->execute();
	$length = $result = $stmt->fetchAll();
	$_SESSION['length'] = count($length);
	var_dump($_SESSION['length']);
	
	if(!isset($_SESSION['id']) || $_SESSION['id'] == NULL || $_SESSION['id'] == 0) {
		$_SESSION['id'] = 1;
	}
	if($_POST['Action'] == 'Next' && $_SESSION['id'] <= $_SESSION['length']-1){
		$_SESSION['id']++;
	}
	else if($_POST['Action'] == 'Previous' && $_SESSION['id'] >= 2){
		$_SESSION['id']--;
	}
	//var_dump($_SESSION['id']);
	var_dump($_SESSION['id']);
	$currId = strval($_SESSION['id']);
	//var_dump($currId);
	
	$stmt = $db->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
	$stmt->execute(array($currId));
	
		
	$result = $stmt->fetchAll();
	//var_dump($result[0]['name']);
	
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="restaurantDisplay.php" method="post">
	<p class="RestaurantName">Name</p>
	<p><?= $result[0]['name'] ?> </p>
	<p class="RestaurantName">Description</p>
	<p><?= $result[0]['description'] ?> </p>
	<p class="RestaurantName">Rating</p>
	<p><?= $result[0]['rate'] ?> </p>
	<input  type="submit" name= "Action" value= "Next">
	<input  type="submit" name= "Action" value= "Previous">
	</form>
	
	
 </body>
 </html>
 