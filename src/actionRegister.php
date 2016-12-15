<!DOCTYPE html>
<?php
session_start();
	$db = new PDO('sqlite:Tables.db');
	$stmtlength = $db->prepare('SELECT * FROM user');
	$stmtlength->execute();
	$length = $stmtlength->fetchAll();
	$countedLength = count($length);
	$fname= htmlspecialchars($_POST['First']);
	$lname = htmlspecialchars($_POST['Last']);
	$email = htmlspecialchars($_POST['email']);
	$photo = "palceholder.jpg";
	$password = htmlspecialchars($_POST['password']);
	$options = ['cost' => 12];
	//TODO teste - mudar depois
	//$userId = strval(1);
	//$restaurantId = strval($_POST['restId']);
	$user_id = strval($countedLength+1);
	
	
	$insertQuery = $db->prepare('INSERT INTO user (id_user, first_name, last_name, email, photo, password,owner)VALUES (?, ?, ?, ?, ?, ?,0)');
	$insertQuery->execute(array($user_id,$fname,$lname,$email,$photo,password_hash($password, PASSWORD_DEFAULT, $options)));
	
	
	header('Location: restaurantDisplay.php');



?>