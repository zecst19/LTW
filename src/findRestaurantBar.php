<!DOCTYPE html>
<?php
	//session_start();
	
?>
<style> 
input[type=search] {
    width: 130px;
	height: 30px;
    box-sizing: border-box;
    border: 2px solid #111;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 5px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
	transform: translate(0, 90%);
	text-align: left;
}

input[type=search]:focus {
    width: 80%;
}

input{
	margin-left: 3%;
	margin-right: 80%;
	margin-bottom: 10px;
    background: #cb202d;
    color: #111;
    font-size: 32px;
	border-color: #111;
    border-radius: 5px;
	font: bold 15px MyCroissant;
	padding: 5px 5px 5px;
	transform: translate(0, 60%);
}
</style>

	<form action="findRestaurant.php" method="post">
		<input type="search" name="variable" placeholder= &#128269;>
		<input type="submit" name= "Action" value= "Search">
	</form>
 
