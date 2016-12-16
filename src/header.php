<!doctype html>
<?php
	$_SESSION['toggler'] = TRUE;

?>
<html>
  <head>
    <title><?php echo $PageTitle; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel='stylesheet' type='text/css' href='header.css'>
	<link rel='stylesheet' type='text/css' href='footer.css'>
	<style>

.loginUrl2 {
    padding: 0 18px;
    background-color: white;
    max-height: 0px;
    overflow: hidden;
	transition: ease-out 1.6s;
}

.loginUrl2.trans {
	
	max-height: 500px;
	transition: ease-out 1.6s;
}


</style>
  </head>
  <body>
<header id="header">
	<div class="container">
	<div>
	<a href="./mainpage.php"><img src="../resources/logo/LogoBlack.png" alt="Sublime Logo" width="200" height="100"/></a>
	</div>
	<form>
	<input class="button" type="button" value="LogIn/ Register"  onclick="loadDoc()"/>
	</form>
	</div>
</header>
<h4><a class="loginUrl2" id="loginUrl2" style="text-decoration:none;display:block">Can't see this</a></h4>
<script>

	

function loadDoc() {
	
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
	  document.getElementsByClassName("loginUrl2")[0].innerHTML = this.responseText;
	  document.getElementsByClassName("loginUrl2")[0].style.display = 'block';
	  document.getElementsByClassName("loginUrl2")[0].classList.add('trans');
	  document.getElementsByClassName("button")[0].setAttribute( "onClick", "javascript: loadDoc2();" );
	 
    }
  };
  
  xhttp.open("GET", "loginScreen.php", true);
  xhttp.send();
}
function loadDoc2() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementsByClassName("loginUrl2")[0].style.display = 'none';
	   document.getElementsByClassName("loginUrl2")[0].classList.remove('trans');
	  document.getElementsByClassName("button")[0].setAttribute( "onClick", "javascript: loadDoc3();" );
	  
	 
    }
  };
  xhttp.open("GET", "loginScreen.php", true);
  xhttp.send();
}

function loadDoc3() {
	document.getElementsByClassName("loginUrl2")[0].classList.add('trans');
	  document.getElementsByClassName("button")[0].setAttribute( "onClick", "javascript: loadDoc2();" );
}
</script>

</body>
</html>