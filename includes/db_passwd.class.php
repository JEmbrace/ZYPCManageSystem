<?php

class db_passwd_functions
{
    private $dbconn;

    function __construct()
    {
        $this->dbconn = new \db();
        return $this;
    }

    /*
     * 将所有用户密码MD5加密
    * 参数： null
    * 返回值：true / false
    */
    public function md5_passwd($key)
    {
        //define a pass key: zypcims
        if ($key != 'zypcims'){
            exit();
        }

        $sql = "SELECT uid,password FROM users";
        $result = $this->dbconn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()){
            array_push($rows,$row);
        }
        
        for($i=0;$i<count($rows);$i ++){
            $uid = $rows[$i]['uid'];
            $password = $rows[$i]['password'];

            if(strlen($password) != 32){
                $passwd = md5($password);
                $sql = "UPDATE users SET password='$passwd' WHERE uid=$uid";
                $result = $this->dbconn->query($sql);
            }
        }

        if ($result)
            return true;
        else
            return false;
    }
}
