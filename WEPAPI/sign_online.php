<?php
		require_once "init.php";

		
		$timelive = 60; 
		$db = new db_sql_functions();
		$res = $db->check_online_users($timelive);
		$ss = implode("、", $res);
		$nums = count($res);

		$finallyArray['data'] = array('count'=>$nums);
		$historyTestJSON=json_encode($finallyArray,JSON_UNESCAPED_UNICODE);
		echo $historyTestJSON;
?>