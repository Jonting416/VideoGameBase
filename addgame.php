<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	Add games <br>
	TODO: <br><br>
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
					<li><a href="addgame.php">Add a Game!</a></li>
					<li>
						<form id="searchbox" action="search.php">
							<input id="search" type="text" placeholder="Type in query here">
							<input id="submit" type="submit" value="Search">
						</form>
					</li>
				</ul>
				<ul class="pull-right">
					<?php 
						if(isset($_SESSION["User"])) {
							echo "<li>Hello " . $_SESSION['User'] . "!</li>\n";
							echo "<li><a href=\"logout.php\">Log Out</a></li>";
						} else {
							echo "<script type='text/javascript'>alert('Please login first!');</script>";
							$URL="./index.php";
							echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
							echo "<script type ='text/javascript'>document.location.href='{$URL}';</script>";
							echo '<li><a href="signup.php">Sign Up</a></li>
							<li><a href="login.php">Log In</a></li>';
						}
					?>
					<li><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<legend><h2>Add Game</h2></legend>
			<?php
				echo "<p> Testing </p>";
				if(isset($_POST)) {
					echo "<p> Game name is " . $_POST["gamename"] . ".\n Pic URL is " . $_POST["picURL"] . ".</p>";
					echo "<p> Genres selected: " . $_POST["genreForm"][0] . $_POST["genreForm"][1] . $_POST["genreForm"][2] . $_POST["genreForm"][3] . ".</p>";
					foreach ($_POST as $key => $value) {
				        echo "<tr>";
				        echo "<td>";
				        echo $key;
				        echo "</td>";
				        echo "<td>";
				        echo $value;
				        echo "</td>";
				        echo "</tr>";
				    }
				}
			?>
			<form enctype="multipart/form-data" role="form" method="POST" action="addgame.php">
				<div class="form-group">
					<label for="gamename">Game Name:</label>
					<input type="text" class="form-control" name="gamename">
				</div>
				<div class="form-group">
					<label for="picURL">Cover Image (URL):</label>
					<input type="text" class="form-control" name="picURL">
				</div>
				<div class="form-group">
					<label for="genreForm">Select Genre (ctrl+click to select multiple)</label>
					<select multiple="multiple" class="form-control" name="genreForm[]">
						<option value="1">RPG</option>
						<option value="2">Action</option>
						<option value="3">FPS</option>
						<option value="4">Adventure</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Submit</button>
			</form>
		</div>
	</body>
</html>
