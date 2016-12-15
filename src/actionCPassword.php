<?php

	session_start();
    $db = new PDO('sqlite:Tables.db');
	$username = $_SESSION['username'];
	$stmtuser = $db->prepare('SELECT * FROM user WHERE email = ?');
	$stmtuser->execute(array($username));
	$firstResult = $stmtuser->fetchAll();
	$options = ['cost' => 12];
	$password = htmlspecialchars($_POST['password']);
	$repassword = htmlspecialchars($_POST['repassword']);
	if($password == $repassword){
		$_SESSION['passchecker'] = TRUE;
	}
	
	if(isset($_SESSION['passchecker'] ) && $_SESSION['passchecker'] != NULL){
		$stmt = $db->prepare('UPDATE user SET password = ? WHERE email = ?');
		$stmt->execute(array(password_hash($password, PASSWORD_DEFAULT, $options),$username));
		$_SESSION['passchecker'] = NULL;
		header('Location: userProfile.php');
	}
	else{
		$_SESSION['passfailed'] = TRUE;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	



?>