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
	var_dump($user_id);
	
	$stmt = $db->prepare('SELECT * FROM restaurant WHERE id_user = ?');
	$stmt->execute(array($user_id));
	$result= $stmt->fetchAll();
	
	
	
?>
<html>
 <head>
    <title>restaurantDisplay</title>
    <meta charset="utf-8">
 </head>
 <body>
	<form action="restaurantPage.php" method="post">
	<?php if(!isset($_SESSION['nousername'])){ foreach( $result as $row) { ?>
		<p class="RestaurantName">Restaurant Name</p>
		<p><?= $row['name'] ?> </p>
		<button  type="submit" name= "restId" value= "<?= $row['id_restaurant'] ?>">Send</button>
		<?php } }?>
	</form>
 </body>
</html>