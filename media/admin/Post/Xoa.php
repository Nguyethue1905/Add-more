<?php
$posts_id =  $_GET['id'];
$posts = new post();
$select = $posts->xoa($posts_id);
header('Location: index.php?act=qlpost');
?>