<!DOCTYPE html>
<?php
session_start();
	$db = new PDO('sqlite:Tables.db');
	$stmtlength = $db->prepare('SELECT * FROM user');
	$stmtlength->execute();
	$length = $stmtlength->fetchAll();
	$countedLength = count($length);
	$fname= $_POST['First'];
	$lname = $_POST['Last'];
	$email = $_POST['email'];
	$photo = "palceholder.jpg";
	$password = $_POST['password'];
	//TODO teste - mudar depois
	//$userId = strval(1);
	//$restaurantId = strval($_POST['restId']);
	$user_id = strval($countedLength+1);
	
	
	$insertQuery = $db->prepare('INSERT INTO user (id_user, first_name, last_name, email, photo, password)VALUES (?, ?, ?, ?, ?, ?)');
	$insertQuery->execute(array($user_id,$fname,$lname,$email,$photo,$password));
	
	
	header('Location: restaurantDisplay.php');



?>