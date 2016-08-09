<?php

	require_once "../init.php";
	
	 $_SESSION['adminname'] = null;
	if($_POST){
		 $username = $_POST['aname'];
	     $password = $_POST['apassword'];
	     
	     $db = new db_sql_functions();

	     $rs = $db->admin_login_check($username,$password);
	  
	     if(!empty($rs)){
	     	$_SESSION['adminname'] = true;
	     	$name = "tookenid";
	     	$value = time().mt_rand();
	     	setcookie($name,$value,time()+1200);

	      	$db = new db_sql_functions();
	     	$db->insert_tooken($value,time());
	  		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../html/user_list.html\">";
	     }else{
	    	 
	    	 echo "<script>alert('管理员用户名或者密码不正确，或者权限不够');</script>";
	     	
	   		 echo "<meta http-equiv=\"Refresh\" content=\"0;url=../html/admin_login.html\">";
	     
	     	
	    } 
	}
?>
