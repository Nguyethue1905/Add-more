<?php
class comment
{
    var $cmt_id  = null;
    var $posts_id = null;
    var $user_id = null;
    var $comment  = null;
    var $date_cmt  = null;


    public function getList($posts_id)
    {
        $db = new connect();
        $sql = 'SELECT * FROM postscomment INNER JOIN users ON postscomment.user_id = users.user_id WHERE posts_id ='.$posts_id;
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getCount()
    {
        $db = new connect();
        $sql = 'SELECT *, (SELECT COUNT(*) FROM postscomment WHERE postscomment.posts_id = posts.posts_id) AS count FROM posts';
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function xoa($cmt_id)
    {
        $db = new connect();
        $sql = "DELETE FROM postscomment WHERE cmt_id=" . $cmt_id;
        $result = $db->pdo_query_one($sql);
        return $result;
    }
}
?>