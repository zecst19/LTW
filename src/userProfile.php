<!DOCTYPE html>
<?php
	session_start();
	include_once("header.php");
	//TODO tirar o comentario se necessário
	//session_start();
	
	$db = new PDO('sqlite:Tables.db');
	
	if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
	$username = $_SESSION['username'];
	
	$stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
    $stmt->execute(array($username));
	
	$result = $stmt->fetchAll();}
	//TODO Procurar restuarantes de q e dono
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='userProfile.css'>
	<script type="text/javascript" src="userProfile.js" defer></script>
 </head>
 <body>
	<?php
	/*<div id="parent">
	This is the main container.
	<div id="popup" style="display: none">some text here</div>
	</div>*/ ?>
	

	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL) { ?>
	<form action="changePassword.php" method="post">
		<button class="accordion" type="button" >Email</button>
		<div class="panel">
		<p><?= $result[0]['email'] ?> </p>
		</div>
		<button class="accordion" type="button">Password </button>
		<div class="panel">
		<p class="PassDisplay">********</p>
		<input  type="submit" name= "Action" value= "Change Password " onClick = "function()">
		</div>
	</form>	
	<form action="changeName.php" method="post">	
		<button class="accordion" type="button">Name</button>
		<div class="panel">
		<p><?= $result[0]['first_name'] ?> <?= $result[0]['last_name'] ?></p>
		<input  type="submit" name= "Action" value= "Change">
		</div >
	</form>
	<form action="addRestaurant.php" method="post">	
		<p id="clickToAdd"> Click here to add a new restaurant!</p>
		<input id="addNewRestaurant" type="submit" name= "Action" value= "Add new Restaurant">
	</form>
	<?php include_once("allMyRestaurants.php");}else{ ?>
	<p> Please login </p>
	<?php } ?>
</body>
</html>


