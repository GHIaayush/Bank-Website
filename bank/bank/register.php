
<html>
<head>
<title></title>
</head>
<link href="styles.css" type="text/css" rel="stylesheet" />

<body id="main1">
<div class = "register-box">
<h3 id="registerh1">Register</h3>

<form method="post">

	<p>User Name</p>
	<input type="text" name="register_user" placeholder="User Name"  id = "sd" required>
    
	<p>Password</p>
	<input type="password" name="register_pw" placeholder="Password" required>
  	<p>Email address</p>
  	<input type="email" name="email" placeholder="example@email.com">
  	<p>Phone number</p>
  	<input type="tel" name ="number"placeholder="xxx-xxxx-xxxx" pattern = "^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" required title='xxx-xxx-xxxx' ><br>
  	<p>Date of birth</p>
  	<input type="date" name ="date" value="date" min="01-01-1940" max="04-28-2018">
	<input type="submit"  name="Register" value="Register">
	
</form>	
</div>
 
<?php


session_start ();

require_once 'model.php';
$myDBA = new DatabaseAdaptor();
//echo "heelooo";
$divStyle='style="display:none;"'; //hide div

if(isset($_POST['Register'])){
    
    $user = $_POST['register_user'];
    
    $pass = $_POST['register_pw'];
    
    $email = $_POST['email'];
    
    $tel = $_POST['number'];
    
    $date = $_POST['date'];
    
     
 //   echo "heeloooss";
//     if(strlen($user) < 4){
//         die("Username must be at least 4 characters.");
//     }
    
//     if(strlen($pass) < 6){
//         die("Password must be at least 6 characters.");
    
//     }
    
     

    $passhash = password_hash($pass, PASSWORD_DEFAULT);
  
   
    if ($myDBA->findDuplicate($user) == false){
        //$hidemydiv = "hide";
        $myDBA->register($user,  $passhash, $email,$date,$tel);
        $divStyle='style="display:none;"'; //hide div
        header("Location: login.php");
       
    } else{
        $divStyle=''; // show div
    }
    echo'<div id = userNameTaken '.$divStyle.'>User name already taken!</div>';
    

}

?>

</body>



</html>