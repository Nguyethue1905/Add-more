<?php
class profile
{
    var $profile_id = null;
    var $user_id = null;
    var $name_count = null;
    var $brithdate = null;
    var $gander = null;
    var $avatar = null;
    var $cover_img = null;
    var $phone = null;
    var $address = null;
    var $datetime_update = null;
  

    public function getList($user_id)
    {
        $db = new connect();
        $sql = 'SELECT * from users INNER JOIN userproflie ON users.user_id = userproflie.user_id where users.user_id = ' . $user_id;
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function getUpdate($user_id , $name_count, $brithdate, $gander, $phone, $address)
    {
        $db = new connect();
        $sql = "UPDATE userproflie INNER JOIN users ON users.user_id = userproflie.user_id SET `name_count` = '$name_count', `brithdate` = '$brithdate', `gander` = '$gander', `phone` = '$phone', `address` = '$address' WHERE userproflie.user_id = '$user_id'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    public function getImg($user_id){
        $db = new connect();
        $sql =  'SELECT avatar from userproflie where user_id = ' . $user_id;
        $result = $db->pdo_query_one($sql);
        return $result; 
    }
  
}

class update_user
{
    public function update()
    {
        $db = new profile();
        $user_id = $_SESSION['id']??"";
        $name_count = $_POST['name_acount']??"";
        $brithdate = $_POST['date_time']??"";
        $gander = $_POST['gander']??"";
        $phone = $_POST['phone_name']??"";
        $address = $_POST['address']??"";
        if (isset($_POST['edit-btn'])) {
            if ($gander != 'Nam' && $gander != 'Nữ'&& $gander != 'Khác') {
                echo '<div style="color:red;">Hãy ghi đúng giới tính nhé!</div>';
            } else {
                $db->getUpdate($user_id, $name_count, $brithdate, $gander, $phone, $address);
                header("Location: ./index.php?act=information");
              
            }
        }elseif(isset($_GET['exit-btn'])){
            header("Location: ./index.php?act=information");
           
        }
    }
    
}
