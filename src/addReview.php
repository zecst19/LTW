<?php
	session_start();
	$db = new PDO('sqlite:Tables.db');
	$stmtlength = $db->prepare('SELECT * FROM review');
	$stmtlength->execute();
	$length = $stmtlength->fetchAll();
	$countedLength = count($length);
	$review= strval($_POST['review']);
	$rate = strval($_POST['rating']);
	//TODO teste - mudar depois
	$userId = strval(1);
	$restaurantId = strval($_POST['restId']);
	$review_id = strval($countedLength+1);
	var_dump($review_id);
	var_dump($userId);
	var_dump($restaurantId);
	var_dump($rate);
	var_dump($review);
	
	
	$insertQuery = $db->prepare('INSERT INTO review (id_user, id_restaurant, rate, commment)VALUES (?, ?, ?, ?)');
	$insertQuery->execute(array($userId,$restaurantId,$rate,$review));
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);



?>