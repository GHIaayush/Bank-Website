
<html>
<head>
<title></title>
</head>
<link href="withdraw.css" type="text/css" rel="stylesheet" />


<body id="main3">
<div class = "register-box">
<h3 id="registerh1">Withdraw</h3>
<h6>Complete your withdrawal process from here and get your money from the ATM nearby</h6>
<form method="post">

	<p>User Name</p>
	<input type="text" name="register_user" placeholder="User Name" required>
    <p>Amount</p>
    <input type="number" step="0.01"name="money" placeholder="Amount" min ="10" max ="2000" required>
    <p> You can only withdraw minimum of $10 and maximum of $2000 per transaction </p>
    <br><br><br><br>
	<input type="submit"  name="Withdraw" value="Withdraw">
	
</form>	
</div>

<?php
session_start ();
require_once 'model.php';
$myDBA = new DatabaseAdaptor();
if(isset($_POST['Withdraw'])){
$user = $_POST['register_user'];
$amount = $_POST['money'];



if($myDBA -> canWithDraw($user,$amount)){
    $myDBA->withdraw($user, $amount);
   
    header("Location: loggedIn.php");
} else {	
    echo "<div class=register-box><p>The amount you entered is more than the amount you have in you account.Please try it agin</p></div>";
  
}
}

?>
</body>
</html>

