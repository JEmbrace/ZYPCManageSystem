<?php
	require_once "../init.php";
	

	$username = $_SESSION['username'];

	if(!isset($username)){
		echo "1";
		exit();
	}


	$db = new db_sql_functions();
	$historyTestArray= $db->get_user_history_plans($username);
	$finallyArray['data'] = $historyTestArray;
 	$historyTestJSON=json_encode($finallyArray,JSON_UNESCAPED_UNICODE);
 	echo $historyTestJSON;
	
?>