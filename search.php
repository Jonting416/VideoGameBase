<?php
session_start();
?>
TODO:
<br>Search through game names and console names table 
<br>After entering a query in the search bar, will redirect to a dedicated search page (this page)
that has a larger search bar and will allow another search to be run
<br>Will return information from 
<br>

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
					<li><a href="addgame.php">Add Game</a></li>
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
	</body>
</html>


<!-- temporary storage of code for addgame. Create popup and redirect
echo "<script type='text/javascript'>alert('Please login first!');</script>";
$URL="http://plato.cs.virginia.edu/~jlc6zj/CS4750Project/index.php";
echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
echo "<script type ='text/javascript'>document.location.href='{$URL}';</script>";
-->