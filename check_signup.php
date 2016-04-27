<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
Sign-up PHP page<br>
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
	<div class="container">
	<body>
		<?php include 'header.php'; ?>
	

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
		$var1 = $_POST["Username"];
		$var2 = md5($_POST["Password"]);
		$fName = $_POST["FirstName"];
		$lName = $_POST["LastName"];
		$email = $_POST["Email"];
		$sql1 = "INSERT INTO Login (username, password) VALUES ('$var1','$var2')"; //apparently passing variables is a security flaw, idk why. 
		$sql2 = "INSERT INTO User (username, first_name, last_name, email) VALUES ('$var1','$fName','$lName','$email')"; 
		$db->query($sql1);
		$db->query($sql2);
		echo "new account created";
	}
$db->close;
?>
</body>
</div>
</html>
