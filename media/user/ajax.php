<?php

include './Model/looking_for_friends.php';
include './Model/model.php';
include './Model/comment.php';

if($_POST['action'] == 'addfriend'){
    $following_id = $_POST['id'] ?? "";
    $user_id  = $_POST['id_user'] ?? "";  
    $looking_for_friends = new looking_for_friends();
	$all_frendship = $looking_for_friends->all_frendship($user_id, $following_id);
    if ($user_id !== $following_id && !$all_frendship) {
		$friendships = $looking_for_friends->friendships($user_id, $following_id);
        if ($friendships == true){            
            echo "Thành công rồi á";
        }
    }else{
        echo "bạn đã kết bạn rồi";
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

if($_POST['action'] == 'addPost'){
    $user_id =  $_POST['user_id'] ?? "";
    $posts_id =  $_POST['posts_id'] ?? "";
    $comment =  $_POST['comment'] ?? "";
    $db = new comment();
    $add = $db->getAdd($posts_id, $comment, $user_id);
    if($add == true){
        echo "thanhd công nhe";
    }
    echo true;
}
if($_POST['action'] == 'getyes'){
	$friendship_id = $_POST['idyes'];
	$looking_for_friends = new looking_for_friends();
	$getyes = $looking_for_friends->getyes($friendship_id);
	if ($getyes == true) {
		echo 'thành công';
        exit();
	}else{
		echo 'lỗi gi';
	}
    echo true;
}
