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
	<div class="container">
	<body>
	<?php include './header.php'; 
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	if (isset($_POST["removeGame"])){ 
		$gameName = $_POST['removeGame'];
		$sql1 = ("DELETE FROM Watchlist WHERE g_name = '$gameName'");
		$result = $db->query($sql1);
		echo '<script language="javascript">'; //popup messaging say game has been removed
		echo 'alert("'.$_POST["removeGame"].' has been removed");';
		echo '</script>';
	}

	$username = $_SESSION["User"];
	$sql = ("SELECT * FROM Watchlist"); 
	$result = $db->query($sql);
	echo '<table class="table table-striped">'; //putting results into a table
	if ($result->num_rows>0){ 
		while ($row = $result->fetch_assoc()){ //Search through every row
			if($row["username"] == $username){
				echo "<tr>";
				echo '<td>'.$row["g_name"].'</td>';	
			}
		}
	}

	?>
	<form id="removeBox" action="removeWatchlist.php" method="POST">
		<input id="removeGame" type="text" name="removeGame" placeholder="Game Title" maxlength="25">
		<input id="submit" type="submit" value="Remove">
	</form>

	</body>
</div>
</html>