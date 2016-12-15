<!doctype html>

<html>
<<<<<<< HEAD
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?php echo $PageTitle; ?></title>
	<link rel='stylesheet' type='text/css' href='header.css'>

  </head>
  <body>
	<h1>
	<a href="./HomePage.php"><img src="../resources/logo/LogoBlack.png" alt="Sublime Logo" width="300" height="200"/></a>
	<a href="./loginScreen.php"  style="text-decoration:none">Login/Register</a>
	</h1>
	</body>
=======
<head>
<style>
@keyframes dropHeader {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}

#loginUrl2 {
    padding: 0 18px;
    background-color: white;
    max-height: 500px;
    overflow: hidden;
    
    opacity: 1;
	animation-name: dropHeader;
	animation-iteration-count: 1;
	animation-timing-function: ease-out;
	animation-duration: 0.6s;
}


</style>
</head>
<body>
<h1><a href="./HomePage.php"  style="text-decoration:none">Sublime</a></h1>
<h4><a id="loginUrl"  onclick="loadDoc()"  style="text-decoration:none">Login/Register</a></h4>
<h4><a id="loginUrl2"  style="text-decoration:none;display:none">Can't see this</a></h4>
<h4><a id="loginUrl3" onclick="loadDoc2()" style="text-decoration:none;display:none">Close login</a></h4>
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
      document.getElementById("loginUrl").style.display = 'none';
	  document.getElementById("loginUrl2").innerHTML = this.responseText;
	  document.getElementById("loginUrl2").style.display = 'block';
	  document.getElementById("loginUrl3").style.display = 'block';
	 
    }
  };
  xhttp.open("POST", "loginScreen.php", true);
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
      document.getElementById("loginUrl2").style.display = 'none';
	  document.getElementById("loginUrl").style.display = 'block';
	  document.getElementById("loginUrl3").style.display = 'none';
	 
    }
  };
  xhttp.open("GET", "loginForm.php", true);
  xhttp.send();
}
</script>

</body>
>>>>>>> origin/master
</html>