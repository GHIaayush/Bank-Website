
<html>
<head>
<title></title>
</head>
<link href="withdraw.css" type="text/css" rel="stylesheet" />

<body id="main4">
<div class = "register-box">
<h3 id="registerh1">Deposit in Checking</h3>
<br>
<form method="post">

	<p>User Name</p>
	<input type="text" name="register_user" placeholder="User Name" required>
    <p>Amount</p>
    <input type="number" step="0.01"name="money" placeholder="Amount" min ="1" max ="2000" required>
    <p> You can only deposit $2000 per transaction </p>
    <br>
    <br>
    <br>
	<input type="submit"  name="cDeposit" value="Deposit">
	
	
</form>	
</div>

<?php
session_start ();
require_once 'model.php';
$myDBA = new DatabaseAdaptor();
if(isset($_POST['cDeposit'])){
    $user = $_POST['register_user'];
    $amount = $_POST['money'];
    echo "heheheheheh ";
//    if (! $myDBA->findDuplicate($user)){
        $myDBA->depositInChecking($amount,$user);
        header("Location: loggedIn.php");
  //  } else {
    //    echo "<div class=register-box><p>The username is incorrect please reload the page again to continue.</p></div>";
        
    //}
}
?>
</body>
</html>

