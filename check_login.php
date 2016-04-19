<!DOCTYPE html>
<html lang="en">
<body>
<?php
require "dbutil.php";
$db = DbUtil::loginConnection();
$stmt = $db->stmt_init();
echo "Hello World";
$db->close;
?>
</body>
</html>