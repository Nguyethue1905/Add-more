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
        $sql = 'SELECT posts.*, COUNT(postscomment.posts_id) AS count FROM posts JOIN postscomment ON posts.posts_id = postscomment.posts_id AND postscomment.cmt_status = "Active" GROUP BY posts.posts_id;';
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function xoa($cmt_id)
    {
        $db = new connect();
        $sql = "UPDATE postscomment SET `cmt_status` = 'Inactive' WHERE `cmt_id` = '$cmt_id'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
}
?>