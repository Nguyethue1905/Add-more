<?php
class posts
{
    var $user_id = null;
    var $content = null;
    var $filename = null;
    var $posts_id = null;
    
    public function addPost($user_id, $content)
    {
        $db = new connect();
        $sql =  "INSERT INTO `posts`(`user_id`,`content`) VALUES ('$user_id', '$content')";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function getid_post(){
        $db = new connect();
        $sql =  "SELECT MAX(posts_id) AS latest_id FROM posts" ;
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function isetimg($filename,$posts_id){
        $db = new connect();
        $sql =  "INSERT INTO `image`(`posts_id`,`filename`) VALUES ('$posts_id', '$filename')";
        $result = $db->pdo_query($sql);
        return $result; 
    }
}
