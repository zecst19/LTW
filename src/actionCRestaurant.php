<?php

	session_start();
    $db = new PDO('sqlite:Tables.db');
	$username = $_SESSION['username'];
	$name = htmlspecialchars($_POST['Name']);
	$desc = htmlspecialchars($_POST['Desc']);
	$cont = htmlspecialchars($_POST['Cont']);
	$restId = htmlspecialchars($_POST['restId']);
	if(isset($name)){
		$stmt = $db->prepare('UPDATE restaurant SET name = ?  WHERE id_restaurant = ?');
		$stmt->execute(array($name,$restId));
		
	}
	if($desc!= NULL ){
		$stmt = $db->prepare('UPDATE restaurant SET description = ?  WHERE id_restaurant = ?');
		$stmt->execute(array($desc,$restId));
	}
	if($cont!= NULL){
		$stmt = $db->prepare('UPDATE restaurant SET contact = ?  WHERE id_restaurant = ?');
		$stmt->execute(array($cont,$restId));
	}
	
	header('Location: restaurantPage.php');
	



?>