<?php
$user_id =  $_GET['id'];
$db = new User();
$loked = $db->unbandUser($user_id);
header('Location: index.php?act=black');
?>