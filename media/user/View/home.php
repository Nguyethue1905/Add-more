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
			$avatar = $select['avatar'] ??"";
			if($avatar == ""){
				echo '<img src="./View/images/uploads/avatar.jpg" alt="" class="user-avatars">';
				
			}else{
				echo '<img src="./View/images/uploads/'.$select['avatar'].'" alt="" class="user-avatars">';
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
                                <i class="fa-solid fa-camera" style="color: #08d5a9; font-size:30px;"></i>
                                <input type="file" name="image[]" id="imageInput" multiple="multiple" accept="image/jpg, image/jpeg, image/png, image/gif" onchange="choseFile(this)" value="fdvdfbvdf">

                            </label>
                        </li>
                        <li>
                            <button type="submit" name="upload">đăng bài</button>
                        </li>
                    </div>
                </form>
            </div>
            <?php
            if(isset($_POST['upload'])){
                    // var_dump($_FILES['image']);
                    $user_id = $_SESSION['id'];
                    $content = $_POST['content']??"";
                    $db = new posts();
                    $text = $db->addPost($user_id, $content);
                if(isset($_FILES['image'])){

                    //lấy ra posts_id
                    $get = $db->getid_post();
                    foreach($get as $post){
                        $_SESSION['posts_id'] = $post;
                    }
                    
                    $files = $_FILES['image'];
                    // Lặp qua mảng các tệp tin
                    foreach($files['tmp_name'] as $key => $tmp_name){
                        $filename = $files['name'][$key];
                        $file_tmp = $files['tmp_name'][$key];
    
                        // Di chuyển từng tệp tin vào thư mục đích
                        move_uploaded_file($file_tmp, './View/images/uploads/'.$filename);
                        
                    
                        // Xử lý tệp tin, ví dụ: lưu tên tệp vào cơ sở dữ liệu
                        $posts_id = $_SESSION['posts_id'];
                        // var_dump($posts_id);exit();
                        $img = $db->isetimg($filename,$posts_id);

                    }
                }
             
            }
            
            ?>
            <!-- <script>
                var images = [];
                console.log(images); // Mảng để lưu trữ các hình ảnh được chọn
                function choseFile(fileInput) {
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        console.log(reader);

                        reader.onload = function(e) {
                            if (images.length < 5) { // Giới hạn tối đa 5 hình ảnh
                                images.push(e.target.result);
                                console.log(images); // Thêm hình ảnh vào mảng
                                displayImages();

                            } else {
                                alert("Chỉ được chọn tối đa 5 hình ảnh.");
                            }
                        }
                        reader.readAsDataURL(fileInput.files[0]);
                        console.log(reader);
                    }
                }

                function displayImages() {

                    var imageList = document.getElementById('imageList');
                    imageList.innerHTML = '';

                    images.forEach(function(imageData, index) {
                        var li = document.createElement('li');
                        var img = document.createElement('img');
                        img.src = imageData;
                        img.style.width = '60px'; // Thiết lập kích thước của ảnh


                        var deleteButton = document.createElement('button');
                        deleteButton.innerText = 'x';
                        deleteButton.onclick = function() {
                            images.splice(index, 1); // Xóa ảnh từ mảng
                            displayImages(); // Hiển thị lại danh sách hình ảnh mới



                        };

                        li.appendChild(img);
                        li.appendChild(deleteButton);
                        imageList.appendChild(li);
                    });
                }
            </script> -->


        </div>
    </div><!-- add post new box -->
    <div class="loadMore">
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="./View/images/resources/friend-avatar10.jpg" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">Janice Griffith</a></ins>
                        <span>published: june,2 2018 19:PM</span>
                    </div>
                    <div class="description">
                        <p>
                            World's most beautiful car in Curabitur <a href="#" title="">#test drive booking !</a> the
                            most beatuiful car available in america and the saudia arabia, you can book your test drive
                            by our official website
                        </p>
                    </div>
                    <div class="post-meta">
                        <img src="./View/images/resources/user-post.jpg" alt="">
                        <div class="we-video-info">
                            <ul>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <!-- <li>
															<span class="views" data-toggle="tooltip" title="views">
																<i class="fa fa-eye"></i>
																<ins>1.2k</ins>
															</span>
														</li> -->
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
                                <div class="j">
                                    <img src="./View/images/resources/comet-1.jpg" alt="" style="border-radius: 50%;">
                                    <input class="input" type="text" placeholder="Bình luận">
                                    <input class="inputs" type="submit" placeholder="Bình luận">
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
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="images/resources/nearly1.jpg" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">Sara Grey</a></ins>
                        <span>published: june,2 2018 19:PM</span>
                    </div>
                    <div class="post-meta">
                        <video width="640" height="360" controls>
                            <source src="video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="we-video-info">
                            <ul>
                                <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
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
                        <div class="description">

                            <p>
                                Lonely Cat Enjoying in Summer Curabitur <a href="#" title="">#mypage</a> ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
                            </p>
                        </div>
                    </div>
                </div>
                <div class="coment-area">
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
                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p>
                            </div>

                        </li>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Sophia</a></h5>
                                    <span>1 week ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster.
                                    <i class="em em-smiley"></i>
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#" title="" class="showmore underline">more comments</a>
                        </li>
                        <li class="post-comment">
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="post-comt-box">
                                <form method="post">
                                    <textarea placeholder="Post your comment"></textarea>
                                    <div class="add-smiles">
                                        <span class="em em-expressionless" title="add icon"></span>
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
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="images/resources/nearly6.jpg" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">Sophia</a></ins>
                        <span>published: january,5 2018 19:PM</span>
                    </div>
                    <div class="post-meta">
                        <div class="post-map">
                            <div class="nearby-map">
                                <div id="map-canvas"></div>
                            </div>
                        </div><!-- near by map -->
                        <div class="we-video-info">
                            <ul>
                                <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="dislike" data-toggle="tooltip" title="dislike">
                                        <i class="ti-heart-broken"></i>
                                        <ins>200</ins>
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
                        <div class="description">

                            <p>
                                Curabitur Lonely Cat Enjoying in Summer <a href="#" title="">#mypage</a> ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
                            </p>
                        </div>
                    </div>
                </div>
                <div class="coment-area">
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
                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p>
                            </div>

                        </li>
                        <li>
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Sophia</a></h5>
                                    <span>1 week ago</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <p>we are working for the dance and sing songs. this video is very awesome for the
                                    youngster.
                                    <i class="em em-smiley"></i>
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#" title="" class="showmore underline">more comments</a>
                        </li>
                        <li class="post-comment">
                            <div class="comet-avatar">
                                <img src="images/resources/comet-2.jpg" alt="">
                            </div>
                            <div class="post-comt-box">
                                <form method="post">
                                    <textarea placeholder="Post your comment"></textarea>
                                    <div class="add-smiles">
                                        <span class="em em-expressionless" title="add icon"></span>
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
                                    <button type="submit"></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img alt="" src="images/resources/friend-avatar10.jpg">
                    </figure>
                    <div class="friend-name">
                        <ins><a title="" href="time-line.html">Janice Griffith</a></ins>
                        <span>published: june,2 2018 19:PM</span>
                    </div>
                    <div class="description">

                        <p>
                            Curabitur World's most beautiful car in <a title="" href="#">#test drive booking !</a> the
                            most beatuiful car available in america and the saudia arabia, you can book your test drive
                            by our official website
                        </p>
                    </div>
                    <div class="post-meta">
                        <div class="linked-image align-left">
                            <a title="" href="#"><img alt="" src="images/resources/page1.jpg"></a>
                        </div>
                        <div class="detail">
                            <span>Love Maid - ChillGroves</span>
                            <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua... </p>
                            <a title="" href="#">www.sample.com</a>
                        </div>
                        <div class="we-video-info">
                            <ul>
                                <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="like">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="dislike" data-toggle="tooltip" title="dislike">
                                        <i class="ti-heart-broken"></i>
                                        <ins>200</ins>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>