
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
                                        <h2>Chi Tiết User</h2>
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
                                                    <th class="font-weight-bold"> mã Người dùng </th>
                                                    <th class="font-weight-bold"> Tên Người Dùng </th>
                                                    <th class="font-weight-bold">Ngày Sinh</th>
                                                    <th class="font-weight-bold">Giới Tính</th>
                                                    <th class="font-weight-bold">ảnh đại diện</th>
                                                    <th class="font-weight-bold">ảnh bìa</th>
                                                    <th class="font-weight-bold">Số Điện Thoại</th>
                                                    <th class="font-weight-bold">Địa Chỉ</th>
                                                    <th class="font-weight-bold">Ngày Đăng Kí</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_id = $_GET['id'];
                                                $comment = new User();
                                                $get = $comment->getList($user_id);
                                                
                                                    foreach ($get as $item) {
                                                        $date = $item['date_registered'];
                                                        echo ' 
                                                <tr>
                                                <td>' . $item['user_id'] . '</td>
                                                <td>' . $item['name_count'] . '</td>
                                                    <td>' . $item['brithdate'] . '</td>
                                                    <td>' . $item['gander'] . '</td>
                                                    <td>' . $item['avatar'] . '</td>
                                                    <td>' . $item['cover_img'] . '</td>
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