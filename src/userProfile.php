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
	<style>
	button.accordion {
		background-color: #e5e5e5;
		color: #000;
		cursor: pointer;
		padding: 18px;
		border: 10px;
		width: 50%;
		text-align: left;
		outline: none;
		font-family:MyCroissant;
		font-size: 15px;
		transition: 0.4s;
		border-radius: 5px;
		margin-left: 3%;
		margin-right: 80%;
		margin-top: 10px;
	}

	button.accordion.active, button.accordion:hover {
		background-color: #cb202d;
	}

	div.panel {
		padding: 0 18px;
		background-color: #111;
		max-height: 0;
		overflow: hidden;
		transition: 0.6s ease-in-out;
		opacity: 0;
	}

	div.panel.show {
		opacity: 1;
		max-height: 500px;  
	}

	body{
		background: #111;
		margin: 0px;
		/*background-image: url("../resources/eder.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: fixed;*/
	}

	@font-face {
	  font-family: MyCroissant;
	  src: url("../fonts/CroissantOne-Regular.ttf");
	  font-weight: bold;
	}

	h1{
		font-family: MyCroissant;
		text-align: left;
		margin-top:0px;
		padding-top: 60px;
		padding-bottom: 60px;
		padding-left: 60px;
		background-color: #cb202d;

	}

	a{
		color: inherit;
	}

	p{
		
		margin-left: 3%;
		margin-right: 80%;
		margin-bottom: 0.3%;
		background: #fff;
		color: #000;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 1%;
		overflow: hidden;
		white-space: nowrap;
		
	}

	#clickToAdd{
		margin-left: 17%;
		margin-right: 65%;
		margin-bottom: 0.3%;
		background: #e5e5e5;
		color: #000;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 7px;
		text-align: center;
		overflow: hidden;
		white-space: nowrap;
	}

	input{
		margin-left: 3%;
		margin-right: 80%;
		margin-bottom: 10px;
		margin-top: 5px;
		background: #cb202d;
		color: #fff;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 0px 5px 5px;
		
	}

	#addNewRestaurant {
		margin-left: 20%;
		margin-right: 60%;
		margin-bottom: 10px;
		background: #cb202d;
		color: #fff;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 0px 5px 5px;

	}

	</style>
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
		<input id="addNewRestaurant" type="submit" name= "Action" value= "Add new Restaurant">
	</form>
	<?php include_once("allMyRestaurants.php");}else{ ?>
	<p> Please login </p>
	<?php } ?>
</body>
</html>


