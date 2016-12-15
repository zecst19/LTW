<?php

	session_start();
    $db = new PDO('sqlite:Tables.db');
	$username = $_SESSION['username'];
	$fName = htmlspecialchars($_POST['Fname']);
	$lName = htmlspecialchars($_POST['Lname']);
	
	if(isset($fName) && isset($lName)){
		$stmt = $db->prepare('UPDATE user SET first_name = ?, last_name = ?  WHERE email = ?');
		$stmt->execute(array($fName,$lName,$username));
		header('Location: userProfile.php');
	}
	else{
		$_SESSION['namefailed'] = TRUE;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	



?>