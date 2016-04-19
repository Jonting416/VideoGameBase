<!DOCTYPE html>
<html lang="en">
<!-- Script for popup alert if the username is already taken-->
<script>
function popupAlert(){
	alert("This username/password combination is already being used!");
}
</script>

<body>
<?php 
$flag = FALSE;
require "dbutil.php";
$db = DbUtil::loginConnection();
$sql = ("SELECT username FROM Login");
$result = $db->query($sql);
if ($result->num_rows > 0){
	while ($row = $result->fetch_assoc()){
		if($row["c_name"] == ){
			$flag = TRUE;
		}
	}
}
else {
	echo "There are no entries";
}

if ($flag == TRUE){
	popupAlert()
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