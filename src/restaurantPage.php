<!DOCTYPE html>
<?php
	session_start();
	include_once("header.php");
	//TODO tirar o comentario se necessário
	//session_start();
	
	$db = new PDO('sqlite:Tables.db');
	$restId = htmlspecialchars($_POST['restId']);
	if(isset($restId) && $restId!= NULL){
		$_SESSION['id'] = $restId;
	}
	//var_dump($restId);
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
    <title>restaurantPage</title>
	<link rel='stylesheet' type='text/css' href='restaurantPage.css'>
	<style>

	body{
		background-color:  #111;
		font-family: MyCroissant;
		margin:0;
		color: #cb202d;
	}
	
	.RestaurantName{	
		font: bold 50px MyCroissant;
		padding-left: 50px;
	}

	.RestaurantPhoto{	
		border: solid #cb202d;
		border-radius: 5px;
		width: 500px;
		height: 320px;
	}

	#RestaurantInfo{
		border: solid #cb202d;
		border-radius: 5px;
		margin-left: 8%;
		margin-right: 50%;
		padding: 0px 30px 15px 15px;
		background: #e5e5e5;
		transform: translate(0,10%);
	}

	.RestaurantDescription, .RestaurantAddress, .RestaurantRating{
		text-align: right; 
		font-size: 17px;
		padding-top: 15px;
	}

	#Reviews{
		border: solid #cb202d;
		border-radius: 5px;
		margin-top: 30px;
		margin-bottom: 30px;
		margin-left: 8%;
		margin-right: 8%;
		padding: 0px 30px 15px 15px;
		background: #e5e5e5;
		transform: translate(0,-70%);
	}

	button{
		margin-left: 3%;
		margin-right: 80%;
		margin-bottom: 10px;
		background: #cb202d;
		color: #fff;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 0px 5px 5px;
		overflow: hidden;
		white-space: nowrap;	
	}

	#review{
		border: double #cb202d;
		border-radius: 5px;
		margin-top: 30px;
		padding: 0px 30px 15px 15px;
		background: #e5e5e5;
	}

	#AddReview{
		margin-top: 20px;
	}

	.Reviews{
		font-size: 20px;
	}

	#RestaurantMap{	
		border: solid #cb202d;
		border-radius: 5px;
		width: 600px;
		height: 600px;
		transform: translate(170%,-100%);
	}
	
	</style>
    <meta charset="utf-8">
 </head>
 <body>
	<div id=RestaurantInfo>
		<p class="RestaurantName"><?= $result2[0]['name'] ?> </p>
		<p class="RestaurantPhoto"><img src="../resources/<?= $result2[0]['photo'] ?>" alt="Photo" style="width:500px;height:320px;"></p>
		<p class="RestaurantDescription"><?= $result2[0]['description'] ?> </p>
		<p class="RestaurantAddress"><?= $result2[0]['address'] ?> </p>
		<p class="RestaurantRating"><?= $result2[0]['rate'] ?> / 10 </p>
	</div>
	<div id=RestaurantMap>
		<iframe width="600" height="600" frameborder="0" style="border:0" 
		src="https://www.google.com/maps/embed/v1/place?q=<?= $result2[0]['name'] ?><?= $result2[0]['address'] ?>&key=AIzaSyDt5yy_q9VV-zcyR-kKeXEo9sTybPcmPig" allowfullscreen>
		</iframe>
	</div>
	<div id=Reviews>
	<form action="deleteReview.php" method="post">
		<p class="Reviews">Reviews</p>
		<div id=review>
		<?php if(isset($_SESSION['reviewed']) && $_SESSION['reviewed'] != NULL ){$_SESSION['reviewed'] = NULL; foreach( $result as $row) {?>
		<p><?= $row['commment'] ?> </p>
		<p><?= $row['rate'] ?> / 10 </p>
		<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){ if($userid == $row['id_user'] ){ ?>
		<button type="submit" name= "reviewId" value= "<?= $row['id_review'] ?>">Delete</button>
		<?php }}}} ?>	
	</form>
	</div>

	<div id=AddReview>
	<form action="addReview.php" method="post">
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){?>
		<label for="review">Review:</label>
		<textarea rows="4" cols="50" name="review">
		</textarea>
		<p> </p>
		<label for="rate">Rate:</label>
		<input type="number" name="rating" value="0" min="0" max="10" step="1">
		<p> </p>
		<button  type="submit" name= "restId" value= "<?= $result2[0]['id_restaurant'] ?>">Send</button>
	<?php } ?>
		</form>
		<form action="changeRestaurant.php" method="post">
	<?php if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){ if($userid == $result2[0]['id_user'] ){ ?>
		<button  type="submit" name= "restId" value= "<?= $result2[0]['id_restaurant'] ?>">Change Restaurant Parameters</button>
	<?php }}?>
	</div>
		</div>
	</form>
 </body>
</html>