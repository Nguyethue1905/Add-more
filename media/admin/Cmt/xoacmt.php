<?php
$posts_id = $_GET['id_pt'];
$cmt_id =  $_GET['id'];
$posts = new comment();
$select = $posts->xoa($cmt_id);
header('Location: index.php?act=cmt');
?>