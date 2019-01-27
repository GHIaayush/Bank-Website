
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bank</title>
<link href="styles.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="container">
	
		<div class = "bankLogo">
			Online Banking
		</div>	
		
	
		
		<div class="interactonBtnBar">
			
			<ul class="button bar">
				
				<li class="homeStyle"><a href="index.php">Home</a></li>
				<li><a href="contactus.HTML" class="scroll">Contact</a></li>
				<li><a href="Register.php" class="scroll">Register</a></li>
				<li><a href="Login.php" class="scroll">Login</a></li>
				
			</ul>
		</div>
		 
		<div class = "homeInfo">
<!-- 			<img src = "images/familyImage2.jpg" alt = "famPic"> -->
			<h2> Start Saving, Get the checking or saving account that works for you.</h2>
			<span><b>Bank of Online Checking®</b> and <b>Bank of Online Saving®</b><br></span>
			<span>Have controle over you money</span>
			<br>
			<br>
			<div onclick="location.href='Register.php';" id = "getStartedBtn"><span id = "gt">Get Started</span></div>
		</div>

		
		<div class = "aboutUsDiv">
		

			<p><span id = "aboutUs">About US</span></p>
			<img src="images/11.jpg" id = "vaultImg"  alt="Vault"><br>
			<span id= "info1">Your money is safe with us
			Deposit your money with us. Deposit in checking so you gonna save your money. Deposit in checking so
			that you can withdraw the money from whenever you want to. Schedule an appointment with one of our specialist
			for more banking options</span>
			
			
			<div class = "aboutUsDiv-index">
			
			<p><span id = "aboutUs-index1">Contact Us&nbsp;</span></p>
				<div class = "aboutUsDiv-index1">
						
					<div class="w3l-cont-mk">
						<img src="images/savings.jpg">
					</div>
					<span id= "info2"> 
					<h2> Contact Info</h2></span>
					<div id = "contact1">
						<p class="fa fa-home" id = "hom">Visit Us</p>
							<p id = "ad">Bank St 1213 Online Rd<p>
						<p class="fa fa-envelope" id = "mailUs">Mail Us</p>
							<p id = "ema">email@example.com<p>
						<p class="fa fa-phone" id = "callUs">Call Us</p>
							<p id = "num">+977 14468944<p>
					</div>
					
			</div>
				<div class = "aboutUsDiv-index1-1">
					<form>

						<p>Get In Touch</p>
					<input type="text" name="register_user" placeholder="Name" required><br>
  
  					<input type="email" name="email" placeholder="example@email.com"><br>
  			
  						<input type="tel" name ="number"placeholder="Phone number" ><br>
  						<textarea name="description" cols="40" rows="5" placeholder="description"></textarea>
					<br><br>
						<input type="submit">
	
					</form>	
				</div>
		
			</div>
		</div>
	</div>
	
	

	



</body>
</html>
