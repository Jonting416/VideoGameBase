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
		<div class="container">
			<div class="jumbotron">
				<p style="color:red;font-size:xx-large;">Are you sure?  You can't go back after you do this!</p>
				<form class="form-inline" role="form" method="POST" action="deleteAccount.php">
					<button type="submit" class="btn btn-danger">Yes, I want to delete my account.</button>
					<a href="./index.php"><button type="button" class="btn btn-secondary">No, I do not want to delete my account.</button></a>
				</form>
			</div>
		</div>
	</body>
</html>