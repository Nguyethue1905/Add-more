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
               if (isset($_FILES['image']) && !empty(array_filter($_FILES['image']['name']))) {     
                    //lấy ra posts_id
                    $get = $db->getid_post();
                    foreach ($get as $post) {
                        $_SESSION['posts_id'] = $post;
                    }

                    $files = $_FILES['image'];
                    foreach ($files['tmp_name'] as $key => $tmp_name) {
                        $filename = $files['name'][$key];
                        $file_tmp = $files['tmp_name'][$key];

                        // Di chuyển từng tệp tin vào thư mục đích
                        move_uploaded_file($file_tmp, './View/images/uploads/' . $filename);
                        $posts_id = $_SESSION['posts_id'];
                        $img = $db->isetimg($filename, $posts_id);
                    }
                } else {
                    // Không có ảnh được chọn, chỉ xử lý với nội dung văn bản
                    $user_id = $_SESSION['id'];
                    $content = $_POST['content'] ?? "";
                    $db = new posts();
                    $text = $db->addPost($user_id, $content);
                 

                }
            }
            ?>
        </div>
    </div><!-- add post new box -->