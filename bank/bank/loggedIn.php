<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Logged In</title>
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
	


<div class="welcome-section content-hidden">
	<div class = "content-wrap">
		<ul class = "fly-in-text">
			<li>E</li>
			<li>M</li>
			<li>O</li>
			<li>C</li> 
			<li>L</li> 
			<li>E</li>
			<li>W</li>	
			
		</ul>
	
					
<!-- 		<a href="index.php" class="enter-button1">Home</a> -->
				<a href="withdraw.php" class="enter-button1">Withdraw</a>
				<a href="savingDeposit.php" class="enter-button1" id="hs">Deposit in Saving</a>
				<a href="checkingDeposit.php" class="enter-button1">Deposit in Checking</a>
				<a href="schedule.php" class="enter-button1">Schedule</a>
				<a href="index.php" class="enter-button1">Logout</a>
				
 		
	</div>
</div>	

<!-- <img src="images/saving.jpg" id = "savingImg"  alt="SavingImg"> -->


	<div class = "bankLogo">
			Online Banking
		</div>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		var welcomeSection = $('.welcome-section'),enter = welcomeSection.find('enter-button1');
		setTimeout(function(){
			welcomeSection.removeClass('content-hidden');
		
		},600);
	})();
</script>


<?php 
require_once 'model.php';
session_start ();
$theDBA  =  new DatabaseAdaptor();

 if(isset($_SESSION['loggedInUser'])){
     $user = $_SESSION['loggedInUser'];
     $cBalance = $theDBA->getCheckingBalance($user)[0]['money'];
     $sBalance = $theDBA->getSavingBalance($user)[0]['money'];
     echo "<div class = 'loggedInScreen'><span id = 'userLoggedIn'>".$_SESSION['loggedInUser']."&nbsp;&nbsp;
     Checking : ".$cBalance."&nbsp;&nbsp; Saving : ".$sBalance."</span></div>";
 }


?>


</body>
</html>
