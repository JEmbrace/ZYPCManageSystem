<?php
	
	require_once "../init.php";
	$username = $_SESSION['username'];
	if(!isset($username)){
		echo "1";
		exit();
	}
	
	$db       = new db_sql_functions();
    
	$oneweekTimeLineArray  =  $db->get_oneweek_time_line();	

	$tempArray['data'] = $oneweekTimeLineArray;
	$mergeJSON = json_encode($tempArray,JSON_UNESCAPED_UNICODE);

	echo($mergeJSON);

?>
