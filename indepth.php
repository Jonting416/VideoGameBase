<?php
session_start();
?>
In-Depth
<br>TODO:

<!DOCTYPE HTML>
<html lang=en>
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
		<?php include 'header.php' ?>
		
		<div class="container">
			<?php
				require "dbutil.php";
				$db = DbUtil::loginConnection();
				$name = $_GET["name"];
				$sql = "SELECT * FROM Game NATURAL JOIN Depth WHERE g_name LIKE '$name'";
				$sql1 = "SELECT * FROM Game NATURAL JOIN Sources WHERE g_name LIKE '$name'";
				$result = $db->query($sql);
				$result1 = $db->query($sql1);
				$row = $result->fetch_assoc();
				$row1 = $result1->fetch_assoc();
				$genre = $row["genre"];
				$msrp = $row["msrp"];
				$pub = $row["p_name"];
				$multiplayer = $row["multiplayer"];
				$units_sold = $row["units_sold"];
				$release_yr = $row["release_yr"];
				$meta_score = $row["meta_score"];
				$trailerLink = $row1["trailer_link"];
				$reviewLink = $row1["r_link"];
			?>
			<div class="row">
				<div class="col-md-4">Game Name:</div>
				<div class="col-md-8"><?php echo $name; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Genre:</div>
				<div class="col-md-8"><?php echo $genre; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">MSRP:</div>
				<div class="col-md-8"><?php echo "$".$msrp; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Publisher:</div>
				<div class="col-md-8"><?php echo $pub; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Multiplayer:</div>
				<div class="col-md-8"><?php if($multiplayer) echo "Yes"; else echo "No"; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Units Sold:</div>
				<div class="col-md-8"><?php echo $units_sold; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Release Year:</div>
				<div class="col-md-8"><?php echo $release_yr; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Meta Score:</div>
				<div class="col-md-8"><?php echo $meta_score; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Trailer Link:</div>
				<div class="col-md-8"><?php echo "<a href=".$trailerLink.">".$trailerLink."</a>"; ?></div>
			</div>
			<div class="row">
				<div class="col-md-4">Review Link:</div>
				<div class="col-md-8"><?php echo "<a href=".$reviewLink.">".$reviewLink."</a>"; ?></div>
			</div>
		</div>
	</body>
</html>