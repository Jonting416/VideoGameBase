<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	$stmt = $db->stmt_init();

	if($stmt->prepare("select g_name, genre, msrp, p_name from Game where g_name like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchSname'] . '%';
		$stmt->bind_param(s,$searchString);
		$stmt->execute();
		$stmt->bind_result($g_name, $genre, $msrp, $p_name);
		echo "<table class=\"table table-striped\"><th>Name</th><th>Genre</th><th>MSRP</th><th>Publisher Name</th>";
		while($stmt->fetch()) {
			echo "<tr><td><a href=\"indepth.php?name=$g_name\">$g_name</a></td><td>$genre</td><td>$msrp</td><td>$p_name</td></tr>";
		}
		echo "</table>";

		$stmt->close;
	}

	$db->close();
?>