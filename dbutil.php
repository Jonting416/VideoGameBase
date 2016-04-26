<?php
class DbUtil{
	require "library.php";
	
	public static function loginConnection(){
		$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);
	
		if($db->connect_error){
			echo("Could not connect to db");
			$db->close();
			exit();
		}
		
		return $db;
	}
	
}
?>

