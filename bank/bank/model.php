 <?php
	
	class DatabaseAdaptor {
		
		private $DB;
		
		public function __construct() {
			$db = 'mysql:dbname=bank;host=127.0.0.1;charset=utf8';
			$user = 'root';
			$password = '';
			
			try {
				$this->DB = new PDO ( $db, $user, $password );
				$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $e ) {
				echo ('Error establishing Connection');
				exit ();
			}
		}
		//Deposits the money in the saving account
		public function depositInSaving($amount,$username){
		    $stmt = $this -> DB ->prepare( "UPDATE saving SET money = money + :money WHERE user_name = '". $username ."'" );
		    $stmt -> bindParam ('money', $amount);
		    $stmt -> execute ();
		}
		
		//Deposits the money in Checking account
		public function depositInChecking($amount,$username){
		    $stmt = $this -> DB ->prepare( "UPDATE checking SET money = money + :money WHERE user_name = '". $username ."'" );
		    $stmt -> bindParam ('money', $amount);
		    $stmt -> execute ();
		}
		
		//Withdraws the mone from checking account
		public function withdraw($username,$amount){
		    $stmt = $this -> DB ->prepare( "UPDATE checking SET money = money - :money WHERE user_name = '". $username ."'" );
		    $stmt -> bindParam ('money', $amount);
		    $stmt -> execute ();
		}
		

		//gets all the available time on the buisness hour
		public function getAvailableTime() {
		    $stmt = $this->DB->prepare ( "SELECT * FROM schedule WHERE flag='0'" );
		    $stmt->execute ();
		    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		
		// schedule an appointment
		public function scheduleAppt($time){
		    $stmt = $this->DB->prepare("Update schedule set flag = 1 where id = $time");
		    $stmt->execute ();
		}
		
		// schedule an appointment
		public function resetScheduleAppt(){
		    $stmt = $this->DB->prepare("Update schedule set flag = 0");
		    $stmt->execute ();
		}

		
		//register for the new user
		public function register($user,  $passhash, $email, $date,$tel){
			$stmt = $this->DB->prepare ( "INSERT INTO users(username, hash,email,dob,tel) values ( :username , :hash,:email,
                                           :dob,:tel)");
			
			
			$stmt->bindParam("username", $user);
			$stmt->bindParam ( 'hash', $passhash );
			$stmt->bindParam ( 'email', $email );
			$stmt->bindParam ( 'dob', $date );
			$stmt->bindParam ( 'tel', $tel );
			$stmt->execute();
			
			$stmt = $this->DB->prepare ( "INSERT INTO checking(user_name, money) values ( :user_name , 0)");
			$stmt->bindParam("user_name", $user);
			$stmt->execute();
			
			$stmt = $this->DB->prepare ( "INSERT INTO saving(user_name, money) values ( :user_name , 0)");
			$stmt->bindParam("user_name", $user);
			$stmt->execute();
			
		}
		
		
		// get the amount of money the user has.
		public function getCheckingBalance($user){
		    $stmt = $this->DB->prepare("select money from checking where user_name=:user_name");
		    $stmt->bindParam("user_name", $user);
		    $stmt->execute();
		    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		public function getSavingBalance($user){
		    $stmt = $this->DB->prepare("select money from saving where user_name=:user_name");
		    $stmt->bindParam("user_name", $user);
		    $stmt->execute();
		    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		
		
		// returns true if the amount that is being withdrawn is in the checking account
		public function canWithDraw($user, $withdraw_amount){
		    $stmt = $this->DB->prepare("select money from checking where user_name=:user_name");
		    $stmt->bindParam("user_name", $user);
		    $stmt->execute();
		    $amount =  $stmt->fetchAll ( PDO::FETCH_ASSOC )[0]['money'];
		    if($amount >= $withdraw_amount){
		        return true;
		    }else{
		        return false;
		    }
		}
		
		//verify the user name and password
	   public function verify($user,$psw){
// 	        $stmt = $this->DB->prepare ("SELECT * FROM users WHERE username = '" . $user ."'" );
// 			$stmt->execute();
// 			$check = $stmt->fetch();
// 			#echo $check;
// 			return $check;

			$stmt =  $this->DB->prepare("SELECT hash FROM users WHERE username = '$user'");
			$stmt->execute ();
			$hash = $stmt->fetchAll ( PDO::FETCH_ASSOC );
			return password_verify($psw, $hash[0]['hash']);
		}
		public function getAll(){
		    $stmt =  $this->DB->prepare("SELECT * FROM users");
		    $stmt->execute ();
		    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}
		
		//checks if the user name exist or not
		public function findDuplicate($user){
			$stmt = $this->DB->prepare ("SELECT * FROM users WHERE username = '" . $user ."'");
			$stmt->execute();
			$check = $stmt->fetch();
			
		 //   print_r($check);
		// echo " ";
		 //     return $check;
		/**
		 * Addition code
		 * 
		 * 
		 * @return returns true if there is already an account with the same username, else false
		 * which mean the user can create the account using the given user_name;
		 */	
			if(count($check) > 1){
			    return true;
			}else{
			    return false;
			}
		}
		
		public function showTransaction($user){
		    $stmt  = $this->DB->prepare("Select checking.user_name,checking.money, 
            From checking
            Join saving
            On checking.user_name = saving.user_name 
            where user_name = $user");
		    $stmt->execute();
		    return $stmt->fetchAll();
		}
		
		
		
		
	} 
	$myDBA = new DatabaseAdaptor();//call for the class DatabaseAdaptor
// 	$arr = $myDBA->findDuplicate("Subash");
// 	print_r($arr);
//	$hash = password_hash("subash", PASSWORD_DEFAULT);
//     echo "".PHP_EOL;
// 	echo $hash;
// 	$myDBA->register("SubashSubash", "password", "subashsubash@email.com","02/23/1995", "520-293-2391");
 	
//  	print_r($arr1);
// $arr = $myDBA->getAll();
// print_r($arr)
//     $arr=  $myDBA->verify("Subash", "subash");
//     print_r($arr);
// 	$arr = $myDBA->getCheckingBalance("Subash");
// 	echo $arr[0]['money'];
    //$myDBA->depositInChecking(300.0, "Subash");
//    $myDBA->withdraw(100, "Subash");
   // $myDBA->depositInSaving(250.0, "Subash")
//   echo $myDBA->canWithDraw("Subash", 200);
// 	$arr = $myDBA->getAvailableTime();
// 	echo $arr[0]['added'];
//  	foreach ($arr as $key => $value) {
 	    
//  	    echo $value['added'].PHP_EOL;
 	    
//  	}
//     $arr =  $myDBA->showTransaction("Subash");
//     print_r($arr);
//	$myDBA->resetScheduleAppt();
	
	
	
	?>