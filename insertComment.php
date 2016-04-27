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
	<?php include './header.php'; 
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	if (empty($_SESSION)){
		$username = "Anon";
		$commentText = $_POST["commentText"];
		$sql = ("INSERT INTO Comments (username,c_txt) VALUES ('$username', '$commentText')"); 
		$result = $db->query($sql);
		echo "Anon Comment Inserted";
	}
	else if (isset($_SESSION) && !empty($_SESSION)){
		$username = $_SESSION["User"];
		$commentText = $_POST["commentText"];
		$sql = ("INSERT INTO Comments (username,c_txt) VALUES ('$username', '$commentText')"); 
		$result = $db->query($sql);
		echo "User Comment Inserted";
	}
	else {
		echo "Comment failed to insert";
	}
	?>
	</body>
</html>