<?php
	session_start();
	$db = new PDO('sqlite:Tables.db');
	$review = htmlspecialchars($_POST['reviewId']);
	$reviewId = strval($review);
	$deleteQuery = $db->prepare('DELETE FROM review WHERE id_review = ? ');
	$deleteQuery->execute(array($reviewId));
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);



?>