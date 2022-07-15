<?php
	require_once("../db_connect.php");
	
	$q = mysqli_query($connection, 'SELECT * FROM `countries`');
	$res = array();
	while ($r = mysqli_fetch_assoc($q)) {
		$res[] = $r;
	}
	
	echo json_encode($res);
?>