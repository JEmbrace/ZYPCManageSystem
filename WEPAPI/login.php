<?php 
    require_once "../init.php";
    
    $_SESSION['username'] = null;
    if(isset($_SESSION['userurl'])){
        $url = "../html/".$_SESSION['userurl'].".html";
         echo "url= ".$url;
    }else{
            $url = '/';
    }

    if($_POST){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(!is_numeric($username)){
           echo "<script>alert('学号或密码错误，请重新输入！')</script>";
            echo "<meta http-equiv=\"Refresh\" content=\"0;url=$url\">";
            exit();
        }
    }
    
    $db = new db_sql_functions();
    $password = md5($password);
    $usernm = $db->check_user($username,$password);
    
    if($usernm){
       
       $_SESSION['username']=true;
       $_SESSION['username']=$usernm;
     
       echo "<meta http-equiv=\"Refresh\" content=\"0;url=$url\">";

  
    }else{
       
        echo "<script>alert('学号或密码错误！')</script>";
        echo "<meta http-equiv=\"Refresh\" content=\"0;url=../html/login.html\">";
    }


?>