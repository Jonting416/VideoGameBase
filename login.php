<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
Login Page <br> 
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
	<body>
		<?php include './header.php'; ?>
<script>
function popupAlert(){
	alert("This username/password combination does not exist!");
}
</script>


<center> 
	<form action="check_login.php" method="POST">
		<fieldset>
		<legend>Login</legend>
		Please enter your username and password <br><br>
		Username: <input type="text" name="Username" maxlength="20"> 
		Password: <input type="password" name="Password" maxlength="20"><br><br> <!-- if use top down stacked textboxes then the boxes don't line up -->
		<input type="submit" value="Submit">
		</fieldset>
	</form>
</center>
</body>
</html>