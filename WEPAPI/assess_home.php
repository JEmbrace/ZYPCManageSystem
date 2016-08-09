<?php
        require_once "../init.php";
            
        if(!isset($_SESSION['username']) || $_SESSION['username']==false){
            $_SESSION['userurl'] = 'assess_home';
            
        	$finallyArray['data'] = array('flag'=>'false');
        	$historyTestJSON=json_encode($finallyArray,JSON_UNESCAPED_UNICODE);
        	echo $historyTestJSON;
            exit();
        }
        $username = $_SESSION['username'];
        $db = new db_sql_functions();
        if($_POST){
            $last_sum = $_POST['last_sum'];
            $this_play = $_POST['this_play'];
            $detial_play = $_POST['detial_play'];
            $user = $db->check_username($username);
            if($user){
                $db->add_asseing($username,$last_sum,$this_play,$detial_play);
            }
        }
        $last = $db->get_last_play($username);

        $second = array(
                        'detial_play'=>$last['detial_play'],
                        'admin_rate'=>$last['admin_rate'],
                        'admin_rank'=>$last['admin_rank'],
                        'timelong'=>$last['timelong']);

        $finallyArray['data'] = $second;
        $historyTestJSON=json_encode($finallyArray,JSON_UNESCAPED_UNICODE);
        echo $historyTestJSON;
?>