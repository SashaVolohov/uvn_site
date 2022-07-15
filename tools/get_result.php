<?php

	require_once("tools_api.php");

	$id = @$_GET['id'];
	
	if(!$id) {
		echo "ERROR: id not specified.";
		exit();
	} else {
		$model_id = $_GET['id'];

		$query = "SELECT * FROM `models` WHERE `id` = '$model_id'";
		$data = mysqli_query($connection, $query);
		$row = 0;
		if(mysqli_num_rows($data) == 1) {
			$row = mysqli_fetch_assoc($data);
		} else {
			echo "Неверный ID.";
			exit();
		}
		
		$toolsAPI = new ToolsAPI();
		$toolsAPI->changeMode(RETURN_RESULT);
		
		$code = $row['code'];
		
		eval($code);
		
		echo main();
	}
?>