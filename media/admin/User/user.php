<?php 
class User{
    var $user_id = null;
    var $username = null;
    var $password = null;
    var $Firstname =null;
    var $Lastname =null;
    var $Datebirth =null;
    var $Email =null;
    var $Phone =null;
    var $user_status =null;  
    var $profile_id =null;
    var $name_count =null;
    var $brithdate =null;
    var $gander =null;
    var $avatar =null;
    var $cover_img =null;
    var $phone =null;
    var $address =null;
    var $datetime_update =null;

    public function checkuser($username, $password){
        $db = new connect();
        $sql = "select * from users where `username` = '$username' and `password` = '$password'";
        $result = $db->pdo_query_one($sql);
        if ($result != null)
            return true;
        else
            return false;
    }
    function getUserid($username, $password)
    {
        $db = new connect();
        $select = "select user_id from users where username='$username' and `password` = '$password' ";
        return $db->pdo_query_one($select);
    }
    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    } 
    public function getList($user_id)
    {
        $db = new connect();
        $sql = 'SELECT * FROM userproflie INNER JOIN users ON userproflie.user_id = users.user_id WHERE userproflie.user_id ='.$user_id;
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function updateUser($user_id){
        $db = new connect();
        $select = "UPDATE users SET `user_status` = 3 WHERE `user_id` = '$user_id'";
        return $db->pdo_query($select);
    }
    public function unbandUser($user_id){
        $db = new connect();
        $select = "UPDATE users SET `user_status` = 2 WHERE `user_id` = '$user_id'";
        return $db->pdo_query($select);
    }

    public function getImg($user_id){
        $db = new connect();
        $sql =  'SELECT avatar from userproflie where user_id = '.$user_id;
        $result = $db->pdo_query_one($sql);
        return $result; 
    }
}