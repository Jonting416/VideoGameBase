<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
Login Page
<br> Limit username and password entry to be only up to 10 alphanumeric characters long, use AJAX before sending to server. If they are over 10 alphanumeric characters long then display a popup
<br> If the username and password combination does not exist, then display a popup
<br> If the username and password combination exists, then allow the user to login and use sessions to keep the user logged in until they close the browser. After logging in succesfully redirect the user back to the home screen.
<br> Use password_hash() hashing function to hide password?
<br> OPTION: Include a forget password functionality
<br><br>
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
		<div class="nav">
			<!--Container class is in bootstrap to make things look pretty-->
			<div class="container">
				<ul class="pull-left">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Browse</a></li>
					<li>
						<form id="searchbox" action="">
							<input id="search" type="text" placeholder="Type in query here">
							<input id="submit" type="submit" value="Search">
						</form>
					</li>
				</ul>
				<ul class="pull-right">
					<li><a href="signup.php">Sign Up</a></li>
					<li><a href="login.php">Log In</a></li>
					<li><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>
<!--Popup for if username or password already in use.
button is only used for testing purposes-->
<button onclick="popupAlert()">Test</button> 
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

</html>