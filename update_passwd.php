<?php

require_once "init.php";
require_once "./includes/db_passwd.class.php";

/*
 * 重置所有人的密码为MD5加密
 * 
 *   请谨慎使用！！！！
 */

$key = $_GET['key'];

$db = new db_passwd_functions();
$res = $db->md5_passwd($key);
echo $res;
?>
