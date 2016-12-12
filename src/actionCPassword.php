<?php

	session_start();
    $db = new PDO('sqlite:Tables.db');
	$username = $_SESSION['username'];
	$stmtuser = $db->prepare('SELECT * FROM user WHERE email = ?');
	$stmtuser->execute(array($username));
	$firstResult = $stmtuser->fetchAll();
	if($_POST['password'] == $_POST['repassword']){
		$_SESSION['passchecker'] = TRUE;
	}
	
	if(isset($_SESSION['passchecker'] ) && $_SESSION['passchecker'] != NULL){
		$stmt = $db->prepare('UPDATE user SET password = ? WHERE email = ?');
		$stmt->execute(array($_POST['password'],$username));
		$_SESSION['passchecker'] = NULL;
		header('Location: restaurantDisplay.php');
	}
	else{
		$_SESSION['passfailed'] = TRUE;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	



?>