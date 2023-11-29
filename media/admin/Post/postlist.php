<?php 
class post{
    var $posts_id = null;
    var $user_id = null;
    var $content = null;
    var $album_id = null;
    var $date_post = null;
    var $post_status = null;


    public function getList($user_id)
{
    $db = new connect();
    $sql = 'SELECT * FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE posts.user_id ='.$user_id;
    $result = $db->pdo_query($sql);
    return $result;
}
public function getCount()
    {
        $db = new connect();
        $sql = 'SELECT *, (SELECT COUNT(*) FROM posts WHERE users.posts_id = posts.posts_id ) AS count FROM posts';
        $result = $db->pdo_query($sql);
        return $result;
    }
}

