<?php
	session_start();
	//session_destroy();
	$_SESSION['username'] = NULL;
	header('Location: ' . $_SERVER['HTTP_REFERER']);



?>