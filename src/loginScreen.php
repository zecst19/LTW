<?php
	//session_start();
	
?>

<html>
<head>
</head>
<body>
<h1>Sublime</h1>
</body>
</html>

<?php
if(!isset($_SESSION['username'])||($_SESSION['username'] == NULL )|| ($_SESSION['username']== "failed")){include_once "registerUser.php";} 
	include_once "LoginForm.php";
	include_once "findRestaurantBar.php";
?>