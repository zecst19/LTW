<!DOCTYPE html>
<?php
session_start();
	$db = new PDO('sqlite:Tables.db');
	$stmtlength = $db->prepare('SELECT * FROM restaurant');
	$stmtlength->execute();
	$length = $stmtlength->fetchAll();
	$username = $_SESSION['username'];
	$stmtuser = $db->prepare('SELECT * FROM user WHERE email = ?');
	$stmtuser->execute(array($username));
	$user_id = $stmtuser->fetchAll();
	$countedLength = count($length);
	$Rname= $_POST['Name'];
	$desc = $_POST['Desc'];
	$rate = $_POST['rating'];
	$photo = "palceholder.jpg";
	//TODO Localização e adicionar utilizador 
	$restaurant_id = strval($countedLength+1);
	
	
	$insertQuery = $db->prepare('INSERT INTO restaurant (id_restaurant, name,description,rate,photo)VALUES (?, ?, ?, ?, ?)');
	$insertQuery->execute(array($restaurant_id,$Rname,$desc,$rate,$photo));
	
	
	header('Location: restaurantDisplay.php');



?>