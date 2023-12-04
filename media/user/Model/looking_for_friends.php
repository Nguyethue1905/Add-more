<?php
class looking_for_friends
{
    var $user_id = null;
    var $content = null;
    var $filename = null;
    var $posts_id = null;
    var $username = null;
    var $searchfr = null;
    var $following_id = null;
    var $friendship_id = null;
    var $user_id_s = null;
    
    public function search_friends($searchfr)
    {
        $db = new connect();
        $sql =  "SELECT * FROM userproflie WHERE name_count LIKE '%$searchfr%';";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function friendships($user_id, $following_id)
    {
        $db = new connect();
        $sql =  "INSERT INTO friendship (`user_id`, `following_id`) VALUES ('$user_id', '$following_id')";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function slfriendships($user_id)
    {
        $db = new connect();
        $sql =  "SELECT * FROM friendship WHERE user_id = '$user_id'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function getidfol($user_id_s)
    {
        $db = new connect();
        $sql = "SELECT friendship.user_id AS idfrend, friendship.following_id AS fl_id, friendship.friendship_id AS id_fs, friendship.status AS status FROM friendship INNER JOIN users ON friendship.following_id = users.user_id INNER JOIN userproflie ON users.user_id = userproflie.user_id WHERE friendship.following_id='$user_id_s'";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getid($user_id)
    {
        $db = new connect();
        $sql =  "SELECT * FROM userproflie WHERE user_id = '$user_id'";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function getyes($friendship_id)
    {
        $db = new connect();
        $sql =  "UPDATE friendship SET status = 'Kết bạn thành công' WHERE friendship_id = '$friendship_id'";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function delete_idfen($friendship_id)
    {
        $db = new connect();
        $sql =  "DELETE FROM friendship WHERE friendship_id = '$friendship_id'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function all_frendship($user_id, $following_id)
    {
        $db = new connect();
        $sql =  "SELECT * FROM friendship WHERE (user_id = '$user_id' AND following_id = '$following_id') OR (user_id = '$following_id' AND following_id = '$user_id')";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function list_frents($user_id)
    {
        $db = new connect();
        $sql =  "SELECT userproflie.name_count, users.user_id as user, userproflie.avatar, friendship.friendship_id, friendship.following_id, friendship.status, friendship.user_id FROM friendship INNER JOIN users ON users.user_id = friendship.user_id INNER JOIN userproflie ON userproflie.user_id = users.user_id WHERE friendship.status = 'Kết bạn thành công' AND (friendship.user_id = '$user_id' or friendship.following_id = '$user_id') UNION SELECT userproflie.name_count, users.user_id as user, userproflie.avatar, friendship.friendship_id, friendship.following_id, friendship.status, friendship.user_id FROM friendship INNER JOIN users ON users.user_id = friendship.following_id INNER JOIN userproflie ON userproflie.user_id = users.user_id WHERE friendship.status = 'Kết bạn thành công' AND (friendship.user_id = '$user_id' or friendship.following_id = '$user_id');";
        $result = $db->pdo_query($sql);
        return $result;
    }
    public function notifications($user_id)
    {
        $db = new connect();
        $sql =  "SELECT userproflie.name_count AS name_fl, userproflie.avatar AS avatar, postscomment.comment, postscomment.user_id as user_cm, posts.content as content, postscomment.date_cmt, posts.posts_id,postscomment.cmt_id 
        FROM postscomment INNER JOIN users ON users.user_id = postscomment.user_id INNER JOIN userproflie ON users.user_id = userproflie.user_id INNER JOIN friendship ON users.user_id = friendship.user_id INNER JOIN posts ON users.user_id = posts.user_id WHERE friendship.status = 'Kết bạn thành công' AND (friendship.following_id = '$user_id' OR friendship.user_id = '$user_id') GROUP BY name_fl, avatar, postscomment.comment,user_cm,content,  postscomment.date_cmt,posts.posts_id,postscomment.cmt_id";
        $result = $db->pdo_query($sql);
        return $result;
    }

    
}