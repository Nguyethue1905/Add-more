<?php
class login
{
  var $user_id = null;
  var $username = null;
  var $password = null;
  var $Firstname = null;
  var $Lastname = null;
  var $Datebirth = null;
  var $Email = null;
  var $Phone = null;
  var $user_status = null;

  public function checkuser($username, $password)
  {
    $db = new connect();
    $sql = "select * from users where `username` = '$username' and `password` = '$password'";
    $result = $db->pdo_query_one($sql);
    if ($result != null)
      return true;
    else
      return false;
  }
  function getUser($username)
    {
        $db = new connect();
        $select = "select * from users where `username`='$username'";
        return $db->pdo_query($select);
    } 
  function getUserid($username, $password)
  {
    $db = new connect();
    $select = "select user_id from users where username='$username' and `password` = '$password' ";
    return $db->pdo_query_one($select);
  }
}

class singin
{
  public function sigin()
  {
    $username = $_POST['Username'] ?? "";
    $password = $_POST['Password'] ?? "";
   
    if (isset($_POST['btn'])) {
      $login = new login();
      $add = $login->checkuser($username, $password);
      // $username = $_POST['Username']
      $get = $login->getUser($username);
      foreach($get as $met)
      $user_status = $met['user_status'];
      if ($add == true && $user_status == '1') {
        $id = $login->getUserid($username, $password);
        if ($id == true){
          foreach ($id as $ro) {
            $_SESSION['admin'] = $username;
            $_SESSION['id'] = $id['user_id'];
            header("Location: ./index.php?act=home");
          }
        }
      }else {
        echo '<div style = "color : red;">Vui lòng đăng nhập tài khoản admin</div>';
      }
    } 
  }
}
