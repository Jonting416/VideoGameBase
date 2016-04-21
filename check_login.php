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
TODO<br>
Make popup alert to let user know that a username/password is wrong. 
Need to learn how to run the popupAlert() script.
Create a cookie or session to keep a user logged in.

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
		<div class="nav">
			<!--Container class is in bootstrap to make things look pretty-->
			<div class="container">
				<ul class="pull-left">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Browse</a></li>
					<li><a href="addgame.php">Add Game</a></li>
					<li>
						<form id="searchbox" action="">
							<input id="search" type="text" placeholder="Type in query here">
							<input id="submit" type="submit" value="Search">
						</form>
					</li>
				</ul>
				<ul class="pull-right">
					<?php //php segment changing the display bar depending on if logged in or not
						if (!isset($_SESSION["User"])){
							echo "<li><a href='signup.php'>Sign Up</a></li>
							<li><a href='login.php'>Log In</a></li>";
						}

						if (isset($_SESSION["User"])){
							echo "<li> Hello, ". $_SESSION["User"] ."</li>";
							echo "<li><a href='logout.php'>Logout</a></li>";
						}
					?> 
					<li><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>
<body>
<?php 
$flag = FALSE;
require "dbutil.php";
$db = DbUtil::loginConnection();

/* Check to make sure that the Username requested is not already in use
If already in use: Return alert message saying to pick a different username
If not already in use: Add the Username and Password to the DB 
*/
$sql = ("SELECT username, password FROM Login");
$result = $db->query($sql);
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){ //Search through every row
		if($row["username"] == $_POST["Username"] && $row["password"] == $_POST["Password"]){
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
		 echo "You are now logged in!";
		 $_SESSION["User"] = $_POST["Username"]; //Set session variable
	}
	else if ($flag == FALSE){
		echo "Wrong password!";
	}
$db->close;
?>
</body>
</html>