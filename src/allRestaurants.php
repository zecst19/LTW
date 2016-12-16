<?php
	session_start();
	$db = new PDO('sqlite:Tables.db');
	if(!isset($_SESSION['username']) && ($_SESSION['username'] == NULL)){
		$_SESSION['nousername'] = TRUE; 
	}
	$username = $_SESSION['username'];
	$stmtuser = $db->prepare('SELECT * FROM user WHERE email = ?');
	$stmtuser->execute(array($username));
	$result= $stmtuser->fetchAll();
	$user_id = $result[0]['id_user'];
	//var_dump($user_id);
	
	$stmt = $db->prepare('SELECT * FROM restaurant WHERE id_user = ?');
	$stmt->execute(array($user_id));
	$result= $stmt->fetchAll();
	
	
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
	<style>
	body{
		background: #111;
		margin: 0px;
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

	#restaurantName{
		/*
		border: 5px solid #1F497D;
		background: #ddd;
		border-radius: 5px;
		padding: 30px;*/
		margin-left: 8%;
		margin-right: 80%;
		margin-bottom: 0.3%;
		background: #e5e5e5;
		color: #000;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 5px;
		text-align: center;
		overflow: hidden;
		white-space: nowrap;
		transform: translate(100%,0);
		
	}

	.restaurantPhoto{
		
		border: 5px solid #cb202d;
		background: #e5e5e5;
		border-radius: 5px;
		width: 16%;
		padding: 10px;
		transform: translate(100%,0);
	}

	button{
		margin-left: 12%;
		margin-right: 80%;
		margin-bottom: 10px;
		background: #cb202d;
		color: #fff;
		font-size: 32px;
		border-radius: 5px;
		font: bold 15px MyCroissant;
		padding: 0px 5px 5px;
		transform: translate(230%,0);
		
	}

	</style>
 </head>
 <body>
	<form action="restaurantPage.php" method="post">

	<?php if(!isset($_SESSION['nousername'])){ foreach( $result as $row) { ?>
		<!-- <p class="RestaurantName">Restaurant Name</p> -->
		<div id=restaurant>
		<p id="restaurantName"><?= $row['name'] ?> </p>
		<p class="restaurantPhoto"><img src="../resources/<?= $row['photo'] ?>" alt="Photo" style="width:300px;height:250px;"></p>
		<button  type="submit" name= "restId" value= "<?= $row['id_restaurant'] ?>">View Info</button>
		<div>
		<?php } }?>
	
	</form>
 </body>
</html>