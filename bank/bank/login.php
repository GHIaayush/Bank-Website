
<html>
<head>
<title></title>
</head>
<link href="styles.css" type="text/css" rel="stylesheet" />

<body id="main" >
<div class ="login-box">
<h3 id= "loginh1">Login</h3>
<img src="images/avatar.png" class="login">

<form method="post" action = "controller.php">


	<p>Username</p> 
	<input type="text" name="username" placeholder="User Name" required>
    
	<p>Password </p>
	<input type="password" name="password" placeholder="Password" required>
    
    <input type="submit"  name="login" value="login">
    <a href = "forget.php">Forgot Password</a>
   
	


</form>

</div>
<div class= "additional">
<h4>Login to your account</h4>
<h6>24/7 access to your account</h6>
<p>Check your balance, deposit money in saving or checking, withdraw money</p>
<p>First time visitor? Click on the picture to register </p>
</div>
<div class = "new" >
<a href= "register.php">REGISTER</a>
</div>


</body>
<?php
session_start ();
if(isset($_SESSION['loginError']))
    echo "<div class = 'loginErrorDiv'".$_SESSION['loginError'].'>Invalid Credential</div>';
unset($_SESSION['loginError']);
?>
<br>

