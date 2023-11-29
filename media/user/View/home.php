<?php
$db = new profile();
$select = $db->getList($user_id);

?>
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
            <style>
                .preview-image {
                    width: 100px;
                    /* Đổi kích thước ảnh nếu cần */
                    height: 100px;
                    margin-right: 10px;
                    /* Thêm margin nếu cần */
                    /* Thêm các thuộc tính CSS khác tùy ý */
                }
            </style>

            <script>
                function choseFile(input) {
                    var preview = document.querySelector('#imageList');

                    if (input.files) {
                        while (preview.firstChild) {
                            preview.removeChild(preview.firstChild);
                        }

                        var filesAmount = input.files.length;
                        for (let i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function(event) {
                                var listItem = document.createElement('li');
                                var img = document.createElement('img');
                                img.src = event.target.result;
                                img.classList.add('preview-image');
                                listItem.appendChild(img);
                                preview.appendChild(listItem);
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                }
            </script>
        </div>
    </div><!-- add post new box -->

    <div class="loadMore">
        <?php
        $db = new posts();
        $item = $db->getList();
        foreach ($item as $get) {
            $name = $get['name_count'] ?? "?     ?";
            $posts_id = $get['posts_id'];
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
                                echo '<img src="./View/images/uploads/' . $avatar . '" alt="">';
                            }
                            ?>
                        </figure>
                        <div class="friend-name">
                            <ins><a href="time-line.html" title=""><?= $name ?></a></ins>
                            <span><?= $timeString ?></span>
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
                                $count = 0;
                                foreach ($file as $files) {

                                    echo '<img src="./View/images/uploads/' . $files['filename'] . '" alt="Image">';
                                }
                            } elseif ($file['filename'] == "") {
                                echo '<p></p>';
                            }



                            ?>

                            <div class="we-video-info">
                                <ul>
                                    <li>
                                        <span class="like" data-toggle="tooltip" title="like">
                                            <i class="ti-heart"></i>
                                            <ins>2.2k</ins>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="comment" data-toggle="tooltip" title="Comments">
                                            <i class="fa fa-comments-o"></i>
                                            <ins>52</ins>
                                        </span>
                                    </li>

                                    <li class="social-media">
                                        <div class="menu">
                                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                                </div>
                                            </div>
                                            <div class="rotater">
                                                <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-comt-box">
                                <form method="post">
                                    <div class="img-cmt">
                                        <img src="./View/images/resources/comet-1.jpg" alt="" style="border-radius: 50%; width:55px; height:55px;">
                                        <input class="input" type="text" placeholder="Bình luận">
                                        <input class="inputs" type="submit" placeholder="Bình luận" value="Gửi">
                                    </div>
                                    <div class="smiles-bunch">
                                        <i class="em em---1"></i>
                                        <i class="em em-smiley"></i>
                                        <i class="em em-anguished"></i>
                                        <i class="em em-laughing"></i>
                                        <i class="em em-angry"></i>
                                        <i class="em em-astonished"></i>
                                        <i class="em em-blush"></i>
                                        <i class="em em-disappointed"></i>
                                        <i class="em em-worried"></i>
                                        <i class="em em-kissing_heart"></i>
                                        <i class="em em-rage"></i>
                                        <i class="em em-stuck_out_tongue"></i>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="coment-area" style="margin-top: 30px;">
                        <ul class="we-comet">
                            <li>
                                <div class="comet-avatar">
                                    <img src="images/resources/comet-1.jpg" alt="">
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                        <span>1 year ago</span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p>we are working for the dance and sing songs. this car is very awesome for the
                                        youngster. please vote this car and like our post</p>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comet-avatar">
                                            <img src="../images/resources/comet-2.jpg" alt="">
                                        </div>
                                        <div class="we-comment">
                                            <div class="coment-head">
                                                <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                                <span>1 month ago</span>
                                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                            </div>
                                            <p>yes, really very awesome car i see the features of this car in the official
                                                website of <a href="#" title="">#Mercedes-Benz</a> and really impressed :-)
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comet-avatar">
                                            <img src="../images/resources/comet-3.jpg" alt="">
                                        </div>
                                        <div class="we-comment">
                                            <div class="coment-head">
                                                <h5><a href="time-line.html" title="">Olivia</a></h5>
                                                <span>16 days ago</span>
                                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                            </div>
                                            <p>i like lexus cars, lexus cars are most beautiful with the awesome features,
                                                but this car is really outstanding than lexus</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comet-avatar">
                                    <img src="../images/resources/comet-1.jpg" alt="">
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">Donald Trump</a></h5>
                                        <span>1 week ago</span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p>we are working for the dance and sing songs. this video is very awesome for the
                                        youngster. please vote this video and like our channel
                                        <i class="em em-smiley"></i>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php }  ?>

    </div>
</div>