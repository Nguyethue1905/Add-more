<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <div id="content">
                <div class="row column2 graph margin_bottom_30">
                    <div class="col-md-l2 col-lg-12">
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                                    <div class="heading1 margin_0">
                                        <h2>Chi Tiết Tài Khoản </h2>
                                    </div>
                                </div>
                                <?php
                                if (isset($_POST['loked'])) {
                                    $user_id = $_GET['id'];
                                    $db = new User();
                                    $loked = $db->updateUser($user_id);

                                    header('Location: index.php?act=qluser');
                                }
                                ?>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bold"style="width: 140px;">ID Người dùng</th>
                                                    <th class="font-weight-bold"style="width: 150px">Tên Người Dùng</th>
                                                    <th class="font-weight-bold"style="width: 110px">Ngày Sinh</th>
                                                    <th class="font-weight-bold"style="width: 110px">Giới Tính</th>
                                                    <th class="font-weight-bold"style="width: 120px">ảnh đại diện</th>
                                                    <th class="font-weight-bold">Ảnh Bìa</th>
                                                    <th class="font-weight-bold"style="width: 120px">Số Điện Thoại</th>
                                                    <th class="font-weight-bold"style="width: 120px">Địa Chỉ</th>
                                                    <th class="font-weight-bold"style="width: 130px">Ngày Đăng Kí</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_id = $_GET['id'];
                                                $comment = new User();
                                                $get = $comment->getList($user_id);
                                                foreach ($get as $item) {
                                                    $date = $item['date_registered'];
                                                    $avatar = !empty($item['avatar']) ? '<img src="../../user/View/images/uploads/' . $item['avatar'] . '" alt="#" style="width: 50px"/>' : '';
                                                    $cover_img = !empty($item['cover_img']) ? '<img src="../../user/View/images/uploads/' . $item['cover_img'] . '" alt="#" style="width: 70px"/>' : '';
                                                    echo ' 
                                                        <tr>
                                                            <td style="text-align: center;">' . $item['user_id'] . '</td>
                                                            <td>' . $item['name_count'] . '</td>
                                                            <td>' . $item['brithdate'] . '</td>
                                                            <td>' . $item['gander'] . '</td>
                                                            <td>' . $avatar . '</td>
                                                            <td>' . $cover_img . '</td>
                                                            <td>' . $item['phone'] . '</td>
                                                            <td>' . $item['address'] . '</td>
                                                            <td>' . $date . '</td>
                                                            <td>
                                                                <form action="" method="post">
                                                                    <button type="submit" name="loked" class="btn btn-danger">Khóa</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ';
                                                }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>