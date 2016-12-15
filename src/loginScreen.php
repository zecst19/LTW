<?php
	//session_start();
	//include_once "header.php";
	include_once "LoginForm.php";
if(!isset($_SESSION['username'])||($_SESSION['username'] == NULL )|| ($_SESSION['username']== "failed")){include_once "registerUser.php";} 	
	include_once "findRestaurantBar.php";
?>