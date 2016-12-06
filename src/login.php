<?php
	session_start();
	$db = new PDO('sqlite:data.db');
	
	function userExists($username, $password) {
    global $db;
    
    $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $stmt->execute(array($username, sha1($password)));  

    return $stmt->fetch() !== false;
  }
	
	if(userExists($_POST['username'], $_POST['password'])){
		$_SESSION['username'] = $_POST['username'];
	}
	
	
	



?>