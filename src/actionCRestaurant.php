<?php

	session_start();
    $db = new PDO('sqlite:Tables.db');
	$username = $_SESSION['username'];
	
	if(isset($_POST['Name'] )){
		$stmt = $db->prepare('UPDATE restaurant SET name = ?  WHERE id_restaurant = ?');
		$stmt->execute(array($_POST['Name'],$_POST['restId']));
	}
	if(isset($_POST['Desc'] )){
		$stmt = $db->prepare('UPDATE restaurant SET description = ?  WHERE id_restaurant = ?');
		$stmt->execute(array($_POST['Desc'],$_POST['restId']));
	}
	if(isset($_POST['Cont'])){
		$stmt = $db->prepare('UPDATE restaurant SET contact = ?  WHERE id_restaurant = ?');
		$stmt->execute(array($_POST['Cont'],$_POST['restId']));
	}
	
	header('Location: restaurantPage.php');
	



?>