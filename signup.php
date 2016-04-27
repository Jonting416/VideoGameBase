<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
Sign-up 
	<head>
		<!--The following part of head is all bootstrap initialization-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!--This line is adding in the custom css sheet-->
		<link rel="stylesheet" href="css/main.css">
	</head>
	<div class="container">
	<body>
		<?php include './header.php'; ?>

<!--Form for submitting a desired username and password-->
<center> 
	<form action="check_signup.php" method="POST">
		<fieldset>
		<legend>Sign-Up</legend>
		Please enter the username and password you want to use. The password must be at least 7 digits long!<br><br>
		Username: <input type="text" name="Username" maxlength="15" align="left" size="20">
		Password: <input type="text" name="Password" maxlength="15" align="left" size="20"><br><br>
		First Name: <input type="text" name="FirstName" maxlength="20" align="left" size="20">
		Last Name: <input type="text" name="LastName" maxlength="20" align="left" size="20"><br><br>
		Email: <input type="text" name="Email" maxlength="25" align="left" size="50"><br><br>
		 <!-- if use top down stacked textboxes then the boxes don't line up -->
		<input type="submit" value="Submit">
		</fieldset>
	</form>
</center>
</body>
</div>
</html>