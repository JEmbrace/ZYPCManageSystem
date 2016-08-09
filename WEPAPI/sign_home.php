<?php
	require_once "../init.php";

	if(!isset($_SESSION['username']) || $_SESSION['username'] == false){
	    $_SESSION['userurl'] = 'sign_home';
	    $finallyArray['data'] = array('flag'=>'false');
		$historyTestJSON=json_encode($finallyArray,JSON_UNESCAPED_UNICODE);
		echo $historyTestJSON;
	    exit();
	}
		$finallyArray['data'] = array('flag'=>'true');
		$historyTestJSON=json_encode($finallyArray,JSON_UNESCAPED_UNICODE);
		echo $historyTestJSON;
?>