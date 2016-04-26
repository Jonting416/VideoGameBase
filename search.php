<?php 
require "dbutil.php";
$db = DbUtil::loginConnection();
$q = $_GET['q']; //Get the gamename from url
$sql = ("SELECT * FROM Depth WHERE g_name='".$q"'"); //Query for bringing up in-depth information
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)){
	echo $row['g_name'];
}
?>