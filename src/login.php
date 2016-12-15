<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$db = new PDO('sqlite:Tables.db');
	 $userName= htmlspecialchars($_POST['username']);
	 $password= htmlspecialchars($_POST['password']);
	//var_dump($db);
	//var_dump($_POST['username'], $_POST['password']);
    $stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
    $stmt->execute(array($userName));  
	$user = $stmt->fetch();
	//var_dump($_POST['username']);
	if($user !== false && password_verify($password, $user['password'])){
		$_SESSION['username'] = $userName;
	}
	else{
		$_SESSION['username'] = "failed";
	}
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);



?>