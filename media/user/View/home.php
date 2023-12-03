<?php
$db = new profile();
$select = $db->getList($user_id);
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div class="col-lg-6">
    <?php
    include './Model/include/add-post.php';
    ?>

    <?php
    $db = new posts();
    $user_id = $_SESSION['id'];
    $item = $db->getPost($user_id);
    foreach ($item as $get) {
        $name = $get['name_count'] ?? "?     ?";
        $posts_id = $get['posts_id'];
        $_SESSION['posts_id'] = $posts_id;
        $db = new posts();
        $time = $db->getDate($posts_id);

        // Thời gian ban đầu
        $days = $time['days'];
        $hours = $time['hours'];
        $minutes = $time['minutes'];

        // Chuyển đổi thời gian thành chuỗi "ngày giờ phút"
        $timeString = '';

        if ($days > 0) {
            $timeString .= $days . ' ngày ';
        }

        if ($hours > 0) {
            $timeString .= $hours . ' giờ ';
        }

        if ($minutes > 0) {
            $timeString .= $minutes . ' phút';
        }

        echo '';

    ?>
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <?php
                        $avatar = $get['avatar'] ?? "";
                        if ($avatar == "") {
                            echo '<img src="./View/images/uploads/avatar.jpg" alt="">';
                        } else {
                            echo '<img src="./View/images/uploads/' . $avatar . '" alt="" class="user-avatars">';
                        }
                        ?>
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title=""><?= $name ?></a></ins>
                        <span><?= $timeString ?></span>
                    </div>
                    <div class="dropdown-post">
                        <button class="dropbtn">&#8942;</button>
                        <div class="dropdown-content">
                            <!-- Các lựa chọn trong dropdown menu -->
                            <a href="#">Lựa chọn 1</a>
                            <a href="#">Lựa chọn 2</a>
                            <a href="#">Lựa chọn 3</a>
                        </div>
                    </div>

                    <div class="description">
                        <p>
                            <?= $get['content'] ?? "" ?>
                        </p>
                    </div>
                    <div class="post-meta-img">

                        <?php
                        $posts_id = $get['posts_id'];
                        $file = $db->getfile($posts_id);
                        if ($file) {
                            $filename = $files['filename'] ?? "";
                            $count = 0;
                            foreach ($file as $files) {
                                echo '<img src="./View/images/uploads/' . $files['filename'] . '" alt="Image">';
                            }
                        } elseif ($file == "") {
                            echo '<p></p>';
                        }
                        ?>
                        <div class="we-video-info">
                            <ul>
                                <!-- like -->
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <!-- cmt -->
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <!-- share -->
                                <li class="social-media">
                                    <div class="menu">
                                        <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="post-comt-box">
                            <form method="post">
                                <div class="img-cmt">
                                    <?php
                                    $avatar = $select['avatar'] ?? "";
                                    if ($avatar == "") {
                                        echo '<img src="./View/images/uploads/avatar.jpg" alt="" style="border-radius: 50%; width:55px; height:55px;">';
                                    } else {
                                        echo ' <img src="./View/images/uploads/' . $avatar . '" alt="" style="border-radius: 50%; width:55px; height:55px;" class="user-avatars">';
                                    }
                                    ?>
                                    <input class="input" id="binhluan_<?= $get['posts_id'] ?>" type="text" name="contentcmt" placeholder="Bình luận">
                                    <a class="inputs submit-cmt" type="submit" name="submit-cmt" data-post="<?= $get['posts_id'] ?>" placeholder="Bình luận"> gửi</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--cmt deatail start -->
                <div class="coment-area" style="margin-top: 30px;">
                    <ul class="we-comet" style=" max-height: 300px;  overflow-y: auto;">
                        <?php
                        $db = new comment();
                        $cmt = $db->getListcmt($posts_id) ?? "";
                        foreach ($cmt as $get) {

                            $yourDateTime = $get['date_cmt'];

                            $now = time();
                            $yourDate = strtotime($yourDateTime);

                            $difference = $now - $yourDate;

                            $days = floor($difference / (60 * 60 * 24));
                            $hours = floor(($difference - ($days * 60 * 60 * 24)) / (60 * 60));
                            $minutes = floor(($difference - ($days * 60 * 60 * 24) - ($hours * 60 * 60)) / 60);


                        ?>
                            <li>
                                <div class="comet-avatar">

                                    <?php
                                    $avatar = $get['avatar'] ?? "";
                                    if ($avatar == "") {
                                        echo '<img src="./View/images/uploads/avatar.jpg" alt="">';
                                    } else {
                                        echo '<img src="./View/images/uploads/' . $avatar . '" alt="" class="user-avatars"> ';
                                    }
                                    ?>
                                </div>

                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="" title=""><?= $get['name_count'] ?></a></h5>
                                        <span><?= $days . ' ngày ' . $hours . ' giờ ' . $minutes . ' phút trước' ?></span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p><?= $get['comment'] ?> </p>
                                </div>

                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- cmt deatail end -->
            </div>
        </div>
    <?php }  ?>
</div>
<?php
$user_id = $_SESSION['id'];

?>

<script>
    jQuery(document).ready(function($) {
        $(document).on("click", ".submit-cmt", function() {
            var button = $(this);
            var post_id = button.data('post');
            var content = $('#binhluan_' + post_id).val();
            var user_id_in_js = <?php echo json_encode($user_id); ?>;

            console.log(post_id, user_id_in_js, content);
            $.ajax({
                url: "/user/ajax.php",
                method: "POST",
                data: {
                    action: "addPost",
                    posts_id: post_id,
                    user_id: user_id_in_js,
                    comment: content
                },
                success: function(result) {
                    $("#weather-temp").html("<strong>" + result + "</strong> degrees");
                    console.log(result);
                    if (result == true) {
                        console.log('thành công ');
                        location.reload();
                    } else {
                        console.log('lỗi');
                    }
                }
            });
        });
    });
</script>