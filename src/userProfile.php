<!DOCTYPE html>
<?php
	session_start();
	include_once("loginScreen.php");
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
 </head>
 <body>
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL) { ?>
	<form action="changePassword.php" method="post">
		<p class="UserName">Email</p>
		<p><?= $result[0]['email'] ?> </p>
		<p class="PassDisplay">Password </p>
		<p class="PassDisplay">********</p>
		<input  type="submit" name= "Action" value= "Change Password ">
	</form>	
	<form action="changeName.php" method="post">	
		<p class="RestaurantDescription">Name</p>
		<p><?= $result[0]['first_name'] ?> <?= $result[0]['last_name'] ?></p>
		<input  type="submit" name= "Action" value= "Change">
	</form>
	<form action="addRestaurant.php" method="post">	
		<p> Click here to add a new restaurant!</p>
		<input  type="submit" name= "Action" value= "Add new Restaurant">
	</form>
	<?php include_once("allMyRestaurants.php");}else{ ?>
	<p> Please login </p>
	<?php } ?>
</body>
</html>


