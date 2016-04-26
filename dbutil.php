<?php
class DbUtil{
	//require "library.php";
	
	$SERVER = 'stardock.cs.virginia.edu';
	$DATABASE = 'cs4750jt4ue';
	$USERNAME = 'cs4750jt4ue';
	$PASSWORD = 'H8KQ27YTB4hGQu4L';

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

