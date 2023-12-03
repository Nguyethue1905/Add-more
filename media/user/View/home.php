<?php
$db = new profile();
$select = $db->getList($user_id);
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div class="col-lg-6">
    <div class="central-meta">
        <div class="new-postbox">
            <figure>
                <?php
                $user_id = $_SESSION['id'];
                $db = new profile();
                $select = $db->getImg($user_id);
                $avatar = $select['avatar'] ?? "";
                if ($avatar == "") {
                    echo '<img src="./View/images/uploads/avatar.jpg" alt="" class="user-avatars">';
                } else {
                    echo '<img src="./View/images/uploads/' . $select['avatar'] . '" alt="" class="user-avatars">';
                }
                ?>
            </figure>
            <div class="newpst-input">
                <form method="post" id="images-post" enctype="multipart/form-data">
                    <textarea rows="2" placeholder="Bạn đang nghĩ gì ?" name="content"></textarea>
                    <div class="attachments">
                        <ul id="imageList">
                            <!-- <form action="" id=""></form> -->
                        </ul>
                        <ul id="formList"></ul>
                        <li>
                            <label class="fileContainer">
                                <i class="fa-solid fa-camera" style="color: #08d5a9; font-size:30px;     position: relative;top: 6px;"></i>
                                <input type="file" name="image[]" id="imageInput" multiple="multiple" accept="image/jpg, image/jpeg, image/png, image/gif" onchange="choseFile(this)" value="fdvdfbvdf">

                            </label>
                        </li>
                        <li>
                            <button type="submit" name="upload" class="btn-post">Đăng</button>
                        </li>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['upload'])) {
                // var_dump($_FILES['image']);
                $user_id = $_SESSION['id'];
                $content = $_POST['content'] ?? "";
                $db = new posts();
                $text = $db->addPost($user_id, $content);
                if (isset($_FILES['image'])) {

                    //lấy ra posts_id
                    $get = $db->getid_post();
                    foreach ($get as $post) {
                        $_SESSION['posts_id'] = $post;
                    }

                    $files = $_FILES['image'];
                    // Lặp qua mảng các tệp tin
                    foreach ($files['tmp_name'] as $key => $tmp_name) {
                        $filename = $files['name'][$key];
                        $file_tmp = $files['tmp_name'][$key];

                        // Di chuyển từng tệp tin vào thư mục đích
                        move_uploaded_file($file_tmp, './View/images/uploads/' . $filename);

                        // Xử lý tệp tin, ví dụ: lưu tên tệp vào cơ sở dữ liệu
                        $posts_id = $_SESSION['posts_id'];
                        // var_dump($posts_id);exit();
                        $img = $db->isetimg($filename, $posts_id);
                    }
                }
            }

            ?>
        </div>
    </div><!-- add post new box -->
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
                        <span><?= $timeString . ' trước' ?></span>
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