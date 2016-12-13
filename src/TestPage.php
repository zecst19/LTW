<!DOCTYPE html>

<html>
 <head>
	<title>LoginForm</title>
    <meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='TestPage.css'>
 </head>
 <body background="../resources/eder.jpg">
 <p> Google Maps API:</p>
 <iframe width="400" height="400" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=Yuko&key=AIzaSyDt5yy_q9VV-zcyR-kKeXEo9sTybPcmPig" allowfullscreen>
</iframe>
<p> Insert link :</p>
<form>
<input type="button" value="LogIn" onclick="window.location.href='LoginForm.php'" />
</form>
<p> Insert Image:</p>
<?php
echo ' 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<img src="../resources/photo1.jpg" width="500" height="300" title="Logo of a company" alt="Logo of a company" />

</html>
';
?>
<p>
An image that is a link:
<a href="http://www.pornhub.com">
<img src="../resources/clint.gif" alt="Go to W3Schools!" width="300" height="300" style="border:5px solid black;">
</a>
</p>
  </body>
 </html>