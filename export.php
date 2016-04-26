<!DOCTYPE HTML>
<html lang="en">
<?php
//Need to integrate export function into website
	include 'dbutil.php';
	$db = DbUtil::loginConnection();

	// return all available tables 
	$tables = $db->query("SHOW TABLES"); 
	$tb = array();
	while($tb = mysqli_fetch_object($tables)){
		$result = array();
		$table = $tb->Tables_in_databaseproject;
		$rows = $db->query("SELECT * FROM $table");
		while($row = mysqli_fetch_assoc($rows)){
			$result[] = $row;
		}
		echo json_encode($result);
		echo "<br>";
	}

	// echo json_encode($tb);
?>
</html>