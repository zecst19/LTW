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
	$stmt2 = $db->prepare(' SELECT * FROM restaurant WHERE id_restaurant = ?');
	$stmt2->execute(array($currId));
	
	if(($result = $stmt->fetchAll()) != FALSE){
		$_SESSION['reviewed'] = TRUE;
	}
	else if(($result = $stmt2->fetchAll()) != FALSE){
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
		<?php if(isset($_SESSION['reviewed']) && $_SESSION['reviewed'] != NULL ){$_SESSION['reviewed'] = NULL;foreach( $result as $row) {?>
		<p><?= $row['commment'] ?> </p>
		<p><?= $row['rate'] ?> / 10 </p>
		<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){ if($userid == $row['id_user'] ){ ?>
		<button type="submit" name= "reviewId" value= "<?= $row['id_review'] ?>">Delete</button>
		<?php }}}} ?>
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
	<?php //for testing purposes ?>
	<form action="addRestaurant.php" method="post">
		<input  type="submit" name= "Reg" value= "Reg">
	</form>
	<form action="userProfile.php" method="post">
		<input  type="submit" name= "Profile" value= "Reg">
	</form>
	<form action="allMyRestaurants.php" method="post">
		<input  type="submit" name= "Profile" value= "Change">
	</form>
	<form action="restaurantPage.php" method="post">
		<button  type="submit" name= "id" value= "<?= $result[0]['id_restaurant'] ?>">See Page</button>
	</form>
	
 </body>
 </html>
 