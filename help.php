<?php
session_start();
?>
<!DOCTYPE>
<html>
TODO: Figure out how to export DB
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

<?php
require "dbutil.php";
$db = DbUtil::loginConnection();
?>
	<body>
		<?php include './header.php'; ?>
	</body>
<h1>Video Game Database</h1>
<p>Summary: The purpose of this website is to help people find information about video games in one consolidated location</p>
<p1>Creaters:
	<li>Jon Ting (jt4ue)</li>
	<li>Jing-Shuan Chen (jlc6zj)</li>
	<li>Jiaming Zhao (jz4bm)</li>
	<li>Felix Cao (fdc2gz)</li>
</p1> 

<br><br> 
<form action="export.php" method="GET"> 
<input type="submit" value="Export">
</form>
<a href="deleteAccount.php"><button class = "btn btn-danger">Delete Account</button></a>
</form>
</html>