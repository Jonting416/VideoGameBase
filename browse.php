<?php
session_start();
?>
Browse
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

<?php 
require "dbutil.php";
$db = DbUtil::loginConnection();
	$searchWord = "";
	$sql = ("SELECT * FROM Game WHERE g_name LIKE '%$searchWord%'"); //Query for finding games
	$sql1 = ("SELECT * FROM Console WHERE c_name LIKE '%$searchWord%'"); //Query for finding consoles
	$result = $db->query($sql);
	$result1 = $db->query($sql1);
	if ($result->num_rows>0 || $result1->num_rows>0){ //Looking in both game and console table for query
		echo "<br>Results:";
		echo '<table class="table table-striped">'; //putting results into a table
		while($row = $result->fetch_assoc()){ //Checking game table
			echo "<tr>" ;
			echo '<td>'.$row["g_name"].'</td>'. "<td> Genre: ".$row["genre"]."</td><td> MSRP: $".$row["msrp"]."</td><td> Publisher: ".$row["p_name"]."</td>".
				'<td><button type="button" onclick="loadInDepth("'.$row["g_name"].'")">In-Depth Information</button></td>';
		}
		while($row1 = $result1->fetch_assoc()){ //Checking console table
			echo "<tr>";
			echo "<td> Console: ".$row1["c_name"]."</td><td> Manufacturer: ".$row1["manufacturer"]."</td><td> MSRP: $".$row1["msrp"]."</td><td> Units Sold: ".$row1["units_sold"]."</td><td> Release Date: ".$row1["release_date"]."</td><td> Top Game: ".$row1["top_game"]."</td>";
		}
	}
	else{ //Found no games or console names that matched
		echo "No Results Found";
	}
?>
</html>
