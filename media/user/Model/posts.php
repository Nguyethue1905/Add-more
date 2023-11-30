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
    public function getList(){
        $db = new connect();
        $sql = 'SELECT users.user_id, userproflie.name_count, userproflie.avatar, posts.posts_id, posts.content, posts.date_post, COUNT(image.filename) as image_count 
        FROM users 
        INNER JOIN userproflie ON users.user_id = userproflie.user_id 
        INNER JOIN posts ON users.user_id = posts.user_id 
        LEFT JOIN image ON posts.posts_id = image.posts_id 
        GROUP BY users.user_id, userproflie.name_count, userproflie.avatar, posts.posts_id, posts.content, posts.date_post';
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getfile($posts_id){
        $db = new connect();
        $sql = 'SELECT filename FROM image WHERE posts_id ='.$posts_id;
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function getDate($posts_id){
        $db = new connect();
        $sql = 'SELECT FLOOR(minutes_ago / 1440) AS days, FLOOR((minutes_ago % 1440) / 60) AS hours, minutes_ago % 60 AS minutes FROM ( SELECT TIMESTAMPDIFF(MINUTE, date_post, NOW()) AS minutes_ago FROM posts WHERE posts_id = '.$posts_id.' ) AS time_diff;';
        $result = $db->pdo_query_one($sql);
        return $result;









        
    }
}
