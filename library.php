<?php
	session_start();
?>
<?php
	$SERVER = 'stardock.cs.virginia.edu';
	$DATABASE = 'cs4750jt4ue';
	//$USERNAME = 'cs4750jt4ue'; Admin logininfo
	//$PASSWORD = 'H8KQ27YTB4hGQu4L';
	if(!isset($_SESSION["User"])) {
		$USERNAME = 'cs4750jt4uea';
		$PASSWORD = 'spring2016';
	} else {
		$USERNAME = 'cs4750jt4ueb';
		$PASSWORD = 'spring2016'
	}
?>

