<?php
session_start();
?>
TODO:
<br>

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
	</body>
</html>
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
function loadInDepth(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("results").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "Test.txt", true);//Change
  xhttp.send();//Change
}
</script>

<?php 
$flag = FALSE;
require "dbutil.php";
$db = DbUtil::loginConnection();
if (isset($_POST["SearchText"])){
	$searchWord = $_POST["SearchText"];
	$sql = ("SELECT * FROM Game WHERE g_name LIKE '%$searchWord%'"); //Query for finding games
	$sql1 = ("SELECT * FROM Console WHERE c_name LIKE '%$searchWord%'"); //Query for finding consoles
	$result = $db->query($sql);
	$result1 = $db->query($sql1);
	echo '<div id="results"';
	if ($result->num_rows>0 || $result1->num_rows>0){ //Looking in both game and console table for query
		echo "<br>Results:";
		echo '<table class="table table-striped">'; //putting results into a table
		while($row = $result->fetch_assoc()){ //Checking game table
			echo "<tr>" ;
			echo '<td>'.$row["g_name"].'</td>'. "<td> Genre: ".$row["genre"]."</td><td> MSRP: $".$row["msrp"]."</td><td> Publisher: ".$row["p_name"]."</td>".
				'<td><button type="button" onclick="loadInDepth()">In-Depth Information</button></td>';
		}
		while($row1 = $result1->fetch_assoc()){ //Checking console table
			echo "<br> Console: ".$row1["c_name"]." Manufacturer: ".$row1["manufacturer"]." MSRP: $".$row1["msrp"]." Units Sold: ".$row1["units_sold"]." Release Date: ".$row1["release_date"]." Top Game: ".$row1["top_game"];
		}
		echo '</div>';
	}
	
	else{ //Found no games or console names that matched
		echo "No Results Found";
	}
}
?>
<!-- temporary storage of code for addgame. Create popup and redirect 
echo "<script type='text/javascript'>alert('Please login first!');</script>";
$URL="http://plato.cs.virginia.edu/~jlc6zj/CS4750Project/index.php";
echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
echo "<script type ='text/javascript'>document.location.href='{$URL}';</script>";
-->