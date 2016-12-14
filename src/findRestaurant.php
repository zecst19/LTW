<!DOCTYPE html>
<?php
	session_start();
	include_once("loginScreen.php");
	$db = new PDO('sqlite:Tables.db');
	$variable = $_POST['variable'];
	//$variable1 = 7;
	//$variable = "7";
	
	$stmtName = $db->prepare('SELECT * FROM restaurant WHERE name = ?');
	
	$stmtRate = $db->prepare('SELECT * FROM restaurant WHERE rate = ?');
	$stmtRate->execute(array($variable));
	$stmtDesc = $db->prepare('SELECT * FROM restaurant WHERE description = ?');
	$stmtDesc->execute(array($variable));
	
	
	$stmtName->execute(array($variable));
	if(($result = $stmtName->fetchAll()) != FALSE){
		var_dump("1");
		
		//$result = $stmtName->fetchAll();
	}
	else if(($result = $stmtRate->fetchAll()) != FALSE){
		var_dump("2");
		//$result = $stmtRate->fetchAll();
	}
	else if(($result = $stmtDesc->fetchAll()) != FALSE){
		//$result = $stmtDesc->fetchAll();
	}
	else{
		$_SESSION['failed'] = TRUE;
	}
	
?>
<html>
 <head>
    <title>FindRestaurant</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="restaurantPage.php" method="post">
	<?php if(isset($_SESSION['failed'])) { ?>
		<p> AI O Q </p>
	<?php $_SESSION['failed'] = NULL; ?>
	<?php } ?>
	<?php  foreach( $result as $row) {?>
		<p class="RestaurantName">Restaurant Name</p>
		<p><?= $row['name'] ?> </p>
		<button  type="submit" name= "restId" value= "<?= $row['id_restaurant'] ?>">Restaurant Page</button>
	<?php } ?>
		
	</form>
 </body>
 
