<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
Sign-up PHP page<br>
TODO<br>
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
		<?php include 'header.php'; ?>
	<body>

<?php 
$flag = FALSE;
require "dbutil.php";
$db = DbUtil::loginConnection();

/* Check to make sure that the Username requested is not already in use
If already in use: Return alert message saying to pick a different username
If not already in use: Add the Username and Password to the DB 
*/
$sql = ("SELECT username FROM Login");
$result = $db->query($sql);
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){ //Search through every row
		if($row["username"] == $_POST["Username"]){ //If name in given row == Username
			$flag = TRUE; 
		}
	}
}
	/*If the Username requested was found in the table Login, then flag will be true 
and we'll want to send an alert. Otherwise we want to add the Username and Password
into our database
*/

	if ($flag == TRUE){
		 echo "<script type='text/javascript'>alert('Username already taken!');</script>";
	}
	else if ($flag == FALSE){
		echo "new account created";
		$var1 = $_POST["Username"];
		$var2 = $_POST["Password"];
		$fName = $_POST["FirstName"];
		$lName = $_POST["LastName"];
		$email = $_POST["Email"];
		$sql1 = "INSERT INTO Login (username, password) VALUES ('$var1','$var2')"; //apparently passing variables is a security flaw, idk why
		$sql2 = "INSERT INTO User (username, first_name, last_name, email) VALUES ('$var1','$fName','$lName','$email')"; //No errors, but doesn't add anything into the table
		$db->query($sql1);
		$db->query($sql2);
	}
$db->close;
?>
</body>
</html>

<!--  query for printing out all of the console names
require "dbutil.php";
$db = DbUtil::loginConnection();
$sql = ("SELECT c_name FROM Console");
$result = $db->query($sql);
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		echo $row["c_name"]."<br>";
	}
}
else {
	echo "There are no entries";
}
 -->