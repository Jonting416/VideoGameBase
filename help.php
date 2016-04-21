<?php
session_start();
?>
<!DOCTYPE>
<html>
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
					<li><a href="addgame.php">Add Game</a></li>
					<li>
						<form id="searchbox" action="">
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
	</body>
<h1>Video Game Database</h1>
<p>Summary: The purpose of this website is to help people find information about video games in one consolidated location</p>
<p1>Creaters:
	<li>Jon Ting (jt4ue)</li>
	<li>Jing-Shuan Chen (jlc6zj)</li>
	<li>Jiaming Zhao (jz4bm)</li>
	<li>Felix Cao (fdc2gz)</li>
</p1> 
</html>