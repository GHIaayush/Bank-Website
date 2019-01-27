<html>
<head>
<title></title>
</head>
<link href="styles.css" type="text/css" rel="stylesheet" />
<?php 
session_start();
include 'model.php';
$myDBA = new DatabaseAdaptor();
$arr = $myDBA->getAvailableTime();
?>
<body id="main2">
	<div class="schedule-box">
		<h3 id="scheduleh1">
			Schedule an APPOINTMENT<br>with a specialist today
		</h3>
		<form method="post" action="controller.php">
			<p>Full Name</p>
			<input type="text" name="register_userS" placeholder="Full Name"
				required>
			<p>Email address</p>
			<input type="email" name="emailS" placeholder="example@email.com">
			<p>Phone number</p>
			<input type="tel" name="numberS" placeholder="xxx-xxxx-xxxx"
				pattern="^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" required
				title='xxx-xxx-xxxx'><br>
			<p>Time</p>
			<?php 
			$time = '<select name="time" required>
                    <option value="" disabled selected>-Select</option>';
			 foreach ($arr as $key => $value) {
			     $id = $value['id'];
			     $added = $value['added'];
			     $time.= "<option value=$id>$added</option>";
			  
			 }
			 $time .= "</select>";
			 echo $time;
	          ?> <br> <br>

			<p>Short Description</p>
			<textarea name="descriptionS" cols="40" rows="5"
				placeholder="How can we help you? Short Description" required></textarea>
			<br>
			<br> <input type="submit" name="ScheduleAppt" value="Schedule">
		</form>
	</div>

 <?php







 ?>
</body>
</html>
