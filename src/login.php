<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$db = new PDO('sqlite:Tables.db');
	//var_dump($db);
	//var_dump($_POST['username'], $_POST['password']);
	function userExists($username, $password) {
    global $db;
    
    $stmt = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
    $stmt->execute(array($username, $password));  

    return $stmt->fetch() !== false;
	}
	var_dump($_POST['username']);
	if(userExists($_POST['username'], $_POST['password'])){
		$_SESSION['username'] = $_POST['username'];
	}
	else{
		$_SESSION['username'] = "failed";
	}
	
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);



?>