<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	Add games <br>
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
			<legend><h2>Add Review</h2></legend>
			<?php
				//echo "<p> Testing </p>";
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
				    require "dbutil.php";
				    $db = DbUtil::loginConnection();

				    /*Initially just insert into the game
				    * Not worrying about checking previous records yet
				    */
				    $gamename = $_POST["g_name"];
				    $reviewSite = $_POST["r_name"];
				    $score = $_POST["score"];
				    $reviewLink = $_POST["r_link"];
				    $gID = 0;
				    $sqlGetID = "SELECT * FROM Game";
   				    $result = $db->query($sqlGetID);
   				    	if ($result->num_rows > 0){
							while ($row = $result->fetch_assoc()){ //Search through every row
								if($row["g_name"] == $gamename){
									$gID = $row["g_id"]; 
								}
							}
						}
				    $sql = "INSERT INTO Reviewer (g_id, g_name, r_name, score, r_link) VALUES ('$gID', '$gamename', '$reviewSite', '$score', '$reviewLink')"; //Doesnt work, neither tables are getting updated
				    $q = $db->query($sql);
				    if($q) {
				    	echo "<p>Review Added!</p>";
				    } else {
				    	echo "<p>Review failed to add.</p>";
				    }
				    $db->close;
				}
			?>
			<form enctype="multipart/form-data" role="form" method="POST" action="addReview.php">
				<div class="form-group">
					<label for="g_name">Game Name:</label>
					<input type="text" class="form-control" name="g_name">
				</div>
				<div class="form-group">
					<label for="r_name">Reviewer Site:</label>
					<input type="text" class="form-control" name="r_name">
				</div>
				<div class="form-group">
					<label for="score">Score:</label>
					<input type="text" class="form-control" name="score">
				</div>
				<div class="form-group">
					<label for="r_link">Link to Review:</label>
					<input type="text" class="form-control" name="r_link">
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Submit</button>
			</form>
		</div>
	</body>
</html>