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

	<script>
		function yesSelected(){
			var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
	    		if (xhttp.readyState == 4 && xhttp.status == 200) {
	      			document.getElementById("logoutText").innerHTML = xhttp.responseText;
	    		}
	  		};	
  			xhttp.open("GET", "logoutAjax.php", true);//Call search.php and send str as the variable q
  			xhttp.send();//Change	
		}
	</script>

	<body>
		<?php 
		include './header.php'; 
		//session_unset();
		//session_destroy(); //not sure if we need to both unset and destroy	
		//echo "<div class=\"container\">You have been logged out</div>";
		?>

		<div id='logoutText'> Are you sure you want to logout?
		<button type='button' onclick='yesSelected()'>Yes</button>
		<button type='button' onclick="location.href='index.php';">No</button>
	</div>
	</body>
</html>

