<?php
 	session_start();
	if (isset($_SESSION)){
		session_unset();
		session_destroy();
		echo "You have been logged out";
	}
	else {
		echo "You have already been logged out";
	}
?>