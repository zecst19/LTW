<!DOCTYPE html>
<?php
	session_start();
	
	$db = new PDO('sqlite:Tables.db');
	if(isset($_SESSION['id']) || $_SESSION['id'] == NULL){
		$_SESSION['id'] = 1;
	}
	var_dump($_SESSION['id']);
	$currId = $_SESSION['id'];
	var_dump($currId);
	
	$stmt = $db->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
	$stmt->execute(array($currId));
	if($stmt->fetch() !== false){
	}
	var_dump($result);
	$result = $stmt->fetch();
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="" method="post">
	<p class="RestaurantName">Name</p>
	<p><?php $result['name'] ?> </p>
	</form>
	
	
 </body>
 </html>
 