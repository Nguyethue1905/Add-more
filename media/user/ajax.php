<?php

include './Model/looking_for_friends.php';
include './Model/model.php';

if($_POST['action'] == 'addfriend'){
   

    $following_id = $_POST['id'] ?? "";
    $user_id  = $_POST['id_user'] ?? "";  
    $looking_for_friends = new looking_for_friends();
	$all_frendship = $looking_for_friends->all_frendship();
    foreach($all_frendship as $row){
        $friendship_id = $row['friendship_id'];
        $id_us = $row['id_us'];
        $fl_id = $row['fl_id'];
    if ($user_id !== $following_id &&  !$friendship_id && $id_us == $user_id  && $fl_id !== $following_id) {
		$friendships = $looking_for_friends->friendships($user_id, $following_id);
        if ($friendships == true){            
            echo "Thành công rồi á";
        }
    }else{
        echo "bạn đã kết bạn rồi";
    }

    }

    
    
    //echo 
    echo true;


}
if ($_POST['action'] == 'delete_fren'){
    $friendship_id = $_POST['idship'] ?? "";
    $looking_for_friends = new looking_for_friends();
    $delete_idfen = $looking_for_friends->delete_idfen($friendship_id);
    if ($delete_idfen == true){
        echo "thành công";
    }
    echo true;
}


