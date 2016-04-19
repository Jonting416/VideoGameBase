<?php
class DbUtil{
	public static $loginUser = "cs4750jt4ue"; 
	public static $loginPass = "H8KQ27YTB4hGQu4L";
	public static $host = "stardock.cs.virginia.edu"; // DB Host
	public static $schema = "cs4750jt4ue"; // DB Schema
	
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

