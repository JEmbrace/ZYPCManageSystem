
<?php
	
		require_once "../init.php";
	


	 $db = new db_sql_functions();
	
	//拿到cookie里的tookenid
	 
	$tookenid=$_COOKIE['tookenid'];

	if(empty($tookenid)){

		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../html/admin_login.html\">";
		exit();
	}

	$rs_array 	 =    $db->select_tooken($tookenid);

	//如果存在tooken
	if(!empty($rs_array)){
		$tookenid  = $rs_array['tooken'];
		$db->delete_tookenid($tookenid);
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../html/admin_login.html\">";
		exit();

	}else{
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../html/admin_login.html\">";
		exit();
	}
	
?>