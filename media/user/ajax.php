<?php

include './Model/looking_for_friends.php';
include './Model/model.php';

if($_POST['action'] == 'addfriend'){
   

    $following_id = $_POST['id'] ?? "";
    $user_id  = $_POST['id_user'] ?? "";  
    $response = array();
    if ($user_id !== $following_id) {
        $looking_for_friends = new looking_for_friends();
		$friendships = $looking_for_friends->friendships($user_id, $following_id);
        if ($friendships == true){            
            echo "Thành công rồi á";
        }
    }

    //echo 
    echo true;


}


