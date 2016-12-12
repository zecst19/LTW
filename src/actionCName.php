<?php

	session_start();
    $db = new PDO('sqlite:Tables.db');
	$username = $_SESSION['username'];
	
	if(isset($_POST['Fname'] ) && isset($_POST['Lname'] )){
		$stmt = $db->prepare('UPDATE user SET first_name = ?, last_name = ?  WHERE email = ?');
		$stmt->execute(array($_POST['Fname'],$_POST['Lname'],$username));
		header('Location: restaurantDisplay.php');
	}
	else{
		$_SESSION['namefailed'] = TRUE;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	



?>