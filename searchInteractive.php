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
		<?php include 'headerSearch.php'; ?>
		<center> 
			<form id="searchbox" action="" method="POST">
				<fieldset>
				<legend>Search</legend>
				<input id="search" type="text" name="SearchText" placeholder="Type in query here" maxlength="25">
				<input id="submit" type="submit" value="Search">
				</fieldset>
			</form>
		</center>
		<!--AJAX Script-->
		<script>
			$(document).ready(function() {
				$("#search").change(function() {
					$.ajax({
						url: 'searchAjax.php', data: {
							searchSname: $("#search").val()}, success: function(data) {
								$('#SnameResult').html(data); 
							}
					});
				});
			});
		</script>
		<div id="SnameResult">Search Result</div>
	</body>

</html>