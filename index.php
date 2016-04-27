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
		<?php include './header.php'; ?>
		<!--Can change this to make it prettier later, but for now lets just make the pages-->
		<div class="container">
			<h3>Welcome to the Video Gamebase!</h3>
			<p>Website still in development.</p>
			<?php 
			require "dbutil.php";
			$db = DbUtil::loginConnection();

			$sql = ("SELECT * FROM Comments"); 
			$result = $db->query($sql);
			if ($result->num_rows>0){ 
				echo "<br>Feedback:";
				echo '<table class="table table-striped">'; //putting results into a table
				while($row = $result->fetch_assoc()){ //Checking game table
					echo "<tr>" ;
					echo '<td>'.$row["username"].": ".$row["c_txt"].'</td>';
				}
			}
			?>

			<form id="commentBox" action="insertComment.php" method="POST">
				<input id="search" type="text" name="commentText" placeholder="Comment" maxlength="250">
				<input id="submit" type="submit" value="Leave Comment">
			</form>
			<br>
		</div>
	</body>
</html>