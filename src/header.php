<?php
	//session_start();
	
?>

<html>
<head>
<style>


@keyframes showHeader {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(0);
  }
}

@keyframes hideHeader {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(-100%);
  }
}

@keyframes dropHeader {
  0% {
    transform: translateY(-600%);
  }
  100% {
    transform: translateY(0);
  }
}

.loginUrl2 {
    padding: 0 18px;
    background-color: white;
    max-height: 500px;
    overflow: hidden;
	
	
	animation-name: showHeader;
	animation-iteration-count: 1;
	animation-timing-function: ease-out;
	animation-duration: 0.6s;
	animation-direction: alternate;
}

.loginUrl3 {
    background-color: white;
    overflow: hidden;
    opacity: 1;
	animation-name: dropHeader;
	animation-iteration-count: 1;
	animation-timing-function: ease-out;
	animation-duration: 0.5s;
}


</style>
</head>
<body>
<h1><a href="./HomePage.php"  style="text-decoration:none">Sublime</a></h1>
<h4><a class="loginUrl"  onclick="loadDoc()"  style="text-decoration:none">Login/Register</a></h4>
<h4><a class="loginUrl2" id="loginUrl2" style="text-decoration:none;display:none">Can't see this</a></h4>
<h4><a class="loginUrl3"  onclick="loadDoc2()" style="text-decoration:none;display:none">Close login</a></h4>
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
      document.getElementsByClassName("loginUrl")[0].style.display = 'none';
	  document.getElementsByClassName("loginUrl2")[0].innerHTML = this.responseText;
	  document.getElementsByClassName("loginUrl2")[0].style.display = 'block';
	  document.getElementsByClassName("loginUrl3")[0].style.display = 'block';
	 
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
      document.getElementsByClassName("loginUrl2")[0].style.display = 'none';
	  document.getElementsByClassName("loginUrl")[0].style.display = 'block';
	  document.getElementsByClassName("loginUrl3")[0].style.display = 'none';
	 
    }
  };
  xhttp.open("GET", "loginScreen.php", true);
  xhttp.send();
}
</script>

</body>
</html>