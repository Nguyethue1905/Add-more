<?php
class home
{
    var $user_id = null;
    var $username = null;
    var $password = null;
    var $user_status = null;
    var $email = null;
    var $date_registered = null;


    public function getCount()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) as count FROM users";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function getCountposts()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) as count FROM posts";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function getCountcmt()
    {
        $db = new connect();
        $select = "SELECT COUNT(*) as count FROM postscomment";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function getCountgander()
    {
        $db = new connect();
        $sql = "SELECT gander, COUNT(*) AS total FROM userproflie GROUP BY gander";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getCountuser(){
        $db = new connect();
        $sql = "SELECT COUNT(posts.posts_id) AS count, users.user_id ,userproflie.name_count as name FROM `posts` INNER JOIN users ON posts.user_id = users.user_id INNER JOIN userproflie ON userproflie.user_id = users.user_id GROUP BY users.user_id ,userproflie.name_count";
        $result = $db->pdo_query($sql);
        return $result;
    }

}
