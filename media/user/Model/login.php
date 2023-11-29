<?php 
class login{
    var $user_id = null;
    var $username = null;
    var $email = null;
    var $password =null;  

    public function checkuser($username, $password){
        $db = new connect();
        $sql = "select * from users where `username` = '$username' and `password` = '$password'";
        $result = $db->pdo_query_one($sql);
        if ($result != null)
            return true;
        else
            return false;
    }
    function getUserid($username, $password)
    {
        $db = new connect();
        $select = "select user_id from users where username='$username' and password='$password'";
        return $db->pdo_query($select);
    }
    function getById($user_id)
    {
        $db = new connect();
        $select = "select * from users where user_id = '$user_id'";
        return $db->pdo_query_one($select);
    }
}

class singin {
    public function sigin(){
        $username = $_POST['username'] ?? "";
        $password = $_POST['password'] ?? "";
        if (isset($_POST['btn'])){ 
          $login = new login();
          $add = $login->checkuser($username, $password);
          $id = $login->getUserid($username, $password);
          if($add == true){
            if ($id == true){
              foreach ($id as $ro){
                $_SESSION['id'] = $ro['user_id'];
                $_SESSION['user'] = $username;
                header("Location: ./index.php?act=home");
              }
            }
          }else{
            echo '<div style = "color : red;">Tên đăng nhập hoặc mật khẩu không chính xác</div>'; 

          }
        }
    }
}