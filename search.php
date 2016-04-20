<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<body>
Hello World
<?php 
	if (isset($_SESSION["User"])){ //test statement to make sure user is still logged in
		echo $_SESSION["User"];
	}
?>
<br>

</body>
</html>