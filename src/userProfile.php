<!DOCTYPE html>
<?php
	include_once("LoginForm.php");
	//TODO tirar o comentario se necessário
	//session_start();
	
	$db = new PDO('sqlite:Tables.db');
	
	$username = $_SESSION['username'];
	
	$stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
    $stmt->execute(array($username));

	$result = $stmt->fetchAll();
	//TODO Procurar restuarantes de q e dono
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="changePassword.php" method="post">
		<p class="UserName">Email</p>
		<p><?= $result[0]['email'] ?> </p>
		<input  type="submit" name= "Action" value= "Change Password ">
	</form>	
	<form action="changeName.php" method="post">	
		<p class="RestaurantDescription">Name</p>
		<p><?= $result[0]['first_name'] ?> <?= $result[0]['last_name'] ?></p>
		<input  type="submit" name= "Action" value= "Change">
	</form>
</body>
</html>


