<?php
	
	require_once "../init.php";
	if(!isset($_SESSION['username']) || $_SESSION['username']!=true){
    	echo "1";
 		exit();
	 }

	$db       = new db_sql_functions();

    $oneweekTimeCircleArray = $db->get_oneweek_time_circle(); 

	$oneweekTimeLineArray  =  $db->get_oneweek_time_line();

	$mergeArray = Array();
	
	array_push($mergeArray, $oneweekTimeCircleArray,$oneweekTimeLineArray);

	$tempArray['data'] = $mergeArray;
	$mergeJSON = json_encode($tempArray,JSON_UNESCAPED_UNICODE);

	echo($mergeJSON);

	

	


?>