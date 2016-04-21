<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Video Gamebase - For all your new gaming needs</title>
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
					<li><a href="addgame.html">Add a Game!</a></li>
					<li>
						<form id="searchbox" action="search.php">
							<input id="search" type="text" placeholder="Type in query here">
							<input id="submit" type="submit" value="Search">
						</form>
					</li>
				</ul>
				<ul class="pull-right">
					<?php
						if (!isset($_SESSION["User"])){
							echo "<li><a href='signup.php'>Sign Up</a></li>
							<li><a href='login.php'>Log In</a></li>";
						}

						if (isset($_SESSION["User"])){
							echo "<li> Hello, ". $_SESSION["User"] ."</li>";
							echo "<li><a href='logout.php'>Logout</a></li>";
						}
					?> 
					<li><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>
		<?php 
			if (isset($_SESSION["User"])){ //test statement to make sure user is still logged in
				echo $_SESSION["User"];
			}
		?>

	</body>
</html>