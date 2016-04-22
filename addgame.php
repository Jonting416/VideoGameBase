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
		<?php include './headerLogin.php'; ?>
		<div class="container">
			<legend><h2>Add Game</h2></legend>
			<?php
				echo "<p> Testing </p>";
				if(isset($_POST)) {
					echo "<p> Game name is " . $_POST["gamename"] . ".\n Pic URL is " . $_POST["picURL"] . ".</p>";
					echo "<p> Genres selected: " . $_POST["genreForm"][0] . $_POST["genreForm"][1] . $_POST["genreForm"][2] . $_POST["genreForm"][3] . ".</p>";
					foreach ($_POST as $key => $value) {
				        echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
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
					<label for="publisher">Publisher:</label>
					<input type="text" class="form-control" name="publisher">
				</div>
				<div class="form-group">
					<label for="MSRP">MSRP:</label>
					<input type="text" class="form-control" name="MSRP">
				</div>
				<div class="form-group">
					<label for="genreForm">Select Genre (ctrl+click to select multiple)</label>
					<select multiple="multiple" class="form-control" name="genreForm[]">
						<option value="RPG">RPG</option>
						<option value="Action">Action</option>
						<option value="FPS">FPS</option>
						<option value="Adventure">Adventure</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Submit</button>
			</form>

			<?php
				require "dbutil.php"; //Connect to DB
				$db = DbUtil::loginConnection();

				if(!empty($_POST["gamename"]) && !empty($_POST["picURL"]) &&!empty($_POST["publisher"]) && !empty($_POST["MSRP"]) && !empty($_POST["genreForm"])){ // enter entry into DB
					echo "<script type='text/javascript'>alert('form is filled!');</script>";
					$gamename = $_POST["gamename"];
					$picURL = $_POST["picURL"];
					$publisher = $_POST["publisher"];
					$MSRP = $_POST["MSRP"];
					$genreForm = $_POST["genreForm"];

					$sql = ("INSERT INTO Game (g_name, cover_pic, genre, msrp, p_name) VALUES ('$gamename','$picURL','$genreForm','$MSRP','$publisher')"); //DOESNT WORK

				}
				else{
					echo "<script type='text/javascript'>alert('Please fill in every field!');</script>"; //If not every field is filled. WANT SOME WAY TO MAKE IT RUN ONLY AFTER THE FORM HAS BEEN SUBMITTED
					echo $_POST["genreForm"];
				}
			?>
		</div>
	</body>
</html>
