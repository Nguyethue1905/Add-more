<?php
class signup
{
    var $user_id = null;
    var $username = null;
    var $email = null;
    var $password = null;
    var $re_password = null;

    public function getAdd($username, $email, $password)
    {
        $db = new connect();
        $sql = "INSERT INTO users (`username`,`email`,`password`) VALUES ('$username' ,'$email','$password')";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function checkIfEmailExists($email)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }

    public function addpassword($password,$email){
        $db = new connect();
        $sql = "UPDATE users SET `password` = '$password' WHERE `email` = '$email'";
        $result = $db->pdo_query_one($sql);
        return $result;
    }
    
    public function getList()
    {
        $db = new connect();
        $sql = 'select * from users';
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function getById($user_id)
    {
        $db = new connect();
        $sql = 'select * from users where user_id  = ' . $user_id;
        $result = $db->pdo_query_one($sql);
        return $result;
    }
}

// signup
class register
{
    public function addsignup()
    {
        if (isset($_POST['btn-signup'])) {
            $username = $_POST['username'] ?? "";
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";
            $data = new signup();
            $setemail = $data->checkIfEmailExists($email);
            // var_dump($setemail); exit();
            if ($setemail["count"] === "1") {
                echo '<div style="color:red;">Email đã tồn tại</div>';
            }elseif(($setemail["count"] === "0") ){
                if ($_POST['password'] == $_POST['re_password']) {
                    $data->getAdd($username, $email, $password);
                    $_SESSION['user'] = $username;
                    $login = new login();
                    $id = $login->getUserid($username, $password);
                    foreach ($id as $ro){
                        $_SESSION['id'] = $ro['user_id'];
                        $_SESSION['user'] = $username;
                        header('Location: ./index.php?act=home');
                    }
                  
                } else {
                    echo '<div style="color:red;">Mật khẩu chưa trùng khớp</div>';
                }
            }
        }
    }
    
}

// forget_password

