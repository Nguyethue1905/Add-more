<?php
class post
{
    var $posts_id = null;
    var $content = null;
    var $album_id = null;
    var $date_post = null;
    var $post_status = null;


    public function getList($user_id)
    {
        $db = new connect();
        $sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE posts.user_id =' . $user_id;
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getName()
    {
        $db = new connect();
        $sql = 'SELECT * FROM users';
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getCount()
    {
        $db = new connect();
        $sql = 'SELECT users.user_id,users.username,COUNT(posts.posts_id) AS count FROM users LEFT JOIN posts ON users.user_id = posts.user_id GROUP BY users.user_id,users.username;';
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function xoa($posts_id)
    {
        $db = new connect();
        $sql = "DELETE FROM posts WHERE posts_id=" . $posts_id;
        $result = $db->pdo_query_one($sql);
        return $result;
    }
}
