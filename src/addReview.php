<?php
	session_start();
	$db = new PDO('sqlite:Tables.db');
	$stmtlength = $db->prepare('SELECT * FROM review');
	$stmtlength->execute();
	$length = $stmtlength->fetchAll();
	$countedLength = count($length);
	$review= strval($_POST['review']);
	$rate = strval($_POST['rating']);
	if(isset($_SESSION['username']) && $_SESSION['username']!= NULL){
		$stmt3 = $db->prepare(' SELECT * FROM user WHERE email = ?');
		$stmt3->execute(array($_SESSION['username']));
		$result3 = $stmt3->fetchAll();
		$userId = $result3[0]['id_user'];
	}else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	$restaurantId = strval($_POST['restId']);
	$review_id = strval($countedLength+1);
	/*var_dump($review_id);
	var_dump($userId);
	var_dump($restaurantId);
	var_dump($rate);
	var_dump($review);*/
	
	
	$insertQuery = $db->prepare('INSERT INTO review (id_review, id_user, id_restaurant, rate, commment)VALUES (?, ?, ?, ?, ?)');
	$insertQuery->execute(array($review_id,$userId,$restaurantId,$rate,$review));
	
	$allReviews = $db->prepare('SELECT * FROM review WHERE id_restaurant = ?');
	$allReviews->execute(array($restaurantId));
	$Reviews = $allReviews->fetchAll();
	
	$Md = 0;
	$nReviews = count($Reviews);
	
	foreach($Reviews as $row){
		$Md += intval($row['rate']);
	}
	$Media = $Md/$nReviews;
	
	$intMedia = intval($Media);
	$stmt = $db->prepare('UPDATE restaurant SET rate = ?  WHERE id_restaurant = ?');
	$stmt->execute(array($intMedia,$restaurantId));
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);



?>