<!DOCTYPE html>
<?php
	include_once("LoginForm.php");
	//TODO tirar o comentario se necessário
	//session_start();
	
	$db = new PDO('sqlite:Tables.db');
	
	$stmtlength = $db->prepare('SELECT * FROM restaurant');
	$stmtlength->execute();
	$length = $stmtlength->fetchAll();
	$_SESSION['length'] = count($length);
	//var_dump($_SESSION['length']);
	
	if(!isset($_SESSION['id']) || $_SESSION['id'] == NULL || $_SESSION['id'] == 0) {
		$_SESSION['id'] = 1;
	}
	if(isset($_POST['Action'])){
	if($_POST['Action'] == 'Next' && $_SESSION['id'] <= $_SESSION['length']-1){
		$_SESSION['id']++;
	}
	else if($_POST['Action'] == 'Previous' && $_SESSION['id'] >= 2){
		$_SESSION['id']--;
	}}
	//var_dump($_SESSION['id']);
	//var_dump($_SESSION['id']);
	$currId = strval($_SESSION['id']);
	//var_dump($currId);
	
	/*$stmt = $db->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
	$stmt->execute(array($currId));
	$result = $stmt->fetchAll();
	
	$stmtreviews = $db->prepare("SELECT * FROM review WHERE id_restaurant = ?");
	$stmtreviews->execute(array($currId));
	//echo '..' . $currId . '..';
	$resultReviews = $stmtreviews->fetchAll();*/
	//var_dump($resultReviews);
	
	$stmt = $db->prepare(' SELECT * FROM restaurant a, review b WHERE a.id_restaurant = b.id_restaurant AND a.id_restaurant = ?');
	$stmt->execute(array($currId));
	
	
	/*if(!$stmt->fetch()){
		$stmt = $db->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
		$stmt->execute(array($currId));
	}*/
	$result = $stmt->fetchAll();
	//var_dump($result);
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="restaurantDisplay.php" method="post">
		<p class="RestaurantName">Name</p>
		<p><?= $result[0]['name'] ?> </p>
		<p class="RestaurantDescription">Description</p>
		<p><?= $result[0]['description'] ?> </p>
		<p class="RestaurantRating">Rating</p>
		<p><?= $result[0]['rate'] ?> </p>
		<input  type="submit" name= "Action" value= "Next">
		<input  type="submit" name= "Action" value= "Previous">
	</form>
	<form action="deleteReview.php" method="post">
		<p class="Reviews">Reviews</p>
		<?php  foreach( $result as $row) {?>
		<p><?= $row['commment'] ?> </p>
		<p><?= $row['rate'] ?> / 10 </p>
		<button type="submit" name= "reviewId" value= "<?= $row['id_review'] ?>">Delete</button>
		<?php } ?>
	</form>
	<form action="addReview.php" method="post">
		<label for="review">Review:</label>
		<textarea rows="4" cols="50" name="review">
		</textarea>
		<p> </p>
		<label for="rate">Rate:</label>
		<input type="number" name="rating" value="0" min="0" max="10" step="1">
		<p> </p>
		<button  type="submit" name= "restId" value= "<?= $result[0]['id_restaurant'] ?>">Send</button>
		
		
	</form>
	
 </body>
 </html>
 