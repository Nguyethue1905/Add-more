<?php
class home{
    var $user_id = null;
    var $username = null;
    var $password = null;
    var $user_status =null;  
    var $email =null;
    var $date_registered=null;


    public function getCount(){
     $db = new connect();
        $select ="SELECT COUNT(*) as count FROM users";
        $result = $db->pdo_query($select);
        return $result;
    }
}

?>