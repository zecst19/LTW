<!DOCTYPE html>
<?php
	session_start();
	include_once("loginScreen.php");
	//TODO tirar o comentario se necessário
	//session_start();
	
	$db = new PDO('sqlite:Tables.db');
	if(isset($_POST['restId']) && $_POST['restId']!= NULL){
		$_SESSION['id'] = $_POST['restId'];
	}
	//var_dump($_POST['restId']);
	$currId = strval($_SESSION['id']);
	
	
	$stmt = $db->prepare(' SELECT * FROM restaurant a, review b WHERE a.id_restaurant = b.id_restaurant AND a.id_restaurant = ?');
	$stmt->execute(array($currId));
	$stmt2 = $db->prepare(' SELECT * FROM restaurant WHERE id_restaurant = ?');
	$stmt2->execute(array($currId));
	
	if(($result = $stmt->fetchAll()) != FALSE){
		$_SESSION['reviewed'] = TRUE;
	}
	else{
		$_SESSION['reviewed'] = NULL;
	}
	
	$result2 = $stmt2->fetchAll();
	//Utilizando o $result o user_id de cada elemnto do array é o id_user do comentário e não do owner, para obter esse utilizar $result2
	//Obter username do actualmente logged in;
	
	if(isset($_SESSION['username']) && $_SESSION['username']!= NULL){
		$stmt3 = $db->prepare(' SELECT * FROM user WHERE email = ?');
		$stmt3->execute(array($_SESSION['username']));
		$result3 = $stmt3->fetchAll();
		$userid = $result3[0]['id_user'];
	}
	
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
 </head>
 <body>
	<p class="RestaurantName">Name</p>
	<p><?= $result2[0]['name'] ?> </p>
	<p class="RestaurantDescription">Description</p>
	<p><?= $result2[0]['description'] ?> </p>
	<p class="RestaurantAdress">Adress</p>
	<p><?= $result2[0]['address'] ?> </p>
	<p class="RestaurantRating">Rating</p>
	<p><?= $result2[0]['rate'] ?> </p>
	<form action="deleteReview.php" method="post">
		<p class="Reviews">Reviews</p>
		<?php if(isset($_SESSION['reviewed']) && $_SESSION['reviewed'] != NULL ){$_SESSION['reviewed'] = NULL; foreach( $result as $row) {?>
		<p><?= $row['commment'] ?> </p>
		<p><?= $row['rate'] ?> / 10 </p>
		<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){ if($userid == $row['id_user'] ){ ?>
		<button type="submit" name= "reviewId" value= "<?= $row['id_review'] ?>">Delete</button>
		<?php }}}} ?>
	</form>
	<form action="addReview.php" method="post">
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){?>
		<label for="review">Review:</label>
		<textarea rows="4" cols="50" name="review">
		</textarea>
		<p> </p>
		<label for="rate">Rate:</label>
		<input type="number" name="rating" value="0" min="0" max="10" step="1">
		<p> </p>
		<button  type="submit" name= "restId" value= "<?= $result[0]['id_restaurant'] ?>">Send</button>
	<?php } ?>
		</form>
		<form action="changeRestaurant.php" method="post">
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){ if($userid == $result2[0]['id_user'] ){ ?>
		<button  type="submit" name= "restId" value= "<?= $result2[0]['id_restaurant'] ?>">Change Restaurant Parameters</button>
	<?php }}?>
	
		
	</form>
 </body>
</html>