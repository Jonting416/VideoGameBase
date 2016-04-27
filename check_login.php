<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Script for popup alert if the username/password combination is wrong-->
<script>
function popupAlert(){
	alert("This username/password combination does not exist!");
}
</script>
Login PHP page<br>
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
	<body>		
<?php 
$flag = FALSE;
require "dbutil.php";
$db = DbUtil::loginConnection();

/* Check to make sure that the Username requested is in use
If already in use: Return alert message saying to pick a different username
If not already in use: Add the Username and Password to the DB 
*/
$sql = ("SELECT username, password FROM Login");
$result = $db->query($sql);
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){ //Search through every row
		if($row["username"] == $_POST["Username"] && $row["password"] == md5($_POST["Password"])){
			$flag = TRUE; 
		}
	}
}
	/*If the username and password combination exist then flag will be TRUE and we want to 
	login the user. We will want to use a session or cookie to keep that user state until 
	they close the session. Otherwise when flag is FALSE the username/password combination
	does not exist and we want to display a popup alert saying so.
*/
	if ($flag == TRUE){
		$_SESSION["User"] = $_POST["Username"]; //Set session variable
		echo "<script type='text/javascript'>alert('You're now logged in!');</script>";
		$URL="./index.php";
		echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
		echo "<script type ='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<li><a href="signup.php">Sign Up</a></li>
		<li><a href="login.php">Log In</a></li>';
		echo "You are now logged in";
	}
	else if ($flag == FALSE){
		echo "Could not login, please try again";
	}

	
$db->close;
?>
</div>
</body>
</html>